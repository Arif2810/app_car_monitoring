<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Data Transaksi</h1>
    </div>

    <table class="table table-responsive table-bordered table-striped">
      <tr>
        <th>No</th>
        <th>Customer</th>
        <th>Nama Driver</th>
        <th>Dari</th>
        <th>Mobil</th>
        <th>Tujuan</th>
        <th>Tgl. Digunakan</th>
        <th>Tgl. Kembali</th>
        <th>Tgl. Dikembalikan</th>
        <th>Konfirmasi</th>
        <th>Status Pengembalian</th>
        <th>Action</th>
      </tr>

      <?php 
      $no = 1;
      foreach($transaksi as $tr): ?>
      <tr>
        <td><?= $no++; ?></td>
        <td><?= $tr->departement; ?></td>
        <td><?= $tr->nama; ?></td>
        <td><?= $tr->dari; ?></td>
        <td><?= $tr->merek; ?></td>
        <td><?= $tr->tujuan; ?></td>
        <td><?= date('d/m/Y', strtotime($tr->tgl_rental)); ?> <br> <?= $tr->jam_rental; ?></td>
        <td><?= date('d/m/Y', strtotime($tr->tgl_kembali)); ?> <br> <?= $tr->jam_kembali; ?></td>
        <td>
          <?php if($tr->tgl_pengembalian == "0000-00-00"){
            echo "-";
          }else{
            echo date('d/m/Y', strtotime($tr->tgl_pengembalian)) . ' <br> ' .$tr->jam_pengembalian;
          } ?>
        </td>

        <td>
          <center>
            <?php if($tr->status_rental == "Pending"){ ?>
              <a class="btn btn-sm btn-primary" href="<?= base_url('admin/transaksi/konfirmasi/'.$tr->id_rental); ?>"><i class="fas fa-check-circle"></i></a>
            <?php }
            else{ ?>
              <button class="btn btn-sm btn-danger"><i class="fas fa-times-circle"></i></button>
            <?php } ?>
          </center>
        </td>

        <td>
          <?php if($tr->tgl_pengembalian == "0000-00-00"){
            echo "Belum Selesai";
          }else{
            echo "Selesai";
          }?>
        </td>
        
        <td>
          <?php if($tr->status_pengembalian == "Kembali"){
            echo "-";
          }
          elseif($tr->status_rental == "Pending"){ ?>
            <div class="row">
              <a onclick="return confirm('Yakin batal?')" class="btn btn-sm btn-danger" href="<?= base_url('admin/transaksi/batal_transaksi/'.$tr->id_rental) ?>"><i class="fas fa-times"></i></a>
            </div>
          <?php }
          else{ ?>
            <div class="row">
              <a class="btn btn-sm btn-success mr-2" href="<?= base_url('admin/transaksi/transaksi_selesai/'.$tr->id_rental) ?>"><i class="fas fa-check"></i></a>
              <a onclick="return confirm('Yakin batal?')" class="btn btn-sm btn-danger" href="<?= base_url('admin/transaksi/batal_transaksi/'.$tr->id_rental) ?>"><i class="fas fa-times"></i></a>
            </div>
          <?php } ?>
        </td>
      </tr>

      <?php endforeach; ?>
    </table>
  </section>
</div>