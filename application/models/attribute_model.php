<?php


class Attribute_model extends CI_Model{
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function add_attribute($details){
        
        $this->db->insert('attribute' , $details);     
    }
    
    public function get_attributes(){
        $query = $this->db->get('attribute');
        return $query->result();
    }
}

?>
