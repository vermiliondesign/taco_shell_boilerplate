<!doctype html>
<?php
$theme = ThemeOption::getInstance();
?>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
  <title><?php echo app_get_page_title(); ?></title>
  
  <!-- meta -->
  <?php include dirname(__FILE__).'/incl-open-graph-meta.php'; ?>

  
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
  <meta charset="<?php bloginfo('charset'); ?>" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width">
  
  <!-- icons -->
  <link rel="icon" href="<?php echo home_url('/'); ?>favicon.ico">
  <link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_asset_path('img/apple-touch-icon-152x152.png'); ?>">
  <link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_asset_path('img/apple-touch-icon-120x120.png'); ?>">
  <link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_asset_path('img/apple-touch-icon-72x72.png'); ?>">
  <link rel="apple-touch-icon" href="<?php echo get_asset_path('img/apple-touch-icon.png'); ?>"><?php // 57x57 ?>
  
  
  <!-- scripts -->
  <script src="<?php echo get_asset_path('lib/modernizr/modernizr-2.6.2.min.js'); ?>"></script>
  
  <?php wp_head(); ?>
  
  <?php include __DIR__.'/incl-google-tag-manager.php'; ?>
  
</head>

<?php global $body_class; ?>
<body <?php body_class((isset($body_class)) ? $body_class : null); ?>>
  