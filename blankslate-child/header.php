<!doctype html>
<html lang="<?php bloginfo('language'); ?>">
<head>
  <!-- DOCUMENT SETTINGS -->
  <meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' );?>" charset="<?php bloginfo( 'charset' ); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <!-- PAGE META -->
  <title><?php wp_title(''); ?></title>
  <meta name="description" content="<?php get_the_excerpt(); ?>">


  <!-- RESPONSIVE UTILITIES -->
  <meta name="HandheldFriendly" content="True">
  <meta name="MobileOptimized" content="320">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
  <script src="https://apis.google.com/js/api.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.5.0/tiny-slider.css">
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" /> 

  <script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.5.0/min/tiny-slider.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
 
  <link
  rel="stylesheet"  
  href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"
/>
<!-- <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&display=swap" rel="stylesheet"> -->
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"><link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
 
  <?php wp_head(); ?>

</head>
<body <?php body_class(); ?> >


<?php get_template_part('views/common', 'header'); ?>







