<?php

require_once 'classes/flat.class.php';

$flat = new Flat();

$post = isset( $_GET['id'] ) && $_GET['id'] > 0 && $_GET['id'] <= count( Post::$posts ) ? $flat->get_post_by_id( $_GET['id'] ) : '';

include 'views/post.tmpl.php';