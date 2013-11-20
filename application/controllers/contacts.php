<?php

class Contacts extends CI_Controller{
    public function __construct() {
        parent::__construct();
        
        //load useful resources
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('encrypt');
        
        //load  models
        $this->load->model('Contacts_model');
        $this->load->model('Category_model');
        
        //check login status
        $this->load->library('session');
        $logged_id = $this->session->userdata('user_details');
        if(!$logged_id){
            $this->load->helper('url');
            redirect('admin/login','refresh');
        }
    }
    
    //shows all contacts
    public function index(){
        
        //common elements
        $data['title'] = 'Contacts';
        $data['head'] = $this->load->view('html/head',$data , true);
        $data['menu'] = $this->load->view('backend/html/menu',$data , true);
        $data['header'] = $this->load->view('html/header',$data , true);
        $data['footer'] = $this->load->view('html/footer',null , true);
        
        //get all contacts
        $data['contacts'] = $this->Contacts_model->get_all_contacts();
        
        //load contacts list view
        $this->load->view('backend/contacts/list_contacts',$data);
    }
    
    //adds new contacts
    public function add(){
        
        //common elements
        $data['title'] = 'Add a new contact';
        $data['head'] = $this->load->view('html/head',$data , true);
        $data['menu'] = $this->load->view('backend/html/menu',$data , true);
        $data['header'] = $this->load->view('html/header',$data , true);
        $data['footer'] = $this->load->view('html/footer',null , true);
        
        //categories
        $data['categories'] = $this->Category_model->get_all_categories();
        
        //set validation rules
        $this->form_validation->set_rules('firstname', 'First Name', 'required');
        $this->form_validation->set_rules('lastname', 'Lastname', 'required');
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('company', 'Company', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        
        if ($this->form_validation->run() == FALSE){
            
            //load add contact view
            $this->load->view('backend/contacts/add_contact',$data);
            
	}else{
            
            //add posted array to Contacts model
            $this->Contacts_model->add_new_contact($this->input->post());
            redirect('contacts','refresh');
            
	}
        
    }
    
    //deletes contacts
    public function delete(){
        
        $details = $this->input->post();
        
        //decode encrypted id
        $id = $this->encrypt->decode($details['id'], '007336');
        $this->Contacts_model->delete_contact($id);
    }
    
    //edits contacts
    public function edit($id = ''){
        //common elements
        $data['title'] = 'Edit contact';
        $data['head'] = $this->load->view('html/head',$data , true);
        $data['menu'] = $this->load->view('backend/html/menu',$data , true);
        $data['header'] = $this->load->view('html/header',$data , true);
        $data['footer'] = $this->load->view('html/footer',null , true);
        
        //categories
        $data['categories'] = $this->Category_model->get_all_categories();
        
        //load model
        $data['contact_details'] = $this->Contacts_model->get_contact_details($id);
        
        
        //set validation rules
        $this->form_validation->set_rules('firstname', 'First Name', 'required');
        /*$this->form_validation->set_rules('username', 'Username', 'required');*/
        
        if ($this->form_validation->run() == FALSE){
            
            //encrypt id
            $data['contact_details']['0']->id = $this->encrypt->encode($data['contact_details']['0']->id, '007336');
            
            //load add contact view
            $this->load->view('backend/contacts/edit_contact',$data);
            
	}else{
            
            //get the post
            $details = $this->input->post();
            
            //decrypt posted id
            $details['id'] = $this->encrypt->decode($details['id'],'007336');
            
            //update contact
            $this->Contacts_model->update_contact($details);
            redirect('contacts','refresh');
            
	}
    }
    
    
}