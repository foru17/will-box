<?php get_header(); ?>

<div id="content" class="home-posts-list">

<div id="inner-content" class="wrap clearfix">

<div id="main" class="first clearfix" role="main">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<!-- 首页瀑布流单独box -->


<article id="post-<?php the_ID(); ?>" class="post-in-list" <?php post_class('clearfix'); ?> role="article">

<div class="blog-entry-thumbnail">
<?php dm_the_thumbnail(); ?>

</div> <!-- 缩略图end-->
<div class="blog-entry-text"> <!-- 首页博文简介-->
<header class="entry-header">

<h2 class="h2"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>


</header> <!-- end article header -->
<section class="entry-content clearfix">
<?php if(is_category() || is_archive() || is_home() ) {
the_excerpt('<span class="read-more">阅读全文</span>');
} else {
the_content('<span class="read-more">阅读全文 &raquo;</span>'); 
} ?>
</section> <!-- end article section -->

<footer class="entry-meta">
<li><span class="icon-font">&#58;</span><?php the_time('Y年 n月 j日') ?></li>
<li><span class="icon-font">&#343;</span><?php comments_popup_link('暂无评论', '1 评论', '% 评论'); ?></li>
<div class="home-box-cat-tag">
<?php echo get_the_category_list('') ;?>
</div>
</footer> <!-- end article footer -->

</div><!-- 首页博文简介 END-->


</article> <!-- end article -->

<?php endwhile; ?>



<?php else : ?>

<article id="post-not-found" class="hentry clearfix">
<header class="article-header">
<h1><?php _e("木有文章哦", "bonestheme"); ?></h1>
</header>
<section class="entry-content">
<p><?php _e("什么东西不见了，试试其他页面 ", "bonestheme"); ?></p>
</section>
<footer class="article-footer">
<p><?php _e("index.php文件中有错误厄,灭了开发者.", "bonestheme"); ?></p>
</footer>
</article>

<?php endif; ?>

</div> <!-- end #main -->


</div> <!-- end #inner-content -->

</div> <!-- end #content -->
<div class="clearfix"></div>

<?php bones_page_navi()  ?>

<?php get_footer(); ?>
