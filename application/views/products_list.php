    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Data Barang</h1>
            <div class="text-right" style="color:#9E9E9E;font-size:12px;">
                <footer>
                    <a class="footage_menu" href="<?= base_url(); ?>dashboard">
                        <span class="bi-house-fill"></span> Beranda
                    </a> >
                    <strong><span class="bi-box-seam"></span> Data Barang</strong>
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
                    <th scope="col">ID Barang</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Harga Jual</th>
                    <th scope="col">#</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=0; foreach($rs_product->result_array() as $row_product) { ?>
                        <tr>
                            <td><?= $i+1; ?></td>
                            <td><?= $row_product['id_barang']; ?></td>
                            <td>
                                <?= $row_product['category_name']; ?>
                                <input type="text" id="id_category_hidden<?= $row_product['id_barang']; ?>" value="<?= $row_product['id_category']; ?>" hidden/>
                            </td>
                            <td>
                                <?= $row_product['nama_barang']; ?>
                                <input type="text" id="nama_barang_hidden_<?= $row_product['id_barang']; ?>" value="<?= $row_product['nama_barang']; ?>" hidden/>
                            </td>
                            <td>
                                <?= $row_product['stock']; ?>
                                <input type="text" id="stock_hidden_<?= $row_product['id_barang']; ?>" value="<?= $row_product['stock']; ?>" hidden/>
                            </td>
                            <td>
                                <?= curformat($row_product['harga_jual']); ?>
                                <input type="text" id="harga_jual_hidden_<?= $row_product['id_barang']; ?>" value="<?= $row_product['harga_jual']; ?>" hidden/>
                            </td>
                            <td>
                                <button type="button" class="btn btn-warning btn-sm btn-update" id="<?= $row_product['id_barang']; ?>">
                                    <i class="bi-pencil-fill"></i> Ubah
                                </button>
                                <button type="button" class="btn btn-danger btn-sm btn-delete" id="<?= $row_product['id_barang']; ?>">
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
                        <label for="id-category-modal" class="form-label">Kategori</label>
                        <input type="text" id="id-barang-modal" name="id_barang" value="" hidden/>
                        <select class="form-select" id="id-category-modal" name="id_category" aria-label="Kategori">
                            <option value="" selected>---Silahkan Pilih Kategori---</option>
                            <?php $i=0; foreach($rs_product_category->result_array() as $row_product_category) { ?>
                                <option value="<?= $row_product_category['id_category']; ?>"><?= $row_product_category['category_name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="nama-barang-modal" class="form-label">Nama Barang</label>
                        <input type="text" class="form-control" id="nama-barang-modal" name="nama_barang" placeholder="Nama Barang">
                    </div>
                    <div class="mb-3">
                        <label for="stock-modal" class="form-label">Stock</label>
                        <input type="text" class="form-control" id="stock-modal" name="stock" placeholder="Stock">
                    </div>
                    <div class="mb-3">
                        <label for="harga-jual-modal" class="form-label">Harga Jual</label>
                        <input type="text" class="form-control currency" id="harga-jual-modal" name="harga_jual" placeholder="Harga Jual">
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
                    <input type="text" id="id-barang-delete-modal" name="id_barang" value="" hidden/>
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
            $('.modal-title-add-update').html('Form Tambah Data Produk');
            $('.btn-save-add-data').show();
            $('.btn-save-change-data').hide();
            $('#nama-kategori-input').focus();

            $('.modal-product').modal('show');
        });

        $('.btn-save-add-data').click(function(){
            var num = $('#harga-jual-modal').maskMoney('unmasked')[0];
            $('#harga-jual-modal').val(num);

            $.ajax({
                url: "<?= base_url(); ?>product/add_product",
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

            $('.modal-title-add-update').html('Form Edit Data Produk');
            $('#id-barang-modal').val(id);
            $('#id-category-modal').val($('#id_category_hidden'+id).val()).change();
            $('#nama-barang-modal').val($('#nama_barang_hidden_'+id).val());
            $('#stock-modal').val($('#stock_hidden_'+id).val());
            $('#harga-jual-modal').val($('#harga_jual_hidden_'+id).val());

            $('.btn-save-add-data').hide();
            $('.btn-save-change-data').show();
            $('#nama-kategori-input').focus();

            $('.modal-product').modal('show');
        });

        $('.btn-save-change-data').click(function(){
            var num = $('#harga-jual-modal').maskMoney('unmasked')[0];
            $('#harga-jual-modal').val(num);

            $.ajax({
                url: "<?= base_url(); ?>product/edit_product_by_id",
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

            $('#id-barang-delete-modal').val(id);
            $('.modal-delete-action').modal('show');
        });

        $('.btn-save-delete-data').click(function(){
            $.ajax({
                url: "<?= base_url(); ?>product/delete_product_by_id",
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