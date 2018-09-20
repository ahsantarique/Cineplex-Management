<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Home extends CI_Controller{

	public function __construct(){
		parent::__construct();

		//

		echo "this is the initialization<br>";


	}


	public function index(){
		//echo "this is my index function";

		//connect to database


		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "cineplex";

		// Create connection
		/*$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		} 

		$sql = "SELECT s_id, start_time, language FROM shows";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
		    // output data of each row
		    while($row = $result->fetch_assoc()) {
		        echo "show id: " . $row["s_id"]. " - Start time: " . $row["start_time"]. " " . $row["language"]. "<br>";
		    }
		} else {
		    echo "0 results";
		}
		$conn->close();*/


		$this->load->helper('url');
		$this->load->view('web');
	}


	//

	public function one($name = 'boss'){



		//$this->load->model("homemodel");

		$profile = $this->homemodel->getProfile();

		print_r ($profile);

		$this->load->view('one');
		// $this->load->view('one');

		echo "this is the one <br>";
	}
}

