	<!-- BEGIN #sidebar -->
    <div id="sidebar" class="fix division">
        <!-- BEGIN .catalog -->
        <div class="catalog item">
    		<?php if(!function_exists('dynamic_sidebar') 
    						|| !dynamic_sidebar('First_sidebar')) :?>
    			<h4>分类目录</h4>
    			<ul><?php wp_list_categories('depth=1&title_li=&orderby=id&show_count=0&hide_empty=1&child_of=0');?></ul>
       	 	<?php endif; ?>
        </div>
        <!-- END .catalog -->
        <!-- BEGIN .lastpost -->
        <div class="lastpost item">
            <?php if ( !function_exists('dynamic_sidebar')
                            || !dynamic_sidebar('Second_sidebar') ) : ?>       
            <h4>最新文章</h4>
            <ul>
                <?php
                    $posts = get_posts('numberposts=6&orderby=post_date');
                    foreach($posts as $post) {
                        setup_postdata($post);
                        echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
                    }
                    $post = $posts[0];
                ?>
            </ul>
            <?php endif; ?>
        </div>
        <!-- END .lastpost -->
        <!-- BEGIN .tagcloud -->
        <div class="tagcloud item">
        <?php if ( !function_exists('dynamic_sidebar')
                                || !dynamic_sidebar('Third_sidebar') ) : ?>
            <h4>标签云</h4>
            <p><?php wp_tag_cloud('smallest=8&largest=22'); ?></p>
        <?php endif; ?>
        </div>
        <!-- END .tagcloud -->
        <!-- BEGIN .archives -->
        <div class="archives item">
            <?php if ( !function_exists('dynamic_sidebar')
                                || !dynamic_sidebar('Fourth_sidebar') ) : ?>                   
                <h4>文章存档</h4>
                <ul>
                    <?php wp_get_archives('limit=10'); ?>
                </ul>
            <?php endif; ?>  
        </div>
        <!-- END .archives -->
    </div>
    <!-- END .sidebar -->
    </div>
    <!-- END .container -->
</div>
<!-- END #contentDiv -->