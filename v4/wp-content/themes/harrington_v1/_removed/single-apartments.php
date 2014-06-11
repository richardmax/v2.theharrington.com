<?php get_header();
global $fixc; ?>
			
			<div id="content" class="clearfix row-fluid">
			
				<div id="main" class="span8 clearfix" role="main">

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    <article  id="post-<?php the_ID(); ?>" <?php post_class('span6 prop contentarea'); ?>>
			<section class="clearfix propImages row-fluid imagesToClone">
			<h1 class="clearfix"><?php the_title();?></h1>
			
            
            
            
            
            
			</section>
		
		

			<section class="clearfix propContent noRemove">
				<section class="clearfix propImages row-fluid imagesToClone">

				</section>
				<nav class="propContentNav">
					<ul class="nav nav-tabs" id="myTab">
						<li class="active"><a href="#desc" data-toggle="tab">Description</a></li>
						<li class=""><a href="#spec" data-toggle="tab">Specifications</a></li>
											</ul>
				</nav>
				<div class="tab-content">
					<div class="tab-pane active" id="desc">				
						<?php $description_meta_flat = get_post_meta( 'description'); ?>
                        <?php echo get_post_meta( 'description'); ?>  
					</div>
					<div class="fade tab-pane" id="spec">
						
                        
                        
                        
                        
					</div>
					<div class="fade tab-pane" id="map">
						<h4></h4>
												<img src="http://maps.googleapis.com/maps/api/staticmap?center=51.493331,-0.182132&amp;zoom=15&amp;size=450x150&amp;markers=51.493331,-0.182132&amp;sensor=false">
											</div>
				</div>
		
			</section>	
			
		
		</article>
                    
                    
                    
                    
                    
                    
                    
                    <?php endwhile; ?>			
					
					
                    
					
					<?php endif; ?>
			
				</div> <!-- end #main -->
    
				<?php get_sidebar(); // sidebar 1 ?>
    
			</div> <!-- end #content -->

<?php get_footer(); ?>