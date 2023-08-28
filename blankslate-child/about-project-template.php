<?php
/*
Template Name: About project
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


<?php 
get_template_part('views/common', 'simple-img-gallery'); 
get_template_part('views/common', 'slider-partners'); 
?>




</main>
</div>

<?php get_footer(); ?>