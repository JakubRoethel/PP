<?php if (have_rows('how_to_be_a_partner')) : ?>
    <?php
    $template_group = get_field('how_to_be_a_partner');
    $show_more_section_items = $template_group['show_more_section'];
    $main_title = $show_more_section_items['main_title'];
    $description = $show_more_section_items['description'];
    $hide_description = $show_more_section_items['hide_description'];
    $button_text = $show_more_section_items['button_text'];

    ?>

    <div class="show-more-section">
        <h2 class="title"> <?php echo $main_title ?> </h2>
        <div class="description"><?php echo $description ?> </div>
        <div class="more_description"><?php echo $hide_description  ?> </div>
        <div class="button-wrapper">
        <button class="button_show_more custom-button" data-original-text="<?php echo $button_text ?>"><?php echo $button_text ?></button>
        </div>
    </div>

<?php endif; ?>