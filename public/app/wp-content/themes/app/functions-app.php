<?php


/**
 * Register the CSS
 */
function app_get_css() {
  return array(
    'all'=>array(
      'foundation' => '_/lib/foundation/css/foundation.css',
      'main' => '_/css/main.css'
    )
  );
}


/**
 * Register the JS
 */
function app_get_js() {
  return array(
    'jquery'=>'_/lib/jquery/jquery-2.1.1.min.js',
    //'underscore'=>'_/lib/underscore/underscore-min.js',
    'sharrre'=>'_/lib/sharrre/jquery.sharrre.js',
    'foundation'=>'_/lib/foundation/js/foundation/foundation.js',
    'imagesloaded'=>'_/lib/masonry/imagesloaded.pkgd.min.js',
    'masonry'=>'_/lib/masonry/masonry.pkgd.min.js',
    'main'=>'_/js/main.js'
  );
}


/**
 * Register menus
 */
add_theme_support('menus');
define('MENU_PRIMARY', 'menu_primary');
function app_menus() {
  $locations = array(
    MENU_PRIMARY => __('Primary'),
  );
  register_nav_menus($locations);
}
add_action('init', 'app_menus');

/**
 * Add editor styles for Page Inserts
*/
//add_editor_style('style-wysiwyg.css');

/**
 * Add new thumbnail size
*/
// if ( function_exists( 'add_image_size' ) ) {
//   add_image_size( 'hero', 680, 450, true ); //(cropped)
// }


/**
 * Get an image
 * @param string $path
 * @param size string $size (size keys that you've passed to add_image_size)
 * @return string Relative URL
 */
function app_image_path($path, $size) {
  // Which image size was requested?
  global $_wp_additional_image_sizes;
  $image_size = $_wp_additional_image_sizes[$size];
  
  // Get the path info
  $pathinfo = pathinfo($path);
  $fname = $pathinfo['basename'];
  $fext = $pathinfo['extension'];
  $dir = $pathinfo['dirname'];
  $fdir = realpath(str_replace('//', '/', ABSPATH.$dir)).'/';
  
  // Filename without any size suffix or extension (e.g. without -144x200.jpg)
  $fname_prefix = preg_replace('/(-[\d]{1,}x[\d]{1,})?.'.$fext.'$/i', '', $fname);
  $out_fname = sprintf(
    '%s-%sx%s.%s',
    $fname_prefix,
    $image_size['width'],
    $image_size['height'],
    $fext
  );
  
  // See if the file that we're predicting exists
  // If so, we can avoid a call to the database
  $fpath = $fdir.$out_fname;
  if(file_exists($fpath)) {
    return sprintf(
      '%s/%s',
      $pathinfo['dirname'],
      $out_fname
    );
  }
  
  // Can't find the file? Figure out the correct path from the database
  global $wpdb;
  $guid = site_url().$dir.'/'.$fname_prefix.'.'.$fext;
  $sql = "
    select
      pm.meta_value
    from $wpdb->posts p
    inner join $wpdb->postmeta pm
      on p.ID = pm.post_id
    where p.guid = %s
    and pm.meta_key = '_wp_attachment_metadata'
    limit 1";
  $prepared = $wpdb->prepare($sql, $guid);
  $row = $wpdb->get_row($prepared);
  if(is_object($row)) {
    $meta = unserialize($row->meta_value);
    if(isset($meta['sizes'][$size]['file'])) {
      $meta_fname = $meta['sizes'][$size]['file'];
      return sprintf(
        '%s/%s',
        $pathinfo['dirname'],
        $meta_fname
      );
    }
  }
  
  // Still nothing? Just return the path given
  return $path;
}


/**
 * Get the asset path
 * @param string $relative_path
 * @return string
 */
function get_asset_path($relative_path) {
  $clean_relative_path = $relative_path;
  $clean_relative_path = preg_replace('/^[\/]{1,}/', '', $clean_relative_path);
  $clean_relative_path = preg_replace('/^_[\/]{1,}/', '', $clean_relative_path);
  return sprintf(
    '%s/_/%s%s',
    get_template_directory_uri(),
    $clean_relative_path,
    THEME_SUFFIX
  );
}