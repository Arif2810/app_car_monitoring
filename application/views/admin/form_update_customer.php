<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Form Update Customer</h1>
    </div>

    <?php foreach($customer as $cs): ?>
    <form action="<?= base_url('admin/data_customer/update_customer_aksi') ?>" method="post">
      <div class="form-group"> 
        <label for="">Nama</label>
        <input type="hidden" name="id_customer" value="<?= $cs->id_customer; ?>">
        <input type="text" name="nama" class="form-control" value="<?= $cs->nama; ?>">
        <?= form_error('nama', '<div class="text-small text-danger">', '</div>') ?>
      </div>
      <div class="form-group"> 
        <label for="">Username</label>
        <input type="text" name="username" class="form-control" value="<?= $cs->username; ?>">
        <?= form_error('username', '<div class="text-small text-danger">', '</div>') ?>
      </div>
      <div class="form-group"> 
        <label for="">No. Telepon</label>
        <input type="text" name="no_telepon" class="form-control" value="<?= $cs->no_telepon; ?>">
        <?= form_error('no_telepon', '<div class="text-small text-danger">', '</div>') ?>
      </div>
      <div class="form-group"> 
        <label for="">Departement</label>
        <input type="text" name="departement" class="form-control" value="<?= $cs->departement; ?>">
        <?= form_error('departement', '<div class="text-small text-danger">', '</div>') ?>
      </div>
      <div class="form-group"> 
        <label for="">Section</label>
        <input type="text" name="section" class="form-control" value="<?= $cs->section; ?>">
        <?= form_error('section', '<div class="text-small text-danger">', '</div>') ?>
      </div>


      <div class="form-group"> 
        <label for="">Password</label>
        <input type="password" name="password" class="form-control" value="<?= $cs->password; ?>">
        <?= form_error('password', '<div class="text-small text-danger">', '</div>') ?>
      </div>

      <button type="submit" class="btn btn-primary">Simpan</button>
      <button type="reset" class="btn btn-warning">Reset</button>

    </form>
    <?php endforeach; ?>

  </section>
</div>