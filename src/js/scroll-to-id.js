class SmoothScrollManager {
    constructor() {
        this.initEvents();
    }

    initEvents() {
        document.addEventListener('DOMContentLoaded', () => {
            this.setupLinkEvents();
        });
    }

    setupLinkEvents() {
        document.querySelectorAll('a[href^="#"]').forEach((link) => {
            link.addEventListener('click', (event) => {
                event.preventDefault();
                const targetId = link.getAttribute('href');
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    this.scrollToTarget(targetElement);
                }
            });
        });
    }

    scrollToTarget(targetElement) {
        const targetPosition = targetElement.getBoundingClientRect().top + window.pageYOffset - 5;  
        window.scrollTo({
            top: targetPosition,
            behavior: 'smooth'
        });
    }
}

new SmoothScrollManager(); 