<div class="widget">
	<aside class="box">
		<div class="widget-title"><span>关注我</span></div>
		<ul class="social clearfix">
			<li><a href="http://weibo.com/fredomhu" title="新浪微博"><i class="icon-weibo"></i></a></li>
			<li><a href="https://twitter.com/fredomhu" title="Twitter"><i class="icon-twitter"></i></a></li>
			<li><a href="https://github.com/fredomhu" title="Github"><i class="icon-github-alt"></i></a></li>
			<li><a href="mailto:fredomhu@gmail.com" title="G-Mail"><i class="icon-envelope-alt"></i></a></li>
		</ul>
	</aside>
	<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar()) : ?>
		<ul>
		<!-- widget 1 -->
			<li>
				<h3>标题 1</h3>
				<ul>
					<li>条目 1.1</li>
					<li>条目 1.2</li>
					<li>条目 1.3</li>
				</ul>
			</li>
			<!-- widget 2 -->
			<li>
				<h3>标题 2</h3>
				<ul>
					<li>条目 2.1</li>
					<li>条目 2.2</li>
					<li>条目 2.3</li>
				</ul>
			</li>
		</ul>
	<?php endif; ?>
</div>