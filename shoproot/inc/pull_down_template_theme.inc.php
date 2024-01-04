<?php
#######################################
# TPLManager - Version 1.2 (by awids) #
#######################################

function pull_down_template_theme($current_template) {
	$name = (($key) ? 'configuration['.$key.']' : 'configuration_value');
	if ($dir = @opendir(DIR_FS_CATALOG.'templates/'.CURRENT_TEMPLATE.'/css/themes/')) {
		while (($templates = readdir($dir)) !== false) {
			if (is_file(DIR_FS_CATALOG.'templates/'.CURRENT_TEMPLATE.'/css/themes/'."//".$templates) and ($templates != "CVS") and ($templates != ".") and ($templates != "..")) {
				$templates = str_replace('.css', '', $templates);
				$templates_array[] = array ('id' => $templates, 'text' => $templates);
			}
		}
		closedir($dir);
		if (count($templates_array) > 0) {
		    sort($templates_array);
		    return xtc_draw_pull_down_menu($name, $templates_array, $current_template);
		} else {
			echo 'There are no theme files in folder <strong>'.DIR_FS_CATALOG.'templates/'.CURRENT_TEMPLATE.'/css/themes/</strong>.';
		}
	} else {
			echo 'Folder <strong>'.DIR_FS_CATALOG.'templates/'.CURRENT_TEMPLATE.'/css/themes/</strong> does not exists.';
	}
}

?>