<?php if (have_rows('simple_img_gallery')) : ?>

    <?php
    $template_group = get_field('simple_img_gallery');
    $img_array = $template_group['imgs'];
    ?>

    <div class="simple-img-gallery">
        <?php foreach ($img_array  as $single_img) {

            $img = $single_img['single_gallery_img'];

            echo wp_get_attachment_image( $img, 'full');

        ?>
        <?php  } ?>

    </div>

<?php endif; ?>