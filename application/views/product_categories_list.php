    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Data Kategori Barang</h1>
            <div class="text-right" style="color:#9E9E9E;font-size:12px;">
                <footer>
                    <a class="footage_menu" href="<?= base_url(); ?>dashboard">
                        <span class="bi-house-fill"></span> Beranda
                    </a> >
                    <strong><span class="bi-grid-3x3-gap-fill"></span> Data Kategori Barang</strong>
                </footer>
            </div>
        </div>

            <a href="#" class="float" id="btn-add" data-toggle="modal" data-target="#modal-product-category">
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
                <table class="table table-bordered" id="product-category-table">
                    <thead>
                        <tr>
                        <th scope="col">No.</th>
                        <th scope="col">ID Kategori</th>
                        <th scope="col">Nama Kategori</th>
                        <th scope="col">#</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=0; foreach($rs_product_category->result_array() as $row_product_category) { ?>
                            <tr>
                                <td><?= $i+1; ?></td>
                                <td><?= $row_product_category['id_category']; ?></td>
                                <td>
                                    <?= $row_product_category['category_name']; ?>
                                    <input type="text" id="category_name_hidden_<?= $row_product_category['id_category']; ?>" value="<?= $row_product_category['category_name']; ?>" hidden/>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-warning btn-sm btn-update" id="<?= $row_product_category['id_category']; ?>">
                                        <i class="bi-pencil-fill"></i> Ubah
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm btn-delete" id="<?= $row_product_category['id_category']; ?>">
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
    <div class="modal modal-product-category">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="form-product-category">
                    <div class="modal-header">
                        <h5 class="modal-title modal-title-add-update"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="nama-kategori-input" class="form-label">Nama Kategori</label>
                            <input type="text" id="id-kategori-input" name="id_kategori_input" value="" hidden/>
                            <input type="text" class="form-control" id="nama-kategori-input" name="nama_kategori_input" placeholder="Nama Kategori">
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
                <form id="form-product-category-delete-action">
                    <div class="modal-header">
                        <h5 class="modal-title modal-title-add-update">Peringatan!</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="text" id="id-kategori-delete-modal" name="id_kategori" value="" hidden/>
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
            $('#product-category-table').DataTable();

            $('#btn-add').click(function(){
                $('.modal-title-add-update').html('Form Tambah Data Kategori Produk');
                $('.btn-save-add-data').show();
                $('.btn-save-change-data').hide();
                $('#nama-kategori-input').focus();

                $('.modal-product-category').modal('show');
            });

            $('.btn-save-add-data').click(function(){
                $.ajax({
                    url: "<?= base_url(); ?>product_category/add_product_category",
                    method: "post",
                    data: $('#form-product-category').serialize(),
                    success: function (data) {
                        location.reload();
                        $('.modal-product-category').modal('toggle');
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        $('.modal-product-category').modal('toggle');
                        $('.alert-danger').show();  
                    }
                });
            });   
            
            $('.btn-update').click(function(){
                var id = $(this).attr('id');

                $('.modal-title-add-update').html('Form Edit Data Kategori Produk');
                $('#id-kategori-input').val(id);
                $('#nama-kategori-input').val($('#category_name_hidden_'+id).val());
                $('.btn-save-add-data').hide();
                $('.btn-save-change-data').show();
                $('#nama-kategori-input').focus();

                $('.modal-product-category').modal('show');
            });

            $('.btn-save-change-data').click(function(){
                $.ajax({
                    url: "<?= base_url(); ?>product_category/edit_product_category_by_id",
                    method: "post",
                    data: $('#form-product-category').serialize(),
                    success: function (data) {
                        location.reload();
                        $('.modal-product-category').modal('toggle');
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        $('.modal-product-category').modal('toggle');
                        $('.alert-danger').show();
                    }
                });
            });

            $('.btn-delete').click(function(){
                var id = $(this).attr('id');

                $('#id-kategori-delete-modal').val(id);
                $('.modal-delete-action').modal('show');
            });

            $('.btn-save-delete-data').click(function(){
                $.ajax({
                    url: "<?= base_url(); ?>product_category/delete_product_category_by_id",
                    method: "post",
                    data: $('#form-product-category-delete-action').serialize(),
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
        } );
    </script>