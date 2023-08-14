<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once( 'class-wc-gateway-payssion.php' );

/**
 * Payssion 
 *
 * @class 		WC_Gateway_Payssion_Walletin
 * @extends		WC_Payment_Gateway
 * @author 		Payssion
 */
class WC_Gateway_Payssion_Walletin extends WC_Gateway_Payssion {
	public $title = 'Airtel money, PhonePe, MobiKwik';
	protected $pm_id = 'wallet_in';
}