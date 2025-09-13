<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Panorama PSV v5 Standalone</title>
  <link rel="stylesheet" href="https://unpkg.com/photo-sphere-viewer@5/dist/photo-sphere-viewer.css"/>
  <link rel="stylesheet" href="https://unpkg.com/@photo-sphere-viewer/markers-plugin@5/dist/photo-sphere-viewer-markers.css"/>
  <script src="/resources/js/360.js"></script>
  
  <!-- Three.js dulu -->
  <script src="https://unpkg.com/three@0.150.0/build/three.min.js"></script>
  
  <!-- Standalone PSV v5 -->
  <script src="https://unpkg.com/photo-sphere-viewer@5/dist/photo-sphere-viewer.standalone.js"></script>
  <script src="https://unpkg.com/@photo-sphere-viewer/markers-plugin@5/dist/photo-sphere-viewer-markers.js"></script>

  <style>
    body, html { margin: 0; height: 100%; }
    #viewer { width: 100%; height: 100vh; }
  </style>
</head>
<body>
  <div id="viewer"></div>

  <!-- <script>
    const viewer = new PhotoSphereViewer.Viewer({
      container: document.getElementById('viewer'),
      panorama: '/img/360/scene1.jpg',
      plugins: [
        [PhotoSphereViewer.MarkersPlugin, {}]
      ]
    });

    const markersPlugin = viewer.getPlugin(PhotoSphereViewer.MarkersPlugin);

    markersPlugin.addMarker({
      id: 'hotspot1',
      longitude: 0.2,
      latitude: 0.1,
      image: 'https://cdn-icons-png.flaticon.com/512/25/25694.png',
      width: 32,
      height: 32,
      anchor: 'bottom center',
      tooltip: 'Hotspot 1 - klik untuk info',
    });

    markersPlugin.on('select-marker', (e, marker) => {
      alert('Hotspot diklik: ' + marker.config.id);
    });
  </script> -->
</body>
</html>
