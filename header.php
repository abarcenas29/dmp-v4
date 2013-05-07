<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <title><?php wp_title('|',true,'right'); ?></title>
		
        <link rel="profile" href="http://gmpg.org/xfn/11" />

	<meta name="application-name" content="Deremoe"/> 
	<meta name="msapplication-TileColor" content="#c24a46"/> 
	<meta name="msapplication-TileImage" content="windowstile.png"/>

	<link rel="logo" type="image/svg" href="http://deremoe.com/logo.svg"/>
	
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>

	<!-- Default Styling -->
	<?php
		echo styling('css', base_url('source/css/font-css.css'));
		echo styling('css', base_url('source/css/social/style.css'));
        echo styling('css', base_url('source/css/style.css'))
	?>
	<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css" media="screen" />
 

	<link rel="apple-touch-icon" href="http://deremoe.com/wp-content/themes/dmp-v4/source/images/apple-touch-icon-iphone.png"/> 
	<link rel="apple-touch-icon" sizes="72x72" href="http://deremoe.com/wp-content/themes/dmp-v4/source/images/apple-touch-icon-ipad.png" /> 
	<link rel="apple-touch-icon" sizes="114x114" href="http://deremoe.com/wp-content/themes/dmp-v4/source/images/apple-touch-icon-iphone4.png" />
	<link rel="apple-touch-icon" sizes="144x144" href="http://deremoe.com/wp-content/themes/dmp-v4/source/images/apple-touch-icon-ipad3.png" />

	<link href="http://deremoe.com/episode-blogging/feed/" rel="alternate" type="application/rss+xml" title="Deremoe » Episode Blogging" />
	<link href="http://deremoe.com/events/feed" rel="alternate" type="application/rss+xml" title="Deremoe » Events" />
	<link href="http://deremoe.com/podcast/feed" rel="alternate" type="application/rss+xml" title="Deremoe » Podcast" />
	<link href="http://deremoe.com/opinions/feed" rel="alternate" type="application/rss+xml" title="Deremoe » Opinions" />

	<!-- Plugin Generated Code -->
	<?php wp_head() ?>
</head>
<body class="hfeed site">
	<header id="dmp-header">
		<section id="dmp-header-wrapper">
			<section id="dmp-brand">
				<span class="osaka-font"><a title="We blog about Japanese Pop Culture." href="<?php bloginfo('url') ?>">Deremoe</a></span>
			</section>
			<section id="social-bar">
					<a title="Facebook" href="<?php header_social('facebook') ?>" target="_blank">f</a>
					<a title="Twitter" href="<?php header_social('twitter') ?>" target="_blank">t</a>
					<a title="Google+" href="<?php header_social('gplus') ?>" target="_blank">g</a>
					<a title="YouTube" href="<?php header_social('youtube') ?>" target="_blank">y</a>
					<a title="RSS Feed for all posts" href="<?php bloginfo('rss2_url') ?>" target="_blank">r</a>
			</section>
		</section>
	</header>
	<nav id="dmp-navigation">
		<section id="dmp-navigation-wrapper">
			<article id="dmp-nav-container">
				<section id="dmp-cat-menu">
					<ul>
						<li><a title="Would you like to go back to the home page?" href="<?php echo bloginfo('url') ?>" class="icomoon">5</a></li>
						<li><a title="This is basically your guide to the website." href="#dmp-main-menu" class="dmp-menu">Main Menu<span class="icon-arrow-down"></span></a></li>
						<li><a title="Deremoe also covers events that is worthy to be observed by those who are new to the culture." href="#dmp-events" class="dmp-menu">Events<span class="icon-arrow-down"></span></a></li>
						<li><a title="We have our in-house Roundtable Otakus Podcast, where we talk about current anime series in our individual ways." href="#dmp-podcasts" class="dmp-menu"><span class="icon-microphone"></span>Podcast<span class="icon-arrow-down"></span></a></li>
					</ul>
				</section>
				<section id="dmp-page-menu">
					<?php
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
								<?php
									show_navmenu('cat_menu');
								?>
							</div>
							<div id="category-feature">
								<?php
									show_navmenu('ani_menu');
								?>
							</div>
					</article>
					<article id="dmp-network" class="nav-wrapper">
						<section class="blogroll">
							<h3>Partners</h3>
							<h4><a href="http://ph.animealliance.asia/" target="_blank">Anime Alliance</a></h4>
						</section>
						<section class="blogroll">
							<h3>Affiliates</h3>
							<h4><a href="http://animephproject.wordpress.com/" target="_blank">AnimePH Project</a></h4>
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
							<?php
								get_events(catlist('eve'));
							?>
						</section>
					</article>
				</section>
				<section id="dmp-podcasts" class="nav-items">
					<article id="nav-podcasts" class="main-wrapper">
						<section class="slide-gallery">
						<?php
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
