<?php

class Attribute extends CI_Controller {
    
    public function __construct() {
        
        parent::__construct();
        
        //load useful resources
            $this->load->helper(array('form', 'url' ));
            $this->load->library('form_validation');
            $this->load->library('encrypt');
            $this->load->model('Attribute_model');
            $this->load->library('session');
            
            //check if session already started and redirect if true
        if(!$this->session->userdata('user_details'))
            {
              redirect('admin/login','refresh');
            }
    }
    
    public function index(){
        $data['title'] = 'Attributes';
         $data['head'] = $this->load->view('html/head', $data , true);
         $data['menu'] = $this->load->view('backend/html/menu' , null , true);
         $data['header'] = $this->load->view('html/header',$data);
         $data['footer'] = $this->load->view('html/footer' , null , true);
         $data['attributes'] = $this->Attribute_model->get_attributes();
         $this->load->view('backend/attribute/list',$data);
         
    }
    
    public function add(){
        $data['title'] = 'Add an attribute';
         $data['head'] = $this->load->view('html/head', $data , true);
         $data['menu'] = $this->load->view('backend/html/menu' , null , true);
         $data['header'] = $this->load->view('html/header',$data);
         $data['footer'] = $this->load->view('html/footer' , null , true);
          
         $this->form_validation->set_rules('attribute_name', 'Attribute Name', 'required');
         
         if ($this->form_validation->run() == FALSE){
            
            $this->load->view('backend/attribute/add' , $data);
            
        }else{
            
            
            $this->Attribute_model->add_attribute($this->input->post());
            redirect('attribute','refresh');
            
        }
    }
    
    public function edit($id = ""){
        $data['title'] = 'Add an attribute';
         $data['head'] = $this->load->view('html/head', $data , true);
         $data['menu'] = $this->load->view('backend/html/menu' , null , true);
         $data['header'] = $this->load->view('html/header',$data);
         $data['footer'] = $this->load->view('html/footer' , null , true);
         
         
         $this->form_validation->set_rules('attribute_name', 'Attribute Name', 'required');
         
         if ($this->form_validation->run() == FALSE){
             $data['attribute'] = $this->Attribute_model->get_attribute_by_id($id);
            $this->load->view('backend/attribute/edit' , $data);
            
        }else{
            
            
            $this->Attribute_model->edit_attribute($this->input->post());
            redirect('attribute','refresh');
            
        }
        
        
    }
    
    public function delete($attribute_id){
        
        $this->Attribute_model->delete_attribute($attribute_id);
        redirect('attribute','refresh');
    }
}


