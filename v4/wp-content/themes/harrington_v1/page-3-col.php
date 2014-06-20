<?php
/**
 * Template Name: 3 Columns
 */
	get_header();
?>
<?php get_template_part('nav-secondary') ?>

<nav class="span4">
		<h1 class="title">Special offers</h1>
			<ul id="gal" class="thumbnails nav">
						<li class=""><a href="http://theharrington.com/special-offers/advance-purchase-discounts" class="thumbnail"><img src="http://www.theharrington.com/v4/wp-content/uploads/2013/11/Front-View-150x150.jpg"><figcaption>Advance Purchase Discounts</figcaption></a></li><li class=""><a href="http://theharrington.com/special-offers/special-offer-discount" class="thumbnail"><img src="http://www.theharrington.com/v4/wp-content/uploads/2013/11/5-150x150.jpg"><figcaption>Special Offer Discount - 5 Nights and Longer</figcaption></a></li><li class=""><a href="http://theharrington.com/special-offers/london-serviced-apartments-one-month-stay" class="thumbnail"><img src="http://www.theharrington.com/v4/wp-content/uploads/2013/11/1-150x150.jpg"><figcaption>London Serviced Apartments One Month Stay</figcaption></a></li><li class=""><a href="http://theharrington.com/special-offers/london-serviced-residences-three-months-stay" class="thumbnail"><img src="http://www.theharrington.com/v4/wp-content/uploads/DSC_6480a-150x150.jpg"><figcaption>London Serviced Residences Three Months stay</figcaption></a></li>			</ul>
				
		</nav>
        
        
        
        
        <article class="span6 contentarea">
        <?php 
			the_title();
		?>
		<?php 
			the_content();
		?>
		</article>
        
        
				
<section class="span10">
	
</section>

<?php get_footer(); ?>