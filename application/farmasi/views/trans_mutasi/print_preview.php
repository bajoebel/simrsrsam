<html>
<head>
    <title>Faktur</title>
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
                <?php echo COMPANY_NAME; ?>
                <br />
                <?php echo REPORT_ADDRESS_1; ?>
                <br />
                <?php echo REPORT_ADDRESS_2; ?>
            </td>
        </tr>
    </table>
    <hr />

    <table width="100%" border="0">
        <tr>
            <td align="center">
                BUKTI TRANSAKSI MUTASI
            </td>
        </tr>
    </table>
    <hr />

    <table width="100%" border="0" id="directPrint1">
        <tr>
            <td align="center">
                <a href="#" onclick="window.close()" class="btn">Tutup</a>
                <a href="#" onclick="printDirect()" class="btn">Print</a>
            </td>
        </tr>
    </table>
    <hr />
    <table width="100%" border="0">
        <tr>
            <td width="100px">No Mutasi</td>
            <td width="10px" align="center">:</td>
            <td width="350px"><?php echo $KDMT ?></td>
            <td width="100px">Lokasi Asal</td>
            <td width="10px" align="center">:</td>
            <td><?php echo $NAMA_LOKASI_ASAL ?></td>
        </tr>
        <tr>
            <td>Tgl Mutasi</td>
            <td align="center">:</td>
            <td><?php echo date('d-m-Y',strtotime($TGL_MUTASI)) ?></td>
            <td>Lokasi Tujuan</td>
            <td align="center">:</td>
            <td><?php echo $NAMA_LOKASI_TUJUAN ?></td>
        </tr>
    </table>
    
    <table class="bordered">
        <thead>
            <th>No</th>
            <th>Kode</th>
            <th>Nama Obat / Alat Kesehatan</th>
            <th>Satuan</th>
            <th>Jml</th>
        </thead>
        <tbody>
            <?php 
                $i=1;
                foreach($dataPreview->result_array() as $x): 
            ?>
            <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $x['KDBRG'] ?></td>
                <td><?php echo $x['NMBRG'] ?></td>
                <td><?php echo getSatuanObatById($x['KDBRG']) ?></td>
                <td align="right"><?php echo number_format($x['JMLMT'],0,',','.') ?></td>
            </tr>
            <?php 
                endforeach; 
            ?>
            <tr>
                <td colspan="5">Keterangan</td>
            </tr>
            <?php if ($KETMT!==""): ?>
            <tr>
                <td colspan="5"><?php echo $KETMT ?></td>
            </tr>
            <?php else: ?>
            <tr>
                <td colspan="5">-</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <br />
    <br />
    <table width="100%" border="0">
        <tr>
            <td width="60px">&nbsp;</td>
            <td width="460px">Yang menerima</td>
            <td>Yang menyerahkan</td>
        </tr>
        <tr>
            <td height="40px" colspan="3">&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>...........................</td>
            <td><?php echo getNmLengkap() ?></td>
        </tr>
    </table>
    
</body>
</html>
<script>
    function printDirect(){
        if (typeof(window.print) != 'undefined') {
            document.getElementById("directPrint1").style.display = 'none';
            window.print();
            document.getElementById("directPrint1").style.display = 'inline-table';
        }
    }

    function printPOS(){
        var params = <?php echo json_encode($Data) ?>;        
        var mapForm = document.createElement("form");
            mapForm.target = "formPrint";
            mapForm.method = "POST"; // or "post" if appropriate
            mapForm.action = "http://localhost/printEpson.php";

        var mapInput = document.createElement("input");
            mapInput.type = "hidden";
            mapInput.name = "pagePrint";
            mapInput.value = params;
            mapForm.appendChild(mapInput);
            document.body.appendChild(mapForm);
            map = window.open("", "formPrint", "status=0,title=0,height=600,width=800,scrollbars=1");
        
        if (map) {
            mapForm.submit();
        } else {
            alert('You must allow popups for this map to work.');
        }  
          
    }
</script>