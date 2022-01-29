<?php

class Laporan extends CI_Controller{

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
    $dari   = $this->input->post('dari');
    $sampai = $this->input->post('sampai');
    // var_dump($dari);
    // die;
    $this->_rules();

    if($this->form_validation->run() == FALSE){
      $this->load->view('templates_admin/header');
      $this->load->view('templates_admin/sidebar');
      $this->load->view('admin/filter_laporan');
      $this->load->view('templates_admin/footer');
    }
    else{
      $data['laporan'] = $this->db->query("SELECT * FROM transaksi tr, mobil mb, customer cs WHERE tr.id_mobil=mb.id_mobil AND tr.id_customer=cs.id_customer AND date(tgl_rental) >= '$dari' AND date(tgl_rental) <= '$sampai'")->result();
      // var_dump($data);
      // die;
      $this->load->view('templates_admin/header');
      $this->load->view('templates_admin/sidebar');
      $this->load->view('admin/tampilkan_laporan', $data);
      $this->load->view('templates_admin/footer');
    }
  }

  public function print_laporan(){
    $dari   = $this->input->get('dari');
    $sampai = $this->input->get('sampai');
    // var_dump($dari);
    // die;

    $data['title'] = "Print Laporan Transaksi";
    $data['laporan'] = $this->db->query("SELECT * FROM transaksi tr, mobil mb, customer cs WHERE tr.id_mobil=mb.id_mobil AND tr.id_customer=cs.id_customer AND date(tgl_rental) >= '$dari' AND date(tgl_rental) <= '$sampai'")->result();

    $this->load->view('templates_admin/header', $data);
    $this->load->view('admin/print_laporan', $data);
  }

  public function excel(){
    $dari   = $this->input->get('dari');
    $sampai = $this->input->get('sampai');

    // $data['title'] = "Laporan Transaksi";
    $data['laporan'] = $this->db->query("SELECT * FROM transaksi tr, mobil mb, customer cs WHERE tr.id_mobil=mb.id_mobil AND tr.id_customer=cs.id_customer AND date(tgl_rental) >= '$dari' AND date(tgl_rental) <= '$sampai'")->result();

    require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel.php');
    require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

    $object = new PHPExcel();

    $object->getProperties()->setCreator("Asal Ngoding Official");
    $object->getProperties()->setLastModifiedBy("Asal Ngoding Official");
    $object->getProperties()->setTitle("Laporan Transaksi");

    $object->setActiveSheetIndex(0);

    $object->getActiveSheet()->setCellValue('A1', 'Laporan Transaksi Monitoring Mobil');
    $object->getActiveSheet()->setCellValue('A2', 'Dari Tanggal : ' .date('d-M-Y', strtotime($dari)));
    $object->getActiveSheet()->setCellValue('A3', 'Sampai Tanggal : ' .date('d-M-Y', strtotime($sampai)));

    $object->getActiveSheet()->setCellValue('A4', 'No');
    $object->getActiveSheet()->setCellValue('B4', 'Nama Driver');
    $object->getActiveSheet()->setCellValue('C4', 'Jenis Mobil');
    $object->getActiveSheet()->setCellValue('D4', 'Tgl Digunakan');
    $object->getActiveSheet()->setCellValue('E4', 'Tgl Kembali');
    $object->getActiveSheet()->setCellValue('F4', 'Tgl Dikembalikan');
    $object->getActiveSheet()->setCellValue('G4', 'No HO');
    $object->getActiveSheet()->setCellValue('H4', 'Departemen');
    $object->getActiveSheet()->setCellValue('I4', 'Section');
    $object->getActiveSheet()->setCellValue('J4', 'HM Awal');
    $object->getActiveSheet()->setCellValue('K4', 'HM Terakhir');
    $object->getActiveSheet()->setCellValue('L4', 'Kondisi');
    $object->getActiveSheet()->setCellValue('M4', 'Komplain');
    $object->getActiveSheet()->setCellValue('N4', 'Dari');
    $object->getActiveSheet()->setCellValue('O4', 'Tujuan');

    $baris = 5;
    $no  = 1;

    foreach($data['laporan'] as $tr){
      $object->getActiveSheet()->setCellValue('A' . $baris, $no++);
      $object->getActiveSheet()->setCellValue('B' . $baris, $tr->nama);
      $object->getActiveSheet()->setCellValue('C' . $baris, $tr->merek);
      $object->getActiveSheet()->setCellValue('D' . $baris, date('d/m/Y', strtotime($tr->tgl_rental)) .' - '. $tr->jam_rental);
      $object->getActiveSheet()->setCellValue('E' . $baris, date('d/m/Y', strtotime($tr->tgl_kembali)) .' - '. $tr->jam_kembali);

      // (1 < 5) ? "Benar" : "Salah";

      $object->getActiveSheet()->setCellValue('F' . $baris, ($tr->tgl_pengembalian == "0000-00-00") ? "-" :  date('d/m/Y', strtotime($tr->tgl_pengembalian)) .' - '. $tr->jam_pengembalian);
      $object->getActiveSheet()->setCellValue('G' . $baris, $tr->no_telepon);
      $object->getActiveSheet()->setCellValue('H' . $baris, $tr->departement);
      $object->getActiveSheet()->setCellValue('I' . $baris, $tr->section);
      $object->getActiveSheet()->setCellValue('J' . $baris, $tr->hm_awal);
      $object->getActiveSheet()->setCellValue('K' . $baris, $tr->hm_terakhir);
      $object->getActiveSheet()->setCellValue('L' . $baris, $tr->kondisi);
      $object->getActiveSheet()->setCellValue('M' . $baris, $tr->komplain);
      $object->getActiveSheet()->setCellValue('N' . $baris, $tr->dari);
      $object->getActiveSheet()->setCellValue('O' . $baris, $tr->tujuan);

      $baris++;
    }

    $filename = "laporan_monitoring_mobil". '.xlsx';

    $object->getActiveSheet()->setTitle("Laporan Monitoring Mobil");

    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="'. $filename . '"');
    header('Cache-Control: max-age=0');

    $writer = PHPExcel_IOFactory::createWriter($object, 'Excel2007');
    $writer->save('php://output');

    exit;

  }

  public function _rules(){
    $this->form_validation->set_rules('dari', 'Dari tanggal', 'required');
    $this->form_validation->set_rules('sampai', 'Sampai tanggal', 'required');
  }


}