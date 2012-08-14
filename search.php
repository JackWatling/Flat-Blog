<?php

require_once 'classes/flat.class.php';

$flat = new Flat();

$posts = $flat->get_posts();

if ( !empty( $_GET['author'] ) ){
	$author = $_GET['author'];
	$posts = $flat->filter_by_author( $posts, $author );
}


include 'views/search.tmpl.php';