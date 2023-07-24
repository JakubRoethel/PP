<?php

/**
 * 
 *
 * This template is used to display the article in the blog loop.
 *
 * @package YourTheme
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="entry-summary">
        <?php if ((has_post_thumbnail()) && (!is_search())) : ?>
            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail(); ?></a>
        <?php endif; ?>
        <?php if (is_singular() && !is_front_page() && !is_page_template('custom-template-numerologia.php') && !is_page_template('custom-template-sidebar.php')) {
            echo '<h1 class="entry-title" itemprop="headline">';
        } else {
            echo '<h2 class="entry-title">';
        } ?>
        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a>
        <?php if (is_singular()) {
            echo '</h1>';
        } else {
            echo '</h2>';
        } ?>
        <div class="blog-post-categories">
            <?php
            $categories = get_the_category();
            if (!empty($categories)) {
                foreach ($categories as $category) {
                    echo '<a href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a>';
                }
            }
            ?>
        </div>
        <div class="description" itemprop="description"><?php the_excerpt(); ?></div>
        <?php if (is_search()) { ?>
            <div class="entry-links"><?php wp_link_pages(); ?></div>
        <?php } ?>
    </div>




</article>