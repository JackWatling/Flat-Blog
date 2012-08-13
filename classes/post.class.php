<?php

class Post{

	public static $posts;

	private $title;
	private $date;
	private $author;
	private $content;

	public function __construct( $file ){
		$data = json_decode( file_get_contents( $file ) );

		$this->title = $data->title;
		$this->date = $data->date;
		$this->author = $data->author;
		$this->content = $data->content;
	}

	public function get_title(){
		return $this->title;
	}

	public function get_date(){
		return $this->date;
	}

	public function get_author(){
		return $this->author;
	}

	public function get_content(){
		return $this->content;
	}

}