<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class HomeModel extends CI_Model{

	public function getProfile(){
		return array("n" => "ahsan tarique", "age"=>22);
	}
}