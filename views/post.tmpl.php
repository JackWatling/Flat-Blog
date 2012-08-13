<?php include '_partials/header.php'; ?>

<?php

echo 
'<article class="post block">

	<header class="clear">
		<h1><a href="#">' . $post->get_title() . '</a></h1>
		<span class="info"><a href="#">' . $post->get_date() . ' @ ' . $post->get_time() . '</a> by <a href="#">' . $post->get_author() . '</a></span>
	</header>

	<section class="content">
		' . $post->get_content() . '
	</section>

	<section class="meta clear">'
		. $post->next_post()
		. $post->prev_post() .
	'</section>
	
</article>';

?>

<?php include '_partials/footer.php'; ?>