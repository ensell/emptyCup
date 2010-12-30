<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<title>
		<?php
		if (is_home() || is_page('Home')) { bloginfo('name'); echo " - "; bloginfo('description'); } 
		else {
			if (function_exists('is_tag') && is_tag()) { single_tag_title("Tag Archive for ")."\"";echo " - "; bloginfo('name'); } 
			elseif (is_archive()) { wp_title('')." Archive"; echo " - "; bloginfo('name'); } 
			elseif (is_search()) { echo "Search for ".wp_specialchars($s)."\""; echo " - "; bloginfo('name'); } 
			elseif (!(is_404()) && (is_single()) || (is_page())) {
				wp_title(''); echo " - "; 
				if ($paged>1) { echo " page ".$paged." of ".$wp_query->max_num_pages." - "; } 
				bloginfo('name'); 
			} 
			elseif (is_404()) { echo 'Not Found'; echo " - "; bloginfo('name'); }
		}
		?>
	</title>

	<link rel="profile" href="http://gmpg.org/xfn/11" />
	
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />
	
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="Atom 1.0" href="<?php bloginfo('atom_url'); ?>" />
	
	<?php
		if ( is_singular() && get_option( 'thread_comments' ) )
			wp_enqueue_script( 'comment-reply' );
	
	    wp_get_archives('type=monthly&format=link');
	    wp_head();
    ?>
</head>

<body <?php body_class(); ?>>

<div id="wrapper">

	<div id="header">
		<h1><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
		<p><?php bloginfo( 'description' ); ?></p>
	</div>

	<div class="clearfix" id="mainbody">
		<h2>Something to Push</h2>