<?php

require_once 'classes/flat.class.php';

$flat = new Flat();

$posts = $flat->get_posts();

include 'views/index.tmpl.php';