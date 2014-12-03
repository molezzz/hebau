<?php
//禁用字体
function coolwp_remove_open_sans_from_wp_core() {
    wp_deregister_style( 'open-sans' );
    wp_register_style( 'open-sans', false );
    wp_enqueue_style('open-sans','');
}
add_action( 'init', 'coolwp_remove_open_sans_from_wp_core' );
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

function emtx_auto_thumbnail($pID,$thumb='thumbnail') {
    $blogimg = FALSE;
     if (has_post_thumbnail()) {// 判断该文章是否已经设置了“特色图像”，如果有则直接显示该特色图像的缩略图
        $blogimg = wp_get_attachment_image_src(get_post_thumbnail_id($pID),$thumb);
        $blogimg = $blogimg[0];
     // } elseif ($postimages = get_children("post_parent=$pID&post_type=attachment&post_mime_type=image&numberposts=0")) {//如果文章没有设置特色图像，则查找文章内是否有上传图片

     //    foreach($postimages as $postimage) {
     //      $blogimg = wp_get_attachment_image_src($postimage->ID, $thumb);
     //      $blogimg = $blogimg[0];
     //      break; //只取第一张
     //    }
     } elseif (preg_match('/<img [^>]*src=["|\']([^"|\']+)/i', get_the_content(), $match) != FALSE) {
       $blogimg = $match[1];
     }
     //if($blogimg) {
     // $blogimg = '<a href="'. get_permalink().'"><img src="'.$blogimg.'" alt="'.get_the_title().'"  class="alignleft wp-post-image"  /></a>';
     //}
    return $blogimg;
 }

 function get_category_root_id($cat){
    $this_category = get_category($cat); // 取得当前分类
    while($this_category->category_parent) // 若当前分类有上级分类时，循环
    {
    $this_category = get_category($this_category->category_parent); // 将当前分类设为上级分类（往上爬）
    }
    return $this_category->term_id; // 返回根分类的id号
}