<?php

function simplaq_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );

	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);
	add_theme_support(
		'custom-background',
		apply_filters(
			'damnn_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	add_theme_support( 'customize-selective-refresh-widgets' );
}
add_action( 'after_setup_theme', 'simplaq_setup' );


add_action( 'after_setup_theme', function(){
	register_nav_menus( [
		'header_menu' => 'Меню в шапке',
	] );
} );


add_action( 'wp_enqueue_scripts', 'add_my_scripts' );    // Фронт
function add_my_scripts(){
     wp_enqueue_style( 'main', get_stylesheet_uri() );
	 wp_enqueue_style( 'style.min', get_template_directory_uri() . '/css/style.min.css');	
	 wp_deregister_style ('admin-bar-css');
	 wp_deregister_style ('wp-block-library');
	 wp_deregister_style ('global-styles-inline');
	  wp_deregister_script( 'jquery' );
		// wp_enqueue_script("jquery");
	 wp_deregister_script( 'jquery-migrate');
	wp_enqueue_script('main-min', get_stylesheet_directory_uri() . '/js/app.min.js', array(), false, true);
}
remove_action( 'wp_enqueue_scripts', 'wp_enqueue_global_styles' );
remove_action( 'wp_footer', 'wp_enqueue_global_styles', 1 );

// if( function_exists('acf_add_options_page') ) {
	
// 	acf_add_options_sub_page(array(
// 			'page_title'    => 'Theme Header Settings',
// 			'menu_title'    => 'Header',
// 	));
	
// 	acf_add_options_sub_page(array(
// 			'page_title'    => 'Theme Footer Settings',
// 			'menu_title'    => 'Footer',
// 	));
	
// }

add_filter( 'upload_mimes', 'svg_upload_allow' );

# Добавляет SVG в список разрешенных для загрузки файлов.
function svg_upload_allow( $mimes ) {
	$mimes['svg']  = 'image/svg+xml';

	return $mimes;
}

add_filter( 'wp_check_filetype_and_ext', 'fix_svg_mime_type', 10, 5 );

# Исправление MIME типа для SVG файлов.
function fix_svg_mime_type( $data, $file, $filename, $mimes, $real_mime = '' ){

	// WP 5.1 +
	if( version_compare( $GLOBALS['wp_version'], '5.1.0', '>=' ) ){
		$dosvg = in_array( $real_mime, [ 'image/svg', 'image/svg+xml' ] );
	}
	else {
		$dosvg = ( '.svg' === strtolower( substr( $filename, -4 ) ) );
	}

	// mime тип был обнулен, поправим его
	// а также проверим право пользователя
	if( $dosvg ){

		// разрешим
		if( current_user_can('manage_options') ){

			$data['ext']  = 'svg';
			$data['type'] = 'image/svg+xml';
		}
		// запретим
		else {
			$data['ext']  = false;
			$data['type'] = false;
		}

	}

	return $data;
}

function cptui_register_my_taxes() {

	/**
	 * Taxonomy: Featured.
	 */

	$labels = [
		"name" => esc_html__( "Featured", "custom-post-type-ui" ),
		"singular_name" => esc_html__( "Featured", "custom-post-type-ui" ),
	];

	
	$args = [
		"label" => esc_html__( "Featured", "custom-post-type-ui" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'featured-tax', 'with_front' => true,  'hierarchical' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "featured-tax",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => false,
		"sort" => false,
		"show_in_graphql" => false,
	];
	register_taxonomy( "featured-tax", [ "post" ], $args );
}
add_action( 'init', 'cptui_register_my_taxes' );