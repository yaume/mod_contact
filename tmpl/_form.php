<?php
/*------------------------------------------------------------------------

# Meta Extension

# ------------------------------------------------------------------------

# author    Guillaume

# copyright Copyright (C) 2018 meta.mc. All Rights Reserved.

# @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL

# Websites: http://meta.mc

-------------------------------------------------------------------------*/

defined('_JEXEC') or die;
JFactory::getLanguage()->load('com_contact');

?>
<?php if ($params->get('show_email_form', 1)): ?>
    <form class="form-validate form-horizontal" method="post" action="<?php echo JRoute::_('index.php'); ?>"
          id="contact-form">
        <fieldset>
            <legend><?php echo JText::_('COM_CONTACT_FORM_LABEL'); ?></legend>
            <div class="control-group">
                <div class="control-label">
                    <label
                        title="<?php echo JText::_('COM_CONTACT_CONTACT_EMAIL_NAME_LABEL'); ?>::<?php echo JText::_('COM_CONTACT_CONTACT_EMAIL_NAME_DESC'); ?>"
                        class="hasTip required"
                        for="jform_contact_name" id="jform_contact_name-lbl">
                        <?php echo JText::_('COM_CONTACT_CONTACT_EMAIL_NAME_LABEL'); ?><span class="star">&nbsp;*</span>
                    </label>
                </div>
                <div class="controls">
                    <input type="text" aria-required="true" required="required" size="30" class="required"
                           value="" id="jform_contact_name" name="jform[contact_name]">
                </div>
            </div>
            <div class="control-group">
                <div class="control-label">
                    <label
                        title="<?php echo JText::_('COM_CONTACT_EMAIL_LABEL'); ?>::<?php echo JText::_('COM_CONTACT_EMAIL_DESC'); ?>"
                        class="hasTip required" for="jform_contact_email" id="jform_contact_email-lbl">
                        <?php echo JText::_('COM_CONTACT_EMAIL_LABEL'); ?><span class="star">&nbsp;*</span>
                    </label>
                </div>
                <div class="controls">
                    <input type="email" aria-required="true" required="required" size="30" value=""
                           id="jform_contact_email" class="validate-email required" name="jform[contact_email]">
                </div>
            </div>
            <?php if ($params->get('show_subject', 1)): ?>
                <div class="control-group">
                    <div class="control-label">
                        <label
                            title="<?php echo JText::_('COM_CONTACT_CONTACT_MESSAGE_SUBJECT_LABEL'); ?>::<?php echo JText::_('COM_CONTACT_CONTACT_MESSAGE_SUBJECT_DESC'); ?>"
                            class="hasTip required" for="jform_contact_emailmsg" id="jform_contact_emailmsg-lbl">
                            <?php echo JText::_('COM_CONTACT_CONTACT_MESSAGE_SUBJECT_LABEL'); ?><span class="star">&nbsp;*</span>
                        </label>
                    </div>
                    <div class="controls">
                        <input type="text" aria-required="true" required="required" size="60" class="required" value=""
                               id="jform_contact_emailmsg" name="jform[contact_subject]">
                    </div>
                </div>
            <?php endif; ?>
            <div class="control-group">
                <div class="control-label">
                    <label
                        title="<?php echo JText::_('COM_CONTACT_CONTACT_ENTER_MESSAGE_LABEL'); ?>::<?php echo JText::_('COM_CONTACT_CONTACT_ENTER_MESSAGE_DESC'); ?>"
                        class="hasTip required" for="jform_contact_message" id="jform_contact_message-lbl">
                        <?php echo JText::_('COM_CONTACT_CONTACT_ENTER_MESSAGE_LABEL'); ?><span
                            class="star">&nbsp;*</span>
                    </label>
                </div>
                <div class="controls">
                    <textarea aria-required="true" required="required" class="required" rows="10" cols="50"
                              id="jform_contact_message" name="jform[contact_message]"></textarea>
                </div>
            </div>
            <?php if ($params->get('show_email_copy', 1)): ?>
                <div class="control-group">
                    <div class="control-label">
                        <label
                            title="<?php echo JText::_('COM_CONTACT_CONTACT_EMAIL_A_COPY_LABEL'); ?>::<?php echo JText::_('COM_CONTACT_CONTACT_EMAIL_A_COPY_DESC'); ?>"
                            class="hasTip" for="jform_contact_email_copy" id="jform_contact_email_copy-lbl">
                            <?php echo JText::_('COM_CONTACT_CONTACT_EMAIL_A_COPY_LABEL'); ?></label>
                    </div>
                    <div class="controls">
                        <input type="checkbox" value="1" id="jform_contact_email_copy" name="jform[contact_email_copy]">
                    </div>
                </div>
            <?php endif; ?>

            <?php if ($params->get('show_captcha', 1)): ?>
                <?php   JPluginHelper::importPlugin('captcha');
                $dispatcher = JDispatcher::getInstance();
                $dispatcher->trigger('onInit', 'dynamic_recaptcha_1');?>
                <div id="dynamic_recaptcha_1"></div>
            <?php endif; ?>

            <div class="form-actions">
                <div id="message-sent-false"><?php echo JText::_('JGLOBAL_VALIDATION_FORM_FAILED'); ?></div>
                <div id="message-sent"><?php echo JText::_('TPL_TZ_ARAGON_SENT_SUCCESSFULLY'); ?></div>
                <button type="submit" class="btn-base bg-2 validate"
                        id="tz-send"><?php echo JText::_('COM_CONTACT_CONTACT_SEND'); ?></button>
                <input type="hidden" value="com_contact" name="option">
                <input type="hidden" value="contact.submit" name="task">
                <input type="hidden" value="" name="return">
                <input type="hidden" value="<?php echo $contact->id . ':' . $contact->alias; ?>" name="id">
                <?php echo JHtml::_('form.token'); ?>
            </div>
        </fieldset>
    </form>
<?php endif; ?>