<?php

require_once 'classes/post.class.php';

class Flat{

	private $config = array(
		'blog_title' => 'Flat-Blog'
	);

	public function __construct(){
		Post::setup( $this->config );
	}

	// Posts
	public function get_posts(){
		return Post::$posts;
	}

	public function get_post_by_id( $id ){
		return Post::$posts[ count( Post::$posts ) - $id ];
	}

	public function filter_by_author( $posts, $author ){
		foreach ($posts as $key => $post) {
			if ( strtolower( $post->get_author() ) !== strtolower( $author ) )
				unset( $posts[ $key ] );
		}
		return $posts;
	}

	public function filter_by_date( $posts, $date ){
		foreach ($posts as $key => $post) {
			if ( $post->get_date() !== $date )
				unset( $posts[ $key ] );
		}
		return $posts;
	}

	public function filter_by_category( $posts, $category ){
		foreach ($posts as $key => $post) {
			if ( strtolower( $post->get_category() ) !== strtolower( $category ) )
				unset( $posts[ $key ] );
		}
		return $posts;
	}

	// Blog
	public function get_title(){
		return $this->config['blog_title'];
	}

}