<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Detail Mobil</h1>
    </div>
  </section>
 
  <?php foreach($detail as $dt): ?>
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-md-5">
            <img width="110%;" src="<?= base_url('assets/upload/'). $dt->gambar; ?>" alt="">
          </div>
          <div class="col-md-7">
            <table class="table">
              <tr>
                <td>Tipe Mobil</td>
                <td>
                  <?= $dt->tipe; ?>
                </td>
              </tr>
              <tr>
                <td>Merek</td>
                <td><?= $dt->merek; ?></td>
              </tr>
              <tr>
                <td>No. Plat</td>
                <td><?= $dt->no_plat; ?></td>
              </tr>
              <tr>
                <td>Warna</td>
                <td><?= $dt->warna; ?></td>
              </tr>
              <tr>
                <td>Tahun</td>
                <td><?= $dt->tahun; ?></td>
              </tr>
              <tr>
                <td>Vendor</td>
                <td><?= $dt->vendor; ?></td>
              </tr>
              <tr>
                <td>Status</td>
                <td>
                  <?php
                  if($dt->status == "0"){ ?>
                    <span class="badge badge-danger">Tidak Tersedia</span>                 
                  <?php }
                  else{ ?>
                    <span class="badge badge-primary">Tersedia</span>
                  <?php } ?>
                </td>
              </tr>
              <tr>
                <td>AC</td>
                <td>
                  <?php
                  if($dt->ac == "0"){ ?>
                    <span class="badge badge-danger">Tidak Tersedia</span>                 
                  <?php }
                  else{ ?>
                    <span class="badge badge-primary">Tersedia</span>
                  <?php } ?>
                </td>
              </tr>
              <tr>
                <td>MP3 Player</td>
                <td>
                  <?php
                  if($dt->mp3_player == "0"){ ?>
                    <span class="badge badge-danger">Tidak Tersedia</span>                 
                  <?php }
                  else{ ?>
                    <span class="badge badge-primary">Tersedia</span>
                  <?php } ?>
                </td>
              </tr>
              <tr>
                <td>Central Lock</td>
                <td>
                  <?php
                  if($dt->central_lock == "0"){ ?>
                    <span class="badge badge-danger">Tidak Tersedia</span>                 
                  <?php }
                  else{ ?>
                    <span class="badge badge-primary">Tersedia</span>
                  <?php } ?>
                </td>
              </tr>
              <tr>
                <td>Tanggal Commisioning</td>
                <td><?= $dt->tgl_commisioning; ?></td>
              </tr>
              <tr>
                <td>Tanggal mMintenance Weekly</td>
                <td><?= $dt->maintenance_weekly; ?></td>
              </tr>
              <tr>
                <td>Tanggal Maintenance Monthly</td>
                <td><?= $dt->maintenance_monthly; ?></td>
              </tr>
            </table>

            <a href="<?= base_url('admin/data_mobil'); ?>" class="btn btn-sm btn-danger ml-4">Kembali</a>
            <a href="<?= base_url('admin/data_mobil/update_mobil/').$dt->id_mobil; ?>" class="btn btn-sm btn-primary">Update</a>
          </div>
        </div>
      </div>
    </div>

  <?php endforeach; ?>
</div>