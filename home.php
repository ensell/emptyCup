<?php
/*
Template Name: Home Page
*/
?>
<?php get_header(); ?>
<div id="main" class="clearfix">		
<?php get_sidebar();?>
	<div class="col maincol">
		<?php 
			the_post();
			the_content();
			edit_post_link('Edit', '', ' ');
		?>
		</div>
</div><!-- end main -->
<?php get_footer(); ?>