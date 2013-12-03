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
    
    public function get_people(){
        $query = $this->db->get('person');
        return $query->result();
    }
    
    public function editPerson($details){
        
         $this->db->where('person_id', $details['person_id']);
         $this->db->update('person', $details);
    }
    
    public function delete($person_id){
        $this->db->query("DELETE FROM person WHERE person_id = '".$person_id."'");
         $this->Person_attribute->deletePersonAttributePerson($person_id);
    }

}
