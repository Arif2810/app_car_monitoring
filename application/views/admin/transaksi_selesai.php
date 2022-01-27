<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Transaksi Selesai</h1>
    </div>

    <?php foreach($transaksi as $tr): ?>
    <form action="<?= base_url('admin/transaksi/transaksi_selesai_aksi'); ?>" method="post">
      <input type="hidden" name="id_rental" value="<?= $tr->id_rental; ?>">
      <input type="hidden" name="id_mobil" value="<?= $tr->id_mobil; ?>">
      <input type="hidden" name="tgl_kembali" value="<?= $tr->tgl_kembali; ?>">

      <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="">Tanggal Pengembalian</label>
              <input type="date" name="tgl_pengembalian" class="form-control" value="<?= $tr->tgl_pengembalian; ?>" required>
            </div>
          </div>

          <div class="col-md-3">
            <div class="form-group">
              <label for="">Jam</label>
              <select name="jam_pengembalian" id="" class="form-control" required>
                <option value="">----</option>
                <option value="00 : 00">00 : 00</option>
                <option value="00 : 30">00 : 30</option>
                <option value="01 : 00">01 : 00</option>
                <option value="01 : 30">01 : 30</option>
                <option value="02 : 00">02 : 00</option>
                <option value="02 : 30">02 : 30</option>
                <option value="03 : 00">03 : 00</option>
                <option value="03 : 30">03 : 30</option>
                <option value="04 : 00">04 : 00</option>
                <option value="04 : 30">04 : 30</option>
                <option value="05 : 00">05 : 00</option>
                <option value="05 : 30">05 : 30</option>
                <option value="06 : 00">06 : 00</option>
                <option value="06 : 30">06 : 30</option>
                <option value="07 : 00">07 : 00</option>
                <option value="07 : 30">07 : 30</option>
                <option value="08 : 00">08 : 00</option>
                <option value="08 : 30">08 : 30</option>
                <option value="09 : 00">09 : 00</option>
                <option value="09 : 30">09 : 30</option>
                <option value="10 : 00">10 : 00</option>
                <option value="10 : 30">10 : 30</option>
                <option value="11 : 00">11 : 00</option>
                <option value="11 : 30">11 : 30</option>
                <option value="12 : 00">12 : 00</option>
                <option value="12 : 30">12 : 30</option>
              </select>
            </div>
          </div>

          <div class="col-md-3">
            <div class="form-group">
              <label for="">AM / PM</label>
              <select name="am_pm_pengembalian" id="" class="form-control" required>
                <option value="">----</option>
                <option value="AM">AM</option>
                <option value="PM">PM</option>
              </select>
            </div>
          </div>
      </div>

      <div class="form-group">
        <label for="">HM Awal</label>
        <input type="text" name="hm_awal" class="form-control" value="<?= $tr->hm_awal ?>" readonly>
      </div>

      <div class="form-group">
        <label for="">HM Terakhir</label>
        <input type="text" name="hm_terakhir" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="">Kondisi Kendaraan</label>
        <input type="text" name="kondisi" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="">Komplain</label>
        <input type="text" name="komplain" class="form-control" required>
      </div>
      <button type="submit" class="btn btn-success">Save</button>
    </form>
    <?php endforeach; ?>

  </section>
</div>