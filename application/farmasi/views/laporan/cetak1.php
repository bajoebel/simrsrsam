<?php
ob_start();
session_start();
error_reporting(0);
?>
<html>
<head>
    <title>Invoice</title>
</head>
<style>
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
    table.bordered th{
        border: 1px solid #ccc;
        padding: 5px;
        font-size: 0.9em;
    }
    table.bordered td{
        border: 1px solid #ccc;
        padding: 5px;
        font-size: 0.8em;
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
                RSUD Dr. Achmad Mochtar                <br />
                Jln. Dr. A.Rivai, No. 02 B, Sumatera Barat                <br />
                Telp : (0752) 21322            </td>
        </tr>
    </table>
    <table width="100%" border="0" id="directPrint1">
        <tr>
            <td align="center">
                <a href="#" onclick="window.close()" class="btn">Tutup</a>
                <a href="#" onclick="window.open('http://localhost/simrs_simple/billing/cetakTindakan/FK17090003/2017-00003/000010')" class="btn">Print Tindakan</a>
                <a href="#" onclick="window.open('http://localhost/simrs_simple/billing/cetakLabor/FK17090003/2017-00003/000010')" class="btn">Print Labor</a>
                <a href="#" onclick="window.open('http://localhost/simrs_simple/billing/cetakObat/FK17090003/2017-00003/000010')" class="btn">Print Obat</a>
                <a href="#" onclick="window.open('http://localhost/simrs_simple/billing/cetakLain/FK17090003/2017-00003/000010')" class="btn">Print Lainnya</a>
                <a href="#" onclick="window.open('http://localhost/simrs_simple/billing/cetakOK/FK17090003/2017-00003/000010')" class="btn">Print Invoice</a>
                <a href="#" onclick="printDirect()" class="btn">Print Direct</a>
            </td>
        </tr>
    </table>
    <hr />
    <table width="100%" border="0">
        <tr>
            <td width="100px">No Inv</td>
            <td width="10px" align="center">:</td>
            <td width="350px">FK17090003</td>
            <td width="100px">No MR</td>
            <td width="10px" align="center">:</td>
            <td>000010</td>
        </tr>
        <tr>
            <td>Tanggal</td>
            <td align="center">:</td>
            <td>2017-09-24 12:20:18</td>
            <td>Pasien</td>
            <td align="center">:</td>
            <td>TRIA DESMITA</td>
        </tr>
        <tr>
            <td>No Reg</td>
            <td align="center">:</td>
            <td>2017-00003</td>
            <td>Ruang / Poli</td>
            <td align="center">:</td>
            <td>Ruang Cindua Mato</td>
        </tr>
    </table>
    <table class="bordered">
        <thead>
            <th>No</th>
            <th>Kode</th>
            <th>Nama Obat / Nama Tindakan</th>
            <th>Jml</th>
            <th>Satuan</th>
            <th>Harga</th>
            <th>Sub Total</th>
        </thead>
        <tbody>            
                        <tr>
                <td>1</td>
                <td>TL17-00009</td>
                <td>Persalinan Normal dengan Tindakan Anyelir</td>
                <td align="right">1</td>
                <td align="center">-</td>
                <td align="right">2.400.000</td>
                <td align="right">2.400.000</td>
            </tr>
                        <tr>
                <td colspan="7" style="font-weight: bolder;">Biaya Tindakan</td>
            </tr>
                        <tr>
                <td>2</td>
                <td>LAB-000001</td>
                <td>Pemeriksaan Darah</td>
                <td align="right">1</td>
                <td align="center">-</td>
                <td align="right">20.000</td>
                <td align="right">20.000</td>
            </tr>
                        <tr>
                <td colspan="7" style="font-weight: bolder;">Biaya Labor</td>
            </tr>            
                        <tr>
                <td>3</td>
                <td>12</td>
                <td>ASAMNEX [R]</td>
                <td align="right">10</td>
                <td align="center"></td>
                <td align="right">3.600</td>
                <td align="right">46.000</td>
            </tr>
                        <tr>
                <td>4</td>
                <td>28</td>
                <td>BMT 400 GRAM [NR]</td>
                <td align="right">1</td>
                <td align="center"></td>
                <td align="right">95.000</td>
                <td align="right">97.000</td>
            </tr>
                        <tr>
                <td>5</td>
                <td>-</td>
                <td colspan="4">Biaya Racikan</td>
                <td align="right">12.000</td>
            </tr>
                        <tr>
                <td colspan="7" style="font-weight: bolder;">Biaya Obat</td>
            </tr>
                        <tr>
                <td>6</td>
                <td>TLA-000001</td>
                <td>Laundry</td>
                <td align="right">1</td>
                <td align="center">-</td>
                <td align="right">10.000</td>
                <td align="right">5.000</td>
            </tr>
                        <tr>
                <td>7</td>
                <td>TLA-000001</td>
                <td>Laundry</td>
                <td align="right">0</td>
                <td align="center">-</td>
                <td align="right">10.000</td>
                <td align="right">1.200</td>
            </tr>
                        <tr>
                <td>8</td>
                <td>TLA-000001</td>
                <td>Laundry</td>
                <td align="right">1</td>
                <td align="center">-</td>
                <td align="right">10.000</td>
                <td align="right">5.500</td>
            </tr>
                        <tr>
                <td colspan="7" style="font-weight: bolder;">Biaya Lainnya</td>
            </tr>

            <tr>
                <td colspan="5">Terbilang : <span id="terbilang"></span></td>
                <td align="right">Total</td>
                <td align="right" style="font-weight: bolder;">2.562.700</td>
            </tr>
            
        </tbody>
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
    
        /* pengujian panjang bilangan */
        if (panjang_bilangan > 15) {
            kaLimat = "Diluar Batas";
            return kaLimat;
        }
    
        /* mengambil angka-angka yang ada dalam bilangan, dimasukkan ke dalam array */
        for (i = 1; i <= panjang_bilangan; i++) {
            angka[i] = bilangan.substr(-(i),1);
        }
    
        i = 1;
        j = 0;
        kaLimat = "";
    
    
        /* mulai proses iterasi terhadap array angka */
        while (i <= panjang_bilangan) {
    
            subkaLimat = "";
            kata1 = "";
            kata2 = "";
            kata3 = "";
    
            /* untuk Ratusan */
            if (angka[i+2] != "0") {
                if (angka[i+2] == "1") {
                    kata1 = "Seratus";
                } else {
                    kata1 = kata[angka[i+2]] + " Ratus";
                }
            }
    
            /* untuk Puluhan atau Belasan */
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
    
            /* untuk Satuan */
            if (angka[i] != "0") {
                if (angka[i+1] != "1") {
                    kata3 = kata[angka[i]];
                }
            }
    
            /* pengujian angka apakah tidak nol semua, lalu ditambahkan tingkat */
            if ((angka[i] != "0") || (angka[i+1] != "0") || (angka[i+2] != "0")) {
                subkaLimat = kata1+" "+kata2+" "+kata3+" "+tingkat[j]+" ";
            }
    
            /* gabungkan variabe sub kaLimat (untuk Satu blok 3 angka) ke variabel kaLimat */
            kaLimat = subkaLimat + kaLimat;
            i = i + 3;
            j = j + 1;
    
        }
    
        /* mengganti Satu Ribu jadi Seribu jika diperlukan */
        if ((angka[5] == "0") && (angka[6] == "0")) {
            kaLimat = kaLimat.replace("Satu Ribu","Seribu");
        }
    
        return kaLimat + "Rupiah";
    }
    document.getElementById('terbilang').innerHTML = '#' + terbilangnya('2562700') + ' #';
    //<![CDATA[
    function printDirect(){
        if (typeof(window.print) != 'undefined') {
            document.getElementById("directPrint1").style.display = 'none';
            window.print();
            document.getElementById("directPrint1").style.display = 'inline-table';
        }
    }
    //]]>
</script>
<?php 
    $content = ob_get_clean();
    // conversion HTML => PDF
    require_once(base_url().'pdf/html2pdf.class.php');
    try{
        $html2pdf = new HTML2PDF('P','A4', 'fr',false, 'ISO-8859-15');
        // $html2pdf->pdf->SetDisplayMode('100');
        $html2pdf->pdf->SetDisplayMode(75);
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        $html2pdf->Output('msf.pdf');
    }catch(HTML2PDF_exception $e){ 
        echo $e; 
    }
?>