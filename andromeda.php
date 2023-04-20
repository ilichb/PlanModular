<?php
/**
 * @copyright	Copyright (c) 2023 Andromeda. All rights reserved.
 * @license		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

// no direct access
defined('_JEXEC') or die;

jimport('joomla.plugin.plugin');

/**
 * content - Andromeda Plugin
 *
 * @package		Joomla.Plugin
 * @subpakage	Andromeda.Andromeda
 */
class plgcontentAndromeda extends JPlugin {

	/**
	 * Constructor.
	 *
	 * @param 	$subject
	 * @param	array $config
	 */
	function __construct(&$subject, $config = array()) {
		// call parent constructor
		parent::__construct($subject, $config);
	}
	
}