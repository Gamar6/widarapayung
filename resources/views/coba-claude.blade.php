<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multi Scene 360 View</title>
    
    <!-- Photo Sphere Viewer CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@photo-sphere-viewer/core/index.min.css" />
    
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #000;
        }
        
        #viewer {
            width: 100vw;
            height: 100vh;
            position: relative;
        }
        
        .scene-controls {
            position: absolute;
            top: 20px;
            left: 20px;
            z-index: 100;
        }
        
        .scene-btn {
            background: rgba(255, 255, 255, 0.9);
            border: none;
            padding: 10px 15px;
            margin: 0 5px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            transition: all 0.3s ease;
        }
        
        .scene-btn:hover {
            background: rgba(255, 255, 255, 1);
            transform: translateY(-2px);
        }
        
        .scene-btn.active {
            background: #007bff;
            color: white;
        }
        
        .loading {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            font-size: 18px;
            z-index: 50;
        }
    </style>
</head>
<body>
    <div id="viewer">
        <div class="loading" id="loading">Loading 360° View...</div>
        
        <div class="scene-controls">
            <button class="scene-btn active" onclick="changeScene(0)">Scene 1</button>
            <button class="scene-btn" onclick="changeScene(1)">Scene 2</button>
            <button class="scene-btn" onclick="changeScene(2)">Scene 3</button>
        </div>
    </div>

    <!-- Photo Sphere Viewer JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/three/build/three.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@photo-sphere-viewer/core/index.min.js"></script>
    
    <!-- File JavaScript Custom -->
    <script src="{{ asset('resources/js/coba.js') }}"></script>
</body>
</html>