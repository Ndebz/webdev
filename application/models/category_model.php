<?php

    class Category_model extends CI_Model{
        public function __construct() {
            parent::__construct();
            
            //load webdev database
            $this->load->database();
        }
        
        public function add_new_category($details){
            
            //insert details in database
            $this->db->insert('category',$details);
            
        }
        
        public function get_all_categories(){
            
            //get all categories
            $query = $this->db->get('category');
            return $query->result();
        }
        
        public function get_category_by_id($id){
            
            $query = $this->db->get_where('category',array('id' => $id));
            return $query->result();
            
        }
        
        public function update_category($details){
           
           $this->db->where('id', $details['id']);
           $this->db->update('category', $details);
           
        }
        
         public function delete_category($id){
             
             //if not uncatgorised category delete
             if($id != 7){
                 $this->db->delete('category' , array('id' => $id));
             }
            
        }
    }
?>
