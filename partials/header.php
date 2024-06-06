<?php $logo = get_field('logo', 'options');
?>
<header class="l-header">
    <div class="l-header__container l-container">

        <?php if ($logo) : ?>
            <a class="l-header__branding" href="<?= get_site_url(); ?>" title="Przejdź do strony głównej">
                <?= wp_get_attachment_image($logo['id'], 'full', false, ['loading' => false]); ?>
            </a>
        <?php endif; ?>

        <div class="l-header__menu">
            <?php wp_nav_menu(['theme_location' => 'header', 'container' => false]); ?>
            <div class="burger"><span></span><span></span><span></span></div>
            <?php get_template_part('partials/social-media');
            ?>
            <a class="cart" href="/koszyk/">
                <svg xmlns="http://www.w3.org/2000/svg" width="31" height="27.221" viewBox="0 0 31 27.221">
                    <path id="Path_18366" data-name="Path 18366" d="M22.722,3.44,27.7,12.061H33v3.1H31.2L30.023,29.24a1.55,1.55,0,0,1-1.545,1.421H6.531A1.55,1.55,0,0,1,4.986,29.24L3.812,15.161H2v-3.1h5.3L12.288,3.44l2.685,1.55-4.083,7.071H24.119L20.038,4.99Zm5.363,11.721H6.923l1.034,12.4H27.051Zm-9.03,3.1v6.2h-3.1v-6.2Zm-6.2,0v6.2h-3.1v-6.2Zm12.4,0v6.2h-3.1v-6.2Z" transform="translate(-2.004 -3.44)" fill="#ef9700" />
                </svg>
                <span></span>
            </a>
        </div>
    </div>
</header>


<nav class="menu-mobilne-container">
    <div class="menu-close-trigger">X</div>
    <?php wp_nav_menu(array('theme_location' => 'header')); ?>
    <?php get_template_part('partials/social-media');
    ?>
</nav>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Obsługa kliknięcia burger menu
        document.querySelector('.burger').addEventListener('click', function() {
            document.querySelector('.menu-mobilne-container').classList.toggle('is-active');
        });

        // Zamknięcie mobilnego menu
        document.querySelector('.menu-close-trigger').addEventListener('click', function() {
            document.querySelector('.menu-mobilne-container').classList.remove('is-active');
        });

        // Modyfikacja obsługi kliknięcia dla strzałki i tytułów bez linku
        document.querySelectorAll('.menu-item-has-children > a').forEach(function(link) {
            const arrow = link.querySelector('.menu-arrow'); // Znajdź strzałkę w linku
            // Dodanie obsługi kliknięcia również na tytuł zakładki bez ustawionego linku
            const shouldExpandOnClick = !link.getAttribute('href') || link.getAttribute('href') === '#';

            const expandSubMenu = function(e) {
                e.stopPropagation(); // Zapobiegaj propagacji do rodzica (linku)
                e.preventDefault(); // Zapobiegaj domyślnemu zachowaniu linku
                var submenu = link.nextElementSibling; // Zakładamy, że submenu jest bezpośrednio po linku
                if (submenu) {
                    submenu.classList.toggle('is-active'); // Animuj pokazanie/ukrycie submenu
                }
            };

            if (arrow) {
                arrow.addEventListener('click', expandSubMenu);
            }

            if (shouldExpandOnClick) {
                link.addEventListener('click', expandSubMenu);
            }
        });
    });
</script>