<?php

class Person extends CI_Controller {

      public function __construct() {
          parent::__construct();
          
           //load useful resources
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $this->load->library('encrypt');
            $this->load->model('Person_model');
      }
      
      public function add(){
          
         $data['title'] = 'Add a person';
         $data['head'] = $this->load->view('html/head', $data , true);
         $data['header'] = $this->load->view('html/header');
         $data['footer'] = $this->load->view('html/footer' , null , true);
          
         $this->form_validation->set_rules('firstname', 'First Name', 'required');
         
         if ($this->form_validation->run() == FALSE){
            
            $this->load->view('backend/person/add' , $data);
            
        }else{
            
            
            $this->Person_model->add_person($this->input->post());
            //redirect('contacts','refresh');
            
        }
      }
}


?>
