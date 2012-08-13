<?php

require_once 'classes/post.class.php';

class Flat{

	public function __construct(){
		$this->load_posts();
	}

	private function load_posts(){
		$posts = glob( 'posts/*.txt' );
		foreach ($posts as $key => &$file) {
			$file = new Post( $file );
		}
		Post::$posts = $posts;
	}

	public function get_posts(){
		return Post::$posts;
	}

}