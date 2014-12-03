<?php get_header(); ?>
<div class="main-layout">
  <div class="main-layout-l f-l">
    <div id="sliderBox">
    <?php $cid = 5 ?>
    <?php query_posts('cat='.$cid.'&showposts=5'); ?>
    <?php while (have_posts()) : the_post(); ?>
    <a href="<?php the_permalink(); ?>" target='_blank'>
      <img src="<?php echo emtx_auto_thumbnail($post->ID,'large')?>"/>
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
          <select class="quick-links">
            <option value="">相关连接</option>
            <option value="http://www.zytzb.gov.cn/tzb2010/index.shtml">中共中央统战部</option>
            <option value="http://www.hbtyzx.org.cn/">河北省委统战部</option>
            <option value="http://www.minge.gov.cn/">民革中央</option>
            <option value="http://www.dem-league.org.cn/">民盟中央</option>
            <option value="http://www.cndca.org.cn/">民建中央</option>
            <option value="http://www.mj.org.cn/">民进中央</option>
            <option value="http://www.ngd.org.cn/">农工党中央</option>
            <option value="http://www.93.gov.cn/">九三学社中央</option>
            <option value="http://www.gqb.gov.cn/">国务院侨办</option>
            <option value="http://www.chinaql.org/sites/ql/index.html">中国侨联</option>
          </select>
          <select class="quick-links">
            <option value="">友情连接</option>
            <option value="http://www.zysy.org.cn/portal/index.htm">中央社会主义学院</option>
            <option value="http://tongzhanbu.hbu.cn/">河北大学统战部</option>
            <option value="http://202.206.100.3/chu/tzb/index.htm">河北师范大学统战部</option>
            <option value="http://web.heuet.edu.cn/tzb/">河北经贸大学统战部</option>
            <option value="http://tongzhan.web.hebust.edu.cn/">河北科技大学统战部</option>
            <option value="http://tzb.heuu.edu.cn/UI/Default.aspx">河北联合大学统战部</option>
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
          <li><a href="<?php the_permalink(); ?>" target='_blank'><?php the_title(); ?></a><span class="time">[<?php the_time('Y-m-d');?>]</span></li>
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
          <li><a href="<?php the_permalink(); ?>" target='_blank'><?php the_title(); ?></a><span class="time">[<?php the_time('Y-m-d');?>]</span></li>
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
<script type="text/javascript">
   $('#sliderBox').coinslider({
    width: 440,
    height: 320,
    delay: 5000,
    navigation: true
   });
   $('.quick-links').change(function(){
    var $this = $(this);
    window.open($this.val());
   });
</script>
<?php
get_footer();