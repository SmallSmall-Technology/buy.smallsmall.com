<?php

defined('BASEPATH') or exit('No direct script access allowed');


class User extends CI_Controller
{

	public function __construct()
	{

		parent::__construct();
		Header('Access-Control-Allow-Origin: *');
	}

	public function dashboard()
	{

		if (!file_exists(APPPATH . 'views/user/dashboard.php')) {

			// Whoops, we don't have a page for that!
			show_404();
		}

		if ($this->session->has_userdata('userID')) {

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');

			$data['email'] = $this->session->userdata('email');

			$data['refCode'] = $this->session->userdata('referral_code');

			$data['user_type'] = $this->session->userdata('user_type');

			$data['profile'] = $this->buytolet_model->get_user($data['userID']);

			$data['profile_pic'] = $this->buytolet_model->get_user_pic($data['userID']);

			$data['verification_status'] = $this->session->userdata('verified');

			$data['balance'] = $this->buytolet_model->get_wallet_balance($data['userID']);

			$data['bss_request_count'] = $this->buytolet_model->count_user_requests($data['userID']);

			$data['bss_inspection_count'] = $this->buytolet_model->count_bss_inspections($data['userID']);

			$data['portfolio_count'] = $this->buytolet_model->get_total_portfolios($data['userID']);

			$data['co_count'] = $this->buytolet_model->get_total_coown_shares($data['userID']);

			$data['buy_to_let'] = $this->buytolet_model->getUserProperties($data['userID'], 2);

			$data['buy_to_live'] = $this->buytolet_model->getUserProperties($data['userID'], 1);

			$data['owner'] = $this->buytolet_model->get_owned_property($data['userID']);

			$data['gift_basket'] = $this->buytolet_model->getGiftBasketTotal($data['userID']);

			$worth_and_bbr = $this->getPropertyWorth($data['userID']);

			$data['worth'] = $worth_and_bbr['worth'];

			$data['buybackrate'] = $worth_and_bbr['buybackrate'];

			$data['properties_buybackrate'] = $worth_and_bbr['properties'];

			$data['notifier'] = $this->checkForNewOffer($data['userID']);

			$data['b_notifier'] = $this->checkForNewGiftOffer($data['userID']);

			$data['profile_title'] = "Dashboard";

			$data['title'] = "Dashboard";

			$this->load->view('user/templates/header', $data);

			$this->load->view('user/templates/verification-bar', $data);

			$this->load->view('user/templates/notification-bar', $data);

			$this->load->view('user/dashboard', $data);

			$this->load->view('user/templates/js-files', $data);

			$this->load->view('user/templates/footer');
		} else {

			redirect(base_url() . "login", 'refresh');
		}
	}

	public function property_portfolio()
	{

		if (!file_exists(APPPATH . 'views/user/property-portfolio.php')) {

			// Whoops, we don't have a page for that!
			show_404();
		}

		if ($this->session->has_userdata('userID')) {

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');

			$data['email'] = $this->session->userdata('email');

			$data['refCode'] = $this->session->userdata('referral_code');

			$data['user_type'] = $this->session->userdata('user_type');

			$data['profile'] = $this->buytolet_model->get_user($data['userID']);

			$data['profile_pic'] = $this->buytolet_model->get_user_pic($data['userID']);

			$data['verification_status'] = $this->session->userdata('verified');

			$data['balance'] = $this->buytolet_model->get_wallet_balance($data['userID']);

			$data['bss_request_count'] = $this->buytolet_model->count_user_requests($data['userID']);

			$data['co_own_units'] = $this->buytolet_model->co_own_units($data['userID']);

			$data['bss_inspection_count'] = $this->buytolet_model->count_bss_inspections($data['userID']);

			$data['co_own_total'] = $this->buytolet_model->get_total_coown_shares($data['userID']);

			$data['buy_to_let'] = $this->buytolet_model->getUserProperties($data['userID'], 2);

			$worth_and_bbr = $this->getPropertyWorth($data['userID']);

			$data['worth'] = $worth_and_bbr['worth'];

			$data['all_co_own_properties'] = $this->buytolet_model->get_all_co_own_properties($data['userID']);

			$data['all_champions_properties'] = $this->buytolet_model->get_champions_offer($data['userID']);

			//$data['finance_value'] = $this->buytolet_model->getSumOfMarketValue(@$data['recent_financing']['propertyID']);

			$data['buy_to_live'] = $this->buytolet_model->getUserProperties($data['userID'], 1);

			$data['gifts'] = $this->buytolet_model->get_gifts($data['userID']);

			$data['profile_title'] = "Property Portfolio";

			$data['title'] = "Property Portfolio";

			$this->load->view('user/templates/header', $data);

			$this->load->view('user/templates/property-portfolio-submenu', $data);

			$this->load->view('user/templates/verification-bar', $data);

			$this->load->view('user/property-portfolio', $data);

			$this->load->view('user/templates/js-files', $data);

			$this->load->view('user/templates/footer');
		} else {

			redirect(base_url() . "login", 'refresh');
		}
	}

	public function champions_basket()
	{

		if (!file_exists(APPPATH . 'views/user/champions.php')) {

			// Whoops, we don't have a page for that!
			show_404();
		}

		if ($this->session->has_userdata('userID')) {

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');

			$data['email'] = $this->session->userdata('email');

			$data['refCode'] = $this->session->userdata('referral_code');

			$data['user_type'] = $this->session->userdata('user_type');

			$data['profile'] = $this->buytolet_model->get_user($data['userID']);

			$data['profile_pic'] = $this->buytolet_model->get_user_pic($data['userID']);

			$data['verification_status'] = $this->session->userdata('verified');

			$data['balance'] = $this->buytolet_model->get_wallet_balance($data['userID']);

			$data['bss_request_count'] = $this->buytolet_model->count_user_requests($data['userID']);

			$data['co_own_units'] = $this->buytolet_model->co_own_units($data['userID']);

			$data['bss_inspection_count'] = $this->buytolet_model->count_bss_inspections($data['userID']);

			$data['co_own_total'] = $this->buytolet_model->getUserSharesTotal($data['userID']);

			$data['buy_to_let'] = $this->buytolet_model->getUserProperties($data['userID'], 2);

			$data['co_own_worth'] = $this->getPropertyWorth($data['userID']);

			$data['all_co_own_properties'] = $this->buytolet_model->get_all_co_own_properties($data['userID']);

			$data['giftbags'] = $this->buytolet_model->getChampionsGiftbags($data['userID']);

			$data['sent_gifts'] = $this->buytolet_model->getSentChampionsGifts($data['userID']);

			$data['added_gifts'] = $this->buytolet_model->getAddedChampionsGifts($data['userID']);

			$data['gifts'] = $this->buytolet_model->get_gifts($data['userID']);

			$data['profile_title'] = "Property Portfolio";

			$data['title'] = "Property Portfolio";

			$this->load->view('user/templates/header', $data);

			$this->load->view('user/templates/property-portfolio-submenu', $data);

			$this->load->view('user/templates/verification-bar', $data);

			$this->load->view('user/champions', $data);

			$this->load->view('user/templates/js-files', $data);

			$this->load->view('user/templates/footer');
		} else {

			redirect(base_url() . "login", 'refresh');
		}
	}

	public function single_champions_basket($requestID)
	{

		if (!file_exists(APPPATH . 'views/user/champions.php')) {

			// Whoops, we don't have a page for that!
			show_404();
		}

		if ($this->session->has_userdata('userID')) {

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');

			$data['email'] = $this->session->userdata('email');

			$data['refCode'] = $this->session->userdata('referral_code');

			$data['user_type'] = $this->session->userdata('user_type');

			$data['profile'] = $this->buytolet_model->get_user($data['userID']);

			$data['profile_pic'] = $this->buytolet_model->get_user_pic($data['userID']);

			$data['verification_status'] = $this->session->userdata('verified');

			$data['co_own_units'] = $this->buytolet_model->co_own_units($data['userID']);

			$data['champions_property'] = $this->buytolet_model->get_champions_property($requestID);

			$data['giftbags'] = $this->buytolet_model->getChampionsGiftbags($data['userID'], $requestID);

			$data['sent_gifts'] = $this->buytolet_model->getSentChampionsGifts($data['userID'], $requestID);

			$data['added_gifts'] = $this->buytolet_model->getAddedChampionsGifts($data['userID'], $requestID);

			$data['gifts'] = $this->buytolet_model->get_gifts($data['userID'], $requestID);

			$data['profile_title'] = "Champions Basket";

			$data['title'] = "Property Portfolio";

			$this->load->view('user/templates/header', $data);

			$this->load->view('user/templates/property-portfolio-submenu', $data);

			$this->load->view('user/templates/verification-bar', $data);

			$this->load->view('user/champions', $data);

			$this->load->view('user/templates/js-files', $data);

			$this->load->view('user/templates/footer');
		} else {

			redirect(base_url() . "login", 'refresh');
		}
	}

	public function co_ownership_property($id)
	{

		if (!file_exists(APPPATH . 'views/user/co-ownership-property.php')) {

			// Whoops, we don't have a page for that!
			show_404();
		}

		if ($this->session->has_userdata('userID')) {

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');

			$data['email'] = $this->session->userdata('email');

			$data['refCode'] = $this->session->userdata('referral_code');

			$data['user_type'] = $this->session->userdata('user_type');

			$data['profile'] = $this->buytolet_model->get_user($data['userID']);

			$data['profile_pic'] = $this->buytolet_model->get_user_pic($data['userID']);

			$data['verification_status'] = $this->session->userdata('verified');

			$data['balance'] = $this->buytolet_model->get_wallet_balance($data['userID']);

			$data['bss_request_count'] = $this->buytolet_model->count_user_requests($data['userID']);

			$data['bss_inspection_count'] = $this->buytolet_model->count_bss_inspections($data['userID']);

			$data['gifts'] = $this->buytolet_model->get_gifts($data['userID']);

			$data['co_details'] = $this->buytolet_model->get_co_own_property($id);

			$data['all_co_own_properties'] = $this->buytolet_model->get_all_co_own_properties($data['userID']);

			$data['profile_title'] = "Property Portfolio";

			$data['title'] = "Property Portfolio";

			if (!empty($data['co_details']) && $data['co_details']['request_status'] == 'new') {

				$this->buytolet_model->changeRequestStatus($data['co_details']['reqID']);
			}

			$this->load->view('user/templates/header', $data);

			$this->load->view('user/templates/property-portfolio-submenu', $data);

			$this->load->view('user/templates/verification-bar', $data);

			$this->load->view('user/co-ownership-property', $data);

			$this->load->view('user/templates/js-files', $data);

			$this->load->view('user/templates/footer');
		} else {

			redirect(base_url() . "login", 'refresh');
		}
	}

	public function co_ownership()
	{

		if (!file_exists(APPPATH . 'views/user/co-ownership.php')) {

			// Whoops, we don't have a page for that!
			show_404();
		}

		if ($this->session->has_userdata('userID')) {

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');

			$data['email'] = $this->session->userdata('email');

			$data['refCode'] = $this->session->userdata('referral_code');

			$data['user_type'] = $this->session->userdata('user_type');

			$data['profile'] = $this->buytolet_model->get_user($data['userID']);

			$data['profile_pic'] = $this->buytolet_model->get_user_pic($data['userID']);

			$data['verification_status'] = $this->session->userdata('verified');

			$data['balance'] = $this->buytolet_model->get_wallet_balance($data['userID']);

			$data['bss_request_count'] = $this->buytolet_model->count_user_requests($data['userID']);

			$data['bss_inspection_count'] = $this->buytolet_model->count_bss_inspections($data['userID']);

			$data['gifts'] = $this->buytolet_model->getAllUsersGifts($data['userID']);

			$data['all_co_own_properties'] = $this->buytolet_model->get_all_co_own_properties($data['userID']);

			$data['all_co_own_history'] = $this->buytolet_model->get_all_co_own_history($data['userID']);


			$data['stp_details'] = $this->buytolet_model->get_stp_properties($data['userID']);

			$worth_and_bbr = $this->getPropertyWorth($data['userID']);

			$data['buybackrate'] = $worth_and_bbr['buybackrate'];

			$data['stp_properties'] = $this->buytolet_model->get_stp_properties($data['userID']);

			$data['profile_title'] = "Property Portfolio";

			$data['title'] = "Property Portfolio";

			$this->load->view('user/templates/header', $data);

			$this->load->view('user/templates/property-portfolio-submenu', $data);

			$this->load->view('user/templates/verification-bar', $data);

			$this->load->view('user/co-ownership', $data);

			$this->load->view('user/templates/js-files', $data);

			$this->load->view('user/templates/footer');
		} else {

			redirect(base_url() . "login", 'refresh');
		}
	}

	public function bss_financing()
	{

		if (!file_exists(APPPATH . 'views/user/bss-financing.php')) {

			// Whoops, we don't have a page for that!
			show_404();
		}

		if ($this->session->has_userdata('userID')) {

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');

			$data['email'] = $this->session->userdata('email');

			$data['refCode'] = $this->session->userdata('referral_code');

			$data['user_type'] = $this->session->userdata('user_type');

			$data['profile'] = $this->buytolet_model->get_user($data['userID']);

			$data['profile_pic'] = $this->buytolet_model->get_user_pic($data['userID']);

			$data['verification_status'] = $this->session->userdata('verified');

			$data['balance'] = $this->buytolet_model->get_wallet_balance($data['userID']);

			$data['bss_request_count'] = $this->buytolet_model->count_user_requests($data['userID']);

			$data['bss_inspection_count'] = $this->buytolet_model->count_bss_inspections($data['userID']);

			$data['gifts'] = $this->buytolet_model->get_gifts($data['userID']);

			$data['bss_finance_property'] = $this->buytolet_model->get_finance_property();

			$data['finance_properties'] = $this->buytolet_model->get_all_finance_properties($data['userID']);

			$data['profile_title'] = "Property Portfolio";

			$data['title'] = "Property Portfolio";

			$this->load->view('user/templates/header', $data);

			$this->load->view('user/templates/property-portfolio-submenu', $data);

			$this->load->view('user/templates/verification-bar', $data);

			$this->load->view('user/bss-financing', $data);

			$this->load->view('user/templates/js-files', $data);

			$this->load->view('user/templates/footer');
		} else {

			redirect(base_url() . "login", 'refresh');
		}
	}

	public function profile()
	{

		if (!file_exists(APPPATH . 'views/user/profile.php')) {

			// Whoops, we don't have a page for that!
			show_404();
		}

		if ($this->session->has_userdata('userID')) {

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');

			$data['email'] = $this->session->userdata('email');

			$data['refCode'] = $this->session->userdata('referral_code');

			$data['user_type'] = $this->session->userdata('user_type');

			$data['profile'] = $this->buytolet_model->get_user($data['userID']);

			$data['profile_pic'] = $this->buytolet_model->get_user_pic($data['userID']);

			$data['verification_status'] = $this->session->userdata('verified');

			$data['profile_title'] = "Profile";

			$data['title'] = "Profile";

			$this->load->view('user/templates/header', $data);

			$this->load->view('user/templates/verification-bar', $data);

			$this->load->view('user/profile', $data);

			$this->load->view('user/templates/js-files', $data);

			$this->load->view('user/templates/footer');
		} else {

			redirect(base_url() . "login", 'refresh');
		}
	}

	public function referral()
	{

		if (!file_exists(APPPATH . 'views/user/referral.php')) {

			// Whoops, we don't have a page for that!
			show_404();
		}

		if ($this->session->has_userdata('userID')) {

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');

			$data['email'] = $this->session->userdata('email');

			$data['refCode'] = $this->session->userdata('referral_code');

			$data['user_type'] = $this->session->userdata('user_type');

			$data['profile'] = $this->buytolet_model->get_user($data['userID']);

			$data['profile_pic'] = $this->buytolet_model->get_user_pic($data['userID']);

			$data['verification_status'] = $this->session->userdata('verified');

			$data['profile_title'] = "Referral";

			$data['title'] = "Referral";

			$this->load->view('user/templates/header', $data);

			$this->load->view('user/templates/verification-bar', $data);

			$this->load->view('user/referral', $data);

			$this->load->view('user/templates/js-files', $data);

			$this->load->view('user/templates/footer');
		} else {

			redirect(base_url() . "login", 'refresh');
		}
	}

	public function wallet()
	{

		if (!file_exists(APPPATH . 'views/user/wallet.php')) {

			// Whoops, we don't have a page for that!
			show_404();
		}

		if ($this->session->has_userdata('userID')) {

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');

			$data['email'] = $this->session->userdata('email');

			$data['refCode'] = $this->session->userdata('referral_code');

			$data['user_type'] = $this->session->userdata('user_type');

			$data['profile'] = $this->buytolet_model->get_user($data['userID']);

			$data['profile_pic'] = $this->buytolet_model->get_user_pic($data['userID']);

			$data['verification_status'] = $this->session->userdata('verified');

			$data['wallet'] = $this->buytolet_model->get_wallet_details($data['userID']);

			$data['bss_request_count'] = $this->buytolet_model->count_user_requests($data['userID']);

			$data['bss_inspection_count'] = $this->buytolet_model->count_bss_inspections($data['userID']);


			$data['gifts'] = $this->buytolet_model->get_gifts($data['userID']);

			$data['profile_title'] = "Wallet";

			$data['title'] = "Wallet";

			$this->load->view('user/templates/header', $data);

			$this->load->view('user/templates/verification-bar', $data);

			$this->load->view('user/wallet', $data);

			$this->load->view('user/templates/js-files', $data);

			$this->load->view('user/templates/footer');
		} else {

			redirect(base_url() . "login", 'refresh');
		}
	}

	public function send_gift()
	{

		if (!file_exists(APPPATH . 'views/user/send-gift.php')) {

			// Whoops, we don't have a page for that!
			show_404();
		}

		if ($this->session->has_userdata('userID')) {

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');

			$data['email'] = $this->session->userdata('email');

			$data['refCode'] = $this->session->userdata('referral_code');

			$data['user_type'] = $this->session->userdata('user_type');

			$data['profile'] = $this->buytolet_model->get_user($data['userID']);

			$data['profile_pic'] = $this->buytolet_model->get_user_pic($data['userID']);

			$data['verification_status'] = $this->session->userdata('verified');

			$data['giftbags'] = $this->buytolet_model->getGiftbags($data['userID']);

			$data['sent_gifts'] = $this->buytolet_model->getSentGifts($data['userID']);

			$data['added_gifts'] = $this->buytolet_model->getAddedGifts($data['userID']);

			$data['locked_gifts'] = $this->buytolet_model->getLockedGifts($data['userID']);

			$data['worth'] = $this->getPropertyWorth($data['userID']);

			$data['profile_title'] = "Send Gift";

			$data['title'] = "Send Gift";

			$this->load->view('user/templates/header', $data);

			$this->load->view('user/templates/verification-bar', $data);

			$this->load->view('user/send-gift', $data);

			$this->load->view('user/templates/js-files', $data);

			$this->load->view('user/templates/footer');
		} else {

			redirect(base_url() . "login", 'refresh');
		}
	}

	public function payments()
	{

		if (!file_exists(APPPATH . 'views/user/payments.php')) {

			// Whoops, we don't have a page for that!
			show_404();
		}

		if ($this->session->has_userdata('userID')) {

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');

			$data['email'] = $this->session->userdata('email');

			$data['refCode'] = $this->session->userdata('referral_code');

			$data['user_type'] = $this->session->userdata('user_type');

			$data['profile'] = $this->buytolet_model->get_user($data['userID']);

			$data['profile_pic'] = $this->buytolet_model->get_user_pic($data['userID']);

			$data['verification_status'] = $this->session->userdata('verified');

			$data['wallet'] = $this->buytolet_model->get_wallet_details($data['userID']);

			$data['transactions'] = $this->buytolet_model->get_all_transactions($data['userID']);

			$data['profile_title'] = "Payments";

			$data['title'] = "Payments";

			$this->load->view('user/templates/header', $data);

			$this->load->view('user/templates/property-portfolio-submenu', $data);

			$this->load->view('user/templates/verification-bar', $data);

			$this->load->view('user/payments', $data);

			$this->load->view('user/templates/js-files', $data);

			$this->load->view('user/templates/footer');
		} else {

			redirect(base_url() . "login", 'refresh');
		}
	}

	public function gift_basket()
	{

		if (!file_exists(APPPATH . 'views/user/payments.php')) {

			// Whoops, we don't have a page for that!
			show_404();
		}

		if ($this->session->has_userdata('userID')) {

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');

			$data['email'] = $this->session->userdata('email');

			$data['refCode'] = $this->session->userdata('referral_code');

			$data['user_type'] = $this->session->userdata('user_type');

			$data['profile'] = $this->buytolet_model->get_user($data['userID']);

			$data['profile_pic'] = $this->buytolet_model->get_user_pic($data['userID']);

			$data['verification_status'] = $this->session->userdata('verified');

			$data['wallet'] = $this->buytolet_model->get_wallet_details($data['userID']);

			$data['transactions'] = $this->buytolet_model->get_all_transactions($data['userID']);

			$data['profile_title'] = "Payments";

			$data['title'] = "Payments";

			$this->load->view('user/templates/header', $data);

			$this->load->view('user/templates/property-portfolio-submenu', $data);

			$this->load->view('user/templates/verification-bar', $data);

			$this->load->view('user/gift-basket', $data);

			$this->load->view('user/templates/js-files', $data);

			$this->load->view('user/templates/footer');
		} else {

			redirect(base_url() . "login", 'refresh');
		}
	}

	public function send_to_gift_basket()
	{
		$gifted = $this->input->post('gift_amount');

		$owned_share = $this->input->post('user_shares');

		$request_id = $this->input->post('request_id');

		$property_id = $this->input->post('property_id');

		if (!$this->buytolet_model->check_request_shares_condition($request_id)['share_condition']) {

			$remaining_shares = $owned_share - $gifted;

			$user_id = $this->session->userdata('userID');

			$result = $this->buytolet_model->gift_basket_deposit($gifted, $request_id, $user_id, $property_id);

			if ($result) {
				//Update request table
				$res = $this->buytolet_model->update_request($user_id, $remaining_shares);

				echo 1;
			} else {

				echo 0;
			}
		} else {

			echo 0;
		}
	}

	public function send_user_gift()
	{

		$result = "error";

		$msg = "";

		$lock_status = 0;

		$data['userID'] = $this->session->userdata('userID');

		$unlock_shares = $this->input->post('unlock-shares');

		$requestID = $this->input->post('requestID');

		$the_id = $this->buytolet_model->getRequest($requestID)['id'];

		if ($unlock_shares) {

			$response = $this->buytolet_model->unlockChampionsShares($requestID, $data['userID']);

			if ($response) {

				$result = 'success';

				$msg = "Shares unlocked";

				$lock_status = 1;

				$this->buytolet_model->changeRequestStatus($the_id);
			} else {

				$msg = "Unable to unlock shares";
			}
		} else {

			$noOfShares = $this->input->post('noOfShares');

			$sharesAdded = $this->buytolet_model->getAddedGiftsByRequestID($requestID);

			$sharesSpent = $this->buytolet_model->getSpentGiftsByRequestID($requestID);

			$sharesAvailable = $sharesAdded['shares'] - $sharesSpent['shares_spent'];

			if ($sharesAvailable < $noOfShares) {

				$msg = "Insufficient shares available";
			} else {

				//Proceed with sending gift to user
				$data = $this->input->post();

				$user = $this->buytolet_model->check_email($data['email']);

				$user_id = '';

				if ($user) {
					//Get user ID
					$user_id = $this->buytolet_model->get_user_by_email($data['email'])['userID'];
				} else {
					//Generate new ID
					$user_id = $this->generate_user_id(12);

					$details['userID'] =  $user_id;

					$details['fname'] = $data['firstName'];

					$details['lname'] = $data['lastName'];

					$details['email'] = $data['email'];

					$details['phone'] = $data['phone'];

					$details['refcode'] = $this->session->userdata('referral_code');

					$res = $this->create_user_account($details);

					if ($res) {

						//Send email to user to activate account

					}
				}

				//$result = $this->buytolet_model->sendGift($data);

				if ($this->buytolet_model->insert_beneficiary_details($data['userID'], $data['requestID'], $data['firstName'], $data['lastName'], $data['email'], $data['phone'], $data['noOfShares'], '0', $user_id)) {

					$request = $this->buytolet_model->getRequest($ref_id);

					if ($request['status'] == 'new') {

						$this->buytolet_model->changeRequestStatus($the_id);
					}

					//Populate spent shares table
					if ($this->buytolet_model->insertSpentShares($data['userID'], $data['noOfShares'], $data['requestID'], $user_id, $request['propertyID'])) {

						$result = "success";

						$msg = "Successfully updated";
					}
				}

				//Send certificate to user
			}
		}

		echo json_encode(array("result" => $result, "msg" => $msg, "lock_status" => $lock_status));
	}

	public function transfer_to_user()
	{

		$result = "error";

		$msg = "";

		$data['userID'] = $this->session->userdata('userID');

		$firstname = $this->input->post('firstname');

		$lastname = $this->input->post('lastname');

		$email = $this->input->post('email');

		$phone = $this->input->post('phone');

		$propertyID = $this->input->post('propertyID');

		$requestID = $this->input->post('requestID');

		$user_shares = $this->input->post('user_shares');

		$transfer_shares = $this->input->post('transfer_shares');

		$shares_spent = $this->input->post('shares_spent');

		$sharesAvailable = $user_shares - $shares_spent;

		if ($sharesAvailable < $transfer_shares) {

			$msg = "Insufficient shares available";
		} else {

			//Proceed with sending gift to user
			$data = $this->input->post();

			$user = $this->buytolet_model->check_email($email);

			$user_id = '';

			if ($user) {
				//Get user ID
				$user_id = $this->buytolet_model->get_user_by_email($email)['userID'];
			} else {
				//Generate new ID
				$user_id = $this->generate_user_id(12);

				$details['userID'] =  $user_id;

				$details['fname'] = $firstname;

				$details['lname'] = $lastname;

				$details['email'] = $email;

				$details['phone'] = $phone;

				$details['refcode'] = $this->session->userdata('referral_code');

				$res = $this->create_user_account($details);

				if ($res) {

					//Send email to user to activate account

				}
			}

			//$result = $this->buytolet_model->sendGift($data);

			if ($this->buytolet_model->insert_beneficiary_details($data['userID'], $requestID, $firstname, $lastname, $email, $phone, $transfer_shares, '0', $user_id)) {

				//$request = $this->buytolet_model->getRequest($requestID);

				//Edit spent shares table
				if ($this->buytolet_model->updateSpentShares($transfer_shares, $requestID)) {

					$result = "success";

					$msg = "Successfully updated";
				}
			}

			//Send certificate to user
		}

		echo json_encode(array("result" => $result, "msg" => $msg));
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

	public function getPropertyWorth($user_id)
	{

		$worth = 0;

		$buy_back_rate = 0.00;

		$buy_back_per_prop = array();

		$properties = $this->buytolet_model->getAllUserCoOwnProperties($user_id);

		if (count($properties) > 1) {

			for ($i = 0; $i < count($properties); $i++) {

				//get request date diff
				$date_diff = $this->getNumOfDays($properties[$i]['request_date']);

				if ($properties[$i]['purchase_beneficiary'] == 'Self') {

					$worth = $worth + ($properties[$i]['unit_amount'] * $properties[$i]['price']);

					$bbr = $this->getBuyBackRate($date_diff, $properties[$i]['propertyID'], $properties[$i]['unit_amount']);

					$buy_back_rate = $buy_back_rate + $bbr;

					array_push($buy_back_per_prop, array("propertyID" => $properties[$i]['propertyID'], "num_of_days" => $date_diff, "buybackrate" => $bbr));
				} else {

					$worth = $worth + ($properties[$i]['no_of_units'] * $properties[$i]['price']);

					$bbr = $this->getBuyBackRate($date_diff, $properties[$i]['propertyID'], $properties[$i]['no_of_units']);

					$buy_back_rate = $buy_back_rate + $bbr;

					array_push($buy_back_per_prop, array("propertyID" => $properties[$i]['propertyID'], "num_of_days" => $date_diff, "buybackrate" => $bbr));
				}
			}
		} else if (count($properties) == 1) {
			//Return single property worth
			//$worth = $properties[0]['amount'];
			//get request date diff
			$date_diff = $this->getNumOfDays($properties[0]['request_date']);

			if ($properties[0]['purchase_beneficiary'] == 'Self') {

				$worth = $worth + ($properties[0]['unit_amount'] * $properties[0]['price']);

				$bbr = $this->getBuyBackRate($date_diff, $properties[0]['propertyID'], $properties[0]['unit_amount']);

				$buy_back_rate = $buy_back_rate + $bbr;

				array_push($buy_back_per_prop, array("propertyID" => $properties[0]['propertyID'], "num_of_days" => $date_diff, "buybackrate" => $bbr));
			} else {

				$worth = $worth + ($properties[0]['no_of_units'] * $properties[0]['price']);

				$bbr = $this->getBuyBackRate($date_diff, $properties[0]['propertyID'], $properties[0]['no_of_units']);

				$buy_back_rate = $buy_back_rate + $bbr;

				array_push($buy_back_per_prop, array("propertyID" => $properties[0]['propertyID'], "num_of_days" => $date_diff, "buybackrate" => $bbr));
			}
		}

		$worth = $worth + $buy_back_rate;

		return array("worth" => $worth, "buybackrate" => $buy_back_rate, "properties" => $buy_back_per_prop);
	}

	public function create_user_account($details)
	{

		$password = md5('Password@123');

		$confirmationCode = md5(date('YmdHis'));

		return $this->buytolet_model->create_user_account($details['id'], $details['fname'], $details['lname'], $details['email'], $password, $details['phone'], $details['refCode'], $confirmationCode);
	}

	public function checkForNewOffer($user_id)
	{

		return $this->buytolet_model->getRecentOffer($user_id);
	}

	public function checkForNewGiftOffer($user_id)
	{

		return $this->buytolet_model->getRecentGiftOffer($user_id);
	}


	// User Notification 

	public function notification()
	{

		if (!file_exists(APPPATH . 'views/user/notification.php')) {

			// Whoops, we don't have a page for that!
			show_404();
		}

		if ($this->session->has_userdata('userID')) {

			$data['userID'] = $this->session->userdata('userID');

			$data['fname'] = $this->session->userdata('fname');

			$data['lname'] = $this->session->userdata('lname');

			$data['email'] = $this->session->userdata('email');

			$data['refCode'] = $this->session->userdata('referral_code');

			$data['user_type'] = $this->session->userdata('user_type');

			$data['profile'] = $this->buytolet_model->get_user($data['userID']);

			$data['profile_pic'] = $this->buytolet_model->get_user_pic($data['userID']);

			$data['verification_status'] = $this->session->userdata('verified');

			$data['giftbags'] = $this->buytolet_model->getGiftbags($data['userID']);

			$data['sent_gifts'] = $this->buytolet_model->getSentGifts($data['userID']);

			$data['added_gifts'] = $this->buytolet_model->getAddedGifts($data['userID']);

			$data['profile_title'] = "Notification";

			$data['title'] = "Notification";

			if ($this->input->is_ajax_request()) {
				// Retrieve data for AJAX response
				$notificationCount = $this->buytolet_model->getDailyNotificationsCount($data['userID']);

				$this->session->set_userdata('notification_count', $notificationCount); // Store count in session variable


				$response = ['notificationCount' => $notificationCount];

				$notificationResponse = json_encode($response['notificationCount']);

				// Remove double quotes around values
				// echo $notificationCountResponse = '(' . str_replace('"', '', $notificationResponse) . ')';
				echo $notificationCountResponse = str_replace('"', '', $notificationResponse);
			} else {
				// Load the view for non-AJAX request
				$data['notifications'] = $this->buytolet_model->notification($data['userID']);

				// Retrieve the notification count from the session variable
				$notificationCount = $this->session->userdata('notification_count');

				$data['notification_count'] = $notificationCount;

				$this->load->view('user/templates/header', $data);

				$this->load->view('user/templates/verification-bar', $data);

				$this->load->view('user/notification', $data);

				$this->load->view('user/templates/js-files', $data);

				$this->load->view('user/templates/footer');
			}
		} else {

			redirect(base_url() . "login", 'refresh');
		}
	}


	public function mark_as_read()
	{
		$notificationID = $this->input->post('notification_id');

		$this->buytolet_model->markNotificationAsRead($notificationID);

		echo $notificationID; // Return a response to the AJAX call

	}

	public function plusify_string($str)
	{

		$str = str_replace(" ", "+", $str);

		return $str;
	}

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

			$valuePerDay = (($property['co_appr_1'] * $property['price']) / 100) / 365;

			$rates = $rates + ($numberOfDays * $valuePerDay);
		} elseif ($numberOfDays > 365 && $numberOfDays <= 730) {

			//Add first year
			$first_year = ($property['co_appr_1'] * $property['price']) / 100;

			$remaining_days = $numberOfDays - 365;

			$valuePerDay = (($property['co_appr_2'] * $property['price']) / 100) / 365;

			$rates = $first_year + ($remaining_days * $valuePerDay);
		} elseif ($numberOfDays > 730 && $numberOfDays <= 1095) {

			//Add first year
			$first_year = ($property['co_appr_1'] * $property['price']) / 100;

			//Add second year
			$second_year = ($property['co_appr_2'] * $property['price']) / 100;

			$remaining_days = $numberOfDays - 730;

			$valuePerDay = (($property['co_appr_3'] * $property['price']) / 100) / 365;

			$rates = ($first_year + $second_year) + ($remaining_days * $valuePerDay);
		} elseif ($numberOfDays > 1095 && $numberOfDays <= 1460) {

			//Add first year
			$first_year = ($property['co_appr_1'] * $property['price']) / 100;

			//Add second year
			$second_year = ($property['co_appr_2'] * $property['price']) / 100;

			//Add third year
			$third_year = ($property['co_appr_3'] * $property['price']) / 100;

			$remaining_days = $numberOfDays - 1095;

			$valuePerDay = (($property['co_appr_4'] * $property['price']) / 100) / 365;

			$rates = ($first_year + $second_year + $third_year) + ($remaining_days * $valuePerDay);
		} elseif ($numberOfDays > 1460 && $numberOfDays <= 1825) {

			//Add first year
			$first_year = ($property['co_appr_1'] * $property['price']) / 100;

			//Add second year
			$second_year = ($property['co_appr_2'] * $property['price']) / 100;

			//Add third year
			$third_year = ($property['co_appr_3'] * $property['price']) / 100;

			//Add fourth year
			$fourth_year = ($property['co_appr_4'] * $property['price']) / 100;

			$remaining_days = $numberOfDays - 1460;

			$valuePerDay = (($property['co_appr_5'] * $property['price']) / 100) / 365;

			$rates = ($first_year + $second_year + $third_year + $fourth_year) + ($remaining_days * $valuePerDay);
		} elseif ($numberOfDays > 1825 && $numberOfDays <= 2190) {

			//Add first year
			$first_year = ($property['co_appr_1'] * $property['price']) / 100;

			//Add second year
			$second_year = ($property['co_appr_2'] * $property['price']) / 100;

			//Add third year
			$third_year = ($property['co_appr_3'] * $property['price']) / 100;

			//Add fourth year
			$fourth_year = ($property['co_appr_4'] * $property['price']) / 100;

			//Add fifth year
			$fifth_year = ($property['co_appr_5'] * $property['price']) / 100;

			$remaining_days = $numberOfDays - 1825;

			$valuePerDay = (($property['co_appr_6'] * $property['price']) / 100) / 365;

			$rates = ($first_year + $second_year + $third_year + $fourth_year + $fifth_year) + ($remaining_days * $valuePerDay);
		}

		$rates = $rates * $noOfUnits;

		return round($rates, 2);
		//return number_format((float)$rates, 2, '.', '');

	}
}
