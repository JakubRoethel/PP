<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package pomorskie_prestige
 */

get_header();

$linki = explode('/',$_SERVER['REQUEST_URI']);
//var_dump($linki);
if ($linki[1] == 'en') {
	//echo "<br>en<br>";
	if (!empty($linki[3]) || $linki[3] != "") {
		//echo "<br>3<br>";
		if (!empty($linki[4]) || $linki[4] != "") {
			//echo "<br>4<br>";
			$getLink = $linki[4];
		} else {
			//echo "<br>3z4<br>";
			$getLink = $linki[3];
		}
	} else {
		//echo "<br>2<br>";
		$getLink = $linki[2];
	}
	$catLinkSlider = $linki[2];
	if ($linki[2] == 'food-stories-en' && $linki[3] == "find-a-restaurant") {
		$catLinkSlider = $linki[3];
	}
	if ($linki[2] == 'medicalspa-en' && $linki[3] == "find-a-location") {
		$catLinkSlider = $linki[3];
	}
} else {
	//echo "<br>pl<br>";
	if (!empty($linki[2]) || $linki[2] != "") {
		//echo "<br>2<br>";
		if (!empty($linki[3]) || $linki[3] != "") {
			//echo "<br>3<br>";
			$getLink = $linki[3];
		} else {
			//echo "<br>2z3<br>";
			$getLink = $linki[2];
		}
	} else {
		//echo "<br>1<br>";
		$getLink = $linki[1];
	}
	$catLinkSlider = $linki[1];
	if ($linki[1] == 'food-stories-pomorskie-restauracje' && $linki[2] == "znajdz-restauracje") {
		$catLinkSlider = $linki[2];
	}
	if ($linki[1] == 'spawellness' && $linki[2] == "znajdz-obiekt") {
		$catLinkSlider = $linki[2];
	}
}


//var_dump($catLinkSlider);

if ($catLinkSlider == 'znajdz-restauracje' || $catLinkSlider == 'find-a-restaurant' || $catLinkSlider == 'znajdz-obiekt' || $catLinkSlider == 'find-a-location') {
	$category_id = get_category_by_slug($getLink);
	$categoryAnd = ($linki[1] == 'en') ? array(3335) : array(3319);
	//echo "<p>znajdz-restauracje pl lub en</p>";
} else {
	$category_id = get_category_by_slug($catLinkSlider);
	$categoryAnd = ($linki[1] == 'en') ? array(3335,$category_id->term_id) : array(3319,$category_id->term_id);
				?>
<div class="container">
	<div class="row">
		<div id="kategorie_slider">
			<div class="owl-carousel owl-theme">

			<?php

				$argsQuery = array(
					'posts_per_page' => '5',
					'category__and' => $categoryAnd
				);
				$catquery = new WP_Query( $argsQuery );
				//var_dump($catquery);
				if($catquery->have_posts()) : while($catquery->have_posts()) : $catquery->the_post();
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
							//var_dump($getCat);
							foreach ($getCat as $k => $catVal) {
								if ($catVal->slug == $catLinkSlider) {
									$html = '<a href="' . get_category_link($catVal->cat_ID) . '" ';
									$html .= 'title="' . $catVal->name . '">' . $catVal->name . '</a>';
								}
							}
							echo $html;
						//exclude_post_categories($category_id);
						?>
						<a href="<?php echo get_permalink(); ?>">	<h2><?php the_title(); ?></h2></a>
						<div class="data"><?php echo get_the_date( 'd.m.Y' ); ?></div>
					</div>
				</div>
				<?php endwhile; endif;
				wp_reset_postdata(); ?>
			</div>
		</div>
	</div>
</div>
		<?php
			}
		?>


<div class="container">
	<div class="row">
		<?php
		if ($linki[1] == 'en') {
			if( $linki[2] == 'food-stories-en' && empty($linki[3]) ) {

			}
			elseif ( $linki[2] == 'food-stories-en' ) {
				if ( $linki[3] == 'find-a-restaurant' ) { ?>
				<div class="restauracja"><h2>FIND A RESTAURANT</h2><?php echo do_shortcode('[wpgmza id="2"]'); ?></div>
			<?php
				}
			}

			if ($linki[2] === 'spawellness' && $linki[3] == 'find-a-location') {
				?>
					<div class="restauracja"><h2>FIND A LOCATION</h2><?php echo do_shortcode('[wpgmza id="5"]'); ?></div>
				<?php
			}
		} else {
			if( $linki[1] == 'food-stories-pomorskie-restauracje' && empty($linki[2]) ) {

			}
			elseif ($linki[1] == 'food-stories-pomorskie-restauracje') {
				if ($linki[2] == 'znajdz-restauracje') {
			?>
				<div class="restauracja"><h2>ZNAJDŹ RESTAURACJĘ</h2><?php echo do_shortcode('[wpgmza id="2"]'); ?></div>
			<?php
				}
			}

			if ($linki[1] === 'spawellness' && $linki[2] == 'znajdz-obiekt') {
				?>
					<div class="restauracja"><h2>ZNAJDŹ OBIEKT</h2><?php echo do_shortcode('[wpgmza id="5"]'); ?></div>
				<?php
			}
		}


		echo do_shortcode('[bsa_pro_ad_space id=7]');
		echo do_shortcode('[bsa_pro_ad_space id=9]');
		echo do_shortcode('[bsa_pro_ad_space id=3]');

		if ($catLinkSlider == 'znajdz-obiekt' || $catLinkSlider == 'find-a-location') {

		} else {
		?>

		<h1 class="cat_title">
			<?php
			$ctd = get_category_by_slug($getLink);
			echo $ctd->name;
		?>
		</h1>
		<?php
		}
		?>
	</div>
	<div class="row">
<?php
$getCat = get_the_category();
// if ($_SERVER['REMOTE_ADDR'] == '89.68.114.52')
// 	var_dump($getCat);
if (!$getCat) {
	$category_id = 0;
	//echo "Brak wpisów";
} else {
	foreach ($getCat as $k => $catVal) {
		if ($catVal->slug == $getLink) {
			$category_id = $catVal->cat_ID;
		}
	}
// if ($_SERVER['REMOTE_ADDR'] == '89.68.114.52')
// 	var_dump($category_id);
	//$categories = get_the_category();
//$category_id = $categories[0]->cat_ID; //old - bralo tylko pierwszy term a powinno term ktory jest zgodny z linkiem
if (is_numeric($category_id)) {
	$idike = $category_id;
} else {
	$idike =  $category_id->term_taxonomy_id;
}
// if ($_SERVER['REMOTE_ADDR'] == '89.68.114.52')
// 	var_dump($idike);
$args = array(
	'category' => $idike,
	'numberposts' => -1
  );
$posts = get_posts($args);
if ($posts)
foreach($posts as $post) : setup_postdata($post);
 global $post; $categories = get_the_category($post->ID); //nbylo $post1-*
	if ( has_post_thumbnail() ) {
		$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
		if ( ! empty( $large_image_url[0] ) ) {
				$thumb_src = esc_url( $large_image_url[0] );
		} else {
				$thumb_src = ''; //tutaj wstaw domyslny placeholder jesli nie ma obrazka przypisanego
		}
	}

	?>

		<div class="col-xs-12 col-sm-4">
			<div <?php post_class( 'category-wrapper' ); ?>>
			<a href="<?php echo get_permalink(); ?>"><div id="thumb_archive" style="background: url('<?php echo $thumb_src; ?>') no-repeat;"></div></a>
				<div class="post-content">
				<?php
					$getCat = get_the_category();
					//var_dump($getCat[0]);
					foreach ($getCat as $k => $catVal) {
						if ($catVal->slug == $getLink) {
							$html = '<a class="cat_title_wpis" href="' . get_category_link($catVal->cat_ID) . '" ';
							$html .= 'title="' . $catVal->name . '">' . $catVal->name . '</a>';
						}
					}
					echo $html;
					//exclude_post_categories($category_id);
				 ?>
					<a href="<?php echo get_permalink(); ?>"><h2 class="title_archive"><?php the_title(); ?></h2></a>
					<div class="data"><?php echo get_the_date( 'd.m.Y' ); ?></div>
				</div>
			</div>
		</div>

<?php endforeach; wp_reset_postdata();

}
?>


<?php
$current_category = single_cat_title("", false);
$term_id = get_queried_object_id($current_category);
?>
<?php if( get_field('tekst-dolny','category_'.$term_id) ): ?>
    <div><?php the_field('tekst-dolny', 'category_' . $term_id); ?></div>
<?php endif; ?>

</div>

<?php

get_footer();
