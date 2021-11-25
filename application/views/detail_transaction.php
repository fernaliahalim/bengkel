<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Detail Transaksi</h1>
            <div class="text-right" style="color:#9E9E9E;font-size:12px;">
                <footer>
                    <a class="footage_menu" href="<?= base_url(); ?>dashboard">
                        <span class="bi-house-fill"></span> Beranda
                    </a> >
                    <span class="bi-cart-dash-fill"></span> Transaksi >
                    <strong><span class="bi-cart-dash-fill"></span> Detail Transaksi</strong>
                </footer>
            </div>
        </div>

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

            <div class="card">
                <h5 class="card-header">Data Transaksi Customer</h5>
                <div class="card-body">
                <table>
                        <tr>
                            <th width="15%">
                                ID Transaksi 
                            </th>
                            <td>&nbsp;:&nbsp;</td>
                            <td width="35%">
                                <?= $id_transaction; ?>
                            </td>

                            <td></td>

                            <th width="15%">
                                Nama Customer 
                            </th>
                            <td>&nbsp;:&nbsp;</td>
                            <td width="40%">
                                <?= $nama_customer; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Tanggal / Jam Service 
                            </th>
                            <td>&nbsp;:&nbsp;</td>
                            <td>
                                <?= $date_time; ?>
                            </td>

                            <td></td>

                            <th>
                                Alamat 
                            </th>
                            <td>&nbsp;:&nbsp;</td>
                            <td>
                                <?= $alamat; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Teknisi yang menangani 
                            </th>
                            <td>&nbsp;:&nbsp;</td>
                            <td>
                                <?= $nama_teknisi; ?>
                            </td>

                            <td></td>

                            <th>
                                No. Telpon 
                            </th>
                            <td>&nbsp;:&nbsp;</td>
                            <td>
                                <?= $no_telpon; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Operator 
                            </th>
                            <td>&nbsp;:&nbsp;</td>
                            <td>
                                <?= $inputed_by; ?>
                            </td>

                            <td></td>

                            <th>
                                No. STNK / Note 
                            </th>
                            <td>&nbsp;:&nbsp;</td>
                            <td>
                                <?= $no_stnk  . ' / ' . $note; ?>
                            </td>
                        </tr>
                </table>
                </div>
            </div>
            
            <br/>

            <div class="card">
                <h5 class="card-header">Rincian Transaksi</h5>
                <div class="card-body">
                <table class="table table-bordered" id="transaction-table">
                    <thead>
                        <tr>
                        <th scope="col">No.</th>
                        <th scope="col">ID</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Total</th>
                        <th scope="col">#</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=0; foreach($rs_detail_transaction->result_array() as $row_detail_transaction) { ?>
                            <tr>
                                <td><?= $i+1; ?></td>
                                <td><?= $row_detail_transaction['id_detail_transaction']; ?></td>
                                <td>
                                    <?= $row_detail_transaction['nama_barang']; ?>
                                    <input type="text" value="<?= $row_detail_transaction['id_barang']; ?>" id="id_barang_<?= $row_detail_transaction['id_detail_transaction'];?>" hidden/>
                                </td>
                                <td>
                                    <?= $row_detail_transaction['jumlah_barang']; ?>
                                    <input type="text" value="<?= $row_detail_transaction['jumlah_barang']; ?>" id="jumlah_<?= $row_detail_transaction['id_detail_transaction'];?>" hidden/>
                                </td>
                                <td>
                                    <?= $row_detail_transaction['total_bayar']; ?>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger btn-sm btn-delete" id="<?= $row_detail_transaction['id_detail_transaction']; ?>">
                                        <i class="bi-trash-fill"></i> Hapus
                                    </button>
                                </td>
                            </tr>
                        <?php $i++; } ?>
                    </tbody>
                </table>
                </div>
            </div>

        <a href="#" class="float" id="btn-add" data-toggle="modal" data-target="#modal-product">
            <i class="bi-plus my-float"></i>
        </a>

        <a href="#" class="float-print" id="btn-print" data-toggle="modal" data-target="#modal-product">
            <i class="bi-printer-fill my-float-print"></i>
        </a>
    </main>
  </div>
</div>

<div class="modal modal-transaction">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="form-transaction">
                <div class="modal-header">
                    <h5 class="modal-title modal-title-add-update"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger alert-danger-modal" role="alert">
                        <h4 class="alert-heading">Ooopss!</h4>
                        <p id="note-alert-modal">Perubahan data tidak berhasil dilakukan</p>
                    </div>
                    <div class="mb-3">
                        <label for="barang-modal" class="form-label">Nama Barang</label>
                        <input type="text" name="id_transaction" value="<?= $id_transaction; ?>" hidden/>
                        <select class="form-select" id="barang-modal" name="id_barang" aria-label="Nama Barang">
                            <option value="" selected>---Silahkan Pilih Barang---</option>
                            <?php $i=0; foreach($rs_barang->result_array() as $row_barang) { ?>
                                <option value="<?= $row_barang['id_barang']; ?>" harga_jual="<?= $row_barang['harga_jual']; ?>"><?= $row_barang['nama_barang']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="jumlah-modal" class="form-label">Jumlah</label>
                        <input type="number" class="form-control" id="jumlah-modal" name="jumlah_barang" placeholder="Jumlah">
                    </div>
                    <div class="mb-3">
                        <label for="total-modal" class="form-label">Total</label>
                        <input type="text" class="form-control" id="total-modal" name="total_bayar" placeholder="Total Bayar" readonly>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary btn-save-add-data">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal modal-delete-action">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="form-detail-transaction">
                <div class="modal-header">
                    <h5 class="modal-title modal-title-add-update">Peringatan!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="text" id="id-detail-transaction-delete-modal" name="id_detail_transaction" value="" hidden/>
                    <input type="text" id="id-barang-transaction-delete-modal" name="id_barang_detail_transaction" value="" hidden/>
                    <input type="text" id="jumlah-detail-transaction-delete-modal" name="jumlah_detail_transaction" value="" hidden/>
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
        $('.alert-danger-modal').hide();
        $('#transaction-table').DataTable();

        $('#btn-add').click(function(){
            $('.modal-title-add-update').html('Form Tambah Transaksi');
            $('.btn-save-add-data').show();
            $('.btn-save-change-data').hide();
            $('#barang-modal').focus();

            $('.modal-transaction').modal('show');
        });

        $('#jumlah-modal').change(function(){
            var id_barang = $('#barang-modal').val();
            var harga = $('option:selected', '#barang-modal').attr('harga_jual');
            var jumlah = $(this).val();

            if(id_barang > 0){
                $.ajax({
                url: "<?= base_url(); ?>product/cek_stock_barang_by_idbarang",
                method: "post",
                data: {id_barang:id_barang},
                success: function (data) {
                    if(parseInt(jumlah) >= parseInt(data)){
                        $('#note-alert-modal').html('Jumlah yg Anda gunakan lebih dari <strong>stock</strong> yg tersedia! Stock barang yg tersedia saat ini: <strong>' + data + '</strong>');
                        $('.alert-danger-modal').show();
                    } else{
                        $('.alert-danger-modal').hide();
                        $('#total-modal').val(harga*jumlah);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    
                }
            });
            }
        });

        $('.btn-save-add-data').click(function(){
            $.ajax({
                url: "<?= base_url(); ?>transaction/add_detail_transaction",
                method: "post",
                data: $('#form-transaction').serialize(),
                success: function (data) {
                    location.reload();
                    $('.modal-transaction').modal('toggle');
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    $('.modal-transaction').modal('toggle');
                    $('.alert-danger').show();  
                }
            });
        }); 

        $('.btn-delete').click(function(){
            var id = $(this).attr('id');

            $('#id-detail-transaction-delete-modal').val(id);
            $('#id-barang-transaction-delete-modal').val($('#id_barang_' + id).val());
            $('#jumlah-detail-transaction-delete-modal').val($('#jumlah_' + id).val());
            $('.modal-delete-action').modal('show');
        });

        $('.btn-save-delete-data').click(function(){
            $.ajax({
                url: "<?= base_url(); ?>transaction/delete_detail_transaction_by_id",
                method: "post",
                data: $('#form-detail-transaction').serialize(),
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

        $('#btn-print').click(function(){
            window.location = "<?= base_url(); ?>transaction/print?q=<?= $this->input->get('q'); ?>";
        });
     });
</script>