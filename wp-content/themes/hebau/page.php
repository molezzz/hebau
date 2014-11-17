<?php get_header(); ?>
<?php
$cate = get_the_category();
$parent_cate = get_cat_name($cate[0]->category_parent);
?>
<div class="breadcrumbs">
  <span>您当前的位置：<?php if($parent_cate){ echo  $parent_cate.' &gt'; }?> <?php echo $cate[0]->name ?></span>
</div>
<?php the_content(); ?>
<?php
get_footer();