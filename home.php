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
			<!--
			<article class="content-post">
				<header><h3><a href="#">New Headline</a></h3></header>
				<section>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do 
					eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad 
					minim veniam, ... 
				</section>
				<footer>
					<p>By: Author Blah | in AAA</p>
				</footer>
			</article>
			-->
			<?php
				generatePost();
			?>
		</section>
		<aside id="side-content">
			<article class="aside-container">
				<header><h2>Episode Blogging</h2></header>
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