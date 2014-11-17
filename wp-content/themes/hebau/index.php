<?php get_header(); ?>
<div class="main-layout">
  <div class="main-layout-l f-l">
    <div id="sliderBox">
    <?php $cid = 5 ?>
    <?php query_posts('cat='.$cid.'&showposts=5'); ?>
    <?php while (have_posts()) : the_post(); ?>
    <a href="<?php the_permalink(); ?>" target='_blank'>
      <img src=""/>
      <span><?php the_title(); ?></span>
    </a>
    <?php endwhile; ?>

    </div><!-- #sliderBox -->
    <div id="quickLinks">
      <dl>
        <dt>联系我们</dt>
        <dd>
          <p>统战部电话：0312-7521294</p>
          <p>统战部邮箱：tongzhanbu@hebau.edu.cn</p>
        </dd>
        <dt>友情链接</dt>
        <dd>
          <select>
            <option value="">选择连接</option>
          </select>
          <select>
            <option value="">选择连接</option>
          </select>
        </dd>
      </dl>
    </div>
  </div><!-- .main-layout-l -->
  <div class="main-layout-r f-r">
    <dl class="title-list">
      <dt>
        <h2>
          <span class="title f-l">
            <!-- 工作动态 -->
            <?php $cid = 3 ?>
            <span class="f-l"><?php echo get_cat_name($cid)?> </span><em>&nbsp;</em>
          </span>
          <a href="<?php echo get_category_link($cid);?>" class="more f-r">更多</a>
        </h2>
      </dt>
      <dd>
        <ul>
          <?php query_posts('cat='.$cid.'&showposts=8'); ?>
          <?php while (have_posts()) : the_post(); ?>
          <li><a href="<?php the_permalink(); ?>" target='_blank'><?php the_title(); ?></a><span class="time">[<?php echo date('Y-m-d');?>]</span></li>
          <?php endwhile; ?>
        </ul>
      </dd>
      <dt>
        <h2>
          <span class="title f-l">
            <!-- 统战要闻 -->
            <?php $cid = 4 ?>
            <span class="f-l"><?php echo get_cat_name($cid)?> </span><em>&nbsp;</em>
          </span>
          <a href="<?php echo get_category_link($cid);?>" class="more f-r">更多</a>
        </h2>
      </dt>
      <dd>
        <ul>
          <?php query_posts('cat='.$cid.'&showposts=8'); ?>
          <?php while (have_posts()) : the_post(); ?>
          <li><a href="<?php the_permalink(); ?>" target='_blank'><?php the_title(); ?></a><span class="time">[<?php echo date('Y-m-d');?>]</span></li>
          <?php endwhile; ?>
        </ul>
      </dd>
    </dl>
  </div><!-- .main-layout-r -->
  <div class="clearfix"></div>
</div>
<div id="bottomBanner" class="t-c">
  <img src="<?php echo get_template_directory_uri();?>/images/img_bottom.jpg"/>
</div>
<?php
get_footer();