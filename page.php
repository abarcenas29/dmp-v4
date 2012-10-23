<? get_header(); ?>
	<article class="post-content">
		<section class="content-area" id="post-area">
			<? the_post() ?>
			<section class="the-post">
				<article class="the-content">
					<header>
						<h3><? the_title() ?></h3>
						<section>
							<p>By: <strong><? the_author() ?></strong> on <i><? the_time(time_format()) ?></i></p>
						</section>
					</header>
					<section class="main-content">
						<?
							the_content();
						?>
						<p><i>Images Used are under Fair Use</i></p>
					</section>
					<footer id="comments">
						
					</footer>
				</article>
			</section>
		</section>
	</article>
<? get_footer(); ?>