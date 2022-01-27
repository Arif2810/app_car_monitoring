<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Form Update Data Mobil</h1>
    </div>

    <div class="card">
      <div class="card-body">

        <?php foreach($mobil as $mb): ?>

        <form action="<?= base_url('admin/data_mobil/update_mobil_aksi') ?>" enctype="multipart/form-data" method="post">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="">Tipe Mobil</label>
                <input type="hidden" name="id_mobil" value="<?= $mb->id_mobil; ?>">
                <select name="kode_tipe" id="" class="form-control">
                  <option value="<?= $mb->kode_tipe ?>"><?= $mb->nama_tipe ?></option>
                  <?php foreach($tipe as $tp): ?>
                  <option value="<?= $tp->kode_tipe ?>"><?= $tp->nama_tipe; ?></option>
                  <?php endforeach; ?>
                </select>
                <?= form_error('kode_tipe', '<div class="text-small text-danger">', '</div>') ?>
              </div>

              <div class="form-group">
                <label for="">Merek</label>
                <input type="text" name="merek" class="form-control" value="<?= $mb->merek ?>">
                <?= form_error('merek', '<div class="text-small text-danger">', '</div>') ?>
              </div>

              <div class="form-group">
                <label for="">Nomor Plat</label>
                <input type="text" name="no_plat" class="form-control" value="<?= $mb->no_plat ?>">
                <?= form_error('no_plat', '<div class="text-small text-danger">', '</div>') ?>
              </div>

              <div class="form-group">
                <label for="">Warna</label>
                <input type="text" name="warna" class="form-control" value="<?= $mb->warna ?>">
                <?= form_error('warna', '<div class="text-small text-danger">', '</div>') ?>
              </div>

              <div class="form-group">
                <label for="">AC</label>
                <select name="ac" id="" class="form-control">
                  <option <?php if($mb->ac == "1"){echo "selected='selected'";} echo $mb->ac; ?> value="1">Tersedia</option>
                  <option <?php if($mb->ac == "0"){echo "selected='selected'";} echo $mb->ac; ?> value="0">Tidak Tersedia</option>
                </select>
                <?= form_error('ac', '<div class="text-small text-danger">', '</div>') ?>
              </div>

              <div class="form-group">
                <label for="">MP3 Player</label>
                <select name="mp3_player" id="" class="form-control">
                  <option <?php if($mb->mp3_player == "1"){echo "selected='selected'";} echo $mb->mp3_player; ?> value="1">Tersedia</option>
                  <option <?php if($mb->mp3_player == "0"){echo "selected='selected'";} echo $mb->mp3_player; ?> value="0">Tidak Tersedia</option>
                </select>
                <?= form_error('mp3_player', '<div class="text-small text-danger">', '</div>') ?>
              </div>
              
              <div class="form-group">
                <label for=""> Central Lock</label>
                <select name="central_lock" id="" class="form-control">
                  <option <?php if($mb->central_lock == "1"){echo "selected='selected'";} echo $mb->central_lock; ?> value="1">Tersedia</option>
                  <option <?php if($mb->central_lock == "0"){echo "selected='selected'";} echo $mb->central_lock; ?> value="0">Tidak Tersedia</option>
                </select>
                <?= form_error('central_lock', '<div class="text-small text-danger">', '</div>') ?>
              </div>

              <div class="form-group">
                <label for="">Tahun</label>
                <input type="text" name="tahun" class="form-control" value="<?= $mb->tahun ?>">
                <?= form_error('tahun', '<div class="text-small text-danger">', '</div>') ?>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="">Vendor</label>
                <input type="text" name="vendor" class="form-control" value="<?= $mb->vendor ?>">
                <?= form_error('vendor', '<div class="text-small text-danger">', '</div>') ?>
              </div>

              <div class="form-group">
                <label for="">Status</label>
                <select name="status" id="" class="form-control">
                  <option <?php if($mb->status == "1"){echo "selected='selected'";} echo $mb->status; ?> value="1">Tersedia</option>
                  <option <?php if($mb->status == "0"){echo "selected='selected'";} echo $mb->status; ?> value="0">Tidak Tersedia</option>
                </select>
                <?= form_error('status', '<div class="text-small text-danger">', '</div>') ?>
              </div>

              <div class="form-group">
                <label for="">Tanggal Commisioning Mobil</label>
                <input type="text" name="tgl_commisioning" class="form-control" value="<?= $mb->tgl_commisioning ?>">
                <?= form_error('tgl_commisioning', '<div class="text-small text-danger">', '</div>') ?>
              </div>
              
              <div class="form-group">
                <label for="">Tanggal Maintenance Weekly</label>
                <input type="text" name="maintenance_weekly" class="form-control" value="<?= $mb->maintenance_weekly ?>">
                <?= form_error('maintenance_weekly', '<div class="text-small text-danger">', '</div>') ?>
              </div>
              
              <div class="form-group">
                <label for="">Tanggal Maintenance Monthly</label>
                <input type="text" name="maintenance_monthly" class="form-control" value="<?= $mb->maintenance_monthly ?>">
                <?= form_error('maintenance_monthly', '<div class="text-small text-danger">', '</div>') ?>
              </div>

              <div class="form-group">
                <label for="">Gambar</label>
                <input type="file" name="gambar" class="form-control">
              </div>
              
              <div class="form-group">
                <label for="">Dokumen</label>
                <input type="file" name="dokumen" class="form-control">
              </div>

              <button type="submit" class="btn btn-primary mt-4">Simpan</button>
              <button type="reset" class="btn btn-success mt-4">Reset</button>
            </div>
          </div>
        </form>

        <?php endforeach; ?>
      </div>
    </div>

  </section>
</div>