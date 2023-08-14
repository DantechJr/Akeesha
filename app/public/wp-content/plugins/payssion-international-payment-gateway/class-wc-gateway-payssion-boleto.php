<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once( 'class-wc-gateway-payssion-brazil.php' );

/**
 * Payssion 
 *
 * @class 		WC_Gateway_Payssion_Boleto
 * @extends		WC_Payment_Gateway
 * @author 		Payssion
 */
class WC_Gateway_Payssion_Boleto extends WC_Gateway_Payssion_Brazil {
	protected $pm_id = 'boleto_br';
}