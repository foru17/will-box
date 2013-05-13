<?php get_header(); ?>
<div class="archive-page-banner">
<?php /* If this is a category archive */ if (is_category()) { ?>
<h3 class="article-title"><?php single_cat_title(); ?> 下的所有文章</h2>
<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
<h3 class="article-title">标签为 <?php single_tag_title(); ?> 的所有文章</h3>
<div class="tag-des"><?php echo tag_description(); ?></div>
<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
<h3 class="article-title"><?php the_time('j F Y'); ?> 发表的文章</h3>
<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
<h3 class="article-title"><?php the_time('F Y'); ?> 发表的文章</h3>
<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
<h3 class="article-title"><?php the_time('Y'); ?> 发表的文章</h3>
<?php /* If this is an author archive */ } elseif (is_author()) { ?>
<h3 class="article-title">此作者的所有文章</h3>
<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
<h3 class="article-title">博客存档</h3>
<?php } ?>
</div>

<div id="content" class="home-posts-list archive-page">

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
<li><span class="icon-font">&#58;</span><?php the_date('','','') ?></li>
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