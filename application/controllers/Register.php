<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
  
  public function __construct(){
    parent::__construct();

    if($this->session->userdata('role_id') == 2){
      redirect('customer/dashboard');
    }


  }

  public function index(){
		$this->_rules();

		if($this->form_validation->run() == FALSE){
			$this->load->view('templates_admin/header');
			$this->load->view('register_form');
			$this->load->view('templates_admin/footer');
		}
		else{
			$nama        = $this->input->post('nama');
      $username    = $this->input->post('username');
      $departement = $this->input->post('departement');
      $section     = $this->input->post('section');
      $no_telepon  = $this->input->post('no_telepon');
      $password    = md5($this->input->post('password'));
      $role_id     = '2';

      $data = array(
        'nama'        => $nama,
        'username'    => $username,
        'departement' => $departement,
        'section'     => $section,
        'no_telepon'  => $no_telepon,   
        'password'    => $password,
        'role_id'     => $role_id,
			);
			
			$this->rental_model->insert_data($data, 'customer');
      $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
      Berhasil register, Silahkan login!
      <button type="button" class="close" data-dismiss="alert" aria-label="close">
        <span aria-hidden="true">&times;</span>
      </button></div>');
      redirect('auth/login');
		}
	}


	public function _rules(){
		$this->form_validation->set_rules('nama', 'Nama', 'required');
    $this->form_validation->set_rules('username', 'Username', 'required');
    $this->form_validation->set_rules('departement', 'Departement', 'required');
    $this->form_validation->set_rules('section', 'Section', 'required');
    $this->form_validation->set_rules('no_telepon', 'No. telepon', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');
	}





}