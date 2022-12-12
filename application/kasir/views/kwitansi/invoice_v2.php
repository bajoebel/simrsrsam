<html>
<head>
    <title>Kwitansi</title>
</head>
<style>
    * {
        font-family: monospace,serif;
        font-size: 10pt;
    }
    #A4{
        background-color:#FFFFFF;
        left:5px;
        right:5px;
        height:5.51in ; /*Ukuran Panjang Kertas */
        width: 8.50in; /*Ukuran Lebar Kertas */
        margin:1px solid #FFFFFF;
    }
    table.bordered{
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
    }
    table.bordered thead th{
        border: 1px solid #ccc;
        padding: 5px;
    }
    table.bordered tbody td{
        border: 1px solid #ccc;
        padding: 5px;
    }
    table.bordered tfoot td{
        padding: 5px;
    }
    .btn{
        font-family:Georgia, "Times New Roman", Times, serif;
        -moz-border-bottom-colors: none;
        -moz-border-left-colors: none;
        -moz-border-right-colors: none;
        -moz-border-top-colors: none;
        background-color: #f5f5f5;
        background-image: linear-gradient(to bottom, #ffffff, #e6e6e6);
        background-repeat: repeat-x;
        border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) #b3b3b3;
        border-image: none;
        border-radius: 4px;
        border-style: solid;
        border-width: 1px;
        box-shadow: 0 1px 0 rgba(255, 255, 255, 0.2) inset, 0 1px 2px rgba(0, 0, 0, 0.05);
        color: #333333;
        cursor: pointer;
        display: inline-block;
        font-size: 14px;
        line-height: 20px;
        margin-bottom: 0;
        padding: 4px 12px;
        text-align: center;
        text-shadow: 0 1px 1px rgba(255, 255, 255, 0.75);
        vertical-align: middle;
    }
    a{
        text-decoration: none;
    }
</style>
<body id="A4">
    <table width="100%" border="0">
        <tr>
            <td align="center">
                <?php echo getCompany(); ?>
                <br />
                <?php echo getAddress1(); ?>
                <br />
                <?php echo getAddress2(); ?>
            </td>
        </tr>
    </table>
    
    <table width="100%" border="0" id="directPrint1">
        <tr>
            <td align="center">
                <a href="#" onclick="window.close()" class="btn">Tutup</a>
                <a href="#" onclick="printDirect()" class="btn">Print</a>
            </td>
        </tr>
    </table>
    
    <table width="100%" border="0">
        <tr>
            <td align="center"><hr /></td>
        </tr>
        <tr>
            <td align="center">KWITANSI PEMBAYARAN</td>
        </tr>
        <tr>
            <td align="center"><hr /></td>
        </tr>
    </table>

    <table width="100%" border="0">
        <tr>
            <td width="130px">No.Invoice</td>
            <td width="10px" align="center">:</td>
            <td width="250px"><?php echo $no_kwitansi ?></td>
            <td width="120px">No.Reg RS</td>
            <td width="10px" align="center">:</td>
            <td><?php echo '<b>'.$id_daftar.'</b>' ?></td>
        </tr>
        <tr>
            <td>Tgl.Invoice</td>
            <td align="center">:</td>
            <td><?php echo date('d-m-Y H:i',strtotime($tgl_kwitansi)) ?></td>
            <td>Pasien</td>
            <td align="center">:</td>
            <td><?php echo $nomr.'-'.$nama_pasien ?></td>
        </tr>
        <tr>
            <td>Tgl.Masuk/Keluar</td>
            <td align="center">:</td>
            <td><?php echo date('d-m-Y',strtotime($tgl_masuk)) . "/" . date('d-m-Y',strtotime($tgl_keluar)) ?></td>
            <td>DPJP</td>
            <td align="center">:</td>
            <td><?php echo $nama_dpjp ?></td>
        </tr>
        <tr>
            <td>LOS (hari)</td>
            <td align="center">:</td>
            <td><?php echo selisihTanggal(date('Y-m-d',strtotime($tgl_masuk)),date('Y-m-d',strtotime($tgl_keluar))) ?></td>
            <td>Cara Bayar</td>
            <td align="center">:</td>
            <td><?php echo $cara_bayar ?></td>
        </tr>
        <tr>
            <td>No.Kartu</td>
            <td align="center">:</td>
            <td><?php echo $no_bpjs ?></td>
            <td>No.SEP</td>
            <td align="center">:</td>
            <td><?php echo $no_sep ?></td>
        </tr>
    </table>
    <table class="bordered">
        <thead>
            <th width="50px">No</th>
            <th >Item Transaksi</th>
            <th width="100px">Tarif</th>
            <th width="100px">Jumlah</th>
            <th width="170px">Nilai Transaksi (Rp)</th>
        </thead>
        <tbody>
            <?php 
            //print_r($datDetail->result_array());
                $i=1;
                $grandTotal = 0;
                $subTotalFarmasi = 0;
                $layanan="";
                foreach($datDetail->result_array() as $x): 
                    $grandTotal+=$x["sub_total_item"];
                    if($layanan==""){
                        if($x["jenis_item"]==2){
                            //Jika Farmasi
                            ?>  
                            <tr>
                                <td colspan="5" style="padding-left: 20px;"><b>Biaya Obat</b></td>
                            </tr>
                            <tr>
                                <td align="center"><?=  $i ?></td>
                                <td><?= $x["deskripsi"]; ?></td>
                                <td align="right"><?= number_format($x['nilai_item'],0,',','.'); ?></td>
                                <td align="center"><?= $x["jml_item"]; ?></td>
                                <td align="right"><?= number_format($x['sub_total_item'],0,',','.') ; ?></td>
                            </tr>
                            <?php
                        }else{
                            ?>
                            <tr>
                                <td colspan="5" style="padding-left: 20px;"><b><?= $x["nama_unit"] ?></b></td>
                            </tr>
                            <tr>
                                <td align="center"><?=  $i ?></td>
                                <td><?= $x["deskripsi"]; ?></td>
                                <td align="right"><?= number_format($x['nilai_item'],0,',','.'); ?></td>
                                <td align="center"><?= $x["jml_item"]; ?></td>
                                <td align="right"><?= number_format($x['sub_total_item'],0,',','.') ; ?></td>
                            </tr>
                            <?php
                        }
                        $layanan=$x["kode_unit"];
                    }else{
                        if($layanan==$x["kode_unit"]){
                            ?>
                            <tr>
                                <td align="center"><?=  $i ?></td>
                                <td><?= $x["deskripsi"]; ?></td>
                                <td align="right"><?= number_format($x['nilai_item'],0,',','.'); ?></td>
                                <td align="center"><?= $x["jml_item"]; ?></td>
                                <td align="right"><?= number_format($x['sub_total_item'],0,',','.') ; ?></td>
                            </tr>
                            <?php
                        }else{
                            if($x['jenis_item']==2){
                                ?>  
                                <tr>
                                    <td colspan="5" style="padding-left: 20px;"><b>Biaya Obat</b></td>
                                </tr>
                                <tr>
                                    <td align="center"><?=  $i ?></td>
                                    <td><?= $x["deskripsi"]; ?></td>
                                    <td align="right"><?= number_format($x['nilai_item'],0,',','.'); ?></td>
                                    <td align="center"><?= $x["jml_item"]; ?></td>
                                    <td align="right"><?= number_format($x['sub_total_item'],0,',','.') ; ?></td>
                                </tr>
                                <?php
                            }else{
                                ?>
                                <tr>
                                    <td colspan="5" style="padding-left: 20px;"><b><?= $x["nama_unit"] ?></b></td>
                                </tr>
                                <tr>
                                    <td align="center"><?=  $i ?></td>
                                    <td><?= $x["deskripsi"]; ?></td>
                                    <td align="right"><?= number_format($x['nilai_item'],0,',','.'); ?></td>
                                    <td align="center"><?= $x["jml_item"]; ?></td>
                                    <td align="right"><?= number_format($x['sub_total_item'],0,',','.') ; ?></td>
                                </tr>
                                <?php
                            }
                        }
                        $layanan=$x["kode_unit"];
                    }
                    /*$grandTotal = $grandTotal + $x['total_item'];
                    if($x['jenis_item']=="2"){
                        $subTotalFarmasi = $subTotalFarmasi + $x['total_item'];
                    }else{
                        ?>
                        <!--tr>
                            <td align="center"><?php echo $i++; ?></td>
                            <td align="center"><?php echo $x['kode_item'] ?></td>
                            <td><?php echo $x['nama_unit'] ?></td>
                            <td align="right"><?php echo number_format($x['total_item'],0,',','.') ?></td>
                        </tr-->
                        <?php 
                    }*/
                    $i++;
                endforeach; 
            ?>
            <!--tr>
                <td colspan="3" align="right">Total Biaya Obat</td>
                <td align="right"><?php echo number_format($subTotalFarmasi,0,',','.') ?></td>
            </tr-->
            <tr>
                <td colspan="4" align="right" style="font-weight: bolder;">Total Tagihan</td>
                <td align="right" style="font-weight: bolder;"><?php echo number_format($total_tagihan,0,',','.') ?></td>
            </tr>
            <tr>
                <td colspan="4" align="right" style="font-weight: bolder;">Biaya Lainnya</td>
                <td align="right" style="font-weight: bolder;"><?php echo number_format($biaya_lainnya,0,',','.') ?></td>
            </tr>
            <tr>
                <td colspan="4" align="right" style="font-weight: bolder;">Grand Total</td>
                <td align="right" style="font-weight: bolder;"><?php echo number_format($grand_total,0,',','.') ?></td>
            </tr>
            <tr>
                <td colspan="5">Terbilang : <span id="terbilang"></span></td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="4"><em>Kwitansi ini sebagai alat bukti pembayaran yang sah.</em></td>
            </tr>
        </tfoot>
    </table>
    
    <table style="margin-left: 100px;margin-top: 20px;">
        <tr>
            <td>&nbsp;</td>
            <td width="450px">&nbsp;</td>
            <td>Petugas Loket Pembayaran</td>
        </tr>
        <tr style="height: 50px;">
            <td colspan="3">&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><?php echo getUserLogin() ?></td>
        </tr>
    </table>
</body>
</html>
<script>
function terbilangnya(bilangan){
    bilangan    = String(bilangan);
    var angka   = new Array('0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0');
    var kata    = new Array('','Satu','Dua','Tiga','Empat','Lima','Enam','Tujuh','Delapan','Sembilan');
    var tingkat = new Array('','Ribu','Juta','Milyar','Triliun');

    var panjang_bilangan = bilangan.length;
    if (panjang_bilangan > 15) {
        kaLimat = "Diluar Batas";
        return kaLimat;
    }
    for (i = 1; i <= panjang_bilangan; i++) {
        angka[i] = bilangan.substr(-(i),1);
    }
    i = 1;
    j = 0;
    kaLimat = "";
    while (i <= panjang_bilangan) {
        subkaLimat = "";
        kata1 = "";
        kata2 = "";
        kata3 = "";
        if (angka[i+2] != "0") {
            if (angka[i+2] == "1") {
                kata1 = "Seratus";
            } else {
                kata1 = kata[angka[i+2]] + " Ratus";
            }
        }
        if (angka[i+1] != "0") {
            if (angka[i+1] == "1") {
                if (angka[i] == "0") {
                    kata2 = "Sepuluh";
                } else if (angka[i] == "1") {
                    kata2 = "Sebelas";
                } else {
                    kata2 = kata[angka[i]] + " Belas";
                }
            } else {
                kata2 = kata[angka[i+1]] + " Puluh";
            }
        }
        if (angka[i] != "0") {
            if (angka[i+1] != "1") {
                kata3 = kata[angka[i]];
            }
        }
        if ((angka[i] != "0") || (angka[i+1] != "0") || (angka[i+2] != "0")) {
            subkaLimat = kata1+" "+kata2+" "+kata3+" "+tingkat[j]+" ";
        }
        kaLimat = subkaLimat + kaLimat;
        i = i + 3;
        j = j + 1;
    }
    if ((angka[5] == "0") && (angka[6] == "0")) {
        kaLimat = kaLimat.replace("Satu Ribu","Seribu");
    }
    return kaLimat + "Rupiah";
}
document.getElementById('terbilang').innerHTML = '#' + terbilangnya('<?php echo $grand_total ?>') + ' #';
function printDirect(){
    if (typeof(window.print) != 'undefined') {
        document.getElementById("directPrint1").style.display = 'none';
        window.print();
        document.getElementById("directPrint1").style.display = 'inline-table';
    }
}
</script>