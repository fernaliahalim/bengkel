    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Pengaturan Akun</h1>
        <div class="text-right" style="color:#9E9E9E;font-size:12px;">
            <footer>
                <a class="footage_menu" href="<?= base_url(); ?>dashboard">
                    <span class="bi-house-fill"></span> Beranda
                </a> >
                <strong><span class="bi-gear-fill"></span> Pengaturan Akun</strong>
            </footer>
        </div>
       </div>
    
        <?php if(!empty($this->session->flashdata('success'))){ ?>
            <div class="alert alert-success" role="alert">
                <h4>Yeay!</h4>
                <?= $this->session->flashdata('success'); ?>
            </div>
        <?php } ?>
        <form class="base-form-control" method="post" action="<?= base_url(); ?>user/update_user_by_iduser">
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" id="id_user" name="id_user" value="<?= $id_user; ?>" hidden />
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" value="<?= $nama; ?>">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Email" value="<?= $email; ?>" disabled>
                <small id="emailHelp" class="form-text text-muted">Email tidak dapat diubah, karena terkait dengan data Unik setiap User</small>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="<?= $password; ?>">
            </div>
            <div class="form-group">
                <label for="no_telpon">No. Telpon</label>
                <input type="number" class="form-control" id="no_telpon" name="no_telpon" placeholder="No. Telpon" min="1" max="99999999999999" value="<?= $no_telpon; ?>">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <div>
        </form>
    </main>
  </div>
</div>
