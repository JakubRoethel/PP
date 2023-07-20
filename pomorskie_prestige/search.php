<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package pomorskie_prestige
 */

get_header();
?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="container">

			<div class="page-header">
				<h1 class="page-title-search">
				<div class="container borderright">        <?php if ( have_posts() ) : ?>

     <div class="wynWysz">

                    <?php

                    /* translators: %s: search query. */

										printf( pll__('Szukana fraza: %s'), '<span>' . get_search_query() . '</span>' );
										

                    ?>

         <br>

         <p>Wynik:

           <?php

             global $wp_query;

             $total_results = $wp_query->found_posts;

             echo $total_results;

           ?> znalezione</p>

     </div>            <?php

            /* Start the Loop */

            while ( have_posts() ) :

                the_post();                /**

                 * Run the loop for the search to output the results.

                 * If you want to overload this in a child theme then include a file

                 * called content-search.php and that will be used instead.

                 */

                get_template_part( 'template-parts/content', 'search' );            endwhile;            the_posts_navigation();        else :            get_template_part( 'template-parts/content', 'none' );        endif;

        ?>        </div>
				</h1>
</div><!-- .page-header -->

<div id="wyszukaj">
	<span class="sprobuj"> <?php echo pll__( 'Spróbuj ponownie:' );  ?></span> <span><?php get_search_form( $echo ); ?></span>
</div>	

	<p class="wybierze_kat"><?php echo pll__( 'lub wybierz kategorię, które Cię interesuje:' );  ?></p>

					<?php
							wp_nav_menu( array(
								'theme_location' => 'menu-1',
								'menu_id'        => 'menu1',
							) );
					?>

						<h2 class="naglowek_sidebar_wpis_404"><?php echo pll__( 'Najnowsze artykuły' );  ?></h2>
							<?php $the_query = new WP_Query( 'posts_per_page=4' ); ?>
							
							<?php while ($the_query -> have_posts()) : $the_query -> the_post(); 
								if ( has_post_thumbnail() ) {
									$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
									if ( ! empty( $large_image_url[0] ) ) {
											$thumb_src = esc_url( $large_image_url[0] );
									} else {
											$thumb_src = ''; //tutaj wstaw domyslny placeholder jesli nie ma obrazka przypisanego
									}
								}
							?>
							<div class="najnowsze404">
									<div id="thumb_sidebar_wpis" style="background: url('<?php echo $thumb_src; ?>') no-repeat;"></div>
									<h2 class="tytul_sidebar_wpis"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></h2></a>
							</div>		

							<?php 
							endwhile;
							wp_reset_postdata();
							?>
			</div>
		</main><!-- #main -->
	</section><!-- #primary -->

<?php

get_footer();
