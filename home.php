<?php get_header(); ?>
<article id="dmp-home-body">
	<article id="announcement-content">
		<section id="announcement-container">
			<h2><span id="annoucement-title" class="icon-warning"> Announcement:</span>
				<span id="headline"><?php get_annoucnement(); ?></span></h2>
		</section>
	</article>
	<article id="home-wrapper">
		<section id="home-content">
			<?php
				generatePost();
			?>
		</section>
		<aside id="side-content">
			<article class="aside-container">
				<header><h2>Reviews</h2></header>
				<section>
					<!--
					<div class="review-content">
						<a href="#">
						<div class="review-image">
							<img src="http://media.deremoe.com/deremoeWP/wp-content/uploads/2012/05/2012-05-23_2242-290x290.png">
						</div>
						<div class="review-title">
							<h3>This is a review title</h3>
						</div>
						</a>
					</div>
					-->
					<?php
						get_rev();
					?>
				</section>
			</article>
		</aside>
	</article>
</article>
<?php get_footer(); ?>
