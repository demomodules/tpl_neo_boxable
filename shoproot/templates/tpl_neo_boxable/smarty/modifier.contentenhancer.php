<?php
/************************************************************
* file: modifier.contentenhancer.php
* path: /templates/YOUR_TEMPLATE/smarty/
* use: smarty modifier fo module "Themenwelten"
*
* © copyright p3e, MK
*
* adapted to work also on meta tags 
* and therefore outsourced functions, noRiddle, 04-2021
***********************************************************/

if(!function_exists('contentenhancer_inc')) {
    require_once(DIR_FS_INC.'contentenhancer.inc.php');
}

function smarty_modifier_contentenhancer ($html) {    
    $html = contentenhancer_inc($html);

    return $html;
}
?>