<?php
class Users extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('user_model');
  }

  public function newUser() {
    $data['title'] = 'Sign up';

    $this->load->view('templates/header', $data);
    $this->load->view('users/newUser', $data);
    $this->load->view('templates/footer');
  }

  public function index()
  {
    $data['news'] = $this->news_model->get_news();
    $data['title'] = 'News archive';

    $this->load->view('templates/header', $data);
    $this->load->view('news/index', $data);
    $this->load->view('templates/footer');
  }

  public function view($slug)
  {
    $data['news_item'] = $this->news_model->get_news($slug);

    if (empty($data['news_item']))
    {
      show_404();
    }

    $data['title'] = $data['news_item']['title'];

    $this->load->view('templates/header', $data);
    $this->load->view('news/view', $data);
    $this->load->view('templates/footer');
  }

  public function create()
  {
    $this->load->library('form_validation');
    
    $data['title'] = "Sign up";

    $this->form_validation->set_rules('name', 'Name', 'required|min_length[3]|max_length[45]');
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email|max_length[45]');
    $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[32]');
    $this->form_validation->set_rules('confirm', 'Password Confirmation', 'required|match[password]');

    if ($this->form_validation->run() === FALSE)
    {
      $this->load->view('templates/header', $data); 
      $this->load->view('users/newUser');
      $this->load->view('templates/footer');
      
    }
    else
    {
      $this->user_model->set_user();
      redirect('news/create');
      $this->load->view('users/create_success');
    }
  }
}