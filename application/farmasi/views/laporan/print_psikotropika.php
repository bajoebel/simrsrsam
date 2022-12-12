<html>
<head>
    <title>Laporan Pengeluaran Narkotika dan Psikotropika</title>
</head>
<style>
    #A4{
        background-color:#FFFFFF;
        left:5px;
        right:5px;
        width: 297mm; 
        height: 209mm;
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
<body class="A4">
    <table width="100%" border="0">
        <tr>
            <td align="center">
                <?php echo getCompanyOK(); ?>
                <br />
                <?php echo getAddressOK_1(); ?>
                <br />
                <?php echo getAddressOK_2(); ?>
            </td>
        </tr>
    </table>
    <table width="100%" border="0" id="directPrint1">
        <tr>
            <td align="center">
                <a href="#" onClick="window.close()" class="btn">Tutup</a>
                <a href="#" onClick="printDirect()" class="btn">Print</a>
            </td>
        </tr>
    </table>
    <hr />
    <table width="100%" border="0">
        <tr>
            <td align="center"><h2>Pengeluaran Narkotika dan Psikotropika</h2></td>
        </tr>
		<tr>
            <td align="center">Periode : <?php echo $TGL_AWAL ?> s/d <?php echo $TGL_AKHIR ?></td>
        </tr>
    </table>
    <table width="100%" border="0">
        <tr>
            <td width="50px">Lokasi</td>
            <td width="10px" align="center">:</td>
            <td width="350px"><?php echo $NMLOKASI ?></td>
        </tr>
    </table>
    
    <table class="bordered">
        <thead>
            <th width="35">No</th>
            <th width="168">Kode</th>
            <th width="772">Nama Obat / Alat Kesehatan</th>
            <th width="256">Keluar</th>
        <tbody id="getData"></tbody>
    </table>
    <br />
    <br />
    <table width="100%" border="0">
        <tr>
            <td width="60">&nbsp;</td>
            <td width="918">Diketahui Oleh,</td>
            <td width="325">Dicetak Oleh,</td>
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
<script src="<?php echo get_asset() ?>jquery/jquery.js"></script> 
<script>
$(document).ready(function(){
    getTable();
    function getTable(){
        var a = "<?php echo $KDLOKASI ?>";
		var b = "<?php echo $TGL_AWAL ?>";
        var c = "<?php echo $TGL_AKHIR ?>";
        $.ajax({
            url         : "<?php echo base_url().'laporan_psikotropika/get_data_lap' ?>",
            type        : "POST",
            data        : {kLok:a,tAwal:b,tAkhir:c},
            beforeSend  : function(){
                $('tbody#getData').html("<tr><td colspan=6>Loading ... Please Wait</td></tr>");
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