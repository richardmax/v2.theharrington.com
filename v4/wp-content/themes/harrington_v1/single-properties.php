<?php get_header(); ?>

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
    
	<?php
		if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
			the_post_thumbnail();
		}
    ?>
   
    <ul id="my_cutom_type-list">
		<?php
            $my_wp_query = new WP_Query();
            $all_wp_pages = $my_wp_query->query(array('post_type' => 'properties'));
            $children = get_page_children( $post->ID, $all_wp_pages );
            // echo what we get back from WP to the browser
            //echo '<pre>' . print_r( $children, true ) . '</pre>';
            $ID1 = $children[0]-> ID;
            $ID2 = $children[1]-> ID;
			
			
			
			echo $ID1 . ", ";
			echo $ID2;
        ?> 
    </ul>

</nav> 
                       
<article class="span6 prop contentarea">
    <section class="clearfix propImages row-fluid imagesToClone">
    <?php
        if ( get_post_gallery() ) :
            $gallery = get_post_gallery( get_the_ID(), false );
            /* Loop through all the image and output them one by one */
            foreach( $gallery['src'] AS $src )
            { ?>
            	<img src="<?php echo $src; ?>" class="my-custom-class" alt="Gallery image" />
       		<?php }
        endif;
	?>
	<nav class="propContentNav">
        <ul class="nav nav-tabs" id="myTab">
            <li class="active"><a href="#desc" data-toggle="tab">Description</a></li>
            <li class=""><a href="#spec" data-toggle="tab">Specifications</a></li>
            <?php
                if( $post->post_parent != 0 ) { // not top level ?>
                    <li class=""><a href="#floorplans" data-toggle="tab">Floorplans</a></li>
            <?php 
                } else {
                    // top level page ?>
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
         
  		<?php if( $post->post_parent != 0 ) { // not top level ?>
        	<div class="fade tab-pane" id="floorplans">
            	<img src="<?php the_field('floorplan_image'); ?>" alt="" />
                <br>
                <a href="<?php the_field('floorplan_download'); ?>" >Download File</a>
            </div>
        <?php 
			} else { // top level page ?>
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
            
			<style type="text/css">
				.acf-map {
					width: 400px;
					height: 400px;
					border: #ccc solid 1px;
					margin: 20px 0;
				}
			</style>
            
			<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
            <script type="text/javascript">
				(function($) {
				 
				/*
				*  render_map
				*
				*  This function will render a Google Map onto the selected jQuery element
				*
				*  @type	function
				*  @date	8/11/2013
				*  @since	4.3.0
				*
				*  @param	$el (jQuery element)
				*  @return	n/a
				*/
				 
				function render_map( $el ) {
					// var
					var $markers = $el.find('.marker');
				 
					// vars
					var args = {
						zoom		: 16,
						center		: new google.maps.LatLng(0, 0),
						mapTypeId	: google.maps.MapTypeId.ROADMAP
					};
				 
					// create map	        	
					var map = new google.maps.Map( $el[0], args);
				 
					// add a markers reference
					map.markers = [];
					// add markers
					$markers.each(function(){
						add_marker( $(this), map );
					});
					
					// center map
					center_map( map );
				}
				 
				/*
				*  add_marker
				*
				*  This function will add a marker to the selected Google Map
				*
				*  @type	function
				*  @date	8/11/2013
				*  @since	4.3.0
				*
				*  @param	$marker (jQuery element)
				*  @param	map (Google Map object)
				*  @return	n/a
				*/
				 
				function add_marker( $marker, map ) {
				 
					// var
					var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );
				 
					// create marker
					var marker = new google.maps.Marker({
						position	: latlng,
						map			: map
					});
				 
					// add to array
					map.markers.push( marker );
				 
					// if marker contains HTML, add it to an infoWindow
					if( $marker.html() )
					{
						// create info window
						var infowindow = new google.maps.InfoWindow({
							content		: $marker.html()
						});
				 
						// show info window when marker is clicked
						google.maps.event.addListener(marker, 'click', function() {
							infowindow.open( map, marker );
						});
					}
				 
				}
				 
				/*
				*  center_map
				*
				*  This function will center the map, showing all markers attached to this map
				*
				*  @type	function
				*  @date	8/11/2013
				*  @since	4.3.0
				*
				*  @param	map (Google Map object)
				*  @return	n/a
				*/
				 
				function center_map( map ) {
				 
					// vars
					var bounds = new google.maps.LatLngBounds();
				 
					// loop through all markers and create bounds
					$.each( map.markers, function( i, marker ){
						var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );
						bounds.extend( latlng );
				 
					});
				 
					// only 1 marker?
					if( map.markers.length == 1 )
					{
						// set center of map
						map.setCenter( bounds.getCenter() );
						map.setZoom( 16 );
					}
					else
					{
						// fit to bounds
						map.fitBounds( bounds );
					}
				 
				}
				 
				/*
				*  document ready
				*
				*  This function will render each map when the document is ready (page has loaded)
				*
				*  @type	function
				*  @date	8/11/2013
				*  @since	5.0.0
				*
				*  @param	n/a
				*  @return	n/a
				*/
				
					$(document).ready(function(){
						$('.acf-map').each(function(){
							render_map( $(this) );
						});
					});
				})(jQuery);
			</script>    
       </div>
   <?php } ?>
</div>
</section>		
</article>
<?php get_footer(); ?>