<?php
/**
 * SJI-underscore functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package SJI-underscore
 */

if ( ! function_exists( 'sji_underscore_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function sji_underscore_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on SJI-underscore, use a find and replace
	 * to change 'sji-underscore' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'sji-underscore', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'sji-underscore' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'sji_underscore_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'sji_underscore_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function sji_underscore_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'sji_underscore_content_width', 640 );
}
add_action( 'after_setup_theme', 'sji_underscore_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function sji_underscore_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar 1', 'sji-underscore' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Front Page Features', 'sji-underscore' ),
		'id'            => 'sidebar-2',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class=" gallery-item %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'sji_underscore_widgets_init' );

/**
 * add a custom template
 * 
 * In addition to this filter, you must create a file named my_new_template.php in a /fpw2_views/ folder in the active child or parent theme
 * 
 * @param	$templates	array	slug => label pairs of templates
 */
function sji_underscore_add_widget_template( $templates ) {
	$templates['frontpage'] = __( 'Front Page', 'sji-underscore-widget' );
	return $templates;
}
add_filter( 'fpw_widget_templates', 'sji_underscore_add_widget_template' );

if ( ! function_exists( 'sji_underscore_fonts_url' ) ) :
/**
 * Register Google fonts for Twenty Sixteen.
 *
 * Create your own twentysixteen_fonts_url() function to override in a child theme.
 *
 * @since Twenty Sixteen 1.0
 *
 * @return string Google fonts URL for the theme.
 */
function sji_underscore_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';
	/* translators: If there are characters in your language that are not supported by Merriweather, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Gentium Bok Basic font: on or off', 'sji_underscore' ) ) {
		$fonts[] = 'Gentium Book Basic:400,700,400italic,700italic';
	}

	/* translators: If there are characters in your language that are not supported by Montserrat, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Open Sans font: on or off', 'sji_underscore' ) ) {
		$fonts[] = 'Open Sans:400,700,800';
	}

	/* translators: If there are characters in your language that are not supported by Montserrat, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Lato font: on or off', 'sji_underscore' ) ) {
		$fonts[] = 'Lato:300,400,700';
	}

	/* translators: If there are characters in your language that are not supported by Inconsolata, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Inconsolata font: on or off', 'sji_underscore' ) ) {
		$fonts[] = 'Inconsolata:400';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;
}
endif;

/**
 * Enqueue scripts and styles.
 */
function sji_underscore_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'sji_underscore-fonts', sji_underscore_fonts_url(), array(), null );
	
	wp_enqueue_style( 'sji-underscore-style', get_template_directory_uri() . '/css/style.css' );

	wp_enqueue_script( 'sji-underscore-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'sji-underscore-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'sji_underscore_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

function front_page_remove_media_controls() {
  global $post_ID;
  if($post_ID == get_option('page_on_front')) {
    remove_action( 'media_buttons', 'media_buttons' );
  }
}
 add_action('admin_head','front_page_remove_media_controls');
 
if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_front-page-feature',
		'title' => 'Front Page Feature',
		'fields' => array (
			array (
				'key' => 'field_56a63c027aa16',
				'label' => 'Front Page Feature',
				'name' => 'front_page_feature',
				'type' => 'textarea',
				'instructions' => 'Short Description or Information of the promoted page or post. There is a 200 character limit.',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => 200,
				'rows' => 3,
				'formatting' => 'br',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'page',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
					'order_no' => 0,
					'group_no' => 1,
				),
			),
		),
		'options' => array (
			'position' => 'side',
			'layout' => 'default',
			'hide_on_screen' => array (
				0 => 'excerpt',
			),
		),
		'menu_order' => 0,
	));
}

add_filter('get_the_archive_title', 'remove_category_tag_from_title');
function remove_category_tag_from_title($title) {
  if( is_category() ) {
    $title = single_cat_title('', false);
  } elseif ( is_tag() ) {
    $title = single_tag_title('', false);
  } elseif ( is_author() ) {
    $title = '<span class="vcard">' . get_the_author() . '</span>';
  }
  return $title;
}

function get_parent_slug() {
  global $post;
  if($post->post_parent == 0) return '';
  $post_parent_data = get_post($post->post_parent);
  return $post_parent_data->post_name;
}

/**
 * add a post type that can be featured in the Feature a Page Widget
 * 
 * Any post types added via this filter automatically have support added for excerpts and featured images
 * 
 * This example adds the ability to feature the "book" post type
 * 
 * @param	$post_types	array	array of post_type slugs that can be featured with the widget
 */
add_filter( 'fpw_post_types', 'fpw_add_post_type_to_feature' );
function fpw_add_post_type_to_feature( $post_types ) {
	array_push($post_types, 'program', 'project');
	return $post_types;
}

function sort_by_custom_date($query) {
  if($query->is_archive()) {
    $query->set('orderby','meta_value_num');
    $query->set('meta_key','wpcf-post-date');
    $query->set('order','ASC');
  }
  return $query;
}
add_action( 'pre_get_posts', 'sort_by_custom_date' );
