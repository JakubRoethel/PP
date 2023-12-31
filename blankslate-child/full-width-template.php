<?php
/*
Template Name: Full width Template with text-img section
*/

get_header();
$featured_image_url = get_the_post_thumbnail_url(get_the_ID());
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <?php get_template_part('views/hero', 'section-without-description'); ?>
        <div class="main_container section">
            <div class="content">
                <?php the_content(); ?>
            </div>
        </div>
</div>
</div>
<div class="horisontal-single-post-banner">
    <?php get_template_part('views/components/custom', 'generic-long-banner'); ?>
</div>

<?php get_template_part('views/common', 'img-text-section'); ?>




</main>
</div>

<?php get_footer(); ?>