<h3 style="text-align: center;">Laporan Transaksi Monitoring Mobil</h3>

<table>
  <tr>
    <td>Dari Tanggal</td>
    <td>:</td>
    <td><?= date('d-M-Y', strtotime($_GET['dari'])); ?></td>
  </tr>
  <tr>
    <td>Sampai Tanggal</td>
    <td>:</td>
    <td><?= date('d-M-Y', strtotime($_GET['sampai'])); ?></td>
  </tr>
</table>

<table class="table table-bordered table-striped mt-3">
  <tr>
    <th>No</th>
    <th>Nama Driver</th>
    <th>Jenis Mobil</th>
    <th>Tgl. Digunakan</th>
    <th>Tgl. Kembali</th>
    <th>Tgl. Dikembalikan</th>
    <th>No. HP</th>
    <th>Departement</th>
    <th>Section</th>
    <th>HM Awal</th>
    <th>HM Terakhir</th>
    <th>Kondisi</th>
    <th>Komplain</th>
    <th>Dari</th>
    <th>Tujuan</th>
  </tr>

  <?php 
  $no = 1;
  foreach($laporan as $tr): ?>
  <tr>
    <td><?= $no++; ?></td>
    <td><?= $tr->nama; ?></td>
    <td><?= $tr->merek; ?></td>
    <td><?= date('d/m/Y', strtotime($tr->tgl_rental)); ?> - <?= $tr->jam_rental; ?></td>
    <td><?= date('d/m/Y', strtotime($tr->tgl_kembali)); ?> - <?= $tr->jam_kembali; ?></td>
    <td>
      <?php if($tr->tgl_pengembalian == "0000-00-00"){
        echo "-";
      }else{
        echo date('d/m/Y', strtotime($tr->tgl_pengembalian)) .' - '. $tr->jam_pengembalian;
      } ?>
    </td>
    <td><?= $tr->no_telepon; ?></td>
    <td><?= $tr->departement; ?></td>
    <td><?= $tr->section; ?></td>
    <td><?= $tr->hm_awal; ?></td>
    <td><?= $tr->hm_terakhir; ?></td>
    <td><?= $tr->kondisi; ?></td>
    <td><?= $tr->komplain; ?></td>
    <td><?= $tr->dari; ?></td>
    <td><?= $tr->tujuan; ?></td>
  </tr>

  <?php endforeach; ?>
</table>

<script>
  window.print();
</script>