<?php

class IpnController extends BaseController {

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
            Log::info('IPN',"");

//            $order = IPN::getOrder();
	header("HTTP/1.1 200 OK");
	}

        public function paypal(){
            
           
               $ipn = new PaypalIPN();
                // Use the sandbox endpoint during testing.
//                $ipn->useSandbox();
                $verified = $ipn->verifyIPN();
                if ($verified) {
                    /*
                     * Process IPN
                     * A list of variables is available here:
                     * https://developer.paypal.com/webapps/developer/docs/classic/ipn/integration-guide/IPNandPDTVariables/
                     */
                    $amount = Input::get('mc_gross','');
                    $payer_id = Input::get('payer_id','');
                    $payment_status = Input::get('payment_status','');
                    $first_name = Input::get('first_name','');
                    $last_name = Input::get('last_name','');
                    $payer_email = Input::get('payer_email','');
                    $receipt_id = Input::get('receipt_id','');
                    $txn_id= Input::get('txn_id','');
                    
                    $order=PaypalPayments::where('txn_id',$txn_id)->first();
                    
                    if(!$order){
                        $order = new PaypalPayments();
                    }
                    
                    $order->txn_id=$txn_id;
                    $order->amount=$amount;
                    $order->payer_id=$payer_id;
                    $order->payment_status=$payment_status;
                    $order->first_name=$first_name;
                    $order->last_name=$last_name;
                    $order->payer_email=$payer_email;
                    $order->receipt_id=$receipt_id;
                      
                    $order->full_ipn = json_encode(Input::all());
                    $order->save();
                }
                // Reply with an empty 200 response to indicate to paypal the IPN was received correctly.
                header("HTTP/1.1 200 OK");
//                         echo "OK";

                }
}
