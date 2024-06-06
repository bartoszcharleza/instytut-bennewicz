class Cookies {
    constructor(element) {
        this.element = element;
        this.acceptButton = element.querySelector('.js-cookies__accept-button');

        this.acceptButton.addEventListener('click', () => this.handleAccept());

        if (this.checkCookie() === false) {
            this.open();
        }
    }

    open() {
        this.element.classList.add('is-visible');
    }

    close() {
        this.element.classList.remove('is-visible');
    }

    handleAccept() {
        this.setCookie();
        this.close();
    }

    setCookie() {
        const date = new Date();
        date.setTime(date.getTime() + (365 * 24 * 60 * 60 * 1000));
        document.cookie = 'cookieConsent=all; expires=' + date.toGMTString();
    }

    checkCookie() {
        const cookie = document.cookie.split(';');
        const cookieConsent = cookie.find(cookie => cookie.includes('cookieConsent'));

        if (cookieConsent) {
            return true;
        } else {
            return false;
        }
    }
}

document.addEventListener('DOMContentLoaded', () => {
    const element = document.querySelector('.js-cookies');

    if (element) {
        new Cookies(element);
    }
});