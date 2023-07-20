<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package pomorskie_prestige
 */

?>

<article class="otoczka_wysz" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


	<div class="postthumb_wysz">

		<?php the_post_thumbnail(array(200,200)); ?>

		<?php the_title( sprintf( '<h2 class="entry-title2"><i class="far fa-newspaper"></i>&nbsp;<a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<div class="skrot_wysz"><?php echo wp_trim_words( get_the_content(), 25, ' ...'); ?></div>

	</div>

     

        <div clas="postexp_wysz">


        </div>

    </article><!-- #post-<?php the_ID(); ?> -->
