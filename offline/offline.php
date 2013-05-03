<?php
/**
* @copyright	Copyright (C) 2009 - 2009 Ready Bytes Software Labs Pvt. Ltd. All rights reserved.
* @license	GNU/GPL, see LICENSE.php
* @package	Payplans
* @subpackage	Offline Plugin
* @contact	payplans@readybytes.in
*/
// no direct access
if(defined( '_JEXEC' )==false) {
	die( 'Restricted access' );
} 


class plgPayplansOffline extends XiPlugin
{

	public function onPayplansSystemStart()
	{
		//add discount app path to app loader
		$appPath = dirname(__FILE__).DS.'offline'.DS.'app';
		PayplansHelperApp::addAppsPath($appPath);
		return true;
	}
}
