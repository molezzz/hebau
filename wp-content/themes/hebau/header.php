<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>" />
  <meta name="viewport" content="width=device-width">
  <title><?php bloginfo( 'name' ); ?></title>
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri();?>/style.css">
  <?php //wp_head(); ?>
  <!--[if IE]>
  <style type="text/css">
    .title-list dt h2 .more {
      top: 11px;
    }
  </style>
  <![endif]-->
  <!--[[if lt IE 8]>
  <style type="text/css">
    #main .quick-bar {
      margin-top: -50px;
    }
  </style>
  <![endif]-->
</head>
<body>
<div id="main">
  <?php if ( get_header_image() ) : ?>
  <div class="top-banner">
    <img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="">
  </div>
  <?php endif; ?>
  <div class="nav">
    <div class="nav-left f-l"></div>
    <div class="nav-center f-l">
      <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
    </div>
    <div class="nav-right f-l"></div>
  </div>
