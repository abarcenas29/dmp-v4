<?php
	// smart jquery inclusion

	function add_script_code() {
		wp_deregister_script('jquery');	
		wp_enqueue_script(
		'jquery',
		base_url('source/js/jquery-1.4.1-vsdoc.js'),
		false,
		'1.3.0',
		TRUE );
		wp_enqueue_script(
		'vars',
		base_url('source/js/vars.js'),
		false,
		'1.3.0',
		TRUE);
		wp_enqueue_script(
		'function',
		base_url('source/js/function.js'),
		false,
		'1.3.0',
		TRUE);
	}
	//add_action('admin_init', 'add_script_code');
	add_action('wp_enqueue_scripts', 'add_script_code');
	
	function _q($args) {
		return new WP_Query($args);
	}
	
	function sbt_auto_excerpt_more( $more ) {
		return ' ...';
	}
	add_filter( 'excerpt_more', 'sbt_auto_excerpt_more', 20 );
	
	/*
	function sbt_custom_excerpt_more( $output ) {
		return preg_replace('/<a[^>]+>Continue reading.*?<\/a>/i','',$output);
	}
	add_filter( 'get_the_excerpt', 'sbt_custom_excerpt_more', 20 );
	*/
	
	function apple_shortcut() {
		echo '<link rel="apple-touch-icon" href="'.base_url('source/images/apple-touch-icon-iphone.png').'" />
			  <link rel="apple-touch-icon" sizes="72x72" href="'. base_url('source/images/apple-touch-icon-ipad.png') .'" />
			  <link rel="apple-touch-icon" sizes="114x114" href="'. base_url('source/images/apple-touch-icon-iphone4.png') .'" />';
	}
	add_action('wp_head', 'apple_shortcut');
	
	function ajax_func() {
		echo '<script type="text/javascript">
				//<![CDATA[
				ajaxurl = "' . admin_url('admin-ajax.php'). '";
				//]]>
			</script>';
	}
	add_action('wp_footer', 'ajax_func');
	
	function time_format(){
		return 'D, jS M Y';
	}
	
	function show_navmenu($name){
		$args = array(
			'theme_location'  => $name,
			'container' => false,
			'echo'=>true,
			'fallback_cb' =>false
		);
		
		wp_nav_menu($args);
	}
	
	function styling($type,$url) {
		if($type == 'less') {
			return '<link rel="stylesheet/less" type="text/css" href="'. $url .'"/>';
		} else {
			return '<link rel="stylesheet" type="text/css" href="'. $url .'"/>';
		}
	}
	
	function base_url($url) {
		return get_bloginfo('template_url').'/'.$url;
	}
	
	function blog_url($url) {
		return get_bloginfo('url').'/'.$url;
	}
	
	function catch_that_image($thumb = false) {
		global $post, $posts;
		ob_start();
		ob_end_clean();
		
		$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
		$image = $matches[1][0];

		$pattern = '#(-([1-9][0-9]{3}|[0-9]{3})[xX](([1-9][0-9]{3}|[0-9]{3})))#';
		$result = preg_match($pattern, $image,$match);
				
		if ($thumb == TRUE) {
			if($result > 0) {
				$url = preg_replace('#'.$match[0].'#', '-290x290', $image);
				} else {
					$result = preg_match('#.(jpeg|jpg|gif|png|bmp)#', $image, $match);
					$url = preg_replace('#'.$match[0].'#','-290x290'.$match[0],$image);
				}
			} else {
				if($result > 0) {
					$url = preg_replace('#'.$match[0].'#', '', $image);
					} 
			}
			
		if (_urlExist($url) == TRUE) {
			return $url;
		} else {
			return base_url('source/images/no-image.jpg');
		}
		
	}
	
	// enable threaded comments
	function enable_threaded_comments(){
		if (!is_admin()) {
			if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1))
				wp_enqueue_script('comment-reply');
			}
	}
	add_action('get_header', 'enable_threaded_comments');
	
	// remove junk from head
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wp_generator');
	remove_action('wp_head', 'feed_links', 2);
	remove_action('wp_head', 'index_rel_link');
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action('wp_head', 'feed_links_extra', 3);
	remove_action('wp_head', 'start_post_rel_link', 10, 0);
	remove_action('wp_head', 'parent_post_rel_link', 10, 0);
	remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
	
	// custom excerpt length
	function custom_excerpt_length($length) {
		return 50;
	}
	add_filter('excerpt_length', 'custom_excerpt_length');
	
	function _urlExist($url) {
		$header = @get_headers($url);
		if ($header[0] == 'HTTP/1.1 404 Not Found' or 
			$header[0] == 'HTTP/1.1 403 Forbidden' or
			$header[0] == 'HTTP/1.0 403 Forbidden') {
			return FALSE;
		} else {
			return TRUE;
		}
	}
	
	/*
	// add google analytics to footer
	function add_google_analytics() {
		echo '<script src="http://www.google-analytics.com/ga.js" type="text/javascript"></script>';
		echo '<script type="text/javascript">';
		echo 'var pageTracker = _gat._getTracker("UA-XXXXX-X");';
		echo 'pageTracker._trackPageview();';
		echo '</script>';
	}
	add_action('wp_footer', 'add_google_analytics');
	
	// custom excerpt ellipses for 2.9+
	function custom_excerpt_more($more) {
		return '...';
	}
	add_filter('excerpt_more', 'custom_excerpt_more');
	
	// no more jumping for read more link
	function no_more_jumping($post) {
		return '<a href="'.get_permalink($post->ID).'" class="read-more">'.'Continue Reading'.'</a>';
	}
	add_filter('excerpt_more', 'no_more_jumping');
	add_filter('the_content_more_link', 'remove_more_jump_link');
	*/
	// add a favicon to your blog
	function blog_favicon() {
		echo '<link rel="Shortcut Icon" type="image/x-icon" href="'.base_url('source/images').'/favicon.ico" />';
	}
	add_action('wp_head', 'blog_favicon');
	
	// add a favicon for your admin
	function admin_favicon() {
		echo '<link rel="Shortcut Icon" type="image/x-icon" href="'.get_bloginfo('stylesheet_directory').'/images/favicon.png" />';
	}
	add_action('admin_head', 'admin_favicon');
	
	// custom admin login logo
	function custom_login_logo() {
		echo '<style type="text/css">
		h1 a { background-image: url(logo.svg) !important; }
		</style>';
	}
	add_action('login_head', 'custom_login_logo');
	
	// kill the admin nag
	if (!current_user_can('edit_users')) {
		add_action('init', create_function('$a', "remove_action('init', 'wp_version_check');"), 2);
		add_filter('pre_option_update_core', create_function('$a', "return null;"));
	}

	// category id in body and post class
	function category_id_class($classes) {
		global $post;
		foreach((get_the_category($post->ID)) as $category)
			$classes [] = 'cat-' . $category->cat_ID . '-id';
			return $classes;
	}
	add_filter('post_class', 'category_id_class');
	add_filter('body_class', 'category_id_class');
	
	// get the first category id
	function get_first_category_ID() {
		$category = get_the_category();
		return $category[0]->cat_ID;
	}
	
	// remove version info from head and feeds
	function complete_version_removal() {
		return '';
	}
	add_filter('the_generator', 'complete_version_removal');
?>
