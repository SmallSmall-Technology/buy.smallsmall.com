<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Paystackwebhook extends CI_Controller
{


	public function __construct()
	{

		parent::__construct();
		Header('Access-Control-Allow-Origin: *');
		$this->load->library('session');
	}

    public function get_paystack_event(){

        // only a post with paystack signature header gets our attention
        if ((strtoupper($_SERVER['REQUEST_METHOD']) != 'POST' ) || !array_key_exists('HTTP_X_PAYSTACK_SIGNATURE', $_SERVER) ) 

            exit();

        // Retrieve the request's body
        $input = @file_get_contents("php://input");

        // validate event do all at once to avoid timing attack

        if($_SERVER['HTTP_X_PAYSTACK_SIGNATURE'] !== hash_hmac('sha512', $input, PAYSTACK_SECRET_KEY))

            exit();


        http_response_code(200);

        $event = json_decode($input, true);

        if($event['event'] == 'subscription.create'){

            $result = $this->buytolet_model->subscription_created($event);

            if($result){

                $ref = md5(date('YmdHis'));

                $coown_details = $this->buytolet_model->get_request_details_by_plan_code($event['plan']['plan_code']);
                
                $buyer_type = 'Investor';

                $property_id = $coown_details['propertyID'];

                $cost = $coown_details['amount'];

                $payment_plan = $coown_details['plan'];

                $userID = $coown_details['userID'];

                $payable = $coown_details['payable'];

                $balance = 0;

                $mop = 'Paystack Subscription';

                $payment_period = 1;

                $unit_amount = $coown_details['unit_amount'];

                $promo_code = '';

                $promo_amount = 0;

                $beneficiary_type = 'Self';

                $beneficiary_id_path = 0;

                $firstname = '';

                $lastname = '';

                $result = $this->buytolet_model->insertCoOwnRequest($ref, $buyer_type, $payment_plan, $property_id, $cost, $userID, $payable, $balance, $mop, $payment_period, $unit_amount, $promo_code, $promo_amount, $beneficiary_id_path, $firstname, $lastname, $beneficiary_type);

                if($result){
                    $this->buytolet_model->insertPayment($property_id, $userID, $payable, $mop, $ref);
                }
            }

        }


        exit();

    }


}