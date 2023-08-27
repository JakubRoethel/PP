<?php

/*
Template Name: Partners
*/

get_header();
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array(
    'post_type'      => 'partners',  // Custom post type name
    'posts_per_page' => -1, // Number of posts per page
    'paged' => $paged, // Add pagination
    'orderby'        => 'title',     // Order by title, you can change this as needed
    'order'          => 'ASC',       // ASC or DESC order, you can change this as needed
);


$partners_query = new WP_Query($args);
$featured_image_url = get_the_post_thumbnail_url(get_the_ID());
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main partner-template" role="main">
        <header class="header page-info" style="background: url(<?php echo $featured_image_url != '' ? $featured_image_url  : '/wp-content/themes/blankslate-child/assets/category-deafult-bg.png' ?> )">
            <div class="breadcrumb">
                <?php echo get_breadcrumb(); ?>
            </div>
            <div class="title-share-wrapper">
                <h1 class="entry-title" itemprop="name"><?php the_title(); ?></h1>
            </div>
            <?php $template_description = get_field('krotki_opis'); ?>
            <div class="archive-meta" itemprop="description">
                <?php if ($template_description != '') {
                    echo $template_description;
                } ?>
            </div>


        </header>
        <div class="main_container section">





            <div class="wrapper">
                <div class="widgets_container">
                    <?php
                    echo do_shortcode('[fe_widget id="35349" horizontal="yes" columns="3"]');
                    ?>
                </div>
                <div class="content">
                    <?php
                    if ($partners_query->have_posts()) { ?>
                        <div class="acf-map">
                            <?php while ($partners_query->have_posts()) {
                                $partners_query->the_post();

                                $lokalizacja = get_field('lokalizacja'); ?>

                                <div class="marker" data-lat="<?php echo $lokalizacja['lat']; ?>" data-lng="<?php echo $lokalizacja['lng']; ?>" data-title="<?php echo esc_attr(get_the_title()); ?>"></div>
                            <?php   } ?>
                        </div>

                    <?php wp_reset_postdata();
                    }
                    ?>
                    <?php

                    // $total_partners = pll_count_posts(pll_current_language(), $args); 
                    $total_partners = $partners_query->post_count;
                    ?>
                    <p class="found"><?php echo pll__("Znaleziono ") . $total_partners . pll__(" obiekty."); ?></p>

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
