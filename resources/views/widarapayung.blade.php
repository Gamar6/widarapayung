<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Virtual Tour 360° - Multi Scene</title>

  <!-- Pannellum CSS (CDN) -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.css"/>

  <style>
    body, html { height: 100%; margin: 0; font-family: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial; }
    .tour-container { height: 100vh; width: 100%; display: flex; flex-direction: column; }
    #panorama { flex: 1; }
    .controls {
      position: absolute;
      top: 10px;
      left: 10px;
      z-index: 10;
      display:flex;
      gap:8px;
    }
    .btn {
      background: rgba(0,0,0,0.6);
      color: #fff;
      padding: 8px 12px;
      border-radius: 8px;
      cursor: pointer;
      border: none;
    }
    .scene-list {
      position: absolute;
      right: 10px;
      top: 10px;
      z-index: 10;
      background: rgba(255,255,255,0.86);
      padding: 8px;
      border-radius: 8px;
    }
    .pnlm-about-msg {
      display: none !important;
    }
    .pnlm-load-box {
        display: none !important;
    }

  </style>
</head>
<body>
  <div class="tour-container">
    <div class="controls">
      <button class="btn" onclick="viewer.toggleAutorotate()">Toggle Autorotate</button>
      <button class="btn" onclick="viewer.toggleFullscreen()">Fullscreen</button>
    </div>

    <div class="scene-list" id="sceneList">
      <strong>Scenes</strong>
      <div id="sceneButtons" style="margin-top:6px;"></div>
    </div>

    <div id="panorama"></div>
  </div>

  <!-- Pannellum JS (CDN) -->
  <script src="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.js"></script>

  <script>
    // Laravel mengirim variable $scenes; kita serialisasi ke JS
    const scenesFromServer = @json($scenes);

    // Konversi data ke format pannellum: scenes object
    const pannellumScenes = {};
    Object.keys(scenesFromServer).forEach(sceneId => {
      const s = scenesFromServer[sceneId];
      pannellumScenes[sceneId] = {
        title: s.title || sceneId,
        type: "equirectangular",
        panorama: s.panorama,
        hfov: s.hfov || 100,
        yaw: s.yaw || 0,
        pitch: s.pitch || 0,
        hotSpots: (s.hotSpots || []).map(hs => {
          // Pannellum hotspot object expects 'type' either 'scene' or 'info'
          const base = {
            pitch: hs.pitch,
            yaw: hs.yaw,
            type: hs.type === 'scene' ? 'scene' : 'info',
            text: hs.text || ''
          };
          if (hs.type === 'scene') {
            base.sceneId = hs.sceneId;
          }
          // optional: add URL or clickHandler
          if (hs.url) base.URL = hs.url;
          return base;
        })
      };
    });

    // Inisialisasi viewer
    const viewer = pannellum.viewer('panorama', {
      default: {
        firstScene: Object.keys(pannellumScenes)[0],
        sceneFadeDuration: 1000,
        autorotateDelay: 3000
      },
      scenes: pannellumScenes,
      disableContextMenu: true
    });

    // Buat tombol scene di UI
    const sceneButtonsDiv = document.getElementById('sceneButtons');
    Object.keys(pannellumScenes).forEach(id => {
      const btn = document.createElement('button');
      btn.className = 'btn';
      btn.style.background = '#1976d2';
      btn.style.padding = '6px 10px';
      btn.style.marginRight = '6px';
      btn.textContent = pannellumScenes[id].title;
      btn.onclick = () => viewer.loadScene(id);
      sceneButtonsDiv.appendChild(btn);
    });

    // Contoh: hook saat hotspot info diklik (Pannellum default menampilkan tooltip)
    // Jika mau custom behavior, bisa tambahkan hotSpots dengan `clickHandlerFunc`
  </script>
</body>
</html>
