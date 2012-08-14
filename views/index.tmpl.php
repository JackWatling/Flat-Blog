<?php include '_partials/header.php'; ?>

<?php

if( !empty( $posts ) ){
	foreach ($posts as $key => $post) {
		echo $post->display_excerpted();
	}
} else {
	echo 
	'<section class="error block">
		<p>No posts found.</p>
	</section>';
}

?>

<?php include '_partials/footer.php'; ?>