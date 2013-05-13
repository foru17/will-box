<?php
/*
The comments page for Bones
*/

// Do not delete these lines
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
die ('请不要直接访问这个链接!');

if ( post_password_required() ) { ?>
<div class="alert alert-help">
<p class="nocomments"><?php _e("本文章被加密了，请输入密码", "bonestheme"); ?></p>
</div>
<?php
return;
}
?>

<!-- 这里开始编辑 -->

<?php if ( have_comments() ) : ?>
<div id="comment-box">
<h3 id="comments" class="h2">
<?php comments_number('暂无评论', '已有一条评论', '已有% 条评论' );?>
</h3>



<ol class="commentlist">
<?php wp_list_comments('type=comment&callback=bones_comments'); ?>
</ol>


<?php else : // this is displayed if there are no comments so far ?>

<?php if ( comments_open() ) : ?>
<!-- If comments are open, but there are no comments. -->

<?php else : // comments are closed ?>

<!-- If comments are closed. -->
<!--p class="nocomments"><?php _e("评论暂时关闭了", "bonestheme"); ?></p-->

<?php endif; ?>

<?php endif; ?>


<?php if ( comments_open() ) : ?>

<section id="respond" class="respond-form">

<h3 id="comment-form-title" class="h2"><?php comment_form_title( __('评论一下', 'bonestheme'), __('回复 %s ', 'bonestheme' )); ?></h3>

<div id="cancel-comment-reply">
<p class="small"><?php cancel_comment_reply_link(); ?></p>
</div>

<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
<div class="alert alert-help">
<p><?php printf( __('您必须输入点啥才能评论！', 'bonestheme'), '<a href="<?php echo wp_login_url( get_permalink() ); ?>">', '</a>' ); ?></p>
</div>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<?php if ( is_user_logged_in() ) : ?>

<p class="comments-logged-in-as"><?php _e("您现在使用的账号是", "bonestheme"); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php _e("注销此帐号", "bonestheme"); ?>"><?php _e("登出", "bonestheme"); ?> <?php _e("&raquo;", "bonestheme"); ?></a></p>

<?php else : ?>

<ul id="comment-form-elements" class="clearfix">

<li>
<label for="author"><?php _e("呢称", "bonestheme"); ?> <?php if ($req) _e("(required)"); ?></label>
<input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" placeholder="<?php _e('呢称', 'bonestheme'); ?>" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
</li>

<li>
<label for="email"><?php _e("Mail", "bonestheme"); ?> <?php if ($req) _e("(required)"); ?></label>
<input type="email" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" placeholder="<?php _e('邮箱', 'bonestheme'); ?>" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
<small><?php _e("(不会公开)", "bonestheme"); ?></small>
</li>

<li>
<label for="url"><?php _e("Website", "bonestheme"); ?></label>
<input type="url" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" placeholder="<?php _e('网站', 'bonestheme'); ?>" tabindex="3" />
</li>

</ul>

<?php endif; ?>

<p><textarea name="comment" id="comment" placeholder="<?php _e('', 'bonestheme'); ?>" tabindex="4"></textarea></p>
<p>
<input name="submit" type="submit" id="submit" class="button" tabindex="5" value="<?php _e('评论', 'bonestheme'); ?>" />
<?php comment_id_fields(); ?>
</p>


<?php do_action('comment_form', $post->ID); ?>

</form>

<?php endif; // If registration required and not logged in ?>
</section>



<?php endif; // if you delete this the sky will fall on your head ?>
</div>