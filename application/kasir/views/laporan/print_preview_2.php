<html>
<head>
    <title>Cetak</title>
</head>
<style>
* {
    font-family: monospace,sans-serif;
    font-weight: 10pt;
}
#A4{
    background-color:#FFFFFF;
    left:5px;
    right:5px;
    height:5.51in ; /*Ukuran Panjang Kertas */
    width: 8.50in; /*Ukuran Lebar Kertas */
    margin:1px solid #FFFFFF;
}
table.bordered thead tr th,table.bordered tbody tr td{
    font-size: 12px;
}
table.bordered{
    width: 100%;
    border-collapse: collapse;
    margin-top: 10pt;
}
table.bordered th{
    border: 1px solid #ccc;
    padding: 3px;
    font-size: 0.9em;
}
table.bordered td{
    border: 1px solid #ccc;
    padding: 3px;
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
a{text-decoration: none;}
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
    <hr />
    <table width="100%" border="0">
        <tr>
            <td align="center" style="font-size: 1.2em;font-weight: bolder;">
                Laporan Kwitansi Batal 
            </td>
        </tr>
        <tr>
            <td align="center">Periode Tanggal : <?php echo $tAwal . ' s/d ' . $tAkhir ?></td>
        </tr>
    </table>
    
    
    <table class="bordered">
        <thead>
            <tr>
                <th style="width: 40px">#</th>
                <th style="width: 80px">No Kwitansi</th>
                <th style="width: 80px">Tgl. Kwitansi</th>
                <th style="width: 80px">No Reg RS</th>
                <th style="width: 40px">No MR</th>
                <th>Nama Pasien</th>
                <th style="width: 60px">Cara Bayar</th>
                <th>DPJP</th>
                <th style="width: 80px">Grand Total</th>
            </tr>
        </thead>
        <tbody id="getData"></tbody>
    </table>
    <br />
    <br />
    <table width="100%" border="0">
        <tr>
            <td width="60px">&nbsp;</td>
            <td width="460px">Diketahui Oleh,</td>
            <td>Dicetak Oleh,</td>
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
<script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.js"></script>
<script>
$(document).ready(function(){
    getTable();
    function getTable(){
        var a = "<?php echo $tAwal ?>";
        var b = "<?php echo $tAkhir ?>";
        $.ajax({
            url         : "<?php echo base_url().'kasir.php/laporan/get_print_data_batal' ?>",
            type        : "POST",
            data        : {tAwal:a,tAkhir:b},
            beforeSend  : function(){
                $('tbody#getData').html("<tr><td colspan=8>Loading ... Please Wait</td></tr>");
            },
            success : function(data){
                $('tbody#getData').html(data);
            },
            error   : function(jqXHR,ajaxOption,errorThrown){
                alert(errorThrown);
            }
        });            
    }     
});
</script>
<script>
    function printDirect(){
        if (typeof(window.print) != 'undefined') {
            document.getElementById("directPrint1").style.display = 'none';
            window.print();
            document.getElementById("directPrint1").style.display = 'inline-table';
        }
    }
</script>