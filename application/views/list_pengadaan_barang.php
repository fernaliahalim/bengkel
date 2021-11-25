<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Pengadaan Barang</h1>
            <div class="text-right" style="color:#9E9E9E;font-size:12px;">
                <footer>
                    <a class="footage_menu" href="<?= base_url(); ?>dashboard">
                        <span class="bi-house-fill"></span> Beranda
                    </a> >
                    <strong><span class="bi-file-earmark-text-fill"></span> Pengadaan Barang</strong>
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
            <table class="table table-bordered" id="product-table">
                <thead>
                    <tr>
                    <th scope="col">No.</th>
                    <th scope="col">ID Pengadaan</th>
                    <th scope="col">Tgl/Jam Input</th>
                    <th scope="col">No. Faktur</th>
                    <th scope="col">Tgl. Faktur</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Jumlah Pengadaan</th>
                    <th scope="col">Harga Beli</th>
                    <th scope="col">User Input</th>
                    <th scope="col">#</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=0; foreach($rs_pengadaan_barang->result_array() as $row_pengadaan_barang) { ?>
                        <tr>
                            <td><?= $i+1; ?></td>
                            <td><?= $row_pengadaan_barang['id_pengadaan']; ?></td>
                            <td>
                                <?= $row_pengadaan_barang['tgl_input']; ?>
                                <input type="text" id="tgl_input_<?= $row_pengadaan_barang['id_pengadaan']; ?>" value="<?= $row_pengadaan_barang['tgl_input']; ?>" hidden/>
                            </td>
                            <td>
                                <?= $row_pengadaan_barang['no_faktur']; ?>
                                <input type="text" id="no_faktur_<?= $row_pengadaan_barang['id_pengadaan']; ?>" value="<?= $row_pengadaan_barang['no_faktur']; ?>" hidden/>
                            </td>
                            <td>
                                <?= date('d-m-Y', strtotime($row_pengadaan_barang['tgl_faktur'])); ?>
                                <input type="text" id="tgl_faktur_<?= $row_pengadaan_barang['id_pengadaan']; ?>" value="<?= date('Y-m-d', strtotime($row_pengadaan_barang['tgl_faktur'])); ?>" hidden/>
                            </td>
                            <td>
                                <?= $row_pengadaan_barang['nama_barang']; ?>
                                <input type="text" id="id_barang_<?= $row_pengadaan_barang['id_pengadaan']; ?>" value="<?= $row_pengadaan_barang['id_barang']; ?>" hidden/>
                            </td>
                            <td>
                                <?= $row_pengadaan_barang['jumlah']; ?>
                                <input type="text" id="jumlah_<?= $row_pengadaan_barang['id_pengadaan']; ?>" value="<?= $row_pengadaan_barang['jumlah']; ?>" hidden/>
                            </td>
                            <td>
                                <?= curformat($row_pengadaan_barang['harga_beli']); ?>
                                <input type="text" id="harga_beli_<?= $row_pengadaan_barang['id_pengadaan']; ?>" value="<?= $row_pengadaan_barang['harga_beli']; ?>" hidden/>
                            </td>
                            <td>
                                <?= $row_pengadaan_barang['nama']; ?>
                            </td>
                            <td>
                                <!-- <button type="button" class="btn btn-warning btn-sm btn-update" id="<?= $row_pengadaan_barang['id_pengadaan']; ?>">
                                    <i class="bi-pencil-fill"></i> Ubah
                                </button> -->
                                <button type="button" class="btn btn-danger btn-sm btn-delete" id="<?= $row_pengadaan_barang['id_pengadaan']; ?>">
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
<div class="modal modal-product">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="form-product">
                <div class="modal-header">
                    <h5 class="modal-title modal-title-add-update"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="no-faktur-modal" class="form-label">No. Faktur</label>
                        <input type="text" id="id-pengadaan-modal" name="id_pengadaan" value="" hidden/>
                        <input type="text" class="form-control" id="no-faktur-modal" name="no_faktur" placeholder="No. Faktur">
                    </div>
                    <div class="mb-3">
                        <label for="tgl-faktur-modal" class="form-label">Tgl. Faktur</label>
                        <input type="date" class="form-control" id="tgl-faktur-modal" name="tgl_faktur" placeholder="Tgl Faktur">
                    </div>
                    <div class="mb-3">
                        <label for="id-barang-modal" class="form-label">Nama Barang</label>
                        <select class="form-select" id="id-barang-modal" name="id_barang" aria-label="Kategori">
                            <option value="" selected>---Silahkan Pilih Barang---</option>
                            <?php $i=0; foreach($rs_product->result_array() as $row_product) { ?>
                                <option value="<?= $row_product['id_barang']; ?>"><?= $row_product['nama_barang']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="jumlah-modal" class="form-label">Jumlah Pengadaan</label>
                        <input type="text" class="form-control" id="jumlah-modal" name="jumlah" placeholder="Jumlah Pengadaan">
                    </div>
                    <div class="mb-3">
                        <label for="harga-beli-modal" class="form-label">Harga Beli</label>
                        <input type="text" class="form-control currency" id="harga-beli-modal" name="harga_beli" placeholder="Harga Beli">
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
                    <input type="text" id="id-pengadaan-delete-modal" name="id_pengadaan" value="" hidden/>
                    <input type="text" id="jumlah-delete-modal" name="jumlah" value="" hidden/>
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
        $('#product-table').DataTable();
        // $('#id-category-modal').select2();
        $('.currency').maskMoney();

        $('#btn-add').click(function(){
            $('.modal-title-add-update').html('Form Tambah Pengadaan Barang');
            $('.btn-save-add-data').show();
            $('.btn-save-change-data').hide();
            $('#nama-kategori-input').focus();

            $('.modal-product').modal('show');
        });

        $('.btn-save-add-data').click(function(){
            var num = $('#harga-beli-modal').maskMoney('unmasked')[0];
            $('#harga-beli-modal').val(num);

            $.ajax({
                url: "<?= base_url(); ?>pengadaan_barang/add_pengadaan_barang",
                method: "post",
                data: $('#form-product').serialize(),
                success: function (data) {
                    location.reload();
                    $('.modal-product').modal('toggle');
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    $('.modal-product').modal('toggle');
                    $('.alert-danger').show();  
                }
            });
        }); 
        
        $('.btn-update').click(function(){
            var id = $(this).attr('id');

            $('.modal-title-add-update').html('Form Edit Data Pengadaan Barang');
            $('#id-pengadaan-modal').val(id);
            $('#no-faktur-modal').val($('#no_faktur_'+id).val());
            $('#tgl-faktur-modal').val($('#tgl_faktur_'+id).val());
            $('#id-barang-modal').val($('#id_barang_'+id).val()).change();
            $('#jumlah-modal').val($('#jumlah_'+id).val());
            $('#harga-beli-modal').val($('#harga_beli_'+id).val());
            
            $('.btn-save-add-data').hide();
            $('.btn-save-change-data').show();
            $('#nama-kategori-input').focus();

            $('.modal-product').modal('show');
        });

        $('.btn-save-change-data').click(function(){
            var num = $('#harga-beli-modal').maskMoney('unmasked')[0];
            $('#harga-beli-modal').val(num);

            $.ajax({
                url: "<?= base_url(); ?>pengadaan_barang/edit_pengadaan_by_id",
                method: "post",
                data: $('#form-product').serialize(),
                success: function (data) {
                    location.reload();
                    $('.modal-product').modal('toggle');
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    $('.modal-product').modal('toggle');
                    $('.alert-danger').show();
                }
            });
        });

        $('.btn-delete').click(function(){
            var id = $(this).attr('id');

            $('#id-pengadaan-delete-modal').val(id);
            $('#jumlah-delete-modal').val($('#jumlah_'+id).val());
            $('.modal-delete-action').modal('show');
        });

        $('.btn-save-delete-data').click(function(){
            $.ajax({
                url: "<?= base_url(); ?>pengadaan_barang/delete_pengadaan_by_id",
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