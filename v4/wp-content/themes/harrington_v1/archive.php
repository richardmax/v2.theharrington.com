<?php get_header(); 
global $fixc;
$property_name = get_query_var('property_name');
$apartment_name = get_query_var('apartment_name');
			function bigger_image( $postID ) {
					global $bigimage;
						
			
					$big_image = wp_get_attachment_image_src( get_post_thumbnail_id( $postID ), 'large' );
					$bigimage = $big_image[0];
				}
?>
		<nav class="secondaryNav span2">
			<ul class="nav nav-list all-buildings">
				<li class=""><a href="/v4/properties">All Buildings</a></li>				
			</ul>
			<?php wp_nav_menu(array('menu' => 'Side Menu')); ?>	

		</nav>
		<nav class="propertyNav span4">
		<h1><?php 
		$url = explode('/',$_SERVER["REQUEST_URI"]);
		echo str_replace('-',' ',$url[2]);
		global $postcounter; 
			$postcounter = 1;?></h1>
		<ul id="gal" class="thumbnails nav">
	<?php wp_nav_menu3(array('menu' => 'mainmenu','walker' => new Property_Walker_Middle)); ?>
	</ul>
	</nav>
	<?php 
		$query = get_post($fixc);
		$title = $query->post_title;
		
		$description_meta_flat = get_post_meta( $fixc,'description');
		
		$fulladdress = get_post_meta( $fixc,'fulladdress');
			$cat = get_the_category($fixc);
			$post_name = strtolower($cat[0]->slug);
			$map = get_posts(array('post_type'=>'props','name'=>$post_name));
			$coordinates = get_post_meta($map[0]->ID,'address',true);
			$fulladdress = get_post_meta($map[0]->ID,'fulladdress',true);
			$specs_meta_flat = get_post_meta( $fixc,'specs');
			$overview = get_post_meta( $fixc,'overview');
		?>
		<article class="span6 prop contentarea">
			<section class="clearfix propImages row-fluid imagesToClone">
			<h1 class="clearfix"> <?php echo $title;?></h1>
			<ul class="thumbnails nav">

				<?php 
				bigger_image($fixc);
				$postimages = get_post_meta($fixc,'imgs',true);
				echo apply_filters('the_content',$postimages);
				 ?>
			</ul>
			</section>
		
		

			<section class="clearfix propContent noRemove">
				<section class="clearfix propImages row-fluid imagesToClone">

				</section>
				<nav class="propContentNav">
					<ul class="nav nav-tabs" id="myTab">
						<li class=""><a href="#desc" data-toggle="tab">Description</a></li>
						<li class=""><a href="#spec" data-toggle="tab">Specifications</a></li>
						<?php if ($overview[0] == 'ticked') { ?>
						<li class="" id="mapbutton"><a href="#map" data-toggle="tab">Map</a></li>
						<?php } 
						?>
					</ul>
				</nav>
				<div class="tab-content">
					<div class="fade tab-pane" id="desc">				
						<p><?php echo $description_meta_flat[0]; ?></p>	      
					</div>
					<div class="fade tab-pane" id="spec">
						<?php echo $specs_meta_flat[0]; ?>		
					</div>
					<div class="fade tab-pane" id="map">
						<h4><?php echo $fulladdress;?></h4>
						<?php $map = preg_replace('/\s+/','+',$map_meta_flat[0]);?>
						<img src="http://maps.googleapis.com/maps/api/staticmap?center=<?php echo $coordinates; ?>&zoom=15&size=450x150&markers=<?php echo $coordinates; ?>&sensor=false"/>
						<?php //echo $coordinates; ?>
					</div>
				</div>
		
			</section>	
			
		
		</article>
				<script src="/v4/wp-content/themes/harrington/assets/js/archive.js">
				</script>
<?php get_footer(); ?>