<?php
add_theme_support('custom-header', array(
  'default-image'          => get_template_directory_uri() . '/images/header.jpg',
  'random-default'         => false,
  'width'                  => 980,
  'height'                 => 137,
  'flex-height'            => false,
  'flex-width'             => false,
  'default-text-color'     => '',
  'header-text'            => false,
  'uploads'                => true,
  'wp-head-callback'       => '',
  'admin-head-callback'    => '',
  'admin-preview-callback' => '',
));
register_nav_menus( array(
  'primary'   => __( '全局导航菜单', 'hebau' )
) );