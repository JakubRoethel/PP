<section class="home-video">
    <?php
    $slider = get_field('slider'); // array ze slidami


    if ($slider) : ?>
        <div class="container hero_section hero_section_desktop">
            <div class="swiper">
                <div class="swiper-wrapper">
                    <?php foreach ($slider as $slide_file) {
                        $slide = $slide_file['slider_content'];
                        $slide_text = $slide_file['slider_tekst'];
                        $slide_color = $slide_file['tekst_color'];
                        $data_type = pathinfo($slide['url'], PATHINFO_EXTENSION);
                        if ($data_type == 'mp4') { ?>
                            <div class="swiper-slide swiper-slide-active">
                                <div class="text-wrapper">
                                <h2 style="color: <?php echo $slide_color ?>" class="slide-text"><?php echo $slide_text ?></h2>
                                </div>
                                <video autoplay muted preload="metadata">
                                    <source src="<?php echo $slide['url']; ?>" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            </div>
                        <?php } else { ?>
                            <div class="swiper-slide swiper-slide-active">
                            <div class="text-wrapper">
                                    <h2 style="color: <?php echo $slide_color ?>" class="slide-text"><?php echo $slide_text ?></h2>
                                </div>
                                <img src="<?php echo esc_url($slide['url']); ?>" alt="text" />
                            </div>
                        <?php  }  ?>
                    <?php  } ?>
                </div>
                <div class="swiper-pagination"></div>
            </div>
            <div class="filter-container">
                
            </div>
        </div>
        </div>
    <?php endif
    ?>
</section>