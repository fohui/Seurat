<?php get_header()?>
	<!-- BEGIN .header -->
	<div class="header ">
		<div class="hgroup">
			<h1 id="logo" class="blogname"><?php bloginfo('name');?></h1>
			<div id="hitokoto" class="yiyan"><script>hitokoto()</script></div>
		</div>
		<!-- BEGIN .nav -->
		<ul  class="nav">
            <li><a href="<?php echo get_option('home'); ?>/" title="<?php bloginfo('name'); ?>">博客</a></li>
            <li><a href="http://intro.hfohui.com" target="_blank">简历</a></li>
            <li><a href="https://github.com/fohui" target="_blank">GitHub</a></li>
            <?php wp_list_pages('depth=1&title_li=0&sort_column=menu_order');?>
        </ul>
        <!-- END .nav -->
		<div class="info fmt">
			<p>自己在互联网中的小角落</p>
		</div>
	</div>
	<!-- END .header -->
	<!-- BEGIN .posts -->
	<div class="posts division fmt">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="post">
			<div class="post-date"><span><i class="fa fa-calendar"></i> <?php the_time('Y-n-j'); ?></span></div>
			<h3 class="post-title"><a href="<?php the_permalink();?>" rel="bookmark"><?php the_title(); ?></a></h3>
			<div class="post-sub"><?php the_tags('',''); ?></div>
			<?php
				if (is_single() or is_page()) {
					the_content();
				} else {
					the_excerpt();
				}
			?>
			<div class="post-views"><span><?php post_views('[',' views]');?></span></div>
		</div>
	<?php endwhile; ?>
		<!-- BEGIN .paging-nav -->
		<div class="paging-nav fix">
			<?php if(function_exists('wpdx_paging_nav')) wpdx_paging_nav(); ?>
		</div>
		<!-- END .paging-nav -->
	</div>
	<!-- END .posts -->
	<?php else : ?>
		<h3 class="title"><a href="#" rel="bookmark">未找到</a></h3>
		<p>没有找到任何文章！</p>
	<?php endif; ?>
	<?php get_sidebar(); ?>
	<?php get_footer(); ?>
