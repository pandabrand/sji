<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package SJI-underscore
 */

if ( ! is_active_sidebar( 'sidebar-2' ) ) {
	return;
}
?>
<aside id="tertiary" class="gallery gallery-columns-m-2 gallery-columns-2" role="complementary">
	<?php dynamic_sidebar( 'sidebar-2' ); ?>
</aside><!-- #tertiary -->
