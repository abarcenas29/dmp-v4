<? get_header() ?>
	<article id="dmp-category">
		<section id="category-wrapper">
			<div id="cat-title">
				<h2><span>Category:</span> <? single_cat_title() ?></h2>
				<hr>
			</div>
			<div id="cat-content">
				<? while (have_posts()): the_post() ?>
				
				<section class="cat-content">
					<section class="cat-image">
						<img src="<? echo catch_that_image(true) ?>">
					</section>
					<article class="cat-content">
						<header><h4><a href="<? the_permalink() ?>"><? the_title() ?></a></h4></header>
						<section>
							<? the_excerpt() ?>
						</section>
						<footer>
							<p>By:<strong><a href="<? echo get_author_posts_url(get_the_author_ID()) ?>"><? the_author() ?></a></strong> | In: <? the_time(time_format()) ?></p>
						</footer>
					</article>
				</section>
				
				<? endwhile; ?>
			</div>
			<section id="page-navigation">
				<div id="page-prev">
					<h4><? previous_posts_link(nav_icons(FALSE),TRUE); ?></h4>
					</div>
				<div id="page-next">
					<h4><? next_posts_link(nav_icons(),TRUE); ?></h4>
				</div>
			</section>
		</section>
	</article>
<? get_footer() ?>
