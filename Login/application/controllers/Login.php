<?php
class Login extends CI_Controller{
    public function _construct(){
        
    }
    public function index(){
        $this->load->view('login');
    }
    public function authenticate(){
        $username=$_POST['username'];
        $password=$_POST['password'];
        $data=$this->User_Model->users($username);
        if(!empty($data)){
        if(password_verify($password,$data['password'])==true){
            $adminArr['userName']=$username;
            $this->session->set_flashdata('msg','Password is correct');
            $this->session->set_userdata('users',$adminArr);
            $this->load->view('success');
       }else{
            $this->session->set_flashdata('msg','Password is incorrect');
            redirect(base_url().'index.php/login');
       }
    }else{
        $this->session->set_flashdata('msg','Password is incorrect');
        redirect(base_url().'index.php/login');
   }
    }
}