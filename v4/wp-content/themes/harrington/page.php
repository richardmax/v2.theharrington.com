<?php
 
 get_header(); ?>
			
		<nav class=" span2 secondaryNav">
			<?php wp_nav_menu2(array('menu' =>'mainmenu','walker' => new Residency_Walker));?>
		</nav>
		
		<section class="span10"><?php

		//$query = new WP_Query(array('post_type' => 'page', 'pagename' => 'company/'.get_query_var('pagename')));
			while (have_posts()) : the_post();
				//echo $query->post_content;
				the_content();
				endwhile; ?>
		</section>

<?php get_footer(); ?>