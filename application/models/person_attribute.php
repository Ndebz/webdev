<?php

class Person_attribute extends CI_Model{
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function get_person_attributes($person_id){
        
        $query = $this->db->query("SELECT * FROM person per , attribute attr , person_attribute per_attr
                                    WHERE per.person_id = per_attr.person_id
                                    AND attr.attribute_id = per_attr.attribute_id
                                    AND per.person_id = '".$person_id."' ");
        
        return $query->result();
    }
    
    public function get_available_attributes($assigned_attributes){
        
        $assigned_attribute_ids = array();
        
        //gather all used ids
        foreach($assigned_attributes as $assigned_attribute){
           $assigned_attribute_ids[] =  $assigned_attribute->attribute_id;
        }
        
        //get all attributes
        $this->load->model('Attribute_model');
        $available_attributes = $this->Attribute_model->get_attributes();
        
        //get available atribute ids
        $available_attribute_ids = array() ;
        
       foreach($available_attributes as $available_attribute){
           
           //id is not in used attribute ids push into avilable ids
           if(!in_array($available_attribute->attribute_id, $assigned_attribute_ids)){
               $available_attribute_ids[] = $available_attribute->attribute_id;
           }
           
       }
       
       if(empty($available_attribute_ids)){
            return;
       }
       
       //now this is why i love code igniter
       //get all available attributes
       $this->db->select('*');
       $this->db->from('attribute');
       $this->db->where_in('attribute_id' , $available_attribute_ids);
       
       $query = $this->db->get();
       
       return $query->result();
       
    }
    
    
    public function saveAttribute($details){
        $this->db->insert('person_attribute' , $details);
    }
    
    public function updateAttribute($details){
        
        $this->db->query("UPDATE person_attribute
                        SET value='".$details['value']."' 
                        WHERE person_id='".$details['person_id']."' 
                        AND attribute_id='".$details['attribute_id']."'");
        
    }
    
    public function deleteAttribute($person_id , $attribute_id){
        
        $this->db->query("DELETE FROM person_attribute
                        WHERE person_id = '".$person_id."'
                        AND attribute_id = '".$attribute_id."'");
    }
    
    public function deletePersonAttribute($attribute_id){
        $this->db->query("DELETE FROM person_attribute
                        WHERE  attribute_id = '".$attribute_id."'");
    }
    
    public function deletePersonAttributePerson($person_id){
        $this->db->query("DELETE FROM person_attribute
                        WHERE  person_id = '".$person_id."'");
    }
}

?>
