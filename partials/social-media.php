<?php
$socialMedia = get_field('social_media', 'options');
$rows = $socialMedia;
if ($rows) {
    echo '<div class="social-media">';
    foreach ($rows as $row) {
        $image = $row['icon']['url'];
        $link = $row['link']['url'];
?>
        <a href="<?php echo $link ?>" class="social-media__link" aria-label="Medium społecznościowe">
            <img src="<?php echo $image ?>" alt="Medium społecznościowe" class="social-media__image" loading="lazy">
        </a>
<?php
    }
    echo '</div>';
}
?>