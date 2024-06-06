class CustomSwiperManager {
    constructor() {
        document.addEventListener('DOMContentLoaded', () => {
            this.initSwipers();  
        });
    }



        initSwipers() {
            const vwInPixels = window.innerWidth * (3.25 / 100);

            const swipersConfig = [
            {
                selector: '.swiper-carousel',
                options: {
                    loop: false, 
                    centeredSlides: true,
                    slidesPerView: 1, 
                    spaceBetween: 0,
                    navigation: {
                        nextEl: '.swiper-button-next-1',
                        prevEl: '.swiper-button-prev-1',
                    },
                    effect: 'coverflow',
                    coverflowEffect: {
                        rotate: 0,
                        stretch: 0,
                        depth: 220,
                        modifier: 2,
                        slideShadows: false,
                    },
                    initialSlide: 1,
                    speed: 500, 
                    autoplay: {
                        delay: 3500,
                        disableOnInteraction: true,
                    },
                    breakpoints: {
                        1119: {
                            slidesPerView: 3,
                            spaceBetween: 0,
                            loop:false,
                            speed: 1500,
                            simulateTouch: false,  
                        }
                    },
                    on: {
                        init: function () {
                          setTimeout(function() {
                            AOS.refresh();  
                          }, 2000); 
                        }
                      }
                }
            },

            {
                selector: '.swiper-carousel-2',
                options: {
                    slideToClickedSlide: false,
                    grabCursor: false,
                    slidesPerView: 1,
                    spaceBetween: 32,
                    loop: false,
                    speed: 500,
                    navigation: {
                        nextEl: '.swiper-button-next-2',
                        prevEl: '.swiper-button-prev-2',
                    },
                    autoplay: {
                        delay: 3500,
                        disableOnInteraction: true,
                    },
                    simulateTouch: false,
                    breakpoints: {
                        1119: {
                            slidesPerView: 4,
                            spaceBetween: vwInPixels,
                            speed: 1500,
                        }
                    },
                    on: {
                        init: function () {
                          setTimeout(function() {
                            AOS.refresh();  
                          }, 2000); 
                        }
                      }
                }
            },

            {
                selector: '.swiper-carousel-3',
                options: {
                    slidesPerView: 1,
                    spaceBetween: 32,
                    loop: false,
                    speed: 500,
                    navigation: {
                        nextEl: '.swiper-button-next-3',
                        prevEl: '.swiper-button-prev-3',
                    },
                    autoplay: {
                        delay: 3500,
                        disableOnInteraction: true,
                    },
                    simulateTouch: false,
                    breakpoints: {
                        1119: {
                            slidesPerView: 3,
                            spaceBetween: 32,
                            speed: 1500,
                        }
                    },
                    on: {
                        init: function () {
                          setTimeout(function() {
                            AOS.refresh();  
                          }, 2000); 
                        }
                      }
                }
            },

            {
                selector: '.swiper-carousel-4',
                options: {
                    loop: false, 
                    centeredSlides: true,
                    slidesPerView: 1, 
                    spaceBetween: 0,
                    navigation: {
                        nextEl: '.swiper-button-next-4',
                        prevEl: '.swiper-button-prev-4',
                    },
                    effect: 'coverflow',
                    coverflowEffect: {
                        rotate: 0,
                        stretch: 0,
                        depth: 220,
                        modifier: 2,
                        slideShadows: false,
                    },
                    initialSlide: 1,
                    speed: 500,  
                    autoplay: {
                        delay: 3500,
                        disableOnInteraction: true,
                        pauseOnVisibilityChange: true,
                    },
                    simulateTouch: false,  
                    breakpoints: {
                        1119: {
                            slidesPerView: 3, 
                            spaceBetween: 0,
                            loop:false,
                            speed: 1500,
                        }
                    },
                    on: {
                        init: function () {
                          setTimeout(function() {
                            AOS.refresh();  
                          }, 2000); 
                        }
                      }
                }
            },

            {
                selector: '.swiper-carousel-5',
                options: {
                    slideToClickedSlide: false,
                    grabCursor: false,
                    slidesPerView: 1,
                    spaceBetween: 32,
                    loop: false,
                    speed: 500,
                    navigation: {
                        nextEl: '.swiper-button-next-5',
                        prevEl: '.swiper-button-prev-5',
                    },
                    autoplay: {
                        delay: 3500,
                        disableOnInteraction: true,
                    },
                    simulateTouch: false,
                    breakpoints: {
                        1119: {
                            slidesPerView: 3,
                            spaceBetween: 32,
                            speed: 1500,
                        }
                    },
                    on: {
                        init: function () {
                          setTimeout(function() {
                            AOS.refresh();  
                          }, 2000); 
                        }
                      }
                }
            },

            {
                selector: '.swiper-carousel-6',
                options: {
                    // slideToClickedSlide: false,
                    // grabCursor: false,
                    slidesPerView: 1,
                    spaceBetween: 32,
                    loop: false,
                    speed: 500,
                    navigation: {
                        nextEl: '.swiper-button-next-6',
                        prevEl: '.swiper-button-prev-6',
                    },
                    autoplay: {
                        delay: 3500,
                        disableOnInteraction: true,
                    },
                    // simulateTouch: false,   
                    breakpoints: {
                        1119: {
                            slidesPerView: 3,
                            spaceBetween: 124,
                            speed: 1500,
                        }
                    },
                    on: {
                        init: function () {
                          setTimeout(function() {
                            AOS.refresh();  
                          }, 2000); 
                        }
                      }
                }
            },

            {
                selector: '.swiper-carousel-7',
                options: {
                    slideToClickedSlide: false,
                    grabCursor: false, 
                    slidesPerView: 1,
                    loop: false,
                    speed: 500,
                    spaceBetween: 64,
                    navigation: {
                        nextEl: '.swiper-button-next-7',
                        prevEl: '.swiper-button-prev-7',
                    },
                    autoplay: {
                        delay: 3500,
                        disableOnInteraction: true,
                    },
                    simulateTouch: false,
                    breakpoints: {
                        1119: {
                            speed: 1500,
                        }
                    },
                    on: {
                        init: function () {
                          setTimeout(function() {
                            AOS.refresh();  
                          }, 2000); 
                        }
                      }
                }
            },

            {
                selector: '.swiper-carousel-8',
                options: {
                    slideToClickedSlide: false,
                    grabCursor: false,
                    slidesPerView: 1,
                    loop: false,
                    speed: 500,
                    spaceBetween: 16,
                    watchSlidesProgress: true, 
                    navigation: {
                        nextEl: '.swiper-button-next-8',
                        prevEl: '.swiper-button-prev-8',
                    },
                    autoplay: {
                        delay: 3500,
                        disableOnInteraction: true,
                    },
                    simulateTouch: false,
                    breakpoints: {
                        1119: {
                            slidesPerView: 4,
                            spaceBetween: 64,
                            speed: 1500,
                        }
                    },
                    on: {
                        init: function () {
                          setTimeout(function() {
                            AOS.refresh();  
                          }, 2000); 
                        }
                      }
                }
            },

            {
                selector: '.swiper-carousel-9',
                options: {
                    slideToClickedSlide: false,
                    grabCursor: false,
                    slidesPerView: 1,
                    loop: false,
                    speed: 500,
                    spaceBetween: 16,
                    navigation: {
                        nextEl: '.swiper-button-next-9',
                        prevEl: '.swiper-button-prev-9',
                    },
                    autoplay: {
                        delay: 3500,
                        disableOnInteraction: true,
                    },
                    simulateTouch: false,
                    breakpoints: {
                        1119: {
                            slidesPerView: 3,  
                            spaceBetween: 16,
                            speed: 1500,
                        }
                    },
                    on: {
                        init: function () {
                          setTimeout(function() {
                            AOS.refresh();  
                          }, 2000); 
                        }
                      }
                }
            },

            {
                selector: '.courses-swiper',
                options: {
                    slidesPerView: 1,
                    spaceBetween: 32,
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev',
                    },
                    breakpoints: {
                        1119: {
                            slidesPerView: 4,
                            spaceBetween: 32
                        }
                    },
                    on: {
                        init: function () {
                          setTimeout(function() {
                            AOS.refresh();  
                          }, 2000); 
                        }
                      }
                }
            },
            
            {
                selector: '.swiper-icons-and-text',
                options: {
                    slidesPerView: 1,
                    spaceBetween: 16,
                    speed: 500,
                    navigation: {
                        nextEl: '.swiper-button-next-4',
                        prevEl: '.swiper-button-prev-4',
                    },
                    breakpoints: {
                        1119: {
                            slidesPerView: 3,
                            spaceBetween: 0
                        }
                    },
                    on: {
                        init: function () {
                          setTimeout(function() {
                            AOS.refresh();  
                          }, 2000); 
                        }
                      }
                }
            },

            {
                selector: '.swiper-icons-and-text-5',
                options: {
                    slidesPerView: 1,
                    spaceBetween: 32,
                    speed: 500,
                    navigation: {
                        nextEl: '.swiper-button-next-5',
                        prevEl: '.swiper-button-prev-5',
                    },
                    breakpoints: {
                        1119: {
                            slidesPerView: 4,
                            spaceBetween: 48
                        }
                    },
                    on: {
                        init: function () {
                          setTimeout(function() {
                            AOS.refresh();  
                          }, 2000); 
                        }
                      }
                }
            },

            {
                selector: '.swiper-similar-posts', 
                options: {
                    slidesPerView: 1,
                    spaceBetween: 16,
                    speed: 500,
                    loop: false,
                    navigation: {
                        nextEl: '.swiper-button-next-5',
                        prevEl: '.swiper-button-prev-5',
                    },
                    breakpoints: {
                        1119: {
                            slidesPerView: 2,
                            spaceBetween: 124
                        }
                    },
                    on: {
                        init: function () {
                          setTimeout(function() {
                            AOS.refresh();  
                          }, 2000); 
                        }
                      }
                }
            },

            {
                selector: '.swiper-similar-products',
                options: {
                    slidesPerView: 1,
                    spaceBetween: 32,
                    speed: 500,
                    loop: false,
                    navigation: {
                        nextEl: '.swiper-button-next-4',
                        prevEl: '.swiper-button-prev-4', 
                    },
                    breakpoints: {
                        1119: {
                            slidesPerView: 2,
                            spaceBetween: 143
                        }
                    },
                    on: {
                        init: function () {
                          setTimeout(function() {
                            AOS.refresh();  
                          }, 2000);  
                        }
                      }
                }
            }
        ];

        this.initMultipleSwipers(swipersConfig);

         }  


    initMultipleSwipers(swipersConfig) {
        const windowWidth = window.innerWidth;

        swipersConfig.forEach(config => {
            if (config.selector === '.swiper-carousel-9' && windowWidth <= 767) {
                // Do not initialize Swiper for '.swiper-carousel-9' if window width is <= 767
                return;
            }
    
            // Zmiana na querySelectorAll i pętla po wszystkich elementach
            let swiperElements = document.querySelectorAll(config.selector);
            swiperElements.forEach(swiperElement => {
                let swiper = new Swiper(swiperElement, config.options);
    
                // Intersection Observer to manage autoplay when the swiper is visible
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            swiper.autoplay.start();
                        } else {
                            swiper.autoplay.stop(); 
                        }
                    });
                }, { threshold: 0.5 }); // Trigger when 50% visible
    
                observer.observe(swiperElement);
            });
        });
    }
    
}   

new CustomSwiperManager();
