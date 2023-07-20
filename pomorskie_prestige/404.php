<?php
/*
 * Template Name: 404
 * Template Post Type: post, page, product
 */
/**
 * 
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package pomorskie_prestige
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="container">

				<section class="error-404 not-found">
					<header class="page-header">
						<h1 class="page-title"><?php echo pll__( 'Strona, której szukasz, nie istnieje.' );  ?></h1>
					</header><!-- .page-header -->

					<div class="page-content">
						<p class="blad"><?php echo pll__( 'Błąd 404' );  ?></p>
						<a href="/"><button><?php echo pll__( 'Przejdź na stronę główną Pomorskie Prestige' );  ?></button></a>
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

					</div><!-- .page-content -->
				</section><!-- .error-404 -->

		</main><!-- #main -->
	</div>
</div><!-- #primary -->

<?php
get_footer();
