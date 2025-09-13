class MultiScene360Viewer {
    constructor() {
        this.currentSceneIndex = 0;
        this.viewer = null;
        this.scenes = [
            {
                name: 'Scene 1',
                panorama: '/assets/360-images/scene1.jpg',
                caption: 'Scene Pertama'
            },
            {
                name: 'Scene 2',
                panorama: '/assets/360-images/scene2.jpg',
                caption: 'Scene Kedua'
            },
            {
                name: 'Scene 3',
                panorama: '/assets/360-images/scene3.jpg',
                caption: 'Scene Ketiga'
            }
        ];
        
        this.init();
    }

    init() {
        try {
            // Inisialisasi Photo Sphere Viewer
            this.viewer = new PhotoSphereViewer.Viewer({
                container: document.querySelector('#viewer'),
                panorama: this.scenes[0].panorama,
                caption: this.scenes[0].caption,
                
                // Konfigurasi viewer
                navbar: [
                    'autorotate',
                    'zoom',
                    'fullscreen',
                    {
                        id: 'scene-info',
                        content: this.scenes[0].name,
                        className: 'custom-button',
                        disabled: true
                    }
                ],
                
                // Pengaturan kontrol
                mousewheelCtrlKey: false,
                defaultZoomLvl: 0,
                minFov: 30,
                maxFov: 90,
                
                // Pengaturuan auto-rotate
                autorotateDelay: 2000,
                autorotateSpeed: '2rpm',
                
                // Loading
                loadingImg: '/assets/360-images/loading.gif',
                loadingTxt: 'Loading...',
                
                // Kualitas rendering
                resolution: 64,
                
                // Transisi antar scene
                transition: {
                    duration: 1500,
                    showLoader: true
                }
            });

            // Event listeners
            this.setupEventListeners();
            
            // Sembunyikan loading setelah viewer siap
            this.viewer.once('ready', () => {
                document.getElementById('loading').style.display = 'none';
                console.log('360° Viewer ready');
            });

            // Handle error
            this.viewer.on('panorama-error', (err) => {
                console.error('Error loading panorama:', err);
                alert('Gagal memuat gambar 360°. Periksa path file.');
            });

        } catch (error) {
            console.error('Error initializing viewer:', error);
            document.getElementById('loading').innerHTML = 'Error loading viewer';
        }
    }

    setupEventListeners() {
        // Event ketika panorama selesai dimuat
        this.viewer.on('panorama-loaded', () => {
            console.log(`Scene ${this.currentSceneIndex + 1} loaded`);
        });

        // Event ketika posisi berubah
        this.viewer.on('position-updated', (e, position) => {
            // Anda bisa menambahkan logika khusus di sini
            // console.log('Position:', position);
        });

        // Event ketika zoom berubah
        this.viewer.on('zoom-updated', (e, zoomLevel) => {
            // console.log('Zoom level:', zoomLevel);
        });

        // Keyboard controls
        document.addEventListener('keydown', (e) => {
            switch(e.key) {
                case '1':
                    this.changeScene(0);
                    break;
                case '2':
                    this.changeScene(1);
                    break;
                case '3':
                    this.changeScene(2);
                    break;
                case 'ArrowLeft':
                    this.previousScene();
                    break;
                case 'ArrowRight':
                    this.nextScene();
                    break;
            }
        });
    }

    changeScene(sceneIndex) {
        if (sceneIndex < 0 || sceneIndex >= this.scenes.length) {
            console.warn('Invalid scene index:', sceneIndex);
            return;
        }

        if (sceneIndex === this.currentSceneIndex) {
            return;
        }

        // Update button aktif
        this.updateActiveButton(sceneIndex);

        // Ganti panorama
        this.viewer.setPanorama(this.scenes[sceneIndex].panorama, {
            caption: this.scenes[sceneIndex].caption,
            transition: true
        }).then(() => {
            this.currentSceneIndex = sceneIndex;
            console.log(`Switched to scene ${sceneIndex + 1}`);
            
            // Update navbar info
            const navbarBtn = this.viewer.navbar.getButton('scene-info');
            if (navbarBtn) {
                navbarBtn.container.innerHTML = this.scenes[sceneIndex].name;
            }
        }).catch((err) => {
            console.error('Error switching scene:', err);
            alert('Gagal mengganti scene');
        });
    }

    updateActiveButton(activeIndex) {
        const buttons = document.querySelectorAll('.scene-btn');
        buttons.forEach((btn, index) => {
            btn.classList.toggle('active', index === activeIndex);
        });
    }

    nextScene() {
        const nextIndex = (this.currentSceneIndex + 1) % this.scenes.length;
        this.changeScene(nextIndex);
    }

    previousScene() {
        const prevIndex = this.currentSceneIndex === 0 
            ? this.scenes.length - 1 
            : this.currentSceneIndex - 1;
        this.changeScene(prevIndex);
    }

    // Method untuk menambah scene baru secara dinamis
    addScene(scene) {
        this.scenes.push(scene);
        this.createSceneButton(this.scenes.length - 1);
    }

    createSceneButton(index) {
        const controlsContainer = document.querySelector('.scene-controls');
        const button = document.createElement('button');
        button.className = 'scene-btn';
        button.textContent = this.scenes[index].name;
        button.onclick = () => this.changeScene(index);
        controlsContainer.appendChild(button);
    }

    // Method untuk destroy viewer
    destroy() {
        if (this.viewer) {
            this.viewer.destroy();
            this.viewer = null;
        }
    }
}

// Function global untuk compatibility
function changeScene(sceneIndex) {
    if (window.multiScene360) {
        window.multiScene360.changeScene(sceneIndex);
    }
}

// Inisialisasi ketika DOM sudah ready
document.addEventListener('DOMContentLoaded', function() {
    // Inisialisasi Multi Scene 360 Viewer
    window.multiScene360 = new MultiScene360Viewer();
    
    // Optional: Tambahkan scene baru secara dinamis
    // setTimeout(() => {
    //     window.multiScene360.addScene({
    //         name: 'Scene 4',
    //         panorama: '/assets/360-images/scene4.jpg',
    //         caption: 'Scene Keempat'
    //     });
    // }, 3000);
});

// Handle page unload
window.addEventListener('beforeunload', function() {
    if (window.multiScene360) {
        window.multiScene360.destroy();
    }
});