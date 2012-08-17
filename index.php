<?php

require_once 'classes/flat.class.php';

$flat = new Flat();

$posts = $flat->get_posts();

$posts = $flat->paginate( $posts, $_SERVER['PHP_SELF'], isset( $_GET['page'] ) ? $_GET['page'] : 1 );

include 'views/index.tmpl.php';