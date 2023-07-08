<?php

defined('BASEPATH') or exit('No direct script access allowed');

//$client = new \GuzzleHttp\Client();

class Giftbasket extends CI_Controller
{

	protected $response = '';

	public function __construct()
	{

		parent::__construct();

		Header('Access-Control-Allow-Origin: *');
	}

	public function move_to_gift_bag()
	{

		if (!$this->session->has_userdata('loggedIn')) {

			redirect(base_url() . "login", 'refresh');
		}
		$result = 'error';

		$msg = '';

		$data['user_id'] = $this->session->userdata('userID');

		$data['shares_amount'] = $this->input->post('gift_amount');

		$owned_share = $this->input->post('user_shares');

		//From a particular transaction
		$data['request_id'] = $this->input->post("request_id");

		$data['property_id'] = $this->input->post("property_id");

		if (!$this->buytolet_model->check_request_shares_condition($request_id)['share_condition']) {

			$remaining_shares = $owned_share - $data['shares_amount'];

			if ($this->giftbasket_model->insert_in_gift_basket($data)) {

				//Update request table
				if ($this->buytolet_model->update_request($data['request_id'], $remaining_shares)) {

					$result = 'success';
				} else {

					$msg = 'Unable to update table request table';
				}
			} else {

				$msg = 'Unable to insert into gift basket';
			}
		} else {

			$msg = "You need to unlock shares to proceed";
		}

		echo json_encode(array("result" => $result, "msg" => $msg));
	}

	public function send_from_giftbag()
	{

		$userID = $this->session->userdata('userID');

		$beneficiary_shares = $this->input->post("shares_amount");

		$beneficiary_firstname = $this->input->post("firstname");

		$beneficiary_lastname = $this->input->post("lastname");

		$beneficiary_id_path = 0;

		$request_id = $this->input->post("request_id");

		$beneficiary_email = $this->input->post("email");

		$beneficiary_phone = $this->input->post("phone");

		//Check if user is already a member then use userid else generate new ID
		$user = $this->buytolet_model->check_email($beneficiary_email);

		$receiver_id = '';

		if ($user) {
			//Get user ID
			$receiver_id = $this->buytolet_model->get_user_by_email($beneficiary_email)['userID'];
		} else {
			//Generate new ID
			$receiver_id = $this->generate_user_id(12);
		}


		if ($this->buytolet_model->insert_beneficiary_details($userID, $request_id, $beneficiary_firstname, $beneficiary_lastname, $beneficiary_email, $beneficiary_phone, $beneficiary_shares, $beneficiary_id_path, $receiver_id)) {

			//Insert in reduction table
			$data['user_id'] = $userID;
			$data['request_id'] = $request_id;
			$data['property_id'] = $this->input->post("property_id");;
			$data['shares_amount'] = $beneficiary_shares;

			if ($this->giftbag_model->insert_in_spent_gift_basket($data)) {

				//Send email to user
				$email_response = $this->send_mmio_email($beneficiary_firstname, $beneficiary_lastname, $beneficiary_email, '53324d32554663764b30356b563146366444466851575a6b6479396e533068436232644a4e456b7657464e33633070496145685564454a6c4d44303d');

				echo 1;
			} else {

				echo 0;
			}
		} else {
			echo 0;
		}
	}

	public function change_gift_status()
	{

		$response = 'error';

		$message = '';

		$request_id = $this->input->post('request_id');

		$id = $this->input->post('id');

		$request = $this->input->post('request');



		if ($this->buytolet_model->changeGiftStatus($request_id, $id, $request)) {

			$response = 'success';

			$message = 'Successful';

			if ($details = $this->buytolet_model->getRequestInfo($request_id)) {

				$subject = $this->plusify_string("Congratulations " . $details['reciever_name']);

				$this->send_shares_email($subject, $details['reciever_email'], 'acceptance', $details['property_name'], $details['no_of_units'], $details['reciever_name'], $details['senders_name']);
			} else {

				$message = 'Request info error';
			}
		} else {

			$message = 'Successful';
		}

		echo json_encode(array("result" => $response, "message" => $message));
	}

	public function generate_user_id($number)
	{

		$digits = $number;

		$randomNumber = '';

		$count = 0;

		while ($count < $digits) {

			$randomDigit = mt_rand(0, 9);

			$randomNumber .= $randomDigit;

			$count++;
		}

		return $randomNumber;
	}

	public function send_shares_email($subject, $email, $email_type, $property_name, $shares_amount, $name = '', $senders_name = '')
	{

		$userID = $this->session->userdata('userID');

		$method = '';

		if ($email_type == 'acceptance') {

			$button = '%3Cdiv%20style%3D%22display%3Ainline-block%3Btext-align%3Acenter%3Bpadding-left%3A15px%3Bpadding-right%3A15px%3Bpadding-top%3A20px%3Bpadding-bottom%3A20px%3Bbackground%3A%2364318a%22%3E%3Ca%20style%3D%22text-decoration%3Anone%3Bcolor%3A%23FFF%22%20href%3D%22' . $link . '%22%3EGo%20to%20your%20dashboard%3C%2Fa%3E%3C%2Fdiv%3E';

			$body = 'Hello%20' . $name . '%2C%3Cbr%3E%3Cbr%3E%0A%20%0ACongratulations%21%20You%E2%80%99ve%20accepted%20the%20property%20gift%20from%20' . $sender_name . '%20and%20you%E2%80%99re%20officially%20the%20owner%20of%20' . $shares_amount . '%20shares%20of%20' . $property_name . '.%3Cbr%3E%3Cbr%3E%20%0A%0AYour%20property%20shares%20will%20allow%20you%20to%20start%20your%20home%20ownership%20journey%2C%20grow%20your%20shares%20within%201%20to%206%20years%2C%20and%20migrate%20to%20sole-ownership%20or%20exit%20through%20our%20guaranteed%20buy-back%20program%20at%20a%20higher%20price.%20On%20your%20personalized%20dashboard%2C%20you%20can%20track%20your%20portfolio%2C%20migration%20journey%2C%20buy-back%20rate%2C%20give%20out%20shares%20from%20your%20gift%20basket%2C%20create%20a%20wallet%20account%2C%20and%20a%20lot%20of%20other%20exciting%20features.%3Cbr%3E%3Cbr%3E%0A%0A%3Cdiv%20style%3D%22width%3A100%25%3Bheight%3A2px%3Bmargin-top%3A15px%3Bmargin-bottom%3A15px%3B%22%3E%3C%2Fdiv%3E%0A' . $button . '%0A%3Cdiv%20style%3D%22width%3A100%25%3Bheight%3A2px%3Bmargin-top%3A15px%3Bmargin-bottom%3A15px%3B%22%3E%3C%2Fdiv%3E%0A%0ANeed%20more%20information%20or%20support%3F%3Cbr%3E%0AOur%20customer%20service%20team%20is%20available%20over%20Phone%20or%20WhatsApp%3Cbr%3E%0ACall%20or%20Whatsapp%20%2B234%20809%20866%206255%3Cbr%3E%0ACheers%2C%3Cbr%3E%0ATeam%20Buysmallsmall';

			$method = 'https://api.selzy.com/en/api/sendEmail?format=json&api_key=6tkb5syz5g1bgtkz1uonenrxwpngrwpq9za1u6ha&email=' . $email . '&sender_name=Buy+Small+Small&sender_email=hello@buysmallsmall.ng&subject=Sample+Subject&body=' . $body . '&list_id=20';
		}


		$curl = curl_init();

		curl_setopt_array($curl, array(

			CURLOPT_URL => $method,

			CURLOPT_CUSTOMREQUEST => "POST",

			CURLOPT_RETURNTRANSFER => true,

			CURLOPT_HTTPHEADER => [

				"content-type: application/json"

			],

		));

		$response = curl_exec($curl);

		$response = json_decode($response, true);

		if ($response['result']['email_id']) {
			//Enter into DB
			$this->buytolet_model->insertEmailDets($userID, $email_type, 1);
		} elseif ($response['result']['person_id']) {

			$this->buytolet_model->insertEmailDets($userID, $email_type, 1);
		} else {

			$this->buytolet_model->insertEmailDets($userID, $email_type, 0);
		}
	}

	public function plusify_string($str)
	{

		$str = str_replace(" ", "+", $str);

		return $str;
	}
}
