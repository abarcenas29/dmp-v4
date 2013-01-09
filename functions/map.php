<?php
	function catlist($cat) {
		$category = array(
			'rev' => 21,	//review
			'ep' => 4,		//episode blogging
			'an' => 3,		//announcement
			'fe' =>	6,		//features
			'pod'=> 19,		//podcast
			'eve'=> 1826	//event
		);
		
		return $category[$cat];
	}
?>