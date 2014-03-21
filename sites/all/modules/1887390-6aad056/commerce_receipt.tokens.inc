<?php

function commerce_receipt_token_info() {
  $type = array(
    'name' => t('Commerce_receipt'),
    'description' => t('Tokens related to bank receipt payment'),
  );
  $tokens = array();
  $tokens['bank-name'] = array(
    'name' => t('Bank name'),
    'description' => t('Official name of the bank'),
    );
    $tokens['bank-mfo'] = array(
      'name' => t('Bank MFO'),
      'description' => t('MFO of the bank (numeric)'),
    );
    $tokens['payee-corr'] = array(
      'name' => t('Correspondent account'),
      'description' => t('Correspondent account of the payee'),
    );
    $tokens['payee-name'] = array(
      'name' => t('Payee name'),
      'description' => t('Official name of the payee'),
    );
    $tokens['payee-inn'] = array(
      'name' => t('Payee INN'),
      'description' => t('Tax identification number of the payee'),
    );
    $tokens['payee-account'] = array(
      'name' => t('Payee account'),
      'description' => t('Bank account of the payee'),
    );
    $tokens['payee-bik'] = array(
      'name' => t('Payee BIK'),
      'description' => t('Bank identification code of the payee'),
    );
    $tokens['amount-int'] = array(
      'name' => t('Amount integer'),
      'description' => t('Integer part of order amount'),
    );
    $tokens['amount-dec'] = array(
      'name' => t('Amount decimal'),
      'description' => t('Fractional part of order amount'),
    );
    $tokens['order-number'] = array(
      'name' => t('Order number'),
      'description' => t('Identification namber of the order'),
    );
    $tokens['shipping-first-name'] = array(
      'name' => t('Shipping first name'),
      'description' => t('Shipping first name'),
    );
    $tokens['shipping-last-name'] = array(
      'name' => t('Shipping last name'),
      'description' => t('Shipping last name'),
    );
    $tokens['shipping-full-name'] = array(
      'name' => t('Shipping full name'),
      'description' => t('Full name in single line for shipping address'),
    );
    $tokens['shipping-country'] = array(
      'name' => t('Shipping country'),
      'description' => t('Shipping country'),
    );
    $tokens['shipping-org'] = array(
      'name' => t('Shipping organization'),
      'description' => t('Organization/company name for shipping address'),
    );
    $tokens['shipping-post'] = array(
      'name' => t('Shipping post code'),
      'description' => t('Shipping post code'),
    );
    $tokens['shipping-city'] = array(
      'name' => t('Shipping city'),
      'description' => t('City name for shipping'),
    );
    $tokens['shipping-address-1'] = array(
      'name' => t('Shipping address 1'),
      'description' => t('First (main) shipping address'),
    );
    $tokens['shipping-address-2'] = array(
      'name' => t('Shipping address 2'),
      'description' => t('Second (additional) shipping address'),
    );
    $tokens['billing-first-name'] = array(
      'name' => t('Billing first name'),
      'description' => t('Billing first name'),
    );
    $tokens['billing-last-name'] = array(
      'name' => t('Billing last name'),
      'description' => t('Billing last name'),
    );
    $tokens['billing-full-name'] = array(
      'name' => t('Billing full name'),
      'description' => t('Full name in single line for billing address'),
    );
    $tokens['billing-country'] = array(
      'name' => t('Billing country'),
      'description' => t('Billing country'),
    );
    $tokens['billing-org'] = array(
      'name' => t('Billing organization'),
      'description' => t('Organization/company name for the billing address'),
    );
    $tokens['billing-post'] = array(
      'name' => t('Billing post code'),
      'description' => t('Billing post code'),
    );
    $tokens['billing-city'] = array(
      'name' => t('Billing city'),
      'description' => t('City name for billing'),
    );
    $tokens['billing-address-1'] = array(
      'name' => t('Billing address 1'),
      'description' => t('First (main) billing address'),
    );
    $tokens['billing-address-2'] = array(
      'name' => t('Billing address 2'),
      'description' => t('Second (additional) billing address'),
    );
   
  return array(
    'types' => array('commerce-receipt' => $type),
    'tokens' => array('commerce-receipt' => $tokens),
  );
} 

function commerce_receipt_tokens($type, $tokens, array $data = array(), array $options = array()) {
  /* не местное=)*/
    global $user;
  
  $replacements = array();
  
 
  /* --------------*/
  /*$replacements = array();*/
  if ($type == 'commerce-receipt') {
    $order = $data['commerce-receipt'];
   // $id_shipping = $order->commerce_customer_shipping['und'][0]['profile_id'];
    $id_billing = $order->commerce_customer_billing['und'][0]['profile_id'];
  //  $profile_shipping = commerce_customer_profile_load($id_shipping);
    $profile_billing = commerce_customer_profile_load($id_billing);
    $currency_default = commerce_default_currency();
    $currency_convert = commerce_receipt_get_settings('currency');
    $amount = $order->commerce_order_total['und'][0]['amount'];
    if ($currency_default != $currency_convert) {
      $amount_converted = commerce_currency_convert($amount, $currency_default, $currency_convert);
    }
    else {
      $amount_converted = $amount;
    }
    $amount_formatted = commerce_currency_amount_to_decimal($amount_converted, $currency_convert);
    $decimal = (is_float($amount_formatted)) ? substr($amount_formatted, strpos($amount_formatted,'.')+1) : '';
    $amount_dec = ($decimal) ? $decimal : '00';
    foreach ($tokens as $name => $original) {
      switch ($name) {
        /*------------*/
        
        /*------------*/
        case 'bank-name':
          $replacements[$original] = commerce_receipt_get_settings('bank_name');
          break;
        case 'bank-mfo':
          $replacements[$original] = commerce_receipt_get_settings('bank_mfo');
          break;
        case 'payee-corr':
          $replacements[$original] = commerce_receipt_get_settings('payee_corr');
          break;
        case 'payee-name':
          $replacements[$original] = commerce_receipt_get_settings('payee_name');
          break;
        case 'payee-inn':
          $replacements[$original] = commerce_receipt_get_settings('payee_inn');
          break;
        case 'payee-account':
          $replacements[$original] = commerce_receipt_get_settings('payee_account');
          break;
        case 'payee-bik':
          $replacements[$original] = commerce_receipt_get_settings('payee_bik');
          break;
        case 'amount-int':
          $replacements[$original] = intval($amount_formatted);
          break;
        case 'amount-dec':
          $replacements[$original] = $amount_dec;
          break;
        case 'order-number':
          $replacements[$original] = $order->order_number;
          break;
        case 'shipping-first-name':
         // $replacements[$original] = $profile_shipping->commerce_customer_address['und'][0]['first_name'];
          break;
        case 'shipping-last-name':
         // $replacements[$original] = $profile_shipping->commerce_customer_address['und'][0]['last_name'];
        case 'shipping-full-name':
         // $replacements[$original] = $profile_shipping->commerce_customer_address['und'][0]['name_line'];
          break;
        case 'shipping-country':
        //  $replacements[$original] = $profile_shipping->commerce_customer_address['und'][0]['country'];
          break;
        case 'shipping-org':
        //  $replacements[$original] = $profile_shipping->commerce_customer_address['und'][0]['organisation_name'];
          break;
        case 'shipping-post':
        //  $replacements[$original] = $profile_shipping->commerce_customer_address['und'][0]['postal_code'];
          break;
        case 'shipping-city':
        //  $replacements[$original] = $profile_shipping->commerce_customer_address['und'][0]['locality'];
          break;
        case 'shipping-address-1':
        //  $replacements[$original] = $profile_shipping->commerce_customer_address['und'][0]['thoroughfare'];
          break;
        case 'shipping-address-2':
        //  $replacements[$original] = $profile_shipping->commerce_customer_address['und'][0]['premise'];
          break;
        case 'billing-first-name':
         // $replacements[$original] = $profile_billing->commerce_customer_address['und'][0]['first_name'];
          break;
        case 'billing-last-name':
        //  $replacements[$original] = $profile_billing->commerce_customer_address['und'][0]['last_name'];
          break;
        case 'billing-full-name':
          $buf= $profile_billing->field_family['und'][0]['value']." ".$profile_billing->field_name['und'][0]['value']." ".$profile_billing->field_otchestvo['und'][0]['value'];
          $replacements[$original] = $buf;
          break;
        case 'billing-country':
          $replacements[$original] = $profile_billing->field_countries['und'][0]['value'];
          break;
        case 'billing-org':
        //  $replacements[$original] = $profile_billing->commerce_customer_address['und'][0]['organisation_name'];
          break;
        case 'billing-post':
        //  $replacements[$original] = $profile_billing->commerce_customer_address['und'][0]['postal_code'];
          break;
        case 'billing-city':
          $replacements[$original] = $profile_billing->field_city['und'][0]['value'];
          break;
        case 'billing-address-1':
          $replacements[$original] = $profile_billing->field_addres['und'][0]['value'];
          break;
        case 'billing-address-2':
         // $replacements[$original] = $profile_billing->commerce_customer_address['und'][0]['premise'];
          break;
      }
    }   
  }
  return $replacements;
}


/**
 * Implements hook_token_info().
 */
function simple_tokens_token_info() {
  $types['andy_pangus'] = array(
    'name' => t("Andy Pangus Tokens"),
    'description' => t("Tokens for Andy Pangus."),
  );
  
  // Andy Pangus specific tokens.
  $andy_pangus['user_city'] = array(
    'name' => t("User City"),
    'description' => t("The {user}.name of the user viewing the content."),
  );
  $andy_pangus['user_email'] = array(
    'name' => t("User Email"),
    'description' => t("The {user}.mail of the user viewing the content."),
  );
  
  return array(
    'types' => $types,
    'tokens' => array(
      'andy_pangus' => $andy_pangus,
    ),
  );
}



function simple_tokens_tokens($type, $tokens, array $data = array(), array $options = array()) {
  global $user;
  
  $replacements = array();
  
  if ($type == 'andy_pangus') {
    foreach ($tokens as $name => $original) {
      switch ($name) {
        case 'user_city':
          $replacements[$original] = $user->city;
        break;
        case 'user_email':
          $replacements[$original] = $user->mail;
        break;
      }
    }
  }
  
  return $replacements;
}

