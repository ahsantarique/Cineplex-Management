<?php
/* 
 * File Name: employee_model.php
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class update_show_model extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    //fetch employee record by employee no
    function get_show_record($s_id)
    {
        $this->db->where('s_id', $s_id);
        $this->db->from('shows');
        $query = $this->db->get();
        return $query->result();
    }

    //get department table to populate the department name dropdown
    function get_movie()     
    { 
        $this->db->select('m_id');
        $this->db->select('m_name');
        $this->db->from('movie');
        $query = $this->db->get();
        $result = $query->result();

        //array to store department id & department name
        $m_id = array('-SELECT-');
        $m_name = array('-SELECT-');

        for ($i = 0; $i < count($result); $i++)
        {
            array_push($m_id, $result[$i]->m_id);
            array_push($m_name, $result[$i]->m_name);
        }
        return $movie_result = array_combine($m_id, $m_name);
    }

    //get designation table to populate the designation dropdown
    
}
?>