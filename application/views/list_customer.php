<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Customer</h1>
            <div class="text-right" style="color:#9E9E9E;font-size:12px;">
                <footer>
                    <a class="footage_menu" href="<?= base_url(); ?>dashboard">
                        <span class="bi-house-fill"></span> Beranda
                    </a> >
                    <strong><span class="bi-people-fill"></span> Customer</strong>
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
            <table class="table table-bordered" id="customer-table">
                <thead>
                    <tr>
                    <th scope="col">No.</th>
                    <th scope="col">ID Customer</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">No. Telpon</th>
                    <th scope="col">No. STNK</th>
                    <th scope="col">Jenis Kendaraan</th>
                    <th scope="col">Tipe Kendaraan</th>
                    <th scope="col">Note</th>
                    <th scope="col">#</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=0; foreach($rs_customer->result_array() as $row_customer) { ?>
                        <tr>
                            <td><?= $i+1; ?></td>
                            <td><?= $row_customer['id_customer']; ?></td>
                            <td>
                                <?= $row_customer['nama']; ?>
                                <input type="text" id="nama_<?= $row_customer['id_customer']; ?>" value="<?= $row_customer['nama']; ?>" hidden/>
                            </td>
                            <td>
                                <?= $row_customer['alamat']; ?>
                                <input type="text" id="alamat_<?= $row_customer['id_customer']; ?>" value="<?= $row_customer['alamat']; ?>" hidden/>
                            </td>
                            <td>
                                <?= $row_customer['no_telpon']; ?>
                                <input type="text" id="no_telpon_<?= $row_customer['id_customer']; ?>" value="<?= $row_customer['no_telpon']; ?>" hidden/>
                            </td>
                            <td>
                                <?= $row_customer['no_stnk']; ?>
                                <input type="text" id="no_stnk_<?= $row_customer['id_customer']; ?>" value="<?= $row_customer['no_stnk']; ?>" hidden/>
                            </td>
                            <td>
                                <?= $row_customer['nama_jenis']; ?>
                                <input type="text" id="jenis_<?= $row_customer['id_customer']; ?>" value="<?= $row_customer['id_jenis_kendaraan']; ?>" hidden/>
                            </td>
                            <td>
                                <?= $row_customer['nama_tipe']; ?>
                                <input type="text" id="tipe_<?= $row_customer['id_customer']; ?>" value="<?= $row_customer['id_tipe_kendaraan']; ?>" hidden/>
                            </td>
                            <td>
                                <?= $row_customer['note']; ?>
                                <input type="text" id="note_<?= $row_customer['id_customer']; ?>" value="<?= $row_customer['note']; ?>" hidden/>
                            </td>
                            <td>
                                <button type="button" class="btn btn-warning btn-sm btn-update" id="<?= $row_customer['id_customer']; ?>">
                                    <i class="bi-pencil-fill"></i> Ubah
                                </button>
                                <button type="button" class="btn btn-danger btn-sm btn-delete" id="<?= $row_customer['id_customer']; ?>">
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
<div class="modal modal-customer">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="form-customer">
                <div class="modal-header">
                    <h5 class="modal-title modal-title-add-update"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama-modal" class="form-label">Nama</label>
                        <input type="text" id="id-customer-modal" name="id_customer" value="" hidden/>
                        <input type="text" class="form-control" id="nama-modal" name="nama" placeholder="Nama">
                    </div>
                    <div class="mb-3">
                        <label for="alamat-modal" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamat-modal" name="alamat" placeholder="Alamat">
                    </div>
                    <div class="mb-3">
                        <label for="telpon-modal" class="form-label">No. Telpon</label>
                        <input type="text" class="form-control" id="telpon-modal" name="no_telpon" placeholder="No. Telpon">
                    </div>
                    <div class="mb-3">
                        <label for="stnk-modal" class="form-label">No. STNK</label>
                        <input type="text" class="form-control" id="stnk-modal" name="no_stnk" placeholder="No. STNK">
                    </div>
                    <div class="mb-3">
                        <label for="jenis-modal" class="form-label">Jenis Kendaraan</label>
                        <select class="form-select" id="jenis-modal" name="id_jenis_kendaraan" aria-label="Jenis Kendaraan">
                            <option value="" selected>---Silahkan Pilih Jenis Kendaraan---</option>
                            <?php $i=0; foreach($rs_jenis_kendaraan->result_array() as $row_jenis_kendaraan) { ?>
                                <option value="<?= $row_jenis_kendaraan['id_jenis_kendaraan']; ?>"><?= $row_jenis_kendaraan['nama_jenis']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tipe-modal" class="form-label">Tipe Kendaraan</label>
                        <select class="form-select" id="tipe-modal" name="id_tipe_kendaraan" aria-label="Tipe Kendaraan">
                            <option value="" selected>---Silahkan Pilih Tipe Kendaraan---</option>
                            <?php $i=0; foreach($rs_tipe_kendaraan->result_array() as $row_tipe_kendaraan) { ?>
                                <option value="<?= $row_tipe_kendaraan['id_tipe_kendaraan']; ?>"><?= $row_tipe_kendaraan['nama_tipe']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="note-modal" class="form-label">Note Kendaraan</label>
                        <input type="text" class="form-control" id="note-modal" name="note" placeholder="Note terkait kendaraan">
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
                    <input type="text" id="id-customer-delete-modal" name="id_customer" value="" hidden/>
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
        $('#customer-table').DataTable();

        $('#btn-add').click(function(){
            $('.modal-title-add-update').html('Form Tambah Data Customer');
            $('.btn-save-add-data').show();
            $('.btn-save-change-data').hide();
            $('#nama-modal').focus();

            $('.modal-customer').modal('show');
        });

        $('.btn-save-add-data').click(function(){
            $.ajax({
                url: "<?= base_url(); ?>customer/add_customer",
                method: "post",
                data: $('#form-customer').serialize(),
                success: function (data) {
                    location.reload();
                    $('.modal-customer').modal('toggle');
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    $('.modal-customer').modal('toggle');
                    $('.alert-danger').show();  
                }
            });
        }); 
        
        $('.btn-update').click(function(){
            var id = $(this).attr('id');

            $('.modal-title-add-update').html('Form Edit Data Customer');
            $('#id-customer-modal').val(id);
            $('#nama-modal').val($('#nama_'+id).val());
            $('#alamat-modal').val($('#alamat_'+id).val());
            $('#telpon-modal').val($('#no_telpon_'+id).val());
            $('#stnk-modal').val($('#no_stnk_'+id).val());
            $('#jenis-modal').val($('#jenis_'+id).val()).change();
            $('#tipe-modal').val($('#tipe_'+id).val()).change();
            $('#note-modal').val($('#note_'+id).val());

            $('.btn-save-add-data').hide();
            $('.btn-save-change-data').show();
            $('#nama-modal').focus();

            $('.modal-customer').modal('show');
        });

        $('.btn-save-change-data').click(function(){
            $.ajax({
                url: "<?= base_url(); ?>customer/edit_customer_by_id",
                method: "post",
                data: $('#form-customer').serialize(),
                success: function (data) {
                    location.reload();
                    $('.modal-customer').modal('toggle');
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    $('.modal-customer').modal('toggle');
                    $('.alert-danger').show();
                }
            });
        });

        $('.btn-delete').click(function(){
            var id = $(this).attr('id');

            $('#id-customer-delete-modal').val(id);
            $('.modal-delete-action').modal('show');
        });

        $('.btn-save-delete-data').click(function(){
            $.ajax({
                url: "<?= base_url(); ?>customer/delete_customer_by_id",
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