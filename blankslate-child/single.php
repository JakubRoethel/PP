<?php

/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

        <div class="main_container">
            <div class="left-column">


                <?php
                // Start the loop.
                while (have_posts()) : the_post();
                ?>
                    <div class="breadcrumbs">
                        <?php
                        if (function_exists('woocommerce_breadcrumb')) {
                            woocommerce_breadcrumb();
                        }
                        ?>
                    </div>

                    <h1 class="post-title"><?php the_title(); ?></h1>
                    <div class="product-rating-share-container">
                        <?php

                        ?>
                        <div class="share">
                            <p><?php echo __("Udostępnij:"); ?></p>
                            <?php
                            echo do_shortcode('[Sassy_Social_Share]');
                            ?>

                        </div>
                    </div>
                    <div class="post-content">
                        <?php the_content(); ?>
                    </div>

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
            <div class="right-column">
                <h2 class="author-heading"><?php echo __('O autorce'); ?></h2>
                <div class="author-container">
                    <div class="author-image">
                        <?php
                        echo wp_get_attachment_image(61359, 'full');
                        ?>
                    </div>
                    <div class="author-info">
                        <div class="name-description-wrapper">
                            <h4 class="author-name">Olga Stępińska</h4>
                            <p class="author-description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                        </div>
                    </div>
                </div>
                <div class="featured_section">
                    <h2 class="section-title"><?php echo __('Polecane produkty') ?></h2>
                    <?php
                    // The tax query
                    $tax_query[] = array(
                        'taxonomy' => 'product_visibility',
                        'field'    => 'name',
                        'terms'    => 'featured',
                        'operator' => 'IN', // or 'NOT IN' to exclude feature products
                    );

                    // The query
                    $query = new WP_Query(array(
                        'post_type'           => 'product',
                        'post_status'         => 'publish',
                        'posts_per_page'      => 2,
                        'tax_query'           => $tax_query // <===
                    ));

                    // Check if there are products
                    if ($query->have_posts()) : ?>
                        <ul class="products">

                            <?php
                            while ($query->have_posts()) {
                                $query->the_post();
                                wc_get_template_part('content', 'product');
                            } ?>

                        </ul>
                    <?php
                        // Restore original post data
                        wp_reset_postdata();
                    else :
                        echo '<p>No featured products found.</p>';
                    endif;
                    ?>
                </div>
                <?php
                $banners_list = get_field('banners', 'general_settings');
                if ($banners_list) : ?>
                    <div class="banners-wrapper">
                        <div class="sticky-container">
                            <?php foreach ($banners_list as $banner) {
                                $link = $banner['link'];
                                $img = $banner['img'];
                                $button_text = $banner['button_text'];
                            ?>
                                <a href="<?php echo $link ?>" class="single_banner">
                                    <?php echo wp_get_attachment_image($img, 'full'); ?>
                                    <button class="orange custom_button"> <?php echo $button_text  ?> </button>
                                </a>
                            <?php  } ?>

                        </div>

                    </div>
                <?php endif; ?>
                <?php

                $args = array(
                    'post_type' => 'post', // Change 'post' to your custom post type if needed
                    'posts_per_page' => 2, // Show only 2 posts
                    // Add any additional arguments as needed
                );

                // Create a new WP_Query instance
                $query = new WP_Query($args);

                // Check if there are posts

                if ($query->have_posts()) { ?>
                    <div class="blog-posts">
                        <?php
                        while ($query->have_posts()) {
                            $query->the_post();
                            get_template_part('entry');
                        }
                        ?>
                    </div>

                <?php
                } ?>
            </div>
        </div>
</div>
<div class="horisontal-single-post-banner">
    <?php get_template_part('views/components/custom', 'generic-long-banner'); ?>
</div>


</main>
</div>

<?php get_footer(); ?>