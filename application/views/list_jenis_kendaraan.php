<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Jenis Kendaraan</h1>
            <div class="text-right" style="color:#9E9E9E;font-size:12px;">
                <footer>
                    <a class="footage_menu" href="<?= base_url(); ?>dashboard">
                        <span class="bi-house-fill"></span> Beranda
                    </a> >
                    <strong><span class="bi-truck"></span> Jenis Kendaraan</strong>
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
            <table class="table table-bordered" id="jenis-kendaraan-table">
                <thead>
                    <tr>
                    <th scope="col">No.</th>
                    <th scope="col">ID Jenis Kendaraan</th>
                    <th scope="col">Nama Jenis</th>
                    <th scope="col">#</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=0; foreach($rs_jenis_kendaraan->result_array() as $row_jenis_kendaraan) { ?>
                        <tr>
                            <td><?= $i+1; ?></td>
                            <td><?= $row_jenis_kendaraan['id_jenis_kendaraan']; ?></td>
                            <td>
                                <?= $row_jenis_kendaraan['nama_jenis']; ?>
                                <input type="text" id="nama_jenis_<?= $row_jenis_kendaraan['id_jenis_kendaraan']; ?>" value="<?= $row_jenis_kendaraan['nama_jenis']; ?>" hidden/>
                            </td>
                            <td>
                                <button type="button" class="btn btn-warning btn-sm btn-update" id="<?= $row_jenis_kendaraan['id_jenis_kendaraan']; ?>">
                                    <i class="bi-pencil-fill"></i> Ubah
                                </button>
                                <button type="button" class="btn btn-danger btn-sm btn-delete" id="<?= $row_jenis_kendaraan['id_jenis_kendaraan']; ?>">
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
<div class="modal modal-jenis-kendaraan">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="form-jenis-kendaraan">
                <div class="modal-header">
                    <h5 class="modal-title modal-title-add-update"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama-modal" class="form-label">Nama Jenis Kendaraan</label>
                        <input type="text" id="id-jenis-kendaraan-modal" name="id_jenis_kendaraan" value="" hidden/>
                        <input type="text" class="form-control" id="nama-jenis-modal" name="nama_jenis" placeholder="Nama Jenis Kendaraan">
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
                    <input type="text" id="id-jenis-kendaraan-delete-modal" name="id_jenis_kendaraan" value="" hidden/>
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
        $('#jenis-kendaraan-table').DataTable();

        $('#btn-add').click(function(){
            $('.modal-title-add-update').html('Form Tambah Data Jenis Kendaraan');
            $('.btn-save-add-data').show();
            $('.btn-save-change-data').hide();
            $('#nama-jenis-modal').focus();

            $('.modal-jenis-kendaraan').modal('show');
        });

        $('.btn-save-add-data').click(function(){
            $.ajax({
                url: "<?= base_url(); ?>jenis_kendaraan/add_jenis_kendaraan",
                method: "post",
                data: $('#form-jenis-kendaraan').serialize(),
                success: function (data) {
                    location.reload();
                    $('.modal-jenis-kendaraan').modal('toggle');
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    $('.modal-jenis-kendaraan').modal('toggle');
                    $('.alert-danger').show();  
                }
            });
        }); 
        
        $('.btn-update').click(function(){
            var id = $(this).attr('id');

            $('.modal-title-add-update').html('Form Edit Data Jenis Kendaraan');
            $('#id-jenis-kendaraan-modal').val(id);
            $('#nama-jenis-modal').val($('#nama_jenis_'+id).val());

            $('.btn-save-add-data').hide();
            $('.btn-save-change-data').show();
            $('#nama-jenis-modal').focus();

            $('.modal-jenis-kendaraan').modal('show');
        });

        $('.btn-save-change-data').click(function(){
            $.ajax({
                url: "<?= base_url(); ?>jenis_kendaraan/edit_jenis_kendaraan_by_id",
                method: "post",
                data: $('#form-jenis-kendaraan').serialize(),
                success: function (data) {
                    location.reload();
                    $('.modal-jenis-kendaraan').modal('toggle');
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    $('.modal-jenis-kendaraan').modal('toggle');
                    $('.alert-danger').show();
                }
            });
        });

        $('.btn-delete').click(function(){
            var id = $(this).attr('id');

            $('#id-jenis-kendaraan-delete-modal').val(id);
            $('.modal-delete-action').modal('show');
        });

        $('.btn-save-delete-data').click(function(){
            $.ajax({
                url: "<?= base_url(); ?>jenis_kendaraan/delete_jenis_kendaraan_by_id",
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