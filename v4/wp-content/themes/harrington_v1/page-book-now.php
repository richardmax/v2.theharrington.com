<?php
get_header(); ?>

			

			
		<nav class=" span2 secondaryNav">
		<ul class="nav nav-list">
				<li class="">
					<a href="../properties">All Buildings</a>
				</li>
				</ul>
<?php wp_nav_menu2(array('menu' => '','walker' => new Residency_Walker));?>

		</nav>
		
		<article class="span10 home-gallery">
			<iframe src="" style="width:830px;height:100%; border: 0 none; margin: 0 0 0 -20px; padding: 0;"></iframe>
		</article>
	<script src="http://www.theharrington.com/v4/wp-content/themes/harrington/assets/js/availability.js">
<!-- availability script here-->
	</script>
  
<?php get_footer(); ?>