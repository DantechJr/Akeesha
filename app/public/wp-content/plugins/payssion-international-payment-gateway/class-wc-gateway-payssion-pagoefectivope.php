<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once( 'class-wc-gateway-payssion.php' );

/**
 * Payssion 
 *
 * @class 		WC_Gateway_Payssion_Pagoefectivope
 * @extends		WC_Payment_Gateway
 * @author 		Payssion
 */
class WC_Gateway_Payssion_Pagoefectivope extends WC_Gateway_Payssion {
	public $title = 'PagoEfectivo';
	protected $pm_id = 'pagoefectivo_pe';
}