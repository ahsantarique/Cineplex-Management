<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Show_Schedule extends CI_Controller{

	public function __construct(){
		parent::__construct();

		//

		echo "this is the initialization<br>";


	}


	public function index(){
		//echo "this is my index function";

		//connect to database
		//
		
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "cineplex";

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		} 

		$sql = "select m.m_name mm , s.start_time ss from movie m join shows s on (s.m_id =  m.m_id)";
		$result = $conn->query($sql);

		
		if ($result->num_rows > 0) {
		    // output data of each row
		    while($row = $result->fetch_assoc()) {
		        echo "Movie Name: " . $row["mm"]. " - Start time: " . $row["ss"]. "<br>";
		    }
		} else {
		    echo "No Upcoming Movies";
		}
		$conn->close();
	}

}

