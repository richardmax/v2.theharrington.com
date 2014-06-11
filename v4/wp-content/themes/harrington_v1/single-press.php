<?php get_header(); 
$postid = get_query_var('name');

?>
			
		<nav class=" span2 secondaryNav">
			<?php wp_nav_menu2(array('menu' => 'mainmenu','walker' => new Residency_Walker_Press));?>

		</nav>	
		<section class="span10">
		
		<?php function echo_first_image($postID   ) {
					$args = array(
						'numberposts' => 1,
						'order' => 'ASC',
						'post_mime_type' => 'image',
						'post_parent' => $postID,
						'post_status' => null,
						'post_type' => 'attachment',
					);
					$attachments = get_children( $args );
					if ( $attachments ) {
						foreach ( $attachments as $attachment ) {
							$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID),'thumbnail' );
							$image_attributes = wp_get_attachment_image_src( $attachment->ID, 'thumbnail' )  ? wp_get_attachment_image_src( $attachment->ID, 'thumbnail' ) : wp_get_attachment_image_src( $attachment->ID, 'full' );

							echo '<img style="width:100px;height:100px;padding:20px;" src="' . $url . '" class="span3" alt="photo" align="left">';
						}
					}
					wp_reset_postdata();
					
				}
					global $post;
					$query = new WP_Query(array('post_type' => 'press','name'=>$postid));
				?>
				<h1>Press</h1>
				<span><a href="/fin-ex/press/">Go back to articles</a></span>
				<div class="press">
				<?php  while ($query->have_posts()) : $query->the_post(); 
				//setup_postdata($post);
								$date = get_post_meta( $post->ID,'articlepubtime');
								$content = get_post_meta( $post->ID,'articlecontent');
								$paper = get_post_meta( $post->ID,'paper');
				?>
					
						<div class="">
							<div class="span9">
								<h3 style="padding-top:20px;"><?php echo $post->post_title; ?></h3>
								<p class="subtitle"><?php echo $paper[0]; ?> - <?php echo $date[0]; ?></p>
							</div>
								
							<div class="span9">
								<?php echo apply_filters('the_content',$content[0]);//echo $content[0]; ?>
																
							</div>
						</div>
					
				<?php endwhile; wp_reset_query();?>
				</div>
		</section>
		




<?php get_footer(); ?>