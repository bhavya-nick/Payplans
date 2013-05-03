<?php
/**
* @copyright	Copyright (C) 2009 - 2011 Ready Bytes Software Labs Pvt. Ltd. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* @package		PayPlans
* @subpackage	Frontend
* @contact 		shyam@readybytes.in
*/
if(defined('_JEXEC')===false) die();?>
<?php if(!empty($transaction_html)):?>
	<?php echo XiText::_('COM_PAYPLANS_APP_OFFLINE_TRANSACTION_HELP_MESSAGE');?>
	<?php foreach($transaction_html as $key => $value) :?>
		<div class="pp-parameter">	
			<div class="pp-row">
				<div class="pp-col pp-label"> <?php echo XiText::_('COM_PAYPLANS_APP_OFFLINE_TRANSACTION_RECORD_'.JString::strtoupper($key)); ?></div>
				<div class="pp-col pp-input"><?php echo $value;?></div>
				<input type="hidden" name="params[<?php echo $key;?>]" value="<?php echo $value;?>" />
			</div>
		</div>	
	<?php endforeach; ?>
<?php endif;