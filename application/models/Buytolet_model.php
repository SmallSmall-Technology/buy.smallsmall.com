<?php

class Buytolet_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
	}

	// Declare variables

	private $_limit;

	private $_pageNumber;

	private $_offset;

	// setter getter function

	public function setLimit($limit)
	{

		$this->_limit = $limit;
	}

	public function setPageNumber($pageNumber)
	{

		$this->_pageNumber = $pageNumber;
	}

	public function setOffset($offset)
	{

		$this->_offset = $offset;
	}

	public function getPropertyFilterCount($s_data)
	{

		$this->db->select('*');

		$this->db->from('buytolet_property');

		$this->db->where('active', 1);

		if ($s_data['apt_type']) {

			$this->db->like('apartment_type', $s_data['apt_type']);
		}

		if ($s_data['city']) {

			$this->db->like('city', $s_data['city']);
		}

		if ($s_data['beds']) {

			$this->db->where('bed', $s_data['beds']);
		}

		if ($s_data['bath']) {

			$this->db->where('bath', $s_data['bath']);
		}

		if ($s_data['tenancy']) {

			$this->db->like('tenantable', $s_data['tenancy']);
		}
		if ($s_data['price']) {

			$this->db->where('price >=', ($s_data['price'] - 50000000));
		}

		if ($s_data['price']) {

			$this->db->where('price <=', $s_data['price']);
		}

		return $this->db->count_all_results();
	}

	public function getAllPropCount($slug)
	{

		$this->db->from('buytolet_property as a');

		$this->db->join('buytolet_investment_type as b', 'b.id = a.investment_type', 'LEFT OUTER');

		if ($slug != '') {
			$this->db->where('b.slug', $slug);
		}

		$this->db->where('active', 1);

		return $this->db->count_all_results();
	}
	public function getAllSearchCount($search_crit = array())
	{

		$this->db->from('buytolet_property');

		$this->db->where('active', 1);

		if ($search_crit['investment-type'] != '') {

			$this->db->where('investment_type', $search_crit['investment-type']);
		}
		if ($search_crit['location'] != '') {

			$this->db->where('city', $search_crit['location']);
		}

		//$this->db->join('buytolet_investment_type as b', 'b.id = a.investment_type', 'LEFT OUTER');

		//if($slug != ''){
		// $this->db->where('b.slug', $slug);
		//}

		$this->db->where('active', 1);

		return $this->db->count_all_results();
	}
	public function getPoolAptCount()
	{

		$this->db->from('buytolet_property');

		$this->db->where('pool_buy', 'yes');

		$this->db->where('active', 1);

		return $this->db->count_all_results();
	}
	public function check_email($email)
	{

		$this->db->select('email, password, userID');

		$this->db->from('user_tbl');

		$this->db->where('email', $email);

		return $this->db->row_array();
	}

	public function update_login_attempt($user_id, $attempt)
	{
		$update = array('login_attempt' => $attempt);

		$this->db->select('email, password, userID, login_attempt');

		$this->db->from('user_tbl');

		$this->db->where('email', $email);

		return $this->db->row_array();
	}


	public function add_user($id, $fname, $lname, $email, $phone, $password, $medium, $age, $income, $occupation, $position, $address, $gender, $accredited_investor, $investment_experience, $investment_goal, $investment_capital, $financing_choice, $investment_period, $purchase_plan, $preferred_location_1, $preferred_location_2)
	{

		$this->userID = $id;

		$this->occupation = $occupation;

		$this->position = $position;

		$this->accredited_investor = $accredited_investor;

		$this->investment_experience = $investment_experience;

		$this->investment_goal = $investment_goal;

		$this->investment_capital = $investment_capital;

		$this->financing_choice = $financing_choice;

		$this->investment_period = $investment_period;

		$this->purchase_plan = $purchase_plan;

		$this->preferred_location_1 = $preferred_location_1;

		$this->preferred_location_2 = $preferred_location_2;

		return $this->db->insert('buytolet_users', $this);
	}
	public function register($id, $fname, $lname, $email, $password, $phone, $income, $confirmationCode, $referral, $user_type, $interest, $rc, $gender, $user_agent, $country)
	{

		$today = date('Y-m-d H:i:s');

		$user_insert = array("userID" => $id, "firstName" => $fname, "lastName" => $lname, "email" => $email, "password" => $password, "phone" => $phone, "income" => $income, "referral" => $referral, "gender" => $gender, "referral_code" => $rc, "user_type" => $user_type, "interest" => $interest, "verified" => 'no', "points" => 0, "status" => 'Active', "platform" => 'Web', "user_agent" => $user_agent, "regDate" => $today, "country" => $country);

		if ($this->db->insert('user_tbl', $user_insert)) {

			return $this->db->insert('login_tbl', array('email' => $email, 'password' => $password, 'userID' => $id, 'lastLogin' => $today, 'confirmation' => $confirmationCode));
		} else {

			return 0;
		}
	}

	public function create_user_account($id, $fname, $lname, $email, $password, $phone, $refCode, $confirmationCode)
	{

		$today = date('Y-m-d H:i:s');

		$user_insert = array("userID" => $id, "firstName" => $fname, "lastName" => $lname, "email" => $email, "password" => $password, "phone" => $phone, "income" => 0, "referral" => 'Buysmallsmall Gift', "user_type" => 'Landlord', "interest" => 'Buy', "verified" => 'no', "points" => 0, "status" => 'Active', "referred_by" => $refCode, "regDate" => $today);

		if ($this->db->insert('user_tbl', $user_insert)) {

			return $this->db->insert('login_tbl', array('email' => $email, 'password' => $password, 'userID' => $id, 'lastLogin' => $today, 'confirmation' => $confirmationCode));
		} else {

			return 0;
		}
	}
	public function login_user($username, $password)
	{

		$this->db->select('a.password, a.lastLogin, a.confirmation, b.*, b.user_type');

		$this->db->from('login_tbl as a');

		$this->db->where('a.email', $username);

		$this->db->where('a.password', $password);

		$this->db->where('b.status', 'Active');

		$this->db->join('user_tbl as b', 'b.userID = a.userID');

		$this->db->limit(1);

		$query = $this->db->get();

		return $query->row_array();
	}

	public function get_user_login($user_id)
	{

		$this->db->select('a.password, a.lastLogin, a.confirmation, b.*, b.user_type');

		$this->db->from('login_tbl as a');

		$this->db->where('a.userID', $user_id);

		$this->db->where('b.status', 'Active');

		$this->db->join('user_tbl as b', 'b.userID = a.userID');

		$query = $this->db->get();

		return $query->row_array();
	}

	public function update_password_to_hash($id, $password){

		$new_password = array("password" => $password);

		$this->db->where('userID', $id);

		if($this->db->update('user_tbl', $new_password)){

			if($this->db->update('login_tbl', $new_password)){
				
				return 1;

			}else{

				return 0;

			}

		}else{

			return 0;

		}

	}
	/*public function login_user($username, $password){

		$this->db->select('a.email, a.password, a.last_login, a.userID, a.confirmation_link, b.userID, b.status, b.firstname, b.lastname, b.phone');
		
		$this->db->from('buytolet_login as a');

		$this->db->where('a.email', $username);

		$this->db->where('a.password', $password);

		$this->db->join('buytolet_users as b', 'b.userID = a.userID');

		$query = $this->db->get();
		
		return $query->row_array();

	}*/

	public function getCities($id)
	{

		$this->db->select('id, name, state_id');

		$this->db->from('cities');

		$this->db->where('state_id', $id);

		$query = $this->db->get();

		return $query->result_array();
	}
	public function getApt()
	{

		$this->db->select('id, type');

		$this->db->from('apt_type_tbl');

		$query = $this->db->get();

		return $query->result_array();
	}

	public function getHomeProps($type, $limit)
	{

		$this->db->select('a.*, b.id, b.type, b.slug');

		$this->db->from('buytolet_property as a');

		$this->db->where('a.status', 'New');

		$this->db->where('a.active', 1);

		$this->db->where('a.investment_type', $type);

		//$this->db->where('a.featured', 1);

		$this->db->join('apt_type_tbl as b', 'b.id = a.apartment_type', 'LEFT');

		$this->db->limit($limit);

		$this->db->order_by('a.date_of_entry', 'RANDOM');

		$query = $this->db->get();

		return $query->result_array();
	}
	public function getHomePropsTest($type, $limit)
	{

		$this->db->select('a.*, b.id, b.type, b.slug');

		$this->db->from('buytolet_property as a');

		$this->db->where('a.status', 'New');

		$this->db->where('a.active', 1);

		$this->db->where('a.investment_type', $type);

		//$this->db->where('a.featured', 1);

		$this->db->join('apt_type_tbl as b', 'b.id = a.apartment_type', 'LEFT');

		$this->db->limit($limit);

		$this->db->order_by('a.date_of_entry', 'RANDOM');

		$query = $this->db->get();

		return $query->result_array();
	}

	public function getPoolHomeProps()
	{

		$this->db->select('a.*, b.id, b.type, b.slug');

		$this->db->from('buytolet_property as a');

		$this->db->where('a.status', 'New');

		$this->db->where('a.pool_buy', 'yes');

		$this->db->where('a.active', 1);

		//$this->db->where('a.availability !=', 'Sold');

		$this->db->join('apt_type_tbl as b', 'b.id = a.apartment_type', 'LEFT');

		$this->db->limit(4);

		$this->db->order_by('a.asset_appreciation_1', 'DESC');

		$query = $this->db->get();

		return $query->result_array();
	}

	public function getProperties($slug)
	{

		$this->db->select('a.*, b.id, b.type, b.slug, c.id, c.name as propState');

		$this->db->from('buytolet_property as a');

		$this->db->where('a.status', 'New');

		//$this->db->where('a.pool_buy', 'no');		

		$this->db->where('d.slug', $slug);

		$this->db->where('a.active', 1);

		$this->db->join('apt_type_tbl as b', 'b.id = a.apartment_type', 'LEFT OUTER');

		$this->db->join('states as c', 'c.id = a.state', 'LEFT');

		$this->db->join('buytolet_investment_type as d', 'd.id = a.investment_type', 'LEFT OUTER');

		$this->db->order_by("a.id", "DESC");

		$this->db->limit($this->_pageNumber, $this->_offset);

		$query = $this->db->get();

		return $query->result_array();
	}
	public function getSearchProperties($search_crit = array())
	{

		$this->db->select('a.*, b.id, b.type, b.slug, c.id, c.name as propState');

		$this->db->from('buytolet_property as a');

		//$this->db->where('a.status', 'New');

		//$this->db->where('a.active', 1);

		if ($search_crit['investment-type'] != '') {

			$this->db->where('a.investment_type', $search_crit['investment-type']);
		}
		if ($search_crit['location'] != '') {

			$this->db->where('a.city', $search_crit['location']);
		}

		$this->db->join('apt_type_tbl as b', 'b.id = a.apartment_type', 'LEFT OUTER');

		$this->db->join('states as c', 'c.id = a.state', 'LEFT');

		$this->db->join('buytolet_investment_type as d', 'd.id = a.investment_type', 'LEFT OUTER');

		$this->db->order_by("a.id", "DESC");

		$this->db->limit($this->_pageNumber, $this->_offset);

		$query = $this->db->get();

		return $query->result_array();
	}
	public function getPoolProps()
	{

		$this->db->select('a.*, b.id, b.type, b.slug, c.id, c.name as propState');

		$this->db->from('buytolet_property as a');

		$this->db->where('a.status', 'New');

		$this->db->where('a.pool_buy', 'yes');

		$this->db->where('a.active', 1);

		$this->db->join('apt_type_tbl as b', 'b.id = a.apartment_type', 'LEFT');

		$this->db->join('states as c', 'c.id = a.state', 'LEFT');

		$this->db->order_by("a.id", "DESC");

		$this->db->limit($this->_pageNumber, $this->_offset);

		$query = $this->db->get();

		return $query->result_array();
	}



	public function similarProperties($city)
	{

		$this->db->select('a.id, a.propertyID, a.property_name, a.price, a.promo_price, a.promo_category, a.address, a.city, a.state, a.bed, a.bath, a.toilet, a.apartment_type, a.tenantable, a.expected_rent, a.property_size, a.property_info, a.location_info, a.floor_plan, a.image_folder, a.featured_image, a.status, a.poster, a.mortgage, a.developer, a.pool_units, a.pool_buy, a.availability, a.active, a.asset_appreciation_1, a.asset_appreciation_2, a.asset_appreciation_3, a.asset_appreciation_4, a.asset_appreciation_5, a.construction_lvl, a.start_date, a.finish_date, b.id, b.type, b.slug, c.id, c.country_id, c.name as propState');

		$this->db->from('buytolet_property as a');

		$this->db->where('a.active', 1);

		$this->db->like('a.city', $city);

		$this->db->join('apt_type_tbl as b', 'b.id = a.apartment_type', 'LEFT');

		$this->db->join('states as c', 'c.id = a.state', 'LEFT');

		$this->db->order_by("a.id", "DESC");

		$this->db->limit(4);

		$query = $this->db->get();

		if ($query->num_rows() > 1) {

			return $query->result_array();
		} else {

			return 0;
		}
	}

	public function getProp($id)
	{

		$this->db->select('*');

		$this->db->from('buytolet_property');

		$this->db->where('propertyID', $id);

		$query = $this->db->get();

		return $query->row_array();
	}

	public function getProperty($id)
	{

		$this->db->select('a.*, b.id, b.type, b.slug, c.id, c.country_id, c.name as propState');

		$this->db->from('buytolet_property as a');

		$this->db->where('a.propertyID', $id);

		//$this->db->where('a.active', 1);	

		$this->db->join('apt_type_tbl as b', 'b.id = a.apartment_type', 'LEFT');

		$this->db->join('states as c', 'c.id = a.state', 'LEFT');

		$query = $this->db->get();

		return $query->row_array();
	}



	public function setInspection($inspDate, $inspTime, $inspPeriod, $propID, $userID)
	{

		$digits = 5;

		$randomNumber = '';

		$count = 0;

		while ($count < $digits) {

			$randomDigit = mt_rand(0, 9);

			$randomNumber .= $randomDigit;

			$count++;
		}

		$id = $randomNumber;

		$this->inspection_date = $inspDate;

		$this->inspection_time = $inspTime;

		$this->inspection_period = $inspPeriod;

		$this->propertyID = $propID;

		$this->userID = $userID;



		$this->inspectionID = $id;

		$this->status = 'New';

		$this->date_of_entry = date("Y-m-d H:i:s");

		if ($this->db->insert('buytolet_inspection', $this)) {

			return 1;
		} else {

			return 0;
		}
	}

	public function insertRequest($buyer_type, $payment_plan, $property_id, $cost, $userID, $payable, $balance, $mop, $payment_period, $unit_amount, $promo_code, $id_path, $statement_path, $employment_details, $personal_details)
	{

		$ref = md5(date('YmdHis'));

		$this->userID = $userID;

		$this->refID = $ref;

		$this->propertyID = $property_id;

		$this->plan = $payment_plan;

		$this->buyer_type = $buyer_type;

		$this->firstname = $personal_details[0]['firstname'];

		$this->lastname = $personal_details[0]['lastname'];

		$this->email = $personal_details[0]['email'];

		$this->phone = $personal_details[0]['phone'];

		$this->bvn = $personal_details[0]['bvn'];

		$this->marital_status = $personal_details[0]['marital_status'];

		$this->dateOfBirth = $personal_details[0]['dateOfBirth'];

		$this->personal_address = $personal_details[0]['residential_address'];

		$this->company = $employment_details[0]['companyName'];

		$this->occupation = $employment_details[0]['occupation'];

		$this->position = $employment_details[0]['position'];

		$this->income_range = $employment_details[0]['income_range'];

		$this->company_address = $employment_details[0]['company_address'];

		$this->amount = $cost;

		$this->payable = $payable;

		$this->finance_balance = $balance;

		$this->method = $mop;

		$this->unit_amount = $unit_amount;

		$this->status = 'new';

		$this->payment_period = $payment_period;

		$this->promo_code = $promo_code;

		$this->request_date = date('Y-m-d H:i:s');

		if ($this->db->insert("buytolet_request", $this)) {

			$statement_entry = array("userID" => $userID, "refID" => $ref, "statementPath" => $statement_path);

			if ($this->db->insert('buytolet_bank_statement', $statement_entry)) {

				$id_entry = array("userID" => $userID, "refID" => $ref, "idPath" => $id_path);

				if ($this->db->insert('buytolet_finance_id', $id_entry)) {

					return 1;
				} else {

					return 0;
				}
			} else {

				return 0;
			}
		} else {

			return 0;
		}
	}

	public function insertCoOwnRequest($ref, $buyer_type, $payment_plan, $property_id, $cost, $userID, $payable, $balance, $mop, $payment_period, $unit_amount, $promo_code, $promo_amount, $statement_path, $firstname, $lastname, $beneficiary_type, $share_condition = 0)
	{

		$this->userID = $userID;

		$this->refID = $ref;

		$this->propertyID = $property_id;

		$this->plan = $payment_plan;

		$this->buyer_type = $buyer_type;

		$this->firstname = $firstname;

		$this->lastname = $lastname;

		$this->amount = $cost;

		$this->payable = $payable;

		$this->finance_balance = $balance;

		$this->method = $mop;

		$this->unit_amount = $unit_amount;

		$this->status = 'owned';

		$this->payment_period = $payment_period;

		$this->promo_code = $promo_code;

		$this->promo_amount = $promo_amount;

		$this->purchase_beneficiary = $beneficiary_type;

		$this->share_condition = $share_condition;

		$this->request_date = date('Y-m-d H:i:s');

		if ($this->db->insert("buytolet_request", $this)) {

			return $ref;
		} else {

			return 0;
		}
	}

	public function updateCoOwnRequest($refID, $cost, $userID, $unit_amount, $promo_code, $promo_amount)
	{

		$this->amount = $cost;

		$this->unit_amount = $unit_amount;

		$this->promo_code = $promo_code;

		$this->promo_amount = $promo_amount;

		$this->db->where('refID', $refID);

		return $this->db->update("buytolet_request", $this);
	}

	public function insert_user_info($user_id, $company_name, $position, $occupation, $income_range, $company_address, $id_path)
	{

		$user_details = array("userID" => $user_id, "occupation" => $occupation, "position" => $position, "company_name" => $company_name, "income_range" => $income_range, "company_address" => $company_address, "identification" => $id_path, "updated" => date('Y-m-d H:i:s'));

		return $this->db->insert('buytolet_users', $user_details);
	}

	public function get_about()
	{

		$this->db->select("*");
		$this->db->from('buytolet_about_us');
		$query = $this->db->get();
		return $query->row_array();
	}
	public function get_hiw()
	{

		$this->db->select("*");
		$this->db->from('buytolet_hiw');
		$query = $this->db->get();
		return $query->row_array();
	}
	public function filter($s_data)
	{


		$this->db->select('a.propertyID, a.property_name, a.price, a.promo_price, a.promo_category, a.address, a.city, a.state, a.bed, a.bath, a.toilet, a.apartment_type, a.tenantable, a.expected_rent, a.property_size, a.property_info, a.location_info, a.floor_plan, a.image_folder, a.featured_image, a.status, a.poster, a.mortgage, a.developer, a.pool_units, a.availability, a.pool_buy, a.asset_appreciation_1, a.asset_appreciation_2, a.asset_appreciation_3, a.asset_appreciation_4, a.asset_appreciation_5, a.construction_lvl, a.start_date, a.finish_date, b.id, b.type, b.slug, c.id, c.name as propState');

		$this->db->from('buytolet_property as a');

		$this->db->where('a.active', 1);

		if ($s_data['apt_type']) {

			$this->db->where('a.apartment_type', $s_data['apt_type']);
		}

		if ($s_data['city']) {

			$this->db->like('a.city', $s_data['city']);
		}

		if ($s_data['beds']) {

			$this->db->where('a.bed', $s_data['beds']);
		}

		if ($s_data['bath']) {

			$this->db->where('a.bath', $s_data['bath']);
		}

		if ($s_data['tenancy']) {

			$this->db->like('a.tenantable', $s_data['tenancy']);
		}

		/*if($s_data['price']){

			$this->db->where('price >=', ($s_data['price'] - 50000000));

		}*/

		if ($s_data['price']) {

			$this->db->where('a.price <=', $s_data['price']);
		}



		/*if($s_data['price']){

			$this->db->where('price <=', intval($s_data['price']));

		}*/
		$this->db->join('apt_type_tbl as b', 'b.id = a.apartment_type', 'LEFT');

		$this->db->join('states as c', 'c.id = a.state', 'LEFT');

		$this->db->limit($this->_pageNumber, $this->_offset);

		$query = $this->db->get();

		return $query->result_array();
	}

	public function verify_account($code)
	{

		$updates = array("confirmation" => NULL);

		$this->db->where("confirmation", $code);

		return $this->db->update("login_tbl", $updates);
	}
	public function updateViews($views, $id)
	{
		$data = array('views' => $views);

		$this->db->where('propertyID', $id);

		if ($this->db->update('buytolet_property', $data)) {

			return 1;
		} else {

			return 0;
		}
	}
	public function update_units($units, $id)
	{

		$data = array('available_units' => $units);

		$this->db->where('propertyID', $id);

		if ($this->db->update('buytolet_property', $data)) {

			return 1;
		} else {

			return 0;
		}
	}

	public function check_returning($ip_add)
	{

		$this->db->select('*');

		$this->db->from('btl_stats');

		$this->db->where("ip_address", $ip_add);

		$query = $this->db->get();

		if ($query->num_rows() > 0) {

			return 1;
		} else {

			return 0;
		}
	}

	public function addVisits($ip_add, $country, $city, $browser_name, $visit, $device, $referrer)
	{

		$this->ip_address = $ip_add;

		$this->country = $country;

		$this->city = $city;

		$this->browser_type = $browser_name;

		$this->device_type = $device;

		$this->visits = $visit;

		$this->referrer_website = $referrer;

		$this->visit_time = date("Y-m-d H:i:s");

		$this->date_of_entry = date("Y-m-d H:i:s");

		if ($this->db->insert('btl_stats', $this)) {
			return 1;
		} else {
			return 0;
		}
	}

	public function updateVisits($visits, $ip)
	{

		$updates = array('visits' => $visits);

		$this->db->where("ip_address", $ip);

		$this->db->update('btl_stats', $updates);
	}

	public function get_faqs()
	{

		$this->db->select('*');

		$this->db->from('buytolet_faq');

		$query = $this->db->get();

		return $query->result_array();
	}

	public function insertResetDetails($userID, $reset_code)
	{

		$this->userID = $userID;

		$this->reset_code = $reset_code;

		$this->request_date = date('Y-m-d H:i:s');

		$this->expiry_date = date('Y-m-d H:i:s', strtotime("+2 days"));

		return $this->db->insert('pwd_reset', $this);
	}

	public function getUser($username)
	{

		$this->db->select('*');

		$this->db->from('user_tbl');

		$this->db->where('email', $username);

		$query = $this->db->get();

		return $query->row_array();
	}

	public function getUserByID($email)
	{

		$this->db->select('a.*, a.userID as user_id, a.email as user_email, b.*');

		$this->db->from('user_tbl as a');

		$this->db->where('a.email', $email);

		$this->db->join('login_tbl as b', 'b.userID = a.userID');

		$query = $this->db->get();

		return $query->row_array();
	}

	public function reset_password($user_id, $reset_code)
	{

		$today = date("Y-m-d H:i:s");

		$this->db->select('reset_code, userID, request_date, expiry_date');

		$this->db->from('pwd_reset');

		$this->db->where('reset_code', $reset_code);

		$this->db->where('userID', $user_id);

		$this->db->where('expiry_date >=', $today);

		$this->db->order_by("id", "DESC");

		$this->db->limit(1);

		$query = $this->db->get();

		return $query->row_array();
	}

	public function changePass($userID, $password)
	{

		$update = array("password" => $password);

		$this->db->where("userID", $userID);

		if ($this->db->update('user_tbl', $update)) {

			$new_update = array("password", $password);

			$this->db->where("userID", $userID);

			return $this->db->update('login_tbl', $update);
		} else {

			return 0;
		}
	}

	public function confirm_code($code)
	{

		$today = date('Y-m-d');

		$this->db->select('*');

		$this->db->from('promo_code');

		$this->db->where('promo_code', $code);

		$this->db->where('start_date <=', $today);

		$this->db->where('end_date >=', $today);

		$query = $this->db->get();

		if ($query->num_rows() > 0) {

			return $query->row_array();
		} else {

			return 0;
		}
	}
	public function get_states()
	{
		$this->db->select('a.state, b.*');

		$this->db->from('buytolet_property as a');

		$this->db->join('states as b', 'b.id = a.state');

		$this->db->group_by('a.state');

		$this->db->order_by('a.state', 'ASC');

		$query = $this->db->get();

		return $query->result_array();
	}

	public function get_locations($ids)
	{

		$this->db->select('a.city, b.name, b.id, b.state_id');

		$this->db->from('buytolet_property as a');

		$this->db->where_in('b.state_id', $ids);

		$this->db->join('cities as b', 'b.name = a.city');

		$this->db->group_by('a.city');

		$this->db->order_by('b.name', 'ASC');

		$query = $this->db->get();

		return $query->result_array();
	}
	public function insertPayment($propertyID, $userID, $payable, $mop, $ref_id)
	{

		//Insert transaction
		$trans_dets = array("propertyID" => $propertyID, "userID" => $userID, "transaction_id" => $ref_id, "amount" => $payable, "payment_type" => $mop, "status" => "Completed", "transactionDate" => date('Y-m-d H:i:s'));

		if ($this->db->insert("buytolet_transactions", $trans_dets)) {

			$today = date('Y-m-d H:i:s');

			$targetOptions = array('active' => 1, 'updated_at' => $today);

			$this->db->where('userID', $userID);

			$this->db->update('target_options', $targetOptions);

			return 1;
		} else {

			return 0;
		}
	}

	public function insert_beneficiary_details($userID, $request_id, $beneficiary_firstname, $beneficiary_lastname, $beneficiary_email, $beneficiary_phone, $beneficiary_shares, $beneficiary_id_path, $user_id, $type = 'Gift')
	{

		$insert_dets = array("firstname" => $beneficiary_firstname, "lastname" => $beneficiary_lastname, "email" => $beneficiary_email, "phone" => $beneficiary_phone, "requestID" => $request_id, "userID" => $userID, "id_path" => $beneficiary_id_path, "no_of_units" => $beneficiary_shares, "status" => 'new', "receiverID" => $user_id, "type" => $type);

		return $this->db->insert('buytolet_beneficiary_details', $insert_dets);
	}

	public function getRequest($refID)
	{

		$this->db->select('*');

		$this->db->from('buytolet_request');

		$this->db->where('refID', $refID);

		$query = $this->db->get();

		return $query->row_array();
	}
	public function getRequestInfo($refID)
	{

		$this->db->select('a.*, a.lastname as sender_name b.*, c.*');

		$this->db->from('buytolet_request as a');

		$this->db->where('a.refID', $refID);

		$this->db->join('user_tbl as b', 'b.userID = a.userID', 'LEFT OUTER');

		$this->db->join('buytolet_property as c', 'c.propertyID = a.propertyID', 'LEFT OUTER');

		$this->db->join('buytolet_beneficiary_details as d', 'd.requestID = a.refID', 'LEFT OUTER');

		$query = $this->db->get();

		return $query->row_array();
	}

	public function getBeneficiaries($refID)
	{

		$this->db->select('*');

		$this->db->from('buytolet_beneficiary_details');

		$this->db->where('requestID', $refID);

		$query = $this->db->get();

		return $query->result_array();
	}

	public function getPropWithRef($ref)
	{

		$this->db->select('propertyID, plan');

		$this->db->from('buytolet_request');

		$this->db->where('refID', $ref);

		$query = $this->db->get();

		return $query->row_array();
	}

	public function get_user($id)
	{

		$this->db->select('*');

		$this->db->from('user_tbl');

		$this->db->where('userID', $id);

		$query = $this->db->get();

		return $query->row_array();
	}
	public function get_user_by_email($email)
	{

		$this->db->select('*');

		$this->db->from('user_tbl');

		$this->db->where('email', $email);

		$query = $this->db->get();

		return $query->row_array();
	}

	public function check_beneficiary_details($email)
	{

		$this->db->select('*');

		$this->db->from('buytolet_beneficiary_details');

		$this->db->where('email', $email);

		$query = $this->db->get();

		return $query->row_array();
	}


	public function get_user_pic($id)
	{

		$this->db->select('profile_picture');

		$this->db->from('user_tbl');

		$this->db->where('userID', $id);

		$query = $this->db->get();

		return $query->row_array();
	}

	public function get_wallet_balance($id)
	{

		$this->db->select_sum('account_balance');

		$this->db->from('virtual_account');

		$this->db->where('userID', $id);

		$result = $this->db->get();

		return $result->row_array();
	}

	public function get_ref_code($id)
	{

		$this->db->select('referral_code');

		$this->db->from('user_tbl');

		$this->db->where('userID', $id);

		$query = $this->db->get();

		return $query->row_array();
	}

	public function count_user_requests($id)
	{

		$this->db->from('buytolet_request');

		$this->db->where("userID", $id);

		return $this->db->count_all_results();
	}
	public function co_own_units($id)
	{

		$this->db->select_sum('unit_amount');

		$this->db->from('buytolet_request');

		$this->db->where("userID", $id);

		//$this->db->where("unit_amount !=", NULL);

		$query = $this->db->get();

		return $query->row_array();
	}
	public function count_bss_inspections($id)
	{

		$this->db->from('buytolet_inspection');

		$this->db->where("userID", $id);

		return $this->db->count_all_results();
	}
	public function fetch_requests($id, $limit, $start)
	{

		$this->db->select('a.*, b.*');

		$this->db->from('buytolet_request as a');

		$this->db->where('a.userID', $id);

		$this->db->join('buytolet_property as b', 'b.propertyID = a.propertyID');

		$this->db->order_by('a.id', 'DESC');

		$this->db->limit($limit, $start);

		$query = $this->db->get();

		return $query;
	}

	public function get_unit_details($id)
	{

		$this->db->select('a.*, b.*');

		$this->db->from('buytolet_request as a');

		$this->db->where('a.propertyID', $id);

		$this->db->join('buytolet_property as b', 'b.propertyID = a.propertyID');

		$query = $this->db->get();

		return $query->row_array();
	}
	public function get_finance_details($id)
	{

		$this->db->select('a.*, b.property_name, b.city, b.price, c.*');

		$this->db->from('buytolet_request as a');

		$this->db->where('a.propertyID', $id);

		$this->db->join('buytolet_property as b', 'b.propertyID = a.propertyID', 'LEFT OUTER');

		$this->db->join('states as c', 'c.id = b.state', 'LEFT OUTER');

		$query = $this->db->get();

		return $query->row_array();
	}

	public function get_payment_details($id, $prop)
	{

		$this->db->select('*');

		$this->db->from('buytolet_transactions');

		$this->db->where('transaction_id', $id);

		$this->db->where('propertyID', $prop);

		$query = $this->db->get();

		return $query->result_array();
	}
	public function fetch_payments($id, $limit, $start, $refID, $propertyID)
	{

		$this->db->select('a.*, a.status as payment_status, b.*');

		$this->db->from('buytolet_transactions as a');

		$this->db->where('a.userID', $id);

		$this->db->where('a.transaction_id', $refID);

		$this->db->where('a.propertyID', $propertyID);

		$this->db->join('buytolet_property as b', 'b.propertyID = a.propertyID', 'LEFT OUTER');

		$this->db->order_by('a.id', 'DESC');

		$this->db->limit($limit, $start);

		$query = $this->db->get();

		return $query;
	}

	public function get_total_portfolios($userID)
	{

		$options = array('Champions', 'Spouse', 'Wife', 'Child', 'Children');

		$this->db->select('a.refID');

		$this->db->from('buytolet_request as a');

		$this->db->where('a.plan', 'co-own');

		$this->db->group_start();

		$this->db->where('a.purchase_beneficiary', 'Self');

		$this->db->where('a.userID', $userID);

		$this->db->or_group_start();

		$this->db->where('c.receiverID', $userID);

		$this->db->group_end();

		$this->db->group_end();

		$this->db->join('buytolet_transactions as b', 'b.transaction_id = a.refID', 'LEFT OUTER');

		$this->db->join('buytolet_beneficiary_details as c', 'c.requestID = a.refID', 'LEFT OUTER');

		$this->db->group_by('a.propertyID');

		$data = $this->db->count_all_results();

		return $data;
	}

	public function get_total_coown_shares($userID)
	{

		//$options = array('Champions', 'Spouse', 'Wife', 'Child', 'Children');

		$this->db->select_sum('a.unit_amount');

		$this->db->select_sum('c.no_of_units');

		$this->db->from('buytolet_request as a');

		$this->db->where('a.plan', 'co-own');

		$this->db->group_start();

		$this->db->where('a.purchase_beneficiary', 'Self');

		$this->db->where('a.userID', $userID);

		$this->db->or_group_start();

		$this->db->where('c.receiverID', $userID);

		$this->db->group_end();

		$this->db->group_end();

		$this->db->join('buytolet_transactions as b', 'b.transaction_id = a.refID', 'LEFT OUTER');

		$this->db->join('buytolet_beneficiary_details as c', 'c.requestID = a.refID', 'LEFT OUTER');

		$query = $this->db->get();

		return $query->row_array();
	}

	public function getUserProperties($userID, $plan)
	{

		$this->db->select('a.*, a.id as requestID, b.*, c.*');

		$this->db->from('buytolet_request as a');

		$this->db->where('a.userID', $userID);

		$this->db->where('b.investment_type', $plan);

		$this->db->join('buytolet_property as b', 'b.propertyID = a.propertyID');

		$this->db->join('buytolet_transactions as c', 'c.transaction_id = a.refID', 'INNER');

		$this->db->order_by('a.id', 'DESC');

		$query = $this->db->get();

		return $query->result_array();
	}

	public function getGiftBasketTotal($id)
	{

		$this->db->select_sum('shares');

		$this->db->from('gift_basket');

		$this->db->where('user_id', $id);

		$query = $this->db->get();

		return $query->row_array();
	}

	public function getUserSharesTotal($userID)
	{

		$this->db->select_sum('unit_amount');

		$this->db->from('buytolet_request');

		$this->db->where('userID', $userID);

		$this->db->where('plan', 'co-own');

		$query = $this->db->get();

		return $query->row_array();
	}

	public function getSumOfMarketValue($id)
	{

		$this->db->select_sum('marketValue');

		$this->db->from('buytolet_property');

		$this->db->where('propertyID', $id);

		$query = $this->db->get();

		return $query->row_array();
	}

	public function get_wallet_details($id)
	{

		$this->db->select('*');

		$this->db->from('virtual_account');

		$this->db->where('userID', $id);

		$result = $this->db->get();

		return $result->row_array();
	}

	public function get_owned_property($userID)
	{

		$this->db->select('a.*, b.*, c.*');

		$this->db->select_sum('a.amount');

		$this->db->from('buytolet_request as a');

		$this->db->where('a.userID', $userID);

		$this->db->where('b.status', 'Completed');

		//$this->db->where_not('a.plan', 'co-ownership');

		$this->db->join('buytolet_transactions as b', 'b.transaction_id = a.refID', 'INNER');

		$this->db->join('buytolet_property as c', 'b.propertyID = c.propertyID', 'RIGHT OUTER');

		$query = $this->db->get();

		return $query->result_array();
	}

	public function get_co_own_property($id)
	{

		$this->db->select('a.*, a.status as request_status, a.id as reqID, a.propertyID as propID, b.*, c.*, c.amount as transaction_amount, d.*');

		$this->db->from('buytolet_request as a');

		$this->db->where('a.id', $id);

		$this->db->where('a.plan', 'co-own');

		$this->db->join('buytolet_property as b', 'b.propertyID = a.propertyID', 'LEFT OUTER');

		$this->db->join('buytolet_transactions as c', 'c.transaction_id = a.refID', 'LEFT OUTER');

		$this->db->join('states as d', 'd.id = b.state', 'LEFT OUTER');

		$query = $this->db->get();

		return $query->row_array();
	}
	public function get_bnpl_property($id)
	{

		$this->db->select('a.*, a.status as request_status, a.id as reqID, a.propertyID as propID, b.*, c.*, c.amount as transaction_amount, d.*');

		$this->db->from('buytolet_request as a');

		$this->db->where('a.id', $id);

		$this->db->where('a.plan', 'bnpl');

		$this->db->join('buytolet_property as b', 'b.propertyID = a.propertyID', 'LEFT OUTER');

		$this->db->join('buytolet_transactions as c', 'c.transaction_id = a.refID', 'LEFT OUTER');

		$this->db->join('states as d', 'd.id = b.state', 'LEFT OUTER');

		$query = $this->db->get();

		return $query->row_array();
	}

	public function get_finance_property()
	{

		$this->db->select('a.*, a.status as request_status, b.*, c.*, d.*');

		$this->db->from('buytolet_request as a');

		$this->db->where('a.plan', 'finance');

		$this->db->join('buytolet_property as b', 'b.propertyID = a.propertyID', 'LEFT OUTER');

		$this->db->join('buytolet_transactions as c', 'c.transaction_id = a.refID', 'LEFT OUTER');

		$this->db->join('states as d', 'd.id = b.state', 'LEFT OUTER');

		$this->db->order_by('a.id', 'DESC');

		$this->db->limit(1);

		$query = $this->db->get();

		return $query->row_array();
	}

	public function get_all_co_own_properties($userID)
	{
		$options = array('Self', 'Free');

		$this->db->select('a.*, a.id as reqID, b.*, c.*, d.*, e.*');

		//$this->db->select_sum('a.unit_amount');

		//$this->db->select_sum('e.no_of_units');

		$this->db->from('buytolet_request as a');

		$this->db->where('a.plan', 'co-own');

		$this->db->where_in('a.purchase_beneficiary', $options);

		$this->db->group_start();

		$this->db->where('a.userID', $userID);

		$this->db->or_where('e.receiverID', $userID);

		$this->db->group_end();

		$this->db->join('buytolet_beneficiary_details as e', 'e.requestID = a.refID', 'LEFT OUTER');

		$this->db->join('buytolet_property as b', 'b.propertyID = a.propertyID');

		$this->db->join('buytolet_transactions as c', 'c.transaction_id = a.refID', 'INNER');

		$this->db->join('states as d', 'd.id = b.state');

		//$this->db->group_by('a.propertyID');

		$query = $this->db->get();

		return $query->result_array();
	}

	public function get_all_bnpl_properties($userID)
	{

		$this->db->select('a.*, a.id as reqID, b.*, c.*, d.*');

		$this->db->from('buytolet_request as a');

		$this->db->where('a.plan', 'bnpl');

		$this->db->where('a.userID', $userID);

		$this->db->join('buytolet_property as b', 'b.propertyID = a.propertyID');

		$this->db->join('buytolet_transactions as c', 'c.transaction_id = a.refID', 'LEFT OUTER');

		$this->db->join('states as d', 'd.id = b.state');

		$query = $this->db->get();

		return $query->result_array();
	}

	public function get_champions_offer($userID)
	{

		$this->db->select('a.*, a.id as reqID, b.*, c.*, d.*');

		$this->db->from('buytolet_request as a');

		$this->db->where('a.plan', 'co-own');

		$this->db->where('a.userID', $userID);

		$this->db->where('a.purchase_beneficiary', 'Champions');

		$this->db->join('buytolet_property as b', 'b.propertyID = a.propertyID');

		$this->db->join('buytolet_transactions as c', 'c.transaction_id = a.refID', 'INNER');

		$this->db->join('states as d', 'd.id = b.state');

		$query = $this->db->get();

		return $query->result_array();
	}

	public function get_champions_property($requestID)
	{

		$this->db->select('a.*, b.*, b.status as condition_status');

		$this->db->from('buytolet_request as a');

		$this->db->join('gift_basket as b', 'b.request_id = a.refID', 'LEFT OUTER');

		$this->db->where('a.plan', 'co-own');

		$this->db->where('a.refID', $requestID);

		$this->db->where('a.purchase_beneficiary', 'Champions');

		$query = $this->db->get();

		return $query->row_array();
	}

	public function get_all_co_own_history($userID)
	{

		$this->db->select('a.*, a.id as reqID, b.*, c.*, d.*, e.*');

		$this->db->from('buytolet_request as a');

		$this->db->where('a.plan', 'co-own');

		$this->db->group_start();

		$this->db->where('a.userID', $userID);

		$this->db->or_where('e.receiverID', $userID);

		$this->db->group_end();

		$this->db->join('buytolet_beneficiary_details as e', 'e.requestID = a.refID', 'LEFT OUTER');

		$this->db->join('buytolet_property as b', 'b.propertyID = a.propertyID');

		$this->db->join('buytolet_transactions as c', 'c.transaction_id = a.refID', 'INNER');

		$this->db->join('states as d', 'd.id = b.state');

		$query = $this->db->get();

		return $query->result_array();
	}

	public function get_all_co_own_champions_properties($userID)
	{

		$this->db->select('a.*, a.id as reqID, b.*, c.*, d.*');

		$this->db->from('buytolet_request as a');

		$this->db->where('a.plan', 'co-own');

		$this->db->where('a.userID', $userID);

		$this->db->where('a.purchase_beneficiary', 'Champions');

		$this->db->join('buytolet_property as b', 'b.propertyID = a.propertyID');

		$this->db->join('buytolet_transactions as c', 'c.transaction_id = a.refID', 'INNER');

		$this->db->join('states as d', 'd.id = b.state');

		$query = $this->db->get();

		return $query->result_array();
	}

	public function get_all_finance_properties($userID)
	{

		$this->db->select('a.*, a.status as request_status, b.*, c.*, d.*, e.*');

		$this->db->from('buytolet_request as a');

		$this->db->where('a.plan', 'finance');

		$this->db->where('a.userID', $userID);

		$this->db->or_where('e.receiverID', $userID);

		$this->db->join('buytolet_beneficiary_details as e', 'e.requestID = a.refID', 'LEFT OUTER');

		$this->db->join('buytolet_property as b', 'b.propertyID = a.propertyID');

		$this->db->join('buytolet_transactions as c', 'c.transaction_id = a.refID', 'INNER');

		$this->db->join('states as d', 'd.id = b.state');

		$query = $this->db->get();

		return $query->result_array();
	}

	public function get_all_transactions($userID)
	{

		$this->db->select('a.*, a.amount as transaction_amount, b.*');

		$this->db->from('buytolet_transactions as a');

		$this->db->where('a.userID', $userID);

		$this->db->join('buytolet_request as b', 'b.refID = a.transaction_id');

		$query = $this->db->get();

		return $query->result_array();
	}

	public function getAllUsersGifts($userID)
	{

		$this->db->select('*');

		$this->db->from('buytolet_beneficiary_details');

		$this->db->where('userID', $userID);

		$this->db->order_by('id', 'DESC');

		$query = $this->db->get();

		return $query->result_array();
	}

	public function gift_basket_deposit($gifted, $request_id, $user_id, $property_id)
	{

		$this->user_id = $user_id;

		$this->request_id = $request_id;

		$this->shares = $gifted;

		$this->property_id = $property_id;

		$this->status = 'Unlocked';

		$this->type = 'Regular';

		$this->request_date = date('Y-m-d H:i:s');

		return $this->db->insert('gift_basket', $this);
	}

	public function update_request($id, $remaining_shares)
	{

		$this->db->where('refID', $id);

		return $this->db->update('buytolet_request', array('unit_amount' => $remaining_shares));
	}

	public function updateSharesCertificateFieldB($filename, $certificate_image, $requestID, $userID)
	{

		$this->db->where('requestID', $requestID);

		$this->db->where('receiverID', $userID);

		return $this->db->update('buytolet_beneficiary_details', array('beneficiary_shares_certificate ' => $filename, 'certificate_image' => $certificate_image));
	}
	public function updateSharesCertificateFieldO($filename, $certificate_image, $requestID, $userID)
	{

		$this->db->where('refID', $requestID);

		$this->db->where('userID', $userID);

		return $this->db->update('buytolet_request', array('shares_certificate' => $filename, 'certificate_image' => $certificate_image));
	}

	public function getGiftbags($userID)
	{

		$this->db->select('a.property_id, a.request_id, b.*');

		$this->db->select_sum('a.shares');

		$this->db->from('gift_basket as a');

		$this->db->where('a.user_id', $userID);

		$this->db->join('buytolet_property as b', 'b.propertyID = a.property_id');

		//$this->db->group_by('property_name');

		$this->db->group_by('request_id');

		$query = $this->db->get();

		return $query->result_array();
	}

	public function getChampionsGiftbags($userID, $requestID = '')
	{

		$this->db->select('a.property_id, a.request_id, b.*');

		$this->db->select_sum('a.shares');

		$this->db->from('gift_basket as a');

		$this->db->where('a.user_id', $userID);

		if ($requestID != '') {

			$this->db->where('a.request_id', $requestID);
		}

		$this->db->where('a.type', 'Champions');

		$this->db->join('buytolet_property as b', 'b.propertyID = a.property_id', 'LEFT OUTER');

		$this->db->group_by('a.request_id');

		$query = $this->db->get();

		return $query->result_array();
	}

	public function get_gifts($userID)
	{

		$this->db->select('*');

		$this->db->from('buytolet_request');

		$this->db->where('userID', $userID);

		$query = $this->db->get();

		return $query->result_array();
	}

	public function getSentGifts($userID, $requestID = '')
	{

		$this->db->select_sum('shares_spent');

		$this->db->from('spent_gift_basket');

		$this->db->where('user_id', $userID);

		$query = $this->db->get();

		return $query->row_array();
	}

	public function getAddedGifts($userID, $requestID = '')
	{

		$this->db->select_sum('shares');

		$this->db->from('gift_basket');

		$this->db->where('user_id', $userID);

		$query = $this->db->get();

		return $query->row_array();
	}

	public function getSentChampionsGifts($userID, $requestID = '')
	{

		$this->db->select_sum('shares_spent');

		$this->db->from('spent_gift_basket');

		$this->db->where('user_id', $userID);

		if ($requestID != '') {

			$this->db->where('request_id', $requestID);
		}

		$this->db->where('type', 'Champions');

		$query = $this->db->get();

		return $query->row_array();
	}

	public function getAddedChampionsGifts($userID, $requestID = '')
	{

		$this->db->select_sum('shares');

		$this->db->from('gift_basket');

		$this->db->where('user_id', $userID);

		if ($requestID != '') {

			$this->db->where('request_id', $requestID);
		}

		$this->db->where('type', 'Champions');

		$query = $this->db->get();

		return $query->row_array();
	}

	public function getSpentGiftsByRequestID($requestID)
	{

		$this->db->select_sum('shares_spent');

		$this->db->from('spent_gift_basket');

		$this->db->where('request_id', $requestID);

		$query = $this->db->get();

		return $query->row_array();
	}

	public function getAddedGiftsByRequestID($requestID)
	{

		$this->db->select_sum('shares');

		$this->db->from('gift_basket');

		$this->db->where('request_id', $requestID);

		$query = $this->db->get();

		return $query->row_array();
	}

	public function insertSpentShares($userID, $noOfShares, $requestID, $receiver_id, $propertyID)
	{

		$inserts = array("user_id" => $userID, "shares_spent" => $noOfShares, "property_id" => $propertyID, "request_id" => $requestID, "gifted" => $receiver_id, "date_created" => date('Y-m-d H:i:s'));

		return $this->db->insert('spent_gift_basket', $inserts);
	}

	public function updateSpentShares($noOfShares, $requestID)
	{

		$update = array("unit_amount_spent" => $noOfShares);

		$this->db->where("refID", $requestID);

		return $this->db->update('buytolet_request', $update);
	}

	public function check_request_shares_condition($id)
	{

		$this->db->select('share_condition');

		$this->db->from('buytolet_request');

		$this->db->where('refID', $id);

		$query = $this->db->get();

		return $query->row_array();
	}

	public function getLockedGifts($id)
	{

		$this->db->from('buytolet_request');

		$this->db->where('userID', $id);

		$this->db->where('share_condition', 1);

		return $this->db->count_all_results();
	}

	public function getAllUserCoOwnProperties($user_id, $rID = 0)
	{

		$options = array('Self', 'Free');

		$this->db->select('a.purchase_beneficiary, a.propertyID, a.request_date, a.unit_amount, b.price, c.amount, e.no_of_units');

		$this->db->from('buytolet_request as a');

		if ($rID) {

			$this->db->where('a.id', $rID);
		}

		$this->db->where('a.plan', 'co-own');

		$this->db->group_start();

		$this->db->or_where('e.receiverID', $user_id);

		$this->db->or_group_start();

		$this->db->where('a.userID', $user_id);

		$this->db->where_in('a.purchase_beneficiary', $options);

		$this->db->group_end();

		$this->db->group_end();

		$this->db->join('buytolet_beneficiary_details as e', 'e.requestID = a.refID', 'LEFT OUTER');

		$this->db->join('buytolet_property as b', 'b.propertyID = a.propertyID');

		$this->db->join('buytolet_transactions as c', 'c.transaction_id = a.refID', 'INNER');

		$this->db->join('states as d', 'd.id = b.state');

		$query = $this->db->get();

		return $query->result_array();
	}

	public function getRecentOffer($id)
	{

		$this->db->select('*');

		$this->db->select_sum('unit_amount');

		$this->db->from('buytolet_request');

		$this->db->where('userID', $id);

		$this->db->where('status', 'new');

		$this->db->where('plan', 'co-own');

		$this->db->where('purchase_beneficiary', 'Champions');

		$this->db->order_by('id', 'DESC');

		$this->db->limit(1);

		$query = $this->db->get();

		return $query->row_array();
	}

	public function getRecentGiftOffer($id)
	{

		$this->db->select('*');

		//$this->db->from('buytolet_beneficiary_details');
		$this->db->from('buytolet_request');

		$this->db->where('userID', $id);

		$this->db->where('status', 'new');

		$this->db->where('plan', 'co-own');

		$this->db->where('purchase_beneficiary', 'Free');

		$this->db->order_by('id', 'DESC');

		$this->db->limit(1);

		$query = $this->db->get();

		return $query->row_array();
	}

	public function changeGiftStatus($request_id, $id, $request)
	{

		$update = array("status" => $request, "share_condition" => 0);

		$this->db->where('id', $id);

		$this->db->where('refID', $request_id);

		return $this->db->update('buytolet_request', $update);
	}

	public function changeRequestStatus($id)
	{

		$update = array("status" => 'owned');

		$this->db->where('id', $id);

		return $this->db->update('buytolet_request', $update);
	}

	// Get Daily Notification Count

	public function getDailyNotificationsCount($userID)
	{

		// $this->db->select('*');

		$this->db->from('buytolet_notification_tbl');

		$this->db->where('userID', $userID);

		$this->db->where('status', 0);
		// add condition to filter by status

		$query = $this->db->count_all_results();

		$notificationCount = $query;

		if ($notificationCount > 0) {

			return $notificationCount;
		} else {

			return 0;
		}
	}

	// To get data from the notification table
	public function notification($userID)
	{

		$this->db->select('*');

		$this->db->from('buytolet_notification_tbl');

		$this->db->where('userID', $userID);

		$this->db->order_by('entry_date', 'desc');

		$this->db->limit(8);

		$query = $this->db->get();

		return $query->result_array();
	}

	// Mark Notification Message As Read and Set Status to 1
	public function markNotificationAsRead($notificationID)
	{
		$this->db->set('status', 1); // set the status as read

		$this->db->where('id', $notificationID);

		$this->db->update('buytolet_notification_tbl');
	}


	// To save data message to notification table
	public function insertNotification($inspDate, $inspTime, $inspPeriod, $propID, $subject, $message, $userID, $fname)
	{

		$digits = 5;

		$randomNumber = '';

		$count = 0;

		while ($count < $digits) {

			$randomDigit = mt_rand(0, 9);

			$randomNumber .= $randomDigit;

			$count++;
		}

		$id = $randomNumber;

		$this->inspection_date = $inspDate;

		$this->inspection_time = $inspTime;

		$this->inspection_period = $inspPeriod;

		$this->propertyID = $propID;

		$this->inspectionID = $id;

		$this->date_of_entry = date("Y-m-d H:i:s");

		$this->name = $fname;

		$this->subject = $subject;

		$this->details = $message;

		$this->userID = $userID;

		$this->status = 0; // set the status as unread by default

		return $this->db->insert('buytolet_notification_tbl', $this);
	}

	// Filter Properties Count

	public function getFilterPropertiesCount($search_crit = array())
	{

		$this->db->select('a.*, b.id, b.type');

		$this->db->from('buytolet_property as a');

		$this->db->where('a.active', 1);

		$this->db->join('apt_type_tbl as b', 'b.id = a.apartment_type', 'LEFT');

		if ($search_crit['slug'] != '') {

			$this->db->where('a.investment_type', $search_crit['slug']);
		}

		if ($search_crit['list_price'] != '') {

			$selected_price_range = $search_crit['list_price'];

			switch ($selected_price_range) {
				case '500000':
					$this->db->where('a.price <', 500000);
					break;
				case '1000000':
					$this->db->where('a.price >=', 500000);
					$this->db->where('a.price <=', 1000000);
					break;
				case '2500000':
					$this->db->where('a.price >=', 1100000);
					$this->db->where('a.price <=', 2500000);
					break;
				case '5000000':
					$this->db->where('a.price >=', 2600000);
					$this->db->where('a.price <=', 5000000);
					break;
				case '7500000':
					$this->db->where('a.price >=', 5100000);
					$this->db->where('a.price <=', 7500000);
					break;
				case '10000000':
					$this->db->where('a.price >=', 7600000);
					$this->db->where('a.price <=', 10000000);
					break;
				case '15000000':
					$this->db->where('a.price >=', 10100000);
					$this->db->where('a.price <=', 15000000);
					break;
				case '20000000':
					$this->db->where('a.price >=', 15100000);
					$this->db->where('a.price <=', 20000000);
					break;
				case '30000000':
					$this->db->where('a.price >=', 21000000);
					$this->db->where('a.price <=', 30000000);
					break;
				case '40000000':
					$this->db->where('a.price >=', 31000000);
					$this->db->where('a.price <=', 40000000);
					break;
				case '50000000':
					$this->db->where('a.price >=', 41000000);
					$this->db->where('a.price <=', 50000000);
					break;
				case '51000000':
					$this->db->where('a.price >=', 51000000);
					break;
				default:
					// 
					break;
			}
		}

		if ($search_crit['location'] != '') {

			$this->db->like('a.city', $search_crit['location']);
		}

		if ($search_crit['property_type'] != '') {

			$this->db->like('b.type', $search_crit['property_type']);
		}

		// 		$this->db->where('a.active', 1);

		return $this->db->count_all_results();
	}

	// Filter Properties 

	public function getFilterProperties($search_crit = array())
	{

		$this->db->select('a.*, b.id, b.type, b.slug, c.id, c.name as propState');

		$this->db->from('buytolet_property as a');

		if ($search_crit['slug'] != '') {

			$this->db->where('a.investment_type', $search_crit['slug']);
		}

		if ($search_crit['list_price']) {
			$selected_price_range = $search_crit['list_price'];

			switch ($selected_price_range) {
				case '500000':
					$this->db->where('a.price <', 500000);
					break;
				case '1000000':
					$this->db->where('a.price >=', 500000);
					$this->db->where('a.price <=', 1000000);
					break;
				case '2500000':
					$this->db->where('a.price >=', 1100000);
					$this->db->where('a.price <=', 2500000);
					break;
				case '5000000':
					$this->db->where('a.price >=', 2600000);
					$this->db->where('a.price <=', 5000000);
					break;
				case '7500000':
					$this->db->where('a.price >=', 5100000);
					$this->db->where('a.price <=', 7500000);
					break;
				case '10000000':
					$this->db->where('a.price >=', 7600000);
					$this->db->where('a.price <=', 10000000);
					break;
				case '15000000':
					$this->db->where('a.price >=', 10100000);
					$this->db->where('a.price <=', 15000000);
					break;
				case '20000000':
					$this->db->where('a.price >=', 15100000);
					$this->db->where('a.price <=', 20000000);
					break;
				case '30000000':
					$this->db->where('a.price >=', 21000000);
					$this->db->where('a.price <=', 30000000);
					break;
				case '40000000':
					$this->db->where('a.price >=', 31000000);
					$this->db->where('a.price <=', 40000000);
					break;
				case '50000000':
					$this->db->where('a.price >=', 41000000);
					$this->db->where('a.price <=', 50000000);
					break;
				case '51000000':
					$this->db->where('a.price >=', 51000000);
					break;
				default:
					//
					break;
			}
		}

		if ($search_crit['location'] != '') {

			$this->db->like('a.city', $search_crit['location']);
		}

		if ($search_crit['property_type'] != '') {

			$this->db->like('b.type', $search_crit['property_type']);
		}

		$this->db->join('apt_type_tbl as b', 'b.id = a.apartment_type', 'LEFT OUTER');

		$this->db->join('states as c', 'c.id = a.state', 'LEFT');

		$this->db->join('buytolet_investment_type as d', 'd.id = a.investment_type', 'LEFT OUTER');

		$this->db->order_by("a.id", "DESC");

		$this->db->limit($this->_pageNumber, $this->_offset);

		$query = $this->db->get();

		return $query->result_array();
	}

	public function getAptypes($ids)
	{

		$this->db->select('a.*, b.id, b.type, b.slug');

		$this->db->from('buytolet_property as a');

		$this->db->where('a.active', 1);

		$this->db->where_in('b.id', $ids);

		$this->db->join('apt_type_tbl as b', 'b.id = a.apartment_type', 'LEFT');

		$this->db->group_by('a.apartment_type');

		$this->db->order_by('b.type', 'ASC');

		$query = $this->db->get();

		return $query->result_array();
	}

	public function get_user_by_confirmation_code($code)
	{

		$this->db->select('a.*, b.*, a.email as user_email, a.userID as user_id');

		$this->db->from('login_tbl as a');

		$this->db->where('a.confirmation', $code);

		$this->db->join('user_tbl as b', 'b.userID = a.userID');

		$query = $this->db->get();

		return $query->row_array();
	}

	public function getTargetOptions($id)
	{

		$this->db->from('target_options');

		$this->db->where('userID', $id);

		$this->db->where('active', 1);

		return $this->db->count_all_results();
	}

	public function checkTargetOptionStatus($id, $ref)
	{

		$this->db->select('*');

		$this->db->from('target_options');

		$this->db->where('userID', $id);

		$this->db->where('request_id', $ref);

		$this->db->where('active', 1);

		$query = $this->db->get();

		return $query->row_array();
	}

	public function insertTargetOptions($userID, $frequency, $duration, $ref, $plan_amount)
	{

		$today = date('Y-m-d H:i:s');

		$targetOptions = array('frequency' => $frequency, 'duration' => $duration, 'amount' => $plan_amount, 'userID' => $userID, 'active' => 0, 'date_subscribed' => $today, 'updated_at' => $today, 'request_id' => $ref);

		return $this->db->insert('target_options', $targetOptions);
	}

	public function updateTargetOptions($userID, $frequency, $duration, $plan_amount)
	{

		$today = date('Y-m-d H:i:s');

		$targetOptions = array('frequency' => $frequency, 'duration' => $duration, 'amount' => $plan_amount, 'updated_at' => $today);

		$this->db->where('userID', $userID);

		return $this->db->update('target_options', $targetOptions);
	}

	public function check_user_details($id)
	{

		$this->db->from('buytolet_users');

		$this->db->where('userID', $id);

		return $this->db->count_all_results();
	}

	public function insertEmailDets($userID, $emailType, $status)
	{

		$email_dets = array("user_id" => $userID, "email_type" => $emailType, "status" => $status, "entry_date" => date('Y-m-d H:i:s'));

		return $this->db->insert('buytolet_sent_emails', $email_dets);
	}

	public function getActivePromo($promo_type = 'Free')
	{

		$today = date('Y-m-d');

		$this->db->select('*');

		$this->db->from('buytolet_promos');

		$this->db->where('status', 1);

		$this->db->where('type', $promo_type);

		$this->db->where('end_date >=', $today);

		$this->db->where('start_date <=', $today);

		$this->db->order_by('id', 'DESC');

		$this->db->limit(1);

		$query = $this->db->get();

		return $query->row_array();
	}

	public function unlockChampionsShares($requestID, $userID)
	{

		$inserts = array('status' => 'Unlocked');

		$this->db->where('request_id', $requestID);

		$this->db->where('user_id', $userID);

		$this->db->where('type', 'Champions');

		return $this->db->update('gift_basket', $inserts);
	}

	public function get_all_eligible_users()
	{

		$this->db->select('a.*, b.*');

		$this->db->from('buytolet_request as a');

		$this->db->where('a.unit_amount >=', 4);

		$this->db->where('a.request_date >=', '2023-07-01 00:00:00');

		$this->db->where('a.request_date <=', '2023-07-04 00:00:00');

		$this->db->where('b.status', 'Completed');

		$this->db->join('buytolet_transactions as b', 'b.transaction_id = a.refID');

		$query = $this->db->get();

		return $query->result_array();
	}

	public function get_stp_users()
	{

		$this->db->select('a.*, b.*, c.*, c.amount as purchase_amount, d.lastName');

		$this->db->from('target_options as a');

		$this->db->where('a.active', 1);

		$this->db->join('buytolet_request as b', 'b.userID = a.userID');

		$this->db->join('buytolet_transactions as c', 'c.transaction_id = b.refID');

		$this->db->join('user_tbl as d', 'd.userID = b.userID');

		$this->db->group_by('a.userID');

		$query = $this->db->get();

		return $query->result_array();
	}

	public function get_single_stp_user($id, $ref_id)
	{

		$this->db->select('a.*, b.*, c.*, a.amount as purchase_amount, d.lastName, d.email as user_email');

		$this->db->from('target_options as a');

		//$this->db->where('a.active', 1);

		$this->db->where('a.userID', $id);

		$this->db->where('a.request_id', $ref_id);

		$this->db->join('buytolet_request as b', 'b.userID = a.userID');

		$this->db->join('buytolet_transactions as c', 'c.transaction_id = b.refID');

		$this->db->join('user_tbl as d', 'd.userID = b.userID');

		$query = $this->db->get();

		return $query->row_array();
	}

	/*public function get_single_stp_user($userID){

		$this->db->select('a.*, b.*, c.*, c.amount as purchase_amount, d.lastName, d.email as user_email');

		$this->db->from('target_options as a');

		$this->db->where('a.active', 1);

		$this->db->where('a.userID', $userID);

		$this->db->join('buytolet_request as b', 'b.userID = a.userID');

		$this->db->join('buytolet_transactions as c', 'c.transaction_id = b.refID');

		$this->db->join('user_tbl as d', 'd.userID = b.userID');

		$query = $this->db->get();

		return $query->row_array();
	}*/

	public function update_with_plan_code($plan_code, $userid)
	{

		$update = array('plan_code' => $plan_code);

		$this->db->where('userID', $userid);

		return $this->db->update('target_options', $update);
	}

	public function update_with_authorization_url($authorization_url, $userid)
	{

		$update = array('authorization_url' => $authorization_url);

		$this->db->where('userID', $userid);

		return $this->db->update('target_options', $update);
	}

	public function update_with_request_id($refID, $userID)
	{

		$update = array('request_id' => $refID);

		$this->db->where('userID', $userID);

		return $this->db->update('target_options', $update);
	}

	public function subscription_created($event)
	{

		$next_payment_date = date('Y-m-d H:i:s', strtotime($event['data']['next_payment_date']));

		$inserts = array('plan_code' => $event['data']['plan']['plan_code'], 'subscription_code' => $event['data']['subscription_code'], 'next_payment_date' => $next_payment_date, 'authorization_code' => $event['data']['authorization']['authorization_code'], 'bin' => $event['data']['authorization']['bin'], 'last_4' => $event['data']['authorization']['last4'], 'expiry_year' => $event['data']['authorization']['exp_year'], 'expiry_month' => $event['data']['authorization']['exp_month'], 'card_type' => $event['data']['authorization']['card_type'], 'card_brand' => $event['data']['authorization']['brand'], 'bank' => $event['data']['authorization']['bank'], 'country_code' => $event['data']['authorization']['country_code'], 'account_name' => $event['data']['authorization']['account_name'], 'customer_code' => $event['data']['customer']['customer_code'], 'entry_date' => date('Y-m-d H:i:s'));

		return $this->db->insert('subscription_payment_tbl', $inserts);
	}

	public function get_request_details_by_plan_code($plan_code)
	{

		$this->db->select('a.*, b.*');

		$this->db->from('target_options as a');

		$this->db->join('buytolet_request as b', 'b.refID = a.request_id');

		$this->db->where('a.plan_code', $plan_code);

		$query = $this->db->get();

		return $query->row_array();
	}

	public function check_if_stp_exists($id)
	{

		$this->db->from('target_options');

		$this->db->where('userID', $id);

		$this->db->where('active', 1);

		$query = $this->db->count_all_results();

		return $query;
	}

	public function get_countries()
	{

		$this->db->select('*');

		$this->db->from('countries');

		$query = $this->db->get();

		return $query->result_array();
	}

	public function get_requests_without_certificate($userID)
	{

		$this->db->select('a.refID, a.unit_amount, b.*, c.property_name, c.address, c.city');

		$this->db->from('buytolet_request as a');

		$this->db->where('a.userID', $userID);

		$this->db->where('a.shares_certificate', NULL);

		$this->db->join('buytolet_transactions as b', 'b.transaction_id = a.refID');

		$this->db->join('buytolet_property as c', 'c.propertyID = a.propertyID');

		$query = $this->db->get();

		return $query->result_array();
	}

	public function get_all_user_requests()
	{

		$this->db->select('a.userID');

		$this->db->from('buytolet_request as a');

		$this->db->where('a.shares_certificate', NULL);

		$this->db->join('buytolet_transactions as b', 'b.transaction_id = a.refID', 'INNER');

		$query = $this->db->get();

		return $query->result_array();
	}

	public function get_stp_properties($id)
	{

		$this->db->select('a.*, a.id as req_id, b.*');

		$this->db->from('buytolet_request as a');

		$this->db->where('method', 'Paystack Subscription');

		$this->db->join('buytolet_property as b', 'b.propertyID = a.propertyID');

		$query = $this->db->get();

		return $query->result_array();
	}

	public function get_stp_details($id)
	{

		$this->db->select('a.*, b.unit_amount');

		$this->db->from('target_options');

		$this->db->where('userID', $id);

		$this->db->where('active', 1);

		$this->db->join('buytolet_request as b', 'b.refID = a.request_id');

		$query = $this->db->get();

		return $query->row_array();
	}

	public function update_property_status($property_id, $status)
	{

		$insert = array('availability' => $status);

		$this->db->where('propertyID', $property_id);

		$this->db->update('buytolet_property', $insert);
	}

	public function get_cities($state_code)
	{

		$this->db->select('name');

		$this->db->from('cities');

		$this->db->where('state_id', $state_code);

		$query = $this->db->get();

		return $query->result_array();
	}

	public function fetchNotification()
	{

		$today = date('Y-m-d');

		$this->db->select('*');

		$this->db->from('notification_tbl');

		$this->db->where('start_date <=', $today);

		$this->db->where('end_date >=', $today);

		// Adding a condition to filter by notification_platform, either BSS or All
		$this->db->where_in('notification_platform', array('BSS', 'All'));

		$this->db->order_by('end_date', 'DESC');

		$this->db->limit(1);

		$query = $this->db->get();

		return $query->row_array();
	}
}
