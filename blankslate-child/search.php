<?php

/**
 * Template for displaying search results.
 */

get_header(); ?>
<div class="search-section">
    <?php if (have_posts()) : ?>

        <header class="header">
            <h1 class="entry-title" itemprop="name"><?php printf(pll__('Wyniki wyszukiwania dla: %s'), get_search_query()); ?></h1>
        </header>
        <div class="results-list">
            <?php while (have_posts()) : the_post(); ?>
                <?php get_template_part('entry'); ?>
            <?php endwhile; ?>
        </div>
        <?php get_template_part('nav', 'below'); ?>
    <?php else : ?>
        <article id="post-0" class="post no-results not-found">
            <header class="header">
                <h1 class="entry-title" itemprop="name"><?php esc_html_e('Nie znaleziono wyników', 'blankslate'); ?></h1>
            </header>
            <div class="entry-content" itemprop="mainContentOfPage">
                <p><?php esc_html_e('Przepraszamy, ale nic nie pasuje do Twojego wyszukiwania. Spróbuj ponownie.', 'blankslate'); ?></p>
                <?php get_search_form(); ?>
            </div>
        </article>


    <?php endif; ?>
</div>
<?php get_footer(); ?>