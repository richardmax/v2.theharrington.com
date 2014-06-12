<?php
get_header(); ?>

    
<nav class="span2 secondaryNav">
    <?php wp_nav_menu(array('menu' => 'Side Menu')); ?>
</nav>
   
        <div class="span8">
        
        	<?php 
			
				$args = array(
					'post_type' => 'properties'
				);
				$query = new WP_Query( $args );
			
			?>

            <?php 
			
			
				// The Loop
				if ( $query->have_posts() ) {
					echo '<ul>';
					while ( $query->have_posts() ) {
						$query->the_post();
						echo '<li>' . get_the_title() . '</li>';
					}
					echo '</ul>';
				} else {
					// no posts found
				}
				/* Restore original Post Data */
				wp_reset_postdata();
			
			
			?>

            <?php bootstrapwp_content_nav('nav-below');?>
        </div>

    
    <?php get_footer(); ?>