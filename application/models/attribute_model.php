<?php


class Attribute_model extends CI_Model{
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('Person_attribute');
    }
    
    public function add_attribute($details){
        
        $this->db->insert('attribute' , $details);     
    }
    
    public function get_attributes(){
        $query = $this->db->get('attribute');
        return $query->result();
    }
    
    public function get_attribute_by_id($attribute_id){
        
        $query = $this->db->get_where('attribute',array('attribute_id' => $attribute_id));
        return $query->result();
    }
    
    public function edit_attribute($details){
         $this->db->where('attribute_id', $details['attribute_id']);
         $this->db->update('attribute', $details);
    }
    
    public function delete_attribute($attribute_id){
         $this->db->query("DELETE FROM attribute WHERE attribute_id = '".$attribute_id."'");
         $this->Person_attribute->deletePersonAttribute($attribute_id);
    }
}

?>
