<?php
/*
Template Name: Legal page template
*/
get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <?php get_template_part('views/hero', 'section-without-description'); ?>
        <div class="main_container section">
            <div class="content">
                <?php the_content(); ?>
            </div>
        </div>
</div>



<?php get_footer(); ?>