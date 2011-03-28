<?php

  get_header();

  if (have_posts()): ?>

  <ol id="posts"><?php

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

    <?php comments_template(); // Get wp-comments.php template ?>

    <?php endwhile; ?>

  </ol>

<?php else: ?>

  <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>

<?php endif; ?>

  <?php if (will_paginate()): ?>
  
    <ul id="pagination">
      <li class="previous"><?php posts_nav_link('','','&laquo; Previous Entries') ?></li>
      <li class="future"><?php posts_nav_link('','Next Entries &raquo;','') ?></li>
    </ul>
    
  <?php endif; ?>


<?php get_footer(); ?>