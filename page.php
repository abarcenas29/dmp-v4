<?php get_header(); ?>
	<article class="post-content">
		<section class="content-area" id="post-area">
			<?php the_post() ?>
			<section class="the-post">
				<article class="the-content">
					<header>
						<h3><?php the_title() ?></h3>
						<section>
							<p>By: <strong><?php the_author() ?></strong> on <i><?php the_time(time_format()) ?></i></p>
						</section>
					</header>
					<section class="main-content">
						<?php
							the_content();
						?>
					</section>
					<footer id="comments">
						
					</footer>
				</article>
			</section>
		</section>
	</article>
<?php get_footer(); ?>