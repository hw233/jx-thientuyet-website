<?php

/**
* @title		tab content Extension
* @website		http://www.Joombest.com
* @copyright	Copyright (C) 2013 Joombest.com. All rights reserved.
* @license		GNU General Public License version 2 or later; see LICENSE.txt
*/

//no direct access
defined('_JEXEC') or die('Direct Access to this location is not allowed.');

// Path assignments
$mosConfig_absolute_path = JPATH_SITE;
$linkconfi_in_path = JURI :: base();
if(substr($linkconfi_in_path, -1)=="/") { $linkconfi_in_path = substr($linkconfi_in_path, 0, -1); }
 
// get parameters from the module's configuration
$tabNumber = 10;
$classsufix = $params->get('classsufix',"");
$tabstyle = $params->get('tabstyle',1);
switch ($tabstyle) {
    case 0:
		$tabstyleview = 'horizontal';
        break;
    case 1:
		$tabstyleview = 'vetical';
        break;
}
$TabWidth = $params->get('TabWidth','880');
$colorTab = $params->get('colorTab','#5ba4a4');
$colorTabSelect = $params->get('colorTabSelect','#EE9900');
$colorContent = $params->get('colorContent','#FFEDF2');
$displaystyle = $params->get('displaystyle',0);
switch ($displaystyle) {
    case 0:
		$displaystyle = 'center';
        break;
    case 1:
		$displaystyle = 'left';
        break;
    case 2:
		$displaystyle = 'right';
        break;
    case 3:
		$displaystyle = 'ctstify';
        break;
}
for ($loop = 1; $loop <= $tabNumber; $loop += 1) {
$title[$loop] = $params->get('title'.$loop,'Joombest.com');
}

for ($loop = 1; $loop <= $tabNumber; $loop += 1) {
$TabContent[$loop] = $params->get('TabContent'.$loop,'TabContent'.$loop);
}
require(JModuleHelper::getLayoutPath('mod_tab_content'));