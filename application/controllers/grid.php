<?php

class grid extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        
        //load useful resources
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('encrypt');
        $this->load->model('Person_model');
        $this->load->model('Attribute_model');
        $this->load->model('Person_attribute');
    }
    
    public function index(){
        
        
         //$data['title'] = 'People';
         //$data['head'] = $this->load->view('html/head', $data , true);
         $data['header'] = $this->load->view('html/header');
         $data['footer'] = $this->load->view('html/footer' , null , true);
         
         
         
         $this->load->view('frontend/grid',$data);        
    }
    
    
}

?>

