<?php
class User_model extends CI_Model {

  public function __construct()
  {
    $this->load->database();
  }

  public function get_user($name, $password)
  {
    if ($name === FALSE)
    {
      $query = $this->db->get('news');
      return $query->result_array();
    }

    $query = $this->db->get_where('news', array('name' => $name));
    return $query->row_array();
  }

  public function set_user()
  {
    $data = array(
      'name' => $this->input->post('name'),
      'email' => $this->input->post('email'),
      'password' => md5($this->input->post('password'))
      );
    
    return $this->db->insert('User', $data);
  }
}
