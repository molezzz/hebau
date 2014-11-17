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

function pagination($query_string){
  global $posts_per_page, $paged;
  $my_query = new WP_Query($query_string ."&posts_per_page=-1");
  $total_posts = $my_query->post_count;
  if(empty($paged))$paged = 1;
  $prev = $paged - 1;
  $next = $paged + 1;
  $range = 2; // only edit this if you want to show more page-links
  $showitems = ($range * 2)+1;

  $pages = ceil($total_posts/$posts_per_page);
  if(1 != $pages){
  echo "<div class='pagination'>";
  echo ($paged > 2 && $paged+$range+1 > $pages && $showitems < $pages)? "
  <a href='".get_pagenum_link(1)."'>最前</a>":"";
  echo ($paged > 1 && $showitems < $pages)? "
  <a href='".get_pagenum_link($prev)."'>上一页</a>":"";

  for ($i=1; $i <= $pages; $i++){
  if (1 != $pages &&( !($i >= $paged+$range+1 ||
      $i <= $paged-$range-1) || $pages <= $showitems )){
  echo ($paged == $i)? "<span class='current'>".$i."</span>":
  "<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";
  }
  }

  echo ($paged < $pages && $showitems < $pages) ?
  "<a href='".get_pagenum_link($next)."'>下一页</a>" :"";
  echo ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) ?
  "<a href='".get_pagenum_link($pages)."'>最后</a>":"";
  echo "</div>\n";
  }
}