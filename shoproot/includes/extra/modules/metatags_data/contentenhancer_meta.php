<?php
/***********************************************************************
* file: contentenhancer_meta.php
* path: /includes/extra/modules/metatags_data/
* use:  convert placeholders for module "Themenwelten" in meta tags
************************************************************************
* © copyright MK, p3e, noRiddle, awids
* outsourced function to use also on meta tags, noRiddle, 04-2021
* alternative category image from shop version 2.0.6.0, awids, 04-2021
* define a minimum stock quantity, awids, 05-2023
***********************************************************************/

if(!function_exists('contentenhancer_inc')) {
  require_once(DIR_FS_INC.'contentenhancer.inc.php');
}

if(isset($metadata_array['title'])) $metadata_array['title'] = contentenhancer_inc($metadata_array['title']);
if(isset($metadata_array['description'])) $metadata_array['description'] = contentenhancer_inc($metadata_array['description']);
if(isset($metadata_array['keywords'])) $metadata_array['keywords'] = contentenhancer_inc($metadata_array['keywords']);

?>