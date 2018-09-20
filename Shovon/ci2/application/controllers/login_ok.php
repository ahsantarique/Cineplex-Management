<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class login_ok extends CI_Controller{

	public function __construct(){
		parent::__construct();

		//

		//echo "this is the initialization<br>";
		$this->load->helper('url');

	}

	public function index(){
		//echo "this is my index function";

		//$data = array("$query"=>"");
		echo "login successfull";
		$this->load->view('login_success');


	}
}