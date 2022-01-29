<?php

class Rental extends CI_Controller{

  public function __construct(){
    parent::__construct();
    
    if(empty($this->session->userdata('username'))){
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Anda belum login!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
      redirect('auth/login');
    }
    elseif($this->session->userdata('role_id') != '2'){
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Anda tidak punya akses ke halaman ini!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
      redirect('admin/dashboard');
    }
  }

  public function tambah_rental($id){
    // echo $id;
    // die;
    $data['detail'] = $this->rental_model->ambil_id_mobil($id);
    $this->load->view('templates_customer/header');
    $this->load->view('customer/tambah_rental', $data);
    $this->load->view('templates_customer/footer');
  }
 
  public function tambah_rental_aksi(){
    $id_customer   = $this->session->userdata('id_customer');
    $id_mobil      = $this->input->post('id_mobil');
    $tgl_rental    = $this->input->post('tgl_rental');
    $jam_pakai     = $this->input->post('jam_pakai');
    $am_pm_pakai   = $this->input->post('am_pm_pakai');
    $tgl_kembali   = $this->input->post('tgl_kembali');
    $jam_kembali   = $this->input->post('jam_kembali');
    $am_pm_kembali = $this->input->post('am_pm_kembali');
    $dari          = $this->input->post('dari');
    $tujuan        = $this->input->post('tujuan');
    $hm_awal       = $this->input->post('hm_awal');

    $data = array(
      'id_customer'         => $id_customer,
      'id_mobil'            => $id_mobil,
      'tgl_rental'          => $tgl_rental,
      'jam_rental'          => $jam_pakai .' '. $am_pm_pakai,
      'tgl_kembali'         => $tgl_kembali,
      'jam_kembali'         => $jam_kembali .' '. $am_pm_kembali,
      'dari'                => $dari,
      'tujuan'              => $tujuan,
      'hm_awal'             => $hm_awal,
     'tgl_pengembalian'     => '-',
      'status_rental'       => 'Pending',
      'status_pengembalian' => 'Belum Kembali',
    );

    $this->rental_model->insert_data($data, 'transaksi');
    
    $status = array('status' => '0');
    $id = array('id_mobil' => $id_mobil);
    $this->rental_model->update_data('mobil', $status, $id);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
      Transaksi berhasil, silahkan checkout!
      <button type="button" class="close" data-dismiss="alert" aria-label="close">
        <span aria-hidden="true">&times;</span>
      </button></div>');
      redirect('customer/data_mobil');
  }


}