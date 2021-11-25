<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Transaksi</h1>
            <div class="text-right" style="color:#9E9E9E;font-size:12px;">
                <footer>
                    <a class="footage_menu" href="<?= base_url(); ?>dashboard">
                        <span class="bi-house-fill"></span> Beranda
                    </a> >
                    <strong><span class="bi-cart-dash-fill"></span> Transaksi</strong>
                </footer>
            </div>
        </div>

        <div class="mb-4 row">
            <div class="col">
            </div>
            <div class="col-6 input-group-lg">
                <input type="text" class="form-control" id="no_stnk" placeholder="No. STNK (Silahkan Ketikkan No.STNK disini)" autofocus>
                <small style="color:#BF360C;"><strong>*) Silahkan cari berdasarkan No. STNK dengan cara mengetikkan No. STNK dan pilih data Customer yang sesuai!</strong></small>
            </div>
            <div class="col">
            </div>
        </div>
        
        <div class="card">
            <h5 class="card-header">Data Transaksi Customer</h5>
            <div class="card-body">
                <form class="form-customer" method="post" action="<?= base_url(); ?>transaction/add_transaction">
                    <div class="mb-3">
                        <label for="nama" class="form-label">No. STNK</label>
                        <input type="text" class="form-control" id="no_stnk_form" name="no_stnk" placeholder="No. STNK" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" placeholder="Nama" readonly>
                        <input type="text" id="id_customer" name="id_customer" hidden>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamat" placeholder="Alamat" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="no_telpon" class="form-label">No. Telpon</label>
                        <input type="text" class="form-control" id="no_telpon" placeholder="No. Telpon" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="jenis" class="form-label">Kendaraan</label>
                        <input type="text" class="form-control" id="jenis" placeholder="Kendaraan" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="note" class="form-label">Note</label>
                        <input type="text" class="form-control" id="note" placeholder="Note" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="tgl_service" class="form-label">Tanggal Service</label>
                        <input type="text" class="form-control" id="tgl_service" name="date_time" value="<?= date('d-m-Y'); ?>" placeholder="Tanggal Service" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="teknisi" class="form-label">Diperiksa Oleh (Teknisi yang menangani)</label>
                        <select class="form-select" id="teknisi" name="id_teknisi" aria-label="Jenis Kendaraan">
                            <option value="" selected>---Silahkan Pilih Teknisi---</option>
                            <?php $i=0; foreach($rs_teknisi->result_array() as $row_teknisi) { ?>
                                <option value="<?= $row_teknisi['id_teknisi']; ?>"><?= $row_teknisi['nama_teknisi']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary" id="btn-save-main-transaction">Simpan</button>
                </form>
            </div>
        </div>
    </main>
  </div>
</div>

<script>
    $(document).ready( function () {
        $('#no_stnk').autocomplete({
            source: '<?=base_url()?>customer/get_detail_customer_by_no_stnk',
            minLength: 3,
            select: function( event, ui ) {
                $('#no_stnk_form').val(ui.item.no_stnk);
                $('#id_customer').val(ui.item.id_customer);
                $('#nama').val(ui.item.nama);
                $('#alamat').val(ui.item.alamat);
                $('#no_telpon').val(ui.item.no_telpon);
                $('#jenis').val(ui.item.jenis + " / " + ui.item.tipe);
                $('#note').val(ui.item.note);
            },
        }).autocomplete( "instance" )._renderItem = function( ul, item ) {
            return $( "<li>" )
                .append(
                    "<div style='cursor: pointer;'><strong class='text-capitalize' style='font-size: 16px'>" + item.nama + "</strong>" + "<br/>" +
                    "<ol>" +
                        "<li><strong>No. STNK  : </strong>" + item.no_stnk + "</li>" +
                        "<li><strong>Alamat : </strong>" + item.alamat + "</li>" +
                        "<li><strong>No. Telpon : </strong>" + item.no_telpon + "</li>" +
                        "<li><strong>Note : </strong>" + item.note + "</li>" +
                    "</ol></div>"
                )
                .appendTo( ul );
        };
    });
</script>