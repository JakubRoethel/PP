<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package pomorskie_prestige
 */

 
get_header();
while ( have_posts() ) :
	the_post();
 if ( has_post_thumbnail() ) {
	$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
	if ( ! empty( $large_image_url[0] ) ) {
			$thumb_src = esc_url( $large_image_url[0] );
	} else {
			$thumb_src = ''; //tutaj wstaw domyslny placeholder jesli nie ma obrazka przypisanego
	}
}

function the_category_filter($thelist,$separator=' ') {  
	if(!defined('WP_ADMIN')) {  
		//Category Names to exclude  
		$exclude = array('Slider Głowna Strona EN', 'Slider Głowna Strona PL', 'Slider Kategoria EN', 'Slider Kategoria PL');  
		  
		$cats = explode($separator,$thelist);  
		$newlist = array();  
		foreach($cats as $cat) {  
			$catname = trim(strip_tags($cat));  
			if(!in_array($catname,$exclude))  
				$newlist[] = $cat;  
		}  
		return implode($separator,$newlist);  
	} else {  
		return $thelist;  
	}  
}  
add_filter('the_category','the_category_filter', 10, 2);  

?>
<div class="container">
	<div class="row">
	<div id="thumb_wpis" style="background: url('<?php echo $thumb_src; ?>') no-repeat;"></div>
			<div id="fotograf_wpis"><?php the_field('fotograf'); ?></div>

			<div id="daj_bordery">
				<h1 class="tytul_wpis"><?php the_title(); ?></h1>
				<div id="podtytul">
					<div class="podtytul_wpis"><?php the_field('autor'); ?></div>
					<div class="podtytul_wpis"><?php the_category('  '); ?></div>
					<div class="podtytul_wpis"><?php echo get_the_date( 'd.m.Y' ); ?></div>
					<div class="podtytul_social">
						<a href="https://www.facebook.com/PomorskiePrestige/" target="_blank"><div id="fb_wpis"></div></a>
						<a href="https://www.instagram.com/pomorskietravel/" target="_blank"><div id="insta_wpis"></div></a>
					</div>
				</div>		
			</div>

			<?php //echo do_shortcode('[bsa_pro_ad_space id=7]'); ?>
			<?php //echo do_shortcode('[bsa_pro_ad_space id=9]'); ?>
		<?php //echo do_shortcode('[bsa_pro_ad_space id=3]'); ?>

		<div class="max">	
			<div class=""><?php the_content(); ?></div>
			<?php $tmpW = get_field('pokazukryj'); if ($tmpW[0] == 'Pokaż') { ?>
				<span class="partner_tytul">PARTNER</span>
				
				<?php
					$link = get_field('adres_www_partnera');
				?>

				<div id="partner">
					<div class="partner_child"><img src="<?php the_field('logo_partner'); ?>" /></div>
					<div class="partner_child"><a class="" target="_blank" href="<?php echo $link; ?>"><?php echo $link; ?></a></div>
					<div class="partner_child"><?php the_field('adres_email_partnera'); ?></div>
				</div>

				<div class="partner_opis"><?php the_field('krotki_opis_partnera'); ?></div>
			<?php } ?>
			<span class="polecane_tytul"><?php echo pll__( 'POLECANE DLA CIEBIE' );  ?></span>
			

			<!--Start Related Posts-->
<?php
// Build our basic custom query arguments
$custom_query_args = array( 
	'posts_per_page' => 2, // Number of related posts to display
	'post__not_in' => array($post->ID), // Ensure that the current post is not displayed
	'orderby' => 'rand', // Randomize the results
);
// Initiate the custom query
$custom_query = new WP_Query( $custom_query_args );

// Run the loop and output data for the results
if ( $custom_query->have_posts() ) : ?>
	<?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); 
	
	if ( has_post_thumbnail() ) {
		$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
		if ( ! empty( $large_image_url[0] ) ) {
				$thumb_src = esc_url( $large_image_url[0] );
		} else {
				$thumb_src = ''; //tutaj wstaw domyslny placeholder jesli nie ma obrazka przypisanego
		}
	}

	?>
	
		<div id="kolumna" class="daj_border">
									<div class="cat"><?php 
										$getCat = get_the_category();
										//var_dump($getCat[0]);
										$html = '<a href="' . get_category_link($getCat[0]->cat_ID) . '" ';
		  								$html .= 'title="' . $getCat[0]->name . '">' . $getCat[0]->name . '</a>';
										echo $html;
									?></div>
									<a href="<?php echo get_permalink(); ?>"><div id="thumb" style="background: url('<?php echo $thumb_src; ?>') no-repeat;"></div></a>
									<h2 class="tytul"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h2>
									<div class="skrot"><a href="<?php echo get_permalink(); ?>">
									<?php 
									$datatata = wp_trim_words( get_the_content(), 25, '... <br>></br>');
									$datatata = preg_replace("/<img[^>]+\>/i", "(image) ", $datatata); 
									if (!empty($datatata)) { echo $datatata; } else { echo "brak treści"; } 
									?></a></div>
								</div>
	<?php endwhile; ?>
<?php else : ?>
		<p>Sorry, no related articles to display.</p>
<?php endif;
// Reset postdata
wp_reset_postdata();
?>
<!--End Related Posts-->

<?php comments_template(); ?>
			
		</div>

		<div id="sidebar_glowna">
					<h2 class="naglowek_sidebar_wpis"><?php echo pll__( 'Najnowsze artykuły' );  ?></h2>
			<?php 
			$linki = explode('/',$_SERVER['REQUEST_URI']);
			if ($linki[1] == 'en') {
				$getLink = $linki[2];
			} else {
				$getLink = $linki[1];
			}
							
			$category_id = get_category_by_slug($getLink);

			$the_query = new WP_Query( 'cat=' .$category_id->term_id. '&posts_per_page=4&order=DESC&orderby=date' ); 
			?>
			
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
					<a href="<?php echo get_permalink(); ?>"><div id="thumb_sidebar_wpis" style="background: url('<?php echo $thumb_src; ?>') no-repeat;"></div></a>
					<h2 class="tytul_sidebar_wpis"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></h2></a>

			<?php 
			endwhile;
			wp_reset_postdata();
			?>	
		

			<?php get_sidebar(); ?>	
		</div>
		

	</div>	
</div>

	

		<?php

		endwhile; // End of the loop.
		
get_footer();
?>