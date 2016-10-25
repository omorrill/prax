<?php

/**
 * @file cos_jis.admin.inc
 */

function cos_jis_config($form, &$form_state) {
	$form = array();
	$form['cos_jis_endpoint'] = array(
		'#title' => t('JIS Endpoint'),
		'#description' => t('Select the Endpoint for JIS messages'),
		'#type' => 'select',
		'#options' => array('jis_dev' => 'JIS Development', 'jis_prod' => 'JIS Production'),
		'#default_value' => variable_get('cos_jis_endpoint', 'jis_dev'),
	);
	$form['cos_jis_response_codes'] = array(
		'#title' => t('Response Code Messages'),
		'#type' => 'fieldset',
		'#collapsible' => TRUE,
		'#collapsed' => TRUE,
	);
	$default = array('value' => '', 'format' => 'full_html');
	$value = variable_get('cos_jis_intro', $default);
	$form['cos_jis_intro'] = array(
		'#title' => t('JIS Search Intro'),
		'#description' => t('Introduction text displayed on the front page of the JIS Search'),
		'#type' => 'text_format',
		'#default_value' => $value['value'],
		'#format' => $value['format'],
	);
	$form['cos_jis_active_cart_message'] = array(
		'#title' => t('Search Redirect Message'),
		'#description' => t('Message shown to users who try to access the search page with items in their cart'),
		'#type' => 'textarea',
		'#default_value' => t('You are unable to access the search page with an active cart.  Complete checkout before submitting additional searches.'),
	);
	$form['cos_jis_email_config'] = array(
		'#title' => t('Email Settings'),
		'#description' => t('Configure the email text delivered to users upon successful response from JIS postPayment message.'),
		'#type' => 'fieldset',
		'#collapsible' => TRUE,
		'#collapsed' => TRUE,
	);
	$form['cos_jis_email_config']['cos_jis_email_subject'] = array(
		'#title' => t('Email Subject'),
		'#type' => 'textfield',
		'#default_value' => variable_get('cos_jis_email_subject', ''),
	);
	$form['cos_jis_email_config']['cos_jis_email_body'] = array(
		'#title' => t('Email Body'),
		'#type' => 'textarea',
		'#default_value' => variable_get('cos_jis_email_body', ''),
	);

	$form['cos_jis_cancel_redirect_page'] = array(
		'#title' => t('Redirect Page'),
		'#description' => t('Page to which a user should be redirected when if they choose to "Cancel" instead of pleading "Guilty"'),
		'#autocomplete_path' => 'cos_jis/autocomplete',
		'#type' => 'textfield',
		'#default_value' => variable_get('cos_jis_cancel_redirect_page', ''),
	);

	foreach (cos_response_codes() as $key => $default_message) {
		$form['cos_jis_response_codes']['cos_jis_code_' . $key] = array(
			'#title' => t('Message for Response Code: @key', array('@key' => $key)),
			'#description' => t('Configure the message which should be displayed to users when JIS returns this response message.'),
			'#default_value' => variable_get('cos_jis_code_' . $key, $default_message),
			'#type' => 'textarea',
		);
	}
	// Add in handling for zero-balance but successful messages.
	$form['cos_jis_response_codes']['cos_jis_code_zero_balance'] = array(
		'#title' => t('Message for Successful, Zero Balance queries'),
		'#description' => t('Configure the message which should be shown when a query does not return an error but has a zero balance.'),
		'#type' => 'textarea',
		'#default_value' => variable_get('cos_jis_code_zero_balance'. ''),
	);
	$form['tokens'] = array(
		'#theme' => 'token_tree',
		'#token_types' => array('cos-jis', 'commerce-order'),
		'#global_types' => FALSE, // A boolean TRUE or FALSE whether to include 'global' context tokens like [current-user:*] or [site:*]. Defaults to TRUE.
		'#click_insert' => TRUE, // A boolean whether to include the 'Click this token to insert in into the the focused textfield' JavaScript functionality. Defaults to TRUE.
	);
	return system_settings_form($form);
}


function cos_response_codes() {
	// Return an array in the form of Response Code => Message
	return array(
		'AuthorizationError' => 'Error Number #[cos-jis:code]  Could not process your request, contact the court for additional information.',
		'FailedIdentification' => 'The [cos-jis:type] and DOB entered did not match what we have on record.',
		'IllegalArgument' => 'Error Number #[cos-jis:code]  Could not process your request, contact the court for additional information.',
		'JuvenileRecord' => 'The information on this (Case or summons) is restricted, and cannot be accessed through this system.',
		'MandatoryCourt' => 'This is a mandatory court offense and cannot be accessed through this system.',
		'OverPayment' => '',
		'RecordClosed' => 'This [cos-jis:type] has been closed, and has no balance due.',
		'RecordDismissed' => 'This [cos-jis:type] has been dismissed.',
		'RecordNotFound' => 'DO NOT INCLUDE THE DASH OR ANY NUMBERS AFTER THE DASH OF THE SUMMONS (for a summons that is entered incorrectly)  Also, please be aware that, depending on when you received your ticket, it may not have reached our system yet.  You may try back at a later time or contact the court for assistance)',
		'RecordNotPayable' => 'This [cos-jis:type] is not payable. You must take care of this in person at the Municipal Court on 224 E Kiowa St.',
		'RecordPaid' => 'This [cos-jis:type] has already been paid',
		'RecordPostDispo' => '',
		'RecordVoided' => 'This [cos-jis:type] has been voided',
		'Success' => '',
		'SystemError' => 'Error Number #[cos-jis:code]  Could not process your request, contact the court for additional information.',
		'UnderPayment' => 'You have attempted to under pay what is owed, the current balance due is $[cos-jis:balance])',
		'UnsupportedRecordType' => '',
		'WarrantIssued' => 'Active Warrant for your arrest found – Contact the court for additional information.',
		'WarrantOrdered' => 'Active Warrant for your arrest found – Contact the court for additional information.',
	);
}
