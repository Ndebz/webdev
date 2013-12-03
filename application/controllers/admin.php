<?php

class Admin extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        
        //load useful resources
           $this->load->helper(array('form', 'url'));
           $this->load->library('form_validation');
           $this->load->library('encrypt');
           $this->load->library('session');


           //load category model
           $this->load->model('Admin_model');
    }
    
    public function login($wrong = ''){
        //check if session already started and redirect if true
        if($this->session->userdata('user_details'))
            {
              redirect('person','refresh');
            }
            
        //common elements
            $data['title'] = 'Add a new category';
            $data['head'] = $this->load->view('html/head',$data , true);
            $data['header'] = $this->load->view('html/header',$data , true);
            $data['footer'] = $this->load->view('html/footer',null , true);
            $data['wrong'] = $wrong;
            $this->load->view('backend/admin/login', $data);
    }
    
    public function check(){  
        $userdetails = $this->Admin_model->getUserDetails($this->input->post('username') , $this->input->post('password'));
        
        if($userdetails == false){
            
            redirect('admin/login/wrong', 'refresh');
        }else{
            
            //start session and redirect
            $this->session->set_userdata('user_details', $userdetails);
            redirect('person', 'refresh');
        }
    }
}
?>