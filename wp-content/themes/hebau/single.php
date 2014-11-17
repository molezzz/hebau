<?php get_header(); ?>
<?php
$cate = get_the_category();
$parent_cate = get_cat_name($cate[0]->category_parent);
the_post();
$from = get_post_meta(get_the_ID(), 'from', true);
?>
<div class="breadcrumbs">
  <span>您当前的位置：<?php if($parent_cate){ echo  $parent_cate.' &gt'; }?> <?php echo $cate[0]->name ?></span>
</div>
<div class="panel post">
  <h1 class="t-c"><?php the_title(); ?></h1>
  <div class="detial t-c">
    <span>时间：<?php the_time('Y-m-d G:i:s');?> </span>
    <span>来源：<?php echo $from; ?></span>
    <span>作者：<?php the_author();?></span>
  </div>
  <div class="content">
    <?php the_content();?>
  </div>
</div>
<?php
get_footer();