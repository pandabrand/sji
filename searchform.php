<?php
/**
 * Template for displaying search forms in Twenty Sixteen
 *
 * @package WordPress
 * @subpackage SJI Underscore
 */
?>

<form role="search" method="get" id="searchform" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php echo _x( 'Search for:', 'label', 'sji_underscore' ); ?></span>
		<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'sji_unserscore' ); ?>" value="<?php echo get_search_query(); ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label', 'sji_unserscore' ); ?>" />
	</label>
	<input type="submit" id="searchsubmit" value="&#xf179;" />
	<!--
	<button type="submit" class="search-submit" value"><span class="screen-reader-text"><?php echo _x( 'Search', 'submit button', 'sji_unserscore' ); ?></span></button>
	-->
</form>
