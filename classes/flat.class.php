<?php

require_once 'classes/post.class.php';

class Flat{

	public static $config = array(
		'blog_title' => 'Flat-Blog',
		'post_date_format' => 'd/m/Y',
		'post_time_format' => 'H:i',
		'post_read_more' => 'Read More');

	public function __construct(){
		Post::setup();
	}

	// Posts
	public function get_posts(){
		return Post::$posts;
	}

	public function get_post_by_id( $id ){
		return Post::$posts[ count( Post::$posts ) - $id ];
	}

	// Blog
	public function get_title(){
		return self::$config['blog_title'];
	}

}