<?php
$featured_image_url = get_the_post_thumbnail_url(get_the_ID());
?>

<header class="header page-info" style="background: url(<?php echo $featured_image_url != '' ? $featured_image_url  : '/wp-content/themes/blankslate-child/assets/category-deafult-bg.png' ?> )">
            <div class="breadcrumb">
                <?php echo get_breadcrumb(); ?>
            </div>
            <div class="title-share-wrapper">
                <h1 class="entry-title" itemprop="name"><?php the_title(); ?></h1>
            </div>
            <?php $template_description = get_field('krotki_opis'); ?>
            <div class="archive-meta" itemprop="description">
                <?php if ($template_description != '') {
                    echo $template_description;
                } ?>
            </div>
</header>