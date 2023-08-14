<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once( 'class-wc-gateway-payssion.php' );

/**
 * Payssion 
 *
 * @class 		WC_Gateway_Payssion_Klarna
 * @extends		WC_Payment_Gateway
 * @author 		Payssion
 */
class WC_Gateway_Payssion_Klarna extends WC_Gateway_Payssion {
	public $title = 'Klarna';
	protected $pm_id = 'klarna';
	
	
	/**
	 * Process the payment and return the result
	 *
	 * @param int $order_id
	 * @return array
	 */
	public function process_payment( $order_id ) {
	    $order = wc_get_order( $order_id );
	    return array(
	        'result'   => 'success',
	        'redirect' => $order->get_checkout_payment_url( true ),
	    );
	}
	
	
	/**
	 * Generate the payssion button link (POST method)
	 *
	 * @access public
	 * @param mixed $order_id
	 * @return string
	 */
	function generate_payssion_form( $order_id ) {
	    include_once('includes/class-wc-gateway-payssion-request.php');
	    $request = new WC_Gateway_Payssion_Request($this);
	    
	    $order = wc_get_order( $order_id );
	    $request_data = $request->get_payssion_args($order, false);
	    $payssion_args_array = [];
	    foreach ($request_data as $key => $value) {
	        $payssion_args_array[] = '<input type="hidden" name="' . $key . '" value="' . $value . '" />';
	    }
	    
	    wc_enqueue_js( '
				$.blockUI({
				message: "' . esc_js( __( 'Thank you for your order. We are now redirecting you to payssion to make payment.', 'payssion' ) ) . '",
				baseZ: 99999,
				overlayCSS:
				{
				background: "#fff",
				opacity: 0.6
	},
				css: {
				padding:        "20px",
				zindex:         "9999999",
				textAlign:      "center",
				color:          "#555",
				border:         "3px solid #aaa",
				backgroundColor:"#fff",
				cursor:         "wait",
				lineHeight:     "24px",
	}
	});
				jQuery("#submit_payssion_payment_form").click();
				' );
	    
	    
	    $url = $request->get_request_url($order, $this->testmode, false);
	    return '<form id="payssionsubmit" name="payssionsubmit" action="' . $url . '" method="post" target="_top">' . implode('', $payssion_args_array) . '
		<!-- Button Fallback -->
		<div class="payment_buttons">
		<input type="submit" class="button-alt" id="submit_payssion_payment_form" value="' . __('Pay via payssion', 'payssion') . '" /> <a class="button cancel" href="' . esc_url($order->get_cancel_order_url()) . '">' . __('Cancel order &amp; restore cart', 'payssion') . '</a>
		</div>
		<script type="text/javascript">
		jQuery(".payment_buttons").hide();
		</script>
		</form>';
	}
}