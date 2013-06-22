<?php get_header() ?>
	<article id="dmp-category">
		<section id="category-wrapper">
			<div id="cat-title">
				<h2><span>Category:</span> <?php single_cat_title() ?></h2>
				<div><?php echo category_description( get_category_by_slug('category-slug')->term_id ); ?></div>
				<hr>
			</div>
			<div id="cat-content">
				<?php while (have_posts()): the_post() ?>
				
				<section class="cat-content">
					<section class="cat-image">
						<img src="<?php echo catch_that_image(true) ?>">
					</section>
					<article class="cat-content">
						<header><h4><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h4></header>
						<section>
							<?php the_excerpt() ?>
						</section>
						<footer>
							<p>By <strong><?php put_co_author(); ?></strong> | In: <?php the_time(time_format()) ?></p>
						</footer>
					</article>
				</section>
				
				<?php endwhile; ?>
			</div>
			<section id="page-navigation">
				<div id="page-prev">
					<h4><?php previous_posts_link(nav_icons(FALSE),TRUE); ?></h4>
					</div>
				<div id="page-next">
					<h4><?php next_posts_link(nav_icons(),TRUE); ?></h4>
				</div>
			</section>
		</section>
	</article>
<?php get_footer() ?>
