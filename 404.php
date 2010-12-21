<?php get_header(); ?>

	<h1>Error 404</h1>
	<p>The page you requested could not be found.</p>
	<?php get_search_form(); ?>

	<script type="text/javascript">
		// focus on search field after it has loaded
		document.getElementById('s') && document.getElementById('s').focus();
	</script>

<?php get_footer(); ?>