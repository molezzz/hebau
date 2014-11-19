<?php get_header(); ?>
<?php
global $post;
the_post();
if($post->post_parent){
    $children = wp_list_pages("title_li=&child_of=".$post->post_parent."&echo=0");
} else {
    $children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0");
}
?>
<div class="breadcrumbs">
  <span>您当前的位置：<?php echo $post->post_title ?></span>
</div>
<div>
  <div class="quick-bar f-r">
   <ul>
     <?php
      if ($children) {
          echo '<ul>';
              echo $children;
          echo '</ul>';
      }
      ?>
   </ul>
  </div>
  <div class="panel cate-list post">
    <h1 class="t-c"><?php the_title(); ?></h1>
    <div class="content">
      <?php the_content();?>
    </div>
  </div>
</div>
<?php
get_footer();