<?php
class Session_model extends CI_Model {

  public function __construct()
  {
    $this->load->database();
  }

  public function get_user($email, $password)
  {
    $this->db->select('email', 'password');
    $this->db->from('User');
    $this->db->where('email', $email);
    $this->db->where('password', md5($password));

    $query = $this->db->get();
    
    if($query->num_rows() == 1) {
      return true;
    } else {
      return false;
    }
  }
}
