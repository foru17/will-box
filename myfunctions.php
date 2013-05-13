<?php   
$option = get_option('meta_setting_description','meta_setting_keywords','instagram_setting_userid','instagram_setting_accessToken');//获取选项   
if( $option == '' ){   
    //设置默认数据   
    $option = '默认数据';  
    ///meta参数 
    update_option('meta_setting_description', $option);//更新选项  
    update_option('meta_setting_keywords', $option);//更新选项
    ///instagram参数
    update_option('instagram_setting_userid', $option);//更新userid选项  
    update_option('instagram_setting_accessToken', $option);//更新accessToken选项
} 

if(isset($_POST['option_save'])){   
    //处理meta数据   
    $option = stripslashes($_POST['meta_setting_description']);   
    update_option('meta_setting_description', $option);//更新选项 
    $option = stripslashes($_POST['meta_setting_keywords']);   
    update_option('meta_setting_keywords', $option);//更新选项

    ///处理instagram参数
   
}

if(isset($_POST['instagram_save'])){   
    //处理meta数据   

    ///处理instagram参数
     $option = stripslashes($_POST['instagram_setting_userid']);   
    update_option('instagram_setting_userid', $option);//更新选项 
    $option = stripslashes($_POST['instagram_setting_accessToken']);   
    update_option('instagram_setting_accessToken', $option);//更新选项       
}
?>
<?php
function theme_function(){   
    add_menu_page( 'S3主题设置', 'S3主题设置', 'edit_themes', 'stone_theme','display_function','',99);   
}   
  
function display_function(){   
    echo '<h1>这是设置页面</h1>';   
}   
add_action('admin_menu', 'theme_function');   

//添加子菜单meta设置
add_action('admin_menu', 'add_my_custom_submenu_page');   
  
function add_my_custom_submenu_page() {   
    //顶级菜单的slug是stone_theme   
    add_submenu_page( 'stone_theme', 'Meta关键字设置', 'Meta关键字设置', 'edit_themes', 'meta-submenu-page', 'my_meta_page_display' );   
     add_submenu_page( 'stone_theme', 'instagram设置', 'instagram设置', 'edit_themes', 'instagram-submenu-page', 'my_instagram_page_display' );     
}   
  
function my_meta_page_display() {  
     ?>
    <form method="post" name="meta_form" id="meta_form">   
    <h2>博客Meta关键字设置（SEO优化）</h2>   
    <p>   
    <label>
    <h4>Meta Keywords设置</h4> 
    <input name="meta_setting_keywords" size="40" value="<?php echo get_option('meta_setting_keywords'); ?>"/>   
    请输入文字   
    </label>
     <label>
     <h4>Meta description设置(搜索引擎中显示的100字简介）</h4>    
    <input name="meta_setting_description" size="40" value="<?php echo get_option('meta_setting_description'); ?>"/>   
    请输入文字   
    </label>    
    </p>   
    <p class="submit">   
        <input type="submit" name="option_save" value="<?php _e('保存设置'); ?>" />   
    </p>    
    </form>   

<?php } 

///instagram页面
function my_instagram_page_display() {  
     ?>   
    <form method="post" name="meta_form" id="instagram_form" style="">   
    <h2>Instagram验证</h2>   
    <label>
    <h4>UserID</h4> 
    <a href="http://www.pinceladasdaweb.com.br/instagram/access-token/">请首先登录你的instagram帐号获得你的userid和access token</a>
    <input name="instagram_setting_userid" size="40" style="float:left" value="<?php echo get_option('instagram_setting_userid'); ?>"/>   
    请输入文字   
    </label>
     <label>
     <h4>accessToken设置</h4>    
    <input name="instagram_setting_accessToken" size="40" value="<?php echo get_option('instagram_setting_accessToken'); ?>"/>   
    请输入文字   
    </label>    
    </p>   
    <p class="submit">   
        <input type="submit" name="instagram_save" value="<?php _e('保存设置'); ?>" />   
    </p>    
    </form>   

<?php } 

//评论勾选回复


?>