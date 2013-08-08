
<footer class="footer" role="contentinfo">

<div id="inner-footer" class="wrap clearfix">
<div class="footer-comments-list footer-box">
<h6>最新评论</h6>
<ul class="recentcomments">
<?php
$show_comments = 5; //评论数量
$my_email = get_bloginfo ('admin_email'); //获取博主自己的email
$i = 1;
$comments = get_comments('number=200&status=approve&type=comment'); //取得前200个评论，如果你每天的回复量超过200可以适量加大
foreach ($comments as $rc_comment) {
if ($rc_comment->comment_author_email != $my_email) {
?>
<li class="footer-comment-in-list">

<?php echo get_avatar($rc_comment->comment_author_email,32); ?>
<a href="<?php echo get_permalink($rc_comment->comment_post_ID); ?>#comment-<?php echo $rc_comment->comment_ID; ?>"> <?php echo convert_smilies($rc_comment->comment_content); ?></a>
</li>
<?php
if ($i == $show_comments) break; //评论数量达到退出遍历
$i++;
} // End if
} //End foreach
?>
</ul>
</div>

<div class="footer-box footer-tag-list">
<h6>标签云</h6>
<?php wp_tag_cloud('number=20&order=RAND&smallest=12&largest=12'); ?>
</div>

<div class="footer-box footer-contact-info">


</div>


</div> <!-- end #inner-footer -->

</footer> <!-- end footer -->
<div class="copyright">
<p>Copyright &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?> |<a href="http://this.is26.com"> Designed by [THIS.IS26.COM] 二十六號工作室</a>| ALL RIGHTS RESERVED </p>          
</div>

</div> <!-- end #container -->

<!-- all js scripts are loaded in library/bones.php -->
<?php wp_footer(); ?>
<script>
$(".flexnav").flexNav();
</script>

<!-- 百度统计代码 默认隐藏-->
<span class="analysis">
<script type="text/javascript">
var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3Fd60bcc77299990ec2461de1b0c126319' type='text/javascript'%3E%3C/script%3E"));
</script>
</span>
</body>
</html> <!-- end page. what a ride! -->
