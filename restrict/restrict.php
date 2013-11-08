<?php
/**
* @copyright	Copyright (C) 2009 - 2009 Ready Bytes Software Labs Pvt. Ltd. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* @package		Payplans
* @contact		bhavya@readybytes.in
*/
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

/**
 * Payplans 
 */
class plgPayplansRestrict extends XiPlugin
{
		public function __construct(& $subject, $config)
		{
			parent::__construct($subject, $config);
			$this->loadLanguage();
		}
		
		function onAfterRoute()
		{  
			if(XiFactory::getApplication()->isAdmin()){
				return true;
			}
			
			$plgParams = array();
						
			//get the url parameters user is trying to access
			$option	= JRequest::getVar('option', '');
			$view 	= JRequest::getVar('view', '');
			$task	= JRequest::getVar('task', '');
			
			$plan   = $this->params->get('plan',0); 
			
			// get the url parameters set in the plugin
			$plgParams['option'] = $this->params->get('option','');
			$plgParams['view']   = $this->params->get('view','');
			$plgParams['task']   = $this->params->get('task','');
			
			
			if(!empty($plgParams['option']) && ($option != $plgParams['option'])){
				return true;
			}
			if(!empty($plgParams['view']) && ($view != $plgParams['view'])){
				return true;
			}
			if(!empty($plgParams['task']) && ($task != $plgParams['task'])){
				return true;
			}
			
			$user_id = XiFactory::getUser()->id;
			$user 	 = PayplansUser::getInstance($user_id);
			
			//get the active subscriptions of users
			$subscribedPlans = $user->getPlans();

			$redirect_url = $this->params->get('redirect_url','');
			
			//if no redirect url is mentioned then redirect to payplans dashboard
			if(empty($redirect_url)){
				$redirect_url = XiRoute::_('index.php?option=com_payplans&view=dashboard');
			}
			
			//if user is not having and active subscription then redirect
			if(empty($subscribedPlans)){
				return XiFactory::getApplication()->redirect($redirect_url);
			}

			$requiredPlan = array_intersect($plan, $subscribedPlans);
			if(count($requiredPlan) <=  0){
				return XiFactory::getApplication()->redirect($redirect_url);
			}
			return true;
		}
}
