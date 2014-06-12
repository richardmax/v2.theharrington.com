<?php
/**
 * Template Name: 2level
 */
get_header(); 
?>			
		<nav class="span2 secondaryNav ">
			<?php wp_nav_menu2(array('menu' => 'maimmenu','walker' => new Residency_Walker));?>
		</nav>
		
		<article class="span10">
			<h1><?php the_title(); ?></h1>

			<?php 
				while (have_posts()) : the_post();
					the_content();
					endwhile;
				?>
				
		</article>
<?php get_footer(); ?>