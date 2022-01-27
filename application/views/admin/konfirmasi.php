<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Konfirmasi</h1>
    </div>
    <div class="card" style="width: 55%;">
      <div class="card-header">
        Konfirmasi
      </div>
      <center class="card-body">
        <form action="<?= base_url('admin/transaksi/cek_konfirmasi'); ?>" method="post">
          <?php foreach($konfirmasi as $row): ?>
            <div class="custom-control custom-switch ml-3">
              <input type="hidden" class="custom-control-input" value="<?= $row->id_rental ?>" name="id_rental">
              <input type="checkbox" class="custom-control-input" id="customSwitch1" value="ACC" name="status_rental">
              <label class="custom-control-label" for="customSwitch1">Konfirmasi</label>
            </div>
            <hr>
            <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
          <?php endforeach; ?>
        </form>
      </center>
    </div>
  </section>
</div>