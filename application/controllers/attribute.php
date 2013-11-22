<?php

class Attribute extends CI_Controller {
    
    public function __construct() {
        
        parent::__construct();
        
        //load useful resources
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $this->load->library('encrypt');
            $this->load->model('Attribute_model');
    }
    
    public function add(){
        $data['title'] = 'Add an attribute';
         $data['head'] = $this->load->view('html/head', $data , true);
         $data['header'] = $this->load->view('html/header');
         $data['footer'] = $this->load->view('html/footer' , null , true);
          
         $this->form_validation->set_rules('attribute_name', 'Attribute Name', 'required');
         
         if ($this->form_validation->run() == FALSE){
            
            $this->load->view('backend/attribute/add' , $data);
            
        }else{
            
            
            $this->Attribute_model->add_attribute($this->input->post());
            //redirect('contacts','refresh');
            
        }
    }
}


