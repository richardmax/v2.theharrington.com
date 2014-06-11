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
    <ul id="gal" class="thumbnails nav">
        <li class="props  "><a href="/properties/1-harrington-gardens/1-harrington-gardens" class="thumbnail"><img src="http://www.theharrington.com/v4/wp-content/uploads/2013/11/Front-View-150x150.jpg"><figcaption>1 Harrington Gardens</figcaption></a></li><li class="props avail "><a href="/properties/1-harrington-gardens/studio-apartment" class="thumbnail"><img src="http://www.theharrington.com/v4/wp-content/uploads/2013/11/Bedroom-150x150.jpg"><figcaption>Studio Apartment</figcaption></a></li><li class="props avail active"><a href="/properties/1-harrington-gardens/1-bedroom-apartment" class="thumbnail"><img src="http://www.theharrington.com/v4/wp-content/uploads/2013/11/7-150x150.jpg"><figcaption>1 Bedroom Apartment</figcaption></a></li><li class="props avail "><a href="/properties/1-harrington-gardens/2-bedroom-apartment" class="thumbnail"><img src="http://www.theharrington.com/v4/wp-content/uploads/2013/11/5-150x150.jpg"><figcaption>2 Bedroom Apartment</figcaption></a></li>
    </ul>
</nav> 
            
            
<article class="span6 prop contentarea">
    
    <section class="clearfix propImages row-fluid imagesToClone">
        <h1 class="clearfix"> 1 Bedroom Apartment</h1>
        <ul class="thumbnails nav">
            <li class="imgs"><a rel="1" href="http://www.theharrington.com/v4/wp-content/uploads/2013/11/Studio-Kitchen.jpg" class="thumbnail noselect ngg-fancybox fancybox"><img data-bigger="class=&quot;size-thumbnail" wp-image-69="" "="" alt="Studio Kitchen" src="http://www.theharrington.com/v4/wp-content/uploads/2013/11/Studio-Kitchen-150x150.jpg" width="150" height="150"><figcaption>Kitchen</figcaption></a></li>
            <li class="imgs"><a rel="1" href="http://www.theharrington.com/v4/wp-content/uploads/2013/11/1.jpg" class="thumbnail noselect ngg-fancybox fancybox"><img data-bigger="class=&quot;size-thumbnail" wp-image-54"="" alt="Lounge" src="http://www.theharrington.com/v4/wp-content/uploads/2013/11/1-150x150.jpg" width="150" height="150"><figcaption>Lounge</figcaption></a></li>
            <li class="imgs"><a rel="1" href="http://www.theharrington.com/v4/wp-content/uploads/2013/11/7.jpg" class="thumbnail noselect ngg-fancybox fancybox"><img data-bigger="class=&quot;size-thumbnail" wp-image-59"="" alt="Bedroom" src="http://www.theharrington.com/v4/wp-content/uploads/2013/11/7-150x150.jpg" width="150" height="150"><figcaption>Bedroom</figcaption></a></li>
            <li class="imgs"><a rel="1" href="http://www.theharrington.com/v4/wp-content/uploads/2013/11/Walk-In-Shower.jpg" class="thumbnail noselect ngg-fancybox fancybox"><img data-bigger="class=&quot;size-thumbnail" wp-image-53"="" alt="Bathroom" src="http://www.theharrington.com/v4/wp-content/uploads/2013/11/Walk-In-Shower-150x150.jpg" width="150" height="150"><figcaption>Bathroom</figcaption></a></li>
        </ul>
                
        <nav class="propContentNav">
            <ul class="nav nav-tabs" id="myTab">
                <li class="active"><a href="#desc" data-toggle="tab">Description</a></li>
                <li class=""><a href="#spec" data-toggle="tab">Specifications</a></li>
            </ul>
        </nav>
        
        <div class="tab-content">
            <div class="tab-pane active" id="desc">				
                <?php the_content(); ?>     
            </div>
            <div class="fade tab-pane" id="spec">
                <?php the_field('specifications'); ?>
            </div>
            <div class="fade tab-pane" id="map">
                <!-- no map -->
            </div>
        </div>
    </section>	
		
</article>

<?php get_footer(); ?>