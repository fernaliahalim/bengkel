<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Tipe Kendaraan</h1>
            <div class="text-right" style="color:#9E9E9E;font-size:12px;">
                <footer>
                    <a class="footage_menu" href="<?= base_url(); ?>dashboard">
                        <span class="bi-house-fill"></span> Beranda
                    </a> >
                    <strong><span class="bi-gear-wide"></span> Tipe Kendaraan</strong>
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
            <table class="table table-bordered" id="tipe-kendaraan-table">
                <thead>
                    <tr>
                    <th scope="col">No.</th>
                    <th scope="col">ID Tipe Kendaraan</th>
                    <th scope="col">Nama Tipe</th>
                    <th scope="col">#</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=0; foreach($rs_tipe_kendaraan->result_array() as $row_tipe_kendaraan) { ?>
                        <tr>
                            <td><?= $i+1; ?></td>
                            <td><?= $row_tipe_kendaraan['id_tipe_kendaraan']; ?></td>
                            <td>
                                <?= $row_tipe_kendaraan['nama_tipe']; ?>
                                <input type="text" id="nama_tipe_<?= $row_tipe_kendaraan['id_tipe_kendaraan']; ?>" value="<?= $row_tipe_kendaraan['nama_tipe']; ?>" hidden/>
                            </td>
                            <td>
                                <button type="button" class="btn btn-warning btn-sm btn-update" id="<?= $row_tipe_kendaraan['id_tipe_kendaraan']; ?>">
                                    <i class="bi-pencil-fill"></i> Ubah
                                </button>
                                <button type="button" class="btn btn-danger btn-sm btn-delete" id="<?= $row_tipe_kendaraan['id_tipe_kendaraan']; ?>">
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
<div class="modal modal-tipe-kendaraan">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="form-tipe-kendaraan">
                <div class="modal-header">
                    <h5 class="modal-title modal-title-add-update"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama-modal" class="form-label">Nama Tipe Kendaraan</label>
                        <input type="text" id="id-tipe-kendaraan-modal" name="id_tipe_kendaraan" value="" hidden/>
                        <input type="text" class="form-control" id="nama-tipe-modal" name="nama_tipe" placeholder="Nama Tipe Kendaraan">
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
                    <input type="text" id="id-tipe-kendaraan-delete-modal" name="id_tipe_kendaraan" value="" hidden/>
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
        $('#tipe-kendaraan-table').DataTable();

        $('#btn-add').click(function(){
            $('.modal-title-add-update').html('Form Tambah Data Tipe Kendaraan');
            $('.btn-save-add-data').show();
            $('.btn-save-change-data').hide();
            $('#nama-tipe-modal').focus();

            $('.modal-tipe-kendaraan').modal('show');
        });

        $('.btn-save-add-data').click(function(){
            $.ajax({
                url: "<?= base_url(); ?>tipe_kendaraan/add_tipe_kendaraan",
                method: "post",
                data: $('#form-tipe-kendaraan').serialize(),
                success: function (data) {
                    location.reload();
                    $('.modal-tipe-kendaraan').modal('toggle');
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    $('.modal-tipe-kendaraan').modal('toggle');
                    $('.alert-danger').show();  
                }
            });
        }); 
        
        $('.btn-update').click(function(){
            var id = $(this).attr('id');

            $('.modal-title-add-update').html('Form Edit Data Tipe Kendaraan');
            $('#id-tipe-kendaraan-modal').val(id);
            $('#nama-tipe-modal').val($('#nama_tipe_'+id).val());

            $('.btn-save-add-data').hide();
            $('.btn-save-change-data').show();
            $('#nama-tipe-modal').focus();

            $('.modal-tipe-kendaraan').modal('show');
        });

        $('.btn-save-change-data').click(function(){
            $.ajax({
                url: "<?= base_url(); ?>tipe_kendaraan/edit_tipe_kendaraan_by_id",
                method: "post",
                data: $('#form-tipe-kendaraan').serialize(),
                success: function (data) {
                    location.reload();
                    $('.modal-tipe-kendaraan').modal('toggle');
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    $('.modal-tipe-kendaraan').modal('toggle');
                    $('.alert-danger').show();
                }
            });
        });

        $('.btn-delete').click(function(){
            var id = $(this).attr('id');

            $('#id-tipe-kendaraan-delete-modal').val(id);
            $('.modal-delete-action').modal('show');
        });

        $('.btn-save-delete-data').click(function(){
            $.ajax({
                url: "<?= base_url(); ?>tipe_kendaraan/delete_tipe_kendaraan_by_id",
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