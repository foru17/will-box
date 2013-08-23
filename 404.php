<?php get_header(); ?>
<div id="content" class="home-posts-list">
<div id="inner-content" class="wrap clearfix">

<div id="not-found-page-container">
<h1>一个叫404的小鸟~ ~ 来错了地方</h1>
<form method="get" class="form-wrapper cf" action="<?php bloginfo('home'); ?>/">
       <input type="text" placeholder="再搜一下呗" required value="<?php echo esc_html($s); ?>" name="s" id="s" />
       <button type="submit">Search</button>
</form>


</div><!-- not-found-page-container -->
</div> <!-- end #inner-content -->

</div> <!-- end #content -->
<div class="clearfix"></div>


