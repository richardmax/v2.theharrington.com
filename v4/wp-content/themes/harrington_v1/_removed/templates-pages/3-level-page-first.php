<?php
/**
 * Template Name: 3level-first
 */
get_header(); 
?>

		<nav class="secondaryNav span2">
			<?php wp_nav_menu2(array('menu' => 'maimmenu','walker' => new Residency_Walker));?>
		</nav>
		
		<nav class="span4">
		<h1 class="title"><?php the_title(); ?></h1>
			<ul id="gal" class="thumbnails nav">
						<?php wp_nav_menu3(array('menu' => 'maimmenu','walker' => new Residency_Walker_Middle_Deep));?>
			</ul>
				
		</nav>
		<article class="span6 contentarea">
		<h2><?php 
			while (have_posts()) : the_post();
				the_title();
				endwhile;
			?></h2>
		
		<?php/* echo $fixc; */?>
		<?php 
			while (have_posts()) : the_post();
				the_content();
				endwhile;
			?>
		</article>
				<script>
				jQuery(document).ready(function ($) {
				
					$('.active,.anchor').parent().addClass('active');
					$('.title').html($('.active .anchor').html());
					//console.log($('.active .anchor').html());
					var hasclass = false;
					$.each($('.menu-main-menu-container>.nav.nav-list li'),function () {
						// console.log('a');
						if ( $(this).hasClass('active') ) {
							hasclass = true;
						}
					});
					if (hasclass === false) {
						$('.nav.nav-list li:first').addClass('active');
					}
				});
				</script>


<?php get_footer(); ?>