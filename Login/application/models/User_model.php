<?php
class User_model extends CI_Model{
    public function users($username){
        $this->load->database();
        $this->db->where('user_id',$username);
        $data=$this->db->get('user_details')->row_array();
        return $data;
    }
}