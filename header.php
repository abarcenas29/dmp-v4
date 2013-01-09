<!DOCTYPE HTML>
<html>
<head>
	<meta lang="en" />
	<title></title>
	<!-- Default Styling -->
	<?
		echo styling('less', base_url('source/less/main.less'));
		echo styling('css', base_url('source/css/font-css.css'));
	?>
	<!-- Plugin Generated Code -->
	<? wp_head() ?>
</head>
<body>
	<header id="dmp-header">
		<section id="dmp-header-wrapper">
			<section id="dmp-brand">
				<h1 class="osaka-font"><a href="<? bloginfo('url') ?>">the deremoe project</a></h1>
			</section>
			<section id="social-bar">
				<h1>
					<a href="<? header_social('facebook') ?>" target="_blank">+</a>
					<a href="<? header_social('twitter') ?>" target="_blank">-</a>
					<a href="<? header_social('gplus') ?>" target="_blank">/</a>
					<a href="<? bloginfo('rss2_url') ?>" target="_blank">.</a>
				</h1>
			</section>
		</section>
	</header>
	<nav id="dmp-navigation">
		<section id="dmp-navigation-wrapper">
			<article id="dmp-nav-container">
				<section id="dmp-cat-menu">
					<ul>
						<li><a href="<? echo bloginfo('url') ?>" class="icomoon">5</a></li>
						<li><a href="#dmp-main-menu" class="dmp-menu">Main Menu<span class="icon-arrow-down"></span></a></li>
						<li><a href="#dmp-events" class="dmp-menu">Events<span class="icon-arrow-down"></span></a></li>
						<li><a href="#dmp-podcasts" class="dmp-menu"><span class="icon-microphone"></span>Podcast<span class="icon-arrow-down"></span></a></li>
					</ul>
				</section>
				<section id="dmp-page-menu">
					<?
						show_navmenu('header_page');
					?>
				</section>
				<section id="dmp-search-box">
					<input type="text" placeholder="search" id="search-box">
				</section>
			</article>
			<article id="dmp-nav-menus">
				<section id="dmp-main-menu" class="nav-items">
					<article id="nav-main" class="nav-wrapper">
							<div id="category-menu">
								<?
									show_navmenu('cat_menu');
								?>
							</div>
							<div id="category-feature">
								<?
									show_navmenu('ani_menu');
								?>
							</div>
					</article>
					<article id="dmp-network" class="nav-wrapper">
						<section class="blogroll">
							<h3>Affiliates</h3>
							<h4><a href="http://ph.animealliance.asia/" target="_blank">Anime Alliance</a></h4>
						</section>
						<section class="blogroll">
							<h3>Services</h3>
							<h4><a href="http://an.deremoe.com/" target="_blank">Anime Ninja</a></h4>
						</section>
					</article>
				</section>
				<section id="dmp-events" class="nav-items">
					<article id="nav-events" class="main-wrapper">
						<section class="slide-gallery">
							<!--<div class="slide-content">
								<div class="slide-wrapper">
								<img src="http://media.deremoe.com.s3.amazonaws.com/deremoeWP/wp-content/uploads/2012/06/ToyCon-Day3-0014-290x290.jpg"/>
								<h4>ToyCon 2012 Podcast Day2</h4>
								</div>
							</div> -->
							<?
								get_events(catlist('eve'));
							?>
						</section>
					</article>
				</section>
				<section id="dmp-podcasts" class="nav-items">
					<article id="nav-podcasts" class="main-wrapper">
						<section class="slide-gallery">
						<?
							get_events(catlist('pod'))
						?>
						</section>
					</article>
				</section>
				<section id="dmp-search" class="nav-items">
					<article id="nav-search" class="main-wrapper">
						<section id="search-result">
							<h3 id="search-query">Type your query and hit search</h3>
						</section>
					</article>
				</section>
			</article>
		</section>
	</nav>
<!--
	<nav id="debug">
		<p id="debug-val">testing</p>
		<p id="debug-val2">testing</p>
	</nav>
-->