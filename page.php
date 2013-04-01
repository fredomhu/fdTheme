<?php get_header(); ?>

		<div class="content">
			<div id="breadcrumb" class="box">
				<?php theme_breadcrumb(); ?>
			</div>
			<div id="posts" class="box">
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
							<span class="edit-post"><?php edit_post_link('[编辑]'); ?></span>
						</footer>
					</article>
					<div class="post-comments">
						<?php comments_template(); ?>
					</div>
				<?php endwhile; ?>
			</div>
		</div>

<?php get_sidebar(); get_footer(); ?>