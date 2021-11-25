<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">List Transaksi <?= $tanggal; ?></h1>
            <div class="text-right" style="color:#9E9E9E;font-size:12px;">
                <footer>
                    <a class="footage_menu" href="<?= base_url(); ?>dashboard">
                        <span class="bi-house-fill"></span> Beranda
                    </a> >
                    <strong><span class="bi-people-fill"></span> Daftar User</strong>
                </footer>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered" id="transaction-table">
                <thead>
                    <tr>
                    <th scope="col">No.</th>
                    <th scope="col">ID</th>
                    <th scope="col">Tanggal / Jam</th>
                    <th scope="col">Nama Customer</th>
                    <th scope="col">No. Telpon</th>
                    <th scope="col">No. STNK / Note</th>
                    <th scope="col">Teknisi</th>
                    <th scope="col">Operator</th>
                    <th scope="col">#</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=0; foreach($rs_transaction->result_array() as $row_transaction) { ?>
                        <tr>
                            <td><?= $i+1; ?></td>
                            <td><?= $row_transaction['id_transaction']; ?></td>
                            <td><?= $row_transaction['date_time']; ?></td>
                            <td><?= $row_transaction['nama']; ?></td>
                            <td><?= $row_transaction['no_telpon']; ?></td>
                            <td><?= $row_transaction['no_stnk'] . ' / ' . $row_transaction['note']; ?></td>
                            <td><?= $row_transaction['nama_teknisi']; ?></td>
                            <td><?= $row_transaction['inputed_by']; ?></td>
                            <td>
                                <button type="button" class="btn btn-primary btn-sm btn-detail-transaction" id="<?= $row_transaction['id_transaction']; ?>">
                                    <i class="bi-cart-dash-fill"></i> Detail Transaksi
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

<script>
    $(document).ready( function () {
        $('.alert-danger').hide();
        $('#transaction-table').DataTable();

        $('.btn-detail-transaction').click(function(){
            var id = $(this).attr('id');
            window.location = "<?= base_url(); ?>/transaction/detail_transaction?q=" + id;
        });        
    });
</script>