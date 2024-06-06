<?php $cookies = get_field('cookies', 'options'); ?>

<div class="c-cookies js-cookies">
    <div class="c-cookies__container">
        <div class="c-cookies__content">
            <?= $cookies['content']; ?>
        </div>
        <button class="c-cookies__button js-cookies__accept-button" aria-label="<?= $cookies['accept_button_text']; ?>">
            <?= $cookies['accept_button_text']; ?>
        </button>
    </div>
</div>