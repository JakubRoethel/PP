<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package pomorskie_prestige
 */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
get_header();

?>

<style>

#tytul_polecane
{
	color: <?php the_field('kolor_tytulu',42); ?>;
}
</style>


		<div class="container">
			<div class="row">
				<div id="primary" class="content-area" style="width: 100%;">
					<main id="main" class="site-main">

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

				<div id="kategorie_slider">
					<div class="owl-carousel owl-theme">
					<?php
						$linki = explode('/',$_SERVER['REQUEST_URI']);
						if ($linki[1] == 'en') { 
							$category_id = get_category_by_slug('slider-en');
						} else { 
							$category_id = get_category_by_slug('slider');
						}
						
						$catquery = new WP_Query( 'cat=' .$category_id->term_id. '&posts_per_page=-1' );  // -1 => wszystkie
						while($catquery->have_posts()) : $catquery->the_post();
						if ( has_post_thumbnail() ) {
							$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
							if ( ! empty( $large_image_url[0] ) ) {
									$thumb_src = esc_url( $large_image_url[0] );
							} else {
									$thumb_src = ''; //tutaj wstaw domyslny placeholder jesli nie ma obrazka przypisanego
							}
						}
						?>
							<div id="wpis">
							<a href="<?php echo get_permalink(); ?>"><div id="thumb_baner" style="background: url('<?php echo $thumb_src; ?>') no-repeat;"></div></a>
									<div id="otoczka">
									<?php  
										$getCat = get_the_category();
										// if ($_SERVER['REMOTE_ADDR'] == '89.68.114.52') 
										// 	var_dump($getCat);
										if ($getCat[0]->name == 'Slider Głowna Strona PL') {
											$getCat[0]->name = $getCat[1]->name;
											$getCat[0]->cat_ID = $getCat[1]->cat_ID;
											if ($getCat[0]->name == 'Slider Kategoria PL') {
												$getCat[0]->name = $getCat[2]->name;
												$getCat[0]->cat_ID = $getCat[2]->cat_ID;
											}
										}

										$html = '<a href="' . get_category_link($getCat[0]->cat_ID) . '" ';
										$html .= 'title="' . $getCat[0]->name . '">' . $getCat[0]->name . '</a>';
										echo $html;
									//exclude_post_categories($category_id);  
									?>
									<a href="<?php echo get_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
										<div class="data"><?php echo get_the_date( 'd.m.Y' ); ?></div>
									</div>
							</div>
						<?php endwhile;
						wp_reset_postdata(); ?>
					</div>
				</div>
			</div>

		  <?php comments_template( '', true ); ?>

		 </div><!-- end home-post-content -->

		 

	<div class="container" style="margin-top: 45px;">
		 <div class="row">

		 <?php echo do_shortcode('[bsa_pro_ad_space id=7]'); ?>
		 <?php echo do_shortcode('[bsa_pro_ad_space id=9]'); ?>
		 <?php echo do_shortcode('[bsa_pro_ad_space id=3]'); ?>


		

		 
			 <div class="max">
				 <div id="polecane"><span><?php echo pll__( 'POLECAMY' );  ?></span>
				 

				 <?php 
				 if ($linki[1] == 'en') { 
					?> <div id="tytul_polecane"><?php the_field('tytul_wersja_angielska',42); ?></div>
					<a href="<?php the_field('link_do_artykulu_wersja_en',42); ?>" /><img src="<?php the_field('polecane',42); ?>" /></a>
					<?php
				} else { 
					?><div id="tytul_polecane"><?php the_field('tytul',42); ?></div>
					<a href="<?php the_field('link_do_artykulu',42); ?>" /><img src="<?php the_field('polecane',42); ?>" /></a>
					<?php
				}
				 ?>

				
				 


				</div>

					<?php
					// the query
					$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
					$wpb_all_query = new WP_Query(array('post_type'=>'post', 'post_status'=>'publish', 'posts_per_page'=> 5, 'paged' => $paged)); 
					$thumb_src ='';
					?>
					<div class="paginations">
						<?php 
							echo paginate_links( array(
								'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
								'total'        => $wpb_all_query->max_num_pages,
								'current'      => max( 1, get_query_var( 'paged' ) ),
								'format'       => '?paged=%#%',
								'show_all'     => false,
								'type'         => 'plain',
								'end_size'     => 2,
								'mid_size'     => 1,
								'prev_next'    => true,
								'prev_text'    => sprintf( '<i></i> %1$s', __( 'Poprzednie', 'text-domain' ) ),
								'next_text'    => sprintf( '%1$s <i></i>', __( 'Następne', 'text-domain' ) ),
								'add_args'     => false,
								'add_fragment' => '',
							) );
						?>
					</div>

					<?php if ( $wpb_all_query->have_posts() ) : 
						$i = 1;
						while ( $wpb_all_query->have_posts() ) : 
							$wpb_all_query->the_post();
							if ( has_post_thumbnail() ) {
								$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
								if ( ! empty( $large_image_url[0] ) ) {
										$thumb_src = esc_url( $large_image_url[0] );
								} else {
										$thumb_src = ''; //tutaj wstaw domyslny placeholder jesli nie ma obrazka przypisanego
								}
							}


							if ($i % 3 == 0) {
								$nowaKlasa = 'full';
							} else {
								$nowaKlasa = '';
							}

							$i++;
						 
							?>
								<div id="kolumna" class="daj_border <?php echo $nowaKlasa; ?>">
									<div class="cat"><?php 
										$getCat = get_the_category();
										//var_dump($getCat[0]);
										$html = '<a href="' . get_category_link($getCat[0]->cat_ID) . '" ';
		  								$html .= 'title="' . $getCat[0]->name . '">' . $getCat[0]->name . '</a>';
										echo $html;
									?></div>
									<a href="<?php echo get_permalink(); ?>"><div id="thumb" style="background: url('<?php echo $thumb_src; ?>') no-repeat;"></div></a>
									<h2 class="tytul"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></h2></a>
									<a href="<?php echo get_permalink(); ?>"><div class="skrot">
									<?php 
										$datatata = wp_trim_words( get_the_content(), 25, ' ... <br>></br>');
										$datatata = preg_replace("/<img[^>]+\>/i", "(image) ", $datatata); 
										if (!empty($datatata)) { echo $datatata; } else { echo "brak treści"; } 
									?></div></a>
									<div class="data_prawa"><?php echo get_the_date( 'd.m.Y' ); ?></div>
								</div>


							<?php endwhile; 
							 ?>
							 
							 <div class="paginations">
								<?php 
									echo paginate_links( array(
										'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
										'total'        => $wpb_all_query->max_num_pages,
										'current'      => max( 1, get_query_var( 'paged' ) ),
										'format'       => '?paged=%#%',
										'show_all'     => false,
										'type'         => 'plain',
										'end_size'     => 2,
										'mid_size'     => 1,
										'prev_next'    => true,
										'prev_text'    => sprintf( '<i></i> %1$s', __( 'Poprzednie', 'text-domain' ) ),
										'next_text'    => sprintf( '%1$s <i></i>', __( 'Następne', 'text-domain' ) ),
										'add_args'     => false,
										'add_fragment' => '',
									) );
								?>
							</div>
							 <?php
						else : ?>
					    <p><?php // _e( 'Sorry, no posts matched your criteria.' ); ?></p>
					<?php endif; 
					wp_reset_postdata(); 
					?>
					
			</div>

			<div id="sidebar_glowna"><?php get_sidebar(); ?></div>

						 	


		</div>
	</div>
</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
