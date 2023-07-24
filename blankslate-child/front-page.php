<?php

get_header();
?>

<?php


$args = array(
    'post_type'      => 'post',       // The post type you want to query (e.g., 'post', 'page', etc.)
    'post_status'    => 'publish',    // Retrieve only published posts
    'posts_per_page' => 8,            // Number of posts to retrieve (in this case, 8)
    'orderby'        => 'date',       // Order the posts by date
    'order'          => 'DESC',       // Show the newest posts first
);

$latest_posts_query = new WP_Query($args);

if ($latest_posts_query->have_posts()) { ?>
    <section class="section">
        <h2 class="latests-posts-title"><?php echo pll__("Ostatnio opublikowane"); ?></h2>
        <div class="posts-container">
            <?php while ($latest_posts_query->have_posts()) {
                $latest_posts_query->the_post();
                // Output the post content or do something else with the post data
                get_template_part('entry');
            } ?>
        </div>
    </section>

<?php wp_reset_postdata(); // Restore original post data
} else {
    // No posts found
    echo '<p>No posts found.</p>';
}


get_footer();
