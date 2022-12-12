<html>

<head>
    <title>Laporan Penjualan</title>
</head>
<style>
    #A4 {
        background-color: #FFFFFF;
        left: 5px;
        right: 5px;
        width: 297mm;
        height: 209mm margin:1px solid #FFFFFF;
    }

    table.bordered {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
    }

    table.bordered th {
        border: 1px solid #ccc;
        padding: 5px;
        font-size: 0.9em;
    }

    table.bordered td {
        border: 1px solid #ccc;
        padding: 5px;
        font-size: 0.8em;
    }

    .btn {
        font-family: Georgia, "Times New Roman", Times, serif;
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

    a {
        text-decoration: none;
    }
</style>

<body class="A4">
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
                <a href="#" onClick="window.close()" class="btn">Tutup</a>
                <a href="#" onClick="printDirect()" class="btn">Print</a>
                <a href="#" onClick="exportXLS()" class="btn">Export to XLS</a>
            </td>
        </tr>
    </table>
    <hr />
    <table width="100%" border="0">
        <tr>
            <td align="center">
                <h2>Laporan Penjualan Per Periode<br />Periode : <?php echo $TGL_AWAL . " s/d " . $TGL_AKHIR ?></h2>
            </td>
        </tr>
    </table>
    <table width="100%" border="0">
        <tr>
            <td width="100px">Lokasi</td>
            <td width="10px" align="center">:</td>
            <td width="400px"><?php echo $NMLOKASI ?></td>
            <td width="150px">Jenis Pasien</td>
            <td width="10px" align="center">:</td>
            <td><?php echo $NMJPASIEN ?></td>
        </tr>
        <tr>
            <td>Dokter</td>
            <td align="center">:</td>
            <td><?php echo $NMDOKTER ?></td>
            <td>Jenis Pelayanan</td>
            <td align="center">:</td>
            <td><?php echo $NMPELAYANAN ?></td>
        </tr>
        <tr>
            <td width="100px">Poli/Ruangan</td>
            <td width="10px" align="center">:</td>
            <td><?php echo $NMRUANGAN ?></td>
        </tr>
    </table>

    <table class="bordered">
        <thead>
            <th width="25px">No</th>
            <th width="70px">Tgl Faktur</th>
            <th width="70px">Tgl Resep</th>
            <!--th>No.Registrasi</th-->
            <th width="80px">No MR</th>
            <th>Nama Pasien</th>
            <th width="50px">Jenis<br />Pasien</th>
            <th>Dokter</th>
            <th>SMF</th>
            <th>Nama Obat</th>
            <th>Qty</th>
            <th>Harga</th>
            <th>Diskon</th>
            <th>R</th>
            <th>Sub Total</th>
            <th width="80px">Total (Rp)</th>
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
<script src="<?php echo base_url() ?>assets/plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<script>
    $(document).ready(function() {
        getTable();

        function getTable() {
            console.log('get table...');
            var a = "<?php echo $KDLOKASI ?>";
            var b = "<?php echo $KDDOKTER ?>";
            var c = "<?php echo $KDRUANGAN ?>";
            var d = "<?php echo $KDJPASIEN ?>";
            var e = "<?php echo $JNSLAYANAN ?>";
            var f = "<?php echo $TGL_AWAL ?>";
            var g = "<?php echo $TGL_AKHIR ?>";
            $.ajax({
                url: "<?php echo base_url() . 'farmasi.php/laporan_penjualan/get_data_2' ?>",
                type: "POST",
                data: {
                    kLok: a,
                    kDok: b,
                    kRua: c,
                    kJen: d,
                    kPel: e,
                    tAwal: f,
                    tAkhir: g
                },
                beforeSend: function() {
                    $('tbody#getData').html("<tr><td colspan=15>Loading ... Please Wait</td></tr>");
                },
                success: function(data) {
                    $('tbody#getData').html(data);
                },
                error: function(jqXHR, ajaxOption, errorThrown) {
                    alert(errorThrown);
                }
            });
        }
    });
</script>
<script>
    function printDirect() {
        if (typeof(window.print) != 'undefined') {
            document.getElementById("directPrint1").style.display = 'none';
            window.print();
            document.getElementById("directPrint1").style.display = 'inline-table';
        }
    }
</script>