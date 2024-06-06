<?php
$menu = wp_get_nav_menu_items(2); ?>

<div class="c-menu-mobile js-menu-mobile">
    <button class="c-menu-mobile__toggler" aria-expanded="false" aria-controls="c-menu-mobile__menu">
        <span></span>
        <span></span>
        <span></span>
    </button>
    <div class="c-menu-mobile__menu">
        <ul class="c-menu-mobile__menu-items">
            <?php foreach ($menu as $item) : ?>
                <li class="c-menu-mobile__menu-item">
                    <a class="c-menu-mobile__menu-link" href="<?= $item->url; ?>">
                        <?= $item->title; ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>