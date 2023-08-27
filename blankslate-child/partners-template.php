<?php

/*
Template Name: Partners
*/

get_header();
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array(
    'post_type'      => 'partners',  // Custom post type name
    'posts_per_page' => 2, // Number of posts per page
    'paged' => $paged, // Add pagination
    'orderby'        => 'title',     // Order by title, you can change this as needed
    'order'          => 'ASC',       // ASC or DESC order, you can change this as needed
);


$partners_query = new WP_Query($args);
$featured_image_url = get_the_post_thumbnail_url(get_the_ID());
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
    <?php get_template_part('views/hero', 'section-with-description'); ?>
        <div class="main_container section">
            <?php 
          $total_partners = pll_count_posts(pll_current_language(), array('post_type'=> 'partners'));
          echo "Total Partners: " . $total_partners;
          
            
            ?>
            <div class="content">
                <?php
                if ($partners_query->have_posts()) {
                    while ($partners_query->have_posts()) {
                        $partners_query->the_post();

                        // Get the entire partner object
                        $partner_object = get_post();

                        // Include the partners-card template part
                        get_template_part('partner-card', null, array(
                            'partner' => $partner_object,
                        ));
                    } ?>





                <?php
                    // Restore original post data
                    wp_reset_postdata();
                } else {
                    echo 'No partners found.';
                }

                ?>
            </div>
            <div class="pagination">
                <?php

                // Pagination links
                echo paginate_links(array(
                    'total' => $partners_query->max_num_pages,
                    'current' => $paged,
                    'prev_next' => true,
                    'prev_text' => '&#8592;',
                    'next_text' => '&#8594;',
                ));

                ?>
            </div>
        </div>
</div>
</div>
<div class="horisontal-single-post-banner">
    <?php get_template_part('views/components/custom', 'generic-long-banner'); ?>
</div>




</main>
</div>

<?php

get_footer();
