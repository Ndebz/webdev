<?php

    class Contacts_model extends CI_Model{
        public function __construct() {
            parent::__construct();
            
            //load webdev database
            $this->load->database();
        }
        
        public function add_new_contact($details){
            
            //insert details in database
            $this->db->insert('contacts',$details);    
            
        }
        
        public function get_all_contacts(){
            //get and return all contacts
            $query = $this->db->get('contacts');
            return $query->result();
        }
        
        public function get_contact($id){
            $query = $this->db->get_where('contacts',array('id' => $id));
            return $query->result();
        }
        
        public function update_contact($details){
            
           $this->db->where('id', $details['id']);
           $this->db->update('contacts', $details); 
           
        }
        
        public function get_all_published_contacts(){
            
            //get all published contacts
            $query = $this->db->get_where('contacts',array('access_level' => '1'));
            
            return $query->result();
        }
        
        public function get_contacts_by_category($category){
            $query = $this->db->get_where('contacts',array('access_level' => '1', 'category' => $category));
            return $query->result();
        }
        
        
    }
?>