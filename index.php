<?php get_header(); ?>

		<div class="content">
			<div id="posts" class="box">
				<?php if ( have_posts() ) : ?>
					<?php while ( have_posts() ) : the_post(); ?>
						<article class="post">
							<h2 class="post-title"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
							<div class="post-info">
								<span class="icon date"><?php the_time('Y-m-d'); ?></span>
								<span class="icon author"><a href="#"><?php the_author(); ?></a></span>
							</div>
							<div class="post-content">
								<?php the_content('阅读全文'); ?>
							</div>
							<footer class="post-footer">
								<span class="icon category"><?php the_category(); ?></span>
								<span class="icon tags"><?php the_tags('', ''); ?></span>
								<span class="edit-post"><?php edit_post_link('[编辑]'); ?></span>
							</footer>
						</article>
					<?php endwhile; ?>
					<div class="pagination">
						<?php theme_pagination(5); ?>
					</div>
				<?php else : ?>

				<?php endif; ?>
			</div>

		</div>

<?php get_sidebar(); get_footer(); ?>