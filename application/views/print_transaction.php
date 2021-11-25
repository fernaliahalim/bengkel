<html>
    <head>
    </head>
    <body>
    <div class="card">
                <h3 class="card-header">Data Transaksi Customer</h3>
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
                <h3 class="card-header">Rincian Transaksi</h3>
                <div class="card-body">
                <table class="table table-bordered" id="transaction-table" style="border: 1px solid black;border-collapse: collapse;" width="100%">
                    <thead>
                        <tr>
                        <th scope="col" style="border: 1px solid black;border-collapse: collapse;">No.</th>
                        <th scope="col" style="border: 1px solid black;border-collapse: collapse;">ID</th>
                        <th scope="col" style="border: 1px solid black;border-collapse: collapse;">Nama Barang</th>
                        <th scope="col" style="border: 1px solid black;border-collapse: collapse;">Jumlah</th>
                        <th scope="col" style="border: 1px solid black;border-collapse: collapse;">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=0; foreach($rs_detail_transaction->result_array() as $row_detail_transaction) { ?>
                            <tr>
                                <td style="border: 1px solid black;border-collapse: collapse;"><?= $i+1; ?></td>
                                <td style="border: 1px solid black;border-collapse: collapse;"><?= $row_detail_transaction['id_detail_transaction']; ?></td>
                                <td style="border: 1px solid black;border-collapse: collapse;">
                                    <?= $row_detail_transaction['nama_barang']; ?>
                                    <input type="text" value="<?= $row_detail_transaction['id_barang']; ?>" id="id_barang_<?= $row_detail_transaction['id_detail_transaction'];?>" hidden/>
                                </td>
                                <td style="border: 1px solid black;border-collapse: collapse;">
                                    <?= $row_detail_transaction['jumlah_barang']; ?>
                                    <input type="text" value="<?= $row_detail_transaction['jumlah_barang']; ?>" id="jumlah_<?= $row_detail_transaction['id_detail_transaction'];?>" hidden/>
                                </td>
                                <td style="border: 1px solid black;border-collapse: collapse;">
                                    <?= $row_detail_transaction['total_bayar']; ?>
                                </td>
                            </tr>
                        <?php $i++; } ?>
                    </tbody>
                </table>
                </div>
            </div>
    </body>
</html>

<script>
     $(document).ready( function () {
         window.print();
     })
</script>