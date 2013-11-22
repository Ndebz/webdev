<?php

class Assign extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        
        //load useful resources
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('encrypt');
        $this->load->model('Person_model');
        $this->load->model('Person_attribute');
    }
    
    public function attribute($person_id){
         $data['title'] = 'Assign Attribute';
         $data['head'] = $this->load->view('html/head', $data , true);
         $data['header'] = $this->load->view('html/header');
         $data['footer'] = $this->load->view('html/footer' , null , true);
         
         //get person details
         $data['person'] = $this->Person_model->get_person($person_id);
         
         //get assigned attributes
         $data['assigned_attributes'] = $this->Person_attribute->get_person_attributes($person_id);
         
         //get available attributes
         $data['available_attributes'] = $this->Person_attribute->get_available_attributes($data['assigned_attributes']);
         
         $this->load->view('backend/assign/assign' , $data);
    }
    
    public function assignment($person_id , $attribute_id){
        
         $data['title'] = 'Assign Attribute';
         $data['head'] = $this->load->view('html/head', $data , true);
         $data['header'] = $this->load->view('html/header');
         $data['footer'] = $this->load->view('html/footer' , null , true);
         $this->load->view('backend/assign/assignment' , $data );
    }
}
?>
