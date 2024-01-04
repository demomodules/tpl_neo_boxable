<?php
#######################################
# TPLManager - Version 1.2 (by awids) #
#######################################

defined( '_VALID_XTC' ) or die( 'Direct Access to this location is not allowed.' );

class tplconfig {

    var $code, $title, $description, $enabled;

    function __construct() {
        $this->code = 'tplconfig';
        $this->title = constant('MODULE_TPLCONFIG_TEXT_TITLE');
        $this->description = constant('MODULE_TPLCONFIG_TEXT_DESCRIPTION');
        if (defined('MODULE_TPLCONFIG_STATUS') && MODULE_TPLCONFIG_STATUS == 'true') $this->description .= '<a class="button btnbox" style="background-color:green;border:1px solid darkgreen;text-align:center;" onclick="this.blur();" href="'.xtc_href_link(FILENAME_TPLCONFIG, 'gID=601', 'NONSSL').'">&nbsp;<br>TPLManager &raquo;<br>&nbsp;</a>';
        $this->enabled = ((defined('MODULE_TPLCONFIG_STATUS') && MODULE_TPLCONFIG_STATUS == 'true') ? true : false);
        $this->sort_order = ((defined('MODULE_TPLCONFIG_SORT_ORDER')) ? MODULE_TPLCONFIG_SORT_ORDER : '');
    }

    function process($file) {
        //do nothing
    }

    function display() {
        return array('text' => '<br>' . xtc_button(BUTTON_SAVE) . '&nbsp;' .
                               xtc_button_link(BUTTON_CANCEL, xtc_href_link(FILENAME_MODULE_EXPORT, 'set=' . $_GET['set'] . '&module='.$this->code))
                     );
    }

    function check() {
        if(!isset($this->_check)) {
          $check_query = xtc_db_query("SELECT configuration_value FROM " . TABLE_CONFIGURATION . " WHERE configuration_key = 'MODULE_TPLCONFIG_STATUS'");
          $this->_check = xtc_db_num_rows($check_query);
        }
        return $this->_check;
    }

    function install() {
        xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('MODULE_TPLCONFIG_STATUS', 'true',  '6', '1', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
        
        // set admin access
		xtc_db_query("ALTER TABLE " . TABLE_ADMIN_ACCESS . " ADD tplconfig INTEGER(1) NOT NULL DEFAULT '1'");
		
		// show boxes
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION_GROUP . " (configuration_group_id, configuration_group_title, configuration_group_description, sort_order, visible) VALUES (601, 'Box-Anzeige', 'Box-Anzeige', NULL, 601);");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_BOX_CATEGORIES', 'true', '601', '1', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_BOX_MANUFACTURERS', 'true', '601', '1', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_BOX_LAST_VIEWED', 'true', '601', '1', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_BOX_SEARCH', 'true', '601', '1', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_BOX_CONTENT', 'true', '601', '1', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_BOX_INFORMATION', 'true', '601', '1', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_BOX_MISCELLANEOUS', 'true', '601', '1', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_BOX_LANGUAGES', 'true', '601', '1', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_BOX_INFOBOX', 'true', '601', '1', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_BOX_LOGIN', 'true', '601', '1', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_BOX_NEWSLETTER', 'true', '601', '1', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_BOX_TRUSTEDSHOPS', 'true', '601', '1', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_BOX_QUICKIE', 'true', '601', '1', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_BOX_SHOPPING_CART', 'true', '601', '1', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_BOX_WISHLIST', 'true', '601', '1', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_BOX_WHATSNEW', 'true', '601', '1', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_BOX_SPECIALS', 'true', '601', '1', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_BOX_ADMIN', 'true', '601', '1', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_BOX_BESTSELLERS', 'true', '601', '1', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_BOX_REVIEWS', 'true', '601', '1', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_BOX_CURRENCIES', 'true', '601', '1', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_BOX_SHIPPING_COUNTRY', 'true', '601', '1', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_BOX_XSELL', 'true', '601', '1', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_BOX_SUBCATEGORIES', 'true', '601', '1', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		
		// Social Media Icons
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION_GROUP . " (configuration_group_id, configuration_group_title, configuration_group_description, sort_order, visible) VALUES (602, 'Social Media', 'Social Media', NULL, 602);");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_SOCIAL_FACEBOOK_STATUS', 'true', '602', '1', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, date_added) VALUES ('TPL_SOCIAL_FACEBOOK_LINK', '#', '602', '2', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_SOCIAL_TWITTER_STATUS', 'true', '602', '3', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, date_added) VALUES ('TPL_SOCIAL_TWITTER_LINK', '#', '602', '4', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_SOCIAL_INSTAGRAM_STATUS', 'true', '602', '5', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, date_added) VALUES ('TPL_SOCIAL_INSTAGRAM_LINK', '#', '602', '6', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_SOCIAL_YOUTUBE_STATUS', 'true', '602', '7', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, date_added) VALUES ('TPL_SOCIAL_YOUTUBE_LINK', '#', '602', '8', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_SOCIAL_PINTEREST_STATUS', 'true', '602', '9', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, date_added) VALUES ('TPL_SOCIAL_PINTEREST_LINK', '#', '602', '10', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_SOCIAL_LINKEDIN_STATUS', 'true', '602', '11', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, date_added) VALUES ('TPL_SOCIAL_LINKEDIN_LINK', '#', '602', '12', now())");
		
		// Payment Icons
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION_GROUP . " (configuration_group_id, configuration_group_title, configuration_group_description, sort_order, visible) VALUES (603, 'Payment Icons', 'Payment Icons', NULL, 603);");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_PAYMENT_PAYPAL', 'true', '603', '1', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_PAYMENT_MASTERCARD', 'true', '603', '2', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_PAYMENT_VISA', 'true', '603', '3', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_PAYMENT_AMEX', 'true', '603', '4', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_PAYMENT_SEPA', 'true', '603', '5', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_PAYMENT_INVOICE', 'true', '603', '6', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_PAYMENT_KLARNAINVOICE', 'true', '603', '7', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_PAYMENT_MONEYORDER', 'true', '603', '8', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_PAYMENT_NACHNAHME', 'true', '603', '9', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_PAYMENT_EASYCREDIT', 'true', '603', '10', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_PAYMENT_SOFORT', 'true', '603', '11', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_PAYMENT_CASH', 'true', '603', '12', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_PAYMENT_GIROPAY', 'true', '603', '13', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_PAYMENT_PAYONE', 'true', '603', '14', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_PAYMENT_PAYPAL_SOFORT', 'true', '603', '15', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		
		// texte (e. g. Breadcrumb-Informationen, Copyright, Hinweis-Box/Abwesenheitsmeldung)
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION_GROUP . " (configuration_group_id, configuration_group_title, configuration_group_description, sort_order, visible) VALUES (604, 'Texte', 'Texte', NULL, 604);");
        xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_NAV_TEXT1', 'DE::Startseite||EN::Main page', '604', '1', 'xtc_cfg_input_email_language;TPL_NAV_TEXT1', now())");
        xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_NAV_TEXT2', 'DE::Katalog||EN::Catalogue', '604', '2', 'xtc_cfg_input_email_language;TPL_NAV_TEXT2', now())");
        xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_FOOTER_CONTACT_INFO', 'DE::NEO (Boxable) TPL<br>Musterstr. 123<br>12345 Musterstadt<br><br>Telefon: <a href=\"tel:00490123456789\">01234 56789</a><br>Mail: <a href=\"mailto:neo@boxable.tpl\">neo@boxable.tpl</a>||EN::NEO (Boxable) TPL<br>Musterstr. 123<br>12345 Musterstadt<br><br>Telefon: <a href=\"tel:00490123456789\">01234 56789</a><br>Mail: <a href=\"mailto:neo@boxable.tpl\">neo@boxable.tpl</a>', '604', '3', 'xtc_cfg_input_email_language;TPL_FOOTER_CONTACT_INFO', now())");
        xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_COPYRIGHT_TEXT', 'DE::".STORE_NAME." - Alle Rechte vorbehalten!||EN::".STORE_NAME." - All rights reserved!', '604', '4', 'xtc_cfg_input_email_language;TPL_COPYRIGHT_TEXT', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_FRONTINFO_TEXT', 'false', '604', '5', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_FRONTINFO_CLASS', 'infomessage', '604', '6', 'xtc_cfg_select_option(array(\'successmessage\', \'infomessage\', \'errormessage\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_FRONTINFO_CONTENT', '', 604, 7, 'xtc_cfg_select_content(\'TPL_FRONTINFO_CONTENT\',', NOW())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_FRONTINFO_POS', 'startpage', '604', '8', 'xtc_cfg_select_option(array(\'startpage\', \'only_on_checkout\', \'not_on_checkout\', \'all\'), ', now())");
		
		// Sonstiges (Theme, Categories, Whats new, Specials, etc.)
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION_GROUP . " (configuration_group_id, configuration_group_title, configuration_group_description, sort_order, visible) VALUES (605, 'Sonstiges', 'Sonstige Einstellungen', NULL, 605);");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('THEME_COLOR', 'default',  '605', '1', 'pull_down_template_theme(', now())"); 
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_CONFIG_BOXED', 'false',  '605', '1', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())"); 
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TPL_CONFIG_SHORTDESCRIPTION', 'false',  '605', '2', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())"); 
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('SPECIALS_CATEGORIES', 'true',  '605', '3', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())"); 
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('WHATSNEW_CATEGORIES', 'true',  '605', '3', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())"); 
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('PRODUCT_LIST_BOX_CUSTOM', 'true',  '605', '4', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())"); 
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('PRODUCT_INFO_BOX', 'true',  '605', '6', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())"); 
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('CATEGORIES_CASE', '1',  '605', '41', 'pull_down_template_navigation(', now())"); 
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('CATEGORIES_HIDE_EMPTY', 'false', '605', '42', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, date_added) VALUES ('CATEGORIES_MAX_DEPTH', '3', '605', '43', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('CATEGORIES_CHECK_SUBS', 'true', '605', '44', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('ADVANCED_SUMOSELECT_SEARCHFIELD', 'true', '605', '45', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, date_added) VALUES ('MAX_PRODUCTS_BOX', '10', '605', '46', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, date_added) VALUES ('PICTURESET_BOX', '360:thumbnail,460:midi', '605', '47', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, date_added) VALUES ('PICTURESET_ROW', '985:midi', '605', '48', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('TEMPLATE_ENGINE', 'smarty_4',  '605', '60', 'xtc_cfg_select_option(array(\'smarty_2\', \'smarty_3\', \'smarty_4\'), ', now())"); 
		
		// PopUp-Fenster-Optionen
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION_GROUP . " (configuration_group_id, configuration_group_title, configuration_group_description, sort_order, visible) VALUES (606, 'PopUp\'s', 'PopUp\'s', NULL, 606);");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value,  configuration_group_id, sort_order, date_added) VALUES ('TPL_POPUP_SHIPPING_LINK_PARAMETERS', '',  '606', '1', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value,  configuration_group_id, sort_order, date_added) VALUES ('TPL_POPUP_SHIPPING_LINK_CLASS', 'iframe',  '606', '2', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value,  configuration_group_id, sort_order, date_added) VALUES ('TPL_POPUP_CONTENT_LINK_PARAMETERS', '',  '606', '3', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value,  configuration_group_id, sort_order, date_added) VALUES ('TPL_POPUP_CONTENT_LINK_CLASS', 'iframe',  '606', '4', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value,  configuration_group_id, sort_order, date_added) VALUES ('TPL_POPUP_PRODUCT_LINK_PARAMETERS', '',  '606', '5', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value,  configuration_group_id, sort_order, date_added) VALUES ('TPL_POPUP_PRODUCT_LINK_CLASS', 'iframe',  '606', '6', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value,  configuration_group_id, sort_order, date_added) VALUES ('TPL_POPUP_COUPON_HELP_LINK_PARAMETERS', '',  '606', '7', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value,  configuration_group_id, sort_order, date_added) VALUES ('TPL_POPUP_COUPON_HELP_LINK_CLASS', 'iframe',  '606', '8', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value,  configuration_group_id, sort_order, date_added) VALUES ('TPL_POPUP_PRODUCT_PRINT_SIZE', '',  '606', '9', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value,  configuration_group_id, sort_order, date_added) VALUES ('TPL_POPUP_PRINT_ORDER_SIZE', '',  '606', '10', now())");
		
		// vorinstallierte Module
		// Produkt- und Attribut-Lagerampel - awids / web28 / noRiddle
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION_GROUP . " (configuration_group_id, configuration_group_title, configuration_group_description, sort_order, visible) VALUES (607, 'Modules', 'Modules', NULL, 607);");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value,  configuration_group_id, sort_order, set_function, date_added) VALUES ('MODULE_TRAFFIC_LIGHTS_STATUS', 'true',  '607', '1', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value,  configuration_group_id, sort_order, set_function, date_added) VALUES ('MODULE_TRAFFIC_LIGHTS_LISTING', 'true',  '607', '2', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value,  configuration_group_id, sort_order, set_function, date_added) VALUES ('MODULE_TRAFFIC_LIGHTS_LISTING_LIGHT', 'light',  '607', '3', 'xtc_cfg_select_option(array(\'light\', \'text\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value,  configuration_group_id, sort_order, set_function, date_added) VALUES ('MODULE_TRAFFIC_LIGHTS_INFO', 'true',  '607', '4', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value,  configuration_group_id, sort_order, set_function, date_added) VALUES ('MODULE_TRAFFIC_LIGHTS_INFO_LIGHT', 'light',  '607', '5', 'xtc_cfg_select_option(array(\'light\', \'text\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value,  configuration_group_id, sort_order, set_function, date_added) VALUES ('MODULE_TRAFFIC_LIGHTS_ATTRIBUTES', 'true',  '607', '6', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value,  configuration_group_id, sort_order, set_function, date_added) VALUES ('MODULE_TRAFFIC_LIGHTS_ATTRIBUTES_FLOW_IN', 'true',  '607', '7', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value,  configuration_group_id, sort_order, set_function, date_added) VALUES ('MODULE_TRAFFIC_LIGHTS_ATTRIBUTES_SHOW_STOCK', 'true',  '607', '8', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value,  configuration_group_id, sort_order, set_function, date_added) VALUES ('MODULE_TRAFFIC_LIGHTS_STOCK_RED_YELL', '1',  '607', '21', '', now())");
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value,  configuration_group_id, sort_order, set_function, date_added) VALUES ('MODULE_TRAFFIC_LIGHTS_STOCK_GREEN', '5',  '607', '22', '', now())");
		// Attributauswahl als Pflichtfeld und vorbelegt mit "Bitte wählen" - Modulfux
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value,  configuration_group_id, sort_order, set_function, date_added) VALUES ('MODULE_MODULFUX_ATTRIBUTES_DEFAULT_STATUS', 'true',  '607', '31', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
		// categoriesFlag - awids
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value,  configuration_group_id, sort_order, set_function, date_added) VALUES ('MODULE_CATEGORIES_FLAG_STATUS', 'true',  '607', '41', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");  
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value,  configuration_group_id, sort_order, set_function, date_added) VALUES ('MODULE_CATEGORIES_FLAG_SPECIALS', 'true',  '607', '42', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");  
		xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value,  configuration_group_id, sort_order, set_function, date_added) VALUES ('MODULE_CATEGORIES_FLAG_NEWPRODUCTS', 'true',  '607', '43', 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");  
		xtc_db_query("ALTER TABLE " . TABLE_CATEGORIES . " ADD flags INT(1) NOT NULL DEFAULT '0'");
    }

    function remove() {
        // Modul-Status
        xtc_db_query("DELETE FROM " . TABLE_CONFIGURATION . " WHERE configuration_key LIKE 'MODULE_TPLCONFIG_%'");
        
        // remove admin access entries
        xtc_db_query("ALTER TABLE " . TABLE_ADMIN_ACCESS . " DROP tplconfig");
        
        // Boxen
        xtc_db_query("DELETE FROM " . TABLE_CONFIGURATION . " WHERE configuration_group_id = '601'");
        xtc_db_query("DELETE FROM " . TABLE_CONFIGURATION_GROUP . " WHERE configuration_group_id = '601'");
        
        // Social Media
        xtc_db_query("DELETE FROM " . TABLE_CONFIGURATION . " WHERE configuration_group_id = '602'");
        xtc_db_query("DELETE FROM " . TABLE_CONFIGURATION_GROUP . " WHERE configuration_group_id = '602'");
        
        // Payment Icons
        xtc_db_query("DELETE FROM " . TABLE_CONFIGURATION . " WHERE configuration_group_id = '603'");
        xtc_db_query("DELETE FROM " . TABLE_CONFIGURATION_GROUP . " WHERE configuration_group_id = '603'");
        
        // Texte
        xtc_db_query("DELETE FROM " . TABLE_CONFIGURATION . " WHERE configuration_group_id = '604'");
        xtc_db_query("DELETE FROM " . TABLE_CONFIGURATION_GROUP . " WHERE configuration_group_id = '604'");
        
        // Sonstiges
        xtc_db_query("DELETE FROM " . TABLE_CONFIGURATION . " WHERE configuration_group_id = '605'");
        xtc_db_query("DELETE FROM " . TABLE_CONFIGURATION_GROUP . " WHERE configuration_group_id = '605'");
        
        // PopUp-Fenster-Optionen
        xtc_db_query("DELETE FROM " . TABLE_CONFIGURATION . " WHERE configuration_group_id = '606'");
        xtc_db_query("DELETE FROM " . TABLE_CONFIGURATION_GROUP . " WHERE configuration_group_id = '606'");

        // vorinstallierte Module
        xtc_db_query("DELETE FROM " . TABLE_CONFIGURATION . " WHERE configuration_group_id = '607'");
        xtc_db_query("DELETE FROM " . TABLE_CONFIGURATION . " WHERE configuration_key LIKE 'MODULE_TRAFFIC_LIGHTS_%'");
        xtc_db_query("DELETE FROM " . TABLE_CONFIGURATION . " WHERE configuration_key LIKE 'MODULE_MODULFUX_ATTRIBUTES_DEFAULT_%'");
        xtc_db_query("DELETE FROM " . TABLE_CONFIGURATION . " WHERE configuration_key LIKE 'MODULE_CATEGORIES_FLAG_%'");
        xtc_db_query("ALTER TABLE " . TABLE_CATEGORIES . " DROP flags");
    }

    function keys() {
        return array('MODULE_TPLCONFIG_STATUS');
    }    
    
}
?>