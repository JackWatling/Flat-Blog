<?php

require_once 'classes/post.class.php';

$posts = glob( 'posts/*.txt' );

foreach ($posts as $key => &$file) {
	$file = new Post( $file );
}

include 'views/index.tmpl.php';

?>