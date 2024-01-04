<?php
#######################################
# TPLManager - Version 1.2 (by awids) #
#######################################

function pull_down_template_navigation($current_template) {
	$name = (($key) ? 'configuration['.$key.']' : 'configuration_value');
	$navigation_array = array();
	$navigation_array[] = array ('id' => '1', 'text' => 'Megamenu');
	$navigation_array[] = array ('id' => '2', 'text' => 'Dropdown-Menu');
    sort($navigation_array);
    return xtc_draw_pull_down_menu($name, $navigation_array, $current_template);
}

?>