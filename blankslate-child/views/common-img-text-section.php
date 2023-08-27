<?php if (have_rows('img_text_section')) :

    $template_group = get_field('img_text_section');
    $main_title = $template_group['main_title'];
    $img_video_file = $template_group['img_video'];
    $description = $template_group['description'];
    $second_description = $template_group['second_description'];
    $button = $template_group['button'];
    $data_type = pathinfo($img_video_file['url'], PATHINFO_EXTENSION);
?>

    <div class="img-text-section">
        <?php if ($main_title) : ?>
            <h2 class="title">
                <?php echo $main_title ?>
            </h2>
        <?php endif; ?>
        <div class="img-video-text-wrapper">
            <?php if ($img_video_file) : ?>
                <div class="img-video-container">
                    <?php if ($data_type == 'mp4') { ?>
                        <video autoplay muted loop preload="metadata">
                            <source src="<?php echo $img_video_file['url']; ?>" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    <?php } else { ?>
                        <img src="<?php echo esc_url($img_video_file['url']); ?>" alt="text" />
                    <?php  }  ?>
                </div>
            <?php endif; ?>
            <?php if ($description) : ?>
                <div class="text_button_wrapper">
                    <div class="description-container">
                        <div class="description">
                            <?php echo $description ?>
                        </div>
                        <?php if ($second_description) : ?>
                            <div class="description">
                                <?php echo $second_description ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <?php if ($button) : ?>
                        <div class="link-container">
                            <a class="custom-button" href="<?php echo $button['url'] ?>">
                                <?php echo $button['title'] ?>
                            </a>
                        </div>


                        </button>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>

<?php endif; ?>