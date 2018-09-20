<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Login extends CI_Controller{

	public function __construct(){
		parent::__construct();

		//

		//echo "this is the initialization<br>";
		$this->load->helper('url');

	}


	public function index(){
		//echo "this is my index function";

		//$data = array("$query"=>"");
		$this->load->view('login_view');

		if (isset($_POST['username'])){
	    	$servername = "localhost";
			$u = "root";
			$pass = "";
			$dbname = "cineplex";

			// Create connection
			$conn = new mysqli($servername, $u, $pass, $dbname);
			// Check connection
			if ($conn->connect_error) {
			    die("Connection failed: " . $conn->connect_error);
			} 

	        $username = $_POST['username'];
	        $password = $_POST['password'];
			//$username = stripslashes($username);
			//$password = stripslashes($password);		
			//echo "ok $username $password ";


			$quer = "SELECT * FROM customer WHERE c_name='$username' and password='$password'";
			//echo "ok";
			$result = $conn->query($quer);
			
			//echo "$result";

			if ($result->num_rows > 0) {
			    // output data of each row
				session_start();
				redirect("http://localhost/ci2/index.php/login_ok");
				
				//echo base_url();
			} else {
			    echo "invalid login";
			}

   		}

	}
		

	//

}

