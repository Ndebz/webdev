<?php

class Admin_model extends CI_Model{
    
    public function __construct() {
        parent::__construct();
        
        //load webdev database
        $this->load->database();
    }
    
    public function getUserDetails($username , $password){
        
        $query = $this->db->get_where('users',array('username' => $username , 'password' => $password));
        $result = $query->result();

        if(empty ($result)){
            
            return false;
        }else{
            
            return $result;
        }
    }
}

?>