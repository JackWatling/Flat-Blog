<?php include '_partials/header.php'; ?>

<section class="block">
	<?php

	if ( !empty( $author ) || !empty( $date ) || !empty( $category ) ){
		echo 
		'<p>Displaying posts published
			' . ( !empty( $author ) ? 'by <a href="search.php?author=' . $author  . '">' . $author . '</a>' : '' ) . '
			' . ( !empty( $category ) ? 'in the category <a href="search.php?category=' . $category  . '">' . $category . '</a>' : '' ) . '
			' . ( !empty( $date ) ? 'on the <a href="search.php?date=' . $date  . '">' . $date . '</a>' : '' ) . '
		</p>';
	} else {
		echo '<p>No filter specified, showing all posts. Return to <a href="index.php">home page</a>?</p>';
	}
	?>
</section>

<?php

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