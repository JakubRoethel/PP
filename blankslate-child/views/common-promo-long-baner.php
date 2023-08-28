<?php
$long_banner = get_field('long_banner', 'general_settings'); // main group
$sliders = $long_banner['slider']; //array ze slidami

if ($long_banner) : ?>
    <section class="banner-section">
        <div class="swiper-banners">
            <div class="swiper-wrapper">
                <?php foreach ($sliders as $slide) {
                    $slide_img = $slide['slider_img'];
                    $slide_title = $slide['slider_title'];
                    $title_color = $slide['title_color'];
                    $slide_text = $slide['slider_text'];
                    $text_color = $slide['text_color'];
                    $button_text = $slide['button_text'];
                    $button_color = $slide['button_color'];
                    $banner_link = $slide['baner_link'];

                ?>

                    <div class="swiper-slide swiper-slide-active">
                        <a href="<?php echo $banner_link['url'] ?>">
                            <div class="main-wrapper">
                                <div class="text-button-wrapper">
                                    <div class="text-container">
                                        <h2 style="color: <?php echo $title_color ?>" class="title"><?php echo $slide_title ?></h2>
                                        <p style="color: <?php echo $text_color ?>" class="description"><?php echo $slide_text ?></p>
                                    </div>
                                    <div class="button-container">
                                        <button style="background-color: <?php echo $button_color ?>"><?php echo  $button_text ?></button>
                                    </div>
                                </div>

                                <?php echo wp_get_attachment_image($slide_img, $size); ?>


                            </div>
                        </a>

                    </div>

                <?php  } ?>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </section>

<?php endif; ?>