<?php
#######################################
# TPLManager - Version 1.2 (by awids) #
#######################################

define('BOX_CONFIGURATION_605', 'Sonstige Einstellungen');
define('TPL_CONF_PAGEINFO', '<strong>Hier k&ouml;nnen Sie verschiedene Template-Verhalten definieren, z. B. ob Produkte in den Produktlisten bzw. auf der Startseite in einer Box oder in einer Liste angezeigt werden sollen.</strong><br><br>Dar&uuml;ber hinaus besteht die M&ouml;glichkeit, das Farbschema (Theme) des Templates zu &auml;ndern. <br><br>Beachten Sie bitte ggf. vorhandene Hinweise in den nachstehenden Beschreibungstexten.');
define('SPECIALS_CATEGORIES_TITLE', '<i>Angebote</i> im Kategoriebaum');
define('SPECIALS_CATEGORIES_DESC', 'M&ouml;chten Sie einen Link zu Ihren (Sonder-)Angeboten mit im Kategoriebaum der Kategoriebox aufnehmen? Bei "Nein" erscheinen Ihre Angebote in einer eigenen Box, sofern diese im Reiter "Boxen" aktiviert ist.');
define('WHATSNEW_CATEGORIES_TITLE', '<i>Neue Artikel</i> im Kategoriebaum');
define('WHATSNEW_CATEGORIES_DESC', 'M&ouml;chten Sie einen Link zu Ihren Neuerscheinungen (Neue Artikel) mit im Kategoriebaum der Kategoriebox aufnehmen? Bei "Nein" erscheinen Ihre Neuerscheinungen in einer eigenen Box, sofern diese im Reiter "Boxen" aktiviert ist.');
define('TEMPLATE_ENGINE_TITLE', 'Smarty-Version');
define('TEMPLATE_ENGINE_DESC', 'W&auml;hlen Sie hier zwischen den Smarty-Versionen "smarty_2", "smarty_3 oder "smarty_4".<br><br><strong>Bitte beachten Sie:</strong><br>Nur "smarty_3" und "smarty_4" unterst&uuml;tzen die custom-Sprachdateien (lang_english.custom & lang_german.custom) im Template-Ordner /lang/. Bei einer Umschaltung auf smarty_2 werden die hierin enthaltenen Sprach-Konstanten im Shop nicht mehr angezeigt.');
define('PRODUCT_LIST_BOX_CUSTOM_TITLE', 'Artikel-Darstellung: Produktlisten');
define('PRODUCT_LIST_BOX_CUSTOM_DESC', '<strong>Ja</strong> zeigt Artikel in den Produktlisten einer Kategorie in der Box-Ansicht, <strong>Nein</strong> zeigt sie in einer Listen-Ansicht. Betrachten Sie dies lediglich als Standard-Einstellung: Schaltet ein/e Nutzer/in die Ansicht &uuml;ber die daf&uuml;r vorgesehenen Buttons im Frontend des Shops um, gilt diese Auswahl w&auml;hrend ihrer/seiner Sitzung (also nur f&uuml;r sie/ihn) als Master-Einstellung.');
define('PRODUCT_LIST_BOX_STARTPAGE_TITLE', 'Artikel-Darstellung: Startseite');
define('PRODUCT_LIST_BOX_STARTPAGE_DESC', '<strong>Ja</strong> zeigt Artikel auf der Startseite in der Box-Ansicht, <strong>Nein</strong> zeigt sie in einer Listen-Ansicht. Diese Einstellung ist unabh&auml;ngig von get&auml;tigten Kunden-Einstellungen. (vgl. Beschreibungstext "Artikel-Darstellung: Produktlisten")');
define('PRODUCT_INFO_BOX_TITLE', 'Artikel-Darstellung: Produkt-Seite');
define('PRODUCT_INFO_BOX_DESC', '<strong>Ja</strong> zeigt Artikel auf der Produktseite f&uuml;r die Module Cross-Selling-, Reverse-Cross-Selling- & Also-Purchased-Artikel in der Box-Ansicht, <strong>Nein</strong> zeigt sie in einer Listen-Ansicht. Diese Einstellung ist unabh&auml;ngig von get&auml;tigten Kunden-Einstellungen. (vgl. Beschreibungstext "Artikel-Darstellung: Produktlisten")');
define('THEME_COLOR_TITLE', 'Farbschema (Theme)');
define('THEME_COLOR_DESC', 'Legen Sie hier die Farbgebung des Templates fest. Sie k&ouml;nnen unter templates/'.CURRENT_TEMPLATE.'/css/themes/ auch eigene Dateien anlegen. Diese werden dann automatisch hier zur Auswahl angezeigt.');
define('TPL_CONFIG_BOXED_TITLE', '"Boxed"-Style');
define('TPL_CONFIG_BOXED_DESC', 'Standardm&auml;&szlig;ig erstreckt sich das Template auf den meisten Ger&auml;ten &uuml;ber die gesamte Bildschirmbreite (maximal bis 1440px). Geschm&auml;cker sind bekanntlich verschieden. Wer lieber mit einer festen Breite arbeitet, kann das Template &uuml;ber diese Einstellung in eine Box von 1125px Breite "einschlie&szlig;en". Zudem wird ein Hintergrundbild eingeblendet.');
define('CATEGORIES_CASE_TITLE', 'Kategorieart');
define('CATEGORIES_CASE_DESC', 'Legen Sie hier fest, ob Sie ein Mega- oder Dropdown-Men&uuml; in der Desktop-Ansicht angezeigt bekommen m&ouml;chten.');
define('CATEGORIES_HIDE_EMPTY_TITLE', 'Leere Kategorien ausblenden');
define('CATEGORIES_HIDE_EMPTY_DESC', 'Sollen leere Kategorien in der Navigation ausgeblendet werden?');
define('CATEGORIES_MAX_DEPTH_TITLE', 'Kategorie-Tiefe');
define('CATEGORIES_MAX_DEPTH_DESC', 'Wie viele Ebenen sollen im <u>mobilen Men&uuml;</u> angezeigt werden? (Im Mega- und Dropdown-Men&uuml; werden alle Kategorien nach der 3. Ebene automatisch ausgeblendet, d. h. diese Einstellung greift hier nur f&uuml;r die Ebenen 1 - 3. Um dies zu &auml;ndern, muss zun&auml;chst das CSS angepasst und erweitert werden.)');
define('CATEGORIES_CHECK_SUBS_TITLE', 'Unterkategorie-Pr&uuml;fung');
define('CATEGORIES_CHECK_SUBS_DESC', 'Ist diese Einstellung aktiviert, werden in den Men&uuml;s Richtungspfeile angezeigt, z. B. in der Hauptleiste nach unten zeigend und im DropDown-Men&uuml; die Pfeile nach rechts, die weitere Unterkategorien anzeigen sollen.');
define('ADVANCED_SUMOSELECT_SEARCHFIELD_TITLE', 'Suchfeld in Dropdowns');
define('ADVANCED_SUMOSELECT_SEARCHFIELD_DESC', 'Bei Aktivierung dieser Einstellung wird nach &Ouml;ffnen eines Dropdows bei l&auml;ngeren Listen (z. B. L&auml;nder) ein Suchfeld angezeigt.');
define('MAX_PRODUCTS_BOX_TITLE', 'Produktanzahl in Sliderboxen');
define('MAX_PRODUCTS_BOX_DESC', 'Wie viele Produkte sollen in den Sliderboxen auf der Start- bzw. Newsletterseite oder im Warenkorb maximal angezeigt werden? (box_specials, box_whatsnew, box_lastviewed, box_bestseller)');
define('PICTURESET_BOX_TITLE', 'Bilderset (Boxansicht)');
define('PICTURESET_BOX_DESC', 'Legen Sie hier fest, welche Bildgr&ouml;&szlig;en ab einer bestimmten Browseraufl&ouml;sung in der Produktbox-Ansicht angezeigt werden sollen. Dies hat den Vorteil, dass z. B. auf Mobilger&auml;ten kleinere Bilder geladen werden, als auf Desktop-Ger&auml;ten.<br><br><strong>Beispiel:</strong><br>Ab einer Aufl&ouml;sung von 360px sollen die Bilder aus dem Ordner thumbnail_images geladen werden und ab 460px aus dem Ordner midi_images, was wie folgt anzugeben ist: <span style="color:darkred;font-weight:bold;">360:thumbnail,460:midi</span> (Es k&ouml;nnen auch mehrere Aufl&ouml;sungen kommasepariert angegeben werden.)');
define('PICTURESET_ROW_TITLE', 'Bilderset (Zeilenansicht)');
define('PICTURESET_ROW_DESC', 'Legen Sie hier fest, welche Bildgr&ouml;&szlig;en ab einer bestimmten Browseraufl&ouml;sung in der Produktzeilen-Ansicht angezeigt werden sollen. Dies hat den Vorteil, dass z. B. auf Mobilger&auml;ten kleinere Bilder geladen werden, als auf Desktop-Ger&auml;ten.<br><br><strong>Beispiel:</strong><br>Ab einer Aufl&ouml;sung von 985px sollen die Bilder aus dem Ordner midi_images geladen werden, was wie folgt anzugeben ist: <span style="color:darkred;font-weight:bold;">985:midi</span> (Es k&ouml;nnen auch mehrere Aufl&ouml;sungen kommasepariert angegeben werden.)');
?>