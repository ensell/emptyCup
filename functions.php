<?php

// Change Excerpt length
//----------------------------------------------------
function new_excerpt_length($length) { return 30; }
add_filter('excerpt_length', 'new_excerpt_length');

// Sidebar Widgets
//----------------------------------------------------
if ( function_exists('register_sidebar') )
{
  register_sidebar(array(
    'before_widget' => '<li id="%1$s" class="widget %2$s">',
    'after_widget' => '</li>',
    'before_title' => '',
    'after_title' => '',
  ));
}

// Pagination Check
//----------------------------------------------------
function will_paginate() 
{
  global $wp_query;
  
  if ( !is_singular() ) 
  {
    $max_num_pages = $wp_query->max_num_pages;
    
    if ( $max_num_pages > 1 ) 
    {
      return true;
    }
  }
  return false;
}

// Bloginfo Shortcode
//----------------------------------------------------
function digwp_bloginfo_shortcode( $atts ) {
   extract(shortcode_atts(array(
       'key' => '',
   ), $atts));
   return get_bloginfo($key);
}
add_shortcode('bloginfo', 'digwp_bloginfo_shortcode');


// Post Markup
//----------------------------------------------------
function postsTemplate($excerpt) {
?>

		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<h1>
				<a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
			</h1>
	
			<div class="postMeta">
				<p><a href="<?php echo get_permalink(); ?>"><?php comments_number('0 comments', '1 comment', '% comments'); ?></a></p>
				<p>Posted by <?php the_author_posts_link(); ?> <?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ago'; ?> in <? the_category(', '); ?></p>
				<p><?php the_tags('Tagged with ',', ','.'); ?></p>
			</div>
			
			<div class="postBody">
				<?php if($excerpt) { the_excerpt();} else { the_content('Read more on "'.the_title('', '', false).'" &raquo;'); } ?>
				<?php edit_post_link('edit', ' ', ' '); ?>
			</div>
		</div>

<?php
}

?>