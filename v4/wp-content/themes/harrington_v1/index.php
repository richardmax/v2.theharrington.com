<?php
get_header(); ?>
<div class="container">
    <div class="row">
        <div class="span12">
            <?php if (function_exists('bootstrapwp_breadcrumbs')) {
                bootstrapwp_breadcrumbs();
            } ?>
        </div><!--/.span12 -->
    </div><!--/.row -->

    <div class="row content">
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