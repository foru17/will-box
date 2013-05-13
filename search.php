<?php get_header(); ?>
<div class="archive-page-banner">
<h3 class="article-title"><?php echo esc_attr(get_search_query()); ?><span><?php _e(' 的搜索结果', 'bonestheme'); ?></span> </h3>
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
<?php the_excerpt('<span class="read-more">阅读全文</span>'); ?>

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

<article id="post-<?php the_ID(); ?>" class="post-in-list" <?php post_class('clearfix'); ?> role="article">

<div class="blog-entry-thumbnail">
<?php dm_the_thumbnail(); ?>

</div> <!-- 缩略图end-->
<div class="blog-entry-text"> <!-- 首页博文简介-->
<header class="entry-header">

<h2 class="h2"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">其实本文不存在</a></h2>


</header> <!-- end article header -->
<section class="entry-content clearfix">
<?php the_excerpt('<span class="read-more">阅读全文</span>'); ?>

</section> <!-- end article section -->

<footer class="entry-meta">
<li><span class="icon-font">&#58;</span>未来的某一天</li>
<li><span class="icon-font">&#343;</span><?php comments_popup_link('暂无评论', '1 评论', '% 评论'); ?></li>
<div class="home-box-cat-tag">
<?php echo get_the_category_list('') ;?>
</div>
</footer> <!-- end article footer -->

</div><!-- 首页博文简介 END-->


</article> 

<?php endif; ?>

</div> <!-- end #main -->


</div> <!-- end #inner-content -->

</div> <!-- end #content -->
<div class="clearfix"></div>

<?php bones_page_navi()  ?>

<?php get_footer(); ?>