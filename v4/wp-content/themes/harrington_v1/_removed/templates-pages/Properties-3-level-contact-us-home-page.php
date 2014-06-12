<?php
/**
 * Template Name: Properties Contact Us Home Page
 */
get_header();
?>
			
		<nav class="span2 secondaryNav">
			<ul class="nav nav-list all-buildings">
				<li class=""><a href="/v4/properties">All Buildings</a></li>				
			</ul>		
			<?php wp_nav_menu2(array('menu' => 'maimmenu','walker' => new Residency_Walker_Prop));?>
		</nav>
		
		<nav class="span4">
		<h1 class="title"><?php  
		$uri = explode('/',$_SERVER["REQUEST_URI"]);
		echo ucfirst(str_replace('-',' ',$uri[1]));
		?></h1>
			<ul id="gal" class="thumbnails nav">
						<?php wp_nav_menu3(array('menu' => 'maimmenu','walker' => new Residency_Walker_Middle_Deep));?>
			</ul>
		<div class="span12">
			<h2>Contact Details</h2>
			<p>
				1 Harrington Gardens,
				<br>
				South Kensington,
				<br>
				London, SW7 4JJ
			</p>
			<p>
				Reservations: +44 (0)20 7341 5800
				<br>
				reservations@theharrington.com
				<br>
				<a href="http://www.theharrington.com" title="The Harrington" alt="The Harrington Website">http://www.theharrington.com</a>
			</p>
		</div>		
		</nav>
		
		<article class="span6 contentarea contact-us">
			<h2>The Harrington</h2>
			<?php
			global $post;
			
			$query = new WP_Query(array('post_type' => 'props','order'=>'ASC'));
			if ($query->have_posts()) while($query->have_posts()) : $query->the_post();
			//setup_postdata($post);
								$address = get_post_meta( $post->ID,'address',true);
								$contactcontent = get_post_meta( $post->ID,'property_contacts_content');
			?>
			<div class="coordinates">
				<span class="map-label addresses"><?php echo $post->post_title; ?></span>
				<span class="coordinates"><?php echo get_post_meta( $post->ID,'address',true)/*echo $address[0]; */?></span>
			</div>
			<?php endwhile; wp_reset_query();?>
			
			<?php $query = new WP_Query(array('post_type'=>'page','pagename'=>'/contact-us'));
			while ($query->have_posts()) {
				$query->the_post();
				echo apply_filters('the_content',$post->post_content);
			}
			wp_reset_query();
			?>
			<div id="map-canvas" style="width:475px; height:300px; margin-bottom: 20px;"></div>
		</article>
		

	 <script type="text/javascript"
		src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAIQ0nRpJe1cZUetvAVfi2mXs5B0mEi21g&sensor=false">
	</script>
    <script type="text/javascript" src="http://www.theharrington.com/v4/wp-content/themes/harrington/assets/js/googlemaps.js"></script>

<?php get_footer(); ?>