<?php
/*
Template Name: How to be a partner template
*/

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
         <?php 
         get_template_part('views/hero', 'section-without-description'); 
         get_template_part('views/how-to-be-a-partner/text', 'icon-section');
         get_template_part('views/how-to-be-a-partner/content', 'section');
         get_template_part('views/how-to-be-a-partner/steps', 'section');
         get_template_part('views/common', 'slider-partners');
         get_template_part('views/how-to-be-a-partner/text', 'section-show-more-button');  
        
         ?>
        

    </main>
</div>

<?php get_footer(); ?>