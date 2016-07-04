<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width">
<title><?php if ( is_home() ) {
        bloginfo('name'); echo " | "; bloginfo('description');
    } elseif ( is_category() ) {
        single_cat_title(); echo " | "; bloginfo('name');
    } elseif (is_single() || is_page() ) {
        single_post_title();
    } elseif (is_search() ) {
        echo "搜索结果"; echo " | "; bloginfo('name');
    } elseif (is_404() ) {
        echo '页面未找到!';
    } else {
        wp_title('',true);
    } ?></title>

<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ?>/style.css" />
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ?>/css/font-awesome.min.css" />
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ?>/highlight/styles/solarized_light.css">
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ?>/css/jquery.fancybox.css">
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ?>/css/loader.css">
<script src="<?php echo get_stylesheet_directory_uri() ?>/js/jquery-1.11.3.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri() ?>/js/jquery.fancybox.pack.js"></script>
<script src="<?php echo get_stylesheet_directory_uri() ?>/highlight/highlight.pack.js"></script>
<script>hljs.initHighlightingOnLoad();</script>
<script type="text/javascript" src="http://api.hitokoto.us/rand?encode=js&charset=utf-8"></script>

<script>
    /*每次刷新，随机改变背景图片*/
	$(window).bind("load",function(){
		var random = Math.ceil(Math.random()*19);
		var bgimg = "<?php echo get_stylesheet_directory_uri() ?>/images/"+random+'.jpg';
		$("#bg-images").css({"background": "#5c5c5c url("+bgimg+") fixed" });
	})

    $(function(){
        /*toptop缓冲*/
        $("a[href^=#bg]").click(function(){
            var speed = 500;
            var href = $(this).attr("href");
            var position = $(href).offset().top;
            $("html,body").animate({scrollTop:position},speed,"swing");
            return false;
        });
        /*搜索框样式变化*/
        $(window).bind("click",function(e){
            if(e.target.id == "icon-search" && e.which == 1){
                $(".icon-search").css("color","#999");
                $(".search-input").css("width","240px");
                $(".search-submit").css("z-index","10"); 
                $(".search-input").focus(); 
            } else if (e.target.type !== "text" && e.which == 1) {
                $(".icon-search").css("color","#6DB6AB");
                $(".search-input").css("width","0px");
                $(".search-submit").css("z-index","-1");
            }
        });
        $(window).scroll(function(){
            if($(window).scrollTop()> 800){
                $("li[title='ToTop']").css({"bottom":"0"});
            } else {
                $("li[title='ToTop']").css({"bottom":"-200px"});
            }
        })
        
        /*fancybox*/
        $("a[href$='.jpg'],a[href$='.jpeg'],a[href$='.png'],a[href$='.gif']").addClass('fancybox').fancybox();
        
        /*inline-block空白间隙处理*/
        /*contents() 查找匹配元素内部所有的子节点（包括文本节点）*/
        /*filter() 筛选出与指定表达式匹配的元素集合。*/
        $(".removeTextNodes").contents().filter(function(){
            return this.nodeType === 3;
        }).remove();
    })

</script>
<?php if(is_singular()) wp_enqueue_script('comment-reply');?>
<?php wp_head();?>
</head>
<?php flush(); ?>
<!-- BEGIN body -->
<body>
<!-- BEGIN #loader -->
<div id="loader">
    <span class="dots-loader">Loading...</span>
</div>
<!-- END #loader -->
<!-- BEGIN #bg-images -->
<div id="bg-images"></div>
<!-- BEGIN #contentDiv -->
<div id="contentDiv">
    <!-- BEGIN .container -->
	<div class="container">
        <!-- BEGIN #tools -->
        <ul id="tools">
            <li title="ToTop"><a href="#bg-images"><i  class="fa fa-arrow-up fa-2x"></i></a></li>
            <li title="Home">
                <a href="<?php if (is_home()) { echo "#bg-images";} else { echo get_option('home'); } ?>" class="gohome"><i class="fa fa-home fa-2x"></i></a></li>
            <li class="expanding-search" title="Search">
                <?php include(TEMPLATEPATH . '/searchform.php'); ?>
            </li>
        </ul>
        <!-- END #tools -->
