<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Laporan Transaksi</h1>
    </div>

    <form action="<?= base_url('admin/laporan') ?>" method="post">
      <div class="form-group">
        <label for="">Dari Tanggal</label>
        <input type="date" name="dari" class="form-control">
        <?= form_error('dari', '<div class="text-small text-danger">', '</div>') ?>
      </div>
      <div class="form-group">
        <label for="">Sampai Tanggal</label>
        <input type="date" name="sampai" class="form-control">
        <?= form_error('sampai', '<div class="text-small text-danger">', '</div>') ?>
      </div>

      <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i> Tampilkan Data</button>
    </form>
    <hr>

    <div class="btn-group">
      <a href="<?= base_url(). 'admin/laporan/print_laporan/?dari='.set_value('dari'). '&sampai='.set_value('sampai'); ?>" class="btn btn-sm btn-success" target="_blank"><i class="fas fa-print"></i> Print</a>
    </div>

    <table class="table table-responsive table-bordered table-striped mt-3">
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
        <th>Status Pengembalian</th>
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
        <td><?= $tr->tgl_rental; ?> <br> <?= $tr->jam_rental; ?></td>
        <td><?= $tr->tgl_kembali; ?> <br> <?= $tr->jam_kembali; ?></td>
        <td>
          <?php if($tr->tgl_pengembalian == "0000-00-00"){
            echo "-";
          }else{
            echo date('d/m/Y', strtotime($tr->tgl_pengembalian)) .' <br> '. $tr->jam_pengembalian;
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

  </section>
</div>