<?php

class Post{

	public static $posts;

	//Static
	public static function setup(){
		self::load_posts();
		self::sort_posts();
	}

	private static function load_posts(){
		$posts = glob( 'posts/*.txt' );
		foreach ($posts as $key => &$file) {
			$file = new Post( $file );
		}
		Post::$posts = $posts;
	}

	private static function sort_posts(){
		usort( Post::$posts, function( $a, $b ){
			return $b->date - $a->date;
		});
	}

	//Dynamic
	private $title;
	private $date;
	private $author;
	private $content;

	public function __construct( $file ){
		$data = json_decode( file_get_contents( $file ) );

		$this->title = $data->title;
		$this->date = $this->format_date( $data->date );
		$this->author = $data->author;
		$this->content = $data->content;
	}

	//Title
	public function get_title(){
		return $this->title;
	}

	// Date
	public function get_date(){
		return $this->date;
	}

	private function format_date( $date ){
		return date( 'd/m/Y', strtotime( $date ) );
	}

	//Author
	public function get_author(){
		return $this->author;
	}

	//Content
	public function get_content(){
		return $this->replace_newlines( $this->content );
	}

	private function replace_newlines( $content ){
		return '<p>' . str_replace( '\n' , '</p><p>', $content) . '</p>';
	}

}