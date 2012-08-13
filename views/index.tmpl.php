<?php include '_partials/header.php'; ?>

<?php

foreach ($flat->get_posts() as $key => $post) {
	echo 
	'<article class="post block">

		<header class="clear">
			<h1><a href="#">' . $post->get_title() . '</a></h1>
			<span class="info"><a href="#">' . $post->get_date() . '</a> by <a href="#">' . $post->get_author() . '</a></span>
		</header>

		<section class="content">
			<p>' . $post->get_content() . '</p>
		</section>

		<section class="meta clear">
			<a href="#" class="right">Read More</a>
		</section>
		
	</article>';
}

?>

<?php include '_partials/footer.php'; ?>