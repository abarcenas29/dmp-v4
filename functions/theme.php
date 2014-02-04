<?php
	if(function_exists('add_theme_support'))
	{
		$args = array(
			'posts',
			//'d5_series_review'
			);
	add_theme_support('post-thumbnails',$args);
	}

	if(function_exists('add_image_size'))
	{
		add_image_size('top_image_size',1100,446,true);
		add_image_size('thumbnail',290,290,true);
	}
	
	
	function search_ajax() {
		global $wpdb;
		$esc_string = mysql_escape_string($_POST['data']['query']);
		if(strlen($esc_string) == 0) {
			echo '<h3 id="search-query">Type your search query and hit search</h3>';
		} else if (strlen($esc_string) < 3) {
			echo '<h3 id="search-query">I need more</h3>';
		} else {
			$q = $wpdb->get_results('SELECT ID,post_title FROM '. $wpdb->posts . ' WHERE post_title LIKE "%'. $esc_string .'%" AND post_type="post" AND post_status="publish" LIMIT 10;');
			
			foreach($q as $result) {
				echo '<div class="search-result"><h4><a href="'. blog_url('?p='.$result->ID) .'" >' . $result->post_title . '</a><h4></div>';
			}
		}
		
		exit;
	}
	add_action( 'wp_ajax_search_ajax', 'search_ajax' ); //Declare Ajax on Users
	add_action( 'wp_ajax_nopriv_search_ajax', 'search_ajax' ); //Declare Ajax on Non-Login Users
	
	function get_events($cat) {
		$q = _q('cat='.$cat);
		$q->post_count = 4;
		
		while($q->have_posts()){
			$q->the_post();
			echo '<div class="slide-content">
						<div class="slide-wrapper">
						<a href="'. get_permalink() .'">
						<img src="'. catch_that_image(TRUE) .'"/>
						<h4>'. get_the_title() .'</h4>
						</a>
						</div>
					</div>';
		}
	}
	
	function get_annoucnement() {
		$q = _q('cat='.catlist('an'));
		$q->post_count = 1;
		
		while($q->have_posts()) {
			$q->the_post();
			echo '<a href="'. get_permalink() .'">' . get_the_title() .'</a>';
		}
	}
	
	function author_leaderboard() {
		$author_count = get_postcount();
		arsort($author_count);
		
		foreach($author_count as $val) {
			echo '<tr>
							<td>' . get_avatar($val['id'],64) .'</td>
							<td><span>'.$val['user_nicename'].'</span></td>
							<td>'.$val['count'].'</td>
						</tr>';
		}
	}
	
	
	function get_rev() {
		$q = _q('cat='.catlist('rev'));
		$q->post_count = 8;
		
		while ($q->have_posts()) {
			$q->the_post();
			echo '<div class="review-content">
						<a href="'.get_permalink().'">
						<div class="review-image">
							<img src="'. catch_that_image(TRUE) .'">
						</div>
						<div class="review-title">
							<h3>'.get_the_title().'</h3>
						</div>
						</a>
					</div>';
		}
	}
	
	function get_cat($id,$one = false) {
		$cats = wp_get_post_categories($id);
		$wrapper = '' ;
		foreach ($cats as $cat) {
			$catinfo = get_category($cat);
			$wrapper = $wrapper . ' <a href="'.  esc_url(blog_url('category/'.$catinfo->slug)) .'">'.
			$catinfo->name . '</a>' . ' ';
			if ($one == TRUE) {
				return $wrapper;
			}
		}
		return $wrapper;
	}
	
	function generatePost() {
		$args = array (
			'category__not_in' => array(1)
		);
		
		$q = _q($args);
		$q->post_count = 12;
		
		while ($q->have_posts()){
			$q->the_post();
			$wrapper = get_cat(get_the_ID());
			
			echo '<article class="content-post">'.
				'<header><h3><a href="'. get_permalink() .'">'. get_the_title() .'</a></h3></header>'.
				'<section>'. get_the_excerpt() .'</section>'.
				'<footer>
					<p>By '.get_co_author().' | Posted On: '. get_the_time(time_format()) .'
					Filed Under:' . $wrapper .'
					</p>
				</footer>
			</article>';
		}
	}
	
	function sbt_custom_excerpt_more( $output ) {
		return preg_replace('/<a[^>]+>Continue reading.*?<\/a>/i','',$output);
	}
	add_filter( 'get_the_excerpt', 'sbt_custom_excerpt_more', 20 );
?>
