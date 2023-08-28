<?php

/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header();
$featured_image_url = get_the_post_thumbnail_url(get_the_ID());
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <header class="header post-info" style="background: url(<?php echo $featured_image_url != '' ? $featured_image_url  : '/wp-content/themes/blankslate-child/assets/category-deafult-bg.png' ?> )">
            <div class="breadcrumb">
                <?php echo get_breadcrumb(); ?>
            </div>
            <div class="title-share-wrapper">
                <h1 class="entry-title" itemprop="name"><?php the_title(); ?></h1>
                <div class="share">
                    <p><?php echo __("Udostępnij:"); ?></p>
                    <?php
                    echo do_shortcode('[Sassy_Social_Share]');
                    ?>

                </div>
            </div>
            <?php if (get_field('autor') != '') { ?>
                <p class="author"><?php echo pll__('Autor tekstu: ') ?><strong><? echo get_field('autor') ?></strong></p>
            <?php } ?>

        </header>
        <div class="main_container section">

            <div class="left-column">


                <?php
                // Start the loop.
                while (have_posts()) : the_post();
                ?>
                    <div class="post-content">
                        <?php the_content(); ?>
                    </div>
                    <?php get_template_part('views/common', 'promo-long-baner'); ?>
                    <?php custom_related_posts(); ?>
                <?php
                    // If comments are open or we have at least one comment, load up the comment template.
                    if (comments_open() || get_comments_number()) :
                        comments_template();
                    endif;

                    // Previous/next post navigation.
                    the_post_navigation(array(
                        'next_text' => '<span class="meta-nav" aria-hidden="true">' . __('Następny wpis', 'twentyfifteen') . '</span> ' .
                            '<span class="screen-reader-text">' . __('Następny wpis', 'twentyfifteen') . '</span> ',
                        'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __('Poprzedni wpis', 'twentyfifteen') . '</span> ' .
                            '<span class="screen-reader-text">' . __('Poprzedni wpis', 'twentyfifteen') . '</span> ',
                    ));

                // End the loop.
                endwhile;
                ?>

            </div>
        </div>
</div>





</main>
</div>

<?php get_footer(); ?>