<?php

require_once 'classes/flat.class.php';

$flat = new Flat();

$posts = $flat->get_posts( true );

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

$posts = $flat->paginate( $posts, isset( $_GET['page'] ) ? $_GET['page'] : 1 );

include 'views/search.tmpl.php';