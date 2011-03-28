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
 <ol id="posts">
<?php }

while (have_posts()) : the_post(); ?>

	<li class="postWrapper" id="post-<?php the_ID(); ?>">
	
	<h2 class="postTitle"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
	<small><?php the_date(); ?> by <?php the_author(); ?></small>
	
	<div class="post"><?php the_content(__('(more...)')); ?></div>
	<p class="postMeta">
	<?php the_date(); ?>
	<span class="comment-bubble"><?php comments_popup_link(__('0'), __('1'), __('%')); ?></span>
	<?php edit_post_link(__('Edit'), ' | '); ?>
	<span class="cats"><?php the_category(', '); ?></span></p>
	</li>

<?php comments_template();

endwhile; ?>
</ol>
<?php else: ?>

<p>Sorry, that post was not found.  Try Searching.</p>
<?php get_search_form(); ?>


<?php
endif;

get_footer();
?>