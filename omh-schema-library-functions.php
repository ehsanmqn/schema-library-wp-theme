<?php
/**
 * Enqueues scripts and styles for omh schema library.
 *
 */

function omh_schema_library_theme_scripts() {

  $load_deps = true;

  if ( has_filter('load_schema_library_dependencies') ){
    $load_deps = do_filter('load_schema_library_dependencies');
  }

  if ( $load_deps ){
    //Theme css
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/bower_components/bootstrap/dist/css/bootstrap.min.css' );
    wp_enqueue_style( 'angular-bootstrap', get_template_directory_uri() . '/bower_components/angular-bootstrap/ui-bootstrap-csp.css' );
    wp_enqueue_style( 'codemirror', get_template_directory_uri() . '/bower_components/codemirror/lib/codemirror.css' );
    wp_enqueue_style( 'omh-schema-library-style', get_template_directory_uri() . '/css/omh-schema-library-style.css' );

    // Theme js
    wp_enqueue_script( 'angular', get_template_directory_uri() . '/bower_components/angular/angular.min.js', array() );
    wp_enqueue_script( 'angular-bootstrap', get_template_directory_uri() . '/bower_components/angular-bootstrap/ui-bootstrap-tpls.min.js', array('angular') );
    wp_enqueue_script( 'angular-ui-router', get_template_directory_uri() . '/bower_components/angular-ui-router/release/angular-ui-router.min.js', array('angular') );
    wp_enqueue_script( 'moment', get_template_directory_uri() . '/bower_components/moment/min/moment.min.js', array() );
    wp_enqueue_script( 'codemirror', get_template_directory_uri() . '/bower_components/codemirror/lib/codemirror.js', array() );
    wp_enqueue_script( 'omh-documentation-utilities-script', get_template_directory_uri() . '/js/omh-documentation-utilities.js', array( 'jquery','moment' ) );
  }

  // Enqueue the schema lib js
  wp_enqueue_script( 'omh-schema-library-script', get_template_directory_uri() . '/js/omh-schema-library-functions.js', array( 'jquery','angular','moment','omh-documentation-utilities-script' ), '0.1.1', false );

  // Localize the script with directory and schema data
  $schema_query = new WP_Query( array(
    'post_type' => 'schema',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'orderby' => 'title',
    'order'   => 'ASC' ) );

  $schemaLinks = array();

  if( $schema_query->have_posts() ) {
    while ( $schema_query->have_posts() ) :
      $schema_query->the_post();
      array_push( $schemaLinks, array( 'link' => get_permalink(), 'title' => get_the_title() ) );
    endwhile;
  }

  wp_reset_query();  // Restore global post data stomped by the_post().

  wp_localize_script( 'omh-schema-library-script', 'wordpress', array(
    'themeDirectory' => get_template_directory_uri(),
    'siteUrl' => rtrim( get_site_url(), '/wp'),
    'schemaLinks' => $schemaLinks
  ) );

}

add_action( 'wp_enqueue_scripts', 'omh_schema_library_theme_scripts' );

?>