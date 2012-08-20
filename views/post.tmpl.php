<?php include '_partials/header.php'; ?>

<?php

if ( !empty( $post ) ){
	echo $post;
} else {
	echo
	'<section class="block">
		<p>No post found, did you provide a valid id?</p>
	</section>';
}

?>

<?php include '_partials/footer.php'; ?>