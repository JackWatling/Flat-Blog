<?php

require_once 'classes/post.class.php';
require_once 'classes/paginator.class.php';
require_once 'classes/configuration.class.php';

class Flat{

	private static $config = array(
		'blog_title' => 'Flat-Blog'
	);

	public function __construct(){
		$this->setup();
		Paginator::setup();		
		Post::setup();		
	}

	//Setup
	public function setup(){
		$this->configure();
	}

	public function configure(){
		self::$config = Configuration::update( self::$config );
	}

	// Posts
	public function get_posts( $is_query = false ){
		return Post::get_posts( $is_query );
	}

	public function get_post_by_id( $id ){
		return Post::$posts[ count( Post::$posts ) - $id ];
	}

	//Filters
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

	//Pagination
	public function paginate( $posts, $page ){
		return Paginator::paginate( $posts, $_SERVER['REQUEST_URI'], $page );
	}

	public function posts_per_page(){
		return Paginator::$config['paginator_posts_per_page'];
	}

	public function next_page(){
		return Paginator::next_page();
	}

	public function prev_page(){
		return Paginator::prev_page();
	}

	public function page_navigation(){
		return Paginator::page_navigation();
	}

	// Blog
	public function get_title(){
		return self::$config['blog_title'];
	}

}