<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

require_once( 'class-wc-gateway-payssion.php' );

/**
 * Payssion
 *
 * @class 		WC_Gateway_Payssion_Creditcardmx
 * @extends		WC_Payment_Gateway
 * @author 		Payssion
 */
class WC_Gateway_Payssion_Creditcardmx extends WC_Gateway_Payssion {
    public $title = 'Mexico Credit Card';
    protected $pm_id = 'creditcard_mx';
}