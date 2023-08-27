<?php if (have_rows('how_to_be_a_partner')) : ?>


    <?php
    $template_group = get_field('how_to_be_a_partner');
    $main_title = $template_group['main_title'];
    $description = $template_group['description'];
    $icon_items = $template_group['icon_box'];
    ?>

    <?php if ($main_title) : ?>
        <div class="single-container">
            <h2 class="title"> <?php echo $main_title ?> </h2>
            <?php if ($description) : ?>
                <div class="description">
                    <?php echo $description ?>
                </div>
            <?php endif; ?>
            <?php if ($icon_items) : ?>
                <div class="icon-wrapper">
                    <?php foreach ($icon_items as $single_item) {
                        $icon = $single_item['icon'];
                        $icon_title = $single_item['icon_title'];
                    ?>
                        <?php if ($icon) : ?>
                            <div class="icon-box">
                                <div class="img-wrapper">
                                    <?php echo wp_get_attachment_image($icon, 'full'); ?>
                                </div>
                                <?php if ($icon_title) : ?>
                                    <p class="icon-title">
                                        <?php echo $icon_title ?>
                                    </p>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    <?php  } ?>
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <?php
    $steps_section_items = $template_group['steps_section'];
    $steps_main_title = $steps_section_items['main_title'];
    $steps = $steps_section_items['single_step'];
    ?>

<?php endif; ?>