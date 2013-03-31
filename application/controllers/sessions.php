<?php

class Sessions extends CI_Controller {
  public function newSession()
  {
    $this->load->view('sessions/login');
  }

  public function create()
  {
    $this->load->helper('form');
    
    $this->form_validation->set_rules('email', 'Email', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required|callback_verifyUser');

    $data = array (
      'title' => "Log in",
      'email' => $this->input->post('email'),
      'is_logged_in' => true
    );

    $to_session = array (
      'email' => $this->input->post('email'),
      'is_logged_in' => true
    );

    $this->session->set_userdata($to_session);
    if ($this->form_validation->run() === FALSE)
    {
      $this->load->view('templates/header', $data); 
      $this->load->view('sessions/login');
      $this->load->view('templates/footer');
    }
    else
    {
      redirect('home');
    }    
  }

  public function verifyUser() 
  {
    $email = $this->input->post('email');
    $password = $this->input->post('password');

    $this->load->model('session_model');

    if($this->session_model->get_user($email, $password) == 1) {
      return true;
    } else {
      $this->form_validation->set_message('verifyUser', "Incorrect email/password combination");
      return false;
    }
  }
}