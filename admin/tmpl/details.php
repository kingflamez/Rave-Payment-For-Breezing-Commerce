<?php

defined('_JEXEC') or die('Restricted access');
?>
<script type="text/javascript">
    function submitbutton(pressbutton) {
	submitform(pressbutton);
    }
    /**
    * Submit the admin form
    */
    function submitform(pressbutton){
            if (pressbutton) {
                    document.adminForm.task.value=pressbutton;
            }
            if (typeof document.adminForm.onsubmit == "function") {
                    document.adminForm.onsubmit();
            }
            document.adminForm.submit();
    }

    function crbc_submitbutton(pressbutton)
    {
        switch (pressbutton) {
            case 'plugin_cancel':
                pressbutton = 'cancel';
                submitform(pressbutton);
                break;
            case 'plugin_apply':
                var error = false;

                if(!error)
                {
                    submitform(pressbutton);
                }

                break;
        }
    }

    // Joomla 1.6 compat
    if(typeof Joomla != 'undefined'){
        Joomla.submitbutton = crbc_submitbutton;
    }
    // Joomla 1.5 compat
    submitbutton = crbc_submitbutton;
</script>

<div class="form-horizontal">
    <div class="control-group">
        <div class="control-label">
            <label for="staging_account" class="tip-top hasTooltip" title="<?php echo JHtml::tooltipText('COM_BREEZINGCOMMERCE_RAVE_STAGING_TIP' ); ?>"><?php echo JText::_('COM_BREEZINGCOMMERCE_RAVE_STAGING' ); ?></label>
        </div>
        <div class="controls">
            <input type="checkbox" name="staging_account" id="staging_account" value="1"<?php echo $this->entity->staging_account == 1 ? ' checked="checked"' : ''; ?>/>
        </div>
    </div>

    <div class="control-group">
        <div class="control-label">
            <label for="sk" class="tip-top hasTooltip"><?php echo JText::_( 'COM_BREEZINGCOMMERCE_RAVE_SK' ); ?></label>
        </div>
        <div class="controls">
            <input type="text" name="sk" id="sk" value="<?php echo $this->escape( $this->entity->sk); ?>"/>
        </div>
    </div>

     <div class="control-group">
        <div class="control-label">
            <label for="pk" class="tip-top hasTooltip"><?php echo JText::_( 'COM_BREEZINGCOMMERCE_RAVE_PK' ); ?></label>
        </div>
        <div class="controls">
            <input type="text" name="pk" id="pk" value="<?php echo $this->escape( $this->entity->pk); ?>"/>
        </div>
    </div>

    <div class="control-group">
        <div class="control-label">
            <label for="country" class="tip-top hasTooltip"><?php echo JText::_('COM_BREEZINGCOMMERCE_RAVE_COUNTRY'); ?></label>
        </div>
        <div class="controls">
            <select name="country" id="country">
                <option <?php echo $this->entity->country == "NG" ? ' selected' : ''; ?> value="NG">Nigeria</option>
                <option <?php echo $this->entity->country == "KE" ? ' selected' : ''; ?> value="KE">Kenya</option>
                <option <?php echo $this->entity->country == "GH" ? ' selected' : ''; ?> value="GH">Ghana</option>
            </select>
        </div>
    </div>

    <div class="control-group">
        <div class="control-label">
            <label for="payment_method" class="tip-top hasTooltip"><?php echo JText::_('COM_BREEZINGCOMMERCE_RAVE_PAYMENT_METHOD'); ?></label>
        </div>
        <div class="controls">
            <select name="payment_method" id="payment_method">
                <option <?php echo $this->entity->payment_method == "both" ? ' selected' : ''; ?> value="both">All</option>
                <option <?php echo $this->entity->payment_method == "card" ? ' selected' : ''; ?> value="card">Card</option>
                <option <?php echo $this->entity->payment_method == "account" ? ' selected' : ''; ?> value="account">Account</option>
                <option <?php echo $this->entity->payment_method == "ussd" ? ' selected' : ''; ?> value="ussd">USSD</option>
            </select>
        </div>
    </div>

    <div class="control-group">
        <div class="control-label">
            <label for="logo" class="tip-top hasTooltip"><?php echo JText::_('COM_BREEZINGCOMMERCE_RAVE_LOGO' ); ?></label>
        </div>
        <div class="controls">
            <input type="text" name="logo" id="logo" value="<?php echo $this->escape( $this->entity->logo); ?>"/>
        </div>
    </div>

</div>

<input type="hidden" name="identity" value="<?php echo $this->entity->identity;?>"/>