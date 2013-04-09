<h3>评论</h3>
<ol>
	<?php foreach ($comments as $comment) : ?>
		<li id="comment-<?php comment_ID(); ?>" class="clearfix">
			<div class="comment-avatar">
				<?php echo get_avatar($comment, $size='48'); ?>
			</div>
			<div class="comment-info">
				<span class="comment-author">
					<?php comment_author(); ?>
				</span>
				<span>
					<?php comment_date('Y年j月n日 g:h'); ?>
				</span>
				<span class="comment-reply">
					<a href="#respond">回复</a>
				</span>
			</div>
			<div class="comment-content">
				<?php comment_text(); ?>
			</div>	
		</li>
	<?php endforeach; ?>
</ol>

<?php comment_form(); ?>