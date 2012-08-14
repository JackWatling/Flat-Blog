<?php include '_partials/header.php'; ?>

<?php

if ( !empty( $post ) ){
	echo $post->display_full();
} else {
	echo '<section class="error block">
		<p>No post found, did you provide a valid id?</p>
	</section>';
}

?>

<?php include '_partials/footer.php'; ?>