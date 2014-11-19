<?php get_header(); ?>
<?php
$cate = get_category(get_query_var('cat'));
$parent_id = $cate->cat_ID;
if($cate->category_parent > 0){
  $parent_cate = get_cat_name($cate->category_parent);
  $parent_id = $cate->category_parent ;
}
?>
<div class="breadcrumbs">
  <span>您当前的位置：<?php if($parent_cate){ echo  $parent_cate.' &gt'; }?> <?php echo $cate->name ?></span>
</div>
<div>
  <div class="quick-bar f-r">
   <ul>
     <?php
      wp_list_cats('child_of='.$parent_id.'&depth=0&hide_empty=0');
      //$cates = get_categories('child_of='.$cate[0]->category_parent.'&depth=0&hide_empty=0');
      ?>
   </ul>
  </div>
  <div class="panel cate-list">
    <ul>
      <?php query_posts('cat='.$cate->cat_ID.'&paged='.$paged.'&showposts='.$posts_per_page); ?>
      <?php while (have_posts()) : the_post(); ?>
      <li><a href="<?php the_permalink(); ?>" target='_blank'><?php the_title(); ?></a><span class="time"><?php echo date('Y-m-d');?></span></li>
      <?php endwhile; ?>
    </ul>
    <?php pagination($query_string); ?>
  </div>
  <div class="clearfix"></div>
</div>
<?php
get_footer();