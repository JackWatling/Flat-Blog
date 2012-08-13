<?php

require_once 'classes/post.class.php';

class Flat{

	public function __construct(){
		Post::setup();
	}

	public function get_posts(){
		return Post::$posts;
	}

}