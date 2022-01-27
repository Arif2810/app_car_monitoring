<?php

class Transaksi extends CI_Controller{

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
    elseif($this->session->userdata('role_id') != '1'){
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Anda tidak punya akses ke halaman ini!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
      redirect('customer/dashboard');
    }
  }

  public function index(){
    $data['transaksi'] = $this->db->query("SELECT * FROM transaksi tr, mobil mb, customer cs WHERE tr.id_mobil=mb.id_mobil AND tr.id_customer=cs.id_customer")->result();
    $this->load->view('templates_admin/header');
    $this->load->view('templates_admin/sidebar');
    $this->load->view('admin/data_transaksi', $data);
    $this->load->view('templates_admin/footer');
  }

  public function pembayaran($id){
    // $where = array('id_rental' => $id);
    $data['pembayaran'] = $this->db->query("SELECT * FROM transaksi WHERE id_rental='$id'")->result();
    $this->load->view('templates_admin/header');
    $this->load->view('templates_admin/sidebar');
    $this->load->view('admin/konfirmasi_pembayaran', $data);
    $this->load->view('templates_admin/footer');
  }
  
  public function konfirmasi($id){
    // $where = array('id_rental' => $id);
    $data['konfirmasi'] = $this->db->query("SELECT * FROM transaksi WHERE id_rental='$id'")->result();
    $this->load->view('templates_admin/header');
    $this->load->view('templates_admin/sidebar');
    $this->load->view('admin/konfirmasi', $data);
    $this->load->view('templates_admin/footer');
  }

  public function cek_pembayaran(){
    $id                = $this->input->post('id_rental');
    $status_pembayaran = $this->input->post('status_pembayaran');

    $data = array(
      'status_pembayaran' => $status_pembayaran
    );

    $where = array('id_rental' => $id);
    $this->rental_model->update_data('transaksi', $data, $where);
    redirect('admin/transaksi');
  }

  public function cek_konfirmasi(){
    $id            = $this->input->post('id_rental');
    $status_rental = $this->input->post('status_rental');

    $data = array(
      'status_rental' => $status_rental
    );

    $where = array('id_rental' => $id);
    $this->rental_model->update_data('transaksi', $data, $where);
    redirect('admin/transaksi');
  }

  public function download_pembayaran($id){
    $this->load->helper('download');
    $filePembayaran = $this->rental_model->downloadPembayaran($id);
    $file = 'assets/upload/'.$filePembayaran['bukti_pembayaran'];
    force_download($file, NULL);
  }

  public function transaksi_selesai($id){
    // $where = array('id_rental' => $id);
    $data['transaksi'] = $this->db->query("SELECT * FROM transaksi WHERE id_rental='$id'")->result();
    $this->load->view('templates_admin/header');
    $this->load->view('templates_admin/sidebar');
    $this->load->view('admin/transaksi_selesai', $data);
    $this->load->view('templates_admin/footer');
  }

  public function transaksi_selesai_aksi(){
    $id                 = $this->input->post('id_rental');
    $id_mobil           = $this->input->post('id_mobil');
    $tgl_pengembalian   = $this->input->post('tgl_pengembalian');
    $jam_pengembalian   = $this->input->post('jam_pengembalian');
    $am_pm_pengembalian = $this->input->post('am_pm_pengembalian');
    $hm_terakhir        = $this->input->post('hm_terakhir');
    $kondisi            = $this->input->post('kondisi');
    $komplain           = $this->input->post('komplain');
    // $status_rental       = $this->input->post('status_rental');
    // $status_pengembalian = $this->input->post('status_pengembalian');

    $data = array(
      'tgl_pengembalian'    => $tgl_pengembalian,
      'jam_pengembalian'    => $jam_pengembalian .' '. $am_pm_pengembalian,
      'status_pengembalian' => 'Kembali',
      'hm_terakhir'         => $hm_terakhir,
      'kondisi'             => $kondisi,
      'komplain'            => $komplain,
    );
    $data2 = array('status' => 1);
    $where  = array('id_rental' => $id);
    $where2 = array('id_mobil' => $id_mobil);

    $this->rental_model->update_data('transaksi', $data, $where);
    $this->rental_model->update_data('mobil', $data2, $where2);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
    Transaksi berhasil diupdate
    <button type="button" class="close" data-dismiss="alert" aria-label="close">
      <span aria-hidden="true">&times;</span>
    </button></div>');
    redirect('admin/transaksi');
  }

  public function batal_transaksi($id){
    $where = array('id_rental' => $id);

    $data = $this->rental_model->get_where($where, 'transaksi')->row();
    
    $where2 = array('id_mobil' => $data->id_mobil);
    // var_dump($where2);
    // die;
    $data2 = array('status' => '1');

    $this->rental_model->update_data('mobil', $data2, $where2);
    $this->rental_model->delete_data($where, 'transaksi');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
    Transaksi berhasil dibatalkan
    <button type="button" class="close" data-dismiss="alert" aria-label="close">
      <span aria-hidden="true">&times;</span>
    </button></div>');
    redirect('admin/transaksi');
  }




}