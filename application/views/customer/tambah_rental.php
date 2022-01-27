<div class="container">
  <div style="height: 150px;"></div>
  <div class="card">
    <card class="card-header">
      Form Penggunaan Mobil
    </card> 
    <div class="card-body">
      <?php foreach($detail as $dt): ?>
      <form action="<?= base_url('customer/rental/tambah_rental_aksi') ?>" method="post">
        
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="">Tanggal Digunakan</label>
              <input type="hidden" name="id_mobil" value="<?= $dt->id_mobil; ?>">
              <input type="date" name="tgl_rental" class="form-control" required>
            </div>
          </div>

          <div class="col-md-3">
            <div class="form-group">
              <label for="">Jam</label>
              <select name="jam_pakai" id="" class="form-control" required>
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
              <select name="am_pm_pakai" id="" class="form-control" required>
                <option value="">----</option>
                <option value="AM">AM</option>
                <option value="PM">PM</option>
              </select>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="">Tanggal Kembali</label>
              <input type="date" name="tgl_kembali" class="form-control" required>
            </div>
          </div>

          <div class="col-md-3">
            <div class="form-group">
              <label for="">Jam</label>
              <select name="jam_kembali" id="" class="form-control" required>
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
              <select name="am_pm_kembali" id="" class="form-control" required>
                <option value="">----</option>
                <option value="AM">AM</option>
                <option value="PM">PM</option>
              </select>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="">Dari</label>
          <input type="text" name="dari" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="">Tujuan</label>
          <input type="text" name="tujuan" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="">HM Awal</label>
          <input type="text" name="hm_awal" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Gunakan</button>
      </form>
      <?php endforeach; ?>
    </div>
  </div>
</div>

<div style="height: 180px;"></div>