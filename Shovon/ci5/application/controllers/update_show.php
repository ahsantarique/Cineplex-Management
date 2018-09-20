<?php
/* 
 * File Name: employee.php
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class update_show extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->database();
        $this->load->library('form_validation');
        //load the employee model
        $this->load->model('update_show_model');
    }

    //index function
    function index()
    {
        $id=$_REQUEST['id'];
        $s_id=$this->input->post('s_id');
        $data['s_id']=$s_id;
        //fetch data from department and designation tables
        $data['movie'] = $this->update_show_model->get_movie();
        //$data['designation'] = $this->employee_model->get_designation();
        //fetch employee record for the given employee no
        $data['showrecord'] = $this->update_show_model->get_show_record($id);    
        //set validation rules
        $this->form_validation->set_rules('s_id', 'Show Id', 'trim|required|numeric');
        //$this->form_validation->set_rules('employeename', 'Employee Name', 'trim|required|xss_clean|callback_alpha_only_space');
        $this->form_validation->set_rules('start_time', 'Start Time', 'required');
        //$this->form_validation->set_rules('designation', 'Designation', 'callback_combo_check');
        $this->form_validation->set_rules('end_time', 'End Time', 'required');
        $this->form_validation->set_rules('movie', 'Movie Name', 'callback_combo_check');

        if ($this->form_validation->run() == FALSE)
        {
            //fail validation
            $this->load->view('update_show_view', $data);
        }
        else
        {    
            //pass validation
           // $data = array(
                //'s_id' => $this->input->post('s_id'),
                $start_time = @date('Y-m-d h:i:sa', @strtotime($this->input->post('start_time')));
                $end_time = @date('Y-m-d h:i:sa', @strtotime($this->input->post('end_time')));
                $language = $this->input->post('language');
                $m_id = $this->input->post('movie');
            
            //);

            //$this->db->where('s_id',$id);
            //$this->db->update('shows', $data);
            $update="update shows set start_time='$start_time', end_time='$end_time', language='$language', m_id='$m_id' where s_id=$s_id";
            //display success message
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Employee details updated to Database!!!</div>');
            redirect('http://localhost/test3/dashboard');
        }

    }
    
    //custom validation function for dropdown input
    function combo_check($str)
    {
        if ($str == '-SELECT-')
        {
            $this->form_validation->set_message('combo_check', 'Valid %s Name is required');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }

    //custom validation function to accept only alpha and space input
    function alpha_only_space($str)
    {
        if (!preg_match("/^([-a-z ])+$/i", $str))
        {
            $this->form_validation->set_message('alpha_only_space', 'The %s field must contain only alphabets or spaces');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }
}
?>