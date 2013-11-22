<?php

class Person_model extends CI_Model{
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function add_person($details){
        
        $this->db->insert('person' , $details);
    }
    
    public function get_person($person_id){
        
        $query = $this->db->get_where('person',array('person_id' => $person_id));
        return $query->result();
    }
}
