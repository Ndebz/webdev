<?php

    class Category extends CI_Controller{
        public function __construct() {
            parent::__construct();
            
            //load useful resources
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $this->load->library('encrypt');

            //load category model
            $this->load->model('Category_model');

            //check login status
            $this->load->library('session');
            $logged_id = $this->session->userdata('user_details');
            if(!$logged_id){
                $this->load->helper('url');
                redirect('admin/login','refresh');
            }
        }
        
        public function index(){
            //common elements
            $data['title'] = 'Add a new category';
            $data['head'] = $this->load->view('html/head',$data , true);
            $data['menu'] = $this->load->view('backend/html/menu',$data , true);
            $data['header'] = $this->load->view('html/header',$data , true);
            $data['footer'] = $this->load->view('html/footer',null , true);
            
            //get all categories from database
            $data['categories'] = $this->Category_model->get_all_categories();
            
            //load view
            $this->load->view('backend/category/list_categories', $data);
        }
        
        public function add(){
            //common elements
            $data['title'] = 'Add a new category';
            $data['head'] = $this->load->view('html/head',$data , true);
            $data['menu'] = $this->load->view('backend/html/menu',$data , true);
            $data['header'] = $this->load->view('html/header',$data , true);
            $data['footer'] = $this->load->view('html/footer',null , true);
            
            //set validation rules
            $this->form_validation->set_rules('category_name', 'Category Name', 'required');

            if ($this->form_validation->run() == FALSE){

                //load add contact view
                $this->load->view('backend/category/add_category',$data);

            }else{

                //add posted array to Contacts model
                $this->Category_model->add_new_category($this->input->post());
                redirect('category','refresh');

            }
        }
        
        public function edit($id = ''){
            //common elements
            $data['title'] = 'Edit category';
            $data['head'] = $this->load->view('html/head',$data , true);
            $data['menu'] = $this->load->view('backend/html/menu',$data , true);
            $data['header'] = $this->load->view('html/header',$data , true);
            $data['footer'] = $this->load->view('html/footer',null , true);
            
            //get category
            $data['category'] = $this->Category_model->get_category_by_id($id);
            
            //set validation rules
            $this->form_validation->set_rules('category_name', 'Category Name', 'required');

            if ($this->form_validation->run() == FALSE){
                 
                //encrypt id
                $data['category']['0']->id = $this->encrypt->encode($data['category']['0']->id, '007336');
                
                //load add contact view
                $this->load->view('backend/category/edit_category',$data);

            }else{
                
                //get the post
                $details = $this->input->post();

                //decrypt posted id
                $details['id'] = $this->encrypt->decode($details['id'],'007336');
                
                //add posted array to Contacts model
                $this->Category_model->update_category($details);
                redirect('category','refresh');

            }
        }
        
        public function delete(){
            
            $details = $this->input->post();
            //decode encrypted id
            $id = $this->encrypt->decode($details['id'], '007336');
            $this->Category_model->delete_category($id);
            
            //push deleted catagory contacts to uncatagorised
            $this->load->model('Contacts_model');
            $this->Contacts_model->update_category($id);
        }
    }

?>
