<?php 
	get_header();
	if (have_posts()) : 
?>

<?php $post = $posts[0]; // hack: set $post so that the_date() works ?>
<?php if (is_category()) { ?>
<h1>Archives for "<?php single_cat_title(); ?>"</h1>

<?php } elseif(is_tag()) { ?>
<h1>Tagged with "<?php single_tag_title(); ?>"</h1>

<?php } elseif (is_day()) { ?>
<h1>Archives for <?php the_time('F jS, Y'); ?></h1>

<?php } elseif (is_month()) { ?>
<h1>Archives for <?php the_time('F, Y'); ?></h1>

<?php } elseif (is_year()) { ?>
<h1>Archives for <?php the_time('Y'); ?></h1>

<?php } elseif (is_author()) { ?>
<h1>Author Archive</h1>

<?php } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
<h1>Blog Archives</h1>

<?php }

while (have_posts()) : the_post(); 

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