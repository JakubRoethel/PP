<?php
$images = get_field('partners_gallery', 'general_settings');

if ($images) : ?>
    <section class="partners-section">
        <h3 class="partners-title"><?php echo pll__("Rekomendowane obiekty") ?></h3>
        <section class="splide">
            <div class="splide__track">
                <ul class="splide__list">
                    <?php foreach ($images as $image) : ?>
                        <li class="splide__slide">
                            <img src="<?php echo esc_url($image['sizes']['large']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </section>
    </section>

<?php endif; ?>