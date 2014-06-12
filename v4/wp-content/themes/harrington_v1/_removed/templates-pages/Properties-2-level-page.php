<?php
/**
 * Template Name: Properties 2 level
 */
get_header(); 
?>
			
		<nav class="span2 secondaryNav">
			<ul class="nav nav-list all-buildings">
				<li class=""><a href="/v4/properties">All Buildings</a></li>				
			</ul>

			<?php wp_nav_menu2(array('menu' => 'mainmenu','walker' => new Residency_Walker_Prop));?>
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