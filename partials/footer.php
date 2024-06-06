<footer class="section footer">
    <div data-aos="fade-up" class="section-container">
        <div class="footer__menu">
            <?php wp_nav_menu(['theme_location' => 'footer', 'container' => false]); ?>
            <?php get_template_part('partials/social-media'); ?>
        </div>
        <div class="footer__author">
            <a href="https://www.websitestyle.pl/">Websitestyle - Strony Internetowe</a>


            <button id="scrollToTopButton" onclick="scrollToTop()" aria-label="Przewiń do góry"> <svg xmlns="http://www.w3.org/2000/svg" width="28.667" height="28.666" viewBox="0 0 28.667 28.666">
                    <path id="Path_11868" data-name="Path 11868" d="M16.333,2A14.333,14.333,0,1,1,2,16.333,14.338,14.338,0,0,1,16.333,2Zm0,25.8A11.467,11.467,0,1,0,4.867,16.333,11.463,11.463,0,0,0,16.333,27.8Zm1.433-11.467h4.3l-5.733,5.733L10.6,16.333h4.3V10.6h2.867Z" transform="translate(30.667 30.666) rotate(180)" fill="#EF9700" />
                </svg></button>

            <script>
                function scrollToTop() {
                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });
                }

                window.onscroll = function() {
                    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                        document.getElementById("scrollToTopButton").style.display = "block";
                    } else {
                        document.getElementById("scrollToTopButton").style.display = "none";
                    }
                };
            </script>

        </div>
        <div class="footer__docs"><a href="/regulamin">Regulamin</a> | <a href="/polityka-prywatnosci">Polityka prywatności</a></div>

    </div>
</footer>