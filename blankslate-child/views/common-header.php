<header class="header">
    <div class="main_header">
        <div class="social_container">
            <ul class="navigation_social">
                <li class="social_item">
                    <a href="<?php the_field('facebook_link', 'header_settings'); ?>" target="_blank" rel="noopener norefferer">
                        Facebook
                    </a>
                </li>
                <li class="social_item">
                    <a href="<?php the_field('instagram_link', 'header_settings'); ?>" target="_blank" rel="noopener norefferer">
                        Instagram
                    </a>
                </li>
                <li class="social_item">
                    <a href="<?php the_field('youtube_link', 'header_settings'); ?>" target="_blank" rel="noopener norefferer">
                        Youtube
                    </a>
                </li>
                <li class="social_item">
                    <a href="<?php the_field('tiktok_link', 'header_settings'); ?>" target="_blank" rel="noopener norefferer">
                        Tiktok
                    </a>
                </li>
            </ul>
        </div>


        <div class="menu_wrapper">
            <div class="logo_menu_wrapper">
                <div class="header_logo">
                    <a href="<?php bloginfo('url'); ?>">
                        <img src="<?php echo esc_url(wp_get_attachment_image_src(get_theme_mod('custom_logo'), 'full')[0]); ?>" class="u-img-responsive">
                    </a>
                </div>
                <?php get_template_part('views/header', 'megamenu'); ?>
                <div class="right-side-nav">

                    <div class="search-input-container">
                        <?php
                        // Get the search form HTML
                        $search_form = get_search_form(false);

                        // Output the search form HTML
                        echo $search_form;
                        ?>
                        <span class="material-symbols-outlined close-search-icon">
                            close
                        </span>
                    </div>
                    <div class="icon_wrapper">

                        <div class="search-container">
                            <a href="#" class="icon search-toggle">
                                <span class="material-symbols-outlined">
                                    search
                                </span>
                            </a>

                        </div>
                        <button type="button" class="header__toggle">
                            <div class="header__toggle__item"></div>
                            <div class="header__toggle__item"></div>
                            <div class="header__toggle__item"></div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="menu_container_mobile">
        <div class="menu-header">
            <span class="material-symbols-outlined close-icon">
                close
            </span>
        </div>
        <div class="navigation__overlay"></div>
        <div id="mobile-nav" class="header_navigation_mobile">
            <?php wp_nav_menu([
               
                'menu_id' => 'navigation-list',
                'menu_class' => 'navigation__list open',
                'container' => 'nav',
                'container_id' => 'navigation',
                'container_class' => 'navigation',
                'theme_location' => 'menu-1',
            ]); ?>
        </div>

        <div class="mobile_menu_footer">
            <ul class="navigation_social">
                <li class="social_item">
                    <a href="<?php the_field('facebook_link', 'header_settings'); ?>" target="_blank" rel="noopener norefferer">
                        Facebook
                    </a>
                </li>
                <li class="social_item">
                    <a href="<?php the_field('instagram_link', 'header_settings'); ?>" target="_blank" rel="noopener norefferer">
                        Instagram
                    </a>
                </li>
                <li class="social_item">
                    <a href="<?php the_field('youtube_link', 'header_settings'); ?>" target="_blank" rel="noopener norefferer">
                        Youtube
                    </a>
                </li>
                <li class="social_item">
                    <a href="<?php the_field('tiktok_link', 'header_settings'); ?>" target="_blank" rel="noopener norefferer">
                        Tiktok
                    </a>
                </li>
            </ul>
            <!-- <p class="translation_dropdown">English</p> -->
        </div>
        <?php
							wp_nav_menu(array(
								'theme_location' => 'menu-1', 
								'menu_id'        => 'primary-menu',
							));
							?>
    </div>

</header>