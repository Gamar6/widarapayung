import { Viewer } from 'photo-sphere-viewer';
import { MarkersPlugin } from 'photo-sphere-viewer/dist/plugins/markers';
import 'photo-sphere-viewer/dist/photo-sphere-viewer.css';

document.addEventListener("DOMContentLoaded", () => {
  const container = document.getElementById('viewer');

  if (!container) {
    console.error('Element dengan ID "viewer" tidak ditemukan!');
    return;
  }

  console.log('Inisialisasi Photo Sphere Viewer...');

  // Test path gambar yang berbeda - sesuaikan dengan struktur folder Anda
  const imagePaths = {
    // Coba path yang berbeda sesuai struktur Laravel
    scene1: '/img/360/scene1.jpg',           // Path asli
    scene2: '/img/360/scene2.jpg',
    
    // Alternatif path jika menggunakan Laravel public folder
    // scene1: '/storage/360/scene1.jpg',
    // scene2: '/storage/360/scene2.jpg',
    
    // Atau jika di public/assets
    // scene1: '/assets/360/scene1.jpg',
    // scene2: '/assets/360/scene2.jpg'
  };

  // Konfigurasi viewer dengan error handling yang lebih baik
  let viewer;
  
  try {
    viewer = new Viewer({
      container: container,
      panorama: imagePaths.scene1,
      caption: 'Panorama Ruang 1',
      plugins: [
        [MarkersPlugin]
      ],
      // Opsi tambahan untuk debugging
      loadingTxt: 'Memuat panorama...',
      navbar: ['zoom', 'move', 'fullscreen']
    });

    console.log('Viewer berhasil dibuat');
  } catch (error) {
    console.error('Error membuat viewer:', error);
    return;
  }

  const markersPlugin = viewer.getPlugin(MarkersPlugin);
  let currentScene = 'room1';

  // Fungsi untuk menambahkan markers dengan error handling
  function addMarkersToScene(sceneKey) {
    console.log('Menambahkan markers untuk scene:', sceneKey);
    
    // Clear existing markers
    markersPlugin.clearMarkers();

    if (sceneKey === 'room1') {
      // Marker untuk ke ruang 2
      try {
        markersPlugin.addMarker({
          id: 'to-room2',
          longitude: Math.PI / 6,  // 30 derajat dalam radian
          latitude: 0,             // Horizontal
          image: 'https://cdn-icons-png.flaticon.com/512/25/25694.png',
          width: 50,
          height: 50,
          anchor: 'bottom center',
          tooltip: 'Klik untuk ke Ruang 2'
        });
        console.log('✅ Marker to-room2 berhasil ditambahkan');
      } catch (error) {
        console.error('❌ Error menambahkan marker to-room2:', error);
      }

      // Marker tambahan untuk testing (posisi berbeda)
      try {
        markersPlugin.addMarker({
          id: 'test-marker1',
          longitude: -Math.PI / 4,  // -45 derajat
          latitude: Math.PI / 12,   // 15 derajat ke atas
          image: 'https://cdn-icons-png.flaticon.com/512/189/189665.png',
          width: 40,
          height: 40,
          anchor: 'center center',
          tooltip: 'Test Marker 1'
        });
        console.log('✅ Test marker 1 berhasil ditambahkan');
      } catch (error) {
        console.error('❌ Error menambahkan test marker 1:', error);
      }

    } else if (sceneKey === 'room2') {
      // Marker untuk kembali ke ruang 1
      try {
        markersPlugin.addMarker({
          id: 'to-room1',
          longitude: Math.PI,      // 180 derajat (belakang)
          latitude: 0,
          image: 'https://cdn-icons-png.flaticon.com/512/25/25694.png',
          width: 50,
          height: 50,
          anchor: 'bottom center',
          tooltip: 'Kembali ke Ruang 1'
        });
        console.log('✅ Marker to-room1 berhasil ditambahkan');
      } catch (error) {
        console.error('❌ Error menambahkan marker to-room1:', error);
      }
    }
  }

  // Fungsi untuk ganti scene
  function changeScene(targetScene) {
    console.log('Mengganti scene ke:', targetScene);
    
    const panoramaPath = targetScene === 'room1' ? imagePaths.scene1 : imagePaths.scene2;
    const caption = targetScene === 'room1' ? 'Panorama Ruang 1' : 'Panorama Ruang 2';
    
    viewer.setPanorama(panoramaPath)
      .then(() => {
        console.log('✅ Panorama berhasil dimuat:', panoramaPath);
        viewer.setCaption(caption);
        currentScene = targetScene;
        
        // Tambahkan markers setelah panorama dimuat
        setTimeout(() => {
          addMarkersToScene(targetScene);
        }, 500); // Delay untuk memastikan panorama fully loaded
        
      })
      .catch(error => {
        console.error('❌ Error memuat panorama:', panoramaPath, error);
        alert(`Gagal memuat panorama: ${panoramaPath}\nPastikan file gambar ada di lokasi yang benar.`);
      });
  }

  // Event listener untuk marker clicks
  markersPlugin.on('select-marker', (e, marker) => {
    console.log('Marker diklik:', marker.id);
    
    switch (marker.id) {
      case 'to-room2':
        changeScene('room2');
        break;
      case 'to-room1':
        changeScene('room1');
        break;
      case 'test-marker1':
        alert('Test marker diklik! Markers berfungsi dengan baik.');
        break;
      default:
        console.log('Unknown marker:', marker.id);
    }
  });

  // Hover effects
  markersPlugin.on('over-marker', (e, marker) => {
    console.log('Hover over marker:', marker.id);
    if (marker.element) {
      marker.element.style.transform = 'scale(1.3)';
      marker.element.style.transition = 'transform 0.2s ease';
    }
  });

  markersPlugin.on('leave-marker', (e, marker) => {
    if (marker.element) {
      marker.element.style.transform = 'scale(1)';
    }
  });

  // Setelah viewer ready
  viewer.once('ready', () => {
    console.log('🎉 Viewer siap! Menambahkan markers...');
    addMarkersToScene('room1');
  });

  // Error handling untuk panorama
  viewer.on('panorama-error', (err) => {
    console.error('❌ Panorama error:', err);
    alert('Error memuat panorama. Cek console untuk detail.');
  });

  // Keyboard shortcuts untuk testing
  document.addEventListener('keydown', (e) => {
    switch(e.key) {
      case '1':
        console.log('Keyboard: Ke scene 1');
        changeScene('room1');
        break;
      case '2':
        console.log('Keyboard: Ke scene 2');  
        changeScene('room2');
        break;
      case 't':
        console.log('Testing markers visibility...');
        console.log('Current markers:', markersPlugin.getMarkers());
        break;
    }
  });

  // Global access untuk debugging
  window.viewer360Debug = {
    viewer,
    markersPlugin,
    changeScene,
    currentScene: () => currentScene,
    addMarkersToScene,
    testMarker: () => {
      // Fungsi untuk test marker secara manual
      markersPlugin.addMarker({
        id: 'debug-marker',
        longitude: 0,
        latitude: 0,
        image: 'https://cdn-icons-png.flaticon.com/512/60/60758.png',
        width: 60,
        height: 60,
        anchor: 'center center',
        tooltip: 'DEBUG MARKER - CENTER'
      });
      console.log('Debug marker ditambahkan di tengah');
    },
    clearMarkers: () => {
      markersPlugin.clearMarkers();
      console.log('Semua markers dihapus');
    }
  };

  console.log('✅ Setup selesai. Gunakan window.viewer360Debug untuk debugging');
  console.log('Keyboard shortcuts: 1=Scene1, 2=Scene2, t=Test markers');
});