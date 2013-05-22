<!doctype html>
<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->
<!-- 
主题版权: http://luolei.org/2013/05/will-box-one-theme/
作者 will Luo  （ http://luolei.org )
新浪微博@罗罗磊磊 http://weibo.co/foru17  
twitter @foru17 https://twitter.com/foru17
 -->
<head>
<meta charset="utf-8">
<!-- Google Chrome Frame for IE -->
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title><?php
			// 如果是首页和文章列表页面, 显示博客标题
			if(is_front_page() || is_home()) { 
				bloginfo('name');
			// 如果是文章详细页面和独立页面, 显示文章标题
			} else if(is_single() || is_page()) {
				wp_title('');
			// 如果是类目页面, 显示类目表述
			} else if(is_category()) {
				printf('%1$s 目录下的文章', single_cat_title('', false));
			// 如果是搜索页面, 显示搜索表述
			} else if(is_search()) {
				printf('%1$s 的搜索结果', wp_specialchars($s, 1));
			// 如果是标签页面, 显示标签表述
			} else if(is_tag()) {
				printf('%1$s 标签下的文章', single_tag_title('', false));
			// 如果是日期页面, 显示日期范围描述
			} else if(is_date()) {
				$title = '';
				if(is_day()) {
					$title = get_the_time('Y年n月j日');
				} else if(is_year()) {
					$title = get_the_time('Y年');
				} else {
					$title = get_the_time('Y年n月');
				}
				printf('%1$s的文章存档', $title);
		 
			// 其他页面显示博客标题
			} else {
				bloginfo('name');
			}
		?></title>
<!-- 预加载优化 HTML5 参考( http://www.mhtml5.com/2011/11/3335.html ) -->
<?php if (is_archive() && ($paged > 1) && ($paged < $wp_query->max_num_pages)) { ?>
<link rel="prefetch" href="<?php echo get_next_posts_page_link(); ?>">
<link rel="prerender" href="<?php echo get_next_posts_page_link(); ?>">
<?php } elseif (is_singular()) { ?>
<link rel="prefetch" href="<?php bloginfo('home'); ?>">
<link rel="prerender" href="<?php bloginfo('home'); ?>">
<?php } ?>
<!--关键字优化设置 后台定制功能 可以在管理页面设置 请及时修改 利于SEO -->
<?if (is_home()){
			//自定义description，搜索结果显示
		    $description = get_option('meta_setting_description'); 
		    //自定义keywords
		    $keywords = get_option('meta_setting_keywords');
		} 
		elseif (is_single()) {
		if ($post->post_excerpt) {
		$description     = $post->post_excerpt;
		} else {
			//
		    $description = substr(strip_tags($post->post_content),0,220);
		}
		    $description2 = mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 200, "…");
		    $keywords = get_post_meta($post->ID, "keywords", true);
		    if($keywords == '') {
		        $tags = wp_get_post_tags($post->ID);    
		        foreach ($tags as $tag ) {        
		            $keywords = $keywords . $tag->name . ", ";    
		        }
		        $keywords = rtrim($keywords, ', ');
		    }
		}
		elseif (is_category()) {
		    $description = category_description();
		    $keywords = single_cat_title('', false);
		}
		elseif (is_tag()){
		    $description = tag_description();
		    $keywords = single_tag_title('', false);
		}
		$description = trim(strip_tags($description));
		$keywords = trim(strip_tags($keywords));
		?>
<meta name="keywords" content="<?=$keywords?>" />
<meta name="description" content="<?=$description?>" />
<!-- mobile meta  -->
<meta name="HandheldFriendly" content="True">
<meta name="MobileOptimized" content="320">
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<!-- 图标icons & favicons (参考: http://www.jonathantneal.com/blog/understand-the-favicon/) -->
<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/library/images/apple-icon-touch.png">
<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
<!--[if IE]>
<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
<![endif]-->
<!-- or, set /favicon.ico for IE10 win -->
<meta name="msapplication-TileColor" content="#f01d4f">
<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/library/images/win8-tile-icon.png">
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
<!-- wordpress head functions -->
<?php wp_head(); ?>
<!-- end of wordpress head -->
</head>
<body <?php body_class(); ?>>
	<div id="container">		
	<header class="header" role="banner">
	<!-- Top nav bar -->
	<nav class="top-bar fixed">
		<div class="top-inner">
		<div id="top-logo">
				<a class="logo-small" href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a>
			</div>
				<div class="menu-button"><span class="icon-font touch-button">&#382;</span></div>
				<ul class="menu flexnav clearfloat" data-breakpoint="800" id="nav">  <!--顶部menu导航-->
				<li><a href="<?php echo get_option('home'); ?>/" class="on">首页</a></li>
				<?php wp_list_pages('title_li='); ?>
				<li class="cat-item"><a href="#">博客</a>
					<ul class="children">
					<?php wp_list_categories('orderby=name&title_li=');
							$this_category = get_category($cat);
							if (get_category_children($this_category->cat_ID) != "") {
							echo "<ul>";
							wp_list_categories('orderby=id&show_count=0&title_li=
							&use_desc_for_title=1&child_of='.$this_category->cat_ID);
							echo "</ul>";
							}
							?>
					</ul>
				</li>
				</ul>

				<div class="search-header">
				 <?php get_search_form(); ?> 
				</div>
		</div>
		</nav>
		<!-- Top nav bar End -->
				<div id="inner-header" class="wrap clearfix">
					<!-- 显示为博客描述，随机链接文章，目录类为描述 -->
				<?php if(is_home()) { ?>
				   <h1 id="banner-info" class="banner-info">
						<?php $rand_post=get_posts('numberposts=1&orderby=rand'); foreach($rand_post as $post) : ?><a title="我是任意门" href="<?php the_permalink(); ?>"><?php  bloginfo('description'); ?></a><?php endforeach; ?>
						</a>
					</h1> 
				<?php } ?>

				</div> <!-- end #inner-header -->

			</header> <!-- end header -->
