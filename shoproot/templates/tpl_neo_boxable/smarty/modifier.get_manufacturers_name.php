<?php
function smarty_modifier_get_manufacturers_name($id) {
    
    $manufacturer = '';
    
    $products_query = xtDBquery("SELECT manufacturers_id FROM ".TABLE_PRODUCTS." WHERE products_id = '".$id."'");
    
    if (xtc_db_num_rows($products_query, true) > 0) {
      $products_result = xtc_db_fetch_array($products_query, true);
      $manufacturers_query = xtDBquery("SELECT manufacturers_name 
                                          FROM ".TABLE_MANUFACTURERS." 
                                         WHERE manufacturers_id = '".$products_result['manufacturers_id']."'
                                           AND manufacturers_status = 1");
      if (xtc_db_num_rows($manufacturers_query, true) > 0) {
        $manufacturers_result = xtc_db_fetch_array($manufacturers_query, true);
        $manufacturer = $manufacturers_result['manufacturers_name'];
      }
    }
    
    return $manufacturer;
       
}
?>