<?php $featured_content = get_field('featured_content'); ?>
<?php if ($featured_content) : ?>
    <section class="featured-content-wrapper">
        <div class="swiper_featured_content">
            <div class="swiper-wrapper">
                <?php foreach ($featured_content as $post) : ?>
                    <div class="swiper-slide">
                        <?php setup_postdata($post); ?>
                        <div class="single-content">
                            <a class="entry-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
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
                            <?php if ((has_post_thumbnail()) && (!is_search())) : ?>
                                <a class="img-container" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail(); ?></a>
                            <?php endif; ?>
                        </div>

                    </div>
                <?php endforeach; ?>
                <?php wp_reset_postdata(); ?>
            </div>
        </div>
    </section>
<?php endif; ?>