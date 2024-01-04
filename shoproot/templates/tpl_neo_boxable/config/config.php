<?php
/* -----------------------------------------------------------------------------------------
   $Id: config.php 15561 2023-11-13 13:39:59Z GTB $

   modified eCommerce Shopsoftware
   http://www.modified-shop.org

   Copyright (c) 2009 - 2013 [www.modified-shop.org]
   -----------------------------------------------------------------------------------------
   Released under the GNU General Public License
   ---------------------------------------------------------------------------------------*/

  // paths
  define('DIR_FS_BOXES', DIR_FS_CATALOG .'templates/'.CURRENT_TEMPLATE. '/source/boxes/');
  define('DIR_FS_BOXES_INC', DIR_FS_CATALOG .'templates/'.CURRENT_TEMPLATE. '/source/inc/');

  // show boxes
  defined('TPL_BOX_CATEGORIES') or define('TPL_BOX_CATEGORIES', 'true');
  defined('TPL_BOX_MANUFACTURERS') or define('TPL_BOX_MANUFACTURERS', 'true');
  defined('TPL_BOX_LAST_VIEWED') or define('TPL_BOX_LAST_VIEWED', 'true');
  defined('TPL_BOX_SEARCH') or define('TPL_BOX_SEARCH', 'true');
  defined('TPL_BOX_CONTENT') or define('TPL_BOX_CONTENT', 'true');
  defined('TPL_BOX_INFORMATION') or define('TPL_BOX_INFORMATION', 'true');
  defined('TPL_BOX_MISCELLANEOUS') or define('TPL_BOX_MISCELLANEOUS', 'true');
  defined('TPL_BOX_LANGUAGES') or define('TPL_BOX_LANGUAGES', 'true');
  defined('TPL_BOX_INFOBOX') or define('TPL_BOX_INFOBOX', 'true');
  defined('TPL_BOX_LOGIN') or define('TPL_BOX_LOGIN', 'true');
  defined('TPL_BOX_NEWSLETTER') or define('TPL_BOX_NEWSLETTER', 'true');
  defined('TPL_BOX_TRUSTEDSHOPS') or define('TPL_BOX_TRUSTEDSHOPS', 'true');
  defined('TPL_BOX_QUICKIE') or define('TPL_BOX_QUICKIE', 'true');
  defined('TPL_BOX_SHOPPING_CART') or define('TPL_BOX_SHOPPING_CART', 'true');
  defined('TPL_BOX_WISHLIST') or define('TPL_BOX_WISHLIST', 'true');
  defined('TPL_BOX_WHATSNEW') or define('TPL_BOX_WHATSNEW', 'true');
  defined('TPL_BOX_ADMIN') or define('TPL_BOX_ADMIN', 'true');
  defined('TPL_BOX_BESTSELLERS') or define('TPL_BOX_BESTSELLERS', 'true');
  defined('TPL_BOX_REVIEWS') or define('TPL_BOX_REVIEWS', 'true');
  defined('TPL_BOX_CURRENCIES') or define('TPL_BOX_CURRENCIES', 'true');
  defined('TPL_BOX_SPECIALS') or define('TPL_BOX_SPECIALS', 'true');
  defined('TPL_BOX_SHIPPING_COUNTRY') or define('TPL_BOX_SHIPPING_COUNTRY', 'true');
  defined('TPL_BOX_XSELL') or define('TPL_BOX_XSELL', 'true');
  defined('TPL_BOX_SUBCATEGORIES') or define('TPL_BOX_SUBCATEGORIES', 'true');

  // popup
  defined('TPL_POPUP_SHIPPING_LINK_PARAMETERS') or define('TPL_POPUP_SHIPPING_LINK_PARAMETERS', '');
  defined('TPL_POPUP_SHIPPING_LINK_CLASS') or define('TPL_POPUP_SHIPPING_LINK_CLASS', 'iframe');
  defined('TPL_POPUP_CONTENT_LINK_PARAMETERS') or define('TPL_POPUP_CONTENT_LINK_PARAMETERS', '');
  defined('TPL_POPUP_CONTENT_LINK_CLASS') or define('TPL_POPUP_CONTENT_LINK_CLASS', 'iframe');
  defined('TPL_POPUP_PRODUCT_LINK_PARAMETERS') or define('TPL_POPUP_PRODUCT_LINK_PARAMETERS', '');
  defined('TPL_POPUP_PRODUCT_LINK_CLASS') or define('TPL_POPUP_PRODUCT_LINK_CLASS', 'iframe');
  defined('TPL_POPUP_COUPON_HELP_LINK_PARAMETERS') or define('TPL_POPUP_COUPON_HELP_LINK_PARAMETERS', '');
  defined('TPL_POPUP_COUPON_HELP_LINK_CLASS') or define('TPL_POPUP_COUPON_HELP_LINK_CLASS', 'iframe');
  defined('TPL_POPUP_PRODUCT_PRINT_SIZE') or define('TPL_POPUP_PRODUCT_PRINT_SIZE', '');
  defined('TPL_POPUP_PRINT_ORDER_SIZE') or define('TPL_POPUP_PRINT_ORDER_SIZE', '');
  
  // view
  // defined('PRODUCT_LIST_BOX_STARTPAGE') or define('PRODUCT_LIST_BOX_STARTPAGE', 'true'); // removed with Changeset 15659
  defined('PRODUCT_LIST_BOX_CUSTOM') or define('PRODUCT_LIST_BOX_CUSTOM', 'true');
  define('PRODUCT_LIST_BOX', ((isset($_SESSION['listbox'])) ? $_SESSION['listbox'] : PRODUCT_LIST_BOX_CUSTOM));
  defined('PRODUCT_INFO_BOX') or define('PRODUCT_INFO_BOX', 'true');
  
  // template output
  defined('TEMPLATE_ENGINE') or define('TEMPLATE_ENGINE', 'smarty_4'); 
  defined('TEMPLATE_HTML_ENGINE') or define('TEMPLATE_HTML_ENGINE', 'html5');
  defined('TEMPLATE_RESPONSIVE') or define('TEMPLATE_RESPONSIVE', 'true');
  defined('COMPRESS_JAVASCRIPT') or define('COMPRESS_JAVASCRIPT', true);

  // categories
  defined('SPECIALS_CATEGORIES') or define('SPECIALS_CATEGORIES', 'true'); 
  defined('WHATSNEW_CATEGORIES') or define('WHATSNEW_CATEGORIES', 'true');

  // check specials
  if (SPECIALS_CATEGORIES == 'true') {
    require_once (DIR_FS_INC.'check_specials.inc.php');
    define('SPECIALS_EXISTS', check_specials());
  }

  // check whats new
  if (WHATSNEW_CATEGORIES == 'true') {
    require_once (DIR_FS_INC.'check_whatsnew.inc.php');
    define('WHATSNEW_EXISTS', check_whatsnew());
  }
        
  // picture set listing box
  define('PICTURESET_ACTIVE', defined('DIR_WS_MINI_IMAGES'));
  defined('PICTURESET_BOX') or define('PICTURESET_BOX', '360:thumbnail,460:midi');
  defined('PICTURESET_ROW') or define('PICTURESET_ROW', '985:midi');
  
  // Sumo select  
  defined('ADVANCED_SUMOSELECT_SEARCHFIELD') or define('ADVANCED_SUMOSELECT_SEARCHFIELD', 'true');

  // Add quickie  
  defined('SHOW_ADD_QUICKIE') or define('SHOW_ADD_QUICKIE', TPL_BOX_QUICKIE);

  // manufacturer
  defined('HEADER_SHOW_MANUFACTURERS') or define('HEADER_SHOW_MANUFACTURERS', TPL_BOX_MANUFACTURERS);
  
  // max products
  defined('MAX_PRODUCTS_BOX') or define('MAX_PRODUCTS_BOX', 10);

  // categories menu
  // 1 - (Megamenu)
  // 2 - (Dropdown)
  defined('CATEGORIES_CASE') or define('CATEGORIES_CASE', 1);
  defined('CATEGORIES_HIDE_EMPTY') or define('CATEGORIES_HIDE_EMPTY', 'false');
  defined('CATEGORIES_MAX_DEPTH') or define('CATEGORIES_MAX_DEPTH', 3);
  defined('CATEGORIES_CHECK_SUBS') or define('CATEGORIES_CHECK_SUBS', 'true');  
  
  // asterisk
  define('TEXT_ICON_ASTERISK', '<i class="fa-solid fa-asterisk"></i>');  
    
  // theme color
  // default, blue, green, magenta, red
  // after a change, the template cache must be deleted.
  // admin -> adv. configuration -> cache options -> delete templatecache
  defined('THEME_COLOR') or define('THEME_COLOR', 'blue');  

  // template boxed style
  defined('TPL_CONFIG_BOXED') or define('TPL_CONFIG_BOXED', 'false');  

  // set base
  defined('DIR_WS_BASE') OR define('DIR_WS_BASE', xtc_href_link('', '', $request_type, false, false));

  // css buttons
  if (is_file(DIR_FS_CATALOG.'templates/'.CURRENT_TEMPLATE.'/source/inc/css_button.inc.php')) {
    require_once(DIR_FS_CATALOG.'templates/'.CURRENT_TEMPLATE.'/source/inc/css_button.inc.php');
  }
