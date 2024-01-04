<?php
#######################################
# TPLManager - Version 1.2 (by awids) #
#######################################

define('BOX_CONFIGURATION_607', 'Module');
define('TPL_CONF_PAGEINFO', '<strong>Auf dieser Seite werden vorinstallierte Module konfiguriert. Diese sind bereits im Template integriert.</strong>');

// Lagerampel
define('MODULE_TRAFFIC_LIGHTS_MODULINFO','<small style="color:green;">Lagerampel</small><br>');
define('MODULE_TRAFFIC_LIGHTS_STATUS_TITLE', MODULE_TRAFFIC_LIGHTS_MODULINFO.'Status');
define('MODULE_TRAFFIC_LIGHTS_LISTING_TITLE', MODULE_TRAFFIC_LIGHTS_MODULINFO.'Produktlisting');
define('MODULE_TRAFFIC_LIGHTS_LISTING_LIGHT_TITLE', MODULE_TRAFFIC_LIGHTS_MODULINFO.'Produktlisting: Art der Anzeige');
define('MODULE_TRAFFIC_LIGHTS_INFO_TITLE', MODULE_TRAFFIC_LIGHTS_MODULINFO.'Produktdetailseite');
define('MODULE_TRAFFIC_LIGHTS_INFO_LIGHT_TITLE', MODULE_TRAFFIC_LIGHTS_MODULINFO.'Produktdetailseite: Art der Anzeige');
define('MODULE_TRAFFIC_LIGHTS_ATTRIBUTES_TITLE', MODULE_TRAFFIC_LIGHTS_MODULINFO.'Attribute (Produktdetailseite)');
define('MODULE_TRAFFIC_LIGHTS_ATTRIBUTES_FLOW_IN_TITLE', MODULE_TRAFFIC_LIGHTS_MODULINFO.'Hover-Effekt bei Attributen');
define('MODULE_TRAFFIC_LIGHTS_ATTRIBUTES_SHOW_STOCK_TITLE', MODULE_TRAFFIC_LIGHTS_MODULINFO.'Attributs-Lagerbest&auml;nde');
define('MODULE_TRAFFIC_LIGHTS_STOCK_RED_YELL_TITLE', MODULE_TRAFFIC_LIGHTS_MODULINFO.'Minimum-Wert');
define('MODULE_TRAFFIC_LIGHTS_STOCK_GREEN_TITLE', MODULE_TRAFFIC_LIGHTS_MODULINFO.'Maximum-Wert');
define('MODULE_TRAFFIC_LIGHTS_STATUS_DESC','Wollen Sie die Lagerampel aktivieren?');
define('MODULE_TRAFFIC_LIGHTS_TEXT_DESCRIPTION', '<span style="font-size:12px;">Hierbei handelt es sich um eine Produkt und Attribut Lagerampel f&uuml;r die <strong>modified eCommerce Shopsoftware 2 ab Revision r9678</strong>, welche wahlweise eine grafische Lagerampel oder den Lagerbestand in den Ampelfarben abbildet.</span>');    
define('MODULE_TRAFFIC_LIGHTS_LISTING_DESC','Soll die Lagerampel im Produktlisting angezeigt werden?');
define('MODULE_TRAFFIC_LIGHTS_LISTING_LIGHT_DESC','Wie soll die Lagerampel im Produktlisting angezeigt werden?<br><ul><li>light: grafische Lagerampel</li><li>text: Text-Lagerampel mit farbiger Lagerstatus-Anzeige</li></ul>');
define('MODULE_TRAFFIC_LIGHTS_INFO_DESC','Soll die Lagerampel auf der Produktdetailseite angezeigt werden?');
define('MODULE_TRAFFIC_LIGHTS_INFO_LIGHT_DESC','Wie soll die Lagerampel auf der Produktdetailseite angezeigt werden?<br><ul><li>light: grafische Lagerampel</li><li>text: Text-Lagerampel mit farbiger Lagerstatus-Anzeige</li></ul>');
define('MODULE_TRAFFIC_LIGHTS_ATTRIBUTES_DESC','Soll die Lagerampel auf der Produktdetailseite auch f&uuml;r Attribute aktiviert werden?');
define('MODULE_TRAFFIC_LIGHTS_ATTRIBUTES_FLOW_IN_DESC','Bei aktivierter Einstellung wird ein sogenannter &quot;flow-in&quot; mit einem Infotext zum Lagerstatus eingeblendet. Bleibt die Einstellung deaktiviert, bekommt der Kunde ausschlie&szlig;lich die grafische Ampel zu sehen.');
define('MODULE_TRAFFIC_LIGHTS_ATTRIBUTES_SHOW_STOCK_DESC','Sollen die jeweiligen Attributs-Lagerbest&auml;nde beim &quot;flow-in&quot; mit angezeigt werden?');
define('MODULE_TRAFFIC_LIGHTS_STOCK_RED_YELL_DESC','Geben Sie hier den Minimum-Wert f&uuml;r die gelbe Ampel ein. Alle Werte darunter werden mit einer roten Ampel versehen.');
define('MODULE_TRAFFIC_LIGHTS_STOCK_GREEN_DESC','Geben Sie hier den Wert ein, ab dem eine gr&uuml;ne Ampel anzeigt werden soll. Alle Werte darunter bis zum Minimum-Wert werden mit einer gelben Ampel versehen.');
define('MODULE_TRAFFIC_LIGHTS_STATUS_INFO','<strong><span style="color:green;">Die Lagerampel wird angezeigt.</span></strong>');
define('MODULE_TRAFFIC_LIGHTS_STATUS_INFO2','<strong><span style="color:red;">Die Lagerampel wird nicht angezeigt.</span></strong>');

// Attributauswahl als Pflichtfeld und vorbelegt mit "Bitte wählen"
define('MODULE_MODULFUX_ATTRIBUTES_DEFAULT_MODULINFO', '<small style="color:blue;">Attributauswahl als Pflichtfeld und vorbelegt mit &quot;Bitte w&auml;hlen&quot;</small><br>');
define('MODULE_MODULFUX_ATTRIBUTES_DEFAULT_STATUS_TITLE', MODULE_MODULFUX_ATTRIBUTES_DEFAULT_MODULINFO.'Status');
define('MODULE_MODULFUX_ATTRIBUTES_DEFAULT_STATUS_DESC', 'Wollen Sie die Attributauswahl als Pflichtfeld aktivieren und die Attributsauswahl mit "Bitte w&auml;hlen" erweitern?');

// Kategorie-Flaggen 
define('MODULE_CATEGORIES_FLAG_MODULINFO','<small style="color:darkred;">Kategorie-Flaggen</small><br>');
define('MODULE_CATEGORIES_FLAG_STATUS_TITLE', MODULE_CATEGORIES_FLAG_MODULINFO.'Status');
define('MODULE_CATEGORIES_FLAG_STATUS_DESC', 'Dieses Modul setzt bei Auswahl in der Kategoriebearbeitung eine kleine Flagge/Markierung hinter den Kategorienamen, um ihn f&uuml;r Kunden interessanter zu machen.');
define('MODULE_CATEGORIES_FLAG_SPECIALS_TITLE', MODULE_CATEGORIES_FLAG_MODULINFO.'%-Flag bei "Angebote"-Kategorie');
define('MODULE_CATEGORIES_FLAG_SPECIALS_DESC', 'Wenn in der TOP-Navigation auch die Sondernangebote angezeigt werden, kann f&uuml;r diese die Kategorie-Flagge "%" aktiviert werden.');
define('MODULE_CATEGORIES_FLAG_NEWPRODUCTS_TITLE', MODULE_CATEGORIES_FLAG_MODULINFO.'NEU-Flag bei "Neue Artikel"-Kategorie');
define('MODULE_CATEGORIES_FLAG_NEWPRODUCTS_DESC', 'Wenn in der TOP-Navigation auch die neuen Artikel angezeigt werden, kann f&uuml;r diese die Kategorie-Flagge "NEU" aktiviert werden.');

?>