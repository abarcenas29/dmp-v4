<?php get_header() ?>
	<article id="dmp-author">
		<section id="author-wrapper">
			<?php the_post() ?>
			<div id="author-title">
				<h2><?php the_author_nickname() ?></h2>
				<hr>
			</div>
			<div id="author-count">
				<h3><?php the_author_posts() ?></h3>
			</div>
		</section>
		<section id="author-card">
			<div id="author-card-wrapper">
				<article>
					<section>
						<?php echo get_avatar(get_the_author_ID(),128) ?>
					</section>
					<section>
						<?php  the_author_description() ?>
					</section>
				</article>
			</div>
		</section>
		<section id="board-head">
			<div id="board-head-wrapper">
				<div class="hr">
					<hr>
				</div>
				<div id="board-head-header">
					<h3>statistical information</h3>
				</div>
				<div class="hr">
					<hr>
				</div>
			</div>
		</section>
		<section id="author-board">
			<div id="author-board-wrapper">
				<div id="author-leaderboard">
					<h4>Post Tally</h4>
					<table>
						<!--
						<tr>
							<td><?php echo get_avatar(1,64) ?></td>
							<td><span>SOLIDAD</span></td>
							<td>689</td>
						</tr>
						-->
						<?php
							author_leaderboard();
						?>
					</table>
				</div>
				<div id="author-posts">
					<?php while (have_posts()):the_post() ?>
						<article class="author-posts">
							<header><h4><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h4></header>
							<section>
								<?php the_excerpt(); ?>
							</section>
							<footer>
								
							</footer>
						</article>
					
					<?php endwhile; ?>
				</div>
			</div>
		</section>
		<section id="pignation-container">
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