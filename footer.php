<?php get_template_part('partials/footer'); ?>
<?php wp_footer(); ?>

<div class="circles circles--global">
    <div class="circle"></div>
    <div class="circle"></div>
    <div class="circle"></div>
    <div class="circle"></div>
    <div class="circle"></div>
</div>
</main>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({
        // Global settings:
        disable: false, // accepts following values: 'phone', 'tablet', 'mobile', boolean, expression or function
        startEvent: 'DOMContentLoaded', // name of the event dispatched on the document, that AOS should initialize on
        initClassName: 'aos-init', // class applied after initialization
        animatedClassName: 'aos-animate', // class applied on animation
        useClassNames: false, // if true, will add content of `data-aos` as classes on scroll
        disableMutationObserver: false, // disables automatic mutations' detections (advanced)
        debounceDelay: 50, // the delay on debounce used while resizing window (advanced)
        throttleDelay: 99, // the delay on throttle used while scrolling the page (advanced)


        offset: 0, // offset (in px) from the original trigger point
        delay: 0, // values from 0 to 3000, with step 50ms
        duration: 2500, // values from 0 to 3000, with step 50ms
        easing: 'ease', // default easing for AOS animations
        once: false, // whether animation should happen only once - while scrolling down
        mirror: false, // whether elements should animate out while scrolling past them
        anchorPlacement: 'top-bottom', // defines which position of the element regarding to window should trigger the animation

    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const paragraphs = document.querySelectorAll('p');
        paragraphs.forEach(function(paragraph) {
            let html = paragraph.innerHTML;
            // Usuwa wielokrotne spacje
            html = html.replace(/  +/g, ' ');
            // Zastępuje pojedyncze litery twardą spacją
            html = html.replace(/\s(a|i|o|u|w|z)\s/g, function(match, p1) {
                return ` ${p1}&nbsp;`;
            });
            paragraph.innerHTML = html;
        });
    });
</script>
</body>

</html>