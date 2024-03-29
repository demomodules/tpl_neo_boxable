<?php
/* -----------------------------------------------------------------------------------------
   $Id: general.css.php 15351 2023-07-18 16:57:08Z Markus $

   modified eCommerce Shopsoftware
   http://www.modified-shop.org

   Copyright (c) 2009 - 2013 [www.modified-shop.org]
   -----------------------------------------------------------------------------------------
   based on:
   (c) 2006 XT-Commerce

   Released under the GNU General Public License
   ---------------------------------------------------------------------------------------*/

  define('DIR_TMPL', 'templates/'.CURRENT_TEMPLATE.'/');
  define('DIR_TMPL_CSS', DIR_TMPL.'css/');

  if ($_SESSION['customers_status']['customers_status'] == '0') {
    echo '<link rel="stylesheet" property="stylesheet" href="'.DIR_WS_BASE.DIR_TMPL_CSS.'adminbar.css" type="text/css" media="screen" />';
  }

  $css_array = array(
    DIR_TMPL.'stylesheet.css',
  );
  
  if (defined('THEME_COLOR') && is_file(DIR_FS_CATALOG.DIR_TMPL_CSS.'themes/'.THEME_COLOR.'.css')) {
    array_unshift($css_array, DIR_TMPL_CSS.'themes/'.THEME_COLOR.'.css');
  }
  
  // activate boxed style
  if (defined('TPL_CONFIG_BOXED') && TPL_CONFIG_BOXED == 'true') {
     array_push($css_array, DIR_TMPL_CSS.'boxed_style.css');
  }
  
  if (is_file(DIR_FS_CATALOG.DIR_TMPL_CSS.'tpl_custom.css')) {
     array_push($css_array, DIR_TMPL_CSS.'tpl_custom.css');
  }
  
  $css_min = DIR_TMPL.'stylesheet.min.css';

  $this_f_time = filemtime(DIR_FS_CATALOG.DIR_TMPL_CSS.'general.css.php');

  if (COMPRESS_STYLESHEET == 'true') {
    require_once(DIR_FS_BOXES_INC.'combine_files.inc.php');
    $css_array = combine_files($css_array, $css_min, true, $this_f_time);
  }

  // Put CSS-Inline-Definitions here, these CSS-files will be loaded at the TOP of every page
  
  foreach ($css_array as $css) {
    $css .= strpos($css,$css_min) === false ? '?v=' . filemtime(DIR_FS_CATALOG.$css) : '';
    echo '<link rel="stylesheet" href="'.DIR_WS_BASE.$css.'" type="text/css" media="screen" />'.PHP_EOL;
  }
