<?php

class Person extends CI_Controller {

      public function __construct() {
          parent::__construct();
          
           //load useful resources
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('encrypt');
        $this->load->model('Person_model');
        $this->load->model('Attribute_model');
        $this->load->model('Person_attribute');
        $this->load->library('session');
        
        //check if session already started and redirect if true
        if(!$this->session->userdata('user_details'))
            {
              redirect('admin/login','refresh');
            }
      }
      
      public function index(){
          
         $data['title'] = 'People list';
         $data['head'] = $this->load->view('html/head', $data , true);
         $data['menu'] = $this->load->view('backend/html/menu' , null , true);
         $data['header'] = $this->load->view('html/header',$data);
         $data['footer'] = $this->load->view('html/footer' , null , true);
         
         $data['people'] = $this->Person_model->get_people();
         $this->load->view('backend/person/list' , $data);
      }
      
      public function add(){
          
         $data['title'] = 'Add a person';
         $data['head'] = $this->load->view('html/head', $data , true);
         $data['menu'] = $this->load->view('backend/html/menu' , null , true);
         $data['header'] = $this->load->view('html/header',$data);
         $data['footer'] = $this->load->view('html/footer' , null , true);
          
         $this->form_validation->set_rules('firstname', 'First Name', 'required');
         $this->form_validation->set_rules('surname', 'Surname', 'required');
         $this->form_validation->set_rules('dob', 'DOB', 'required');
         
         
         
         if ($this->form_validation->run() == FALSE){
            
            $this->load->view('backend/person/add' , $data);
            
        }else{
            
            
            $this->Person_model->add_person($this->input->post());
            redirect('person','refresh');
            
        }
      }
      
      public function edit($person_id){
         $data['title'] = 'Assign Attribute';
         $data['head'] = $this->load->view('html/head', $data , true);
         $data['menu'] = $this->load->view('backend/html/menu' , null , true);
         $data['header'] = $this->load->view('html/header',$data);
         $data['footer'] = $this->load->view('html/footer' , null , true);
         
         //get person details
         $data['person'] = $this->Person_model->get_person($person_id);
         
         //get assigned attributes
         $data['assigned_attributes'] = $this->Person_attribute->get_person_attributes($person_id);
         
         //get available attributes
         $data['available_attributes'] = $this->Person_attribute->get_available_attributes($data['assigned_attributes']);
         
         $this->load->view('backend/person/edit' , $data);
    }
    
      public function editpersonpost(){
          
          $this->Person_model->editPerson($this->input->post());
          
      }
      
      public function assign($person_id , $attribute_id){
          
         $data['person_id'] = $person_id;
         $data['attribute_id'] = $attribute_id;
         
         $data['attribute'] = $this->Attribute_model->get_attribute_by_id($attribute_id);        
        
         $data['title'] = 'Assign Attribute';
         $data['head'] = $this->load->view('html/head', $data , true);
         $data['footer'] = $this->load->view('html/footer' , null , true);
         $this->load->view('backend/person/assign' , $data );
      }
      
      public function assignpost(){
          
         $this->Person_attribute->saveAttribute($this->input->post()); 
      }
      
      public function editpersonattributepost(){
          $this->Person_attribute->updateAttribute($this->input->post());
      }
      
      public function deletepersonpost($person_id){
          $this->Person_model->delete($person_id);
          redirect('person','refresh');
      }
      
      public function deleteattribute($person_id , $attribute_id){
          $this->Person_attribute->deleteAttribute($person_id , $attribute_id);
          redirect("person/edit/$person_id" , "refresh");
      }
      
      function validate_member($date){
          //checks if date in future
          $date = strtotime($date);
         if ($date > time())
            {
              return false;
            }
            
            return true;
      }
}


?>
