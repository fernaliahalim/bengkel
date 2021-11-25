<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Daftar User</h1>
            <div class="text-right" style="color:#9E9E9E;font-size:12px;">
                <footer>
                    <a class="footage_menu" href="<?= base_url(); ?>dashboard">
                        <span class="bi-house-fill"></span> Beranda
                    </a> >
                    <strong><span class="bi-people-fill"></span> Daftar User</strong>
                </footer>
            </div>
        </div>

        <a href="#" class="float" id="btn-add" data-toggle="modal" data-target="#modal-product">
            <i class="bi-plus my-float"></i>
        </a>

        <?php if(!empty($this->session->flashdata('success'))){ ?>
            <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Yeay!</h4>
                <p><?= $this->session->flashdata('success'); ?></p>
            </div>
        <?php } ?>

        <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">Ooopss!</h4>
            <p>Perubahan data tidak berhasil dilakukan</p>
        </div>
        
        <div class="table-responsive">
            <table class="table table-bordered" id="user-table">
                <thead>
                    <tr>
                    <th scope="col">No.</th>
                    <th scope="col">ID User</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>
                    <th scope="col">No. Telpon</th>
                    <th scope="col">Role</th>
                    <th scope="col">#</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=0; foreach($rs_user->result_array() as $row_user) { ?>
                        <tr>
                            <td><?= $i+1; ?></td>
                            <td><?= $row_user['id_user']; ?></td>
                            <td>
                                <?= $row_user['nama']; ?>
                                <input type="text" id="nama_<?= $row_user['id_user']; ?>" value="<?= $row_user['nama']; ?>" hidden/>
                            </td>
                            <td>
                                <?= $row_user['email']; ?>
                                <input type="text" id="email_<?= $row_user['id_user']; ?>" value="<?= $row_user['email']; ?>" hidden/>
                            </td>
                            <td>
                                <?= $row_user['password']; ?>
                                <input type="text" id="password_<?= $row_user['id_user']; ?>" value="<?= $row_user['password']; ?>" hidden/>
                            </td>
                            <td>
                                <?= $row_user['no_telpon']; ?>
                                <input type="text" id="no_telpon_<?= $row_user['id_user']; ?>" value="<?= $row_user['no_telpon']; ?>" hidden/>
                            </td>
                            <td>
                                <?= $row_user['role_name']; ?>
                                <input type="text" id="id_role_<?= $row_user['id_user']; ?>" value="<?= $row_user['id_role']; ?>" hidden/>
                            </td>
                            <td>
                                <button type="button" class="btn btn-warning btn-sm btn-update" id="<?= $row_user['id_user']; ?>">
                                    <i class="bi-pencil-fill"></i> Ubah
                                </button>
                                <button type="button" class="btn btn-danger btn-sm btn-delete" id="<?= $row_user['id_user']; ?>">
                                    <i class="bi-trash-fill"></i> Hapus
                                </button>
                            </td>
                        </tr>
                    <?php $i++; } ?>
                </tbody>
            </table>
        </div>
       
    </main>
  </div>
</div>

<!-- Modal -->
<div class="modal modal-user">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="form-user">
                <div class="modal-header">
                    <h5 class="modal-title modal-title-add-update"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama-modal" class="form-label">Nama</label>
                        <input type="text" id="id-user-modal" name="id_user" value="" hidden/>
                        <input type="text" class="form-control" id="nama-modal" name="nama" placeholder="Nama">
                    </div>
                    <div class="mb-3">
                        <label for="email-modal" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email-modal" name="email" placeholder="user@email.com">
                    </div>
                    <div class="mb-3">
                        <label for="password-modal" class="form-label">Password</label>
                        <input type="text" class="form-control" id="password-modal" name="password" placeholder="Password">
                    </div>
                    <div class="mb-3">
                        <label for="no_telpon-modal" class="form-label">No. Telpon</label>
                        <input type="text" class="form-control" id="no_telpon-modal" name="no_telpon" placeholder="No. Telpon">
                    </div>
                    <div class="mb-3">
                        <label for="role-modal" class="form-label">Role</label>
                        <select class="form-select" id="role-modal" name="id_role" aria-label="Role">
                            <option value="" selected>---Silahkan Pilih User Role---</option>
                            <?php $i=0; foreach($rs_role->result_array() as $row_role) { ?>
                                <option value="<?= $row_role['id_role']; ?>"><?= $row_role['role_name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary btn-save-add-data">Simpan</button>
                    <button type="button" class="btn btn-primary btn-save-change-data">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal modal-delete-action">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="form-product-delete-action">
                <div class="modal-header">
                    <h5 class="modal-title modal-title-add-update">Peringatan!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="text" id="id-user-delete-modal" name="id_user" value="" hidden/>
                    Apakah Anda yakin untuk menghapus data ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                    <button type="button" class="btn btn-primary btn-save-delete-data">Ya</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready( function () {
        $('.alert-danger').hide();
        $('#user-table').DataTable();

        $('#btn-add').click(function(){
            $('.modal-title-add-update').html('Form Tambah Data User');
            $('.btn-save-add-data').show();
            $('.btn-save-change-data').hide();
            $('#nama-modal').focus();

            $('.modal-user').modal('show');
        });

        $('.btn-save-add-data').click(function(){
            $.ajax({
                url: "<?= base_url(); ?>user/add_user",
                method: "post",
                data: $('#form-user').serialize(),
                success: function (data) {
                    location.reload();
                    $('.modal-user').modal('toggle');
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    $('.modal-user').modal('toggle');
                    $('.alert-danger').show();  
                }
            });
        }); 
        
        $('.btn-update').click(function(){
            var id = $(this).attr('id');

            $('.modal-title-add-update').html('Form Edit Data User');
            $('#id-user-modal').val(id);
            $('#nama-modal').val($('#nama_'+id).val());
            $('#email-modal').val($('#email_'+id).val());
            $('#password-modal').val($('#password_'+id).val());
            $('#no_telpon-modal').val($('#no_telpon_'+id).val());
            $('#role-modal').val($('#id_role_'+id).val()).change();

            $('.btn-save-add-data').hide();
            $('.btn-save-change-data').show();
            $('#nama-modal').focus();

            $('.modal-user').modal('show');
        });

        $('.btn-save-change-data').click(function(){
            $.ajax({
                url: "<?= base_url(); ?>user/edit_user_by_id",
                method: "post",
                data: $('#form-user').serialize(),
                success: function (data) {
                    location.reload();
                    $('.modal-user').modal('toggle');
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    $('.modal-user').modal('toggle');
                    $('.alert-danger').show();
                }
            });
        });

        $('.btn-delete').click(function(){
            var id = $(this).attr('id');

            $('#id-user-delete-modal').val(id);
            $('.modal-delete-action').modal('show');
        });

        $('.btn-save-delete-data').click(function(){
            $.ajax({
                url: "<?= base_url(); ?>user/delete_user_by_id",
                method: "post",
                data: $('#form-product-delete-action').serialize(),
                success: function (data) {
                    location.reload();
                    $('.modal-delete-action').modal('toggle');
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    $('.modal-delete-action').modal('toggle');
                    $('.alert-danger').show();
                }
            });
        });
    });
</script>