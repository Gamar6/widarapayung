<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <title>Virtual Tour 360°</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.css" />)
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
      background-color: rgba(0, 0, 0, 0.177);
      color: white;
      padding: 8px 12px;
      border-radius: 8px;
      cursor: pointer;
      border: none;
      margin:10px;
      margin-top:20px;
    }

    /* BOTTOM NAVIGATION & CONTROLS */
    .bottom-container {
      position: absolute;
      bottom: 0;
      width: 100%;
      pointer-events: auto;
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 10px; 
    }

    .bottom-controls {
      display: flex;
      gap: 10px;
      background-color: rgba(0, 0, 0, 0.6);
      padding: 8px 16px;
      border-radius: 20px;
    }

    .ctrl-btn {
      background: none;
      border: none;
      color: white;
      font-size: 18px;
      cursor: pointer;
    }

    .bottom-nav {
      display: flex;
      align-items: center;
      gap: 16px;
      background-color: rgba(0, 0, 0, 0.6);
      padding: 8px 16px;
      border-radius: 20px;
    }

    .nav-btn {
      background: transparent;
      border: none;
      color: white;
      font-size: 20px;
      cursor: pointer;
    }

    .scene-title-bottom {
      color: white;
      font-weight: bold;
      font-size: 16px;
    }

    /* Scene Indicators dengan scroll horizontal */
    .scene-indicators {
      position: absolute;
      bottom: 100px;
      left: 50%;
      transform: translateX(-50%);
      display: flex;
      gap: 6px;
      pointer-events: auto;
      max-width: calc(10 * 40px);
      /* 10 indikator x lebar lebih besar */
      overflow-x: auto;
      scroll-behavior: smooth;
      padding: 6px 8px;
      border-radius: 12px;
      background-color: rgba(0, 0, 0, 0.3);
      -webkit-overflow-scrolling: touch;
    }

    /* Ubah tampilan scrollbar agar lebih kecil */
    .scene-indicators::-webkit-scrollbar {
      height: 4px;
    }

    .scene-indicators::-webkit-scrollbar-track {
      background: transparent;
    }

    .scene-indicators::-webkit-scrollbar-thumb {
      background-color: rgba(255, 255, 255, 0.4);
      border-radius: 4px;
    }

    /* Tombol indikator (dipanjangkan) */
    .scene-indicators button {
      height: 8px;
      border-radius: 999px;
      border: none;
      cursor: pointer;
      transition: all 0.3s ease;
      background-color: rgba(255, 255, 255, 0.4);
      width: 20px;
      flex-shrink: 0;
    }

    .scene-indicators button.active {
      width: 50px;
      background-color: #0ea5e9;
    }

    .scene-indicators button.inactive {
      width: 20px;
      background-color: rgba(255, 255, 255, 0.4);
    }

    .pnlm-title,
    .pnlm-about-msg,
    .pnlm-load-box,
    .pnlm-controls {
      display: none !important;
    }

    .menuburger {
      width: 24px;
      height: 24px;
      filter: brightness(0) invert(1);
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

    .bottom-container {
      position: absolute;
      bottom: 0;
      width: 100%;
      pointer-events: auto;
    }

    .bottom-bg {
      position: fixed;
      bottom: 0;
      left: 0;
      width: 100%;
      background-color: #023c4ddd;
      padding: 10px 0;
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 10px; 
    }


    .iconImg {
      width: 20px;
      height: 20px;
      filter: brightness(0) invert(1);
    }
    
    .iconImg:hover {
      transform: scale(1.2);
    }

    .iconplayImg {
      width: 17px;
      height: 17px;
      filter: brightness(0) invert(1);
    }

    .iconplayImg:hover {
      transform: scale(1.2);
    }

    .iconexpandImg {
      width: 16px;
      height: 16px;
      filter: brightness(0) invert(1);
    }

    .iconexpandImg:hover {
      transform: scale(1.2);
    }

    .iconarrowImg {
      width: 23px;
      height: 23px;
      filter: brightness(0) invert(1);
    }

    .iconarrowImg:hover {
      transform: scale(1.2);
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
        <button class="btn" onclick="toggleSidebar()"><img src="/img/menu-burger.svg" alt="sidebar menu" class="menuburger"></button>

      </div>
      <div></div>
      <div></div>
    </div>

    <!-- Bottom controls -->
    <div class="bottom-container">
      <div class="bottom-bg">
        <div class="bottom-controls">
          <button class="ctrl-btn" title="kembali ke halaman sebelumnya"
            onclick="window.location.href='{{ url('/virtual-tour') }}'"><img src="/img/arrow-small-left.svg"
              alt="eye" class="iconarrowImg"></button>
          <button class="ctrl-btn" title="full screen" onclick="toggleFullscreen()"><img src="/img/expand.svg"
              alt="expand" class="iconexpandImg"></button>
          <button class="ctrl-btn" title="play auto-rotate" onclick="toggleAutorotate()" id="autorotateBtn"><img
              src="/img/play.svg" alt="play" class="iconplayImg"></button>
          <button class="ctrl-btn" title="show hotspot" onclick="toggleHotspots()" id="hotspotBtn"><img
              src="/img/eye.svg" alt="eye" class="iconImg"></button>
        </div>
        <div class="bottom-nav">
          <button class="nav-btn" onclick="goPrev()">⟨</button>
          <div class="scene-title-bottom" id="sceneTitleBottom">Virtual Tour</div>
          <button class="nav-btn" onclick="goNext()">⟩</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Scene Indicators -->
  <div class="scene-indicators" id="sceneIndicators"></div>

  <script src="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.js"></script>
  <script>
    // Contoh data scenes dan firstScene (gantikan dengan data nyata dari backend)
    const scenes = @json($scenes);
    const firstScene = @json($firstScene);

    const sceneIds = Object.keys(scenes);
    let currentSceneIndex = sceneIds.indexOf(firstScene);
    let viewer;
    let hotspotsVisible = true;

    const MAX_VISIBLE_INDICATORS = 10;

    const loadScene = (sceneId) => {
      viewer.loadScene(sceneId);
      currentSceneIndex = sceneIds.indexOf(sceneId);
      updateSceneInfo();
    };

    const updateSceneInfo = () => {
      const current = scenes[sceneIds[currentSceneIndex]];
      document.getElementById('sceneTitleBottom').textContent = current.title || 'Virtual Tour';
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
        document.getElementById('autorotateBtn').innerHTML =
          '<img src="/img/play.svg" title="play auto-rotate" alt="Visible" class="iconplayImg">';
      } else {
        viewer.startAutoRotate();
        document.getElementById('autorotateBtn').innerHTML =
          '<img src="/img/pause.svg" title="stop auto-rotate" alt="Visible" class="iconplayImg">';
      }
    };

    const toggleFullscreen = () => viewer.toggleFullscreen();

    const toggleHotspots = () => {
      hotspotsVisible = !hotspotsVisible;
      const hs = document.querySelectorAll('.pnlm-hotspot');
      hs.forEach(el => el.style.display = hotspotsVisible ? 'block' : 'none');

      const iconHTML = hotspotsVisible ?
        `<img src="/img/eye.svg" title="show hotspot" alt="Visible" class="iconImg">` :
        `<img src="/img/eye-crossed.svg" title="hide hotspot" alt="Hidden" class="iconImg">`;

      document.getElementById('hotspotBtn').innerHTML = iconHTML;
    };


    const toggleSidebar = () => {
      document.getElementById('sidebar').classList.toggle('open');
    };

    const createIndicators = () => {
      const container = document.getElementById('sceneIndicators');
      container.innerHTML = '';
      sceneIds.forEach((id, idx) => {
        const btn = document.createElement('button');
        btn.className = idx === currentSceneIndex ? 'active' : 'inactive';
        btn.onclick = () => loadScene(id);
        btn.dataset.idx = idx; // simpan index untuk referensi scroll
        container.appendChild(btn);
      });
    };

    const updateIndicators = () => {
      const container = document.getElementById('sceneIndicators');
      const buttons = container.children;

      // Update class active/inactive
      Array.from(buttons).forEach((btn, idx) => {
        btn.className = idx === currentSceneIndex ? 'active' : 'inactive';
      });

      // Scroll ke indikator aktif supaya terlihat di tengah
      const btnWidth = 36; // lebar tombol + gap perkiraan
      const scrollPos = Math.max(0, (currentSceneIndex - Math.floor(MAX_VISIBLE_INDICATORS / 2)) * btnWidth);
      container.scrollLeft = scrollPos;
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
        hotSpots: (s.hotSpots || []).map(hs => ({
          pitch: hs.pitch,
          yaw: hs.yaw,
          type: hs.type === "scene" ? "scene" : "info",
          text: hs.text || "",
          sceneId: hs.sceneId || null
        }))
      };
    });

    viewer = pannellum.viewer('panorama', {
      default: {
        firstScene: firstScene,
        sceneFadeDuration: 1000,
        autoLoad: true,
        showControls: false
      },
      scenes: pannellumScenes
    });

    viewer.on('scenechange', function(newSceneId) {
      currentSceneIndex = sceneIds.indexOf(newSceneId);
      updateSceneInfo();
    });

    createIndicators();
    createSidebarList();
    updateSceneInfo();
  </script>
</body>

</html>
