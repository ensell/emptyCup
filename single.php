<?php get_header(); ?>


<h2 class="postTitle"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
<small><?php the_date(); ?> by <?php the_author(); ?></small>

<div class="post">
<?php
the_post();
the_content(); ?>
</div>
<p class="postMeta">
<?php the_date(); ?>
<span class="comment-bubble"><?php comments_popup_link(__('0'), __('1'), __('%')); ?></span>
<?php edit_post_link(__('Edit'), ' | '); ?>
<span class="cats"><?php the_category(', '); ?></span></p>
	
<?php get_footer(); ?>