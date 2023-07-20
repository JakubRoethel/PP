<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package pomorskie_prestige
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,900&amp;subset=latin-ext" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(). '/css/owl.carousel.min.css' ?>">

   
	<script
      src="https://code.jquery.com/jquery-3.6.0.min.js"
      integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
      crossorigin="anonymous"
    ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.15/jquery.bxslider.min.js" integrity="sha512-p55Bpm5gf7tvTsmkwyszUe4oVMwxJMoff7Jq3J/oHaBk+tNQvDKNz9/gLxn9vyCjgd6SAoqLnL13fnuZzCYAUA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.15/jquery.bxslider.css" integrity="sha512-rV4fiystTwIvs71MLqeLbKbzosmgDS7VU5Xqk1IwFitAM+Aa9x/8Xil4CW+9DjOvVle2iqg4Ncagsbgu2MWxKQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<?php wp_head(); ?>

	<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-KNKL68F');</script>
<!-- End Google Tag Manager -->


	<script >

jQuery(document).ready(function(){
	//$('.carousel').carousel();
	var newid = 0;
	jQuery('p').each(
		function() {
			var zero = 0;
			var p = jQuery(this);
			var imagi ='';
			p.children().each(
				function() {
					// if (zero == 0) {
					// 	imagi += '<div class=" item active">'; //+ active dla pierwszego //owl-item
					// } else {
					// 	imagi += '<div class=" item">'; //+ active dla pierwszego //owl-item
					// }
					imagi += '<div class="tstcls">';
					var j = jQuery(this);
					if (j.is("img")) {
						imagi += j[0].outerHTML;
						zero++;
					}
					imagi += '</div>';
				}
			);
			if (zero > 1) {
				 //jQuery(p).replaceWith('<div id="carousel_'+newid+'" class="gallery carousel slide" data-ride="carousel" data-interval="3200"><div class="carousel-inner" role="listbox">'+imagi+'</div><a class="left carousel-control" href="#carousel_'+newid+'" role="button" data-slide="prev"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span><span class="sr-only">Poprzedni</span></a><a class="right carousel-control" href="#carousel_'+newid+'" role="button" data-slide="next"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span><span class="sr-only">Następny</span></a></div>');
				//jQuery(p).replaceWith('<div id="carousel_'+newid+'" class="owl-carousel owl-theme owl-loaded owl-drag"><div class="owl-stage-outer"><div class="owl-stage">'+imagi+'</div></div></div>');
				jQuery(p).replaceWith('<div class="slider">'+imagi+'</div>');

			}
			newid++;
		}
	);

	$('.slider').bxSlider({
		auto: true,
		controls: true
	}); //obsluga slidera zdjec we wpisie
	console.log('=======DODAJE BXSLIDER=');

	$(window).scroll(function() {    
		var scroll = $(window).scrollTop();

		if (scroll >= 300) {
			$("#menu_cale").addClass("fixed");
		} else {
			$("#menu_cale").removeClass("fixed");
		}
	});
	
  jQuery('.owl-carousel').owlCarousel({ //obsluga slidera kategorii
      loop:true,
      margin:10,
      responsiveClass:true,
      responsive:{
          0:{
              items:1,
              nav:true
          },
          600:{
              items:3,
              nav:false
          },
          1000:{
              items:3,
              nav:true,
              loop:true
          }
      }
	});
	
	$('#otworz_menu').click(function() {
    {
        $('#panel_menu').animate({"left": '+=350'});
    }

	});
	
	$('#zamknij_menu').click(function() {
    {
        $('#panel_menu').animate({"left": '-=350'});
    }

	});
	
	$('.oko').click(function() {
    {
        $('#wp_access_helper_container').addClass('active');
    }

  });

});
	</script>

	

	<script>
    $(document).ready(function(){
     	
    });


	$(document).ready(function(){
		$('.search-btn').prop('disabled',true);
		$('.wpisz').keyup(function(){
			$('.search-btn').prop('disabled', this.value == "" ? true : false);     
		})
	});  

  </script>
<meta name="facebook-domain-verification" content="dqqdup9l6qxy21p1waqv15r0dufcf4" />
</head>

<body <?php body_class(); ?>>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KNKL68F"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'pomorskie_prestige' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="site-branding">
			<?php
			//the_custom_logo();
			?>
			
				<?php 
					$linki = explode('/',$_SERVER['REQUEST_URI']);
					//var_dump($linki);
					$getLink = '';
					if ($linki[1] == 'en') {
						?>
							<a href="<?php echo site_url()."/en/"; ?>" class="custom-logo-link" rel="home" itemprop="url">
						<?php
						if (!empty($linki[2])) {
							$getLink = $linki[2];
						} else {
							$getLink = 'none';
						}
					} else {
						?>
							<a href="<?php echo site_url(); ?>" class="custom-logo-link" rel="home" itemprop="url">
						<?php
						if (!empty($linki[1])) {
							$getLink = $linki[1];
						} else {
							$getLink = 'none';
						}
					}
					$categories = get_the_category();
					//var_dump($getLink);
					if ( ! empty( $getLink ) ) {
						switch ($getLink) {
							case 'bursztyn-i-design':
							case 'amberdesign':
							case 'amberdesign-en':
								?>
								<img src="<?php echo get_template_directory_uri(); ?>/img/logo_amber.jpg" class="custom-logo" alt="Pomorskie Prestige" itemprop="logo" >
								<?php
								break;
							case 'food-stories-pomorskie-restauracje':
							case 'food-stories':
							case 'food-stories-en':
								?>
								<img src="<?php echo get_template_directory_uri(); ?>/img/logo_food_stories.jpg" class="custom-logo" alt="Pomorskie Prestige" itemprop="logo" >
								<?php
								break;
							case 'spawellness':
							case 'medicalspa':
							case 'medicalspa-en':
								?>
								<img src="<?php echo get_template_directory_uri(); ?>/img/logo_medical.jpg" class="custom-logo" alt="Pomorskie Prestige" itemprop="logo" >
								<?php
								break;
							case 'shopping-lifestyle':
							case 'shoppinglifestyle':
							case 'shoppinglifestyle-en':
								?>
								<img src="<?php echo get_template_directory_uri(); ?>/img/logo_shopping.jpg" class="custom-logo" alt="Pomorskie Prestige" itemprop="logo" >
								<?php
								break;
							case 'slowlife':
							case 'slowlife-en':
								?>
								<img src="<?php echo get_template_directory_uri(); ?>/img/logo_slow.jpg" class="custom-logo" alt="Pomorskie Prestige" itemprop="logo" >
								<?php
								break;
							case 'yachtgolf':
							case 'yactgolf':
							case 'yachtgolf-en':
								?>
								<img src="<?php echo get_template_directory_uri(); ?>/img/logo_yacht.jpg" class="custom-logo" alt="Pomorskie Prestige" itemprop="logo" >
								<?php
								break;
							
							default:
								?>
								<img src="<?php echo site_url(); ?>/wp-content/uploads/2019/04/logo.png" class="custom-logo" alt="Pomorskie Prestige" itemprop="logo" >
								<?php
								break;
						}
					} else {
						?>
						<img src="<?php echo site_url(); ?>/wp-content/uploads/2019/04/logo.png" class="custom-logo" alt="Pomorskie Prestige" itemprop="logo" >
						<?php
					}
				?>
				
			</a>
			<?php
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

		<div id="panel_menu">
				<div id="zamknij_menu">X</div>
       <?php
		if ($linki[1] == 'en') {
						?>
							
							<a href="<?php echo site_url()."/en/"; ?>"><div id="logo_menu"><img src="/wp-content/themes/pomorskie_prestige/img/logo.png" /></div></a>
						<?php
						
					} else {
						?>
							
							<a href="<?php echo site_url(); ?>"><div id="logo_menu"><img src="/wp-content/themes/pomorskie_prestige/img/logo.png" /></div></a>
						<?php
						
					}?>
					 
				<div id="kate_manu">
					<?php
							wp_nav_menu( array(
								'theme_location' => 'menu-1',
								'menu_id'        => 'menu1',
							) );
					?>
				</div>
				  <?php
							wp_nav_menu( array(
								'theme_location' => 'footer',
								'menu'        => 46,
								'menu_id'        => 'menu2',
							) );
					?>
				<div id="social_menu">
					<div id="left">
					<a href="/kontakt"><div id="email"><img src="/wp-content/themes/pomorskie_prestige/img/email.jpg" /></div></a>
								<a href="https://www.facebook.com/PomorskiePrestige/" target="_blank"><div id="fb"><img src="/wp-content/themes/pomorskie_prestige/img/facebook.jpg" /></div></a>
								<a href="https://www.instagram.com/pomorskie_prestige/" target="_blank"><div id="insta"><img src="/wp-content/themes/pomorskie_prestige/img/instagram.jpg" /></div></a>
						</div>
						<div id="right">
							<div class="oko"></div>
						</div>
				</div>
				<div id="lupa"><?php echo do_shortcode('[serach-popup]'); ?></div>

		 </div>

		<div class="container">
			<div class="row">
					<div id="left">
					<a href="<?php
						if ($linki[1] == 'en') {
							echo "/en/kontakt";
						} else {
							echo "/kontakt";
						}
						
					?>"><div id="email"><img src="/wp-content/themes/pomorskie_prestige/img/email.jpg" /></div></a>
						<a href="https://www.facebook.com/PomorskiePrestige/" target="_blank"><div id="fb"><img src="/wp-content/themes/pomorskie_prestige/img/facebook.jpg" /></div></a>
						<a href="https://www.instagram.com/pomorskie_prestige/" target="_blank"><div id="insta"><img src="/wp-content/themes/pomorskie_prestige/img/instagram.jpg" /></div></a>
					</div>

					<div id="right">
						<?php echo do_shortcode('[serach-popup]'); ?>
						<?php echo do_shortcode('[widget  id="polylang-4"]'); ?>
						
						<div class="oko"></div>
					</div>
				<div id="linia"></div>
			<div id="menu_cale">	 
				<div id="otworz_menu"></div>

				<nav id="site-navigation" class="main-navigation">
					<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'pomorskie_prestige' ); ?></button>
					<?php
					wp_nav_menu( array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
					) );
					?>
				</nav><!-- #site-navigation -->
			</div>
		</div>
		</div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
