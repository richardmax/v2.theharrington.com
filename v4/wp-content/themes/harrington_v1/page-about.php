<?php
/**
 * Template Name: About
 */
	get_header();
?>

<nav class=" span2 secondaryNav">
    <?php wp_nav_menu(array('menu' => 'Side Menu')); ?>
</nav>
				
<section class="span10">
	<?php
		while (have_posts()) : the_post();
			//echo $query->post_content;
			the_content();
		endwhile; 
	?>
</section>

<?php get_footer(); ?>