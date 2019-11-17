<?php

// Add stylesheets
function stemappo_styles() {

    wp_enqueue_style('style', get_template_directory_uri() . '/css/style.css');
    wp_enqueue_style('responsive', get_template_directory_uri() . '/css/responsive.css');
    wp_enqueue_style('owl', get_template_directory_uri() . '/css/owl.carousel.min.css');
    wp_enqueue_style('owl default', get_template_directory_uri() . '/css/owl.theme.default.min.css');
  
};

add_action( 'wp_enqueue_scripts', 'stemappo_styles');

// Add scripts

function stemappo_scripts(){

  wp_enqueue_script('jquery', get_template_directory_uri() . '/js/jquery.min.js', array(), '1.0.0',true);
  wp_enqueue_script('owl', get_template_directory_uri() . '/js/owl.carousel.min.js', array(), '1.0.0', true );
  wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js', array(), '1.0.0', true );
  wp_enqueue_script('isotope', get_template_directory_uri() . '/js/isotope.pkgd.min.js', array(), '1.0.0', true );
  
};

add_action( 'wp_enqueue_scripts', 'stemappo_scripts');

// Add options button to wp_side
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page();
}

// Adds menu option to appearance tab
function register_my_menu() {
  register_nav_menu('header-menu',__( 'Header Menu' ));
  register_nav_menu('footer-menu',__( 'Footer Menu' ));

}
add_action( 'init', 'register_my_menu' );

// WordPress Titles
add_theme_support( 'title-tag' );

//featured thumnail 
add_theme_support( 'post-thumbnails' );

// Webiste logo
add_theme_support( 'custom-logo' );

/*
* Creating a function to create our CPT
*/
 
function custom_post_type() {
 
  // Set UI labels for Custom Post Type
      $labels = array(
          'name'                => _x( 'Projects', 'Post Type General Name', 'Ste Mappo Theme' ),
          'singular_name'       => _x( 'Project', 'Post Type Singular Name', 'Ste Mappo Theme' ),
          'menu_name'           => __( 'Projects', 'Ste Mappo Theme' ),
          'parent_item_colon'   => __( 'Parent Project', 'Ste Mappo Theme' ),
          'all_items'           => __( 'All Projects', 'Ste Mappo Theme' ),
          'view_item'           => __( 'View Project', 'Ste Mappo Theme' ),
          'add_new_item'        => __( 'Add New Project', 'Ste Mappo Theme' ),
          'add_new'             => __( 'Add New', 'Ste Mappo Theme' ),
          'edit_item'           => __( 'Edit Project', 'Ste Mappo Theme' ),
          'update_item'         => __( 'Update Project', 'Ste Mappo Theme' ),
          'search_items'        => __( 'Search Project', 'Ste Mappo Theme' ),
          'not_found'           => __( 'Not Found', 'Ste Mappo Theme' ),
          'not_found_in_trash'  => __( 'Not found in Trash', 'Ste Mappo Theme' ),
      );
       
  // Set other options for Custom Post Type
       
      $args = array(
          'label'               => __( 'projects', 'Ste Mappo Theme' ),
          'description'         => __( 'Project news and reviews', 'Ste Mappo Theme' ),
          'labels'              => $labels,
          // Features this CPT supports in Post Editor
          'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
          // You can associate this CPT with a taxonomy or custom taxonomy. 
          'taxonomies'          => array( 'projects' ),
          /* A hierarchical CPT is like Pages and can have
          * Parent and child items. A non-hierarchical CPT
          * is like Posts.
          */ 
          'hierarchical'        => false,
          'public'              => true,
          'show_ui'             => true,
          'show_in_menu'        => true,
          'show_in_nav_menus'   => true,
          'show_in_admin_bar'   => true,
          'menu_position'       => 5,
          'can_export'          => true,
          'has_archive'         => true,
          'exclude_from_search' => false,
          'publicly_queryable'  => true,
          'capability_type'     => 'page',
      );
       
      // Registering your Custom Post Type
      register_post_type( 'project', $args );
   
  }
   
  /* Hook into the 'init' action so that the function
  * Containing our post type registration is not 
  * unnecessarily executed. 
  */
   
  add_action( 'init', 'custom_post_type', 0 );

  function excerpt_length_example( $words ) {
    return 30;
   }
   add_filter( 'excerpt_length', 'excerpt_length_example' );


   
/*
 * Prepend Facebook, Twitter and Google+ social share buttons to the post's content
 *
 */
function add_share_buttons_after_content( $content ) {
  if(is_single()){
    global $post;

    // Get the post's URL that will be shared
    $post_url   = urlencode( esc_url( get_permalink($post->ID) ) );
    
    // Get the post's title
    $post_title = urlencode( $post->post_title );
    
    // the description will be either the post excerpt if present, or part of the post content
    // $description = wdm_custom_excerpt( $post->post_content, $post->post_excerpt );
    
      // Compose the share links for Facebook, Twitter and Google+
      $facebook_link    = sprintf( 'https://www.facebook.com/sharer/sharer.php?u=%1$s', $post_url);
      $twitter_link     = sprintf( 'https://twitter.com/intent/tweet?text=%2$s&url=%1$s', $post_url, $post_title);
      // $google_plus_link = sprintf( 'https://plus.google.com/share?url=%1$s', $post_url );
      $linkedIn_link = sprintf('https://www.linkedin.com/shareArticle?mini=true&url=%1$s', $post_url);
      // Wrap the buttons
      $output = '<div id="share-buttons">';
          $output .= '<p class="share-button">Share: </p>';
          // Add the links inside the wrapper
          $output .= '<a onclick="javascript:window.open(this.href,\'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600\');return false;"
          target="_blank" href="' . $facebook_link . '" class="share-button facebook">Facebook</a>';
          $output .= '<a onclick="javascript:window.open(this.href,\'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600\');return false;"
          target="_blank" href="' . $twitter_link . '" class="share-button twitter">Twitter</a>';
          // $output .= '<a onclick="javascript:window.open(this.href,\'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600\');return false;"
          // target="_blank" href="' . $google_plus_link . '" class="share-button google-plus">Google+</a>';
          $output .= '<a onclick="javascript:window.open(this.href,\'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600\');return false;"
          target="_blank" href="' . $linkedIn_link . '" class="share-button linkedIn">LinkedIn</a>';
      $output .= '</div>';
  }
  // Return the buttons and the original content
  return $content . $output;
}

add_filter( 'the_content', 'add_share_buttons_after_content' );

?>


