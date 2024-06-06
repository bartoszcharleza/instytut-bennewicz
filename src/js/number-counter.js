class NumberAnimationManager {
    constructor() {
        document.addEventListener('DOMContentLoaded', this.init.bind(this));
    }

    init() {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => this.animateNumber(entry));
        }, { threshold: 0.1 });

        document.querySelectorAll('.number').forEach(number => observer.observe(number));
    }

    animateNumber(entry) {
        const numberSpan = entry.target.querySelector('.number__number > span');
        const targetNumber = parseInt(numberSpan.getAttribute('data-number'), 10);
        const speed = parseFloat(entry.target.getAttribute('data-speed')) || 1.0;

        if (entry.isIntersecting) {
            let currentNumber = 0;
            const incrementStep = targetNumber / (200 * speed);
            const intervalTime = 10; 

            const interval = setInterval(() => {
                currentNumber += incrementStep;
                if (currentNumber > targetNumber) {
                    currentNumber = targetNumber;
                    clearInterval(interval);
                }
                numberSpan.textContent = Math.floor(currentNumber);
            }, intervalTime);

            entry.target.dataset.animated = 'true';
            entry.target.classList.add('animated'); 
            observer.unobserve(entry.target);
        }
    }
}

new NumberAnimationManager();

class NumberAnimationObserver {
    constructor(selector) {
        this.selector = selector;
        this.init();
    }

    init() {
        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    this.animateNumber(entry.target, observer);
                }
            });
        }, { threshold: 0.1 });

        document.addEventListener("DOMContentLoaded", () => {
            document.querySelectorAll(this.selector).forEach(element => {
                observer.observe(element);
            });
        });
    }

    animateNumber(target, observer) {
        const numberSpan = target.querySelector('.icons-and-text-item-number-counter');
        const targetNumber = parseInt(numberSpan.getAttribute('data-number'), 10);
        const speed = parseFloat(target.getAttribute('data-speed')) || 1.0;
        let currentNumber = 0;

        const incrementStep = targetNumber / (200 * speed);
        const intervalTime = 10; // milliseconds

        const interval = setInterval(() => {
            currentNumber += incrementStep;
            if (currentNumber > targetNumber) {
                currentNumber = targetNumber;
                clearInterval(interval);
            }
            numberSpan.textContent = Math.floor(currentNumber);
        }, intervalTime);

        observer.unobserve(target);
    }
}

new NumberAnimationObserver('.icons-and-text-item-text');

class AnimatedNumberObserver {
    constructor() {
        this.observeElements();
    }

    observeElements() {
        document.addEventListener("DOMContentLoaded", () => {
            const observer = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        this.animateNumber(entry.target, observer);
                    }
                });
            }, { threshold: 0.1 });

            document.querySelectorAll('.number').forEach(number => {
                observer.observe(number);
            });
        });
    }

    animateNumber(target, observer) {
        const numberSpan = target.querySelector('.number__number > span');
        const targetNumber = parseInt(numberSpan.getAttribute('data-number'), 10);
        const speed = parseFloat(target.getAttribute('data-speed')) || 1.0;
        let currentNumber = 0;

        // Adjust these values to control the speed and smoothness
        const incrementStep = targetNumber / (200 * speed);
        const intervalTime = 10; // milliseconds

        const interval = setInterval(() => {
            currentNumber += incrementStep;
            if (currentNumber > targetNumber) {   
                currentNumber = targetNumber;
                clearInterval(interval);
            }
            numberSpan.textContent = Math.floor(currentNumber);
        }, intervalTime);

        observer.unobserve(target);
    }
}

// Instantiate the class to apply the animation 
new AnimatedNumberObserver();


