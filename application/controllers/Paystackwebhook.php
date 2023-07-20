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

        }


        exit();

    }


}