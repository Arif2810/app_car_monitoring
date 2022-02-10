<?php

class Data_mobil extends CI_Controller{

  public function index(){

    // Ambil data keyword
    if($this->input->post('submit')){
      $keyword = $this->input->post('keyword');
    }
    else{
      $keyword = null;
    }

    $data['mobil'] = $this->rental_model->get_data_mobil('mobil', $keyword)->result();
    $this->load->view('templates_customer/header');
    $this->load->view('customer/data_mobil', $data);
    $this->load->view('templates_customer/footer');
  }

  public function detail_mobil($id){
    $data['detail'] = $this->rental_model->ambil_id_mobil($id);
    $this->load->view('templates_customer/header');
    $this->load->view('customer/detail_mobil', $data);
    $this->load->view('templates_customer/footer');
  }

  // public function pencarian(){
  //   // ambil data keyword
  //   if($this->input->post('submit')){
  //     $data['keyword'] = $this->input->post('keyword');
  //     echo $data['keyword'];
  
  //     if($data['keyword'] == null){
  //       $data['mobil'] = $this->rental_model->get_data('mobil')->result();
  //       $this->load->view('templates_customer/header');
  //       $this->load->view('customer/data_mobil', $data);
  //       $this->load->view('templates_customer/footer');
  //     }
  //     else{
  //       $data['mobil'] = $this->rental_model->get_data_pencarian('mobil', 'keyword')->result();
  //       $this->load->view('templates_customer/header');
  //       $this->load->view('customer/data_mobil', $data);
  //       $this->load->view('templates_customer/footer');
  //     }
  //   }

  // }

  


}