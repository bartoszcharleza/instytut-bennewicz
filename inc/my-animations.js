gsap.registerPlugin(ScrollTrigger, ScrollSmoother);
gsap.config({
    nullTargetWarn: false,
});

let mm = gsap.matchMedia();

// add a media query. When it matches, the associated function will run
mm.add("(min-width: 1119px)", () => {

    // create the smooth scroller FIRST!
    let smoother = ScrollSmoother.create({
        smooth: 2,
        effects: true,
        normalizeScroll: true
    });

    return () => { // optional
        // custom cleanup code here (runs when it STOPS matching)
    };
});

document.querySelectorAll('a[href*="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        let hash = new URL(this.getAttribute('href')).hash;
        let targetSection = document.querySelector(hash);

        // Jeśli sekcja docelowa istnieje na bieżącej stronie, przewiń do niej
        if (targetSection) {
            e.preventDefault();
            gsap.to(window, {
                duration: 1,
                scrollTo: {
                    y: targetSection,
                    offsetY: 100 // Jeśli potrzebujesz dodatkowego przesunięcia, np. dla paska nawigacji
                },
                ease: "power2.inOut"
            });
        }
        // Jeśli sekcja docelowa nie istnieje na bieżącej stronie, pozwól przeglądarce przejść do odpowiedniej strony
        else {
            // Nic nie rób, pozwól przeglądarce normalnie obsłużyć kliknięcie w link
        }
    });
});
