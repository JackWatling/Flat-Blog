<?php

require_once 'classes/flat.class.php';

$flat = new Flat();

$posts = $flat->get_posts();

if ( !empty( $_GET['author'] ) ){
	$author = $_GET['author'];
	$posts = $flat->filter_by_author( $posts, $author );
}

if ( !empty( $_GET['date']  ) ){
	$date = $_GET['date'];
	$posts = $flat->filter_by_date( $posts, $date );
}

if ( !empty( $_GET['category']  ) ){
	$category = $_GET['category'];
	$posts = $flat->filter_by_category( $posts, $category );
}


include 'views/search.tmpl.php';