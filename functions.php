<?php 
/*1 post摘要的长度*/
/*关于post摘要用了betty写的插件wp-utf8-excerpt.php
  能够保存文章中的图片、链接和颜色等等。
/*	function new_excerpt_length($length) {
    	return 200;
	}
	add_filter("excerpt_length","new_excerpt_length");

	function new_excerpt_more($more) {
   	 	global $post;
   	 	return "<a href='".get_permalink($post->ID)."'> </a>";
	}
	add_filter("excerpt_more","new_excerpt_more");*/

	/// 函数名称：post_views
	/// 函数作用：取得文章的阅读次数
	function post_views($before = '(点击 ', $after = ' 次)', $echo = 1){
	  global $post;
	  $post_ID = $post->ID;
	  $views = (int)get_post_meta($post_ID, 'views', true);
	  if ($echo) echo $before, number_format($views), $after;
	  else return $views;
	}

	/*对自带的分页函数进行参数修改*/
    function wpdx_paging_nav(){
		global $wp_query;
		$big = 999999999; // 需要一个不太可能的整数
		$pagination_links = paginate_links( 
			array(
	    		'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	    		'format' => '?paged=%#%',
	    		'current' => max( 1, get_query_var('paged') ),
	    		'total' => $wp_query->max_num_pages,
    			'prev_text'    => __('上一页'),
				'next_text'    => __('下一页'),
    		) );
    	echo $pagination_links;
	}

	 //字数统计   
	function count_words ($text) {   
		global $post;   
		if ( '' == $text ) {   
		   $text = $post->post_content;   
		   if (mb_strlen($output, 'UTF-8') < mb_strlen($text, 'UTF-8')) $output .= mb_strlen(preg_replace('/\s/','',html_entity_decode(strip_tags($post->post_content))),'UTF-8') . '字';   
		   return $output;   
		}   
	}  
?>