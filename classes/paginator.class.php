<?php

class Paginator{

	public static $page_current;
	public static $page_url;
	public static $page_posts_total;

	public static $config = array(
		'paginator_enabled' => true,
		'paginator_posts_per_page' => 10
	);

	//Setup
	public static function setup(){
		self::configure();
	}

	public static function configure(){
		self::$config = Configuration::update( self::$config );
	}

	public static function paginate( $posts, $url, $page ){
		if ( !self::$config['paginator_enabled'] ){
			return $posts;
		}
		self::$page_current = $page;
		self::$page_url = preg_replace( '/(\?|\&){1}page=\d+/', '', $url);
		self::$page_posts_total = count( $posts );
		return array_slice( $posts, (self::$page_current - 1) * self::$config['paginator_posts_per_page'], self::$config['paginator_posts_per_page']);
	}

	public static function next_page(){
		return (self::$page_current + 1) <= ceil( self::$page_posts_total / self::$config['paginator_posts_per_page'] )
			? '<a class="right" href="' . self::$page_url . ( strpos( self::$page_url, '?' ) ? '&' : '?' ) . 'page=' . ( self::$page_current + 1 ) . '">Newer</a>'
			: '';
	}

	public static function prev_page(){
		return ( self::$page_current - 1 > 0 )
			? '<a class="left" href="' . self::$page_url . ( strpos( self::$page_url, '?' ) ? '&' : '?' ) . 'page=' . ( self::$page_current - 1 ) . '">Older</a>'
			: '';
	}

	public static function page_navigation(){
		return
		self::$config['paginator_enabled'] && self::$page_posts_total > self::$config['paginator_posts_per_page']
			? '<nav class="pagination block clear">'
				. self::next_page()
				. self::prev_page() . '
			</nav>' 
			: '';
	}

}