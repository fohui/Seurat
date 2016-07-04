<?php get_header()?>
    <!-- BEGIN .header -->
    <div class="header ">
        <div class="hgroup">
            <h1 id="logo" class="blogname"><?php bloginfo('name');?></h1>
            <div id="hitokoto" class="yiyan"><script>hitokoto()</script></div>
        </div>
        <ul  class="nav">
            <li><a href="<?php echo get_option('home'); ?>/" title="<?php bloginfo('name'); ?>">博客</a></li>
            <li><a href="#">简历</a></li>
            <?php wp_list_pages('depth=1&title_li=0&sort_column=menu_order');?>
        </ul>
        <div class="info fmt">
            <p>大碗岛这个名字来自于一幅画——乔治·修拉的《大碗岛的星期日下午》，画面里：阳光下的河滨林间，人们在休憩、散步、垂钓，安静和谐的画面给人一种惬意清澈的感觉，其实生活是很美好的。</p>
        </div>
    </div>
    <!-- END .header -->
    <!-- BEGIN archive.php .posts -->
    <div class="posts division center fullscreen">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <a href="<?php the_permalink();?>" class="post-a animation">
            <div class="content">
                <h1><?php the_title(); ?></h1>
                <div class="meta">
                    <span class="date"><?php the_time('Y-m-j '); ?></span>
                    <span class="words"><?php echo count_words ($text); ?></span>
                </div>
            </div>
            <div class="color left"></div>
            <div class="color right"></div>
        </a>
    <?php endwhile; ?>
        <!-- BEGIN paging-nav -->
        <div class="paging-nav fix">
            <?php if(function_exists('wpdx_paging_nav')) wpdx_paging_nav(); ?>
        </div>
        <!-- BEGIN paging-nav -->
    </div>
    <!-- END archive.php .posts -->
    <?php else : ?>
        <h3 class="title"><a href="#" rel="bookmark">未找到</a></h3>
        <p>没有找到任何文章！</p>
    <?php endif; ?>
    <!-- BEGIN comments -->
    <?php comments_template(); ?>
    <!-- END comments -->
    <?php get_sidebar(); ?>
    <?php get_footer(); ?>
