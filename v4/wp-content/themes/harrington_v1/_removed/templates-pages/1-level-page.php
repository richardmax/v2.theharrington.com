<?php
/**
 * Template Name: 1level
 */
get_header(); 
?>
		<article class="span12">
		<h1><?php the_title(); ?></h1>
		<?php 
			//$query = new WP_Query(array('post_type' => 'page', 'pagename' => 'company/'.get_query_var('pagename')));
			while (have_posts()) : the_post();
				//echo $query->post_content;
				the_content();
				endwhile;
				//echo get_query_var('pagename');
			?>
			
		</article>
<?php get_footer(); ?>