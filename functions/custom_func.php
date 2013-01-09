<?	
	$themename = "dmp-v4";
	$shortname = "dmp4";
	
	add_action( 'admin_menu', 'theme_options_page' );
	//add_action( 'admin_init', 'mytheme_add_init' );
	
	function theme_options_page() {
	 add_menu_page(
	 'The dere-moe Theme Editor', 
	 'dere-moe Theme', 
	 'administrator', 
	 'dmp-custom-options',
	 'theme_page'
	 );
	}
	
	function theme_page() {
		include('view.menu.php');
		$file_dir = get_bloginfo('template_directory');  
		echo '<link rel="stylesheet/less" href="'. $file_dir.'/source/less/menu.less'. '" />';
	}
	
	function header_social($key) {
		$social = array(
			'facebook' => 'https://www.facebook.com/deremoe',
			'twitter' => 'https://twitter.com/deremoe',
			'gplus' => 'https://plus.google.com/107398008535995533732/posts'
		);
		echo $social[$key];
	}
	
	function nav_menu() {
		register_nav_menus(array(
			'header_page' => 'Page Menu',
			'cat_menu' => 'Main Menu',
			'ani_menu' => 'Current Anime'
		));
	}
	add_action('init','nav_menu');
	
	
	function get_postcount() {
		global $wpdb;
		
		$authors = 
		$wpdb->get_results('SELECT ID, user_nicename from ' .$wpdb->users. ' ORDER BY ID');
		
		$result = array();
		
		foreach($authors as $author) {
			$postcount = $wpdb->get_results('SELECT COUNT(*) as "post_count" FROM '.$wpdb->posts. ' WHERE post_status="publish" AND post_type="post" AND post_author='. $author->ID .' ;');
			$result[$author->ID]['count'] = $postcount[0]->post_count;
			$result[$author->ID]['id'] =  $author->ID;
			$result[$author->ID]['user_nicename'] = $author->user_nicename;
		}
		
		return $result;
	}
	
	function nav_icons($next = TRUE) {
		if ($next == TRUE) {
			return 'next <span class="icon-arrow-4"></span>';
		} else {
			return '<span class="icon-arrow"></span> prev';
		}
	}
?>