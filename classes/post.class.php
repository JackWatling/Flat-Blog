<?php

class Post{

	public static $posts;

	//Configuration
	private static $config = array(
		'post_directory' => 'posts',
		'post_date_format' => 'd-m-Y',
		'post_time_format' => 'H:i',
		'post_excerpt_length' => 200,
		'post_read_more' => 'Read More',
		'post_header_image' => true,
		'post_header_image_directory' => 'images',
		'post_header_image_full' => true,
		'post_header_image_excerpt' => true,
		'post_category_display' => true);

	//Static
	public static function setup( $config ){
		self::configure( $config );
		self::load();
		self::sort();
		self::ids();
	}

	private static function configure( $config ){
		foreach (self::$config as $k => &$v) {
			foreach ($config as $kk => &$vv) {
				if ( $k === $kk ){
					$v = $vv;
					break;
				}
			}
		}
	}

	private static function load(){
		Post::$posts = glob( self::$config['post_directory'] . '/*.txt' );
		foreach (Post::$posts as $key => &$file) {
			$file = new Post( $file );
		}
	}

	private static function sort(){
		usort( Post::$posts, function( $a, $b ){
			return strtotime($b->date . ' ' . $b->time)  - strtotime($a->date . ' ' . $a->time);
		});
	}

	private static function ids(){
		$post_total = count( Post::$posts );
		foreach (Post::$posts as $key => $post) {
			$post->set_id( $post_total - $key );
		}
	}

	//Dynamic
	private $id;
	private $title;
	private $date;
	private $time;
	private $author;
	private $content;
	private $header_image;
	private $category;

	public function __construct( $file ){
		$data = json_decode( file_get_contents( $file ) );

		$this->title = $data->title;
		$this->date = $this->format_date( $data->date );
		$this->time = $this->format_time( $data->time );
		$this->author = $data->author;
		$this->content = $data->content;
		$this->header_image = isset( $data->header_image ) && self::$config['post_header_image'] ? file_exists( self::$config['post_header_image_directory'] . '/' . $data->header_image ) ? self::$config['post_header_image_directory'] . '/' . $data->header_image : '' : '';
		$this->category = isset( $data->category ) ? $data->category : '';
	}

	//ID
	public function get_id(){
		return $this->id;
	}

	public function set_id( $id ){
		$this->id = $id;
	}

	//Title
	public function get_title(){
		return $this->title;
	}

	//Header Image
	public function get_header_image(){
		return !empty( $this->header_image) && self::$config['post_header_image'] ? '<img src="' . $this->header_image . '">' : '';
	}

	//Category
	public function get_category(){
		return !empty( $this->category) ? $this->category : '';
	}

	private function display_category(){
		return self::$config['post_category_display'] && !empty( $this->category );
	}

	//Date
	public function get_date(){
		return $this->date;
	}

	private function format_date( $date ){
		return date( self::$config['post_date_format'], strtotime( $date ) );
	}

	//Time
	public function get_time(){
		return $this->time;
	}

	private function format_time( $time ){
		return date( self::$config['post_time_format'], strtotime( $time ) );
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

	public function get_excerpt(){
		return $this->replace_newlines( implode( ' ', array_slice( explode( ' ', strip_tags( $this->content ) ), 0, self::$config['post_excerpt_length'] ) ) . '...' );
	}

	//Output
	public function display_full(){
		return
		'<article class="post block">

			<header class="clear">
				<h1><a href="#">' . $this->get_title() . '</a></h1>
				<span class="info"><a href="search.php?date=' . $this->get_date() . '">' . $this->get_date() . ' @ ' . $this->get_time() . '</a> by <a href="search.php?author=' . $this->get_author() . '">' . $this->get_author() . '</a>' . ( $this->display_category() ? ' in <a href="search.php?category=' . $this->get_category() . '">' . $this->get_category() . '</a>' : '' ) . '</span>
			</header>

			<section class="content">
				' . (self::$config['post_header_image_full'] ? $this->get_header_image() : '') . '
				' . $this->get_content() . '
			</section>

			<section class="meta clear">'
				. $this->next_post()
				. $this->prev_post() .
			'</section>
				
		</article>';
	}

	public function display_excerpted(){
		return
		'<article class="post block">

			<header class="clear">
				<h1><a href="' . $this->get_permalink() . '">' . $this->get_title() . '</a></h1>
				<span class="info"><a href="search.php?date=' . $this->get_date() . '">' . $this->get_date() . ' @ ' . $this->get_time() . '</a> by <a href="search.php?author=' . $this->get_author() . '">' . $this->get_author() . '</a>' . ( $this->display_category() ? ' in <a href="search.php?category=' . $this->get_category() . '">' . $this->get_category() . '</a>' : '' ) . '</span>
			</header>

			<section class="content">
				' . (self::$config['post_header_image_excerpt'] ? $this->get_header_image() : '') . '
				' . $this->get_excerpt() . '
			</section>

			<section class="meta clear">
				<a href="' . $this->get_permalink() . '" class="right">' . self::$config['post_read_more'] . '</a>
			</section>
			
		</article>';
	}

	//Links
	public function get_permalink(){
		return 'post.php?id=' . $this->get_id();
	}

	//Navigation
	public function next_post(){
		return $this->get_id() + 1 <= count( Post::$posts ) ? '<a class="right" href="post.php?id=' . ($this->get_id() + 1) . '">Next</a>' : '';
	}

	public function prev_post(){
		return $this->get_id() - 1 > 0 ? '<a class="left" href="post.php?id=' . ($this->get_id() - 1) . '">Prev</a>' : '';
	}

}