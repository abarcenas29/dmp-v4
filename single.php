<? get_header(); ?>
	<article class="post-content">
		<section class="content-area" id="post-area">
			<? the_post() ?>
			<div id="the-cat">
				<h2><? echo get_cat(get_the_ID(),TRUE); ?></h2>
				<hr>
			</div>
			<section class="the-post">
				<article class="the-content">
					<header>
						<h3><? the_title() ?></h3>
						<section>
							<p>By: <strong><a href="<?echo get_author_posts_url(get_the_author_ID()) ?>"><? the_author() ?></a></strong> on <i><? the_time(time_format()) ?></i></p>
						</section>
					</header>
					<section class="main-content">
						<?
							the_content();
						?>
						<p><i>Images Used are under Fair Use</i></p>
					</section>
					<footer id="comments">
						<? comments_template(); ?>
					</footer>
				</article>
			</section>
		</section>
	</article>
<? get_footer(); ?>