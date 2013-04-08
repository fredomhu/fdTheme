<?php

//去除头部冗余代码
remove_action( 'wp_head', 'feed_links_extra', 3 ); 
remove_action( 'wp_head', 'rsd_link' ); 
remove_action( 'wp_head', 'wlwmanifest_link' ); 
remove_action( 'wp_head', 'index_rel_link' ); 
remove_action( 'wp_head', 'start_post_rel_link', 10, 0 ); 
remove_action( 'wp_head', 'wp_generator' );

register_nav_menu( 'nav-menu', 'Menu');

if(function_exists('register_sidebar')){
	register_sidebar(array(
		'before_widget' => '<aside id="%1$s" class="box %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<div class="widget-title"><span>',
		'after_title' => '</span></div>'
		));
}

//设置标签参数
function theme_tags($args) {
	$args = array(
		'largest' => 0.75,
		'smallest' => 0.75,
		'unit' => 'rem',
		'format' => 'flat',
		'number' => 20,
		'orderby' => 'name',
		'order' => 'ASC'
		);
	return $args;
}

add_filter('widget_tag_cloud_args','theme_tags');

//生成面包屑导航
function theme_breadcrumb() {
	echo '<ul class="breadcrumb clearfix">';
	echo '<li><a href="' . get_settings('home') . '">' . get_bloginfo('name') . '</a>';
	echo '<span class="divider">/</span></li>'; 
	if(is_category()){
        echo "<li>". single_cat_title( "", false ) ."</li>";
	}elseif(is_archive() && !is_category()) {
		echo "<li>Archives</li>";
	}elseif(is_search()) {
		echo "<li>搜索结果</li>";
	}elseif(is_single()) {
		$category = get_the_category();
        $category_id = get_cat_ID( $category[0]->cat_name ); 
        echo '<li>'. get_category_parents( $category_id, TRUE, "" );
        echo '<span class="divider">/</span></li>';
        echo '<li>' . the_title('','', FALSE) . "</li>";
	}elseif(is_page()) {
        echo "<li>".the_title('','', FALSE)."</li>"; 
	}
	echo '</ul>';
}

//生成分页模板
function theme_pagination($range = 5){
	global $paged, $wp_query;
	if(!$max_page){
		$max_page = $wp_query->max_num_pages;
	}

	if($max_page > 1){
		if(!$paged){
			$paged = 1;
		}
		if($paged != 1){
			echo "<a href='" . get_pagenum_link(1) . "' class='extend' title='跳转到首页'> <<首页 </a>";
		}

		previous_posts_link(' << ');

	    if($max_page > $range){
			if($paged < $range){
				for($i = 1; $i <= ($range + 1); $i++){
					echo "<a href='" . get_pagenum_link($i) ."'";
					if($i == $paged){
						echo " class='current'";
					}
					echo ">$i</a>";
				}
			}elseif($paged >= ($max_page - ceil(($range / 2)))){
				for($i = $max_page - $range; $i <= $max_page; $i++){
					echo "<a href='" . get_pagenum_link($i) ."'";
					if($i == $paged){
						echo " class='current'";
					}
					echo ">$i</a>";
				}
			}elseif($paged >= $range && $paged < ($max_page - ceil(($range / 2)))){
				for($i = ($paged - ceil($range / 2)); $i <= ($paged + ceil(($range / 2))); $i++){
					echo "<a href='" . get_pagenum_link($i) ."'";
					if($i == $paged){
						echo " class='current'";
					}
					echo ">$i</a>";
				}
			}
		}else{
	    	for($i = 1; $i <= $max_page; $i++){
	    		echo "<a href='" . get_pagenum_link($i) ."'";
	    		if($i==$paged){
	    			echo " class='current'";
	    		}echo ">$i</a>";
	    	}
	    }

		next_posts_link(' >> ');

	    if($paged != $max_page){
	    	echo "<a href='" . get_pagenum_link($max_page) . "' class='extend' title='跳转到最后一页'> 末页>>| </a>";
	    }
	}
}

?>