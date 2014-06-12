<?php 
	get_header();
	if( $post->post_parent != 0 ) {
		// child page
		$is_child = true;
	
	} else {
		// top level page
		$is_child = false;
	}
?>

<nav class=" span2 secondaryNav">
    <ul class="nav nav-list">
        <li class="active">
            <a href="../properties">All Buildings</a>
        </li>		
    </ul> 
    <?php wp_nav_menu(array('menu' => 'Side Menu')); ?>
</nav>
            
<nav class="propertyNav span4 available">
    <h1><?php the_title(); ?></h1>
    <ul id="gal" class="thumbnails nav">
		<?php
            
			if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
                echo '<li class="props  active"><a href="" class="thumbnail">';
                the_post_thumbnail('thumbnail');
                echo '<figcaption>' . get_the_title() . '</figcaption></a></li>';
            }
        
            $args = array(
                'child_of'     => $post->ID,
                'echo'         => 0,
                'post_type'    => 'properties',
                'post_status'  => 'publish',
                'sort_column'  => 'menu_order',
                'title_li'     => ''
            );
			
            $children = get_pages($args); 
            //echo '<pre>' . print_r( $children, true ) . '</pre>';
            
            foreach ($children as $child) {
                echo '<li class="props"><a href="?p=' . ($child -> ID) . '" class="thumbnail">';
                echo get_the_post_thumbnail($child -> ID, 'thumbnail' );
                echo ($child -> post_title);
                echo '<figcaption>' . $child -> post_title . '</figcaption></a></li>';
            }
            
        ?>
	</ul>
</nav> 
                       
<article class="span6 prop contentarea">
    <section class="clearfix propImages row-fluid imagesToClone">
		<?php
            if( $is_child == true ) { ?>
                <h1 class="clearfix"> 1 Harrington Gardens</h1>
        <?php }else{ ?>
			
			<div class='titlepaddding'></div>
            
		<?php } ?>
		
    	<ul class="thumbnails nav">
			<?php
                    $gallery = get_post_gallery( get_the_ID(), false );
					//echo '<pre>' . print_r(  $gallery, true ) . '</pre>';
					$galleryimages_ids = str_getcsv($gallery['ids']);

					foreach( $galleryimages_ids AS $img_id ) { ?>
                        <li class="imgs">
                        	<?php 
								$image_thumb_url = wp_get_attachment_thumb_url( $img_id );
								$image_url = wp_get_attachment_url( $img_id );
								$post_object = get_post( $img_id );        
								$caption = $post_object->post_excerpt;
							?>
                            <a rel="1" href="<?php echo $image_url; ?>" class="thumbnail noselect ngg-fancybox fancybox">
                                <img data-bigger="class=&quot;size-thumbnail" wp-image-64"="" alt="<?php echo $caption; ?>" src="<?php echo $image_thumb_url; ?>" width="150" height="150">
                                <figcaption><?php echo $caption; ?></figcaption>
                            </a>
                        </li>	
                    <?php } ?>
        </ul>
     
        <nav class="propContentNav">
            <ul class="nav nav-tabs" id="myTab">
                <li class="active"><a href="#desc" data-toggle="tab">Description</a></li>
                <li class=""><a href="#spec" data-toggle="tab">Specifications</a></li>
                <?php
                    if( $is_child == true ) { ?>
                        <li class=""><a href="#floorplans" data-toggle="tab">Floorplans</a></li>
                <?php 
                    } else { ?>
                        <li class=""><a href="#map" data-toggle="tab">Map</a></li>
                <?php } ?>  
            </ul>
        </nav>
        
        <div class="tab-content">
            <div class="tab-pane active" id="desc">				
                <?php the_field('description'); ?>    
            </div>
            <div class="fade tab-pane" id="spec">
                <?php the_field('specifications'); ?>
            </div>
             
            <?php if( $is_child == true ) { ?>
                <div class="fade tab-pane" id="floorplans">
                    <img src="<?php the_field('floorplan_image'); ?>" alt="" />
                    <br>
                    <a href="<?php the_field('floorplan_download'); ?>" >Download File</a>
                </div>
            <?php 
                } else { ?>
                <div class="fade tab-pane" id="map">
                    <div class="acf-map">
                    <?php 
                        $location = get_field('map');
                        if( !empty($location) ): ?>
                            <div class="acf-map">
                                <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
                            </div>
                    <?php endif; ?>
                </div>
                
                <?php get_template_part('map') ?>
                
           </div>
   <?php } ?>
</div>
</section>		
</article>
<?php get_footer(); ?>