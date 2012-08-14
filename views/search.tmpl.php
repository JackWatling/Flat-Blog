<?php include '_partials/header.php'; ?>

<?php

if ( !empty( $author ) ){
	echo 
	'<section class="block">
		<p>Displaying posts by <a href="search.php?author=' . $author  . '">' . $author . '</a></p>
	</section>';
} else {
	echo '<section class="block">
		<p>No filter specified, showing all posts. Return to <a href="index.php">home page</a>?</p>
	</section>';
}

if( !empty( $posts ) ){
	foreach ($posts as $key => $post) {
		echo $post->display_excerpted();
	}
} else {
	echo 
	'<section class="block">
		<p>No posts found. Return to <a href="index.php">home page</a>?</p>
	</section>';
}

?>

<?php include '_partials/footer.php'; ?>