<?php
/***********************************************************************
* file: contentenhancer.inc.php
* path: /inc/
* use:  functions for module "Themenwelten"
************************************************************************
* © copyright MK, p3e, noRiddle, awids
* outsourced function to use also on meta tags, noRiddle, 04-2021
* alternative category image from shop version 2.0.6.0, awids, 04-2021
* define a minimum stock quantity, awids, 05-2023
***********************************************************************/

function contentenhancer_inc($html) {
    if (preg_match_all('/(\[products [^\]]+\])/', $html, $matches)) {
        foreach ($matches[1] AS $snippet) {
            $products_models = null;
            $categories_ids = null;
            $keywords = null;
            $clearwords = null;
            $min_quantity = null;
            
            if (preg_match('/products_models\=\'([^\']+)\'/', $snippet, $model_matches)) {
                $t_models = explode(',', $model_matches[1]);
                $products_models = array();
                foreach ($t_models AS $model) {
                    $products_models[] = xtc_db_input(trim($model));
                }
            }
            
            if (preg_match('/categories_ids\=\'([^\']+)\'/', $snippet, $categories_ids_matches)) {
                $t_categories_ids = explode(',', $categories_ids_matches[1]);
                $categories_ids = array();
                foreach ($t_categories_ids AS $categories_id) {
                    $categories_ids[] = (int)$categories_id;
                }
            }
            
            if (preg_match('/keywords\=\'([^\']+)\'/', $snippet, $keyword_matches)) {
                $t_keywords = explode(',', $keyword_matches[1]);
                $keywords = array();
                foreach ($t_keywords AS $keyword) {
                    $keywords[] = xtc_db_input(trim($keyword));
                }
            }
            
            if (preg_match('/clearwords\=\'([^\']+)\'/', $snippet, $clearword_matches)) {
                $t_clearwords = explode(',', $clearword_matches[1]);
                $clearwords = array();
                foreach ($t_clearwords AS $clearword) {
                    $clearwords[] = xtc_db_input(trim($clearword));
                }
            }
            
            // define a minimum stock quantity - awids - 2023-05
            if (preg_match('/min_quantity\=\'([0-9]+)\'/', $snippet, $min_quantity_matches)) {
                $t_min_quantity = explode(',', $min_quantity_matches[1]);
                $min_quantity = array();
                foreach ($t_min_quantity AS $quantity) {
                    $min_quantity[] = xtc_db_input(trim($quantity));
                }
            }
            
            $html = str_replace($snippet, parseProducts($products_models, $categories_ids, $keywords, $clearwords, $min_quantity), $html);
            
        }
    }
        
        if (preg_match_all('/(\[categories [^\]]+\])/', $html, $matches)) {
         foreach ($matches[1] AS $snippet) {
              if (preg_match('/categories_ids\=\'([^\']+)\'/', $snippet, $categories_ids_matches)) {
                $t_categories_ids = explode(',', $categories_ids_matches[1]);
                $categories_ids = array();
                foreach ($t_categories_ids AS $categories_id) {
                    $categories_ids[] = (int)$categories_id;
            
                }

            }
    
            $html = str_replace($snippet, parseCategories($categories_ids), $html);
         }
    }
        
    return $html;
}

function parseCategories($categories_ids = NULL) {
    if (is_array($categories_ids)) {
        $group_check = '';
        if (GROUP_CHECK == 'true') {
            $group_check = "c.group_permission_".$_SESSION['customers_status']['customers_status_id']."=1 AND";
        }
        
        $q = "SELECT 
                c.categories_id,
                c.categories_image, 
                c.categories_image_list, 
                cd.categories_name 
            FROM categories AS c 
            LEFT JOIN categories_description as cd 
            ON c.categories_id = cd.categories_id 
            WHERE c.categories_id IN ('".implode("', '", $categories_ids)."') 
            AND ".$group_check." c.categories_status = '1' 
            AND cd.language_id = '" .(int) $_SESSION['languages_id'] ."'
            order by FIND_IN_SET(c.categories_id,'".implode(",", $categories_ids)."')";

            $categories_query = xtDBquery($q);
            
          while($categories = xtc_db_fetch_array($categories_query, true)) {
            $category_link =xtc_category_link($categories['categories_id'],$categories['categories_name']);
			if ($categories['categories_image_list'] != '') {
			  $image = $categories['categories_image_list'];
			} elseif ($categories['categories_image'] != '' && $categories['categories_image_list'] == '') {
			  $image = $categories['categories_image'];
			} else {
			  if (CATEGORIES_IMAGE_SHOW_NO_IMAGE == 'true') {
			    $image = 'noimage.gif';
			  } else {
			    $image = '';
			  }
			}
            $module_content[] = array ('CATEGORY_NAME'			=> $categories['categories_name'],
			                           'CATEGORY_IMAGE_TRUE'  	=> $image,        
			                           'CATEGORY_IMAGE'       	=> DIR_WS_IMAGES .'categories/' . $image, 
			                           'CATEGORY_LINK'        	=> xtc_href_link(FILENAME_DEFAULT,  xtc_get_all_get_params(array('cat','page','filter_id','manufacturers_id')) . $category_link)
			                          );
            
            
        }       

        $smarty = new Smarty;
        $smarty->assign('categories', $module_content);
        $smarty->assign('language', $_SESSION["language"]);
        $html = $smarty->fetch(CURRENT_TEMPLATE.'/module/modules/content_enhancer/listing_cats.html');          

        return $html;
    }
}
    
function parseProducts($products_models = null, $categories_ids = null, $keywords = null, $clearwords = null, $min_quantity = null) {
    if (is_array($products_models) || is_array($categories_ids) || is_array($keywords) || is_array($clearwords) || is_array($min_quantity)) {
        $group_check = '';
        $fsk_lock = '';
        
        if ($_SESSION['customers_status']['customers_fsk18_display'] == '0') {
            $fsk_lock = ' AND p.products_fsk18!=1';
        }
        
        if (GROUP_CHECK == 'true') {
            $group_check = " AND p.group_permission_".$_SESSION['customers_status']['customers_status_id']."=1 ";
        }
        
        $q = "SELECT * FROM 
                        ".TABLE_PRODUCTS." p
                        JOIN ".TABLE_PRODUCTS_DESCRIPTION." pd ON (p.products_id = pd.products_id AND pd.language_id = ".(int)$_SESSION["languages_id"].")
              WHERE 
                    p.products_status = 1 ".$fsk_lock.$group_check;
        
        if (is_array($products_models)) {
            $q .= " AND p.products_model IN ('".implode("', '", $products_models)."') ";
        }
        
	    // define a minimum stock quantity - awids - 2023-05
	    if (is_array($min_quantity)) {
	        $q .= " AND p.products_quantity >= '".$min_quantity[0]."' ";
	    }
        
        if (is_array($categories_ids)) {
            $q .= " AND p.products_id IN (SELECT p2c.products_id FROM ".TABLE_PRODUCTS_TO_CATEGORIES." p2c WHERE p2c.categories_id IN (".implode(',', $categories_ids).")) ";
        }

        if (is_array($clearwords)) {
            foreach ($clearwords AS $clearword) {
                $q .= " AND
                          ( pd.products_keywords NOT LIKE ('%".$clearword."%') 
                                AND
                            pd.products_name NOT LIKE ('%".$clearword."%') 
                                AND
                            pd.products_description NOT LIKE ('%".$clearword."%')
                           )
                        ";
            }
        }
        
        if (is_array($keywords)) {
            $q .= " AND (1!=1";
            foreach ($keywords AS $keyword) {
                $q .= " OR
                          ( pd.products_keywords LIKE ('%".$keyword."%') 
                                OR
                            pd.products_name LIKE ('%".$keyword."%') 
                                OR
                            pd.products_description LIKE ('%".$keyword."%')
                           )
                        ";
            }
            $q .= ")";
        }

        global $product;
        $module_content = array();
        $listing_query = xtDBquery($q);
        while ($listing = xtc_db_fetch_array($listing_query, true)) {
            $module_content[] =  $product->buildDataArray($listing);
        }
        
        $smarty = new Smarty;
        $smarty->assign('products', $module_content);
        $smarty->assign('language', $_SESSION["language"]);
        $html = $smarty->fetch(CURRENT_TEMPLATE.'/module/modules/content_enhancer/listing.html');
        return $html;
        
    }
    
    return '';
}
?>