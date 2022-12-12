<?php
$i = 1;
$total = 0;
//print_r($dataPreview->result_array()); exit;
foreach ($dataPreview->result_array() as $x) :
?>
    <table border="0" width="100%">
        <tr>
            <td width="15%">Kode Beli</td>
            <td width="5%">:</td>
            <td width="25%"><?php echo $x['KDBL_RET'] ?></td>
            <td width="5%">&nbsp;</td>
            <td width="15%">Tgl Pembelian</td>
            <td width="5%">:</td>
            <td width="24%"><?php echo $x['DTBL_RET'] ?></td>
            <td width="6%">&nbsp;</td>
        </tr>
        <tr>
            <td>No Faktur</td>
            <td>:</td>
            <td><?php echo $x['NOFAKTUR'] ?></td>
            <td>&nbsp;</td>
            <td>Supplier</td>
            <td>:</td>
            <td><?php echo $x['NMSUPPLIER'] ?></td>
            <td align="right"><?php //echo number_format($x['GRANDTOT'],2,',','.') 
                                ?></td>
        </tr>
    </table>
    <hr />
    <table class="bordered">
        <thead>
            <th>No</th>
            <th>Kode</th>
            <th>Nama Obat / Alat Kesehatan</th>
            <th>Satuan</th>
            <th>Harga</th>
            <th>Jml</th>
        </thead>
        <?php
        $no = 1;
        $subTotal = 0;
        $totalR = 0;
        $list = $this->db->select('b.*,a.HMODAL,a.TGLBELI,a.TGLEXP,a.JMLRET,c.NMSATUAN')
            ->from('tbl04_pembelian_batal_detail a')
            ->join('tbl04_barang b', 'a.KDBRG=b.KDBRG', 'LEFT')
            ->join('tbl04_satuan c', 'b.KDSATUAN=c.KDSATUAN', 'LEFT')
            ->where('KDBL_RET', $x['KDBL_RET'])
            ->order_by('NMBRG', 'ASC')
            ->get();

        foreach ($list->result_array() as $y) :
            $st = $y['HMODAL'] * $y['JMLRET']
        ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $y['KDBRG'] ?></td>
                <td><?php echo $y['NMBRG'] ?></td>
                <td><?php echo $y['NMSATUAN'] ?></td>
                <td align="right"><?php echo number_format($y['HMODAL'], 2, ',', '.') ?></td>
                <td align="right"><?php echo number_format($y['JMLRET'], 0, ',', '.') ?></td>
            </tr>
        <?php
            $subTotal = $subTotal + $st;
        endforeach;
        ?>
        <tr>
            <td colspan="5" align="right">Total</td>
            <td align="right"><?php echo number_format($subTotal, 2, ',', '.') ?></td>
        </tr>

    </table>

    <br />
    <br />

<?php
    $total = $total + $subTotal;
endforeach; ?>

<hr />
<table border="1" cellpading="0" cellspacing="0" width="100%">
    <tr>
        <td colspan="5" align="center">Total Pembelian</td>
        <td align="right" width="13%"><?php echo number_format($total, 2, ',', '.') ?></td>
    </tr>
</table>