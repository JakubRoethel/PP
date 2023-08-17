<?php

/**
 * 
 *
 * This template is used to display the blog page.
 *
 * @package YourTheme
 */

get_header();
?>





<main id="primary" class="site-main">
    <header class="header category-info" style="background: url('/wp-content/themes/blankslate-child/assets/category-deafult-bg.png')">
    
    <div class="breadcrumb">
    <?php echo get_breadcrumb(); ?>
</div>
        <h1 class="entry-title" itemprop="name"><?php echo get_the_title( get_option('page_for_posts', true) ); ?></h1>
        <div class="archive-meta" itemprop="description"><?php if ('' != get_the_archive_description()) {
                                                                echo esc_html(get_the_archive_description());
                                                            } ?></div>

    </header>
    <section class="section">
        <!-- <div class="post_category_filter_container">
            <div class="widgets_container">
                <?php
                echo do_shortcode('[fe_open_button]');
                echo do_shortcode('[fe_widget id="63794" horizontal="yes" columns="3"]'); ?>
            </div>
        </div> -->
        <?php if (have_posts()) : ?>
            <div class="posts-container">
                <?php
                while (have_posts()) :
                    the_post();
                    get_template_part('entry');
                    comments_template();
                endwhile; ?>
            </div>
            <?php
            // Pagination
            get_template_part('nav', 'below');
            ?>
        <?php else : ?>
            <p><?php _e('No posts found.', 'your-theme'); ?></p>
        <?php endif; ?>
    </section>
</main>

<?php
get_footer();
