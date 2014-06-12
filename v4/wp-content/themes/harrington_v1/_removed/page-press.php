<?php get_header(); ?>
			
		<nav class=" span2 secondaryNav">
			<?php wp_nav_menu2(array('menu' => 'mainmenu','walker' => new Residency_Walker));?>

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
							$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );	
							$image_attributes = wp_get_attachment_image_src( $attachment->ID, 'thumbnail' )  ? wp_get_attachment_image_src( $attachment->ID, 'thumbnail' ) : wp_get_attachment_image_src( $attachment->ID, 'full' );

							echo '<img src="' . $url . '" class="span3" alt="photo" align="left">';
						}
					}
				}
					global $post;
					$query = new WP_Query(array('post_type' => 'press'));
					

					
				?>
				<h1>Press</h1>
				<ul class="press">
				<?php if ($query->have_posts()) while ($query->have_posts()) : $query->the_post(); 
								$date = get_post_meta( $post->ID,'articlepubtime');
								$content = get_post_meta( $post->ID,'articlecontent');
								$paper = get_post_meta( $post->ID,'paper');
				?>
					<li>
						<article class="row-fluid press-snippet">
							<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><?php echo_first_image($post->ID); ?></a>
							<div class="span9">
								<h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><?php echo $post->post_title; ?></a></h2>
								<p class="subtitle"><?php echo $paper[0]; ?> - <?php echo $date[0]; ?></p>

								<p><?php echo get_the_excerpt(); ?></p>
								<a href="<?php the_permalink(); ?>" class="span3 offset9 btn readmore">Read More</a>
								
							</div>
						</article>
					</li>
				<?php endwhile; ?>
				</ul>
		</section>





<?php get_footer(); ?>