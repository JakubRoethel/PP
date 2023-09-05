<?php
get_header();
get_template_part('views/home', 'hero');
get_template_part('views/home', 'custom-search-form');
get_template_part('views/home', 'featured-content');


$args = array(
    'post_type'      => 'post',       // The post type you want to query (e.g., 'post', 'page', etc.)
    'post_status'    => 'publish',    // Retrieve only published posts
    'posts_per_page' => 9,            // Number of posts to retrieve (in this case, 8)
    'orderby'        => 'date',       // Order the posts by date
    'order'          => 'DESC',       // Show the newest posts first

);


$args1 = array(
    'post_type'      => 'post',       // The post type you want to query (e.g., 'post', 'page', etc.)
    'post_status'    => 'publish',    // Retrieve only published posts
    'posts_per_page' => 1,            // Number of posts to retrieve (in this case, 1)
    'orderby'        => 'date',       // Order the posts by date
    'order'          => 'DESC',       // Show the newest posts first
    'post__not_in'   => get_option('sticky_posts'), // Exclude sticky posts
);

$args2 = array(
    'post_type'      => 'post',       // The post type you want to query (e.g., 'post', 'page', etc.)
    'post_status'    => 'publish',    // Retrieve only published posts
    'posts_per_page' => 8,            // Number of posts to retrieve (in this case, 8)
    'orderby'        => 'date',       // Order the posts by date
    'order'          => 'DESC',       // Show the newest posts first
    'offset'         => 1,            // Skip the first post
    'post__not_in'   => get_option('sticky_posts'), // Exclude sticky posts
);

$latest_posts_query = new WP_Query($args);

$first_article = new WP_Query($args1);

$rest_of_articles = new WP_Query($args2);

if ($latest_posts_query->have_posts()) { ?>
    <section class="section home-post-container">
    <div class="filter-container filters-post">
    <?php echo do_shortcode('[fe_widget id="35447"]'); ?>
        </div>
        <h2 class="latests-posts-title" data-aos="slide-right"><?php echo pll__("Ostatnio opublikowane"); ?></h2>
        <div class="posts-container">
            <?php
            while ($latest_posts_query->have_posts()) {
                $latest_posts_query->the_post();
                // Output the post content or do something else with the post data
                get_template_part('entry');
            }


            $additional_banner_blog_post = get_field('additional_banner_blog_post', 'general_settings');  ?>
            <div class="img-wrapper">
            <?php the_ad('35604'); ?>
            </div>

        </div>

        <div class="posts-container-mobile">
            <div class="main-post">
                <?php
                while ($first_article->have_posts()) {
                    $first_article->the_post();
                    get_template_part('entry');
                }
                wp_reset_postdata(); // Restore original post data after the loop
                ?>
            </div>
            <ul class="posts-slider-new-articles">
                <div class="swiper-wrapper">
                    <?php
                    while ($rest_of_articles->have_posts()) {
                        $rest_of_articles->the_post();  ?>
                        <div class="swiper-slide">
                            <?php get_template_part('entry'); ?>
                        </div>
                    <?php }
                    wp_reset_postdata(); // Restore original post data after the loop
                    ?>
                </div>
                <div class="swiper-scrollbar"></div>
            </ul>
        </div>

        <div class="button-wrapper">
            <a href="blog" class="custom-button"><?php echo pll__('Przeglądaj wszystkie artykuły') ?></a>
        </div>

    </section>

<?php
} else {
    // No posts found
    echo '<p>No posts found.</p>';
} ?>


<?php
get_template_part('views/common', 'promo-long-baner');
get_template_part('views/common', 'img-text-section');
get_template_part('views/common', 'slider-partners');
get_footer();
