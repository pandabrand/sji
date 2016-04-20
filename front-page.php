<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package SJI-underscore
 */

get_header('frontpage'); ?>

	<div id="primary">
		<main id="main" role="main">
			<?php
			  while ( have_posts() ) : the_post();
			?>

			  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				  <header class="entry-header front-page-header">
					  <!--  ?php the_title( '<h1 class="entry-title">', '</h1>' ); ? -->
				  </header><!-- .entry-header -->

				  <?php 
				    if (has_post_thumbnail( $post->ID ) ):
				    $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
				  ?>
    			    <div class="front-featured-image" style="background: url('<?php echo $image[0]; ?>') no-repeat center center fixed; background-size: cover; position: relative;">
    			  <?php else: ?>
    			    <div class="entry-content">
    			  <?php endif ?>
    			    <div id="front-page-text">
					  <?php
						  the_content();
					  ?>
					</div><!-- #front-page-text -->
				  </div><!-- .entry-content -->

				  <footer class="entry-footer">
					  <?php
						  edit_post_link(
							  sprintf(
								  /* translators: %s: Name of current post */
								  esc_html__( 'Edit %s', 'sji-underscore' ),
								  the_title( '<span class="screen-reader-text">"', '"</span>', false )
							  ),
							  '<span class="edit-link">',
							  '</span>'
						  );
					  ?>
				  </footer><!-- .entry-footer -->
			  </article><!-- #post-## -->

		   <?php
			 endwhile; // End of the loop.
		   ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar('frontbar');
get_footer('frontpage');
