<?php 
	get_header();

	if ( have_posts() ):
	while ( have_posts() ) : the_post();

		postsTemplate(false);
		
		comments_template();

	endwhile; 
	else: 
?>

    <p>Sorry, that post was not found.  Try Searching.</p>
	<?php get_search_form(); ?>

	<script type="text/javascript">
		// focus on search field after it has loaded
		document.getElementById('s') && document.getElementById('s').focus();
	</script>
	
<?php
	endif;

	get_sidebar();
	get_footer();
?>