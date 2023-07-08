
<?php

defined('BASEPATH') or exit('No direct script access allowed');

$client = new \GuzzleHttp\Client();

class Tests extends CI_Controller
{

	protected $response = '';

	public function __construct()
	{

		parent::__construct();
		Header('Access-Control-Allow-Origin: *');
		$this->load->library('session');
	}

	public function login($username = 's.ehigiamusoe@gmail.com', $password = 'Crowther@2017')
	{

		$message = '';

		$userdata = array();

		$password = md5($password);

		//Login

		$user = $this->buytolet_model->login_user($username, $password);

		if (!empty($user)) {
			//Successful insert then send email to user

			if ($user['confirmation'] == '') {

				if ($user['status'] == 'Active') {

					$date = date('M d, Y h:i:s A');

					$subject = "New Login";

					$userdata = array('userID' => $user['userID'], 'loggedIn' => 'yes', 'fname' => $user['firstName'], 'lname' => $user['lastName'], 'email' => $user['email'], 'verified' => $user['verified'], 'phone' => $user['phone'], 'user_type' => $user['user_type'], 'referral_code' => $user['referral_code'], 'rss_points' => $user['points'], 'interest' => $user['interest']);
					//Set session

					$this->session->set_userdata($userdata);

					// Send Notification
					$message = "We noticed a new sign-in to your account at $date. If you signed in recently, no 
					need to worry, you can disregards this message.";

					$result = $userdata;
				} else {

					$message = "This account may have been suspended";
				}
			} else {

				$message = "Account not confirmed!";
			}
		} else {

			$message = "Check Username/Password";
		}

		echo "message : " . $message . "<br /> Result : ";

		print_r($userdata);
	}
}
