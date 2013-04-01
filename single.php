<?php get_header(); ?>

		<div class="content">
			<div id="breadcrumb" class="box">
				<?php theme_breadcrumb(); ?>
			</div>
			<div id="posts" class="box">
				<?php if ( have_posts() ) : ?>
					<?php while ( have_posts() ) : the_post(); ?>
						<article class="post">
							<h2 class="post-title"><?php the_title(); ?></h2>
							<div class="post-info">
								<span class="icon date"><?php the_time('Y-m-d'); ?></span>
								<span class="icon author"><a href="#"><?php the_author(); ?></a></span>
							</div>
							<div class="post-content">
								<?php the_content(); ?>
							</div>
							<footer class="post-footer">
								<span class="icon category"><?php the_category(); ?></span>
								<span class="icon tags"><?php the_tags('', ''); ?></span>
								<span class="edit-post"><?php edit_post_link('[编辑]'); ?></span>
							</footer>
						</article>
						<div class="post-related">
							<div class="related-title">相关文章</div>
							<ul class="related-posts">
							<?php
							global $post;
							$post_tags = wp_get_post_tags($post->ID);
							if ($post_tags) {
							  foreach ($post_tags as $tag) {
							    // 获取标签列表
							    $tag_list[] .= $tag->term_id;
							  }

							  // 随机获取标签列表中的一个标签
							  $post_tag = $tag_list[ mt_rand(0, count($tag_list) - 1) ];

							  // 该方法使用 query_posts() 函数来调用相关文章，以下是参数列表
							  $args = array(
							        'tag__in' => array($post_tag),
							        'category__not_in' => array(NULL),  // 不包括的分类ID
							        'post__not_in' => array($post->ID),
							        'showposts' => 5,                           // 显示相关文章数量
							        'caller_get_posts' => 1
							    );
							  query_posts($args);

							  if (have_posts()) {
							    while (have_posts()) {
							      the_post(); update_post_caches($posts); ?>
							    <li>* <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>
							<?php
							    }
							  }
							  else {
							    echo '<li class="none-related">* 暂无相关文章</li>';
							  }
							  wp_reset_query(); 
							}
							else {
							  echo '<li class="none-related">* 暂无相关文章</li>';
							}
							?>
							</ul>
						</div>
						<div class="post-comments">
							<?php comments_template(); ?>
						</div>
					<?php endwhile; ?>
				<?php else : ?>

				<?php endif; ?>
			</div>
		</div>

<?php get_sidebar(); get_footer(); ?>