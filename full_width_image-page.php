<?php
/**
 *
 * Template Name: Full Width Image
 *
 * @package SJI-underscore
 */

get_header(); ?>

	<?php 
	  if (has_post_thumbnail( $post->ID ) ):
	  $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
	?>
	  <div class="full-width-featured-image" style="background: url('<?php echo $image[0]; ?>') no-repeat center center; background-size: contain; position: relative; height:20em; margin-top: 1em;">
	  </div>
	<?php endif ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'full_width_image' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
