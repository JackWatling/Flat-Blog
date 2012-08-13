<?php

require_once 'classes/flat.class.php';

$flat = new Flat();

$post = $flat->get_post_by_id( $_GET['id'] );

include 'views/post.tmpl.php';