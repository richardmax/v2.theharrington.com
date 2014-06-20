<?php get_header(); ?>

<nav class="span2 secondaryNav">
    <?php wp_nav_menu(array('menu' => 'Side Menu')); ?>
</nav>




 <?php get_template_part('menu-filter-view') ?>
 
 <?php //get_template_part('menu-filter-query') ?>
   
<div class="span10">
    <ul class="thumbnails nav">    
        <?php	$args = array(
					//'authors'      => '',
					//'child_of'     => 0,
					//'date_format'  => get_option('date_format'),
					'depth'        => 0,
					'echo'         => 1,
					//'exclude'      => '',
					//'include'      => '',
					//'link_after'   => '',
					//'link_before'  => '',
					'post_type'    => 'properties',
					'post_status'  => 'publish',
					//'show_date'    => '',
					'sort_column'  => 'menu_order',
					//'sort_order'   => '',
					'title_li'     => __(''), 
					'walker'       => new Thumbnail_walker(),
				);
				wp_list_pages($args); ?>
     </ul>
	<?php bootstrapwp_content_nav('nav-below');?>
    </div>
    

            
<?php get_footer(); ?>