<?php

class Contactbook extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        
        //load useful resources
        $this->load->helper('url');
        $this->load->model('Contacts_model');
        $this->load->model('Category_model');
    }
    
    public function index($category = ''){
        
        
        $data['categories'] = $this->Category_model->get_all_categories();
        
        
        //if id is not set return all contacts else filter by category
        if($category == ''){
            
            $data['contacts'] = $this->Contacts_model->get_all_published_contacts();
            
        }else{
            $data['contacts'] = $this->Contacts_model->get_contacts_by_category($category);
            $data['filter'] = $this->Category_model->get_category_by_id($category);
            $data['filter'] = $data['filter'][0]->category_name;
        }
        
        //common elements
        $data['title'] = 'Contacts';
        $data['head'] = $this->load->view('html/head', $data , true);
        $data['header'] = $this->load->view('html/header',null , true);
        $data['footer'] = $this->load->view('html/footer',null , true);
        
        //load view
        $this->load->view('frontend/home',$data);
    }
    
    public function contact($id){
        
        //common elements
        $data['title'] = 'Contact Details';
        $data['head'] = $this->load->view('html/head', $data , true);
        $data['header'] = $this->load->view('html/header',null , true);
        $data['footer'] = $this->load->view('html/footer',null , true);
        
        //get categories for nav
        $data['categories'] = $this->Category_model->get_all_categories();
        
        
        //get contact
        $data['contact_details'] = $this->Contacts_model->get_contact($id);
        
        //load view
        $this->load->view('frontend/contact', $data);
    }
    
    public function search(){
        $search = $this->input->post();
        $data['categories'] = $this->Category_model->get_all_categories();
        
        $data['contacts'] = $this->Contacts_model->get_contacts_by_search($search);
        
        
        //common elements
        $data['title'] = 'Contacts';
        $data['head'] = $this->load->view('html/head', $data , true);
        $data['header'] = $this->load->view('html/header',null , true);
        $data['footer'] = $this->load->view('html/footer',null , true);
        
        //load view
        $this->load->view('frontend/search',$data);
    }
    
    public function ajaxsearch(){
        $search = $this->input->post();
        $data['categories'] = $this->Category_model->get_all_categories();
        
        $data['contacts'] = $this->Contacts_model->get_contacts_by_search($search);
        
        
        //common elements
        $data['title'] = 'Contacts';
        $data['head'] = $this->load->view('html/head', $data , true);
        $data['header'] = $this->load->view('html/header',null , true);
        $data['footer'] = $this->load->view('html/footer',null , true);
        
        //load view
        $this->load->view('frontend/ajaxsearch',$data);
    }
}

?>
