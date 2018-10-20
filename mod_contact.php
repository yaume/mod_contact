<?php
/*------------------------------------------------------------------------

# Meta Extension

# ------------------------------------------------------------------------

# author    Guillaume

# copyright Copyright (C) 2018 meta.mc. All Rights Reserved.

# @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL

# Websites: http://meta.mc



-------------------------------------------------------------------------*/

// no direct access
defined('_JEXEC') or die;

// Include the syndicate functions only once
require_once dirname(__FILE__).'/helper.php';

$contact    = modContactHelper::getContact($params);
$form       = modContactHelper::getForm($params);
$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));

// Manage the display mode for contact detail groups
switch ($params->get('contact_icons'))
{
    case 1 :
        // text
        $params->set('marker_address',   JText::_('MOD_CONTACT_ADDRESS') . ": ");
        $params->set('marker_email',     JText::_('JGLOBAL_EMAIL') . ": ");
        $params->set('marker_telephone', JText::_('MOD_CONTACT_TELEPHONE') . ": ");
        $params->set('marker_fax',       JText::_('MOD_CONTACT_FAX') . ": ");
        $params->set('marker_mobile',    JText::_('MOD_CONTACT_MOBILE') . ": ");
        $params->set('marker_misc',      JText::_('MOD_CONTACT_OTHER_INFORMATION') . ": ");
        $params->set('marker_class',     'jicons-text');
        break;

    case 2 :
        // none
        $params->set('marker_address',   '');
        $params->set('marker_email',     '');
        $params->set('marker_telephone', '');
        $params->set('marker_mobile',    '');
        $params->set('marker_fax',       '');
        $params->set('marker_misc',      '');
        $params->set('marker_class',     'jicons-none');
        break;

    default :
        // icons
        $_image2    = 'contacts/'.$params->get('icon_email', 'emailButton.png');
        if($params->get('icon_email')){
            $_image2    = $params -> get('icon_email','emailButton.png');
        }

        $_image3    = 'contacts/'.$params->get('icon_telephone', 'con_tel.png');
        if($params -> get('icon_telephone')){
            $_image3    = $params->get('icon_telephone', 'con_tel.png');
        }

        $_image4    = 'contacts/'.$params->get('icon_fax', 'con_fax.png');
        if($params->get('icon_fax')){
            $_image4    = $params->get('icon_fax', 'con_fax.png');
        }

        $_image5    = 'contacts/'.$params->get('icon_misc', 'con_info.png');
        if($params->get('icon_misc')){
            $_image5    = $params->get('icon_misc', 'con_info.png');
        }

        $_image6    = 'contacts/'.$params->get('icon_mobile', 'con_mobile.png');
        if($params->get('icon_mobile')){
            $_image6    = $params->get('icon_mobile', 'con_mobile.png');
        }

        if($params ->get('icon_address')){
            $image1 = JHtml::_('image', $params->get('icon_address', 'con_address.png'), JText::_('MOD_CONTACT_ADDRESS').": ", null, false);
        }
        else{
            $image1 = '<img src="modules/mod_contact/images/'.$params->get('icon_address', 'marker-icon.png').'" alt="'.JText::_('MOD_CONTACT_ADDRESS').'"/>';
        }
        if($params->get('icon_email')){
            $image2 = JHtml::_('image', $params->get('icon_email', 'emailButton.png'), JText::_('JGLOBAL_EMAIL').": ", null, false);
        }
        else{
            $image2 = '<img src="modules/mod_contact/images/'.$params->get('icon_email', 'mail-icon.png').'" alt="'.JText::_('JGLOBAL_EMAIL').'"/>';
        }

        if($params -> get('icon_telephone')){
            $image3 = JHtml::_('image', $params->get('icon_telephone', 'con_tel.png'), JText::_('MOD_CONTACT_TELEPHONE').": ", null, false);
        }
        else{
            $image3 = '<img src="modules/mod_contact/images/'.$params->get('icon_telephone', 'phone-icon.png').'" alt="'.JText::_('MOD_CONTACT_TELEPHONE').'"/>';
        }

        if($params->get('icon_fax')){
            $image4    = JHtml::_('image', $params->get('icon_fax', 'con_fax.png'), JText::_('MOD_CONTACT_FAX').": ", null, false);
        }
        else{
            $image4    = '<img src="modules/mod_contact/images/'.$params->get('icon_fax', 'fax-icon.png').'" alt="'.JText::_('MOD_CONTACT_FAX').'"/>';
        }

        if($params->get('icon_misc')){
            $image5 = JHtml::_('image', $params->get('icon_misc', 'info-icon.png'), JText::_('MOD_CONTACT_OTHER_INFORMATION').": ", null, false);
        }
        else{
            $image5 = '<img src="modules/mod_contact/images/'.$params->get('icon_misc', 'info-icon.png').'" alt="'.JText::_('MOD_CONTACT_OTHER_INFORMATION').'"/>';
        }

        if($params->get('icon_mobile')){
            $image6 = JHtml::_('image', $params->get('icon_mobile', 'con_mobile.png'), JText::_('MOD_CONTACT_MOBILE').": ", null, false);
        }
        else{
            $image6 = '<img src="modules/mod_contact/images/'.$params->get('icon_mobile', 'mobile-icon.png').'" alt="'.JText::_('MOD_CONTACT_MOBILE').'"/>';
        }

        if($params->get('icon_website')){
            $image7 = JHtml::_('image', $params->get('icon_website', 'con_mobile.png'), JText::_('MOD_CONTACT_MOBILE').": ", null, false);
        }
        else{
            $image7 = '<img src="modules/mod_contact/images/'.$params->get('icon_website', 'website-icon.png').'" alt="'.JText::_('MOD_CONTACT_WEBSITE').'"/>';
        }

        $params->set('marker_address',   $image1);
        $params->set('marker_email',     $image2);
        $params->set('marker_telephone', $image3);
        $params->set('marker_fax',       $image4);
        $params->set('marker_misc',      $image5);
        $params->set('marker_mobile',    $image6);
        $params->set('marker_website',   $image7);
        $params->set('marker_class',     'jicons-icons');
        break;
}

require JModuleHelper::getLayoutPath('mod_contact', $params->get('layout', 'default'));