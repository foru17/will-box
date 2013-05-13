<?php get_header(); ?>

<div id="content">
<div id="single-inner-content" class="wrap clearfix">

<div id="main" class="first clearfix" role="main">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

<header class="article-header">
<h1 class="entry-title single-title" itemprop="headline"><?php the_title(); ?></h1>
<div class="artile-meta">
<li class="meta-date"><span class="icon-font">&#58;</span><?php the_date('','','') ?></li>
<li class="meta-comments"><span class="icon-font">&#343;</span><?php comments_popup_link('暂无讨论', '1 评论', '% 评论'); ?></li> 
<li class="meta-views"><span class="icon-font">&#279;</span><?php if(function_exists('post_views')){post_views('','次围观',1) ; } ?></li>

</div>

</header> <!-- end article header -->

<section class="entry-content clearfix" itemprop="articleBody">
<?php the_content(); ?>
</section> <!-- end article section -->

<footer class="article-footer">		

<?php the_tags('<p class="tags"><span class="tags-title">' . __('', 'bonestheme') . '</span> ', '', '</p>'); ?>


</footer> <!-- end article footer -->

<?php comments_template(); ?>

</article> <!-- end article -->

<?php endwhile; ?>

<?php else : ?>

<article id="post-not-found" class="hentry clearfix">
<header class="article-header">
<h1><?php _e("还没文章呢", "bonestheme"); ?></h1>
</header>
<section class="entry-content">
<p><?php _e("没找到相关内容", "bonestheme"); ?></p>
</section>
<footer class="article-footer">
<p><?php _e("试试其他页面吧"); ?></p>
</footer>
</article>

<?php endif; ?>

</div> <!-- end #main -->

</div> <!-- end #inner-content -->
</div>


<?php get_footer(); ?>
