<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package pomorskie_prestige
 */

?>

	</div><!-- #content -->

	<div class="container">
		<div class="row">
		<a href="https://www.instagram.com/pomorskietravel/" target="_blank" class="obserwuj_tyt"><h2 class="insta"><?php echo pll__( 'OBSERWUJ NA INSTAGRAMIE' );  ?></h2></a>
			<?php echo do_shortcode('[instagram-feed feed=1]'); ?>
		</div>
	</div>

<div id="bg_footer">

	<div class="site-branding">
		<?php
		the_custom_logo();
		if ( is_front_page() && is_home() ) :
			?>
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php
		else :
			?>
			<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php
		endif;
		$pomorskie_prestige_description = get_bloginfo( 'description', 'display' );
		if ( $pomorskie_prestige_description || is_customize_preview() ) :
			?>
			<p class="site-description"><?php echo $pomorskie_prestige_description; /* WPCS: xss ok. */ ?></p>
		<?php endif; ?>
	</div><!-- .site-branding -->

	<?php
	wp_nav_menu( array(
		'theme_location' => 'menu-2',
		'menu_id'        => 'footer-menu',
	) );
	?>

<div id="social_footer">
<a href="https://www.facebook.com/PomorskiePrestige/" target="_blank"><div id="fb"><img src="/wp-content/themes/pomorskie_prestige/img/fb_footer.png" /></div></a>
<a href="https://www.instagram.com/pomorskie_prestige/" target="_blank">	<div id="insta"><img src="/wp-content/themes/pomorskie_prestige/img/insta_footer.png" /></div></a>
</div>

</div>

	<footer id="colophon" class="site-footer">
POMORSKIE PRESTIGE  |  Wszelkie prawa zastrzeżone  | <button type="button" class="polityka" data-toggle="modal" data-target="#exampleModalCenter"> Informacja o plikach cookies</button>
<div>Projekt i realizacja: <a href="http://www.tomsky.pl" target="_blank">Tomsky.pl</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Polityka prywatności</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        W ramach naszej witryny stosujemy pliki cookies w celu świadczenia Państwu usług na najwyższym poziomie, w tym w sposób dostosowany do indywidualnych potrzeb. Korzystanie z witryny bez zmiany ustawień dotyczących cookies oznacza, że będą one zamieszczane w Państwa urządzeniu końcowym. Możecie Państwo dokonać w każdym czasie zmiany ustawień dotyczących cookies. Więcej szczegółów w naszej <a href="/polityka-prywatnosci-2">"Polityce Cookies"</a>
      </div>
    </div>
  </div>
</div>

<?php wp_footer(); ?>

</body>
</html>
