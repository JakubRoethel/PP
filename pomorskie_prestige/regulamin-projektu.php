<?php
/*
 * Template Name: Regulamin projektu
 * Template Post Type: post, page, product
 */
?>

<?php

get_header();

?>
<div class="container" style="margin-top: 13px;">
        <?php
            while ( have_posts() ) :
                the_post();

                get_template_part( 'template-parts/content', 'page' );

                // If comments are open or we have at least one comment, load up the comment template.
                if ( comments_open() || get_comments_number() ) :
                    comments_template();
                endif;

            endwhile; // End of the loop.
        ?>
    </div>

<?php

get_footer();