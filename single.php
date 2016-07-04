<?php get_header()?>
	<?php if(have_posts()) : the_post(); update_post_caches($posts); ?>
		<!-- BEGIN .page-post -->
		<div class="page-post">
			<!-- BEGIN .page-post .header -->
			<div class="header">
				<div class="hgroup">
					<div class="post-date"><span><i class="fa fa-calendar"></i> <?php the_time('Y-n-j'); ?></span></div>
					<h1 class="post-title"><?php the_title(); ?></h1>
				</div>
				<div class="post-sub"><?php the_tags('',''); ?></div>
			</div>
			<!-- END .page-post .header -->
			<div class="fmt">
				<?php the_content(); ?>
			</div>
			<!-- BEGIN .page-nav -->
			<div class="page-nav removeTextNodes">
				<?php if (get_previous_post()) {
					echo "<div class='prev btn'>";
					previous_post_link('%link');
					echo "</div>";
				};?>
				<?php if (get_next_post()) {
					echo "<div class='next btn'>";
					next_post_link('%link');
					echo "</div>";
				};?>
			</div>
			<!-- END .page-nav -->
			<div class="comments division">
				<?php comments_template(); ?>
			</div>
		</div>
		<!-- END .page-post -->
<?php else : ?>
	<div class="errorbox">没有文章！</div>
<?php endif;?>
	<?php get_sidebar(); ?>
	<?php get_footer(); ?>