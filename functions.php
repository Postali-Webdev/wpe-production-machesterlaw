<?php
add_action('after_setup_theme', 'blankslate_setup');
function blankslate_setup() {
    load_theme_textdomain('blankslate', get_template_directory() . '/languages');
    add_theme_support('automatic-feed-links');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array('search-form'));
    global $content_width;
    if (!isset($content_width)) {
     $content_width = 1920;
    }
    register_nav_menus(array('main-menu' => esc_html__('Main Menu', 'blankslate')));
}
add_filter('document_title_separator', 'blankslate_document_title_separator');
function blankslate_document_title_separator($sep) {
    $sep = '|';
    return $sep;
}

add_filter('the_title', 'blankslate_title');

function blankslate_title($title) {
    if ($title == '') {
        return '';
    } else {
        return $title;
    }
}

add_filter('the_content_more_link', 'blankslate_read_more_link');

function blankslate_read_more_link() {
    if (!is_admin()) {
  //      return ' <a href="' . esc_url(get_permalink()) . '" class="more-link"> </a>';   
    }
}

add_filter('excerpt_more', 'blankslate_excerpt_read_more_link');

function blankslate_excerpt_read_more_link($more) {
    if (!is_admin()) {
        global $post;
     //   return ' <a href="' . esc_url(get_permalink($post->ID)) . '" class="more-link"> </a>';
    }
}

add_filter('intermediate_image_sizes_advanced', 'blankslate_image_insert_override');

function blankslate_image_insert_override($sizes) {
    unset($sizes['medium_large']);
    return $sizes;
}

add_action('widgets_init', 'blankslate_widgets_init');

function blankslate_widgets_init() {
    register_sidebar(array(
        'name' => esc_html__('Sidebar', 'blankslate'),
        'id' => 'primary-widget-area',
        'before_title' => '<div class="widget-title">',
        'after_title' => '</div>',
    ));
}

add_action('wp_head', 'blankslate_pingback_header');

function blankslate_pingback_header() {
    if (is_singular() && pings_open()) {
        printf('<link rel="pingback" href="%s" />' . "\n", esc_url(get_bloginfo('pingback_url')));
    }
}


function wpdocs_custom_excerpt_length($length) {
    global $post;
	
    if ($post->post_type == 'testimonials') 
	        return 18;
   	elseif($post->post_type == 'team') 
	return 25;
	else 
        return 20;
	
}


add_filter('excerpt_length', 'wpdocs_custom_excerpt_length', 999);

/**
 * 
 *  Function to Enqueue(Add) Scripts and Styles Files
 */
// Load the theme stylesheets
function theme_styles() {

 wp_enqueue_style('font-awesome', get_template_directory_uri() .'/fonts/fonts.css');
 wp_enqueue_style('bootstrap', get_template_directory_uri() .'/css/bootstrap.min.css');

 // if (is_front_page()) {  }
 
wp_enqueue_style('owl', get_template_directory_uri() .'/css/owl.carousel.min.css');
wp_enqueue_style('owl-default', get_template_directory_uri() .'/css/owl.theme.default.css');
 
wp_enqueue_style('style', get_template_directory_uri() .'/style.css');

 if (wp_is_mobile()) { 
   wp_enqueue_style('mobile-css', get_template_directory_uri() .'/css/mobile.css');
}

}

add_action('wp_enqueue_scripts', 'theme_styles');





// Load the theme jQuery Scripts
function machesterlaw_scripts() {
 

 wp_enqueue_script('jquery-js', get_template_directory_uri() . '/js/jquery.min.js');	    
wp_enqueue_script('light-box', get_template_directory_uri() . '/js/html5lightbox.js');
 wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js');
// if (is_front_page()) {  }
 
wp_enqueue_script('my-script', get_template_directory_uri() . '/js/owl.carousel.min.js');
 
wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js');     

} 

add_action('wp_footer', 'machesterlaw_scripts');

//* Remove type tag from script and style
add_filter('style_loader_tag', 'codeless_remove_type_attr', 10, 2);
add_filter('script_loader_tag', 'codeless_remove_type_attr', 10, 2);
add_filter('autoptimize_html_after_minify', 'codeless_remove_type_attr', 10, 2);
function codeless_remove_type_attr($tag, $handle)
{
    return preg_replace("/type=['\"]text\/(javascript|css)['\"]/", '', $tag);
}


/**
 * Clean up output of stylesheet <link> tags
 */
function clean_style_tag($input) {
    preg_match_all("!<link rel='stylesheet'\s?(id='[^']+')?\s+href='(.*)' type='text/css' media='(.*)' />!", $input, $matches);
    if (empty($matches[2])) {
        return $input; 
    }
	
    // Only display media if it is meaningful
    $media = $matches[3][0] !== '' && $matches[3][0] !== 'all' ? ' media="' . $matches[3][0] . '"' : '';
    return '<link rel="stylesheet" href="' . $matches[2][0] . '"' . $media . '>' . "\n";
}
/**
 * Clean up output of <script> tags
 */
function clean_script_tag($input) {
    $input = str_replace("type='text/javascript' ", '', $input);
    return str_replace("'", '"', $input);
}
 


/* hide admin bar 
function hide_admin_bar(){ return false; }
add_filter( 'show_admin_bar', 'hide_admin_bar' );
*/ 

/* Remove inline  height post thumnail */
add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10, 3 );
function remove_thumbnail_dimensions( $html, $post_id, $post_image_id ) {
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    return $html;
}


function is_blog () {
        global  $post;
        $posttype = get_post_type($post );
        return ( ((is_archive()) || (is_author()) || (is_category()) 
		|| (is_home()) || (is_single()) 
		|| (is_tag())) && ( $posttype == 'post') ) ? true : false ;
  }


// custom post type function for our team
function custom_post_type_team() {
	$labels = array(
		'name'                  => _x( 'Team', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'team', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Team', 'text_domain' ),
		'name_admin_bar'        => __( 'Post Type', 'text_domain' ),
		'archives'              => __( 'Item Archives', 'text_domain' ),
		'attributes'            => __( 'Item Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'All Items', 'text_domain' ),
		'add_new_item'          => __( 'Add New Item', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Item', 'text_domain' ),
		'edit_item'             => __( 'Edit Item', 'text_domain' ),
		'update_item'           => __( 'Update Item', 'text_domain' ),
		'view_item'             => __( 'View Item', 'text_domain' ),
		'view_items'            => __( 'View Items', 'text_domain' ),
		'search_items'          => __( 'Search Item', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$rewrite = array(
		'slug'                  => 'team',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);  
	$args = array(
		'label'                 => __( 'Team', 'text_domain' ),
		'description'           => __( 'Team', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'trackbacks', 'revisions', 'custom-fields', 'page-attributes', 'post-formats' ),
		'taxonomies'            => array( 'category' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type'       => 'page',
	);
	register_post_type( 'team', $args );

}
add_action( 'init', 'custom_post_type_team', 0 );



// custom post type function for our team Spanish
function custom_post_type_team_Spanish() {
	$labels = array(
		'name'                  => _x( 'Team Spanish', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'team Spanish', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Team Spanish', 'text_domain' ),
		'name_admin_bar'        => __( 'Post Type', 'text_domain' ),
		'archives'              => __( 'Item Archives', 'text_domain' ),
		'attributes'            => __( 'Item Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'All Items', 'text_domain' ),
		'add_new_item'          => __( 'Add New Item', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Item', 'text_domain' ),
		'edit_item'             => __( 'Edit Item', 'text_domain' ),
		'update_item'           => __( 'Update Item', 'text_domain' ),
		'view_item'             => __( 'View Item', 'text_domain' ),
		'view_items'            => __( 'View Items', 'text_domain' ),
		'search_items'          => __( 'Search Item', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$rewrite = array(
		'slug'                  => 'es/team',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);  
	$args = array(
		'label'                 => __( 'Team Spanish', 'text_domain' ),
		'description'           => __( 'Team Spanish', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'trackbacks', 'revisions', 'custom-fields', 'page-attributes', 'post-formats' ),
		'taxonomies'            => array( 'category' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type'       => 'page',
	);
	register_post_type( 'team_spanish', $args );

}
add_action( 'init', 'custom_post_type_team_spanish', 0 );




// custom post type function for our reviews
function custom_post_type_testimonials() {

	$labels = array(
		'name'                  => _x( 'Testimonials', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Testimonials', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Testimonials', 'text_domain' ),
		'name_admin_bar'        => __( 'Post Type', 'text_domain' ),
		'archives'              => __( 'Item Archives', 'text_domain' ),
		'attributes'            => __( 'Item Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'All Items', 'text_domain' ),
		'add_new_item'          => __( 'Add New Item', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Item', 'text_domain' ),
		'edit_item'             => __( 'Edit Item', 'text_domain' ),
		'update_item'           => __( 'Update Item', 'text_domain' ),
		'view_item'             => __( 'View Item', 'text_domain' ),
		'view_items'            => __( 'View Items', 'text_domain' ),
		'search_items'          => __( 'Search Item', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$rewrite = array(
		'slug'                  => 'testimonials',     
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,   
	);
	$args = array(
		'label'                 => __( 'Client testimonials', 'text_domain' ),
		'description'           => __( 'Client testimonials', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'trackbacks', 'revisions', 'custom-fields', 'page-attributes', 'post-formats', 'excerpt' ), 
		'taxonomies'            => array( 'category' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type'       => 'page',
	);
	register_post_type( 'testimonials', $args );

}
add_action( 'init', 'custom_post_type_testimonials', 0 );




// custom post type function for our reviews in  Spanish
function custom_post_type_testimonials_spanish() {

	$labels = array(
		'name'                  => _x( 'Testimonials Spanish', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Testimonials Spanish', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Testimonials Spanish', 'text_domain' ),
		'name_admin_bar'        => __( 'Post Type', 'text_domain' ),
		'archives'              => __( 'Item Archives', 'text_domain' ),
		'attributes'            => __( 'Item Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'All Items', 'text_domain' ),
		'add_new_item'          => __( 'Add New Item', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Item', 'text_domain' ),
		'edit_item'             => __( 'Edit Item', 'text_domain' ),
		'update_item'           => __( 'Update Item', 'text_domain' ),
		'view_item'             => __( 'View Item', 'text_domain' ),
		'view_items'            => __( 'View Items', 'text_domain' ),
		'search_items'          => __( 'Search Item', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$rewrite = array(
		'slug'                  => 'es_testimonial',     
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,  
	);
	$args = array(
		'label'                 => __( 'Client testimonials Spanish', 'text_domain' ),
		'description'           => __( 'Client testimonials Spanish', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'trackbacks', 'revisions', 'custom-fields', 'page-attributes', 'post-formats', 'excerpt' ), 
		'taxonomies'            => array( 'category' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type'       => 'page',
	);
	register_post_type( 'testimonials-spanish', $args );  

}
add_action( 'init', 'custom_post_type_testimonials_spanish', 0 );






// custom post type function for our case results
function custom_post_type_results() {

	$labels = array(
		'name'                  => _x( 'Case Results', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Case Results', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Case Results', 'text_domain' ),
		'name_admin_bar'        => __( 'Post Type', 'text_domain' ),
		'archives'              => __( 'Item Archives', 'text_domain' ),
		'attributes'            => __( 'Item Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'All Items', 'text_domain' ),
		'add_new_item'          => __( 'Add New Item', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Item', 'text_domain' ),
		'edit_item'             => __( 'Edit Item', 'text_domain' ),
		'update_item'           => __( 'Update Item', 'text_domain' ),
		'view_item'             => __( 'View Item', 'text_domain' ),
		'view_items'            => __( 'View Items', 'text_domain' ),
		'search_items'          => __( 'Search Item', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$rewrite = array(
		'slug'                  => 'case_results',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'label'                 => __( 'Case Results', 'text_domain' ),
		'description'           => __( 'Case Results', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'trackbacks', 'revisions', 'custom-fields', 'page-attributes', 'post-formats' ),
		'taxonomies'            => array( 'category' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite, 
		'capability_type'       => 'page',
	);
	register_post_type( 'results', $args );

}
add_action( 'init', 'custom_post_type_results', 0 );


// custom post type function for our case results  spanish
function custom_post_type_results_spanish() {
	$labels = array(
		'name'                  => _x( 'Case Results Spanish', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Case Results Spanish', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Case Results Spanish', 'text_domain' ),
		'name_admin_bar'        => __( 'Post Type', 'text_domain' ),
		'archives'              => __( 'Item Archives', 'text_domain' ),
		'attributes'            => __( 'Item Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'All Items', 'text_domain' ),
		'add_new_item'          => __( 'Add New Item', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Item', 'text_domain' ),
		'edit_item'             => __( 'Edit Item', 'text_domain' ),
		'update_item'           => __( 'Update Item', 'text_domain' ),
		'view_item'             => __( 'View Item', 'text_domain' ),
		'view_items'            => __( 'View Items', 'text_domain' ),
		'search_items'          => __( 'Search Item', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$rewrite = array(
		'slug'                  => 'es/case_results',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'label'                 => __( 'Case Results Spanish', 'text_domain' ),
		'description'           => __( 'Case Results Spanish', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'trackbacks', 'revisions', 'custom-fields', 'page-attributes', 'post-formats' ),
	'taxonomies'            => array( 'category' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type'       => 'page',
	);
	register_post_type( 'results_spanish', $args );

}
add_action( 'init', 'custom_post_type_results_spanish', 0 );







// custom post type function for our Faq
function custom_post_type_faqs() {

	$labels = array(
		'name'                  => _x( 'Faq', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Faq', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Faq', 'text_domain' ),
		'name_admin_bar'        => __( 'Post Type', 'text_domain' ),
		'archives'              => __( 'Item Archives', 'text_domain' ),
		'attributes'            => __( 'Item Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'All Items', 'text_domain' ),
		'add_new_item'          => __( 'Add New Item', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Item', 'text_domain' ),
		'edit_item'             => __( 'Edit Item', 'text_domain' ),
		'update_item'           => __( 'Update Item', 'text_domain' ),
		'view_item'             => __( 'View Item', 'text_domain' ),
		'view_items'            => __( 'View Items', 'text_domain' ),
		'search_items'          => __( 'Search Item', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$rewrite = array(
		'slug'                  => 'faqs',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,  
	);
	
	
	

	
	
	
	$args = array(
	
	
	 "label" => __('FAQS', ''),
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => false,
        "rest_base" => "",
        "has_archive" => false,
        "show_in_menu" => true,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => true,
        "rewrite" => array("slug" => "faqs", "with_front" => true),
        "query_var" => true,
        "supports" => array("title", "editor", "thumbnail", "excerpt"),
	
	
		/* 'label'                 => __( 'Faq', 'text_domain' ),
		'description'           => __( 'Faq', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'trackbacks', 'revisions', 'custom-fields', 'page-attributes', 'post-formats' ),
		'taxonomies'            => array( 'faq-category' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type'       => 'page',  */
	);
	
	register_post_type( 'faqs', $args );

}
add_action( 'init', 'custom_post_type_faqs', 0 );



/** Taxonomy: FAQ Categories.   */
    $labels = array(
        "name" => __('FAQ Categories', ''),
        "singular_name" => __('FAQ Category', ''),
    );

    $args = array(
        "label" => __('FAQ Categories', ''),
        "labels" => $labels,
        "public" => true,
        "hierarchical" => true,
        "label" => "FAQ Categories",
        "show_ui" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true, 
        "query_var" => true,
        "rewrite" => array('slug' => 'faq-category', 'with_front' => true, 'hierarchical' => true,),
        "show_admin_column" => true,
        "show_in_rest" => true,
        "rest_base" => "",
        "show_in_quick_edit" => true,
    );
    register_taxonomy("faq-category", array("faqs"), $args);







// custom post type function for our Faq-spanish
function custom_post_type_faqs_spanish() {
	$labels = array(
		'name'                  => _x( 'Faq Spanish', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Faq Spanish', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Faq Spanish', 'text_domain' ),
		'name_admin_bar'        => __( 'Post Type', 'text_domain' ),
		'archives'              => __( 'Item Archives', 'text_domain' ),
		'attributes'            => __( 'Item Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'All Items', 'text_domain' ),
		'add_new_item'          => __( 'Add New Item', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Item', 'text_domain' ),
		'edit_item'             => __( 'Edit Item', 'text_domain' ),
		'update_item'           => __( 'Update Item', 'text_domain' ),
		'view_item'             => __( 'View Item', 'text_domain' ),
		'view_items'            => __( 'View Items', 'text_domain' ),
		'search_items'          => __( 'Search Item', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$rewrite = array(
		'slug'                  => '/es/faqs',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'label'                 => __( 'Faq Spanish', 'text_domain' ),
		'description'           => __( 'Faq Spanish', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'trackbacks', 'revisions', 'custom-fields', 'page-attributes', 'post-formats' ),
		'taxonomies'            => array( 'category' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type'       => 'page',
	);
	register_post_type( 'faqs_spanish', $args );

}
add_action( 'init', 'custom_post_type_faqs_spanish', 0 );





// custom post type function for our blog-post-spanish
function custom_post_type_blog_spanish() {
	$labels = array(
		'name'                  => _x( 'Blog Spanish', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Blog Spanish', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Blog Spanish', 'text_domain' ),
		'name_admin_bar'        => __( 'Post Type', 'text_domain' ),
		'archives'              => __( 'Item Archives', 'text_domain' ),
		'attributes'            => __( 'Item Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'All Items', 'text_domain' ),
		'add_new_item'          => __( 'Add New Item', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Item', 'text_domain' ),
		'edit_item'             => __( 'Edit Item', 'text_domain' ),
		'update_item'           => __( 'Update Item', 'text_domain' ),
		'view_item'             => __( 'View Item', 'text_domain' ),
		'view_items'            => __( 'View Items', 'text_domain' ),
		'search_items'          => __( 'Search Item', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$rewrite = array(
		'slug'                  => '/es/blog',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'label'                 => __( 'blog Spanish', 'text_domain' ),
		'description'           => __( 'blog Spanish', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'trackbacks', 'revisions', 'custom-fields', 'page-attributes', 'post-formats' ),
		'taxonomies'            => array( 'category' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 2,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type'       => 'page',
	);
	register_post_type( 'blog_spanish', $args );

}
add_action( 'init', 'custom_post_type_blog_spanish', 0 );

// Our custom post type function for nap
function create_posttype() {
    register_post_type('nap',
            // CPT Options
            array(
        'labels' => array(
            'name' => __('NAP'),
            'singular_name' => __('NAP')
        ),
        'public' => true,
        'has_archive' => false,
		'exclude_from_search' => true,
        'rewrite' => array('slug' => 'nap'),
        'supports' => array('title', 'editor', 'thumbnail'),
    ));
}

add_action('init', 'create_posttype');

/* new theme options for header and footer */
if (function_exists('acf_add_options_page')) {

    acf_add_options_page(array(
        'page_title' => 'Theme General Settings',
        'menu_title' => 'Theme Settings',
        'menu_slug' => 'theme-general-settings',
        'capability' => 'edit_posts',
        'redirect' => false
    ));
}

/* * **********Ipad Function************* */
add_filter('wp_is_mobile', 'mobile_edits');

function mobile_edits() {
    static $is_mobile;
 
    if (isset($is_mobile))
        return $is_mobile;

    if (empty($_SERVER['HTTP_USER_AGENT'])) {
        $is_mobile = false;
    } elseif (
            strpos($_SERVER['HTTP_USER_AGENT'], 'Android') !== false || strpos($_SERVER['HTTP_USER_AGENT'], 'Silk/') !== false || strpos($_SERVER['HTTP_USER_AGENT'], 'Kindle') !== false || strpos($_SERVER['HTTP_USER_AGENT'], 'BlackBerry') !== false || strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mini') !== false) {
        $is_mobile = true;
    } elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'Mobile') !== false && strpos($_SERVER['HTTP_USER_AGENT'], 'iPad') == false) {
        $is_mobile = true;
    } elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'iPad') !== false) {
        $is_mobile = false;
    } else {
        $is_mobile = false;
    }

    return $is_mobile;
}

/* for yoast website schema */
function bybe_remove_yoast_json($data) {
    $data = array();
    return $data;
}
add_filter('wpseo_json_ld_output', 'bybe_remove_yoast_json', 10, 1);


// Most Popular by view
function wpb_set_post_views($postID) {
   $count_key = 'wpb_post_views_count';
   $count = get_post_meta($postID, $count_key, true);
   if ($count == '') {
       $count = 0;
       delete_post_meta($postID, $count_key);
       add_post_meta($postID, $count_key, '0');
   } else {
       $count++;
       update_post_meta($postID, $count_key, $count);
   }
}

//To keep the count accurate, lets get rid of prefetching
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
function wpb_track_post_views($post_id) {
   if (!is_single())
       return;
   if (empty($post_id)) {
       global $post;
       $post_id = $post->ID;
   }
   wpb_set_post_views($post_id);
}

add_action('wp_head', 'wpb_track_post_views');     

function theme_get_archives_link ( $link_html ) {
 global $wp;
 static $current_url;
 if ( empty( $current_url ) ) {
     $current_url = add_query_arg( $_SERVER['QUERY_STRING'], '', home_url( $wp->request ) );
 }
 if ( stristr( $link_html, $current_url ) !== false ) {
     $link_html = preg_replace( '/(<[^\s>]+)/', '\1 class="active"', $link_html, 1 );
 }
 return $link_html;
 }
 add_filter('get_archives_link', 'theme_get_archives_link');
 
 
 
 
 /* remove dashicons front end 
 
add_action( 'wp_print_styles',     'my_deregister_styles', 100 );
function my_deregister_styles()    { 
   wp_deregister_style( 'dashicons' );   
}
 */


/*  Disable the emoji's */
function disable_emojis() {
 remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
 remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
 remove_action( 'wp_print_styles', 'print_emoji_styles' );
 remove_action( 'admin_print_styles', 'print_emoji_styles' ); 
 remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
 remove_filter( 'comment_text_rss', 'wp_staticize_emoji' ); 
 remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
 add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
 add_filter( 'wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2 );
}
add_action( 'init', 'disable_emojis' );

function disable_emojis_tinymce( $plugins ) {
 if ( is_array( $plugins ) ) {
 return array_diff( $plugins, array( 'wpemoji' ) );
 } else {
 return array();
 }
}

function disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {
 if ( 'dns-prefetch' == $relation_type ) {
 $emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );

$urls = array_diff( $urls, array( $emoji_svg_url ) );
 }

return $urls;    
}


//Remove JQuery migrate
 function remove_jquery_migrate( $scripts ) { 
 if ( ! is_admin() && isset( $scripts->registered['jquery'] ) ) {
 $script = $scripts->registered['jquery'];
  if ( $script->deps ) { 
 $script->deps = array_diff( $script->deps, array( 'jquery-migrate' ) );
 } } } 
add_action( 'wp_default_scripts', 'remove_jquery_migrate' );


/* search  spanish   */   
$uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri_segments = explode('/', $uri_path); 
 if ($uri_segments[1]  === 'es') { 
 function isu_search_url( $query ) {
    $page_id = 888; 
    $per_page = 8;
    $post_type = 'blog_spanish'; 
  if ( !is_admin() && $query->is_main_query() && $query->queried_object->ID == $page_id  ) {
        add_filter( 'body_class', function( $classes ) {
            $classes[] = 'filter-search';
            return $classes;
        });
        $query->set( 'pagename', '' );
            $query->set( 'post_type', $post_type ); 
            $query->is_search = true; 
            $query->is_page = false; 
            $query->is_singular = false; 
        }
}
add_action( 'pre_get_posts', 'isu_search_url' ); 
}

/* ===== Register Menus ===== */
function register_my_menu() {
    register_nav_menus(array(
       'header_menu_spanish' => __('spanish-top-nav', 'spanish-top-nav'),
	   'footer_locations_menu'	=> __('Footer Locations Menu', 'text_domain'),
    ));
}
add_action('init', 'register_my_menu');


// custom post type function for our Articles Spanish
function custom_post_type_articles_spanish() {
	$labels = array(
		'name'                  => _x( 'Articles Spanish', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Articles Spanish', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Articles Spanish', 'text_domain' ),
		'name_admin_bar'        => __( 'Post Type', 'text_domain' ),
		'archives'              => __( 'Item Archives', 'text_domain' ),
		'attributes'            => __( 'Item Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'All Items', 'text_domain' ),
		'add_new_item'          => __( 'Add New Item', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Item', 'text_domain' ),
		'edit_item'             => __( 'Edit Item', 'text_domain' ),
		'update_item'           => __( 'Update Item', 'text_domain' ),
		'view_item'             => __( 'View Item', 'text_domain' ),
		'view_items'            => __( 'View Items', 'text_domain' ),
		'search_items'          => __( 'Search Item', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$rewrite = array(
		'slug'                  => '/es/articles',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'label'                 => __( 'Articles Spanish', 'text_domain' ),
		'description'           => __( 'Articles Spanish', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'trackbacks', 'revisions', 'custom-fields', 'page-attributes', 'post-formats' ),
		'taxonomies'            => array( 'category' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 2,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type'       => 'page',
	);
	register_post_type( 'articles_spanish', $args );

}
add_action( 'init', 'custom_post_type_articles_spanish', 0 );


// custom post type function for our Articles 
function custom_post_type_articles() {
	$labels = array(
		'name'                  => _x( 'Articles ', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Articles ', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Articles ', 'text_domain' ),
		'name_admin_bar'        => __( 'Post Type', 'text_domain' ),
		'archives'              => __( 'Item Archives', 'text_domain' ),
		'attributes'            => __( 'Item Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'All Items', 'text_domain' ),
		'add_new_item'          => __( 'Add New Item', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Item', 'text_domain' ),
		'edit_item'             => __( 'Edit Item', 'text_domain' ),
		'update_item'           => __( 'Update Item', 'text_domain' ),
		'view_item'             => __( 'View Item', 'text_domain' ),
		'view_items'            => __( 'View Items', 'text_domain' ),
		'search_items'          => __( 'Search Item', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$rewrite = array(
		'slug'                  => 'article',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'label'                 => __( 'Articles ', 'text_domain' ),
		'description'           => __( 'Articles ', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'trackbacks', 'revisions', 'custom-fields', 'page-attributes', 'post-formats' ),
		'taxonomies'            => array( 'category' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 2,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type'       => 'page',
	);
	register_post_type( 'articles', $args );

}
add_action( 'init', 'custom_post_type_articles', 0 );


add_filter('walker_nav_menu_start_el', 'wpse_226884_replace_hash', 999);
function wpse_226884_replace_hash($menu_item) {
    if (strpos($menu_item, 'href="#"') !== false) {
        $menu_item = str_replace('href="#"', 'href="javascript:void(0);"', $menu_item);
    }
    return $menu_item;
}

add_action( 'template_redirect', 'remove_template_redirect', 10, 2);
function remove_template_redirect(){
 ob_start( function( $buffer ){
   $buffer = str_replace( array( 
       '<script type="text/javascript">',
       "<script type='text/javascript'>", 
       "<script type='text/javascript' src=",
       '<script type="text/javascript" src=',
       '<style type="text/css">', 
       "' type='text/css' media=", 
       '<style type="text/css" media',
       "' type='text/css'>"
   ), 
   array(
       '<script>', 
       "<script>", 
       "<script src=",
       '<script src=',
       '<style>', 
       "' media=", 
       '<style media',
       "' >"
   ), $buffer );

   return $buffer;
 });
};
/** classic editor **/

add_filter('use_block_editor_for_post', '__return_false');


add_action('wp_loaded', 'prefix_output_buffer_start');
function prefix_output_buffer_start() { 
    ob_start("prefix_output_callback"); 
}

add_action('shutdown', 'prefix_output_buffer_end');
function prefix_output_buffer_end() { 
    ob_end_flush(); 
}

function prefix_output_callback($buffer) {
    return preg_replace( "%[ ]type=[\'\"]text\/(javascript|css)[\'\"]%", '', $buffer );
}

function retrieve_latest_gform_submissions() {
	$site_url = get_site_url();
	$search_criteria = [
		'status' => 'active'
	];
	$form_ids = 1; //search all forms
	$sorting = [
		'key' => 'date_created',
		'direction' => 'DESC'
	];
	$paging = [
		'offset' => 0,
		'page_size' => 5
	];
	
	$submissions = GFAPI::get_entries($form_ids, null, $sorting, $paging);
	$start_date = date('Y-m-d H:i:s', strtotime('-5 day'));
	$end_date = date('Y-m-d H:i:s');
	$entry_in_last_5_days = false;
	
	foreach ($submissions as $submission) {
		if( $submission['date_created'] > $start_date  && $submission['date_created'] <= $end_date ) {
			$entry_in_last_5_days = true;
		} 
	}

	if( !$entry_in_last_5_days ) {
		wp_mail('webdev@postali.com', 'Submission Status', "No submissions in last 5 days on $site_url");
	}
}
add_action('check_form_entries', 'retrieve_latest_gform_submissions');