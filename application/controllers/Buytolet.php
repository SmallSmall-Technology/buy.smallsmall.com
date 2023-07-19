<?php

defined('BASEPATH') or exit('No direct script access allowed');

$client = new \GuzzleHttp\Client();

class Buytolet extends CI_Controller
{

	protected $response = '';

	public function __construct()
	{

		parent::__construct();
		Header('Access-Control-Allow-Origin: *');
		$this->load->library('session');
	}

	public function index()
	{
		//Get featured properties

		$states = array('2648', '2671');

		$data['buy_to_live_properties'] = $this->buytolet_model->getHomeProps(1, 4);

		$data['buy_to_let_properties'] = $this->buytolet_model->getHomeProps(2, 4);

		$data['pool_properties'] = $this->buytolet_model->getPoolHomeProps();

		$data['locations'] = $this->buytolet_model->get_locations($states);

		if ($this->session->has_userdata('loggedIn')) {

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');

			$data['user_type'] = $this->session->userdata('user_type');

			$data['loggedIn'] = $this->session->userdata('loggedIn');

			$data['interest'] = $this->session->userdata('interest');
		}

		//Check login status

		$data['title'] = "Welcome to Buy2Let";

		$this->load->view('templates/header', $data);

		$this->load->view('index', $data);

		//$this->load->view('index-uc', $data);

		//$this->load->view('splash', $data);

		$this->load->view('templates/footer', $data);
	}

	public function home_test()
	{

		$states = array('2648', '2671');

		$data['buy_to_live_properties'] = $this->buytolet_model->getHomePropsTest(1, 4);

		$data['buy_to_let_properties'] = $this->buytolet_model->getHomePropsTest(2, 4);

		$data['pool_properties'] = $this->buytolet_model->getPoolHomeProps();

		$data['locations'] = $this->buytolet_model->get_locations($states);

		if ($this->session->has_userdata('loggedIn')) {

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');

			$data['user_type'] = $this->session->userdata('user_type');

			$data['loggedIn'] = $this->session->userdata('loggedIn');

			$data['interest'] = $this->session->userdata('interest');
		}

		//Check login status

		$data['title'] = "Welcome to Buy2Let";

		$this->load->view('templates/header', $data);

		$this->load->view('index-test', $data);

		//$this->load->view('index-uc', $data);

		//$this->load->view('splash', $data);

		$this->load->view('templates/footer', $data);
	}

	public function about_us()
	{

		if ($this->session->has_userdata('loggedIn')) {

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');

			$data['user_type'] = $this->session->userdata('user_type');

			$data['loggedIn'] = $this->session->userdata('loggedIn');

			$data['interest'] = $this->session->userdata('interest');
		}

		$data['title'] = "About Us :: Buy2Let";

		$data['content'] = $this->buytolet_model->get_about();

		$this->load->view('templates/header', $data);

		$this->load->view('about-us', $data);

		$this->load->view('templates/footer', $data);
	}
	public function terms_and_conditions()
	{

		if ($this->session->has_userdata('loggedIn')) {

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');

			$data['user_type'] = $this->session->userdata('user_type');

			$data['loggedIn'] = $this->session->userdata('loggedIn');

			$data['interest'] = $this->session->userdata('interest');
		}

		$data['title'] = "Terms and Conditions :: Buy2Let";

		$this->load->view('templates/header', $data);

		$this->load->view('terms-and-conditions', $data);

		$this->load->view('templates/footer', $data);
	}
	public function co_own_tandc()
	{

		if ($this->session->has_userdata('loggedIn')) {

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');

			$data['user_type'] = $this->session->userdata('user_type');

			$data['loggedIn'] = $this->session->userdata('loggedIn');

			$data['interest'] = $this->session->userdata('interest');
		}

		$data['title'] = "Co-ownership Terms and Conditions :: Buy2Let";

		$this->load->view('templates/header', $data);

		$this->load->view('co-own-tandc', $data);

		$this->load->view('templates/footer', $data);
	}

	public function investor_basic()
	{

		if ($this->session->has_userdata('loggedIn')) {

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');

			$data['user_type'] = $this->session->userdata('user_type');

			$data['loggedIn'] = $this->session->userdata('loggedIn');

			$data['interest'] = $this->session->userdata('interest');
		}

		$data['title'] = "Investor Profile :: Buy2Let";

		$data['content'] = $this->buytolet_model->get_about();

		$this->load->view('templates/header', $data);

		$this->load->view('investor-basic', $data);

		$this->load->view('templates/footer', $data);
	}
	public function how_it_works()
	{

		if ($this->session->has_userdata('loggedIn')) {

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');

			$data['user_type'] = $this->session->userdata('user_type');

			$data['loggedIn'] = $this->session->userdata('loggedIn');

			$data['interest'] = $this->session->userdata('interest');
		}

		$data['title'] = "How it works :: Buy2Let";

		$data['content'] = $this->buytolet_model->get_hiw();

		$this->load->view('templates/header', $data);

		$this->load->view('how-it-works', $data);

		$this->load->view('templates/footer', $data);
	}
	public function faq()
	{

		if ($this->session->has_userdata('loggedIn')) {

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');

			$data['user_type'] = $this->session->userdata('user_type');

			$data['loggedIn'] = $this->session->userdata('loggedIn');

			$data['interest'] = $this->session->userdata('interest');
		}

		$data['title'] = "Frequently Asked Questions :: BuySmallSmall";

		//$data['content'] = $this->buytolet_model->get_faq();

		$this->load->view('templates/header', $data);

		$this->load->view('faq', $data);

		$this->load->view('templates/footer', $data);
	}
	public function general_faq()
	{

		if ($this->session->has_userdata('loggedIn')) {

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');

			$data['user_type'] = $this->session->userdata('user_type');

			$data['loggedIn'] = $this->session->userdata('loggedIn');

			$data['interest'] = $this->session->userdata('interest');
		}

		$data['title'] = "Frequently Asked Questions :: BuySmallSmall";

		//$data['content'] = $this->buytolet_model->get_faq();

		$this->load->view('templates/header', $data);

		$this->load->view('general-faq', $data);

		$this->load->view('templates/footer', $data);
	}
	public function get_started()
	{

		if ($this->session->has_userdata('loggedIn')) {

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');

			$data['user_type'] = $this->session->userdata('user_type');

			$data['loggedIn'] = $this->session->userdata('loggedIn');

			$data['interest'] = $this->session->userdata('interest');
		}

		$data['title'] = "Get started :: BuySmallSmall";

		$this->load->view('templates/header', $data);

		$this->load->view('get-started', $data);

		$this->load->view('templates/footer', $data);
	}
	public function investment_types()
	{

		if ($this->session->has_userdata('loggedIn')) {

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');

			$data['user_type'] = $this->session->userdata('user_type');

			$data['loggedIn'] = $this->session->userdata('loggedIn');

			$data['interest'] = $this->session->userdata('interest');
		}

		$data['title'] = "Get started :: BuySmallSmall";

		$this->load->view('templates/header', $data);

		$this->load->view('investment-types', $data);

		$this->load->view('templates/footer', $data);
	}
	public function property_title()
	{

		if ($this->session->has_userdata('loggedIn')) {

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');

			$data['user_type'] = $this->session->userdata('user_type');

			$data['loggedIn'] = $this->session->userdata('loggedIn');

			$data['interest'] = $this->session->userdata('interest');
		}

		$data['title'] = "Get started :: BuySmallSmall";

		$this->load->view('templates/header', $data);

		$this->load->view('property-title', $data);

		$this->load->view('templates/footer', $data);
	}
	public function rent_guarantee()
	{

		if ($this->session->has_userdata('loggedIn')) {

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');

			$data['user_type'] = $this->session->userdata('user_type');

			$data['loggedIn'] = $this->session->userdata('loggedIn');

			$data['interest'] = $this->session->userdata('interest');
		}

		$data['title'] = "Get started :: BuySmallSmall";

		$this->load->view('templates/header', $data);

		$this->load->view('rent-guarantee', $data);

		$this->load->view('templates/footer', $data);
	}
	public function terminologies()
	{

		if ($this->session->has_userdata('loggedIn')) {

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');

			$data['user_type'] = $this->session->userdata('user_type');

			$data['loggedIn'] = $this->session->userdata('loggedIn');

			$data['interest'] = $this->session->userdata('interest');
		}

		$data['title'] = "Get started :: BuySmallSmall";

		$this->load->view('templates/header', $data);

		$this->load->view('terminologies', $data);

		$this->load->view('templates/footer', $data);
	}
	public function partnership()
	{

		if ($this->session->has_userdata('loggedIn')) {

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');

			$data['user_type'] = $this->session->userdata('user_type');

			$data['loggedIn'] = $this->session->userdata('loggedIn');

			$data['interest'] = $this->session->userdata('interest');
		}

		$data['title'] = "Get started :: BuySmallSmall";

		$this->load->view('templates/header', $data);

		$this->load->view('partnership', $data);

		$this->load->view('templates/footer', $data);
	}
	public function property_inspection()
	{

		if ($this->session->has_userdata('loggedIn')) {

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');

			$data['user_type'] = $this->session->userdata('user_type');

			$data['loggedIn'] = $this->session->userdata('loggedIn');

			$data['interest'] = $this->session->userdata('interest');
		}

		$data['title'] = "Get started :: BuySmallSmall";

		$this->load->view('templates/header', $data);

		$this->load->view('property-inspection', $data);

		$this->load->view('templates/footer', $data);
	}
	public function pool_buy_faq()
	{

		if ($this->session->has_userdata('loggedIn')) {

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');

			$data['user_type'] = $this->session->userdata('user_type');

			$data['loggedIn'] = $this->session->userdata('loggedIn');

			$data['interest'] = $this->session->userdata('interest');
		}

		$data['title'] = "Frequently Asked Questions :: Buy2Let";

		//$data['content'] = $this->buytolet_model->get_faq();

		$this->load->view('templates/header', $data);

		$this->load->view('pool-buy-faq', $data);

		$this->load->view('templates/footer', $data);
	}
	public function signup()
	{

		if (!$this->session->has_userdata('loggedIn')) {

			//Check login status

			$data['title'] = "Signup :: Buy2Let";

			//$this->load->view('templates/header', $data);

			$this->load->view('signup', $data);

			//$this->load->view('templates/footer', $data);

		} else {

			redirect(base_url(), 'refresh');
		}
	}
	public function signup_investor()

	{

		if (!$this->session->has_userdata('loggedIn')) {

			//Check login status

			$data['title'] = "Investor Profile :: Buy2Let";

			$this->load->view('templates/header', $data);

			$this->load->view('signup-investor', $data);

			$this->load->view('templates/footer', $data);
		} else {

			redirect(base_url(), 'refresh');
		}
	}


	public function signup_test()
	{

		if (!$this->session->has_userdata('loggedIn')) {

			//Check login status

			$data['title'] = "Signup :: Buy2Let";

			$this->load->view('templates/header', $data);

			$this->load->view('signup-test', $data);

			$this->load->view('templates/footer', $data);
		} else {

			redirect(base_url(), 'refresh');
		}
	}



	public function login()
	{

		if (!$this->session->has_userdata('loggedIn')) {

			/*$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');*/

			//Check login status

			$data['title'] = "Login :: Buy2Let";

			$this->load->view('templates/header', $data);

			$this->load->view('login', $data);

			$this->load->view('templates/footer', $data);
		} else {

			redirect(base_url(), 'refresh');
		}
	}

	public function buyer_form()
	{

		if ($this->session->has_userdata('loggedIn')) {

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');

			$data['phone'] = $this->session->userdata('phone');

			$data['email'] = $this->session->userdata('email');

			$data['user_type'] = $this->session->userdata('user_type');

			$data['loggedIn'] = $this->session->userdata('loggedIn');

			$data['interest'] = $this->session->userdata('interest');

			//Check login status

			$data['title'] = "Buyer Information :: Buy2Let";



			$this->load->view('templates/header', $data);

			$this->load->view('buyer-form', $data);

			$this->load->view('templates/footer', $data);
		} else {

			redirect(base_url() . "login", 'refresh');
		}
	}

	public function finance_form()
	{

		if ($this->session->has_userdata('loggedIn')) {

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');

			$data['phone'] = $this->session->userdata('phone');

			$data['email'] = $this->session->userdata('email');

			$data['user_type'] = $this->session->userdata('user_type');

			$data['loggedIn'] = $this->session->userdata('loggedIn');

			$data['interest'] = $this->session->userdata('interest');

			//Check login status

			$data['title'] = "Finance Form :: Buy SmallSmall";

			$this->load->view('templates/header', $data);

			$this->load->view('finance-form', $data);

			$this->load->view('templates/footer', $data);
		} else {

			redirect(base_url() . "login", 'refresh');
		}
	}

	public function co_own_form()
	{

		if ($this->session->has_userdata('loggedIn')) {

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');

			$data['phone'] = $this->session->userdata('phone');

			$data['email'] = $this->session->userdata('email');

			$data['user_type'] = $this->session->userdata('user_type');

			$data['loggedIn'] = $this->session->userdata('loggedIn');

			$data['interest'] = $this->session->userdata('interest');

			$data['user_details'] = $this->buytolet_model->check_user_details($data['userID']);

			//Check login status

			$data['title'] = "Co Own Form :: Buy SmallSmall";

			$this->load->view('templates/header', $data);

			$this->load->view('co-own-form', $data);

			$this->load->view('templates/footer', $data);
		} else {

			redirect(base_url() . "login", 'refresh');
		}
	}

	public function co_own_applications_form()
	{

		if ($this->session->has_userdata('loggedIn')) {

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');

			$data['phone'] = $this->session->userdata('phone');

			$data['email'] = $this->session->userdata('email');

			$data['user_type'] = $this->session->userdata('user_type');

			$data['loggedIn'] = $this->session->userdata('loggedIn');

			$data['interest'] = $this->session->userdata('interest');

			//Check login status

			$data['title'] = "Co Own Applications Form";

			$this->load->view('templates/header', $data);

			$this->load->view('co-own-shares-application', $data);

			$this->load->view('templates/footer', $data);
		} else {

			redirect(base_url() . "login", 'refresh');
		}
	}

	public function personal_info()
	{

		if ($this->session->has_userdata('loggedIn')) {

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');

			$data['phone'] = $this->session->userdata('phone');

			$data['email'] = $this->session->userdata('email');

			$data['user_type'] = $this->session->userdata('user_type');

			$data['loggedIn'] = $this->session->userdata('loggedIn');

			$data['interest'] = $this->session->userdata('interest');

			//Check login status

			$data['title'] = "Personal Details Form";

			$this->load->view('templates/header', $data);

			$this->load->view('personal-info', $data);

			$this->load->view('templates/footer', $data);
		} else {

			redirect(base_url() . "login", 'refresh');
		}
	}

	public function employment_info()
	{

		if ($this->session->has_userdata('loggedIn')) {

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');

			$data['phone'] = $this->session->userdata('phone');

			$data['email'] = $this->session->userdata('email');

			$data['user_type'] = $this->session->userdata('user_type');

			$data['loggedIn'] = $this->session->userdata('loggedIn');

			$data['interest'] = $this->session->userdata('interest');

			//Check login status

			$data['title'] = "Employment Details Form";

			$this->load->view('templates/header', $data);

			$this->load->view('employment-info', $data);

			$this->load->view('templates/footer', $data);
		} else {

			redirect(base_url() . "login", 'refresh');
		}
	}

	public function upload_info()
	{

		if ($this->session->has_userdata('loggedIn')) {

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');

			$data['phone'] = $this->session->userdata('phone');

			$data['email'] = $this->session->userdata('email');

			$data['user_type'] = $this->session->userdata('user_type');

			$data['loggedIn'] = $this->session->userdata('loggedIn');

			$data['interest'] = $this->session->userdata('interest');

			//Check login status

			$data['title'] = "Upload Documents";

			$this->load->view('templates/header', $data);

			$this->load->view('upload-info', $data);

			$this->load->view('templates/footer', $data);
		} else {

			redirect(base_url() . "login", 'refresh');
		}
	}

	public function finance_confirmation()
	{

		if ($this->session->has_userdata('loggedIn')) {

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');

			$data['phone'] = $this->session->userdata('phone');

			$data['email'] = $this->session->userdata('email');

			$data['user_type'] = $this->session->userdata('user_type');

			$data['loggedIn'] = $this->session->userdata('loggedIn');

			$data['interest'] = $this->session->userdata('interest');

			//Check login status

			$data['title'] = "Finance Confirmation :: Buy2Let";

			$this->load->view('templates/header', $data);

			$this->load->view('finance-confirmation', $data);

			$this->load->view('templates/footer', $data);
		} else {

			redirect(base_url() . "login", 'refresh');
		}
	}

	public function co_own_confirmation()
	{

		if ($this->session->has_userdata('loggedIn')) {

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');

			$data['phone'] = $this->session->userdata('phone');

			$data['email'] = $this->session->userdata('email');

			$data['user_type'] = $this->session->userdata('user_type');

			$data['loggedIn'] = $this->session->userdata('loggedIn');

			$data['refID'] = $this->session->userdata('refID');

			$data['interest'] = $this->session->userdata('interest');

			//Check login status

			$data['title'] = "Finance Confirmation :: Buy2Let";

			$this->load->view('templates/header', $data);

			$this->load->view('co-own-confirmation', $data);

			$this->load->view('templates/footer', $data);
		} else {

			redirect(base_url() . "login", 'refresh');
		}
	}

	public function marketplace_fee()
	{

		if ($this->session->has_userdata('loggedIn')) {

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');

			$data['user_type'] = $this->session->userdata('user_type');

			$data['loggedIn'] = $this->session->userdata('loggedIn');

			$data['interest'] = $this->session->userdata('interest');

			//Check login status

			$data['title'] = "Marketplace Fee :: Buy2Let";

			$this->load->view('templates/header', $data);

			$this->load->view('marketplace-fee', $data);

			$this->load->view('templates/footer', $data);
		} else {

			redirect(base_url() . "login", 'refresh');
		}
	}
	public function verify()
	{

		if ($this->session->has_userdata('loggedIn')) {

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');

			$data['email'] = $this->session->userdata('email');

			$data['phone'] = $this->session->userdata('phone');

			$data['user_type'] = $this->session->userdata('user_type');

			$data['loggedIn'] = $this->session->userdata('loggedIn');

			$data['interest'] = $this->session->userdata('interest');

			//Check login status

			$data['title'] = "Verify Page :: Buy2Let";

			$this->load->view('templates/header', $data);

			$this->load->view('verify', $data);

			$this->load->view('templates/footer', $data);
		} else {

			redirect(base_url() . "login", 'refresh');
		}
	}
	public function final_page()
	{

		//if($this->session->has_userdata('loggedIn')){

		$data['userID'] = $this->session->userdata('userID');

		$data['fname'] = $this->session->userdata('fname');

		$data['lname'] = $this->session->userdata('lname');

		$data['user_type'] = $this->session->userdata('user_type');

		$data['loggedIn'] = $this->session->userdata('loggedIn');

		$data['interest'] = $this->session->userdata('interest');

		$data['header'] = "Successful";

		$data['note'] = "";

		//Check login status

		$data['title'] = "Buy Small Small";

		$this->load->view('templates/header', $data);

		$this->load->view('final', $data);

		$this->load->view('templates/footer', $data);

		//}else{

		//redirect( base_url()."login" ,'refresh');

		//}

	}
	public function payment_successful()
	{

		//if($this->session->has_userdata('loggedIn')){

		$data['userID'] = $this->session->userdata('userID');

		$data['fname'] = $this->session->userdata('fname');

		$data['lname'] = $this->session->userdata('lname');

		$data['user_type'] = $this->session->userdata('user_type');

		$data['loggedIn'] = $this->session->userdata('loggedIn');

		$data['interest'] = $this->session->userdata('interest');

		$prop_name = $this->buytolet_model->getProp($this->session->userdata('property_id'));

		$amount = $this->session->userdata('amount');

		$data['header'] = "<span style='color:green'>Successful</span>";

		$data['note'] = "We have received your 5% commitment fee of N" . number_format($amount) . " for " . $prop_name["property_name"] . ",  We've sent a copy of your offer letter and contract of sale to your email. <a href='https://rent.smallsmall.com'>Click here to view on your dashboard</a>.<p>Our customer support team will reach out to you within 24hours to help you close your purchase.</p>";

		//Check login status

		$data['title'] = "Buy Small Small";

		$this->load->view('templates/header', $data);

		$this->load->view('final', $data);

		$this->load->view('templates/footer', $data);

		//}else{

		//redirect( base_url()."login" ,'refresh');

		//}

	}
	public function guaranteed_rent()
	{

		$data['userID'] = $this->session->userdata('userID');

		$data['fname'] = $this->session->userdata('fname');

		$data['lname'] = $this->session->userdata('lname');

		$data['user_type'] = $this->session->userdata('user_type');

		$data['loggedIn'] = $this->session->userdata('loggedIn');

		$data['interest'] = $this->session->userdata('interest');

		//Check login status

		$data['title'] = "Guaranteed Rent :: Buy2Let";

		$this->load->view('templates/header', $data);

		$this->load->view('guaranteed-rent', $data);

		$this->load->view('templates/footer', $data);
	}
	public function property($id)
	{

		//Get featured properties

		$data['property'] = $this->buytolet_model->getProperty($id);

		$data['similarProps'] = $this->buytolet_model->similarProperties($data['property']['city']);

		if ($this->session->has_userdata('loggedIn')) {

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');

			$data['email'] = $this->session->userdata('email');

			$data['user_type'] = $this->session->userdata('user_type');

			$data['loggedIn'] = $this->session->userdata('loggedIn');

			$data['interest'] = $this->session->userdata('interest');


			//Update property views
			$views = intval($data['property']['views']) + 1;

			$this->buytolet_model->updateViews($views, $id);

			//Check login status

			$data['title'] = $data['property']['property_name'] . " :: Buy2Let";

			$this->load->view('templates/header', $data);

			$this->load->view('property', $data);

			$this->load->view('templates/footer', $data);
		} else {
			//Ask to Login
			redirect(base_url() . "login", 'refresh');
		}
	}

	public function sole_own($id)
	{

		//Get featured properties

		$data['property'] = $this->buytolet_model->getProperty($id);

		$data['similarProps'] = $this->buytolet_model->similarProperties($data['property']['city']);

		if ($this->session->has_userdata('loggedIn')) {

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');

			$data['user_type'] = $this->session->userdata('user_type');

			$data['loggedIn'] = $this->session->userdata('loggedIn');

			$data['interest'] = $this->session->userdata('interest');


			//Update property views
			$views = intval($data['property']['views']) + 1;

			$this->buytolet_model->updateViews($views, $id);

			//Check login status

			$data['title'] = $data['property']['property_name'] . " :: Buy2Let";

			$this->load->view('templates/header', $data);

			$this->load->view('property', $data);

			$this->load->view('templates/footer', $data);
		} else {

			//Ask to Login
			redirect(base_url() . "login", 'refresh');
		}
	}

	public function co_own($id)
	{

		//Get featured properties

		$data['property'] = $this->buytolet_model->getProperty($id);

		$data['similarProps'] = $this->buytolet_model->similarProperties($data['property']['city']);

		if ($this->session->has_userdata('loggedIn')) {

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');

			$data['user_type'] = $this->session->userdata('user_type');

			$data['loggedIn'] = $this->session->userdata('loggedIn');

			$data['interest'] = $this->session->userdata('interest');

			$data['targetOption'] = $this->buytolet_model->getTargetOptions($data['userID']);


			//Update property views
			$views = intval($data['property']['views']) + 1;

			$this->buytolet_model->updateViews($views, $id);

			//Check login status

			$data['title'] = $data['property']['property_name'] . " :: Buy2Let";

			$this->load->view('templates/header', $data);

			$this->load->view('co-own-property', $data);

			$this->load->view('templates/footer', $data);
		} else {
			//Ask to Login
			redirect(base_url() . "login", 'refresh');
		}
	}

	public function co_own_test($id)
	{

		//Get featured properties

		$data['property'] = $this->buytolet_model->getProperty($id);

		$data['similarProps'] = $this->buytolet_model->similarProperties($data['property']['city']);

		if ($this->session->has_userdata('loggedIn')) {

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');

			$data['user_type'] = $this->session->userdata('user_type');

			$data['loggedIn'] = $this->session->userdata('loggedIn');

			$data['interest'] = $this->session->userdata('interest');


			//Update property views
			$views = intval($data['property']['views']) + 1;

			$this->buytolet_model->updateViews($views, $id);

			//Check login status

			$data['title'] = $data['property']['property_name'] . " :: Buy2Let";

			$this->load->view('templates/header', $data);

			$this->load->view('co-own-prop-backup', $data);

			$this->load->view('templates/footer', $data);
		} else {
			//Ask to Login
			redirect(base_url() . "login", 'refresh');
		}
	}

	public function property_test($id)
	{

		//Get featured properties

		$data['property'] = $this->buytolet_model->getProperty($id);

		$data['similarProps'] = $this->buytolet_model->similarProperties($data['property']['city']);

		if ($this->session->has_userdata('loggedIn')) {

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');

			$data['user_type'] = $this->session->userdata('user_type');

			$data['loggedIn'] = $this->session->userdata('loggedIn');

			$data['interest'] = $this->session->userdata('interest');
		}


		//Check login status

		$data['title'] = $data['property']['property_name'] . " :: Buy2Let";

		$this->load->view('templates/header', $data);

		$this->load->view('property-test', $data);

		$this->load->view('templates/footer', $data);
	}

	public function properties($slug = '')
	{
		$states = ['2648', '2671'];

		$types = ['1', '6', '4', '7'];

		$config['total_rows'] = $this->buytolet_model->getAllPropCount($slug);

		$data['total_count'] = $config['total_rows'];

		$config['suffix'] = '';

		$data['cities'] = $this->buytolet_model->getCities(2671);

		$data['apts'] = $this->buytolet_model->getAptypes($types);

		$data['locations'] = $this->buytolet_model->get_locations($states);

		if ($config['total_rows'] > 0) {

			$page_number = $this->uri->segment(3);

			$config['base_url'] = base_url() . 'properties/' . $slug . '/';

			$config['uri_segment'] = 3;

			if (empty($page_number))

				$page_number = 1;

			$offset = ($page_number - 1) * $this->pagination->per_page;

			$this->buytolet_model->setPageNumber($this->pagination->per_page);

			$this->buytolet_model->setOffset($offset);

			$this->pagination->cur_page = $page_number;

			$this->pagination->initialize($config);

			$data['page_links'] = $this->pagination->create_links();

			$data['from_row'] = $offset + 1;

			$data['properties'] = $this->buytolet_model->getProperties($slug);

			$data['to_row'] = $page_number * count($data['properties']);
		}

		if ($this->session->has_userdata('loggedIn')) {

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');

			$data['user_type'] = $this->session->userdata('user_type');

			$data['loggedIn'] = $this->session->userdata('loggedIn');

			$data['interest'] = $this->session->userdata('interest');
		}

		$data['slug'] = $slug;

		//Check login status

		$data['title'] = "Properties :: Buy2Let";

		$this->load->view('templates/header', $data);

		$this->load->view('properties', $data);

		$this->load->view('templates/footer', $data);
	}

	public function properties_test($slug = '')
	{

		$config['total_rows'] = $this->buytolet_model->getAllPropCount($slug);

		$data['total_count'] = $config['total_rows'];

		$config['suffix'] = '';

		$data['cities'] = $this->buytolet_model->getCities(2671);

		$data['apts'] = $this->buytolet_model->getApt();

		if ($config['total_rows'] > 0) {

			$page_number = $this->uri->segment(3);

			$config['base_url'] = base_url() . 'properties/' . $slug . '/';

			$config['uri_segment'] = 3;

			if (empty($page_number))

				$page_number = 1;

			$offset = ($page_number - 1) * $this->pagination->per_page;

			$this->buytolet_model->setPageNumber($this->pagination->per_page);

			$this->buytolet_model->setOffset($offset);

			$this->pagination->cur_page = $page_number;

			$this->pagination->initialize($config);

			$data['page_links'] = $this->pagination->create_links();

			$data['from_row'] = $offset + 1;

			$data['properties'] = $this->buytolet_model->getProperties($slug);

			$data['to_row'] = $page_number * count($data['properties']);
		}

		if ($this->session->has_userdata('loggedIn')) {

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');

			$data['user_type'] = $this->session->userdata('user_type');

			$data['loggedIn'] = $this->session->userdata('loggedIn');

			$data['interest'] = $this->session->userdata('interest');
		}

		$data['slug'] = $slug;

		//Check login status

		$data['title'] = "Properties :: Buy2Let";

		$this->load->view('templates/header', $data);

		$this->load->view('properties-test', $data);

		$this->load->view('templates/footer', $data);
	}

	public function search_properties()
	{
		$slug = '';

		$search_crit['investment-type'] = $this->input->post('investment-type');

		$search_crit['location'] = $this->input->post('location');

		if ($search_crit['investment-type'] == 5) {

			$slug = 'co-ownership';
		} else if ($search_crit['investment-type'] == 2) {

			$slug = 'buy-to-let';
		} else if ($search_crit['investment-type'] == 1) {

			$slug = 'buy-to-live';
		}


		if (@$search_crit['investment-type'] === null && @$search_crit['location'] === null) {

			$search_crit = $this->session->userdata('search');
		} else {

			$this->session->set_userdata('search', $search_crit);
		}

		$config['total_rows'] = $this->buytolet_model->getAllSearchCount($search_crit);

		$data['total_count'] = $config['total_rows'];

		$config['suffix'] = '';

		$data['cities'] = $this->buytolet_model->getCities(2671);

		$data['apts'] = $this->buytolet_model->getApt();

		if ($config['total_rows'] > 0) {

			$page_number = $this->uri->segment(2);

			$config['base_url'] = base_url() . 'search-properties';

			$config['uri_segment'] = 2;

			if (empty($page_number))

				$page_number = 1;

			$offset = ($page_number - 1) * $this->pagination->per_page;

			$this->buytolet_model->setPageNumber($this->pagination->per_page);

			$this->buytolet_model->setOffset($offset);

			$this->pagination->cur_page = $page_number;

			$this->pagination->initialize($config);

			$data['page_links'] = $this->pagination->create_links();

			$data['from_row'] = $offset + 1;

			$data['properties'] = $this->buytolet_model->getSearchProperties($search_crit);

			$data['to_row'] = $page_number * count($data['properties']);
		}

		if ($this->session->has_userdata('loggedIn')) {

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');

			$data['user_type'] = $this->session->userdata('user_type');

			$data['loggedIn'] = $this->session->userdata('loggedIn');

			$data['interest'] = $this->session->userdata('interest');
		}

		$data['slug'] = $slug;

		//Check login status

		$data['title'] = "Properties :: Buy2Let";

		$this->load->view('templates/header', $data);

		$this->load->view('properties', $data);

		$this->load->view('templates/footer', $data);
	}

	public function poolbuy()

	{

		$config['total_rows'] = $this->buytolet_model->getPoolAptCount();

		$data['total_count'] = $config['total_rows'];

		$config['suffix'] = '';

		$data['cities'] = $this->buytolet_model->getCities(2671);

		$data['apts'] = $this->buytolet_model->getApt();

		if ($config['total_rows'] > 0) {

			$page_number = $this->uri->segment(2);

			$config['base_url'] = base_url() . 'pool-buy/';

			$config['uri_segment'] = 2;

			if (empty($page_number))

				$page_number = 1;

			$offset = ($page_number - 1) * $this->pagination->per_page;


			$this->buytolet_model->setPageNumber($this->pagination->per_page);


			$this->buytolet_model->setOffset($offset);


			$this->pagination->cur_page = $page_number;


			$this->pagination->initialize($config);

			$data['page_links'] = $this->pagination->create_links();

			$data['from_row'] = $offset + 1;

			$data['properties'] = $this->buytolet_model->getPoolProps();

			$data['to_row'] = $page_number * count($data['properties']);
		}


		if ($this->session->has_userdata('loggedIn')) {

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');

			$data['user_type'] = $this->session->userdata('user_type');

			$data['loggedIn'] = $this->session->userdata('loggedIn');

			$data['interest'] = $this->session->userdata('interest');
		}


		//Check login status

		$data['title'] = "Properties :: Buy2Let";

		$this->load->view('templates/header', $data);

		$this->load->view('properties', $data);

		$this->load->view('templates/footer', $data);
	}



	public function signupForm()
	{

		$ua = $_SERVER['HTTP_USER_AGENT'];

		$fname = trim($this->input->post("fname"));

		$lname = trim($this->input->post("lname"));

		$email = trim($this->input->post("email"));

		$phone = trim($this->input->post("phone"));

		$medium = trim($this->input->post("medium"));

		$age = trim($this->input->post("age"));

		$password = md5($this->input->post("password"));

		$income = $this->input->post("income");

		$occupation = $this->input->post("occupation");

		$position = $this->input->post("position");

		$address = $this->input->post("address");

		$gender = $this->input->post("gender");

		$ref_code = $this->input->post("ref_code");

		$user_agent = $this->browserName($ua);

		$confirmationCode = md5(date('d-m-Y h:i:s'));

		$code = substr($confirmationCode, -5);

		$rc = strtoupper(substr($lname, 0, 3) . $code);

		//Check to see if email exists already

		$email_res = $this->buytolet_model->check_email($email);

		if (!$email_res) {
			//Check if user has been bought a gift before
			$beneficiary = $this->buytolet_model->check_beneficiary_details($email)['userID'];

			$id = ($beneficiary) ? $beneficiary : $this->generate_user_id(12);

			$registration = $this->buytolet_model->register($id, $fname, $lname, $email, $password, $phone, $income, $confirmationCode, $medium, 'tenant', 'Buy', $rc, $gender, $user_agent['userAgent']);

			if ($registration) {

				require 'vendor/autoload.php'; //For Unione template authoload

				//Unione Template
				$headers = array(
					'Content-Type' => 'application/json',
					'Accept' => 'application/json',
					'X-API-KEY' => '6tkb5syz5g1bgtkz1uonenrxwpngrwpq9za1u6ha',
				);

				$client = new \GuzzleHttp\Client([
					'base_uri' => 'https://eu1.unione.io/en/transactional/api/v1/'
				]);

				$requestBody = [
					"id" => "5b4bd50c-f3ad-11ed-a4f1-dabfde6df242"
				];

				// end Unione Template

				$link = base_url() . 'activate/' . $confirmationCode;

				//Unione Template

				try {
					$response = $client->request('POST', 'template/get.json', array(
						'headers' => $headers,
						'json' => $requestBody,
					));

					$jsonResponse = $response->getBody()->getContents();

					$responseData = json_decode($jsonResponse, true);

					$htmlBody = $responseData['template']['body']['html'];

					// Replace the placeholder in the HTML body with the username

					$htmlBody = str_replace('{{link}}', $link, $htmlBody);

					$data['response'] = $htmlBody;
				} catch (\GuzzleHttp\Exception\BadResponseException $e) {

					$data['response'] = $e->getMessage();
				}
				$this->email->from('donotreply@smallsmall.com', 'Small Small');

				$this->email->to($email);

				$this->email->subject("Confirm your email");

				$this->email->set_mailtype("html");

				$message = $this->load->view('email/unione-email-template.php', $data, TRUE);

				// 		$message = $this->load->view('email/unione-email-template.php', $data, TRUE);

				$this->email->message($message);

				$emailRes = $this->email->send();

				// End Of Unione

				//Insert notification
				$notificationDataSentToDb = $this->buytolet_model->insertNotification('SmallSmall Confirmation', "Successful Registration", $id, $fname);

				echo 1;
			} else {

				//Unsuccessful insert

				echo "Error inserting details";
			}
		} else {

			echo "User email exists already";
		}
	}

	public function filter()
	{

		$s_data['city']  = $this->input->post('city');

		$s_data['beds']  = $this->input->post('bedrooms');

		$s_data['bath']  = $this->input->post('bath');

		$s_data['tenancy']  = $this->input->post('tenancy');

		$s_data['price']  = $this->input->post('price');

		$s_data['apt_type']  = $this->input->post('apt_type');

		$config['total_rows'] = $this->buytolet_model->getPropertyFilterCount($s_data);

		$data['cities'] = $this->buytolet_model->getCities(2671);

		$data['apts'] = $this->buytolet_model->getApt();

		$data['total_count'] = $config['total_rows'];

		$config['suffix'] = '';

		if ($config['total_rows'] > 0) {

			$page_number = $this->uri->segment(2);

			$config['base_url'] = base_url() . 'filter';

			if (empty($page_number))

				$page_number = 1;

			$offset = ($page_number - 1) * $this->pagination->per_page;

			$this->buytolet_model->setPageNumber($this->pagination->per_page);

			$this->buytolet_model->setOffset($offset);

			$this->pagination->cur_page = $page_number;

			$this->pagination->initialize($config);


			$data['page_links'] = $this->pagination->create_links();

			$data['from_row'] = $offset + 1;

			$data['properties'] = $this->buytolet_model->filter($s_data);

			$data['to_row'] = $page_number * count($data['properties']);
		}

		if ($this->session->has_userdata('loggedIn')) {

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');

			$data['user_type'] = $this->session->userdata('user_type');

			$data['loggedIn'] = $this->session->userdata('loggedIn');

			$data['interest'] = $this->session->userdata('interest');
		}


		//Check login status

		$data['title'] = "Search Results :: Buy2Let";

		$this->load->view('templates/header', $data);

		$this->load->view('properties', $data);

		$this->load->view('templates/footer', $data);
	}

	public function scheduleInsp()
	{

		$inspDate = trim($this->input->post("insp_date"));

		$inspTime = $this->input->post("insp_time");

		$inspPeriod = $this->input->post("insp_period");

		$userID = $this->session->userdata('userID');

		$email = $this->session->userdata('email');

		$fname = $this->session->userdata('fname');

		$lname = $this->session->userdata('lname');

		$data['interest'] = $this->session->userdata('interest');

		$propID = $this->input->post('propID');

		//Insert date
		$res = $this->buytolet_model->setInspection($inspDate, $inspTime, $inspPeriod, $propID, $userID);

		if ($res) {

			$property = $this->buytolet_model->getProp($propID);

			// To send notification mail to db for New Inspection Request

			$subject = "New Inspection Request!";
			$message = "This is to notify you that you have been schedule for inspection on '$inspPeriod'";
			$notification_data_sent_to_db = $this->buytolet_model->insertNotification($subject, $message, $userID, $fname);


			$data['name'] = $fname . ' ' . $lname;

			$data['propName'] = $property['property_name'];

			$data['propAddress'] = $property['address'] . ', ' . $property['city'];

			$data['propertyName'] = $property['property_name'];

			$data['inspectionDate'] = date('d F Y', strtotime($inspDate));

			$data['inspectionTime'] = $inspTime . ' ' . $inspPeriod;

			$this->email->from('donotreply@smallsmall.com', 'Small Small');

			$this->email->to($email);

			$this->email->bcc('hello@buysmallsmall.ng');

			$this->email->subject("New Inspection Request!");

			$this->email->set_mailtype("html");

			$message = $this->load->view('email/header.php', $data, TRUE);

			$message .= $this->load->view('email/inspection-email.php', $data, TRUE);

			$message .= $this->load->view('email/footer.php', $data, TRUE);

			$this->email->message($message);

			$custEmail = $this->email->send();

			echo 1;
		} else {

			echo "Error setting up inspection";
		}
	}

	public function loginForm()
	{

		$username = trim($this->input->post("username"));

		$password = md5($this->input->post("password"));

		//Login

		$user = $this->buytolet_model->login_user($username, $password);

		if (!empty($user)) {
			//Successful insert then send email to user

			if ($user['confirmation'] == '' || trim($user['confirmation']) == '') {

				if ($user['status'] == 'Active') {

					$date = date('M d, Y h:i:s A');

					$subject = "New Login";

					$userdata = array('userID' => $user['userID'], 'loggedIn' => 'yes', 'fname' => $user['firstName'], 'lname' => $user['lastName'], 'email' => $user['email'], 'verified' => $user['verified'], 'phone' => $user['phone'], 'user_type' => $user['user_type'], 'referral_code' => $user['referral_code'], 'rss_points' => $user['points'], 'interest' => $user['interest']);
					//Set session

					$this->session->set_userdata($userdata);

					// Send Notification
					$message = "We noticed a new sign-in to your account at $date. If you signed in recently, no 
					need to worry, you can disregards this message.";

					$this->buytolet_model->insertNotification($subject, $message, $user['userID'], $user['firstName']);


					echo 1;
				} else {

					echo "This account may have been suspended";
				}
			} else {

				echo "Account not confirmed!";
			}
		} else {

			echo "Check Username/Password";
		}
	}
	public function insertRequest()
	{

		if (!$this->session->has_userdata('loggedIn')) {

			redirect(base_url() . "login", 'refresh');
		}
		$data['userID'] = $this->session->userdata('userID');

		$buyer_type = 'Investor';

		$payable = $this->input->post('payable');

		$balance = $this->input->post('balance');

		$payment_plan = $this->input->post("payment_plan");

		$property_id = $this->input->post("property_id");

		$personal_details = $this->input->post('personal_details');

		$employment_details = $this->input->post('employment_details');

		$cost = $this->input->post("cost");

		$promo_code = $this->input->post("promo_code");

		$unit_amount = $this->input->post("unit_amount");

		$payment_period = $this->input->post("payment_period");

		$mop = $this->input->post("method_of_payment");

		$id_path = $this->input->post("id_path");

		$statement_path = $this->input->post("statement_path");

		$prop = $this->buytolet_model->getProperty($property_id);

		$result = $this->buytolet_model->insertRequest($buyer_type, $payment_plan, $property_id, $cost, $data['userID'], $payable, $balance, $mop, $payment_period, $unit_amount, $promo_code, $id_path, $statement_path, $employment_details, $personal_details);

		if ($result) {

			if ($prop['pool_buy'] == 'yes')
				$new_pool_units = $prop['available_units'] - $unit_amount;
			$this->buytolet_model->update_units($new_pool_units, $property_id);

			echo 1;
		} else {

			echo $result;
		}
	}

	public function insertCoOwnRequest()
	{

		if (!$this->session->has_userdata('loggedIn')) {

			redirect(base_url() . "login", 'refresh');
		}
		$ref = md5(date('YmdHis'));

		$data['userID'] = $this->session->userdata('userID');

		$buyer_type = 'Investor';

		$payable = $this->input->post('payable');

		$balance = 0;

		$email = $this->input->post('email');

		$phone = $this->input->post('phone');

		$payment_plan = 'co-own';

		$property_id = $this->input->post("property_id");

		$firstname = $this->input->post('firstname');

		$lastname = $this->input->post('lastname');

		$cost = $this->input->post("cost");

		$promo_code = "";

		$unit_amount = $this->input->post("unit_amount");

		$payment_period = $this->input->post("payment_period");

		$mop = "paystack";

		$beneficiary_id_path = NULL;

		$beneficiary_type = $this->input->post('beneficiary_type');

		$beneficiary_firstname = $this->input->post('beneficiary-firstname');

		$beneficiary_lastname = $this->input->post('beneficiary-lastname');

		$beneficiary_email = $this->input->post('beneficiary-email');

		$beneficiary_phone = $this->input->post('beneficiary-phone');

		$beneficiary_shares = $this->input->post('beneficiary-shares');

		$purchase_frequency = $this->input->post('purchase_frequency');

		$duration = $this->input->post('duration');

		$coupon_code = $this->input->post('coupon_code');

		$promo = $this->buytolet_model->getActivePromo();

		$promo_details = array();

		$promo_amount = 0;

		$prop = $this->buytolet_model->getProperty($property_id);

		if (!empty($promo) && $promo['promo_term'] <= $unit_amount) {

			if ($promo['type'] == 'Coupon') {

				$promo_details = $this->promo_offer($unit_amount, $promo, $coupon_code);
			} elseif ($promo['type'] == 'Free') {

				$promo_details = $this->promo_offer($unit_amount, $promo);
			}

			$unit_amount = $promo_details['promo_value'] + $unit_amount;

			$cost = $unit_amount * $prop['price'];

			$promo_amount = $promo_details['promo_value'];
		}


		$result = $this->buytolet_model->insertCoOwnRequest($ref, $buyer_type, $payment_plan, $property_id, $cost, $data['userID'], $payable, $balance, $mop, $payment_period, $unit_amount, $promo_code, $promo_amount, $beneficiary_id_path, $firstname, $lastname, $beneficiary_type);

		if (!$this->input->post('user-info')) {

			$id_path = $this->input->post("id_path");

			$company_name = $this->input->post('companyName');

			$position = $this->input->post('position');

			$occupation = $this->input->post('occupation');

			$income_range = $this->input->post('income_range');

			$company_address = $this->input->post('company_address');

			$this->buytolet_model->insert_user_info($data['userID'], $company_name, $position, $occupation, $income_range, $company_address, $id_path);
		}

		$toStatus = $this->buytolet_model->checkTargetOptionStatus($data['userID']);

		if (isset($toStatus)) {

			if ($purchase_frequency && $duration) {

				$this->buytolet_model->updateTargetOptions($data['userID'], $purchase_frequency, $duration);

				$this->stp_subscription_plan($email, $userid, $interval, $amount);

			}
		} else {

			if ($purchase_frequency && $duration) {

				$this->buytolet_model->insertTargetOptions($data['userID'], $purchase_frequency, $duration, $ref);

				$this->stp_subscription_plan($email, $userid, $interval, $amount);

			}
		}

		if ($result) {

			//Update the remaining pool units
			$new_pool_units = $prop['available_units'] - $unit_amount;

			$this->buytolet_model->update_units($new_pool_units, $property_id);

			$userdata = array('refID' => $ref);

			$this->session->set_userdata($userdata);

			$subject = $this->plusify_string("Shares Notification");

			$property_name = $this->plusify_string($prop['property_name']);


			//Check if user is not only buying for self
			if ($beneficiary_type != 'Self' && is_array($beneficiary_firstname)) {

				//Insert Promo offer
				if ($promo_details['response']) {

					$this->buytolet_model->insert_beneficiary_details($data['userID'], $ref, $firstname, $lastname, $email, $phone, $promo_details['promo_value'], 0, $data['userID'], 'Promo');
				}

				for ($i = 0; $i < count($beneficiary_firstname); $i++) {

					//Check if user is already a member then use userid else generate new ID
					$user = $this->buytolet_model->check_email($beneficiary_email[$i]);

					$user_id = '';

					if ($user) {
						//Get user ID
						$user_id = $this->buytolet_model->get_user_by_email($beneficiary_email[$i])['userID'];
					} else {
						//Generate new ID
						$user_id = $this->generate_user_id(12);

						$details['userID'] =  $user_id;

						$details['fname'] = $beneficiary_firstname[$i];

						$details['lname'] = $beneficiary_lastname[$i];

						$details['email'] = $beneficiary_email[$i];

						$details['phone'] = $beneficiary_phone[$i];

						$details['refcode'] = $this->session->userdata('referral_code');

						$res = $this->create_user_account($details);

						if ($res) {

							//send a new user actionable message
							$this->send_personalized_email($subject, $email, $email_type, $link, $name = '');
						}
					}

					$this->buytolet_model->insert_beneficiary_details($data['userID'], $ref, $beneficiary_firstname[$i], $beneficiary_lastname[$i], $beneficiary_email[$i], $beneficiary_phone[$i], $beneficiary_shares[$i], $beneficiary_id_path, $user_id);

					$this->send_shares_email($subject, $beneficiary_email[$i], 'free_shares', $property_name, $beneficiary_shares[$i], $beneficiary_lastname[$i], $lastname);
				}
			}

			echo 1;
		} else {

			echo $result;
		}
	}

	public function get_user()
	{
		echo $this->buytolet_model->get_user_by_email('seuncrowther@yahoo.com')['userID'];
	}

	public function logout()
	{

		$this->session->unset_userdata('userdata');

		$this->session->sess_destroy();

		$url = @$_SERVER['HTTP_REFERER'];

		if ($url) {

			redirect($url);
		} else {

			redirect(base_url(), 'refresh');
		}
	}
	public function create_folder($foldername)
	{

		$success = mkdir("./uploads/buytolet/" . $foldername);

		if ($success) {

			mkdir("./uploads/buytolet/" . $foldername . "/floor-plan");

			return 1;
		} else {

			return 0;
		}
	}

	public function upload_images($file_name, $md5_file_name, $folder)
	{
		// ----- Site 2, pullfile.php -----

		// This script will pull a file from site 1 and
		// place it in '/uploaded'

		// used to cross-check the uploaded file
		$fileMd5 = $md5_file_name;
		$fileName = $file_name;

		// we need to pull the file from the './tmp/' dir on site 1
		$pulledFile = file_get_contents('https://www.rentsmallsmall.com/tmp/' . $file_name);

		// save that file to disk
		$result = file_put_contents('./uploads/buytolet/' . $folder . '/' . $fileName, $pulledFile);
		if (!$result) {
			echo 'Error: problem writing file to disk';
			exit;
		}

		$pulledMd5 = md5_file('./' . $folder . '/' . $fileName);
		if ($pulledMd5 != $fileMd5) {
			echo 'Error: md5 mis-match';
			exit;
		}

		// At this point, everything should be right.
		// We pass back 'done' to site 1, so we know 
		// everything went smooth. This way, a 'blank'
		// return can be treated as an error too.
		echo 1;
		exit;
	}

	public function upload_fp_image($file_name, $md5_file_name, $folder, $fp)
	{
		// ----- Site 2, pullfile.php -----

		// This script will pull a file from site 1 and
		// place it in '/uploaded'

		// used to cross-check the uploaded file
		$fileMd5 = $md5_file_name;
		$fileName = $file_name;

		// we need to pull the file from the './tmp/' dir on site 1
		$pulledFile = file_get_contents('https://www.rentsmallsmall.com/tmp/' . $file_name);

		// save that file to disk
		$result = file_put_contents('./uploads/buytolet/' . $folder . '/' . $fp . '/' . $fileName, $pulledFile);
		if (!$result) {
			echo 'Error: problem writing file to disk';
			exit;
		}

		$pulledMd5 = md5_file('./tmp/' . $fileName);
		if ($pulledMd5 != $fileMd5) {
			echo 'Error: md5 mis-match';
			exit;
		}

		// At this point, everything should be right.
		// We pass back 'done' to site 1, so we know 
		// everything went smooth. This way, a 'blank'
		// return can be treated as an error too.
		echo 1;
		exit;
	}

	public function get_images($folder)
	{

		$dir = './uploads/buytolet/' . $folder;

		$image_dir = 'uploads/buytolet/' . $folder;

		$dir_contents = scandir($dir);

		$count = 0;

		$allImages = '';

		$content_size = count($dir_contents);

		//print_r($dir_contents);

		foreach ($dir_contents as $file) {

			if ($file !== '.' && $file !== '..' && $count <= ($content_size - 2)) {

				$allImages .= '<span class="imgCover removal-id-' . $count . '" id="id-' . $file . '"><img src="' . base_url() . '' . $image_dir . '/' . $file . '" id="' . $file . '" class="upldImg img-responsive img-thumbnail" onclick="selectFeatured(this.id)" title="Click to select as featured image" /><div class="remove-btl-img img-removal" id="img-properties-' . $file . '-' . $count . '">remove <i class="fa fa-trash"></i></div></span>';
			}
			$count++;
		}

		echo $allImages;
	}

	public function delete_images($folder)
	{

		$dir = './uploads/buytolet/' . $folder;

		$items = scandir($dir);

		foreach ($items as $item) {

			if ($item === '.' || $item === '..') {

				continue;
			}

			$path = $dir . '/' . $item;

			if (is_dir($path)) {

				//delete_images($path);
				$fp_items = scandir($dir . '/floor-plan');

				foreach ($fp_items as $fp_item) {

					if ($item === '.' || $item === '..') {

						continue;
					} else {

						unlink($path . "/" . $fp_item);
					}
				}

				rmdir($dir . "/floor-plan");
			} else {

				unlink($path);
			}
		}
		rmdir($dir);
	}

	public function copy_images($sourceFolder, $destinationFolder)
	{

		// Store the path of source file 
		$source = './uploads/buytolet/' . $sourceFolder;

		// Store the path of destination file 
		$destination = './uploads/buytolet/' . $destinationFolder;

		$dir = opendir($source);

		// directory 
		while ($file = readdir($dir)) {
			// Skip . and .. 
			if (($file != '.') && ($file != '..')) {
				// Check if it's folder / directory or file 
				if (is_dir($source . '/' . $file)) {
					// Recursively calling this function for sub directory  
					//recursive_files_copy($source.'/'.$file, $destination.'/'.$file); 
				} else {
					// Copying the files
					copy($source . '/' . $file, $destination . '/' . $file);
				}
			}
		}

		closedir($dir);

		$source_2 = './uploads/buytolet/' . $sourceFolder . "/floor-plan";

		$destination_2 = './uploads/buytolet/' . $destinationFolder . "/floor-plan";

		$dir2 = opendir($source_2);

		while ($file = readdir($dir2)) {
			// Skip . and .. 
			if (($file != '.') && ($file != '..')) {
				// Check if it's folder / directory or file 
				if (is_dir($source_2 . '/' . $file)) {
					// Recursively calling this function for sub directory  
					//recursive_files_copy($source.'/'.$file, $destination.'/'.$file); 
				} else {
					// Copying the files
					copy($source_2 . '/' . $file, $destination_2 . '/' . $file);
				}
			}
		}

		closedir($dir2);
	}

	public function get_all_images($folder, $featuredImg)
	{


		$images = "";
		$featImg = "";
		$image_result = "";

		//Get all images from folder and return
		$dir = './uploads/buytolet/' . $folder . '/';

		if (file_exists($dir) == false) {

			$image_result = 'Directory \'' . $dir . '\' not found!';
		} else {

			$dir_contents = scandir($dir);

			$count = 0;

			$content_size = count($dir_contents);

			//print_r($dir_contents);

			foreach ($dir_contents as $file) {

				if ($file !== '.' && $file !== '..' && $count <= ($content_size - 2)) {

					if ($count == ($content_size - 2)) {

						$image_result .= '"' . $file . '"';
					} else {

						$image_result .= '"' . $file . '",';
					}
				}
				$count++;
			}
		}

		echo $image_result;
	}

	public function activate($code)
	{

		//Get user details
		$user = $this->buytolet_model->get_user_by_confirmation_code($code);

		//Check if it is successful
		if (!empty($user)) {

			$verify_stat = $this->buytolet_model->verify_account($code);

			$data['title'] = "Successful :: Buy2Let";

			$data['userID'] = $user['user_id'];

			$data['fname'] = $user['firstName'];

			$data['lname'] = $user['lastName'];

			$data['user_email'] = $user['user_email'];

			$data['user_type'] = $user['user_type'];

			$data['loggedIn'] = 1;

			$this->send_personalized_email('Registration', $user['user_email'], 'subscribe', '', $user['firstName'] . '-' . $user['lastName']);

			$data['page_title'] = "<span style='color:green'>Successful!</span>";

			$data['page_content'] = "You have successfully verified your account, you can proceed to the Login page and log into your account.";

			$this->load->view('templates/header', $data);

			$this->load->view('result-page', $data);

			$this->load->view('templates/footer', $data);
		} else {

			$data['title'] = "Oops :: Buy2Let";

			$data['userID'] = $user['user_id'];

			$data['fname'] = $user['firstName'];

			$data['lname'] = $user['lastName'];

			$data['user_email'] = $user['user_email'];

			$data['user_type'] = $user['user_type'];

			$data['loggedIn'] = 1;

			$data['page_title'] = "<span style='color:red'>Oops!</span>";

			$data['page_content'] = "Your account could not be confirmed at this moment, please contact our customer service numbers or email";

			$this->load->view('templates/header', $data);

			$this->load->view('result-page', $data);

			$this->load->view('templates/footer', $data);
		}
	}

	public function insert_stats()
	{

		//Get IP Address		
		$ip_add = $_SERVER['REMOTE_ADDR'];

		$user_agent = $_SERVER['HTTP_USER_AGENT'];

		$referrer = 'https://www.buy2let.ng';

		if (isset($_SERVER['HTTP_REFERER'])) {
			$referrer = $_SERVER['HTTP_REFERER'];
		}

		//Get Device Type

		//Get Country and city
		$geo = $this->getGeo($ip_add);

		$country = $geo[0];

		$city = $geo[1];

		$ua = $this->browserName($user_agent);

		//Browser name
		$browser_name = $ua['name'];

		//Device name
		$device = $ua['userAgent'];

		$visits = 1;

		//Check if user has visits today already

		$today_result = $this->buytolet_model->check_returning($ip_add);

		$visits = @$today_result['visits'] + 1;

		if (!$today_result) {
			//Add to visits today
			$this->buytolet_model->addVisits($ip_add, $country, $city, $browser_name, 1, $device, $referrer);
		} else {
			$this->buytolet_model->updateVisits($visits, $ip_add);
		}
	}

	public function getGeo($ip)
	{

		// Use JSON encoded string and converts 
		// it into a PHP variable 
		$ipdat = @json_decode(file_get_contents(
			"http://www.geoplugin.net/json.gp?ip=" . $ip
		));

		$geos = array($ipdat->geoplugin_countryName, $ipdat->geoplugin_city);

		return $geos;

		/*echo 'Country Name: ' . $ipdat->geoplugin_countryName . "\n"; 
		echo 'City Name: ' . $ipdat->geoplugin_city . "\n"; 
		echo 'Continent Name: ' . $ipdat->geoplugin_continentName . "\n"; 
		echo 'Latitude: ' . $ipdat->geoplugin_latitude . "\n"; 
		echo 'Longitude: ' . $ipdat->geoplugin_longitude . "\n"; 
		echo 'Currency Symbol: ' . $ipdat->geoplugin_currencySymbol . "\n"; 
		echo 'Currency Code: ' . $ipdat->geoplugin_currencyCode . "\n"; 
		echo 'Timezone: ' . $ipdat->geoplugin_timezone; */
	}

	public function browserName($u_agent)
	{

		$bname = 'Unknown';
		$platform = 'Unknown';
		$version = "";
		$ub = "";

		//First get the platform?
		if (preg_match('/linux/i', $u_agent)) {
			$platform = 'linux';
		} elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
			$platform = 'mac';
		} elseif (preg_match('/windows|win32/i', $u_agent)) {
			$platform = 'windows';
		}

		// Next get the name of the useragent yes seperately and for good reason
		if (preg_match('/MSIE/i', $u_agent) && !preg_match('/Opera/i', $u_agent)) {
			$bname = 'Internet Explorer';
			$ub = "MSIE";
		} elseif (preg_match('/Firefox/i', $u_agent)) {
			$bname = 'Mozilla Firefox';
			$ub = "Firefox";
		} elseif (preg_match('/OPR/i', $u_agent)) {
			$bname = 'Opera';
			$ub = "Opera";
		} elseif (preg_match('/Chrome/i', $u_agent) && !preg_match('/Edge/i', $u_agent)) {
			$bname = 'Google Chrome';
			$ub = "Chrome";
		} elseif (preg_match('/Safari/i', $u_agent) && !preg_match('/Edge/i', $u_agent)) {
			$bname = 'Apple Safari';
			$ub = "Safari";
		} elseif (preg_match('/Netscape/i', $u_agent)) {
			$bname = 'Netscape';
			$ub = "Netscape";
		} elseif (preg_match('/Edge/i', $u_agent)) {
			$bname = 'Edge';
			$ub = "Edge";
		} elseif (preg_match('/Trident/i', $u_agent)) {
			$bname = 'Internet Explorer';
			$ub = "MSIE";
		}

		// finally get the correct version number
		$known = array('Version', @$ub, 'other');
		$pattern = '#(?<browser>' . join('|', $known) .
			')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
		if (!preg_match_all($pattern, $u_agent, $matches)) {
			// we have no matching number just continue
		}
		// see how many we have
		$i = count($matches['browser']);
		if ($i != 1) {
			//we will have two since we are not using 'other' argument yet
			//see if version is before or after the name
			if (strripos($u_agent, "Version") < strripos($u_agent, $ub)) {
				@$version = $matches['version'][0];
			} else {
				@$version = $matches['version'][1];
			}
		} else {
			@$version = $matches['version'][0];
		}

		// check if we have a number
		if ($version == null || $version == "") {
			$version = "?";
		}

		return array(
			'userAgent' => $u_agent,
			'name'      => $bname,
			'version'   => $version,
			'platform'  => $platform,
			'pattern'    => $pattern
		);
	}
	public function shorten_title($string)
	{

		if (strlen($string) >= 25) {
			echo substr($string, 0, 25) . " ... ";
		} else {
			echo $string;
		}
	}

	public function remove_image($folder, $imgName)
	{

		if ($folder && $imgName) {

			$filename = "./uploads/buytolet/" . $folder . "/" . $imgName;

			if (file_exists($filename)) {

				unlink($filename);

				echo 1;
			} else {

				echo 0;
			}
		} else {
			echo 0;
		}
	}

	public function result_page()
	{

		$data['title'] = "Successful :: Buy2Let";

		$data['page-title'] = "<span style='color:green'>Successful</span>";

		$data['page-content'] = "You have successfully verified your account, you can proceed to the Login page and log into your account.";

		$this->load->view('templates/header', $data);

		$this->load->view('result-page', $data);

		$this->load->view('templates/footer', $data);
	}

	public function resetForm()
	{

		$username = $this->input->post("username");

		$response = $this->buytolet_model->getUser($username);

		$name = $response['lastName'];

		if ($response) {

			$code = md5(date('Y-m-d H:i:s'));

			$result = $this->buytolet_model->insertResetDetails($response['userID'], $code);

			$resetLink = base_url() . 'reset/' . $response['userID'] . '/' . $code;

			require 'vendor/autoload.php';

			// Unione Template

			$headers = array(
				'Content-Type' => 'application/json',
				'Accept' => 'application/json',
				'X-API-KEY' => '6tkb5syz5g1bgtkz1uonenrxwpngrwpq9za1u6ha',
			);

			$client = new \GuzzleHttp\Client([
				'base_uri' => 'https://eu1.unione.io/en/transactional/api/v1/'
			]);

			$requestBody = [
				"id" => "d095d6f0-f3bc-11ed-acd6-560b81f17d22"
			];

			// end Unione Template

			try {
				$response = $client->request('POST', 'template/get.json', array(
					'headers' => $headers,
					'json' => $requestBody,
				));

				$jsonResponse = $response->getBody()->getContents();

				$responseData = json_decode($jsonResponse, true);

				$htmlBody = $responseData['template']['body']['html'];

				// Replace the placeholder in the HTML body with the username

				$htmlBody = str_replace('{{resetLink}}', $resetLink, $htmlBody);

				$htmlBody = str_replace('{{Name}}', $name, $htmlBody);

				$data['response'] = $htmlBody;
			} catch (\GuzzleHttp\Exception\BadResponseException $e) {

				$data['response'] = $e->getMessage();
			}

			$this->email->from('donotreply@smallsmall.com', 'Small Small');

			$this->email->to($username);

			$this->email->subject("Password Reset Link");

			$this->email->set_mailtype("html");

			$message = $this->load->view('email/unione-email-template.php', $data, TRUE);

			$this->email->message($message);

			$emailRes = $this->email->send();

			echo 1;
		} else {

			echo "Email doesn't not exist";
		}
	}

	public function user_reset($userID, $reset_code)
	{

		$res = $this->buytolet_model->reset_password($userID, $reset_code);

		if ($res) {


			$data['tempID'] = $userID;

			if (!$this->session->has_userdata('userID')) {

				$userdata = array('tempID' => $res['userID']);

				$data['user_id'] = $res['userID'];

				$this->session->set_userdata($userdata);

				$data['title'] = "Reset Password Buy2Let";

				$this->load->view('templates/header', $data);

				$this->load->view('reset-page', $data);

				$this->load->view('templates/footer', $data);
			} else {

				$data['title'] = "Reset Error";

				$data['page_title'] = '<span style="color:red">Unsuccessful!</span>';

				$data['page_content'] = 'This reset link is expired or already used, you can request another reset link by clicking on "Forgot Password"';

				$this->load->view('templates/header', $data);

				$this->load->view('result-page', $data);

				$this->load->view('templates/footer', $data);
			}
		} else {

			$data['title'] = "Reset Error";

			$data['page_title'] = '<span style="color:red">Unsuccessful!</span>';

			$data['page_content'] = 'This reset link is expired or already used, you can request another reset link by clicking on "Forgot Password"';

			$this->load->view('templates/header', $data);

			$this->load->view('result-page', $data);

			$this->load->view('templates/footer', $data);
		}
	}

	public function newPass()
	{

		$password = md5($this->input->post("password"));

		$userID = $this->input->post("userID");

		$response = $this->buytolet_model->changePass($userID, $password);

		if ($response) {

			echo 1;
		} else {

			echo 0;
		}
	}

	public function confirmCode()
	{

		$result = "error";

		$msg = "";

		$promocode = $this->input->post("promocode");

		$response = $this->buytolet_model->confirm_code($promocode);

		if ($response) {

			$result = "success";

			$msg = $response['value'];
		}

		echo json_encode(array("result" => $result, "msg" => $msg));
	}

	public function uploadIdentification($folder)
	{

		$filename = '';

		if (!$folder) {

			$folder = md5(date("Ymd His"));
		}

		sleep(1);

		if (!is_dir('./uploads/financing/' . $folder)) {

			mkdir('./uploads/financing/' . $folder, 0711, TRUE);
		}

		if ($_FILES["files"]["name"] != '') {

			$output = '';

			$config["upload_path"] = './uploads/financing/' . $folder;

			$config["allowed_types"] = 'jpg|jpeg|png|JPG|PNG|JPEG|pdf';

			$config['max_size'] = '5000';

			$config['encrypt_name'] = TRUE;

			$this->load->library('upload', $config);

			$this->upload->initialize($config);

			if (is_array($_FILES["files"]["name"])) {

				for ($count = 0; $count < count($_FILES["files"]["name"]); $count++) {

					$_FILES["file"]["name"] = $_FILES["files"]["name"][$count];

					$_FILES["file"]["type"] = $_FILES["files"]["type"][$count];

					$_FILES["file"]["tmp_name"] = $_FILES["files"]["tmp_name"][$count];

					$_FILES["file"]["error"] = $_FILES["files"]["error"][$count];

					$_FILES["file"]["size"] = $_FILES["files"]["size"][$count];

					if ($this->upload->do_upload('file')) {

						$data = $this->upload->data();

						$output = "success";

						$filename = $data["file_name"];
					}
				}
			} else {

				$_FILES["file"]["name"] = $_FILES["files"]["name"];

				$_FILES["file"]["type"] = $_FILES["files"]["type"];

				$_FILES["file"]["tmp_name"] = $_FILES["files"]["tmp_name"];

				$_FILES["file"]["error"] = $_FILES["files"]["error"];

				$_FILES["file"]["size"] = $_FILES["files"]["size"];

				if ($this->upload->do_upload('file')) {

					$data = $this->upload->data();

					$output = "success";

					$filename = $data["file_name"];
				}
			}

			echo json_encode(array('result' => $output, 'folder' => $folder, 'filename' => $filename));
		}
	}
	public function getProperty()
	{

		$result = "error";

		$details = array();

		$id = $this->input->post("prop_id");

		$response = $this->buytolet_model->getProp($id);

		if ($response) {

			$result = "success";

			$details = $response;
		}

		echo json_encode(array("result" => $result, "details" => $details));
	}

	public function updatePayment()
	{

		if (!$this->session->has_userdata('loggedIn')) {

			redirect(base_url() . "login", 'refresh');
		}

		$userID = $this->session->userdata('userID');

		$email = $this->session->userdata('email');

		$phone = $this->session->userdata('phone');

		$name = $this->session->userdata('fname') . ' ' . $this->session->userdata('lname');

		$payable = $this->input->post('payable');

		$ref_id = $this->input->post("ref");

		//Get propertty ID using reference ID
		$prop = $this->buytolet_model->getPropWithRef($ref_id);

		$property_id = $prop['propertyID'];

		$propdata = array("property_id" => $property_id, "amount" => $payable);

		$this->session->set_userdata($propdata);

		$mop = 'Paystack';

		$prop = $this->buytolet_model->getProperty($property_id);

		$result = $this->buytolet_model->insertPayment($property_id, $userID, $payable, $mop, $ref_id);

		require 'vendor/autoload.php';

		if ($result) {

			$notificationRes = 0;

			$subject = 'Property Offer Update';

			//Send email and attach offer letter to user
			$email_result = 0;

			$property_details = $prop['property_name'] . '' . $prop['address'] . ', ' . $prop['city'] . ' ' . $prop['propState'];

			$propertyLocation = $prop['address'] . ', ' . $prop['city'] . ' ' . $prop['propState'];

			if ($this->input->post('plan') == 'Outright') {

				$message = '<p>Your outright property details” ' . $prop['property_name'] . '' . $prop['address'] . ', ' . $prop['city'] . ' ' . $prop['propState'] . '”.</p>
    			BuySmallsmall is a real estate investment platform that is making property investment easy and accessible to everyone, our platform allows you to own a small portfolio and grow it by earning passive income and benefit from capital appreciation.';


				$email_result = $this->outright_offer_letter($ref_id, $email, $phone, $prop['property_name'], $name, $prop['address'], $prop['city'], $prop['propState'], $cost, $payable, $prop['bed'], $prop['type']);

				// Send notification message to user at dashboard
				$notificationRes = $this->insertNotification($subject, $message, $userID, $name);
			} else if ($this->input->post('plan') == 'Financing') {

				$request = $this->buytolet_model->getRequest($ref_id);

				$transaction_fee = $request['amount'] * 0.04;

				$message = '<p>Your finance offer” ' . $prop['property_name'] . '' . $prop['address'] . ', ' . $prop['city'] . ' ' . $prop['propState'] . ', ' . $request['finance_balance'] . '”.</p>
    			BuySmallsmall is a real estate investment platform that is making property investment easy and accessible to everyone, our platform allows you to own a small portfolio and grow it by earning passive income and benefit from capital appreciation.';


				$email_result = $this->finance_offer_letter($ref_id, $email, $phone, $prop['property_name'], $name, $prop['address'], $prop['city'], $prop['propState'], $cost, $payable, $prop['bed'], $prop['type'], $request['finance_balance'], $request['payable'], $request['amount'], $request['payment_period'], $transaction_fee);

				// Send notification message to user at dashboard
				$notificationRes = $this->insertNotification($subject, $message, $userID, $name);

				$this->payment_email($name, $property_details, 0, $payable, $email);
			} else if ($this->input->post('plan') == 'Co-own') {

				$request = $this->buytolet_model->getRequest($ref_id);

				$this->payment_email($name, $property_details, $request['unit_amount'], $payable, $email);

				$beneficiary = $this->buytolet_model->getBeneficiaries($request['refID']);

				//Payment email
				$hold_period = '';

				if (@$prop['hold_period'] == 'One year') {
					$hold_period = 1;
				} elseif (@$prop['hold_period'] == 'Two years') {
					$hold_period = 2;
				} elseif (@$prop['hold_period'] == 'Three years') {
					$hold_period = 3;
				} elseif (@$prop['hold_period'] == 'Four years') {
					$hold_period = 4;
				} elseif (@$prop['hold_period'] == 'Five years') {
					$hold_period = 5;
				} elseif (@$prop['hold_period'] == 'Six years') {
					$hold_period = 6;
				} else {
					$hold_period = @$prop['hold_period'];
				}

				$returns = $prop['co_appr_1'] + $prop['co_appr_2'] + $prop['co_appr_3'] + $prop['co_appr_4'] + $prop['co_appr_5'] + $prop['co_appr_6'] +  $prop['co_rent_1'] + $prop['co_rent_2'] + $prop['co_rent_3'] + $prop['co_rent_4'] + $prop['co_rent_5'] + $prop['co_rent_6'];

				//Send email to user
				$this->self_shares_email($subject, $email, $unit_amount, $property_name, $payable, $prop['finish_date'], $returns, $hold_period, $prop['maturity_date'], $lastname);

				// Send notification message to user at dashboard
				$notificationRes = $this->insertNotification($subject, $message, $userID, $name);


				if ($request['purchase_beneficiary'] == 'Self') {

					$user_certificate = $this->shares_certificate($userID,  $request['refID'], $name, $email, $request['unit_amount'], $property_details, $message, $prop['hold_period'], $prop['maturity_date']);

					$this->buytolet_model->updateSharesCertificateFieldO($user_certificate['filename'], $request['refID'], $userID);

					$this->self_shares_notification_email($name, $prop['property_name'], $propertyLocation, $request['unit_amount'], $payable, $email, 0, $hold_period . ' years', $prop['maturity_date'], $prop['finish_date']);
				}

				if (count($beneficiary) > 0) {

					for ($i = 0; $i < count($beneficiary); $i++) {

						$message = 'You are now a co-landlord in this property ”' . $prop['property_name'] . '' . $prop['address'] . ', ' . $prop['city'] . '”,  “' . $name . '” has bought ' . $beneficiary[$i]['no_of_units'] . ' shares for you in this property.
                    <p><a href="' . base_url() . 'login">Click to accept</a> and complete your profile.</p>
                    BuySmallsmall is a real estate investment platform that is making property investment easy and accessible to everyone, our platform allows you to own a small portfolio and grow it by earning passive income and benefit from capital appreciation.';

						//$email_res = $this->notification_letter($beneficiary[$i]['email'], $message, $beneficiary[$i]['lastname']);
						$name = $beneficiary[$i]['firstname'] . ' ' . $beneficiary[$i]['lastname'];

						$certificate = $this->shares_certificate($beneficiary[$i]['receiverID'],  $beneficiary[$i]['requestID'], $name, $beneficiary[$i]['email'], $beneficiary[$i]['no_of_units'], $property_details, $message, $prop['hold_period'], $prop['maturity_date']);

						// Send notification message to user at dashboard
						$notificationRes = $this->insertNotification($subject, $message, $userID, $name);


						if (!empty($certificate)) {
							//Update shares certificate folder
							$this->buytolet_model->updateSharesCertificateFieldB($certificate['filename'], $beneficiary[$i]['requestID'], $beneficiary[$i]['receiverID']);
						}
					}
				}



				echo 1;
			}
		} else {

			echo 0;
		}
	}

	public function validate_bvn()
	{

		$bvn = $this->input->post("bvn");

		$curl = curl_init();

		//$data = array( 'bvn' => $bvn );

		curl_setopt_array($curl, array(

			CURLOPT_URL => "https://api.dojah.io/api/v1/kyc/bvn?bvn=" . $bvn . "",

			CURLOPT_RETURNTRANSFER => true,

			CURLOPT_HTTPHEADER => [

				"AppId: 6221f564a0ee230034779486",

				"Authorization: prod_sk_aRm9dbhC01RIFBnV8zBr0Jrhc",

				"accept: text/plain"

			]
		));

		$response = curl_exec($curl);

		$err = curl_error($curl);

		$httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

		echo $httpcode;

		//https://api.dojah.io/api/v1/kyc/bvn?dob=YYYY-MM-DD


	}
	function calculateRepayment($period, $amount)
	{
	}

	public function outright_offer_letter($ref = 'aeorjf787g90dfdfdfdf', $email = 'seuncrowther@yahoo.com', $phone = '080********', $property_name = 'Olivia Court 5 Bedroom Duplex', $buyer_name = 'Pidah Tnadah', $property_address = '1B Admiralty way, Lekki Phase 1', $property_city = 'Lekki', $property_state = 'Lagos', $total_amount = '5000000', $trans_fee = '400000', $bed = '5', $apt_type = '5 Bedroom')
	{
		//Prepare PDF document

		$data['name'] = $buyer_name;

		$data['property_name'] = $property_name;

		$data['address'] = $property_address . ' ' . $property_city . ', ' . $property_state;

		$pdf_content = '<div style="width:100%;height:800px;padding:20px;background:url(' . "https://buy.smallsmall.com/assets/images/cs-bg-1.png" . ');background-position:center;background-size:cover;background-repeat:no-repeat"></div>';

		//<div style="width:100%;height:800px;padding:20px;position:relative"><img src="https://buy.smallsmall.com/assets/images/cs-bg-1.png" width="100%" /><div style="width:70%;height:100px;position:absolute;top:100px;left:10%;background:#333;z-index:99999999999"></div></div>

		//Set folder to save PDF to
		$this->html2pdf->folder('./uploads/offers/');

		//Set the filename to save/download as
		$this->html2pdf->filename($ref . '_offer_letter.pdf');

		//Set the paper defaults
		$this->html2pdf->paper('a4', 'landscape');

		//Load html view
		$this->html2pdf->html($pdf_content);

		//Create the PDF
		$path = $this->html2pdf->create('save');

		$this->email->from('no-reply@smallsmall.com', 'SmallSmall');

		$this->email->to($email);

		$this->email->cc('accounts@smallsmall.com');

		$this->email->bcc('hello@buysmallsmall.ng, tunde.b@smallsmall.com');

		$this->email->set_mailtype("html");

		$this->email->subject("Offer letter:" . $property_name . "");

		$message = $this->load->view('email/header.php', $data, TRUE);

		$message .= $this->load->view('email/offer-letter-email.php', $data, TRUE);

		$message .= $this->load->view('email/footer.php', $data, TRUE);

		$this->email->message($message);

		if ($path) {

			$this->email->attach($path);
		}

		$emailRes = $this->email->send();

		echo $pdf_content;

		//return $emailRes;
	}

	/*public function outright_offer_letter($ref, $email, $phone, $property_name, $buyer_name, $property_address, $property_city, $property_state, $total_amount, $trans_fee, $bed, $apt_type){
	    //Prepare PDF document
	    
	    $data['name'] = $buyer_name;
	    
	    $data['property_name'] = $property_name;
	    
	    $data['address'] = $property_address.' '.$property_city.', '.$property_state;
	    
	    $pdf_content = '<div style="width:100%;display:inline-block;"><table width="100%"><tr><td width="33.3%" valign="top"><img src="'.base_url().'assets/images/smallsmall-pnglogo.png" width="200px" /></td><td width="33.3%"></td><td width="33.3%"></td></tr></table><div style="width:100%;height:2px;background:#000;margin-bottom:40px;font-family:helvetica;"></div><table width="100%"><tr><td width="33.3%"><b style="font-family:helvetica;">'.date('d F Y').'</b><p style="font-family:helvetica;">'.$buyer_name.'<br />'.$email.'<br />'.$phone.'<br /></p></td><td width="33.3%"></td><td width="33.3%"></td></tr></table><table width="100%"><tr><td width="100%"><div style="width:100%;display:inline-block;font-family:helvetica;"><b><u>Dear '.strtoupper($buyer_name).'</u></b><p><b><u>OFFER LETTER FOR THE SALE OF '.strtoupper($bed).' BEDROOM LOCATED AT '.strtoupper($property_address).' '.strtoupper($property_city).', '.strtoupper($property_state).'.</u></b></p><p>Sequel to your indication of purchase on our platform for which we thank you, we write to offer you the interest on  the aforementioned property by way of Sale viz:</p></div></td></tr></table><table width="100%" cellpadding="10px"><tr><td style="font-family:helvetica;" width="33%" valign="top"><b>Description:</b></td><td style="font-family:helvetica;">'.$property_name.'</td></tr><tr><td style="font-family:helvetica;" width="33%" valign="top"><b>Location:</b></td><td style="font-family:helvetica;">'.$property_address.', '.$property_city.', '.$property_state.'</td></tr><tr><td style="font-family:helvetica;" width="33%" valign="top"><b>Purchase price:</b></td><td style="font-family:helvetica;">N'.number_format($total_amount).'</td></tr><tr><td style="font-family:helvetica;" width="33%" valign="top"><b>Payment term:</b></td><td style="font-family:helvetica;">Financing</td></tr><tr><td style="font-family:helvetica;" width="33%" valign="top"><b>Transaction fee(5%):</b></td><td style="font-family:helvetica;">N'.number_format($trans_fee).'</td></tr></table><p style="font-family:helvetica;">Kindly indicate your acceptance of this offer by signing with the acceptance button below.<br /><br />Please note that this offer is only valid for 5 working days and full payment is expected within this period. Offer will be considered as invalid if full payment is not received.</p><table width="100%"><tr><td style="font-family:helvetica;" width="33.3%">Yours Sincerely,<br />For Smallsmall Tech Ltd<div style="width:100%;height:auto;"><img src="'.base_url().'assets/img/chisom-signature.png" width="150px" height="auto" /></div><b>Chisom Olisaemeka</b><br /><b>VP Marketing and Sales</b><br /></td><td width="33.3%"></td><td width="33.3%"></td></tr></table></div>';
	    
	    //Set folder to save PDF to
            $this->html2pdf->folder('./uploads/offers/');
            
            //Set the filename to save/download as
            $this->html2pdf->filename($ref.'_offer_letter.pdf');
            
            //Set the paper defaults
            $this->html2pdf->paper('a4', 'portrait');
            
            //Load html view
            $this->html2pdf->html($pdf_content); 
    		 
            //Create the PDF
            $path = $this->html2pdf->create('save');
            
            $this->email->from('no-reply@smallsmall.com', 'SmallSmall');
    
    		$this->email->to($email);
    		
    		$this->email->cc('accounts@smallsmall.com');
    		
    		$this->email->bcc('hello@buysmallsmall.ng, tunde.b@smallsmall.com');
    				
    		$this->email->set_mailtype("html");
    
    		$this->email->subject("Offer letter:".$property_name."");	
    
    		$message = $this->load->view('email/header.php', $data, TRUE);
    
    		$message .= $this->load->view('email/offer-letter-email.php', $data, TRUE);
    
    		$message .= $this->load->view('email/footer.php', $data, TRUE);
    
    		$this->email->message($message);
            
            if($path){
    			
    		    $this->email->attach($path);
    		    
    		}
    
    		$emailRes = $this->email->send();
    		
    		return $emailRes;
	}*/

	public function shares_certificate($receiverID, $requestID, $name, $email, $shares_amount, $property_details, $message, $hold_period, $maturity_date)
	{

		//Prepare PDF document

		$date_of_purchase = date('Y-m-d');

		$data['name'] = $name;

		$data['address'] = $property_details;

		$data['message'] = $message;

		$def_hold_period = '';

		if ($hold_period == 'One Year') {

			$def_hold_period = '1 Year';
		} elseif ($hold_period == 'Two Years') {

			$def_hold_period = '2 Years';
		} elseif ($hold_period == 'Three Years') {

			$def_hold_period = '3 Years';
		} elseif ($hold_period == 'Four Years') {

			$def_hold_period = '4 Years';
		} elseif ($hold_period == 'Five Years') {

			$def_hold_period = '5 Years';
		} elseif ($hold_period == 'Six Years') {

			$def_hold_period = '6 Years';
		}

		$filename = '';



		$pdf_content = '<div style="width:100%;display:inline-block;text-align:center;"><table width="100%"><tr><td width="33.3%"></td><td width="33.3%" style="text-align:center" valign="top"><img src="images/bss-logo.png" width="200px" /></td><td width="33.3%"></td></tr></table><div style="width:100%;background:transparent;margin:40px auto 40px 0;color:#64318A;font-size:30px;font-family:Arial, Helvetica, sans-serif;font-weight:bold;margin:40px 0 40px 0">*** SHARES CERTIFICATE ***</div><div style="width:100%;line-height:40px;color:#64318A;font-size:26px;font-family:Arial, Helvetica, sans-serif;text-transform:uppercase"></div><table style="display:inline-block;margin:auto;font-family:Arial, Helvetica, sans-serif;min-width:30px;max-width:70%;" cellpadding="10"><tr><td><div style="text-align:left">This is to certify that <span style="width:500px;display:inline-block;color:#000;font-size:18px;border-bottom:2px solid #000;font-family:Verdana, Geneva, Tahoma, sans-serif;line-height:24px;text-align:center">' . $name . '</span></div></td></tr><tr><td><div style="text-align:left">is the registered holder of <span style="width:100px;display:inline-block;color:#000;font-size:18px;border-bottom:2px solid #000;font-family:Verdana, Geneva, Tahoma, sans-serif;line-height:24px;text-align:center">' . $shares_amount . '</span> property shares of</div></td></tr><tr><td><div style="text-align:left"><span style="display:inline-block;color:#000;font-size:18px;border-bottom:2px solid #000;font-family:Verdana, Geneva, Tahoma, sans-serif;line-height:24px;text-align:center"> ' . $property_details . '</span></div></td></tr><tr><td><div style="text-align:left">The hold period of this shares is <span style="width:100px;display:inline-block;color:#000;font-size:18px;border-bottom:2px solid #000;font-family:Verdana, Geneva, Tahoma, sans-serif;line-height:24px;text-align:center">' . $hold_period . '</span> and expected date of maturity is <span style="width:100px;display:inline-block;color:#000;font-size:18px;border-bottom:2px solid #000;font-family:Verdana, Geneva, Tahoma, sans-serif;line-height:24px;">' . date('d M, Y', strtotime($maturity_date)) . '</span></div></td></tr><tr><td><div style="text-align:left"></div></td></tr></table> <table width="100%"><tr><td style="text-align:center;font-family:Arial, Helvetica, sans-serif;" width="33.3%"><div style="width:100%;height:auto;"><img src="' . base_url() . 'assets/img/chisom-signature.png" width="150px" height="auto" /></div><b style="color:#64318A">VP Marketing and Sales</b><br /></td><td width="33.3%" style="text-align:center"></td><td width="33.3%" style="text-align:center;font-family:Arial, Helvetica, sans-serif;"><span style="width:200px;display:inline-block;color:#000;font-size:18px;border-bottom:2px solid #000;font-family:Verdana, Geneva, Tahoma, sans-serif;line-height:24px;margin-bottom:10px;">' . $date_of_purchase . '</span><br /><span style="color:#64318A">Date of issue:</span></td></tr></table></div>';

		$dir = './uploads/shares_certificate/' . $receiverID . '/';

		$user_dir = $dir . $requestID . '/';

		if (!is_dir($dir)) {

			mkdir($dir);

			mkdir($user_dir);
		}

		$filename = date('YmdHis') . '_certificate.pdf';

		//Set folder to save PDF to
		$this->html2pdf->folder($user_dir);

		//Set the filename to save/download as
		$this->html2pdf->filename($filename);

		//Set the paper defaults
		$this->html2pdf->paper('a4', 'landscape');

		//Load html view
		$this->html2pdf->html($pdf_content);

		//Create the PDF
		$path = $this->html2pdf->create('save');

		//$this->email->from('no-reply@smallsmall.com', 'SmallSmall');

		//$this->email->to($email);

		//$this->email->cc('accounts@smallsmall.com');

		//$this->email->bcc('hello@buysmallsmall.ng, tunde.b@smallsmall.com');

		//$this->email->set_mailtype("html");

		//$this->email->subject("Share Certificate:".$property_details."");	

		//$message = $this->load->view('email/header.php', $data, TRUE);

		//$message .= $this->load->view('email/shares-certificate-email.php', $data, TRUE);

		//$message .= $this->load->view('email/footer.php', $data, TRUE);

		//$this->email->message($message);

		//if($path){

		//$this->email->attach($path);

		//}

		//$emailRes = $this->email->send();

		return array("status" => $emailRes, "filename" => $filename);
	}

	public function finance_offer_letter($ref, $email, $phone, $property_name, $buyer_name, $property_address, $property_city, $property_state, $total_amount, $trans_fee, $finance_balance, $payable, $amount, $payment_period, $transaction_fee)
	{
		//Prepare PDF document

		$data['name'] = $buyer_name;

		$data['property_name'] = $property_name;

		$data['address'] = $property_address . ' ' . $property_city . ', ' . $property_state;

		$pdf_content = '<div style="width:100%;display:inline-block;"><table width="100%"><tr><td width="33.3%" valign="top"><img src="' . base_url() . 'assets/images/smallsmall-pnglogo.png" width="200px" /></td><td width="33.3%"></td><td width="33.3%"></td></tr></table><div style="width:100%;height:2px;background:#000;margin-bottom:40px;font-family:helvetica;"></div><table width="100%"><tr><td width="33.3%"><b style="font-family:helvetica;">' . date('d F Y') . '</b><p style="font-family:helvetica;">' . $buyer_name . '<br />' . $email . '<br />' . $phone . '<br /></p></td><td width="33.3%"></td><td width="33.3%"></td></tr></table><table width="100%"><tr><td width="100%"><div style="width:100%;display:inline-block;font-family:helvetica;"><b><u>Dear ' . $buyer_name . '</u></b><p><b><u>OFFER LETTER FOR THE SALE OF ' . strtoupper($bed) . ' BEDROOM LOCATED AT ' . strtoupper($property_address) . ' ' . strtoupper($property_city) . ', ' . strtoupper($property_state) . '.</u></b></p><p>Sequel to your indication of purchase on our platform for which we thank you, we write to offer you the interest on  the aforementioned property by way of Sale viz:</p></td></tr></table><table width="100%" cellpadding="10px"><tr><td style="font-family:helvetica;" width="33%" valign="top"><b>Description:</b></td><td style="font-family:helvetica;">' . $property_name . '</td></tr><tr><td style="font-family:helvetica;" width="33%" valign="top"><b>Location:</b></td><td style="font-family:helvetica;">' . $property_address . ', ' . $property_city . ', ' . $property_state . '</td></tr><tr><td style="font-family:helvetica;" width="33%" valign="top"><b>Purchase price:</b></td><td style="font-family:helvetica;">N' . number_format($total_amount) . '</td></tr><tr><td style="font-family:helvetica;" width="33%" valign="top"><b>Payment term:</b></td><td style="font-family:helvetica;">Financing</td></tr><tr><td style="font-family:helvetica;" width="33%" valign="top"><b>Equity (%):</b></td><td style="font-family:helvetica;">N' . number_format($payable) . '</td></tr><tr><td style="font-family:helvetica;" width="33%" valign="top"><b>Principal (%):</b></td><td style="font-family:helvetica;">N' . number_format($finance_balance) . '</td></tr><tr><td style="font-family:helvetica;" width="33%" valign="top"><b>Tenure:</b></td><td style="font-family:helvetica;">' . ($payment_period / 12) . ' Years( $payment_period Months )</td></tr><tr><td style="font-family:helvetica;" width="33%" valign="top"><b>Repayment:</b></td><td style="font-family:helvetica;">MONTHLY (REFER TO PAYMENT SCHEDULE)</td></tr><tr><td style="font-family:helvetica;" width="33%" valign="top"><b>Transaction fee(4%):</b></td><td style="font-family:helvetica;">N' . number_format($transaction_fee) . '</td></tr></table><p style="font-family:helvetica;">Kindly indicate your acceptance of this offer by signing with the acceptance button below.<br /><br />Please note that this offer is only valid for 5 working days and full payment is expected within this period. Offer will be considered as invalid if full payment is not received.</p><table width="100%"><tr><td style="font-family:helvetica;" width="33.3%">Yours Sincerely,<br />For Smallsmall Tech Ltd<div style="width:100%;height:auto;"><img src="' . base_url() . 'assets/img/chisom-signature.png" width="150px" height="auto" /></div><b>Chisom Olisaemeka</b><br /><b>VP Marketing and Sales</b><br /></td><td width="33.3%"></td><td width="33.3%"></td></tr></table></div>';

		//Set folder to save PDF to
		$this->html2pdf->folder('./uploads/offers/' . $ref . '/');

		//Set the filename to save/download as
		$this->html2pdf->filename($ref . '_offer_letter.pdf');

		//Set the paper defaults
		$this->html2pdf->paper('a4', 'portrait');

		//Load html view
		$this->html2pdf->html($pdf_content);

		//Create the PDF
		$path = $this->html2pdf->create('save');

		$this->email->from('no-reply@smallsmall.com', 'SmallSmall');

		$this->email->to($email);

		$this->email->cc('accounts@smallsmall.com');

		$this->email->bcc('hello@buysmallsmall.ng, tunde.b@smallsmall.com');

		$this->email->set_mailtype("html");

		$this->email->subject("Offer letter:" . $property_name . "");

		$message = $this->load->view('email/header.php', $data, TRUE);

		$message .= $this->load->view('email/offer-letter-email.php', $data, TRUE);

		$message .= $this->load->view('email/footer.php', $data, TRUE);

		$this->email->message($message);

		if ($path) {

			$this->email->attach($path);
		}

		$emailRes = $this->email->send();

		return $emailRes;
	}

	public function notification_letter($email, $message, $name)
	{

		$data['message'] = $message;

		$data['name'] = $name;

		$this->email->from('no-reply@smallsmall.com', 'SmallSmall');

		$this->email->to($email);

		$this->email->cc('accounts@smallsmall.com');

		$this->email->bcc('hello@buysmallsmall.ng, tunde.b@smallsmall.com');

		$this->email->set_mailtype("html");

		$this->email->subject("Co Own Property Purchase.");

		$message = $this->load->view('email/header.php', $data, TRUE);

		$message .= $this->load->view('email/property-notification-email.php', $data, TRUE);

		$message .= $this->load->view('email/footer.php', $data, TRUE);

		$this->email->message($message);

		$emailRes = $this->email->send();

		return $emailRes;
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

	//parameter array
	public function create_user_account($details)
	{

		$password = md5('Password@123');

		$confirmationCode = md5(date('YmdHis'));

		return $this->buytolet_model->create_user_account($details['id'], $details['fname'], $details['lname'], $details['email'], $password, $details['phone'], $details['refCode'], $confirmationCode);
	}

	public function getPropertyWorth($user_id)
	{

		$worth = 0;

		$properties = $this->buytolet_model->getAllUserCoOwnProperties($user_id);

		if (count($properties) > 1) {

			for ($i = 0; $i < count($properties); $i++) {

				//$worth = $worth + $properties[$i]['amount'];

				//get request date diff
				$date_diff = $this->getNumOfDays($properties[$i]['request_date']);

				$noOfUnits = (@$properties[$i]['no_of_units']) ? @$properties[$i]['no_of_units'] : @$properties[$i]['unit_amount'];

				$buy_back_rate = getBuyBackRate($date_diff, $properties[$i]['propertyID'], $noOfUnits);

				//$worth = $worth + $buy_back_rate;

			}
		} else {
			//Return single property worth
			//$worth = $properties[0]['amount'];

			//get request date diff
			$date_diff = $this->getNumOfDays($properties[0]['request_date']);

			$noOfUnits = (@$properties[0]['no_of_units']) ? @$properties[0]['no_of_units'] : @$properties[0]['unit_amount'];

			$buy_back_rate = getBuyBackRate($date_diff, $properties[0]['propertyID'], $noOfUnits);

			//$worth = $worth + $buy_back_rate;
		}

		return $worth;
	}

	// Filter Properties

	public function filter_properties()
	{

		// Filter values from POST data
		{
			$states = ['2648', '2671'];

			$types = ['1', '6', '4', '7'];

			$slug = '';

			// 			$search_crit['slug'] = $this->input->post('slug');

			// 			$search_crit['list_price'] = $this->input->post('list_price');

			// 			$search_crit['location'] = $this->input->post('location');

			// 			$search_crit['property_type'] = $this->input->post('property_type');

			$search_crit = [
				'slug' => $this->input->post('slug'),
				'list_price' => $this->input->post('list_price'),
				'location' => $this->input->post('location'),
				'property_type' => $this->input->post('property_type')
			];

			if ($search_crit['slug'] == 5) {

				$slug = 'co-ownership';
			} else if ($search_crit['slug'] == 2) {

				$slug = 'buy-to-let';
			} else {

				$slug = 'buy-to-live';
			}
			// echo $slug;

			// 			if (@$search_crit['slug'] === null && @$search_crit['list_price'] === null && @$search_crit['location'] === null && @$search_crit['property_type'] === null) {

			// 				$search_crit = $this->session->userdata('filter');
			// 			} else {

			// 				$this->session->set_userdata('filter', $search_crit);
			// 			}

			if (!isset($search_crit['slug']) && !isset($search_crit['list_price']) && !isset($search_crit['location']) && !isset($search_crit['property_type'])) {
				$search_crit = $this->session->userdata('filter');
			} else {
				$this->session->set_userdata('filter', $search_crit);
			}


			$config['total_rows'] = $this->buytolet_model->getFilterPropertiesCount($search_crit);

			$data['total_count'] = $config['total_rows'];

			$config['suffix'] = '';

			$data['locations'] = $this->buytolet_model->get_locations($states);

			// Get cities
			if (!empty($search_crit['location'])) {
				$data['cities'] = $this->buytolet_model->getCities($search_crit['location']);
			} else {
				$data['cities'] = array();
			}

			// 			$data['cities'] = $this->buytolet_model->getCities(2671);

			$data['apts'] = $this->buytolet_model->getAptypes($types);

			if ($config['total_rows'] > 0) {

				// $page_number = $this->uri->segment(2);

				$config['base_url'] = base_url() . 'properties-filter';

				$config['uri_segment'] = 2;

				$page_number = $this->uri->segment(2, 1);


				if (empty($page_number))

					$page_number = 1;

				$offset = ($page_number - 1) * $this->pagination->per_page;

				$this->buytolet_model->setPageNumber($this->pagination->per_page);

				$this->buytolet_model->setOffset($offset);

				$this->pagination->cur_page = $page_number;

				$this->pagination->initialize($config);

				$data['page_links'] = $this->pagination->create_links();

				$data['from_row'] = $offset + 1;

				$data['properties'] = $this->buytolet_model->getFilterProperties($search_crit);

				$data['to_row'] = $page_number * count($data['properties']);
			}

			if ($this->session->has_userdata('loggedIn')) {

				$data['userID'] = $this->session->userdata('userID');

				$data['fname'] = $this->session->userdata('fname');

				$data['lname'] = $this->session->userdata('lname');

				$data['user_type'] = $this->session->userdata('user_type');

				$data['loggedIn'] = $this->session->userdata('loggedIn');

				$data['interest'] = $this->session->userdata('interest');
			}

			$data['slug'] = $slug;

			//Check login status

			$data['title'] = "Properties :: Buy2Let";

			$this->load->view('templates/header', $data);

			$this->load->view('properties', $data);

			$this->load->view('templates/footer', $data);
		}
	}

	public function send_mmio_email($fname, $lname, $email, $hash)
	{

		$curl = curl_init();

		curl_setopt_array($curl, array(

			CURLOPT_URL => "https://app.marketingmaster.io/apis_email/webhook_callback_main/?hash=" . $hash . "",

			CURLOPT_CUSTOMREQUEST => "POST",

			CURLOPT_POSTFIELDS => json_encode(array(

				'first_name' => $fname,

				'last_name' => $lname,

				"email" => $email

			)),

			CURLOPT_HTTPHEADER => [

				"content-type: application/json"

			],

		));

		$response = curl_exec($curl);

		return $response;
	}

	function send_confirmation()
	{

		$user = $this->buytolet_model->getUserByID('mededot@gmail.com');

		if (!empty($user)) {

			$data['name'] = $user['firstName'];

			$data['confirmationLink'] = base_url() . 'activate/' . $user['confirmation'];

			$messageR = "Successful Registration";

			// Send Data to notification DB when mail is being sent to notify user on dashboard
			$subject = "SmallSmall Confirmation";

			//Successful insert then send email to user				
			$this->email->from('donotreply@smallsmall.com', 'SmallSmall');

			$this->email->to($user['user_email']);

			$this->email->subject("SmallSmall Confirmation");

			$this->email->set_mailtype("html");

			$message = $this->load->view('email/header.php', $data, TRUE);

			$message .= $this->load->view('email/confirmation.php', $data, TRUE);

			$message .= $this->load->view('email/footer.php', $data, TRUE);

			$this->email->message($message);

			$emailRes = $this->email->send();

			echo 1;
		}
	}

	public function send_payment_email($subject, $email, $property_name, $shares_amount, $name, $amount)
	{

		$body = 'Hello%20' . $name . '%2C%3Cbr%3E%3Cbr%3E%0A%20%0AYour%20payment%20has%20been%20successfully%20processed.%3Cbr%3E%3Cbr%3E%0A%0AProperty%20info%3A%20%3Cb%3E' . $property_name . '%3C%2Fb%3E%3Cbr%3E%0ANumber%20of%20shares%20bought%3A%20%3Cb%3E' . $shares_amount . '%20shares%3C%2Fb%3E%3Cbr%3E%0AAmount%20paid%3A%20%3Cb%3EN' . $amount . '%3C%2Fb%3E%3Cbr%3E%3Cbr%3E%0APlease%20note%20that%20this%20message%20is%20automatically%20generated%20in%20response%20to%20a%20single%20successful%20payment.%20A%20record%20of%20this%20transaction%20can%20be%20found%20in%20the%20Payment%20section%20on%20your%20dashboard.%3Cbr%3E%3Cbr%3E%0A%20%0ANeed%20more%20information%20or%20support%3F%3Cbr%3E%0AOur%20customer%20service%20team%20is%20available%20over%20Phone%20or%20WhatsApp%3Cbr%3E%0ACall%20or%20Whatsapp%20%2B234%20809%20866%206255%3Cbr%3E%0ACheers%2C%3Cbr%3E%0ATeam%20Buysmallsmall';

		$method = 'https://api.selzy.com/en/api/sendEmail?format=json&api_key=6tkb5syz5g1bgtkz1uonenrxwpngrwpq9za1u6ha&email=' . $email . '&sender_name=Buy+Small+Small&sender_email=hello@buysmallsmall.ng&subject=Sample+Subject&body=' . $body . '&list_id=20';

		$curl = curl_init();

		curl_setopt_array($curl, array(

			CURLOPT_URL => $method,

			CURLOPT_CUSTOMREQUEST => "POST",

			CURLOPT_RETURNTRANSFER => true,

			CURLOPT_HTTPHEADER => [

				"content-type: application/json"

			],

		));

		return curl_exec($curl);
	}

	public function send_shares_email($subject, $email, $email_type, $property_name, $shares_amount, $name = '', $senders_name = '')
	{

		$method = '';

		if ($email_type == 'free_shares') {

			$button = '%3Cdiv%20style%3D%22display%3Ainline-block%3Btext-align%3Acenter%3Bpadding-left%3A15px%3Bpadding-right%3A15px%3Bpadding-top%3A20px%3Bpadding-bottom%3A20px%3Bbackground%3A%2364318a%22%3E%3Ca%20style%3D%22text-decoration%3Anone%3Bcolor%3A%23FFF%22%20href%3D%22' . $link . '%22%3ELogin%20here%3C%2Fa%3E%3C%2Fdiv%3E';

			$body = '' . $senders_name . '%20has%20gifted%20sharesamount%20you%20shares%20on%20' . $property_name . '%3Cbr%3E%3Cbr%3E%0A%20%0AHello%20' . $name . '%2C%3Cbr%3E%3Cbr%3E%0A%20%0AYay%21%20You%E2%80%99re%20now%20a%20co-owner%20on%20BuySmallSmall.%3Cbr%3E%0AYour%20property%20shares%20will%20allow%20you%20to%20earn%20rental%20income%20every%20quarter%20and%20enjoy%20capital%20appreciation%20on%20the%20property.%3Cbr%3E%3Cbr%3E%20%0A%0AAccumulating%20enough%20shares%20over%20a%20period%20of%201%20to%206%20years%20will%20allow%20you%20to%20migrate%20from%20co-ownership%20to%20sole-ownership%20or%20exit%20through%20our%20guaranteed%20buy-back%20program%20at%20a%20higher%20price.%3Cbr%3E%3Cbr%3E%0A%0A%3Cb%3EWhats%20next%3F%3C%2Fb%3E%0ALogin%20and%20Accept%20Shares%20to%20set%20your%20account%20password%2C%20and%20view%20your%20shares%20in%20your%20portfolio.%0A%3Cdiv%20style%3D%22width%3A100%25%3Bheight%3A2px%3Bmargin-top%3A15px%3Bmargin-bottom%3A15px%3B%22%3E%3C%2Fdiv%3E%0A' . $button . '%0A%3Cdiv%20style%3D%22width%3A100%25%3Bheight%3A2px%3Bmargin-top%3A15px%3Bmargin-bottom%3A15px%3B%22%3E%3C%2Fdiv%3E%0AOn%20your%20personalized%20dashboard%2C%20you%20can%20track%20your%20portfolio%2C%20migration%20journey%2C%20buy-back%20rate%2C%20give%20out%20shares%20from%20your%20gift%20basket%2C%20create%20a%20wallet%20account%2C%20and%20a%20lot%20of%20other%20exciting%20features.%3Cbr%3E%3Cbr%3E%0A%0ANeed%20more%20information%20or%20support%3F%3Cbr%3E%0AOur%20customer%20service%20team%20is%20available%20over%20Phone%20or%20WhatsApp%3Cbr%3E%0ACall%20or%20Whatsapp%20%2B234%20809%20866%206255%3Cbr%3E%0ACheers%2C%3Cbr%3E%0A%3Cb%3ETeam%20Buysmallsmall%3C%2Fbr%3E';

			$method = 'https://api.selzy.com/en/api/sendEmail?format=json&api_key=6tkb5syz5g1bgtkz1uonenrxwpngrwpq9za1u6ha&email=' . $email . '&sender_name=Buy+Small+Small&sender_email=hello@buysmallsmall.ng&subject=Sample+Subject&body=' . $body . '&list_id=20';
		} elseif ($email_type = 'payment') {

			$body = 'Hello%20' . $name . '%2C%3Cbr%3E%3Cbr%3E%0A%20%0AYour%20payment%20has%20been%20successfully%20processed.%3Cbr%3E%3Cbr%3E%0A%0AProperty%20info%3A%20%3Cb%3Eproperty_address%3C%2Fb%3E%3Cbr%3E%0ANumber%20of%20shares%20bought%3A%20%3Cb%3Eshares_amount%20shares%3C%2Fb%3E%3Cbr%3E%0AAmount%20paid%3A%20%3Cb%3ENamount_paid%3C%2Fb%3E%3Cbr%3E%3Cbr%3E%0APlease%20note%20that%20this%20message%20is%20automatically%20generated%20in%20response%20to%20a%20single%20successful%20payment.%20A%20record%20of%20this%20transaction%20can%20be%20found%20in%20the%20Payment%20section%20on%20your%20dashboard.%3Cbr%3E%3Cbr%3E%0A%20%0ANeed%20more%20information%20or%20support%3F%3Cbr%3E%0AOur%20customer%20service%20team%20is%20available%20over%20Phone%20or%20WhatsApp%3Cbr%3E%0ACall%20or%20Whatsapp%20%2B234%20809%20866%206255%3Cbr%3E%0ACheers%2C%3Cbr%3E%0ATeam%20Buysmallsmall';
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

		return curl_exec($curl);
	}

	public function self_shares_email($subject, $email, $shares_amount, $property_name, $amount, $completion_date, $buyback_rate, $hold_period, $migration_date, $name)
	{

		$userID = $this->session->userdata('userID');


		$body = 'Congratulation%20' . $name . '%21%21%0A%20%0AYou%20have%20just%20purchased%20your%20first%20property%20shares%20on%20BuySmallSmall%21%20We%20couldn%E2%80%99t%20be%20more%20excited%20to%20have%20you%20start%20your%20home%20ownership%20journey%20with%20us.%0A%0ANow%2C%20let%27s%20rail%20out%20the%20details.%0A%3Ctable%20width%3D%22100%25%22%3E%0A%3Ctr%3E%0A%3Ctd%20width%3D%2250%25%22%3E%0A%3Cb%3EYour%20shares%20details%3C%2Fb%3E%3Cbr%3E%0ANumber%20of%20shares%20bought%3A%20' . $shares_amount . '%20shares%3Cbr%3E%0AProperty%20info%3A%20' . $property_name . '%3Cbr%3E%0ALocation%3A%20Lekki%2C%20Lagos%3Cbr%3E%0AAmount%20paid%3A%20N' . $amount . '%3Cbr%3E%0ACompletion%20date%3A%20' . $completion_date . '%3Cbr%3E%0A%3C%2Ftd%3E%0A%3Ctd%3E%0A%3Cb%3EYour%20Migration%3C%2Fb%3E%3Cbr%3E%0AAdvance%20Payout%20Request%3A%20Earn%20%28Monthly%2C%20Quarterly%2C%20Biannually%2C%20Year%29%0ABuy-back%20rate%3A%20' . $buyback_rate . '%20yearly%0AHold%20period%3A%20' . $hold_period . '%20years%0AMigration%20date%3A%20' . $migration_date . '%0A%3C%2Ftd%3E%0A%3C%2Ftr%3E%0A%3C%2Ftable%3E%0A%3Cb%3E4%20things%20you%20can%20do%20with%20your%20shares%3C%2Fb%3E%3Cbr%3E%09%0A1.%20Grow%20your%20shares%20and%20enjoy%20buy-back%20at%20a%20higher%20rate.%3Cbr%3E%0A2.%20Convert%20your%20shares%20as%20down%20payment%20to%20own%20an%20entire%20unit.%3Cbr%3E%0A3.%20Transfer%20your%20shares%20as%20a%20gift%20to%20next%20of%20kin.%3Cbr%3E%0A4.%20Sell%20your%20shares%20on%20our%20secondary%20market%20at%20your%20price.%3Cbr%3E%3Cbr%3E%0A%3Cb%3EUnleash%20the%20Champion%20in%20you%3C%2Fb%3E%3Cbr%3E%09%0ANigeria%20has%20one%20of%20the%20lowest%20home%20ownership%20rates%20and%20highest%20housing%20deficit%20in%20the%20world.%20Let%E2%80%99s%20change%20that%20by%20putting%20more%20people%20on%20their%20home%20ownership%20journey.%20How%3F%20Refer%20your%20friends%2C%20family%20and%20people%20in%20your%20network%2C%20and%20we%20will%20make%20their%20steps%20count%2C%20and%20we%20will%20reward%20you.%3Cbr%3E%3Cbr%3E%0A%0APlease%20make%20sure%20you%E2%80%99re%20logged%20in%20on%20BuySmallSmall%20when%20leaving%20a%20review%20so%20we%20can%20get%20notified%20and%20issue%20your%20free%20Share%20immediately.%3Cbr%3E%3Cbr%3E%0A%0ANeed%20more%20information%20or%20support%3F%3Cbr%3E%0AOur%20customer%20service%20team%20is%20available%20over%20Phone%20or%20WhatsApp%3Cbr%3E%0ACall%20or%20Whatsapp%20%2B234%20809%20866%206255%3Cbr%3E%0ACheers%2C%3Cbr%3E%0A%3Cb%3ETeam%20Buysmallsmall%3C%2Fbr%3E';

		$method = 'https://api.selzy.com/en/api/sendEmail?format=json&api_key=6tkb5syz5g1bgtkz1uonenrxwpngrwpq9za1u6ha&email=' . $email . '&sender_name=Buy+Small+Small&sender_email=hello@buysmallsmall.ng&subject=' . $subject . '&body=' . $body . '&list_id=20';

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
			$this->buytolet_model->insertEmailDets($userID, 'Self purchase', 1);
		} else {

			$this->buytolet_model->insertEmailDets($userID, 'Self purchase', 0);
		}
	}

	public function send_personalized_email($subject, $email, $email_type, $link, $name = '')
	{

		$method = '';

		$userID = 0;

		if ($this->session->has_userdata('userID')) {

			$userID = $this->session->userdata('userID');
		} else {

			$userID = $this->buytolet_model->getUser($email)['userID'];
		}

		if ($email_type == 'verification') {

			$button = '%3Cdiv%20style%3D%22display%3Ainline-block%3Btext-align%3Acenter%3Bpadding-left%3A15px%3Bpadding-right%3A15px%3Bpadding-top%3A20px%3Bpadding-bottom%3A20px%3Bbackground%3A%2364318a%22%3E%3Ca%20style%3D%22text-decoration%3Anone%3Bcolor%3A%23FFF%22%20href%3D%22' . $link . '%22%3EConfirm%20email%20address%3C%2Fa%3E%3C%2Fdiv%3E';

			$body = '%3Ctable%20width%3D%22100%25%22%3E%3Ctr%3E%3Ctd%20width%3D%2233.3%25%22%3E%26nbsp%3B%3C%2Ftd%3E%3Ctd%20style%3D%22text-align%3Acenter%22%20class%3D%22logo-container%22%20width%3D%2233.3%25%22%3E%3Cimg%20width%3D%22130px%22%20src%3D%22https%3A%2F%2Fbuy.smallsmall.com%2Fassets%2Fimg%2Flogo.png%22%20%2F%3E%3C%2Ftd%3E%3Ctd%20width%3D%2233.3%25%22%3E%26nbsp%3B%3C%2Ftd%3E%3C%2Ftr%3E%3C%2Ftable%3EYou%20are%20on%20your%20way%21%3Cp%3ELet%27s%20confirm%20your%20email%20address%3C%2Fp%3EClick%20on%20the%20link%20below%20to%20confirm%20your%20email%20address.%3Cdiv%20style%3D%22width%3A100%25%3Bheight%3A1px%3Bmargin%3A10px%200%3B%22%3E%3C%2Fdiv%3E' . $button . '';

			$method = 'https://api.selzy.com/en/api/sendEmail?format=json&api_key=6tkb5syz5g1bgtkz1uonenrxwpngrwpq9za1u6ha&email=' . $email . '&sender_name=Buy+Small+Small&sender_email=hello@buysmallsmall.ng&subject=Sample+Subject&body=' . $body . '&list_id=20';
		} elseif ($email_type == 'subscribe') {

			$method = 'https://api.selzy.com/en/api/subscribe?format=json&api_key=6tkb5syz5g1bgtkz1uonenrxwpngrwpq9za1u6ha&list_ids=20&fields[email]=' . $email . '&fields[Name]=' . $name . '&double_optin=3&overwrite=0';
		} elseif ($email_type == 'password-reset') {

			$button = '%3Cdiv%20style%3D%22display%3Ainline-block%3Btext-align%3Acenter%3Bpadding-left%3A15px%3Bpadding-right%3A15px%3Bpadding-top%3A20px%3Bpadding-bottom%3A20px%3Bbackground%3A%2364318a%22%3E%3Ca%20style%3D%22text-decoration%3Anone%3Bcolor%3A%23FFF%22%20href%3D%22' . $link . '%22%3EReset%20password%3C%2Fa%3E%3C%2Fdiv%3E';

			$body = '%3Ctable%20width%3D%22100%25%22%3E%3Ctr%3E%3Ctd%20width%3D%2233.3%25%22%3E%26nbsp%3B%3C%2Ftd%3E%3Ctd%20style%3D%22text-align%3Acenter%22%20class%3D%22logo-container%22%20width%3D%2233.3%25%22%3E%3Cimg%20width%3D%22130px%22%20src%3D%22https%3A%2F%2Fbuy.smallsmall.com%2Fassets%2Fimg%2Flogo.png%22%20%2F%3E%3C%2Ftd%3E%3Ctd%20width%3D%2233.3%25%22%3E%26nbsp%3B%3C%2Ftd%3E%3C%2Ftr%3E%3C%2Ftable%3EHello%20' . $name . '%2C%3Cbr%3EWe%20received%20a%20request%20to%20reset%20your%20password.%20Click%20the%20link%20below%20to%20reset%20your%20password%3Cdiv%20style%3D%22width%3A100%25%3Bheight%3A1px%3Bmargin%3A10px%200%3B%22%3E%3C%2Fdiv%3E' . $button . '%3Cdiv%20style%3D%22width%3A100%25%3Bheight%3A1px%3Bmargin%3A10px%200%3B%22%3E%3C%2Fdiv%3E%3Cb%3EIf%20you%20didn%27t%20intend%20to%20reset%20your%20password%2C%20no%20action%20is%20needed.%3C%2Fb%3E%3Cbr%3EHave%20questions%3F%3Cbr%3EPlease%20check%20our%20faq%20or%20contact%20us%3A%20hello%40buysmallsmall.ng%3Cbr%3E%3Cbr%3ERegards%2C%3Cbr%3E%3Cb%3ETeam%20BuySmallSmall%3C%2Fb%3E';

			$method = 'https://api.selzy.com/en/api/sendEmail?format=json&api_key=6tkb5syz5g1bgtkz1uonenrxwpngrwpq9za1u6ha&email=' . $email . '&sender_name=Buy+Small+Small&sender_email=hello@buysmallsmall.ng&subject=' . $subject . '&body=' . $body . '&list_id=20';
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

	public function test_email()
	{

		$body = '%3Ctable%20width%3D%22100%25%22%3E%3Ctr%3E%3Ctd%20width%3D%2233.3%25%22%3E%26nbsp%3B%3C%2Ftd%3E%3Ctd%20style%3D%22text-align%3Acenter%22%20class%3D%22logo-container%22%20width%3D%2233.3%25%22%3E%3Cimg%20width%3D%22130px%22%20src%3D%22https%3A%2F%2Fbuy.smallsmall.com%2Fassets%2Fimg%2Flogo.png%22%20%2F%3E%3C%2Ftd%3E%3Ctd%20width%3D%2233.3%25%22%3E%26nbsp%3B%3C%2Ftd%3E%3C%2Ftr%3E%3C%2Ftable%3EYou%20are%20on%20your%20way%21%3Cp%3ELet%27s%20confirm%20your%20email%20address%3C%2Fp%3EClick%20on%20the%20link%20below%20to%20confirm%20your%20email%20address.%3Cdiv%20style%3D%22display%3Ainline-block%3Btext-align%3Acenter%3Bpadding-left%3A15px%3Bpadding-right%3A15px%3Bpadding-top%3A20px%3Bpadding-bottom%3A20px%3Bbackground%3A%2364318a%22%3E%3Ca%20style%3D%22text-decoration%3Anone%3Bcolor%3A%23FFF%22%20href%3D%22https://seun.com%22%3EConfirm%20email%20address%3C%2Fa%3E%3C%2Fdiv%3E';

		$verify = 'https://api.selzy.com/en/api/sendEmail?format=json&api_key=6tkb5syz5g1bgtkz1uonenrxwpngrwpq9za1u6ha&email=seuncrowther@gmail.com&sender_name=Seun&sender_email=hello@buysmallsmall.ng&subject=Sample+Subject&body=' . $body . '&list_id=20';

		$subscribe = 'https://api.selzy.com/en/api/subscribe?format=json&api_key=6tkb5syz5g1bgtkz1uonenrxwpngrwpq9za1u6ha&list_ids=20&fields[email]=seuncrowther@gmail.com&fields[Name]=Oluwaseun+Crowther&double_optin=0&overwrite=0';

		$lists = 'https://api.selzy.com/en/api/getLists?format=json&api_key=6tkb5syz5g1bgtkz1uonenrxwpngrwpq9za1u6ha';

		$get_contact = 'https://api.selzy.com/en/api/getContact?format=json&api_key=6tkb5syz5g1bgtkz1uonenrxwpngrwpq9za1u6ha&email=seuncrowther@gmail.com';

		//$body = $this->plusify_string($body);

		$curl = curl_init();

		curl_setopt_array($curl, array(

			//CURLOPT_URL => "https://api.selzy.com/en/api/sendEmail",
			CURLOPT_URL => $verify,

			CURLOPT_CUSTOMREQUEST => "POST",

			CURLOPT_RETURNTRANSFER => true,

			CURLOPT_HTTPHEADER => [

				"content-type: application/json"

			],

		));

		$response = curl_exec($curl);

		$response = json_decode($response, true);

		//echo $response['result']['email_id'];

		if ($response['result']['email_id']) {
			//Enter into DB
			$this->buytolet_model->insertEmailDets($userID, $emailType, $status);
		}

		//print_r( $response );
	}

	public function plusify_string($str)
	{

		$str = str_replace(" ", "+", $str);

		return $str;
	}

	public function promo_offer($shares_bought, $promo = array(), $coupon_code = '')
	{

		$response = 0;

		$promo_value = 0;

		$max_term_result = 0;

		if (!empty($promo)) {

			if ($promo['promo_code'] == $coupon_code && $promo['type'] == 'Coupon') {

				if ($promo['promo_term']) {


					$term_result = intval($shares_bought / $promo['promo_term']);

					$promo_value = $term_result * $promo['promo_value'];

					if ($promo['promo_term_max'] && $promo['promo_term_max'] <= $shares_bought) {

						$max_term_result = intval($shares_bought / $promo['promo_term_max']);
					}

					$promo_value = $max_term_result + $promo_value;
				} else {

					$promo_value = $promo['promo_value'];
				}

				$response = 1;
			} else if ($coupon_code == '' && $promo['type'] == 'Free') {

				if ($promo['promo_term']) {

					$term_result = intval($shares_bought / $promo['promo_term']);

					$promo_value = $term_result * $promo['promo_value'];

					if ($promo['promo_term_max'] && $promo['promo_term_max'] <= $shares_bought) {

						$max_term_result = intval($shares_bought / $promo['promo_term_max']);
					}

					$promo_value = $max_term_result + $promo_value;
				} else {

					$promo_value = $promo['promo_value'];
				}

				$response = 1;
			}
		}

		return array("response" => $response, "promo_value" => $promo_value);

		exit;
	}

	/*public function free_offer($shares_bought, $promo = array()){
	    
	    
	    
	    $promo_value = 0;
	    
	    if(!empty($promo)){
	        
	        if($promo['type'] == 'Free'){
	            
	            if($promo['promo_term']){
	                
	                $term_result = intval($shares_bought/$promo['promo_term']);
	                
	                $promo_value = $terms_result * $promo['promo_value'];
	                
	            }else{
	                
	                $promo_value = $promo['promo_value'];
	                
	            }
	            
	        }
	        
	    }
	    
	    return $promo_value;
	    
	}*/

	public function getNumOfDays($date_of_purchase)
	{

		$today = strtotime(date('Y-m-d H:i:s')); // or your date as well

		$date_of_purchase = strtotime($date_of_purchase);

		$datediff = $today - $date_of_purchase;

		return round($datediff / (60 * 60 * 24));
	}

	public function getBuyBackRate($numberOfDays, $propertyID, $noOfUnits)
	{

		$rates = 0;

		$property = $this->buytolet_model->getProperty($propertyID);

		if ($numberOfDays > 0 && $numberOfDays <= 365) {

			$valuePerDay = (($property['co_appr_1'] * $property['marketValue']) / 100) / 365;

			$rates = $rates + ($numberOfDays * $valuePerDay);
		} elseif ($numberOfDays > 365 && $numberOfDays <= 730) {

			//Add first year
			$first_year = ($property['co_appr_1'] * $property['marketValue']) / 100;

			$remaining_days = $numberOfDays - 365;

			$valuePerDay = (($property['co_appr_2'] * $property['marketValue']) / 100) / 365;

			$rates = $first_year + ($remaining_days * $valuePerDay);
		} elseif ($numberOfDays > 730 && $numberOfDays <= 1095) {

			//Add first year
			$first_year = ($property['co_appr_1'] * $property['marketValue']) / 100;

			//Add second year
			$second_year = ($property['co_appr_2'] * $property['marketValue']) / 100;

			$remaining_days = $numberOfDays - 730;

			$valuePerDay = (($property['co_appr_3'] * $property['marketValue']) / 100) / 365;

			$rates = ($first_year + $second_year) + ($remaining_days * $valuePerDay);
		} elseif ($numberOfDays > 1095 && $numberOfDays <= 1460) {

			//Add first year
			$first_year = ($property['co_appr_1'] * $property['marketValue']) / 100;

			//Add second year
			$second_year = ($property['co_appr_2'] * $property['marketValue']) / 100;

			//Add third year
			$third_year = ($property['co_appr_3'] * $property['marketValue']) / 100;

			$remaining_days = $numberOfDays - 1095;

			$valuePerDay = (($property['co_appr_4'] * $property['marketValue']) / 100) / 365;

			$rates = ($first_year + $second_year + $third_year) + ($remaining_days * $valuePerDay);
		} elseif ($numberOfDays > 1460 && $numberOfDays <= 1825) {

			//Add first year
			$first_year = ($property['co_appr_1'] * $property['marketValue']) / 100;

			//Add second year
			$second_year = ($property['co_appr_2'] * $property['marketValue']) / 100;

			//Add third year
			$third_year = ($property['co_appr_3'] * $property['marketValue']) / 100;

			//Add fourth year
			$fourth_year = ($property['co_appr_4'] * $property['marketValue']) / 100;

			$remaining_days = $numberOfDays - 1460;

			$valuePerDay = (($property['co_appr_5'] * $property['marketValue']) / 100) / 365;

			$rates = ($first_year + $second_year + $third_year + $fourth_year) + ($remaining_days * $valuePerDay);
		} elseif ($numberOfDays > 1825 && $numberOfDays <= 2190) {

			//Add first year
			$first_year = ($property['co_appr_1'] * $property['marketValue']) / 100;

			//Add second year
			$second_year = ($property['co_appr_2'] * $property['marketValue']) / 100;

			//Add third year
			$third_year = ($property['co_appr_3'] * $property['marketValue']) / 100;

			//Add fourth year
			$fourth_year = ($property['co_appr_4'] * $property['marketValue']) / 100;

			//Add fifth year
			$fifth_year = ($property['co_appr_5'] * $property['marketValue']) / 100;

			$remaining_days = $numberOfDays - 1825;

			$valuePerDay = (($property['co_appr_6'] * $property['marketValue']) / 100) / 365;

			$rates = ($first_year + $second_year + $third_year + $fourth_year + $fifth_year) + ($remaining_days * $valuePerDay);
		}

		$rates = $rates * $noOfUnits;

		return number_format((float)$rates, 2, '.', '');
	}

	public function payment_email($name, $propertyDetails, $sharesAmount, $amount, $email)
	{

		$amount = number_format($amount);

		$headers = array(
			'Content-Type' => 'application/json',
			'Accept' => 'application/json',
			'X-API-KEY' => '6tkb5syz5g1bgtkz1uonenrxwpngrwpq9za1u6ha',
		);

		$client = new \GuzzleHttp\Client([
			'base_uri' => 'https://eu1.unione.io/en/transactional/api/v1/'
		]);

		$requestBody = [
			"id" => "02fb1dc6-f3d1-11ed-aa4f-cefa7a4d2a28"
			//"id" => '"'.$template_id.'"'
		];

		// end Unione Template

		try {
			$response = $client->request('POST', 'template/get.json', array(
				'headers' => $headers,
				'json' => $requestBody,
			));

			$jsonResponse = $response->getBody()->getContents();

			$responseData = json_decode($jsonResponse, true);

			$htmlBody = $responseData['template']['body']['html'];

			// Replace the placeholder in the HTML body with the username
			$htmlBody = str_replace('{{Name}}', $name, $htmlBody);

			$htmlBody = str_replace('{{propertyDetails}}', $propertyDetails, $htmlBody);

			$htmlBody = str_replace('{{sharesAmount}}', $sharesAmount, $htmlBody);

			$htmlBody = str_replace('{{amount}}', $amount, $htmlBody);

			$htmlBody = str_replace('{{link}}', base_url('login'), $htmlBody);

			$data['response'] = $htmlBody;
		} catch (\GuzzleHttp\Exception\BadResponseException $e) {

			$data['response'] = $e->getMessage();
		}

		$this->email->from('donotreply@smallsmall.com', 'Small Small');

		$this->email->to($email);

		$this->email->subject("Payment Successful");

		$this->email->set_mailtype("html");

		$message = $this->load->view('email/unione-email-template.php', $data, TRUE);

		$this->email->message($message);

		$emailRes = $this->email->send();
	}

	public function self_shares_notification_email($name, $propertyName, $propertyLocation, $sharesAmount, $amount, $email, $rate, $holdPeriod, $migrationDate, $completionDate)
	{

		$amount = number_format($amount);

		$headers = array(
			'Content-Type' => 'application/json',
			'Accept' => 'application/json',
			'X-API-KEY' => '6tkb5syz5g1bgtkz1uonenrxwpngrwpq9za1u6ha',
		);

		$client = new \GuzzleHttp\Client([
			'base_uri' => 'https://eu1.unione.io/en/transactional/api/v1/'
		]);

		$requestBody = [
			"id" => "c67f2132-f3dd-11ed-ad01-dabfde6df242"
			//"id" => '"'.$template_id.'"'
		];

		// end Unione Template

		try {
			$response = $client->request('POST', 'template/get.json', array(
				'headers' => $headers,
				'json' => $requestBody,
			));

			$jsonResponse = $response->getBody()->getContents();

			$responseData = json_decode($jsonResponse, true);

			$htmlBody = $responseData['template']['body']['html'];

			// Replace the placeholder in the HTML body with the username
			$htmlBody = str_replace('{{Name}}', $name, $htmlBody);

			$htmlBody = str_replace('{{propertyName}}', $propertyName, $htmlBody);

			$htmlBody = str_replace('{{propertyLocation}}', $propertyLocation, $htmlBody);

			$htmlBody = str_replace('{{sharesAmount}}', $sharesAmount, $htmlBody);

			$htmlBody = str_replace('{{amount}}', $amount, $htmlBody);

			$htmlBody = str_replace('{{completionDate}}', $completionDate, $htmlBody);

			$htmlBody = str_replace('{{migrationDate}}', $migrationDate, $htmlBody);

			$htmlBody = str_replace('{{holdPeriod}}', $holdPeriod, $htmlBody);

			$htmlBody = str_replace('{{rate}}', $rate, $htmlBody);



			$data['response'] = $htmlBody;
		} catch (\GuzzleHttp\Exception\BadResponseException $e) {

			$data['response'] = $e->getMessage();
		}

		$this->email->from('donotreply@smallsmall.com', 'Small Small');

		$this->email->to($email);

		$this->email->subject("Payment Successful");

		$this->email->set_mailtype("html");

		$message = $this->load->view('email/unione-email-template.php', $data, TRUE);

		$this->email->message($message);

		$emailRes = $this->email->send();
	}

	public function get_eligible_users()
	{

		echo "One time script";

		exit;

		$users = $this->buytolet_model->get_all_eligible_users();

		$promo = $this->buytolet_model->getActivePromo();

		$coupon_code = 'VAFC10';

		$result = 0;

		for ($i = 0; $i < count($users); $i++) {

			if (!empty($promo) && $promo['promo_term'] <= $users[$i]['unit_amount']) {

				$old_units = $users[$i]['unit_amount'];

				$prop = $this->buytolet_model->getProperty($users[$i]['propertyID']);

				if ($promo['type'] == 'Coupon') {

					$promo_details = $this->promo_offer($users[$i]['unit_amount'], $promo, $coupon_code);
				} elseif ($promo['type'] == 'Free') {

					$promo_details = $this->promo_offer($users[$i]['unit_amount'], $promo);
				}

				$unit_amount = $promo_details['promo_value'] + $users[$i]['unit_amount'];

				$cost = $users[$i]['unit_amount'] * $prop['price'];

				$promo_amount = $promo_details['promo_value'];

				$result = $this->buytolet_model->updateCoOwnRequest($users[$i]['refID'], $cost, $users[$i]['userID'], $unit_amount, $promo['promo_code'], $promo_amount);

				//echo 'Old units: '.$old_units.' New units: '.$unit_amount.' Cost: '.$cost.' Promo Amount: '.$promo_amount.' <br/>';

			}

			echo $result . '<br />';
		}

		echo "Finished!";

		exit;
		//print_r($users);
	}

	public function get_stp_buyers(){

		$users = $this->buytolet_model->get_stp_users();

		if(count($users) > 0){
			for($i = 0; $i < count($users); $i++){

				$email = $this->buytolet_model->get_user($users[$i]['userID'])['email'];

				if($email){
					
					$res = $this->stp_subscription_plan($email, $users[$i]['userID'], $users[$i]['frequency'], $users[$i]['purchase_amount']);

					if($res == 1){
						echo "Done <br />";
					}else{
						echo "Not completed : ".$res." <br />";
					}

					if(is_null($users[$i]['request_id']) || $users[$i]['request_id'] == ''){
						$this->buytolet_model->update_with_request_id($users[$i]['refID'], $users[$i]['userID']);
					}

				}	
			}
		}else{
			echo "0 Users";
			exit;
		}	
	}

	public function stp_subscription_plan($email, $userid, $interval, $amount){

		$intv = "";

		if($interval == 'Monthly')
			$intv = "monthly";
		elseif($interval == 'Daily')
			$intv = "daily";
		elseif($interval == 'Weekly')
			$intv = "weekly";
		else
			$intv = '';

		$curl = curl_init();

		curl_setopt_array($curl, array(

			CURLOPT_URL => "https://api.paystack.co/plan",

			CURLOPT_RETURNTRANSFER => true,

			CURLOPT_ENCODING => "",

			CURLOPT_MAXREDIRS => 10,

			CURLOPT_TIMEOUT => 30,

			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,

			CURLOPT_CUSTOMREQUEST => "POST",

			CURLOPT_POSTFIELDS => array(

				"name" => $interval.' STP Plan',
				
				"interval" => $intv,//($intv == 'Monthy')? "monthly" : "daily",

				"amount" => $amount * 100

			),

			CURLOPT_HTTPHEADER => array(

				"Authorization: Bearer sk_live_9ebad81beeda5a8cfe05fd8b4853a1942167e56b",

				"Cache-Control: no-cache"

			),

			)

		);

		$response = json_decode(curl_exec($curl), true);

		if ($response['status']) {

			if($this->stp_subscription($email, $amount, $response['data']['plan_code'], $userid)){
				
				if($this->buytolet_model->update_with_plan_code($response['data']['plan_code'], $userid)){

					return 1;

				}else{

					return 00;

				}

			}else{

				return 02;

			}
		} else {

			return $response['message'];

		}
		curl_close($curl);
	}

	public function stp_subscription($email, $amount, $plan, $userid){

		$url = "https://api.paystack.co/transaction/initialize";

		$fields = [

			'email' => "$email",

			'amount' => $amount * 100,

			'plan' => "$plan"

		];

		$fields_string = http_build_query($fields);

		//open connection

		$ch = curl_init();		

		//set the url, number of POST vars, POST data

		curl_setopt($ch, CURLOPT_URL, $url);

		curl_setopt($ch, CURLOPT_POST, true);

		curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);

		curl_setopt($ch, CURLOPT_HTTPHEADER, array(

			"Authorization: Bearer sk_live_9ebad81beeda5a8cfe05fd8b4853a1942167e56b",

			"Cache-Control: no-cache",

		));		

		//So that curl_exec returns the contents of the cURL; rather than echoing it

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);		

		//execute post

		$response = json_decode(curl_exec($ch), true);

		if($response['status']){

			if($this->buytolet_model->update_with_authorization_url($response['data']['authorization_url'], $userid)){
				
				return 1;

			}else{

				return 04;

			}		

		}else{

			return curl_error($curl);;

		}

	}
}
