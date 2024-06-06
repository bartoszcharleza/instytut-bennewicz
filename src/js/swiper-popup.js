class PopupManager {
    constructor() {
        this.initEvents();
    }

    initEvents() {
        document.addEventListener('DOMContentLoaded', () => {
            this.setupLinkEvents();
            this.setupCloseButtonEvents();
        });
    }

    setupLinkEvents() {
        document.addEventListener('click', function(event) {
            const target = event.target.closest('a[data-slide-number]');
            if (target) {
                event.preventDefault();
                const slideNumber = target.getAttribute('data-slide-number');
                const popup = document.querySelector(`.popup[data-slide-number="${slideNumber}"]`);
                if (popup) {
                    popup.classList.add('is-visible');
                }
            }
        });  
    }

    setupCloseButtonEvents() {
        document.querySelectorAll('.popup-close').forEach((closeButton) => {
            closeButton.addEventListener('click', () => {
                const popup = closeButton.closest('.popup');  
                if (popup) { 
                    popup.classList.remove('is-visible');   
                }
            });
        });
    }
}

new PopupManager();    
