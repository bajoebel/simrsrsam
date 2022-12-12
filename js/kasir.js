const formatter = new Intl.NumberFormat('id-ID');
function riwayatKunjungan(start,aksi=''){
    $('#start').val(start);
    var search = $('#q').val();
    var limit = $('#limit').val();
    var active="class='btn btn-primary btn-sm'";
    var jns =  $("input[name='jnslayanan']:checked").val();
    var status_transaksi = $('#status_transaksi:checked').val();
    if (status_transaksi != 1) status_transaksi=0;
    var url = base_url + "kwitansi/riwayat_kunjungan?q=" + search + "&start=" + start + "&limit=" + limit + "&jns=" + jns + "&status=" + status_transaksi;
    //alert(url);
    //console.clear();
    //console.log(url);
    $.ajax({
        url     : url,
        type    : "GET",
        dataType: "json",
        data    : {get_param : 'value'},
        beforeSend: function () {
            // setting a timeout
            console.clear();
            console.log('before Send');
            
            var tabel = "<tr id='loading'><td colspan='5'><b>Loading...</b></td></tr>";
            $('#riwayat_kunjungan').html("");
            $('#loading').show();
            $('#loading').html(tabel);
            $('#pagination').html('');
        },
        success : function(data){
            //menghitung jumlah data
            
            if(data["status"]==true){
                var kj    = data["data"];
                var jmlData=kj.length;
                var limit   = data["limit"];
                var tabel   = "";
                //Create Tabel
                var no = (parseInt(start)*parseInt(limit))-parseInt(limit);
                var dari = no+1;
                var sampai = dari+parseInt(limit);
                var desc = "<button class='btn btn-default btn-sm' type='button'>Showing "+ dari + " To " + sampai + " of " +data["row_count"]+"</button>";
                var kwitansi = "";
                var hakKelas;
                for(var i=0; i<jmlData;i++){
                    no++;
                    kwitansi=cekKwitansi(kj[i]["id_daftar"]);
                    console.log("Hak Kelas : " + kj[i]["hakKelas"] + " Kelas Layanan : " + kj[i]["hakKelas"] );
                    if(aksi=="") tabel="<tr>"; else tabel+="<tr>";
                    tabel+="<td>"+no+"</td>";
                    tabel+="<td>"+kj[i]["no_ktp"]+"</td>";
                    tabel+="<td>"+kj[i]["id_daftar"]+"</td>";
                    tabel+="<td>"+kj[i]["reg_unit"]+"</td>";
                    tabel+="<td>"+kj[i]["nomr"]+"</td>";
                    tabel+="<td>"+kj[i]["nama_pasien"]+"</td>";
                    if (kj[i]["jns_kelamin"] == "P" || kj[i]["jns_kelamin"]=="0") tabel += "<td>Perempuan</td>";
                    else tabel += "<td>Laki Laki</td>";
                    tabel+="<td>"+kj[i]["no_bpjs"]+"</td>"; 
                    if(kj[i]["jns_layanan"]!="RI"){
                        tabel += "<td class='ranap'>-</td>"; 
                    }else{
                        if (kj[i]["id_cara_bayar"] ==2){
                            hakKelas = parseInt(kj[i]["hakKelasid"]);
                            if (kj[i]["id_kelas"] == hakKelas) tabel += "<td class='ranap'>" + kj[i]["kelas_layanan"] + "</td>";
                            else tabel += "<td class='ranap'>" + kj[i]["kelas_layanan"] + " (Naik Kelas dari "+kj[i]["hakKelas"]+")</td>"
                        }else{
                            tabel += "<td class='ranap'>" + kj[i]["kelas_layanan"] + " </td>"
                        }
                        
                    }
                    
                    tabel+="<td>"+kj[i]["nama_ruang"]+"</td>";
                    tabel += "<td>" + kj[i]["rujukan"] + "</td>";
                    if (kj[i]["status_transaksi"] == 1) {
                        if(parseInt(kwitansi)==0) tabel+="<td><a href='"+base_url+"kwitansi/detail/"+kj[i]["reg_unit"]+"' class='btn btn-success btn-xs'>Buat Kwitansi</a></td>";
                        else tabel+="<td><a href='"+base_url+"kwitansi/detail/"+kj[i]["reg_unit"]+"' class='btn btn-danger btn-xs'>Cetak Kwitansi</span></td>";
                    } else {
                        tabel+="<td><a href='#' class='btn btn-warning btn-xs'>Transaksi Belum Selesai</span></td>";
                    }
                    
                    tabel+="</tr>";
                    if(aksi=="") $('#riwayat_kunjungan').append(tabel);
                }
                if(aksi !="") $('#riwayat_kunjungan').html(tabel)
                //Create Pagination
                if(data["row_count"]<=limit){
                    $('#pagination').html("");
                }else{
                    console.log("buat Pagination");
                    var pagination="";
                    var btnIdx="";
                    jmlPage = Math.ceil(data["row_count"]/limit);
                    offset  = data["start"] % limit;
                    /*curIdx  = Math.ceil((data["start"]/data["limit"])+1);
                    prev    = (curIdx-2) * data["limit"];
                    next    = (curIdx) * data["limit"];*/

                    
                    //var curSt=(curIdx*data["limit"])-jmlData;
                    //var mulai = start;
                    var curIdx = start;
                    var btn="btn-default";
                    //var lastSt=jmlPage;
                    var btnFirst="<button class='btn btn-default btn-sm' onclick='riwayatKunjungan(1)'><span class='fa fa-angle-double-left'></span></button>";
                    if (curIdx > 1) {
                        var prevSt=curIdx-1;
                        btnFirst+="<button class='btn btn-default btn-sm' onclick='riwayatKunjungan("+prevSt+")'><span class='fa fa-angle-left'></span></button>";
                    }

                    var btnLast="";
                    if(curIdx<jmlPage){
                        var nextSt=curIdx+1;
                        btnLast+="<button class='btn btn-default btn-sm' onclick='riwayatKunjungan("+nextSt+")'><span class='fa fa-angle-right'></span></button>";
                    }
                    console.log(curIdx);
                    btnLast+="<button class='btn btn-default btn-sm' onclick='riwayatKunjungan("+jmlPage+")'><span class='fa fa-angle-double-right'></span></button>";
                    
                    if(jmlPage>=5){
                        console.clear();
                        console.log('Jumlah Halaman > 5');
                        if(curIdx>=3){
                            console.log('Cur Idx >= 3');
                            var idx_start=curIdx - 2;
                            var idx_end=curIdx + 2;
                            if(idx_end>=jmlPage) idx_end=jmlPage;
                        }else{
                            var idx_start=1;
                            var idx_end=5;
                        }
                        for (var j = idx_start; j<=idx_end; j++) {
                            if(curIdx==j)  btn="btn-success"; else btn= "btn-default";
                            btnIdx+="<button class='btn " +btn +" btn-sm' onclick='riwayatKunjungan("+ j +")'>" + j +"</button>";
                        }
                    }else{

                        for (var j = 1; j<=jmlPage; j++) {
                            if(curIdx==j)  btn="btn-success"; else btn= "btn-default";
                            btnIdx+="<button class='btn " +btn +" btn-sm' onclick='riwayatKunjungan("+ j +")'>" + j +"</button>";
                        }
                    }
                    pagination+="<div class='btn-group'>"+desc+btnFirst + btnIdx + btnLast+"</div>";
                    $('#pagination').html(pagination);
                }
            }
        },
        complete : function(){
            $('#loading').hide();
        }
    });

}
function enterKeywordKasir(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode;
    //console.log(charCode);
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    } else {
        if (evt.keyCode == 13) {
            riwayatKunjungan(1);
        }
    }
    return true;
}
function cekKwitansi(id_daftar){
    var url = base_url+"kwitansi/cek_kwitansi/"+id_daftar;
    console.log(url);
    var ret=0;
    $.ajax({
        async   : false,
        url     : url,
        type    : "GET",
        dataType: "json",
        data    : {get_param : 'value'},
        success : function(data){
            //console.log(data);
            ret =  data;
        }
    });
    return ret;
}

function getNota(id_daftar){
    var url = base_url+"kwitansi/data_tagihan/"+id_daftar;
    console.log(url);
    $.ajax({
        url     : url,
        type    : "GET",
        dataType: "json",
        data    : {get_param : 'value'},
        success : function(data){
            //menghitung jumlah data
            console.clear();
            
            //alert(data["message"]);
            if(data["status"]==true){

                var nota    = data["nota"];
                console.log(nota);
                var jmlData = nota.length;
                var tabel = "";
                var nomor = 0;
                var grandtotal=0;
                if(jmlData>0){
                    var nama_ruang="KOSONG ";
                    var grandtotal=0;
                    for(var i=0; i<jmlData;i++){
                        nomor=i+1;
                        grandtotal+=parseFloat(nota[i]["sub_total_tarif"]);
                        //alert(i+" "+nama_ruang + " = " + nota[i]["nama_ruang"]);
                        if(i==0){
                            tabel+="<tr><td colspan=5><b>"+nota[i]["nama_ruang"]+"</b></td></tr>";
                            tabel+="<tr>";
                            tabel+="<td>"+nomor;
                            tabel+="<input type='hidden' name='nomor[]' id='nomor"+nomor+"' value='"+nomor+"'>";
                            tabel+="<input type='hidden' name='jenis_item"+nomor+"' id='jenis_item"+nomor+"' value='1'>";
                            tabel+="<input type='hidden' name='kode_item"+nomor+"' id='kode_item"+nomor+"' value='"+nota[i]["reg_unit"]+"'>";
                            tabel+="<input type='hidden' name='kode_unit"+nomor+"' id='kode_unit"+nomor+"' value='"+nota[i]["id_ruang"]+"'>";
                            tabel+="<input type='hidden' name='nama_unit"+nomor+"' id='nama_unit"+nomor+"' value='"+nota[i]["nama_ruang"]+"'>";
                            tabel+="<input type='hidden' name='kode_item_detail"+nomor+"' id='kode_item_detail"+nomor+"' value='"+nota[i]["id_tarif"]+"'>";
                            tabel+="<input type='hidden' name='deskripsi"+nomor+"' id='deskripsi"+nomor+"' value='"+nota[i]["layanan"]+"'>";
                            tabel+="<input type='hidden' name='item_sarana"+nomor+"' id='item_sarana"+nomor+"' value='"+nota[i]["jasa_sarana"]+"'>";
                            tabel+="<input type='hidden' name='item_pelayanan"+nomor+"' id='item_pelayanan"+nomor+"' value='"+nota[i]["jasa_pelayanan"]+"'>";
                            tabel+="<input type='hidden' name='tarif_layanan"+nomor+"' id='tarif_layanan"+nomor+"' value='"+nota[i]["tarif_layanan"]+"'>";
                            tabel+="<input type='hidden' name='jml_item"+nomor+"' id='jml_item"+nomor+"' value='"+nota[i]["jmltindakan"]+"'>";
                            tabel+="<input type='hidden' name='sub_total_item"+nomor+"' id='sub_total_item"+nomor+"' value='"+nota[i]["sub_total_tarif"]+"'>";
                            tabel+="</td>";
                            tabel+="<td>"+nota[i]["layanan"]+"</td>";
                            tabel+="<td class='text-right'>Rp. "+formatter.format(nota[i]["tarif_layanan"])+"</td>";
                            tabel+="<td class='text-right'>"+nota[i]["jmltindakan"]+"</td>";
                            tabel+="<td class='text-right'><b><i>Rp. "+formatter.format(nota[i]["sub_total_tarif"])+"</i></b></td>";
                            tabel+="</tr>";
                            
                            nama_ruang=nota[i]["nama_ruang"];
                        }else{
                            if(nama_ruang!=nota[i]["nama_ruang"]){
                                //alert("header: "+i+" " + nota[i]["nama_ruang"]);
                                tabel+="<tr><td colspan=5><b>"+nota[i]["nama_ruang"]+"</b></td></tr>";
                                tabel+="<tr>";
                                tabel+="<td>"+nomor;
                                tabel+="<input type='hidden' name='nomor[]' id='nomor"+nomor+"' value='"+nomor+"'>";
                                tabel+="<input type='hidden' name='jenis_item"+nomor+"' id='jenis_item"+nomor+"' value='1'>";
                                tabel+="<input type='hidden' name='kode_item"+nomor+"' id='kode_item"+nomor+"' value='"+nota[i]["reg_unit"]+"'>";
                                tabel+="<input type='hidden' name='kode_unit"+nomor+"' id='kode_unit"+nomor+"' value='"+nota[i]["id_ruang"]+"'>";
                                tabel+="<input type='hidden' name='nama_unit"+nomor+"' id='nama_unit"+nomor+"' value='"+nota[i]["nama_ruang"]+"'>";
                                tabel+="<input type='hidden' name='kode_item_detail"+nomor+"' id='kode_item_detail"+nomor+"' value='"+nota[i]["id_tarif"]+"'>";
                                tabel+="<input type='hidden' name='deskripsi"+nomor+"' id='deskripsi"+nomor+"' value='"+nota[i]["layanan"]+"'>";
                                tabel+="<input type='hidden' name='item_sarana"+nomor+"' id='item_sarana"+nomor+"' value='"+nota[i]["jasa_sarana"]+"'>";
                                tabel+="<input type='hidden' name='item_pelayanan"+nomor+"' id='item_pelayanan"+nomor+"' value='"+nota[i]["jasa_pelayanan"]+"'>";
                                tabel+="<input type='hidden' name='tarif_layanan"+nomor+"' id='tarif_layanan"+nomor+"' value='"+nota[i]["tarif_layanan"]+"'>";
                                tabel+="<input type='hidden' name='jml_item"+nomor+"' id='jml_item"+nomor+"' value='"+nota[i]["jmltindakan"]+"'>";
                                tabel+="<input type='hidden' name='sub_total_item"+nomor+"' id='sub_total_item"+nomor+"' value='"+nota[i]["sub_total_tarif"]+"'>";
                                tabel+="</td>";
                                tabel+="<td>"+nota[i]["layanan"]+"</td>";
                                tabel+="<td class='text-right'>Rp. "+formatter.format(nota[i]["tarif_layanan"])+"</td>";
                                tabel+="<td class='text-right'>"+nota[i]["jmltindakan"]+"</td>";
                                tabel+="<td class='text-right'><b><i>Rp. "+formatter.format(nota[i]["sub_total_tarif"]) +"</i></b></td>";
                                tabel+="</tr>";
                                
                                nama_ruang=nota[i]["nama_ruang"];
                            }else{
                                tabel+="<tr>";
                                tabel+="<td>"+nomor;
                                tabel+="<input type='hidden' name='nomor[]' id='nomor"+nomor+"' value='"+nomor+"'>";
                                tabel+="<input type='hidden' name='jenis_item"+nomor+"' id='jenis_item"+nomor+"' value='1'>";
                                tabel+="<input type='hidden' name='kode_item"+nomor+"' id='kode_item"+nomor+"' value='"+nota[i]["reg_unit"]+"'>";
                                tabel+="<input type='hidden' name='kode_unit"+nomor+"' id='kode_unit"+nomor+"' value='"+nota[i]["id_ruang"]+"'>";
                                tabel+="<input type='hidden' name='nama_unit"+nomor+"' id='nama_unit"+nomor+"' value='"+nota[i]["nama_ruang"]+"'>";
                                tabel+="<input type='hidden' name='kode_item_detail"+nomor+"' id='kode_item_detail"+nomor+"' value='"+nota[i]["id_tarif"]+"'>";
                                tabel+="<input type='hidden' name='deskripsi"+nomor+"' id='deskripsi"+nomor+"' value='"+nota[i]["layanan"]+"'>";
                                tabel+="<input type='hidden' name='item_sarana"+nomor+"' id='item_sarana"+nomor+"' value='"+nota[i]["jasa_sarana"]+"'>";
                                tabel+="<input type='hidden' name='item_pelayanan"+nomor+"' id='item_pelayanan"+nomor+"' value='"+nota[i]["jasa_pelayanan"]+"'>";
                                tabel+="<input type='hidden' name='tarif_layanan"+nomor+"' id='tarif_layanan"+nomor+"' value='"+nota[i]["tarif_layanan"]+"'>";
                                tabel+="<input type='hidden' name='jml_item"+nomor+"' id='jml_item"+nomor+"' value='"+nota[i]["jmltindakan"]+"'>";
                                tabel+="<input type='hidden' name='sub_total_item"+nomor+"' id='sub_total_item"+nomor+"' value='"+nota[i]["sub_total_tarif"]+"'>";
                                tabel+="</td>";
                                tabel+="<td>"+nota[i]["layanan"]+"</td>";
                                tabel+="<td class='text-right'>Rp. "+formatter.format(nota[i]["tarif_layanan"])+"</td>";
                                tabel+="<td class='text-right'>"+nota[i]["jmltindakan"]+"</td>";
                                tabel+="<td class='text-right'><b><i>Rp. "+formatter.format(nota[i]["sub_total_tarif"])+"</i></b></td>";
                                tabel+="</tr>";
                                
                                nama_ruang=nota[i]["nama_ruang"];
                            }
                            
                            
                        }
                        //alert(nama_ruang + " = " + nota[i]["nama_ruang"]);
                        
                    }
                    
                }
                var obat = data["obat"];
                var jmlObat = obat.length;
                if(jmlObat>0){
                    tabel+="<tr><td colspan=5><b>Pemakaian Obat</b></td></tr>";
                    for(var j=0; j<jmlObat; j++){
                        nomor++;
                        tabel+="<tr>";
                        tabel+="<td>"+nomor;
                        
                        tabel+="<input type='hidden' name='nomor[]' id='nomor"+nomor+"' value='"+nomor+"'>";
                        tabel+="<input type='hidden' name='jenis_item"+nomor+"' id='jenis_item"+nomor+"' value='2'>";
                        tabel+="<input type='hidden' name='kode_item"+nomor+"' id='kode_item"+nomor+"' value='"+obat[j]["KDJL"]+"'>";
                        tabel+="<input type='hidden' name='kode_unit"+nomor+"' id='kode_unit"+nomor+"' value='0'>";
                        tabel+="<input type='hidden' name='nama_unit"+nomor+"' id='nama_unit"+nomor+"' value='Pemakaian Obat'>";
                        tabel+="<input type='hidden' name='kode_item_detail"+nomor+"' id='kode_item_detail"+nomor+"' value='"+obat[j]["KDBRG"]+"'>";
                        tabel+="<input type='hidden' name='deskripsi"+nomor+"' id='deskripsi"+nomor+"' value='"+obat[j]["NMBRG"]+"'>";
                        tabel+="<input type='hidden' name='item_sarana"+nomor+"' id='item_sarana"+nomor+"' value='0'>";
                        tabel+="<input type='hidden' name='item_pelayanan"+nomor+"' id='item_pelayanan"+nomor+"' value='"+obat[j]["HJUAL"]+"'>";
                        tabel+="<input type='hidden' name='tarif_layanan"+nomor+"' id='tarif_layanan"+nomor+"' value='"+obat[j]["HJUAL"]+"'>";
                        tabel+="<input type='hidden' name='jml_item"+nomor+"' id='jml_item"+nomor+"' value='"+obat[j]["JMLJUAL"]+"'>";
                        tabel+="<input type='hidden' name='sub_total_item"+nomor+"' id='sub_total_item"+nomor+"' value='"+obat[j]["SUBTOTAL"]+"'>";
                        
                        tabel+="</td>";
                        tabel+="<td>"+obat[j]["NMBRG"]+"</td>";
                        tabel+="<td class='text-right'>Rp. "+formatter.format(obat[j]["HJUAL"])+"</td>";
                        tabel+="<td class='text-right'>"+obat[j]["JMLJUAL"]+"</td>";
                        tabel+="<td class='text-right'><b><i>Rp. "+formatter.format(obat[j]["SUBTOTAL"]) +"</i></b></td>";
                        tabel+="</tr>";
                        grandtotal+=parseFloat(obat[j]["SUBTOTAL"]);
                    }
                }else{

                    tabel+='<tr><td colspan="5">Belum Ada Obat</td></tr>';
                }
                tabel+='<tr><td colspan="4"><b>Grand Total</b></td><td class="text-right"><b><i>Rp. '+formatter.format(grandtotal)+'</i></b></td></tr>';
                $('#total_tagihan').val(grandtotal);
                $('#labelgrandtotal').html("Rp. "+ formatter.format(grandtotal));
                $('#nota_tagihan').html(tabel);
                //.log(tabel);
            }
        }
    });
}
function simpanKwitansi(){
    var url;
    url = base_url + "kwitansi/simpan_kwitansi";
    var tgl_masuk=$('#tgl_masuk').val();
    var dpjp = $('#dpjp').val();
    var tgl_keluar = $('#tgl_keluar').val();
    var id_cara_bayar=$('#id_cara_bayar').val();
    var total_tagihan=$('#total_tagihan').val();
    if(tgl_masuk=='' || tgl_keluar==''||dpjp==''||id_cara_bayar==''||total_tagihan==''){
        if(tgl_masuk=='') $('#err_tgl').html("Tanggal Masuk harus Diisi"); else $('#err_tgl').html("");
        if(tgl_keluar=='') $('#err_tgl').html("Tanggal Keluar harus Diisi"); else $('#err_tgl').html("");
        if(dpjp=='') $('#err_dpjp').html("DPJP harus Diisi"); else $('#err_dpjp').html("");
        if(id_cara_bayar=='') $('#err_cara_bayar').html("Cara Bayar harus Diisi"); else $('#err_cara_bayar').html("");
        if(total_tagihan=='') $('#err_grandtotal').html("Total Tagihan Masih Kosong"); else $('#err_grandtotal').html("");
        return false;
    }
    var formData = new FormData($('#formkwitansi')[0]);
    $.ajax({
        url : url,
        type: "POST",
        data : formData,
        processData: false,
        contentType: false,
        dataType: 'JSON',
        success: function(data)
        {
            //$('#csrf').val(data["csrf"]);
            
            if(data["status"]==true){
                location.reload();
            }
            else{

                alert(data["message"] +" "+data["id_daftar"] + " " + data["unfinish"]);
                if(data["lihat_transaksi"]==1){
                    
                    getTransaksi(data["id_daftar"]);
                    console.clear();
                    console.log(data);
                }
            }
            
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert("Gagal Menyimpan Data");
        }
    });
}

function getCaraBayar(){
    var id = $('#id_cara_bayar').val();
    var url=base_url+"kwitansi/carabayar/"+id;
    console.log(url);
    $.ajax({
        url     : url,
        type    : "GET",
        dataType: "json",
        data    : {get_param : 'value'},
        success : function(data){
            
            //alert(data["message"]);
            if(data["status"]==true){
                console.log(data);
                //alert(data["data"]["cara_bayar"]);
                $('#cara_bayar').val(data["data"]["cara_bayar"]);
                if(data["data"]["jkn"]=="1"){
                    $('#no_sep').prop('readonly', false);
                    $('#tarif_bpjs').prop('readonly', false);
                    $('#tarif_selisih_bayar').prop('readonly', false);
                    //$('#bpjs').show();
                }else{
                    //$('#bpjs').hide();
                    $('#no_sep').prop('readonly', true);
                    $('#tarif_bpjs').prop('readonly', true);
                    $('#tarif_selisih_bayar').prop('readonly', true);
                }
            }
        }
    });
}

function getDPJP(){
    var id = $('#dpjp').val();
    var url=base_url+"kwitansi/getdpjp/"+id;
    console.log(url);
    $.ajax({
        url     : url,
        type    : "GET",
        dataType: "json",
        data    : {get_param : 'value'},
        success : function(data){
            
            //alert(data["message"]);
            if(data["status"]==true){
                console.log(data);
                $('#nama_dpjp').val(data["data"]["pgwNama"]);
                
            }
        }
    });
}

function getTransaksi(id_daftar){
    $('#formTransaksi').modal('show'); 
    var url=base_url+"kwitansi/gettransaksi/"+id_daftar;
    console.clear();
    console.log(url);
    $.ajax({
        url     : url,
        type    : "GET",
        dataType: "json",
        data    : {get_param : 'value'},
        beforeSend: function () {
            // setting a timeout
            var tabel="<tr><td colspan='5'>Loading...</td></tr>";
            $('#list-transaksi').html(tabel);
        },
        success : function(data){
            var tr=data["data"];
            //alert(data["message"]);
            var tabel = "";
            if(data["status"]==true){
                var jmlData = tr.length;
                
                if(jmlData>0){
                    for(var i=0; i<jmlData;i++){
                        
                        //console.log(tr[i]["nama_ruang"]+" : " + farmasi);
                        tabel+="<tr>";
                        tabel+="<td>"+tr[i]["reg_unit"]+"</td>";
                        tabel+="<td>"+tr[i]["nama_ruang"]+"</td>";
                        if(tr[i]["status_transaksi"]==1) tabel+="<td><span class='btn btn-success btn-xs'><span class='fa fa-check'></span></span></td>";
                        else tabel+="<td><span class='btn btn-danger btn-xs'><span class='fa fa-remove'></span></span></td>";
                        if(tr[i]["ada_resep"]==1) {
                            var farmasi = cekFarmasi(tr[i]["reg_unit"]);
                            console.log(tr[i]["nama_ruang"] +" : " + farmasi["data"]);
                            if(farmasi["data"]>0) tabel+="<td><span class='btn btn-success btn-xs'><span class='fa fa-check'></span></span></td>";
                            else tabel+="<td><span class='btn btn-danger btn-xs'><span class='fa fa-remove'></span></span></td>";
                        }
                        else {
                            tabel+="<td><span class='btn btn-warning btn-xs'><span class='fa fa-refresh'></span></span></td>";
                        }
                        tabel+="</tr>";
                    }
                }else{
                    tabel+="<tr><td colspan=3>Tidak ada transaksi</td></tr>";
                }
                
                
            }else{
                tabel+="<tr><td colspan=3>Tidak ada transaksi</td></tr>";
            }
            $('#list-transaksi').html(tabel);
        }
    });
}

function cekFarmasi(reg_unit){
    var url = base_url+"kwitansi/cekfarmasi/"+reg_unit;
    console.log(url);
    var ret=0;
    $.ajax({
        async   : false,
        url     : url,
        type    : "GET",
        dataType: "json",
        data    : {get_param : 'value'},
        success : function(data){
            console.log(data);
            ret =  data;
        }
    });
    return ret;
}