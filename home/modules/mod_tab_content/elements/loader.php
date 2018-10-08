<?php
/**
* @title		tab content Extension
* @website		http://www.Joombest.com
* @copyright	Copyright (C) 2013 Joombest.com. All rights reserved.
* @license		GNU General Public License version 2 or later; see LICENSE.txt
*/

defined('JPATH_BASE') or die;

jimport('joomla.form.formfield');

/**
 * Form Field class for the Joomla Framework.
 *
 * @package		Joomla.Framework
 * @subpackage	Form
 * @since		1.6
 */
class JFormFieldLoader extends JFormField
{
	/**
	 * The form field type.
	 *
	 * @var		string
	 * @since	1.6
	 */
	protected $type = 'Loader';

	/**
	 * Method to get the field input markup.
	 *
	 * @return	string	The field input markup.
	 * @since	1.6
	 */
	function getInput(){
		$document = JFactory::getDocument();
		$document->addScript(JURI::root(1) . '/modules/mod_tab_content/js/jquery-noconflict.js');
		$header_media = $document->addScript(JURI::root(1) . '/modules/mod_tab_content/js/jscolor.js');
	}
}