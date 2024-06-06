<?php
$stage = isset($args['stage']) ? $args['stage'] : '';
$title = isset($args['title']) ? $args['title'] : 'Tytuł';
?>
<section class="section cart-progress">
    <div data-aos="fade-up" class="section-container">
        <h1 class="section-title heading--xl"><?php echo $title ?></h1>
        <div class="progress">
            <div class="progress__item progress__item-1
            <?php if ($stage == 1) {
                echo 'active';
            }; ?>">
                <p class="progress__item-number">01</p>
                <p class="progress__item-title">Koszyk</p>
            </div>
            <div class="progress__separator"></div>
            <div class="progress__item progress__item-2
            <?php if ($stage == 2) {
                echo 'active';
            }; ?>">
                <p class="progress__item-number">02</p>
                <p class="progress__item-title">Dostawa i płatność</p>
            </div>
            <div class="progress__separator"></div>
            <div class="progress__item progress__item-3
            <?php if ($stage == 3) {
                echo 'active';
            }; ?>">
                <p class="progress__item-number">03</p>
                <p class="progress__item-title">Gotowe</p>
            </div>
        </div>
    </div>
</section>