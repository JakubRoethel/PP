<?php if (have_rows('how_to_be_a_partner')) : ?>


<?php
$template_group = get_field('how_to_be_a_partner');
$contents = $template_group['content'];
?>
<?php if ($contents) : ?>
        <div class="single-container">
            <?php foreach ($contents as $single_content_item) {
                $content_title = $single_content_item['content_title'];
                $content_description = $single_content_item['content_description'];
            ?>
                <?php if ($content_title) : ?>
                    <h2 class="title"> <?php echo $content_title ?></h2>
                <?php endif; ?>
                <?php if ($content_description) : ?>
                    <div class="description"> <?php echo $content_description ?></div>
                <?php endif; ?>
            <?php  } ?>
        </div>
    <?php endif; ?>
<?php endif; ?>