<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>Virtual Tour 360°</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.css" />
  <style>
    html,
    body {
      margin: 0;
      padding: 0;
      height: 100%;
      font-family: system-ui, sans-serif;
      background: black;
    }

    #panorama {
      width: 100%;
      height: 100vh;
    }

    .controls-overlay {
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      pointer-events: none;
    }

    .top-bar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 16px;
      pointer-events: auto;
    }

    .top-bar .btn {
      background-color: rgba(0, 0, 0, 0.6);
      color: white;
      padding: 8px 12px;
      border-radius: 8px;
      cursor: pointer;
      border: none;
      margin-right: 8px;
    }

    .scene-title {
      background-color: rgba(0, 0, 0, 0.6);
      color: white;
      padding: 8px 16px;
      border-radius: 8px;
      font-weight: bold;
      text-align: center;
    }

    .navigation-controls {
      position: absolute;
      bottom: 20px;
      left: 50%;
      transform: translateX(-50%);
      pointer-events: auto;
      display: flex;
      align-items: center;
      gap: 10px;
      background-color: rgba(0, 0, 0, 0.6);
      padding: 10px 20px;
      border-radius: 20px;
    }

    .nav-btn {
      background: transparent;
      border: none;
      color: white;
      font-size: 20px;
      cursor: pointer;
    }

    .scene-indicators {
      position: absolute;
      bottom: 60px;
      left: 50%;
      transform: translateX(-50%);
      display: flex;
      gap: 6px;
      pointer-events: auto;
    }

    .scene-indicators button {
      height: 8px;
      border-radius: 999px;
      border: none;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .scene-indicators button.active {
      width: 30px;
      background-color: #0ea5e9;
    }

    .scene-indicators button.inactive {
      width: 8px;
      background-color: rgba(255, 255, 255, 0.4);
    }

    .pnlm-about-msg,
    .pnlm-load-box {
      display: none !important;
    }

    /* Sidebar */
    #sidebar {
      position: fixed;
      top: 0;
      left: 0;
      width: 260px;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.8);
      color: white;
      transform: translateX(-100%);
      transition: transform 0.3s ease;
      z-index: 9999;
    }

    #sidebar.open {
      transform: translateX(0);
    }

    #sidebar h2 {
      margin: 0;
      padding: 16px;
      font-size: 18px;
      border-bottom: 1px solid rgba(255, 255, 255, 0.2);
    }

    #sidebar button.close-btn {
      position: absolute;
      top: 12px;
      right: 12px;
      background: none;
      color: white;
      font-size: 22px;
      border: none;
      cursor: pointer;
    }

    #sidebarList {
      padding: 12px 16px;
      overflow-y: auto;
      max-height: calc(100% - 60px);
    }

    #sidebarList button {
      width: 100%;
      margin-bottom: 10px;
      padding: 10px 14px;
      border: none;
      background-color: rgba(255, 255, 255, 0.1);
      color: white;
      border-radius: 6px;
      cursor: pointer;
      text-align: left;
      font-size: 14px;
    }

    #sidebarList button:hover {
      background-color: rgba(255, 255, 255, 0.2);
    }

    #quickSpots {
      bottom: 120px;
      flex-wrap: wrap;
      justify-content: center;
    }

    #quickSpots button {
      background-color: rgba(0, 0, 0, 0.6);
      color: white;
      border: none;
      padding: 6px 12px;
      border-radius: 8px;
      cursor: pointer;
      font-size: 14px;
      transition: background-color 0.3s ease;
    }

    #quickSpots button:hover {
      background-color: rgba(0, 0, 0, 0.8);
    }
  </style>
</head>

<body>
  <div id="panorama"></div>

  <!-- Sidebar -->
  <div id="sidebar">
    <h2>Pilih Lokasi</h2>
    <button class="close-btn" onclick="toggleSidebar()">✕</button>
    <div id="sidebarList"></div>
  </div>

  <div class="controls-overlay">
    <!-- Top bar -->
    <div class="top-bar">
      <div>
        <button class="btn" onclick="toggleSidebar()">☰</button>
        <button class="btn" onclick="window.location.href='{{ url('/virtual-tour') }}'">← Kembali</button>
      </div>
      <div class="scene-title" id="sceneTitle">Virtual Tour</div>
      <div>
        <button class="btn" onclick="toggleAutorotate()" id="autorotateBtn">⏯️</button>
        <button class="btn" onclick="toggleFullscreen()">⛶</button>
      </div>
    </div>

    <!-- Navigation controls -->
    <div class="navigation-controls">
      <button class="nav-btn" onclick="goPrev()">⟨</button>
      <div style="color:white;" id="sceneIndexText">1 / N</div>
      <button class="nav-btn" onclick="goNext()">⟩</button>
    </div>

    <!-- Quick Spots -->
    <div class="scene-indicators" id="quickSpots"></div>

    <!-- Scene Indicators -->
    <div class="scene-indicators" id="sceneIndicators"></div>
  </div>

  <!-- Pannellum -->
  <script src="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.js"></script>

  <script>
    const scenes = @json($scenes);
    const firstScene = @json($firstScene);

    const sceneIds = Object.keys(scenes);
    let currentSceneIndex = sceneIds.indexOf(firstScene);
    let viewer;

    const loadScene = (sceneId) => {
      viewer.loadScene(sceneId);
      currentSceneIndex = sceneIds.indexOf(sceneId);
      updateSceneInfo();
    };

    const updateSceneInfo = () => {
      document.getElementById('sceneTitle').textContent = scenes[sceneIds[currentSceneIndex]].title || 'Virtual Tour';
      document.getElementById('sceneIndexText').textContent = `${currentSceneIndex + 1} / ${sceneIds.length}`;
      updateIndicators();
    };

    const goPrev = () => {
      if (currentSceneIndex > 0) loadScene(sceneIds[currentSceneIndex - 1]);
    };

    const goNext = () => {
      if (currentSceneIndex < sceneIds.length - 1) loadScene(sceneIds[currentSceneIndex + 1]);
    };

    const toggleAutorotate = () => {
      if (viewer.getConfig().autoRotate) {
        viewer.stopAutoRotate();
        document.getElementById('autorotateBtn').textContent = '▶️';
      } else {
        viewer.startAutoRotate();
        document.getElementById('autorotateBtn').textContent = '⏸️';
      }
    };

    const toggleFullscreen = () => viewer.toggleFullscreen();

    const toggleSidebar = () => {
      const sidebar = document.getElementById('sidebar');
      sidebar.classList.toggle('open');
    };

    const createIndicators = () => {
      const container = document.getElementById('sceneIndicators');
      container.innerHTML = '';
      sceneIds.forEach((id, idx) => {
        const btn = document.createElement('button');
        btn.className = idx === currentSceneIndex ? 'active' : 'inactive';
        btn.onclick = () => loadScene(id);
        container.appendChild(btn);
      });
    };

    const createQuickSpots = () => {
      // Kosong, supaya tombol quick spots tidak dibuat
      const container = document.getElementById('quickSpots');
      container.innerHTML = '';
    };


    const createSidebarList = () => {
      const container = document.getElementById('sidebarList');
      container.innerHTML = '';
      sceneIds.forEach(sceneId => {
        const s = scenes[sceneId];
        if (!s.important) return;
        const btn = document.createElement('button');
        btn.textContent = s.title || sceneId;
        btn.onclick = () => {
          loadScene(sceneId);
          toggleSidebar();
        };
        container.appendChild(btn);
      });
    };

    const updateIndicators = () => {
      const buttons = document.getElementById('sceneIndicators').children;
      Array.from(buttons).forEach((btn, idx) => {
        btn.className = idx === currentSceneIndex ? 'active' : 'inactive';
      });
    };

    const pannellumScenes = {};
    sceneIds.forEach(sceneId => {
      const s = scenes[sceneId];
      pannellumScenes[sceneId] = {
        title: s.title || sceneId,
        type: "equirectangular",
        panorama: s.panorama,
        hfov: s.hfov || 100,
        yaw: s.yaw || 0,
        pitch: s.pitch || 0,
        hotSpots: (s.hotSpots || []).map(hs => {
          const base = {
            pitch: hs.pitch,
            yaw: hs.yaw,
            type: hs.type === "scene" ? "scene" : "info",
            text: hs.text || ""
          };
          if (hs.type === "scene") base.sceneId = hs.sceneId;
          return base;
        })
      };
    });

    viewer = pannellum.viewer('panorama', {
      default: {
        firstScene: firstScene,
        sceneFadeDuration: 1000,
        autoLoad: true
      },
      scenes: pannellumScenes
    });

    viewer.on('scenechange', function(newSceneId) {
      currentSceneIndex = sceneIds.indexOf(newSceneId);
      updateSceneInfo();
    });

    createIndicators();
    createQuickSpots();
    createSidebarList();
    updateSceneInfo();
  </script>
</body>

</html>
