class App {
    /**
     * Animations On entrance
     */
    initAoe() {
        if (window.IntersectionObserver) {
            aoe({ once: true });
        } else {
            document.body.classList.add('safari')
        }
    }
    /**
     * Class toggler
     */
    activeClassToggler() {
        const togglers = document.querySelectorAll('.-js-toggler');
        if (togglers) {
            togglers.forEach(toggler => {
                toggler.addEventListener('click', () => {
                    toggler.classList.toggle('active');
                });
            });
        }
    }

    /**
    * Execute on page ready
    */
    pageReady() {
        document.body.classList.add('loaded')
        document.body.classList.remove("preload"); 
    }

    reinit() {
        this.initAoe();
    }

    init() {
        this.reinit();
        this.activeClassToggler();
        this.pageReady();
    }
}
const app = new App();
app.init();