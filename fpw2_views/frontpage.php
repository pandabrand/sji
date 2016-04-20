<?php
/**
 * "Front Page" Layout Template File
 * 
 * DO NOT MODIFY THIS FILE!
 * 
 * To override, copy the /fpw2_views/ folder to your active theme's folder.
 * Modify the file in the theme's folder and the plugin will use it.
 * See: http://wordpress.org/extend/plugins/feature-a-page-widget/faq/
 * 
 * Note: Feature a Page Widget provides a variety of filters and options that may alter the output of the_title, the_excerpt, and the_post_thumbnail in this template.
 */
?>

<article class="fpw-clearfix fpw-layout-front-page">

	<a href="<?php the_permalink(); ?>" class="fpw-featured-link">
		<?php 
		  $post_id = get_the_id();
		  if (has_post_thumbnail( $post_id ) ):
		  $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'single-post-thumbnail' );
		?>
    	  <div class="fpw-featured-image" style="background: url('<?php echo $image[0]; ?>') no-repeat top left; background-size: cover; position: relative;">
		<?php else: ?>
	      <div class="fpw-featured-image">
		<?php endif; ?>
		</div>
		<div class="fpw-excerpt">
		  <h3 class="fpw-page-title"><?php the_title(); ?></h3>
			<?php echo the_field('front_page_feature'); ?>
		</div>

	</a>	

</article>