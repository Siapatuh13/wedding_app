import './bootstrap';
import Alpine from 'alpinejs';

// Import external libraries
import L from 'leaflet';
import 'leaflet/dist/leaflet.css';

window.Alpine = Alpine;
Alpine.start();

// Wedding App functionality
class WeddingApp {
    constructor() {
        this.init();
    }

    init() {
        document.addEventListener('DOMContentLoaded', () => {
            this.initMaps();
            this.initCarousel();
            this.initNavigation();
            this.initWishes();
        });
    }

    // Maps functionality
    initMaps() {
        // Custom wedding heart icon
        const weddingIcon = L.divIcon({
            html: '<div style="background-color: #F5EFEB; border: 3px solid #567C8D; border-radius: 50%; width: 30px; height: 30px; display: flex; align-items: center; justify-content: center; box-shadow: 0 2px 8px rgba(0,0,0,0.2);"><span style="color: #567C8D; font-size: 16px;">♥</span></div>',
            iconSize: [30, 30],
            iconAnchor: [15, 15],
            popupAnchor: [0, -15],
            className: 'wedding-marker'
        });

        // Reception Map
        if (document.getElementById('receptionMap')) {
            const receptionMap = L.map('receptionMap', {
                zoomControl: true,
                scrollWheelZoom: false,
                attributionControl: false
            }).setView([3.603372366320696, 98.67011136331449], 17);

            L.tileLayer('https://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
                maxZoom: 20,
                subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
                attribution: '© Google'
            }).addTo(receptionMap);

            L.marker([3.603372366320696, 98.67011136331449], { icon: weddingIcon })
                .addTo(receptionMap)
                .bindPopup(`
                    <div style="text-align: center; font-family: 'Playfair Display', serif;">
                        <h3 style="margin: 0; color: #567C8D; font-size: 18px;">Wedding Reception</h3>
                        <p style="margin: 5px 0; color: #567C8D;">Regale Int'l Convention Centre</p>
                        <p style="margin: 0; color: #567C8D; font-size: 14px;">Medan, Sumatera Utara</p>
                    </div>
                `);

            receptionMap.on('click', () => receptionMap.scrollWheelZoom.enable());
            receptionMap.on('mouseout', () => receptionMap.scrollWheelZoom.disable());
        }
    }

    // Carousel functionality
    initCarousel() {
        const carouselItems = document.getElementById('carousel-items');
        if (!carouselItems) return;

        const dots = document.querySelectorAll('.dot');
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');
        const totalItems = dots.length;
        let currentIndex = 0;
        let autoSlide;

        const updateCarousel = () => {
            carouselItems.style.transform = `translateX(-${currentIndex * 100}%)`;
            dots.forEach((dot, index) => {
                if (index === currentIndex) {
                    dot.style.backgroundColor = '#F5EFEB';
                    dot.style.boxShadow = '0 0 0 2px rgba(255,255,255,0.5)';
                } else {
                    dot.style.backgroundColor = 'rgba(255,255,255,0.4)';
                    dot.style.boxShadow = 'none';
                }
            });
        };

        const nextSlide = () => {
            currentIndex = (currentIndex + 1) % totalItems;
            updateCarousel();
        };

        const prevSlide = () => {
            currentIndex = (currentIndex - 1 + totalItems) % totalItems;
            updateCarousel();
        };

        const startAutoSlide = () => {
            autoSlide = setInterval(nextSlide, 4000);
        };

        const stopAutoSlide = () => {
            clearInterval(autoSlide);
        };

        // Event listeners
        nextBtn?.addEventListener('click', () => {
            stopAutoSlide();
            nextSlide();
            startAutoSlide();
        });

        prevBtn?.addEventListener('click', () => {
            stopAutoSlide();
            prevSlide();
            startAutoSlide();
        });

        dots.forEach(dot => {
            dot.addEventListener('click', function() {
                stopAutoSlide();
                currentIndex = parseInt(this.getAttribute('data-index'));
                updateCarousel();
                startAutoSlide();
            });
        });

        updateCarousel();
        startAutoSlide();
    }

    // Navigation functionality
    initNavigation() {
        // Smooth scrolling
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    const offset = window.innerWidth >= 1024 ? 80 : 0;
                    const targetPosition = target.offsetTop - offset;
                    
                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Active navigation highlighting
        const updateActiveNav = () => {
            const sections = document.querySelectorAll('section[id]');
            const navLinks = document.querySelectorAll('.nav-link, .nav-link-mobile');
            
            let currentSection = '';
            const offset = window.innerWidth >= 1024 ? 100 : 50;
            
            // Find which section is currently in view
            for (const section of sections) {
                const sectionTop = section.offsetTop - offset;
                const sectionHeight = section.offsetHeight;
                if (window.scrollY >= sectionTop && window.scrollY < sectionTop + sectionHeight) {
                    currentSection = section.getAttribute('id');
                    break; // Exit loop once we find the current section
                }
            }
            
            // If we're past all sections and scrolled down, use the last section
            if (currentSection === '' && sections.length > 0 && window.scrollY > 0) {
                const lastSection = sections[sections.length - 1];
                currentSection = lastSection.getAttribute('id');
            }
            
            // Reset all links to default state first
            navLinks.forEach(link => {
                link.style.color = '#567C8D';
                link.style.fontWeight = '500';
                // No background change - removed as requested
            });
            
            // Only highlight the current section's link
            if (currentSection) {
                navLinks.forEach(link => {
                    const href = link.getAttribute('href');
                    if (href && href.includes('#' + currentSection)) {
                        link.style.color = '#2F4156';
                        link.style.fontWeight = '600';
                        // No background change for active state
                    }
                });
            }
        };

        window.addEventListener('scroll', updateActiveNav);
        updateActiveNav();
    }

    // Add this method to the WeddingApp class in app.js
    async initWishes() {
        const wishesGrid = document.getElementById('wishesGrid');
        if (!wishesGrid) return;

        let allWishes = [];

        try {
            // Fetch wishes from API
            const response = await fetch('/api/wishes');
            const data = await response.json();
            allWishes = data.wishes;
            
        } catch (error) {
            console.log('Could not load wishes from API');
        }

        if (allWishes.length === 0) {
            wishesGrid.innerHTML = `
                <div class="col-span-2 flex items-center justify-center">
                    <p class="text-lg text-gray-500">No wishes yet. Be the first to share your love!</p>
                </div>
            `;
            return;
        }

        const createWishCard = (wish, index) => {
            return `
                <div class="wish-card" data-index="${index}">
                    <div class="wish-message">${wish.message}</div>
                    <div class="wish-author">— ${wish.author}</div>
                </div>
            `;
        };

        const getRandomWishes = (count = 4) => {
            if (allWishes.length <= count) return allWishes;
            const shuffled = [...allWishes].sort(() => 0.5 - Math.random());
            return shuffled.slice(0, count);
        };

        const displayWishes = () => {
            const wishes = getRandomWishes(4);
            wishesGrid.innerHTML = wishes.map((wish, index) => createWishCard(wish, index)).join('');
            
            // Animate in
            setTimeout(() => {
                document.querySelectorAll('.wish-card').forEach((card, index) => {
                    setTimeout(() => {
                        card.classList.add('show');
                    }, index * 200);
                });
            }, 100);
        };

        const rotateWishes = () => {
            if (allWishes.length <= 4) return; // Don't rotate if we have 4 or fewer wishes
            
            const cards = document.querySelectorAll('.wish-card');
            if (cards.length === 0) return;
        
            // Pick one random card to replace
            const randomIndex = Math.floor(Math.random() * cards.length);
            const cardToReplace = cards[randomIndex];
            
            // Get a new random wish that's not currently displayed
            const currentMessages = Array.from(cards).map(card => 
                card.querySelector('.wish-message').textContent
            );
            
            const availableWishes = allWishes.filter(wish => 
                !currentMessages.includes(wish.message)
            );
            
            if (availableWishes.length > 0) {
                const newWish = availableWishes[Math.floor(Math.random() * availableWishes.length)];
                
                // Hide the selected card
                cardToReplace.classList.remove('show');
                cardToReplace.classList.add('hide');
        
                // Replace content immediately and show new card
                setTimeout(() => {
                    cardToReplace.outerHTML = createWishCard(newWish, randomIndex);
                    
                    // Immediately show the new card
                    const newCard = wishesGrid.querySelector(`[data-index="${randomIndex}"]`);
                    if (newCard) {
                        newCard.classList.add('show');
                    }
                }, 300);
            }
        };
        
        // Initial display
        displayWishes();

        // Rotate one wish every 3 seconds (only if we have more than 4 wishes)
        if (allWishes.length > 4) {
            setInterval(rotateWishes, 3000);
        }
    }
}

// Initialize the app
new WeddingApp();