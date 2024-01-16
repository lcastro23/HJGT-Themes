<?php
/*require_once "custom-woo.php";
require_once "jr_navwalker.php";*/
require_once "standard_nav.php";
require_once "mobile_locations.php";

add_filter('acf/shortcode/allow_in_block_themes_outside_content', '__return_true');

remove_theme_support( 'core-block-patterns' );

function mytheme_enqueue_block_editor_assets() {
	wp_enqueue_script( 'block-filters', get_stylesheet_directory_uri() . '/a_js/bs-block-filters.js', array( 'wp-hooks' ), '1.0.0', true );
}
add_action( 'enqueue_block_editor_assets', 'mytheme_enqueue_block_editor_assets' );

function jr_enqueue_block_editor_assets() {
  wp_enqueue_script( 'g_blocks', get_template_directory_uri() . '/a_js/g-blocks.js', array( 'wp-hooks' ), null, true );
}
add_action( 'enqueue_block_editor_assets', 'jr_enqueue_block_editor_assets' );

function my_container_default_attributes( $default_attributes ) {
  $default_attributes['marginAfter'] = 'mb-0';
  return $default_attributes;
}
add_filter( 'wp_bootstrap_blocks_container_default_attributes', 'my_container_default_attributes', 10, 1 );

function my_column_default_attributes( $default_attributes ) {
    $default_attributes['sizeLg'] = 4;
    $default_attributes['sizeMd'] = 0;
    return $default_attributes;
}
add_filter( 'wp_bootstrap_blocks_column_default_attributes', 'my_column_default_attributes', 10, 1 );

add_filter( 'gform_pre_render', 'populate_form_select' );
add_filter( 'gform_pre_validation', 'populate_form_select' );
add_filter( 'gform_pre_submission_filter', 'populate_form_select' );
add_filter( 'gform_admin_pre_render', 'populate_form_select' );
function populate_form_select( $form ) {

  $forms = array( 5, 8, 10, 4 ); 
 
    if ( ! in_array( $form['id'], $forms ) ) {
        return $form;
    }
 
    foreach ( $form['fields'] as &$field ) {
 
        if ( $field->type != 'select') {
            continue;
        } elseif ( strpos( $field->cssClass, 'populateStates' ) !== false ){

          $args_states = array(
            'numberposts' => -1,
            'post_type'   => 'tournament-locations',
            'post_status' => 'publish',
            'meta_key'    => 'has_upcoming_events',
            'meta_value'  => '1',
            'orderby'    => 'title',
            'order' => 'asc'
          );

          $posts = get_posts( $args_states );
 
        $choices = array(['text' => 'Select State', 'value' => 'all',]);
 
        foreach ( $posts as $post ) {
            $state = get_field( 'select_state', $post->ID );  
            $choices[] = array( 'text' => $post->post_title, 'value' => $state['value'] );
        }
 
        
        $field->choices = $choices;

        } elseif ( strpos( $field->cssClass, 'populateStAbrv' ) !== false ){

          $args_states = array(
            'numberposts' => -1,
            'post_type'   => 'tournament-locations',
            'post_status' => 'publish',
            'meta_key'    => 'has_upcoming_events',
            'meta_value'  => '1',
            'orderby'    => 'title',
            'order' => 'asc'
          );

          $posts = get_posts( $args_states );
 
        $choices = array(['text' => 'Select State', 'value' => 'all',]);
 
        foreach ( $posts as $post ) {
            $state = get_field( 'select_state', $post->ID );  
            $choices[] = array( 'text' => $post->post_title, 'value' => $state['label'] );
        }
 
        
        $field->choices = $choices;

        } elseif ( strpos( $field->cssClass, 'populateTaxonomyStates' ) !== false ){

          $terms = get_terms( array( 
            'taxonomy' => 'academy-state',
              'hide_empty' => true,
          ) );

          $choices = array(['text' => 'Select State', 'value' => 'all',]);

          foreach ( $terms as $term ) {
              $choices[] = array( 'text' => $term->name, 'value' => $term->term_id );
          }
   
          $field->choices = $choices;

        } elseif ( strpos( $field->cssClass, 'populateTaxonomyCategory' ) !== false ){

          $terms = get_terms( array( 
            'taxonomy' => 'partner-category',
              'hide_empty' => true,
          ) );

          $choices = array(['text' => 'Select Category', 'value' => 'all',]);

          foreach ( $terms as $term ) {
              $choices[] = array( 'text' => $term->name, 'value' => $term->term_id );
          }
   
          $field->choices = $choices;

        }
 
    }
 
    return $form;
}


// function phoneNumberOnly() {
//   $string = (types_render_field( 'location-phone-number', array( 'output' => 'raw' ) ));
//   $res = preg_replace("/[^0-9]/", "", $string);
//   return $res;
// }
// add_shortcode('phoneOnly', 'phoneNumberOnly');

// //custom shortcode [trim length='150'][/trim] to trim strings in toolset (like for reviews)
// add_shortcode('trim', 'trim_shortcode');
// function trim_shortcode($atts, $content = '') {
//   $content = wpv_do_shortcode($content);
//   $length = (int)$atts['length'];
//   if (strlen($content) > $length) {
//     $content = substr($content, 0, $length) . '&hellip;';
//   }
//   return $content;
// }


/**
 * Add support for custom color palettes in Gutenberg.
 */
  $themeColors = array(
    array(
      'name'  => esc_html__( 'Primary Exra Light', '@@textdomain' ),
      'slug' => 'primary-extra-light',
      'color' => 'var(--primary-extra-light)',
    ),
    array(
 			'name'  => esc_html__( 'Primary Light', '@@textdomain' ),
 			'slug' => 'primary-light',
 			'color' => 'var(--primary-light)',
 		),
    array(
 			'name'  => esc_html__( 'Primary', '@@textdomain' ),
 			'slug' => 'primary',
 			'color' => 'var(--primary)',
 		),
    array(
 			'name'  => esc_html__( 'Primary Dark', '@@textdomain' ),
 			'slug' => 'primary-dark',
 			'color' => 'var(--primary-dark)',
 		),
    array(
      'name'  => esc_html__( 'Secondary Extra Light', '@@textdomain' ),
      'slug' => 'secondary-extra-light',
      'color' => 'var(--secondary-extra-light)',
    ),
 		array(
 			'name'  => esc_html__( 'Secondary Light', '@@textdomain' ),
 			'slug' => 'secondary-light',
 			'color' => 'var(--secondary-light)',
 		),
    array(
 			'name'  => esc_html__( 'Secondary', '@@textdomain' ),
 			'slug' => 'secondary',
 			'color' => 'var(--secondary)',
 		),
    array(
 			'name'  => esc_html__( 'Secondary Dark', '@@textdomain' ),
 			'slug' => 'secondary-dark',
 			'color' => 'var(--secondary-dark)',
 		),
    array(
 			'name'  => esc_html__( 'Tertiary Extra Light', '@@textdomain' ),
 			'slug' => 'tertiary-extra-light',
 			'color' => 'var(--tertiary-extra-light)',
 		),
    array(
      'name'  => esc_html__( 'Tertiary Light', '@@textdomain' ),
      'slug' => 'tertiary-light',
      'color' => 'var(--tertiary-light)',
    ),
    array(
      'name'  => esc_html__( 'Tertiary', '@@textdomain' ),
      'slug' => 'tertiary',
      'color' => 'var(--tertiary)',
    ),
    array(
      'name'  => esc_html__( 'Tertiary Dark', '@@textdomain' ),
      'slug' => 'tertiary-dark',
      'color' => 'var(--tertiary-dark)',
    ),
 		array(
 			'name'  => esc_html__( 'White', '@@textdomain' ),
 			'slug' => 'white',
 			'color' => 'var(--white)',
 		),array(
 			'name'  => esc_html__( 'Light Gray', '@@textdomain' ),
 			'slug' => 'gray-light',
 			'color' => 'var(--gray-light)',
 		),array(
 			'name'  => esc_html__( 'Medium Light Gray', '@@textdomain' ),
 			'slug' => 'gray-med-light',
 			'color' => 'var(--gray-med-light)',
 		),array(
 			'name'  => esc_html__( 'Medium Gray', '@@textdomain' ),
 			'slug' => 'gray-med',
 			'color' => 'var(--gray-med)',
 		),array(
 			'name'  => esc_html__( 'Medium Dark Gray', '@@textdomain' ),
 			'slug' => 'gray-med-dark',
 			'color' => 'var(--gray-med-dark)',
 		),array(
 			'name'  => esc_html__( 'Dark Gray', '@@textdomain' ),
 			'slug' => 'gray-dark',
 			'color' => 'var(--gray-dark)',
 		),array(
 			'name'  => esc_html__( 'Black', '@@textdomain' ),
 			'slug' => 'black',
 			'color' => 'var(--black)',
 		),array(
 			'name'  => esc_html__( 'Transparent', '@@textdomain' ),
 			'slug' => 'transparent',
 			'color' => 'rgba(0, 0, 0, 0)',
 		)
 );

// // get's the theme colors in proper format for the push in g-blocks.js. Comment this whole section out after you update g-blocks.js
//  add_action('wp_ajax_get_bs_column_colors', function() {
//    global $themeColors;
//    $results = '';
//    $i = 1;
//    $length = count($themeColors);
//    foreach($themeColors as $innerArray){
//        if ($i !== $length) {
//          $results .= '{name:"'.$innerArray['slug'].'",' . 'color:"' . $innerArray['color'] . '"},';
//        } else {
//          $results .= '{name:"'.$innerArray['slug'].'",' . 'color:"' . $innerArray['color'] . '"}';
//        }
//        $i++;
//    }
//    echo $results;
//    wp_die();
//  });

 function tiny_mce_custom() {
   global $themeColors;
   $results = '';
   $i = 1;
   $length = count($themeColors);
   foreach($themeColors as $innerArray){
       if ($i !== $length) {
         $results .= '"'.substr($innerArray['color'], 1) . '",' . '"' . $innerArray['name'] . '",';
       } else {
         $results .= '"'.substr($innerArray['color'], 1) . '",' . '"' . $innerArray['name'] . '"';
       }
       $i++;
   }
    return $results;
}
$custom_mc = tiny_mce_custom();
// echo $custom_mc;
function jr_gutenberg_color_palette() {
	global $themeColors;
	add_theme_support(
		'editor-color-palette', $themeColors
	);
}
add_action( 'after_setup_theme', 'jr_gutenberg_color_palette' );

function tb_mce4_options($init) {
  global $custom_mc;
  $default_colours = '"993300", "Burnt orange",
                      "333300", "Dark olive",
                      "003300", "Dark green",
                      "003366", "Dark azure",
                      "000080", "Navy Blue",
                      "333399", "Indigo",
                      "333333", "Very dark gray",
                      "800000", "Maroon",
                      "FF6600", "Orange",
                      "808000", "Olive",
                      "008000", "Green",
                      "008080", "Teal",
                      "0000FF", "Blue",
                      "666699", "Grayish blue",
                      "808080", "Gray",
                      "FF0000", "Red",
                      "FF9900", "Amber",
                      "99CC00", "Yellow green",
                      "339966", "Sea green",
                      "33CCCC", "Turquoise",
                      "3366FF", "Royal blue",
                      "800080", "Purple",
                      "999999", "Medium gray",
                      "FF00FF", "Magenta",
                      "FFCC00", "Gold",
                      "FFFF00", "Yellow",
                      "00FF00", "Lime",
                      "00FFFF", "Aqua",
                      "00CCFF", "Sky blue",
                      "993366", "Red violet",
                      "FF99CC", "Pink",
                      "FFCC99", "Peach",
                      "FFFF99", "Light yellow",
                      "CCFFCC", "Pale green",
                      "CCFFFF", "Pale cyan",
                      "99CCFF", "Light sky blue",
                      "CC99FF", "Plum"';

  // build colour grid default+custom colors
  $init['textcolor_map'] = '['.$custom_mc.','.$default_colours.']';

  // enable 6th row for custom colours in grid
  $init['textcolor_rows'] = 7;

  return $init;
}
add_filter('tiny_mce_before_init', 'tb_mce4_options');

// //AutoFill Search Code Ajax
// add_action('wp_enqueue_scripts', function() {
//
//   wp_enqueue_script('jquery-ui-autocomplete', '',
// 		['jquery'], null, true);
//
//   wp_localize_script('jquery-ui-autocomplete', 'AutocompleteSearch', [
//   		'ajax_url' => admin_url('admin-ajax.php'),
//   		'ajax_nonce' => wp_create_nonce('autocompleteSearchNonce')
//   	]);
// });
//
// add_action('wp_ajax_nopriv_autocompleteSearch', 'awp_autocomplete_search');
// add_action('wp_ajax_autocompleteSearch', 'awp_autocomplete_search');
// function awp_autocomplete_search() {
// 	check_ajax_referer('autocompleteSearchNonce', 'security');
//
// 	$search_term = $_REQUEST['term'];
// 	if (!isset($_REQUEST['term'])) {
// 		echo json_encode([]);
// 	}
//
// 	$suggestions = [];
// 	$query = new WP_Query([
//     's' => $search_term,
//     'post_type' => 'physicians',
//     'post_status' => 'publish',
// 		'posts_per_page' => -1,
// 	]);
// 	if ($query->have_posts()) {
// 		while ($query->have_posts()) {
// 			$query->the_post();
// 			$suggestions[] = [
// 				'label' => get_the_title()
// 			];
// 		}
// 		wp_reset_postdata();
// 	}
// 	echo json_encode($suggestions);
// 	wp_die();
// }

function jr_register_starter_blocks() {
  $template = array(
    array('wp-bootstrap-blocks/container', array( ), array (
      array('core/paragraph', array(
      'align' => 'center',
      'content' => 'This is a sample paragraph inside of a container block. All blocks in a container block will be contained in the center of the screen. Blocks outside of a container block will be full-width. You can overwrite this message or remove this block and add another block here in its place.',
    ))
    ))
  );
  $post_type_object = get_post_type_object( 'post' );
  $post_type_object->template = $template;
  $page_type_object = get_post_type_object( 'page' );
  $page_type_object->template = $template;
}
add_action( 'init', 'jr_register_starter_blocks', 20 );