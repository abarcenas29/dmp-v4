<?php get_header(); ?>
	<article class="post-content" class="hentry entry">
		<section class="content-area" id="post-area">
			<?php the_post() ?>
			<div id="the-cat">
				<h2><?php echo get_cat(get_the_ID(),TRUE); ?></h2>
				<hr>
			</div>
			<section class="the-post">
				<article class="the-content">
					<header>
						<h3 class="entry-title"><?php the_title() ?></h3>
						<section>
							<p>By <strong><?php put_co_author(); ?></strong> on <i><?php the_time(time_format()) ?></i></p>
						</section>
					</header>
					<section class="main-content">
						<?php
							the_content();
						?>
						<p><i>Images Used are under <a href="http://www.law.cornell.edu/uscode/17/107.html" title="Copyright Act of 1976, 17 U.S.C. § 107">Fair Use</a>.</i></p>
					</section>
					<section class="footer-author-card">
									<?php echo get_avatar(get_the_author_ID(),70) ?>
									<p>
										<strong>About <?php the_author(); ?>:</strong>
										<br />
										<?php  the_author_description() ?>
									</p>
					</section>
					<footer id="comments">
						<?php comments_template(); ?>
					</footer>
				</article>
			</section>
		</section>
	</article>
<?php get_footer(); ?>
