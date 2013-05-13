
<?php
/*
Template Name: 时间线页面
*/
?>

<?php get_header(); query_posts('posts_per_page=-1');
	$dates_array 			= Array();
	$year_array 			= Array();
	$i 				= 0;
	$prev_post_ts    		= null;
	$prev_post_year  		= null;
	$distance_multiplier 	        = 2;
?>

	<?php while (have_posts()) : the_post();

		$post_ts    =  strtotime($post->post_date);
		$post_year  =  date( 'Y', $post_ts );

		/* Handle the first year as a special case */
		if ( is_null( $prev_post_year ) ) {
			?>
			<h3 class="archive_year"><?=$post_year?></h3>
			<ol class="archives_list">
			<?php
		}
 else if ( $prev_post_year != $post_year ) {
    /* Close off the OL */
    ?>
    </ol>
    <h3 class="archive_year"><?php echo $post_year?></h3>
    <ol class="archives_list">
    <?php
  }

		/* Compute difference in days */
		if ( ! is_null( $prev_post_ts ) && $prev_post_year == $post_year ) {
			$dates_diff  =  ( date( 'z', $prev_post_ts ) - date( 'z', $post_ts ) ) * $distance_multiplier;
		}
		else {
			$dates_diff  =  0;
		}
	?>
		<li style="margin-top:<?=$dates_diff?>px">
			<span class="date"><?php the_time('F j'); ?></span> 
			<a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
		<!-- 	<?php dm_the_thumbnail(array(100,100)); ?> -->

		</li>
	<?php
		/* For subsequent iterations */
		$prev_post_ts    =  $post_ts;
		$prev_post_year  =  $post_year;
	endwhile;

	/* If we've processed at least *one* post, close the ordered list */
	if ( ! is_null( $prev_post_ts ) ) {
		?>
	</ol>
	<?php } ?>
	
	<nav id="page-nav">

	<?php if(function_exists('wp_page_numbers')) : ?>
			<?php wp_page_numbers(); ?>
		<?php else : ?>
		<ul>
		<li class="previous"><?php next_posts_link('往前面看看') ?></li>
		<li class="next"><?php previous_posts_link('去后面瞧瞧') ?></li>
		</ul>
		<?php endif; ?>
</nav>
<?php get_footer(); ?>
