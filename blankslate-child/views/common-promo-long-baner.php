<?php
$long_banner = get_field('long_banner', 'general_settings'); // main group
$sliders = $long_banner['slider']; //array ze slidami

if ($long_banner) : ?>
    <section class="banner-section">
        <div class="swiper">
            <div class="swiper-wrapper">
                <?php foreach ($sliders as $slide) {
                    $slide_img = $slide['slider_img'];
                    $slide_title = $slide['slider_title'];
                    $title_color = $slide['title_color'];
                    $slide_text = $slide['slider_text'];
                    $text_color = $slide['text_color'];?>
                  
                        <div class="swiper-slide swiper-slide-active">
                            <div class="text-wrapper">
                                <h2 style="color: <?php echo $title_color ?>" class="slide-text"><?php echo $slide_title ?></h2>
                                <p style="color: <?php echo $text_color ?>" class="slide-text"><?php echo $slide_text ?></p>
                            </div>
                            <?php echo wp_get_attachment_image($slide_img, $size); ?>
                        </div>

                        <?php  } ?>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </section>

<?php endif; ?>