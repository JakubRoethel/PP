<?php
/*
Template Name: Full width Template
*/

get_header();
$featured_image_url = get_the_post_thumbnail_url(get_the_ID());
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <header class="header page-info" style="background: url(<?php echo $featured_image_url != '' ? $featured_image_url  : '/wp-content/themes/blankslate-child/assets/category-deafult-bg.png' ?> )">
            <div class="breadcrumb">
                <?php echo get_breadcrumb(); ?>
            </div>
            <div class="title-share-wrapper">
                <h1 class="entry-title" itemprop="name"><?php the_title(); ?></h1>
            </div>
           

        </header>
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




</main>
</div>

<?php get_footer(); ?>