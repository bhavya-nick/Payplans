<?php
/**
* @copyright	Copyright (C) 2009 - 2011 Ready Bytes Software Labs Pvt. Ltd. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* @package		PayPlans
* @subpackage	Frontend
* @contact 		shyam@readybytes.in
*/
if(defined('_JEXEC')===false) die();
?>
<?php //XITODO: clean javascript?>
<script type="text/javascript">
function offlineChangeAction()
{
	document.getElementById('payplans_payment_action').value = 'cancel';
	return true;
}
</script>

<div id="offline-pay">
<form action="<?php echo $posturl ?>" method="post" name="site<?php echo $this->getName(); ?>Form">
	<?php echo $transaction_html;?>
	<input type="hidden" name="payment_key" value="<?php echo $payment_key;?>" />
	
	<div class="pp-parameter pp-grid_12">
		<div class="pp-row">
		    <div class="pp-col pp-label pp-grid_3">
		    	<label><?php echo XiText::_('COM_PAYPLANS_APP_OFFLINE_BANK_NAME_LABEL');?></label>
		    </div>
		    <div class="pp-col pp-input pp-grid_9">
		       	<?php echo $this->getAppParam('bankname', false);?>
		    </div>
		</div>
	    <div class="pp-row">
	    	<div class="pp-col pp-label pp-grid_3">
	    		<label><?php echo XiText::_('COM_PAYPLANS_APP_OFFLINE_ACCOUNT_NUBMER_LABEL')?></label>
	    	</div>
		    <div class="pp-col pp-input pp-grid_9">
	       		<?php echo $this->getAppParam('account_number', false);?>
	       	</div>
	    </div>
    </div>
    
	<div class="pp-prefix_3 pp-grid_9">
		<button type="submit" id="payplans-payment" class="pp-button ui-button-primary " name="payplans_payment_btn" onclick="this.onclick=function(){return false;}"><?php echo XiText::_('COM_PAYPLANS_PAYMENT')?></button>
		<button type="submit" id="payplans-payment-cancel" class="pp-button pp-button-color medium" name="payplans_payment_cancel_btn" onClick="offlineChangeAction()"><?php echo XiText::_('COM_PAYPLANS_PAYMENT_CANCEL_BUTTON');?></button>
		<input type="hidden" id="payplans_payment_action" name="action" value="success" />
	</div>
	
</form>
</div>
<?php
