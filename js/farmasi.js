function cariBarang(start=0,lokasi=""){
	
	var show=$('#show_barang').val();
	//kosongkanObjTemp();
	if(show==0){
		$('#barang').show();
		$('#show_barang').val("1");
		$('#qkode').val("");
		$('#qnama').val("");
		$('#qbarang').val("");
		$('#qsatuan').val("");
		$('#qkategori').val("");
		$('#qkode').focus();
		getBarang(start,lokasi);
	}else{
		$('#barang').hide();
		$('#show_barang').val("0");
	}
}

function getBarang(start=0,lokasi=""){
	var show=$('#show_barang').val();
	var keyword=$('#keyword').val();
	if(keyword.length>1){
		if(show==0){
			$('#barang').show();
			$('#show_barang').val("1");
		}
	}
	var qkode = $('#qkode').val();
	var qnama = $('#qnama').val();
	var qsatuan = $('#qsatuan').val();
	var qkategori=$('#qkategori').val();
	if(lokasi==""){
		var url = base_url + "search/barang?start="+start+"&kode="+qkode+"&nama="+qnama+"&satuan="+qsatuan+"&kategori="+qkategori+"&keyword="+keyword;
		console.log(url);
	}else{
		var url = base_url + "search/barang/"+lokasi+"?start="+start+"&kode="+qkode+"&nama="+qnama+"&satuan="+qsatuan+"&kategori="+qkategori+"&keyword="+keyword;
		console.log(url);
	}
	
	$.ajax({
			url     : url,
			type    : "GET",
			dataType: "json",
			data    : {get_param : 'value'},
			success : function(data){
			    //menghitung jumlah data
			    //console.clear();
			    $('#jmldata').val(data["row_count"]);
			    if(data["status"]==true){
			        var barang    = data["data"];
			        var jmlData=barang.length;
			        var limit   = data["limit"]
			        var tabel   = "";
			        //Create Tabel
			        for(var i=0; i<jmlData;i++){
			            start++;
			            if(lokasi=="") tabel+='<tr onclick=\'setBarang("' +barang[i]["KDBRG"] +'","' +barang[i]["NMBRG"] +'","' +barang[i]["NMSATUAN"] +'","' +barang[i]["NMKTBRG"] +'")\' >';
			            else tabel+='<tr onclick=\'setBarangmutasi("' +barang[i]["KDBRG"] +'","' +barang[i]["NMBRG"] +'","' +barang[i]["NMSATUAN"] +'","' +barang[i]["JSTOK"] +'")\' >';
			            tabel+="<td>"+barang[i]["KDBRG"]+"</td>";
			            tabel+="<td>"+barang[i]["NMBRG"]+"</td>";
			            tabel+="<td>"+barang[i]["NMSATUAN"]+"</td>";
			            if(lokasi=="") tabel+="<td>"+barang[i]["NMKTBRG"]+"</td>";
			            else tabel+="<td>"+barang[i]["JSTOK"]+"</td>";
			            tabel+='<td class=\'text-right\'>';
			            if(lokasi=="") tabel+='<button type=\'button\' class=\'btn btn-success btn-xs\' id="pilih'+i+'" onclick=\'setBarang("' +barang[i]["KDBRG"] +'","' +barang[i]["NMBRG"] +'","' +barang[i]["NMSATUAN"] +'","' +barang[i]["NMKTBRG"] +'")\'><span class=\'fa fa-check\' ></span></button>';
			            else tabel+='<button type=\'button\' class=\'btn btn-success btn-xs\' id="pilih'+i+'" onclick=\'setBarangmutasi("' +barang[i]["KDBRG"] +'","' +barang[i]["NMBRG"] +'","' +barang[i]["NMSATUAN"] +'","' +barang[i]["JSTOK"] +'")\'><span class=\'fa fa-check\' ></span></button>';
 			            tabel+='</td>';
			            tabel+="</tr>";
			        }
			        $('#data-barang').html(tabel);
			        //Create Pagination
			        if(data["row_count"]<=limit){
			            $('#pagination').html("");
			        }else{
			            var pagination="";
			            var btnIdx="";
			            jmlPage=Math.ceil(data["row_count"]/limit);
			            offset  = data["start"] % limit;
			            curIdx  = Math.ceil((data["start"]/data["limit"])+1);
			            prev    = (curIdx-2) * data["limit"];
			            next    = (curIdx) * data["limit"];
			            
			            var curSt=(curIdx*data["limit"])-jmlData;
			            var st=start;
			            var btn="btn-default";
			            var lastSt=(jmlPage*data["limit"])-jmlData
			            var btnFirst="<button class='btn btn-default btn-sm' type='button' onclick='getBarang(0)'><span class='fa fa-angle-double-left'></span></button>";
			            if(curIdx>1){
			                var prevSt=((curIdx-1)*data["limit"])-jmlData;
			                btnFirst+="<button class='btn btn-default btn-sm' type='button' onclick='getBarang("+prevSt+")'><span class='fa fa-angle-left'></span></button>";
			            }

			            var btnLast="";
			            if(curIdx<jmlPage){
			                var nextSt=((curIdx+1)*data["limit"])-jmlData;
			                btnLast+="<button class='btn btn-default btn-sm' type='button' onclick='getBarang("+nextSt+")'><span class='fa fa-angle-right'></span></button>";
			            }
			            btnLast+="<button class='btn btn-default btn-sm' type='button' onclick='getBarang("+lastSt+")'><span class='fa fa-angle-double-right'></span></button>";
			            
			            if(jmlPage>=5){
			                if(curIdx>=2){
			                    var idx_start=curIdx - 1;
			                    var idx_end=idx_start+ 4;
			                    if(idx_end>=jmlPage) idx_end=jmlPage;
			                }else{
			                    var idx_start=1;
			                    var idx_end=5;
			                }
			                for (var j = idx_start; j<=idx_end; j++) {
			                    st=(j*data["limit"])-jmlData;
			                    if(curSt==st)  btn="btn-success"; else btn= "btn-default";
			                    btnIdx+="<button class='btn " +btn +" btn-sm' type='button' onclick='getBarang("+ st +")'>" + j +"</button>";
			                }
			            }else{
			                for (var j = 1; j<=jmlPage; j++) {
			                    st=(j*data["limit"])-jmlData;
			                    if(curSt==st)  btn="btn-success"; else btn= "btn-default";
			                    btnIdx+="<button class='btn " +btn +" btn-sm' type='button' onclick='getBarang("+ st +")'>" + j +"</button>";
			                }
			            }
			            pagination+=btnFirst + btnIdx + btnLast;
			            $('#pagination').html("Showing 11 to 20 of 1234 " + '<div class="btn-group">' + pagination+'</div>');
			        }
			    }
			}
	});
}


function enter_keyword(evt){
	var charCode = (evt.which) ? evt.which : event.keyCode;
	//console.log(charCode);
	if (charCode > 31 && (charCode < 48 || charCode > 57)){
		return false;
	}else{
		if(evt.keyCode==13){
			var jmldata=$('#jmldata').val();
			if(jmldata==1){
				$('#pilih0').focus();
			}else{
				$('#qkode').focus();
			}
			
	    }
	}
	return true;
}
function enter_kode(evt){
	var charCode = (evt.which) ? evt.which : event.keyCode;
	//console.log(charCode);
	if (charCode > 31 && (charCode < 48 || charCode > 57)){
		return false;
	}else{
		if(evt.keyCode==13){
			var jmldata=$('#jmldata').val();
			if(jmldata==1){
				$('#pilih0').focus();
			}else{
				$('#qnama').focus();
			}
	    }
	}
	return true;
}
function enter_nama(evt){
	var charCode = (evt.which) ? evt.which : event.keyCode;
	//console.log(charCode);
	if (charCode > 31 && (charCode < 48 || charCode > 57)){
		return false;
	}else{
		if(evt.keyCode==13){
			var jmldata=$('#jmldata').val();
			if(jmldata==1){
				$('#pilih0').focus();
			}else{
				$('#qsatuan').focus();
			}
	    }
	}
	return true;
}
function enter_satuan(evt){
	var charCode = (evt.which) ? evt.which : event.keyCode;
	//console.log(charCode);
	if (charCode > 31 && (charCode < 48 || charCode > 57)){
		return false;
	}else{
		if(evt.keyCode==13){
			var jmldata=$('#jmldata').val();
			if(jmldata==1){
				$('#pilih0').focus();
			}else{
				$('#qkategori').focus();
			}
	    }
	}
	return true;
}

function enter_kategori(evt){
	var charCode = (evt.which) ? evt.which : event.keyCode;
	//console.log(charCode);
	if (charCode > 31 && (charCode < 48 || charCode > 57)){
		return false;
	}else{
		if(evt.keyCode==13){
			$('#pilih0').focus();
	    }
	}
	return true;
}

function setBarang(kode,nama,satuan,kategori){
	//alert(kode);
	var Supllier=$('#KDSUPPLIER').val();
	var NOFAKTUR=$('#NOFAKTUR').val();
	var TGLFAKTUR=$('#TGLFAKTUR').val();
	var TGLTERIMA=$('#TGLTERIMA').val();
	var JTEMPO=$('#JTEMPO').val();
	var PEMBAYARAN=$('#PEMBAYARAN').val();
	if(Supllier==""){
		alert("Supplier Masih Kosong");
		$('#keyword').val("");
		$('#show_barang').val("0");
		$('#barang').hide();
		$('#KDSUPPLIER').select2('open');
		return false;
	}

	if(NOFAKTUR==""){
		alert("No faktur Masih Kosong");
		$('#keyword').val("");
		$('#show_barang').val("0");
		$('#barang').hide();
		$('#NOFAKTUR').focus();
		return false;
	}

	if(TGLFAKTUR==""){
		alert("Tanggal faktur Masih Kosong");
		$('#keyword').val("");
		$('#show_barang').val("0");
		$('#barang').hide();
		$('#TGLFAKTUR').focus();
		return false;
	}

	if(TGLTERIMA==""){
		alert("Tanggal Terima Masih Kosong");
		$('#keyword').val("");
		$('#show_barang').val("0");
		$('#barang').hide();
		$('#TGLTERIMA').focus();
		return false;
	}

	if(PEMBAYARAN=="CREDIT"){
		if(JTEMPO==""){
			alert("Tanggal faktur Masih Kosong");
			$('#keyword').val("");
			$('#show_barang').val("0");
			$('#barang').hide();
			$('#PEMBAYARAN').focus();
			return false;
		}
		
	}

	var JENIS_TRANS=$('#JENIS_TRANS').val();
	if(JENIS_TRANS=="2") $('#PPN').val("0.1"); else $('#PPN').val("0");
	$("#modal_transaksi").modal("show");
	$('#KDBRG').val(kode);
	$('#NMBRG').val(urldecode(nama));
	cekHpp(kode);
	$('#JMLBELI_BOX').val("");
	$('#KONVERSI').val("");
	$('#HBELI_BOX').val("");
	$('#P_DISKON').val("");
	$('#HJUALBOX').val("");
	$('#EXPDATE').val("");
	$('#JMLBELI').val("");
	$('#HBELI').val("");
	$('#HDISKON').val("");
	$('#HJUAL').val("");
	$('#SUBTOTAL').val("");
	$('#JUMLAH_PPN').val("");
    setTimeout(function () { $('#EXPDATE').focus(); }, 500);
	$('#keyword').val("");
	cariBarang(0);
	$('#show_barang').val("0");
	$('#barang').hide();
}
function cekHpp(kode){
	var url = base_url+"trans_pembelian/cekhpp/"+kode;
	$.ajax({
		url     : url,
		type    : "GET",
		dataType: "json",
		data    : {get_param : 'value'},
		success : function(data){
		    //menghitung jumlah data
		    console.clear();
		    if(data["status"]==true){
				$('#hpp').html("Rp. " + data.hpp);
				$('#x-hpp').val(data.hpp);
		    }
		}
	});
}

function setBarangmutasi(kode,nama,satuan,stok){
	var LOKASI_TUJUAN=$('#LOKASI_TUJUAN').val();
	var TGL_MUTASI=$('#TGL_MUTASI').val();
	
	if(LOKASI_TUJUAN==""){
		alert("Lakasi Tujuan Masih Kosong");
		$('#keyword').val("");
		$('#show_barang').val("0");
		$('#barang').hide();
		$('#LOKASI_TUJUAN').select2('open');
		return false;
	}

	if(TGL_MUTASI==""){
		alert("Tanggal Mutasi Masih Kosong");
		$('#keyword').val("");
		$('#show_barang').val("0");
		$('#barang').hide();
		$('#TGL_MUTASI').focus();
		return false;
	}
	
	$("#modal_transaksi").modal("show");
	$('#KDBRG').val(kode);
    $('#NMBRG').val(urldecode(nama));
    $('#JSTOK').val(stok);
    $('#NMSATUAN').val(satuan);
    $('#JMLMT').focus();
    setTimeout(function () { $('#JMLMT').focus(); }, 500);
	$('#JMLMT').val("");
}

function lihatDetailmutasi(kdmt){
	$("#modal_persetujuan").modal("show");
	var start = 0;
	var url = base_url+"persetujuan_mutasi/detail_mutasi/"+kdmt;
	$.ajax({
		url     : url,
		type    : "GET",
		dataType: "json",
		data    : {get_param : 'value'},
		success : function(data){
		    //menghitung jumlah data
		    console.clear();
		    if(data["status"]==true){
		        var barang    = data["data"];
		        //console.log(barang);
		        var jmlData=barang.length;
		        var limit   = data["limit"]
		        var tabel   = "";
		        //Create Tabel
		        for(var i=0; i<jmlData;i++){
		            start++;
		            tabel+='<tr>';
		            if(barang[i]["STATUSPENERIMAAN"]==1) {
		            	tabel+="<td style='text-align:center'>";
		            	tabel+="<input type='hidden' name='IDX[]' id='IDX"+barang[i]["IDX"]+"' value='"+barang[i]["IDX"]+"'>";
		            	tabel+="<input type='hidden' name='KDBRG"+barang[i]["IDX"]+"' id='KDBRG"+barang[i]["IDX"]+"' value='"+barang[i]["KDBRG"]+"'>";
		            	tabel+="<input type='hidden' name='KDMT"+barang[i]["IDX"]+"' id='KDMT"+barang[i]["IDX"]+"' value='"+barang[i]["KDMT"]+"'>";
		            	tabel+="<input type='hidden' name='NMBRG"+barang[i]["IDX"]+"' id='NMBRG"+barang[i]["IDX"]+"' value='"+barang[i]["NMBRG"]+"'>";
		            	tabel+="<input type='hidden' name='HMODAL"+barang[i]["IDX"]+"' id='HMODAL"+barang[i]["IDX"]+"' value='"+barang[i]["HMODAL"]+"'>";
		            	tabel+="<input type='hidden' name='TGLBELI"+barang[i]["IDX"]+"' id='TGLBELI"+barang[i]["IDX"]+"' value='"+barang[i]["TGLBELI"]+"'>";
		            	tabel+="<input type='hidden' name='JMLMT"+barang[i]["IDX"]+"' id='JMLMT"+barang[i]["IDX"]+"' value='"+barang[i]["JMLMT"]+"'>";
		            	tabel+="<input type='checkbox' id='STATUSPENERIMAAN"+barang[i]["IDX"]+"' class='STATUSPENERIMAAN' value='1' onclick='return false' checked >";
		            	tabel+="</td>";
		            }
		            else  {
		            	tabel+="<td style='text-align:center'>";
		            	tabel+="<input type='hidden' name='IDX[]' id='IDX' value='"+barang[i]["IDX"]+"'>";
		            	tabel+="<input type='hidden' name='KDBRG"+barang[i]["IDX"]+"' id='KDBRG' value='"+barang[i]["KDBRG"]+"'>";
		            	tabel+="<input type='hidden' name='KDMT"+barang[i]["IDX"]+"' id='KDMT' value='"+barang[i]["KDMT"]+"'>";
		            	tabel+="<input type='hidden' name='NMBRG"+barang[i]["IDX"]+"' id='NMBRG' value='"+barang[i]["NMBRG"]+"'>";
		            	tabel+="<input type='hidden' name='HMODAL"+barang[i]["IDX"]+"' id='HMODAL' value='"+barang[i]["HMODAL"]+"'>";
		            	tabel+="<input type='hidden' name='TGLBELI"+barang[i]["IDX"]+"' id='TGLBELI' value='"+barang[i]["TGLBELI"]+"'>";
		            	tabel+="<input type='hidden' name='JMLMT"+barang[i]["IDX"]+"' id='JMLMT' value='"+barang[i]["JMLMT"]+"'>";
		            	tabel+="<input type='checkbox' class='STATUSPENERIMAAN' id='STATUSPENERIMAAN"+barang[i]["IDX"]+"' name='STATUSPENERIMAAN"+barang[i]["IDX"]+"' value='1'>";
		            	tabel+="</td>";
		           	}
		           	tabel+="<td>"+barang[i]["KDBRG"]+"</td>";
		            tabel+="<td>"+barang[i]["NMBRG"]+"</td>";
		            tabel+="<td style='text-align:right'>"+barang[i]["JMLMT"]+"</td>";
		            
		            tabel+="</tr>";
		            //console.log(tabel);
		        }
		        $('#data-mutasi').html(tabel);
		    }
		}
	});
}

function setujui(){
	var url = base_url + "persetujuan_mutasi/setujui";
	//alert('url');
	var formData = new FormData($('#form2')[0]);
    $.ajax({
        url : url,
        type: "POST",
        data : formData,
        processData: false,
        contentType: false,
        dataType: 'JSON',
        success: function(data)
        {
            if(data["status"]==true){
                if(data["error"]==true){
                    alert(data["message"]);
                }else{
                    $('#modal_persetujuan').modal('hide');
                    alert(data["message"]);
                }
                getTable();
            }
            else{
                alert(data["message"])
            }
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert("Gagal Menyimpan Data")
        }
    });
}

function returMutasi(kdmt){
	$('#modal_retur').modal('show');
	var start = 0;
	var url = base_url+"persetujuan_mutasi/detail_mutasi/"+kdmt;
	$.ajax({
		url     : url,
		type    : "GET",
		dataType: "json",
		data    : {get_param : 'value'},
		success : function(data){
		    //menghitung jumlah data
		    console.clear();
		    if(data["status"]==true){
		        var barang    = data["data"];
		        console.log(barang);
		        var jmlData=barang.length;
		        var limit   = data["limit"]
		        var tabel   = "";
		        //Create Tabel
		        if(jmlData>0){
		        	$('#KDMT').val(barang[0]["KDMT"]);
		        	$('#LOKASI_TUJUAN').val(barang[0]["LOKASI_ASAL"]);
		        	$('#NAMA_LOKASI_TUJUAN').val(barang[0]["NAMA_LOKASI_ASAL"]);
		        	$('#LOKASI_ASAL').val(barang[0]["LOKASI_TUJUAN"]);
		        	$('#NAMA_LOKASI_ASAL').val(barang[0]["NAMA_LOKASI_TUJUAN"]);
		        	$('#tujuan').html("Dari "+barang[0]["NAMA_LOKASI_TUJUAN"] + " Ke " + barang[0]["NAMA_LOKASI_ASAL"]);
		        	for(var i=0; i<jmlData;i++){
			            start++;
			            tabel+='<tr>';
			            if(barang[i]["STATUSPENERIMAAN"]==1) {
			            	tabel+="<td style='text-align:center'>";
			            	tabel+="<input type='hidden' name='IDX[]' id='IDX"+barang[i]["IDX"]+"' value='"+barang[i]["IDX"]+"'>";
			            	tabel+="<input type='hidden' name='KDBRG"+barang[i]["IDX"]+"' id='KDBRG"+barang[i]["IDX"]+"' value='"+barang[i]["KDBRG"]+"'>";
			            	tabel+="<input type='hidden' name='KDMT"+barang[i]["IDX"]+"' id='KDMT"+barang[i]["IDX"]+"' value='"+barang[i]["KDMT"]+"'>";
			            	tabel+="<input type='hidden' name='NMBRG"+barang[i]["IDX"]+"' id='NMBRG"+barang[i]["IDX"]+"' value='"+barang[i]["NMBRG"]+"'>";
			            	tabel+="<input type='hidden' name='HMODAL"+barang[i]["IDX"]+"' id='HMODAL"+barang[i]["IDX"]+"' value='"+barang[i]["HMODAL"]+"'>";
			            	tabel+="<input type='hidden' name='TGLBELI"+barang[i]["IDX"]+"' id='TGLBELI"+barang[i]["IDX"]+"' value='"+barang[i]["TGLBELI"]+"'>";
			            	tabel+="<input type='hidden' name='JMLMT"+barang[i]["IDX"]+"' id='JMLMT"+barang[i]["IDX"]+"' value='"+barang[i]["JMLMT"]+"'>";
			            	tabel+="<input type='hidden' name='SUDAHRETUR"+barang[i]["IDX"]+"' id='SUDAHRETUR"+barang[i]["IDX"]+"' value='"+barang[i]["JMLRET"]+"'>";
			            	tabel+=start;
			            	tabel+="</td>";
			            }
			            
			           	tabel+="<td>"+barang[i]["KDBRG"]+"</td>";
			            tabel+="<td>"+barang[i]["NMBRG"]+"</td>";
			            tabel+="<td style='text-align:right'>"+barang[i]["JMLMT"]+"</td>";
			            tabel+="<td style='text-align:right'>"+barang[i]["JMLRET"]+"</td>";
			            tabel+="<td style='text-align:right; width:200px;'>";
			            tabel+="<input type='number' class='form-control input-sm' name='JMLRET"+barang[i]["IDX"]+"' id='JMLRET"+barang[i]["IDX"]+"' value='0' data-inputmask=\"'alias': 'decimal',  'autoGroup': true, 'digits': 0, 'digitsOptional': false, 'placeholder': '0'\" onkeyup='validasiMutasi(\""+barang[i]["IDX"]+"\")'>";
			            tabel+="</td>";
			            tabel+="</tr>";
			            //console.log(tabel);
			        }
		        }else{
		        	tabel+="<tr><td colspan=''>Data Tidak ada</td></tr>"
		        }
		        
		        $('#data-retur').html(tabel);
		        
		    }
		}
	});
}

function validasiMutasi(idx){
	//alert(idx);
	var SUDAHRETUR 	= $('#SUDAHRETUR'+idx).val();
	var JMLMT 		= $('#JMLMT'+idx).val();
	var SISA 		= parseInt(JMLMT)-parseInt(SUDAHRETUR);
	var JMLRET		= $('#JMLRET'+idx).val();
	//alert("JMLRET : " +JMLRET + " SISA : " + SISA);
	if(parseInt(JMLRET)>SISA){
		alert("Jumlah Retur Tidak boleh melebihi jumlah mutasi")
		$('#JMLRET'+idx).val("0");
	}
	return false;
}
function addReturmutasi(){
	var url = base_url + "persetujuan_mutasi/return_mutasi";
	//alert(url);
	var formData = new FormData($('#form_mutasi_retur')[0]);
    $.ajax({
        url : url,
        type: "POST",
        data : formData,
        processData: false,
        contentType: false,
        dataType: 'JSON',
        success: function(data)
        {
            if(data["status"]==true){
                if(data["error"]==true){
                    alert(data["message"]);
                }else{
                    $('#modal_retur').modal('hide');
                    alert(data["message"]);
                }
                getTable();
            }
            else{
                alert(data["message"])
            }
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert("Gagal Meretur Mutasi")
        }
    });
}

function lihatDetailreturmutasi(kdmt_ret){
	$("#modal_persetujuan").modal("show");
	var start = 0;
	var url = base_url+"retur_trans_mutasi/detail_retur_mutasi/"+kdmt_ret;
	console.log(url);
	$.ajax({
		url     : url,
		type    : "GET",
		dataType: "json",
		data    : {get_param : 'value'},
		success : function(data){
		    //menghitung jumlah data
		    console.clear();
		    if(data["status"]==true){
		        var barang    = data["data"];
		        //console.log(barang);
		        var jmlData=barang.length;
		        var limit   = data["limit"]
		        var tabel   = "";
		        //Create Tabel
		        for(var i=0; i<jmlData;i++){
		            start++;
		            tabel+='<tr>';
		            if(barang[i]["STATUSPERSETUJUAN"]==1) {
		            	tabel+="<td style='text-align:center'>";
		            	tabel+="<input type='hidden' name='IDX[]' id='IDX"+barang[i]["IDX"]+"' value='"+barang[i]["IDX"]+"'>";
		            	tabel+="<input type='hidden' name='KDBRG"+barang[i]["IDX"]+"' id='KDBRG"+barang[i]["IDX"]+"' value='"+barang[i]["KDBRG"]+"'>";
		            	tabel+="<input type='hidden' name='KDMT_RET"+barang[i]["IDX"]+"' id='KDMT_RET"+barang[i]["IDX"]+"' value='"+barang[i]["KDMT_RET"]+"'>";
		            	tabel+="<input type='hidden' name='NMBRG"+barang[i]["IDX"]+"' id='NMBRG"+barang[i]["IDX"]+"' value='"+barang[i]["NMBRG"]+"'>";
		            	tabel+="<input type='hidden' name='HMODAL"+barang[i]["IDX"]+"' id='HMODAL"+barang[i]["IDX"]+"' value='"+barang[i]["HMODAL"]+"'>";
		            	tabel+="<input type='hidden' name='TGLBELI"+barang[i]["IDX"]+"' id='TGLBELI"+barang[i]["IDX"]+"' value='"+barang[i]["TGLBELI"]+"'>";
		            	tabel+="<input type='hidden' name='JMLRET"+barang[i]["IDX"]+"' id='JMLRET"+barang[i]["IDX"]+"' value='"+barang[i]["JMLRET"]+"'>";
		            	tabel+="<input type='checkbox' id='STATUSPERSETUJUAN"+barang[i]["IDX"]+"' class='STATUSPERSETUJUAN' value='1' name='STATUSPERSETUJUAN"+barang[i]["IDX"]+"' onclick='return false' checked >";
		            	tabel+="</td>";
		            }
		            else  {
		            	tabel+="<td style='text-align:center'>";
		            	tabel+="<input type='hidden' name='IDX[]' id='IDX' value='"+barang[i]["IDX"]+"'>";
		            	tabel+="<input type='hidden' name='KDBRG"+barang[i]["IDX"]+"' id='KDBRG' value='"+barang[i]["KDBRG"]+"'>";
		            	tabel+="<input type='hidden' name='KDMT_RET"+barang[i]["IDX"]+"' id='KDMT_RET' value='"+barang[i]["KDMT_RET"]+"'>";
		            	tabel+="<input type='hidden' name='NMBRG"+barang[i]["IDX"]+"' id='NMBRG' value='"+barang[i]["NMBRG"]+"'>";
		            	tabel+="<input type='hidden' name='HMODAL"+barang[i]["IDX"]+"' id='HMODAL' value='"+barang[i]["HMODAL"]+"'>";
		            	tabel+="<input type='hidden' name='TGLBELI"+barang[i]["IDX"]+"' id='TGLBELI' value='"+barang[i]["TGLBELI"]+"'>";
		            	tabel+="<input type='hidden' name='JMLRET"+barang[i]["IDX"]+"' id='JMLRET' value='"+barang[i]["JMLRET"]+"'>";
		            	tabel+="<input type='checkbox' class='STATUSPERSETUJUAN' id='STATUSPERSETUJUAN"+barang[i]["IDX"]+"' name='STATUSPERSETUJUAN"+barang[i]["IDX"]+"' value='1'>";
		            	tabel+="</td>";
		           	}
		           	tabel+="<td>"+barang[i]["KDBRG"]+"</td>";
		            tabel+="<td>"+barang[i]["NMBRG"]+"</td>";
		            tabel+="<td style='text-align:right'>"+barang[i]["JMLRET"]+"</td>";
		            
		            tabel+="</tr>";
		            //console.log(tabel);
		        }
		        $('#data-mutasi').html(tabel);
		        
		    }
		}
	});
}

function setujuiRetur(){
	var url = base_url + "retur_trans_mutasi/setujui";
	//alert('url');
	var formData = new FormData($('#form2')[0]);
    $.ajax({
        url : url,
        type: "POST",
        data : formData,
        processData: false,
        contentType: false,
        dataType: 'JSON',
        success: function(data)
        {
            if(data["status"]==true){
                if(data["error"]==true){
                    alert(data["message"]);
                }else{
                    $('#modal_persetujuan').modal('hide');
                    alert(data["message"]);
                }
                getTable();
            }
            else{
                alert(data["message"])
            }
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert("Gagal Menyimpan Data")
        }
    });
}

/*Pencarian Pasien Untuk modul penjualan*/
function cariPasien(start=0){
	
	var show=$('#show_pasien').val();
	//kosongkanObjTemp();
	if(show==0){
		$('#pasien').show();
		$('#show_pasien').val("1");
		$('#qtgl').val("");
		$('#qnomr').val("");
		$('#qiddaftar').val("");
		$('#qregunit').val("");
		$('#qnama').val("");
		$('#qruang').val("");
		$('#qtgl').focus();
		getPasien(start);
	}else{
		$('#pasien').hide();
		$('#show_pasien').val("0");
	}
}

function enter_tgl(evt){
	var charCode = (evt.which) ? evt.which : event.keyCode;
	//console.log(charCode);
	if (charCode > 31 && (charCode < 48 || charCode > 57)){
		return false;
	}else{
		if(evt.keyCode==13){
			var jmldata=$('#jmldatap').val();
			if(jmldata==1){
				$('#pilihp0').focus();
			}else{
				$('#qnomr').focus();
			}
	    }
	}
	return true;
}
function enter_nomr(evt){
	var charCode = (evt.which) ? evt.which : event.keyCode;
	//console.log(charCode);
	if (charCode > 31 && (charCode < 48 || charCode > 57)){
		return false;
	}else{
		if(evt.keyCode==13){
			var jmldata=$('#jmldatap').val();
			if(jmldata==1){
				$('#pilihp0').focus();
			}else{
				$('#qiddaftar').focus();
			}
	    }
	}
	return true;
}

function enter_iddaftar(evt){
	var charCode = (evt.which) ? evt.which : event.keyCode;
	//console.log(charCode);
	if (charCode > 31 && (charCode < 48 || charCode > 57)){
		return false;
	}else{
		if(evt.keyCode==13){
			var jmldata=$('#jmldatap').val();
			if(jmldata==1){
				$('#pilihp0').focus();
			}else{
				$('#qregunit').focus();
			}
	    }
	}
	return true;
}

function enter_regunit(evt){
	var charCode = (evt.which) ? evt.which : event.keyCode;
	//console.log(charCode);
	if (charCode > 31 && (charCode < 48 || charCode > 57)){
		return false;
	}else{
		if(evt.keyCode==13){
			var jmldata=$('#jmldatap').val();
			if(jmldata==1){
				$('#pilihp0').focus();
			}else{
				$('#qnamapasien').focus();
			}
	    }
	}
	return true;
}

function enter_namapasien(evt){
	var charCode = (evt.which) ? evt.which : event.keyCode;
	//console.log(charCode);
	if (charCode > 31 && (charCode < 48 || charCode > 57)){
		return false;
	}else{
		if(evt.keyCode==13){
			var jmldata=$('#jmldatap').val();
			if(jmldata==1){
				$('#pilihp0').focus();
			}else{
				$('#qruang').focus();
			}
	    }
	}
	return true;
}

function enter_ruang(evt){
	var charCode = (evt.which) ? evt.which : event.keyCode;
	//console.log(charCode);
	if (charCode > 31 && (charCode < 48 || charCode > 57)){
		return false;
	}else{
		if(evt.keyCode==13){
			var jmldata=$('#jmldatap').val();
			$('#pilihp0').focus();
	    }
	}
	return true;
}

function enter_noresep(evt){
	var charCode = (evt.which) ? evt.which : event.keyCode;
	//console.log(charCode);
	if (charCode > 31 && (charCode < 48 || charCode > 57)){
		return false;
	}else{
		if(evt.keyCode==13){
			$('#TGLRESEP').focus();
	    }
	}
	return true;
}

function enter_tglresep(evt){
	var charCode = (evt.which) ? evt.which : event.keyCode;
	//console.log(charCode);
	if (charCode > 31 && (charCode < 48 || charCode > 57)){
		return false;
	}else{
		if(evt.keyCode==13){
			$('#keyword').focus();
	    }
	}
	return true;
}

function getPasien(start=0,lokasi=""){
	var show=$('#show_barang').val();
	
	var keyword=$('#keyword').val();
	if(keyword.length>1){
		if(show==0){
			$('#barang').show();
			$('#show_barang').val("1");
		}
	}
	var mulai = start+1;
	var qtanggal = $('#qtgl').val();
	var qnomr = $('#qnomr').val();
	var qiddaftar = $('#qiddaftar').val();
	var qregunit=$('#qregunit').val();
	var qnama = $('#qnama').val();
	var qruang=$('#qruang').val();
	var qlayanan=$("input[name='KDPELAYANAN']:checked").val();
	//alert(qlayanan);
	var url = base_url + "search/pasien?start="+start+"&tgl="+qtanggal+"&nomr="+qnomr+"&iddaftar="+qiddaftar+"&regunit="+qregunit+"&nama="+qnama+"&ruang="+qruang+"&layanan="+qlayanan;
		console.log(url);
	
	$.ajax({
			url     : url,
			type    : "GET",
			dataType: "json",
			data    : {get_param : 'value'},
			success : function(data){
			    //menghitung jumlah data
			    //console.clear();
			    $('#jmldatap').val(data["row_count"]);
			    if(data["status"]==true){
			        var barang    = data["data"];
			        var jmlData=barang.length;
			        var limit   = data["limit"]
			        var tabel   = "";
			        //Create Tabel
			        for(var i=0; i<jmlData;i++){
			            start++;
			            tabel+='<tr onclick=\'setPasien("' +barang[i]["nomr"] +'","' +barang[i]["id_daftar"] +'","' +barang[i]["reg_unit"] +'","' +barang[i]["nama_pasien"] +'","' +barang[i]["alamat"] +'","' +barang[i]["id_ruang"] +'","' +barang[i]["nama_ruang"] +'","' +barang[i]["dokterJaga"] +'","' +barang[i]["namaDokterJaga"] +'","' +barang[i]["id_cara_bayar"] +'","' +barang[i]["cara_bayar"] +'")\' >';
			            tabel+="<td>"+barang[i]["tgl_masuk"]+"</td>";
			            tabel+="<td>"+barang[i]["nomr"]+"</td>";
			            tabel+="<td>"+barang[i]["id_daftar"]+"</td>";
			            tabel+="<td>"+barang[i]["reg_unit"]+"</td>";
			            tabel+="<td>"+barang[i]["nama_pasien"] +" ("+barang[i]["alamat"]+")"+"</td>";
			            tabel+="<td>"+barang[i]["nama_ruang"]+"</td>";
			            tabel+='<td class=\'text-right\'>';
			            tabel+='<button type=\'button\' class=\'btn btn-success btn-xs\' id="pilihp'+i+'"  onclick=\'setPasien("' +barang[i]["nomr"] +'","' +barang[i]["id_daftar"] +'","' +barang[i]["reg_unit"] +'","' +barang[i]["nama_pasien"] +'","' +barang[i]["alamat"] +'","' +barang[i]["id_ruang"] +'","' +barang[i]["nama_ruang"] +'","' +barang[i]["dokterJaga"] +'","' +barang[i]["namaDokterJaga"] +'","' +barang[i]["id_cara_bayar"] +'","' +barang[i]["cara_bayar"] +'")\'><span class=\'fa fa-check\' ></span></button>';
			            tabel+='</td>';
			            tabel+="</tr>";
			        }
			        $('#data-pasien').html(tabel);
			        //Create Pagination
			        if(data["row_count"]<=limit){
			            $('#page-pasien').html("");
			        }else{
			            var pagination="";
			            var btnIdx="";
			            jmlPage=Math.ceil(data["row_count"]/limit);
			            offset  = data["start"] % limit;
			            curIdx  = Math.ceil((data["start"]/data["limit"])+1);
			            prev    = (curIdx-2) * data["limit"];
			            next    = (curIdx) * data["limit"];
			            
			            var curSt=(curIdx*data["limit"])-jmlData;
			            var st=start;
			            var btn="btn-default";
			            var lastSt=(jmlPage*data["limit"])-jmlData
			            var btnFirst="<button class='btn btn-default btn-sm' type='button' onclick='getPasien(0)'><span class='fa fa-angle-double-left'></span></button>";
			            if(curIdx>1){
			                var prevSt=((curIdx-1)*data["limit"])-jmlData;
			                btnFirst+="<button class='btn btn-default btn-sm' type='button' onclick='getPasien("+prevSt+")'><span class='fa fa-angle-left'></span></button>";
			            }

			            var btnLast="";
			            if(curIdx<jmlPage){
			                var nextSt=((curIdx+1)*data["limit"])-jmlData;
			                btnLast+="<button class='btn btn-default btn-sm' type='button' onclick='getPasien("+nextSt+")'><span class='fa fa-angle-right'></span></button>";
			            }
			            btnLast+="<button class='btn btn-default btn-sm' type='button' onclick='getPasien("+lastSt+")'><span class='fa fa-angle-double-right'></span></button>";
			            
			            if(jmlPage>=5){
			                if(curIdx>=2){
			                    var idx_start=curIdx - 1;
			                    var idx_end=idx_start+ 4;
			                    if(idx_end>=jmlPage) idx_end=jmlPage;
			                }else{
			                    var idx_start=1;
			                    var idx_end=5;
			                }
			                for (var j = idx_start; j<=idx_end; j++) {
			                    st=(j*data["limit"])-jmlData;
			                    if(curSt==st)  btn="btn-success"; else btn= "btn-default";
			                    btnIdx+="<button class='btn " +btn +" btn-sm' type='button' onclick='getPasien("+ st +")'>" + j +"</button>";
			                }
			            }else{
			                for (var j = 1; j<=jmlPage; j++) {
			                    st=(j*data["limit"])-jmlData;
			                    if(curSt==st)  btn="btn-success"; else btn= "btn-default";
			                    btnIdx+="<button class='btn " +btn +" btn-sm' type='button' onclick='getPasien("+ st +")'>" + j +"</button>";
			                }
			            }
			            pagination+=btnFirst + btnIdx + btnLast;
			            $('#page-pasien').html("Showing "+mulai+" to "+start+" of "+data["row_count"]+" " +pagination );
			        }
			    }
			}
	});
}

function setPasien1(a,b,c,d,e,f,g,h,i,j,k){
	$('#NOMR').val(a);
	$('#ID_DAFTAR').val(b);
	$('#REG_UNIT').val(urldecode(c));
	$('#NMPASIEN').val(urldecode(d));
	$('#ALMTPASIEN').val(urldecode(e));
	$('#KDRUANGAN').val(f);
	$('#NMRUANGAN').val(urldecode(g));
	$('#KDDOKTER').val(h);
	$('#NMDOKTER').val(urldecode(i));
	$('#KDJPASIEN').val(urldecode(j));
	$('#JNSPASIEN').val(urldecode(k));
	//alert(k);
	$('#pasien').hide();
	$('#show_pasien').val("0");
	$('#qtgl').val("");
	$('#qnomr').val("");
	$('#qiddaftar').val("");
	$('#qregunit').val("");
	$('#qnama').val("");
	$('#qruang').val("");
	$('#NORESEP').focus();
	/* onclick=\'setPasien(
	"' +barang[i]["nomr"] +'",
	"' +barang[i]["id_daftar"] +'",
	"' +barang[i]["reg_unit"] +'",
	"' +barang[i]["nama_pasien"] +',
	"' +barang[i]["alamat"] +',
	"' +barang[i]["id_ruang"] +',
	"' +barang[i]["nama_ruang"] +'",
	"' +barang[i]["dokterJaga"] +',
	"' +barang[i]["namaDokterJaga"] +'")\'*/

}

function cariBarangjual(start=0,lokasi=""){
	
	var show=$('#show_barang').val();
	//kosongkanObjTemp();
	if(show==0){
		$('#barang').show();
		$('#show_barang').val("1");
		$('#qkode').val("");
		$('#qnama').val("");
		$('#qbarang').val("");
		$('#qsatuan').val("");
		$('#qkategori').val("");
		$('#qkode').focus();
		getBarangjual(start,lokasi);
	}else{
		$('#barang').hide();
		$('#show_barang').val("0");
	}
}

function getBarangjual(start=0,lokasi=""){
	var cara_bayar= $('#KDJPASIEN').val();
	var show=$('#show_barang').val();
	var keyword=$('#keyword').val();
	if(keyword.length>1){
		if(show==0){
			$('#barang').show();
			$('#show_barang').val("1");
		}
	}
	var qkode = $('#qkode').val();
	var qnama = $('#qnama').val();
	var qsatuan = $('#qsatuan').val();
	var qkategori=$('#qkategori').val();
	if(lokasi==""){
		var url = base_url + "search/barang?start="+start+"&kode="+qkode+"&nama="+qnama+"&satuan="+qsatuan+"&kategori="+qkategori+"&keyword="+keyword;
		console.log(url);
	}else{
		var url = base_url + "search/barang/"+lokasi+"?start="+start+"&kode="+qkode+"&nama="+qnama+"&satuan="+qsatuan+"&kategori="+qkategori+"&keyword="+keyword;
		console.log(url);
	}
	var bg="";
	$.ajax({
			url     : url,
			type    : "GET",
			dataType: "json",
			data    : {get_param : 'value'},
			success : function(data){
			    //menghitung jumlah data
			    //console.clear();
			    $('#jmldata').val(data["row_count"]);
			    if(data["status"]==true){
			        var barang    = data["data"];
			        var jmlData=barang.length;
			        var limit   = data["limit"]
			        var tabel   = "";
			        //Create Tabel
			        for(var i=0; i<jmlData;i++){
			            start++;
			            if(parseInt(barang[i]["JSTOK"])<=0) bg="style='background:#e70f0f; color:#fff'"; else bg="";
			            tabel+='<tr onclick=\'setBarangJual("' +barang[i]["KDBRG"] +'","' +barang[i]["NMBRG"] +'","' +barang[i]["NMSATUAN"] +'","' +barang[i]["NMKTBRG"] +'","' +barang[i]["JSTOK"] +'","' +barang[i]["HJUAL"] +'")\' '+bg+'>';
			            tabel+="<td>"+barang[i]["KDBRG"]+"</td>";
			            tabel+="<td>"+barang[i]["NMBRG"]+"</td>";
			            tabel+="<td>"+barang[i]["JSTOK"]+ " <b>" +barang[i]["NMSATUAN"]+"</b></td>";
			            tabel+="<td>"+barang[i]["NMKTBRG"]+"</td>";
			            
			            //if(cara_bayar>1 || cara_bayar<7) tabel+="<td class='text-right'>Rp. "+barang[i]["HMODAL"]+"</td>";
			            //else tabel+="<td class='text-right'>Rp. "+barang[i]["HJUAL"]+"</td>";
			            tabel+="<td class='text-right'>Rp. "+barang[i]["HJUAL"]+"</td>";
			            tabel+='<td class=\'text-right\'>';
			            tabel+='<button type=\'button\' class=\'btn btn-success btn-xs\' id="pilih'+i+'" onclick=\'setBarangJual("' +barang[i]["KDBRG"] +'","' +barang[i]["NMBRG"] +'","' +barang[i]["NMSATUAN"] +'","' +barang[i]["NMKTBRG"] +'","' +barang[i]["JSTOK"] +'","' +barang[i]["HJUAL"] +'")\'><span class=\'fa fa-check\' ></span></button>';
 			            tabel+='</td>';
			            tabel+="</tr>";
			        }
			        $('#data-barang').html(tabel);
			        //Create Pagination
			        if(data["row_count"]<=limit){
			            $('#pagination').html("");
			        }else{
			            var pagination="";
			            var btnIdx="";
			            jmlPage=Math.ceil(data["row_count"]/limit);
			            offset  = data["start"] % limit;
			            curIdx  = Math.ceil((data["start"]/data["limit"])+1);
			            prev    = (curIdx-2) * data["limit"];
			            next    = (curIdx) * data["limit"];
			            
			            var curSt=(curIdx*data["limit"])-jmlData;
			            var st=start;
			            var btn="btn-default";
			            var lastSt=(jmlPage*data["limit"])-jmlData
			            var btnFirst="<button class='btn btn-default btn-sm' type='button' onclick='getBarangjual(0,\""+lokasi+"\")'><span class='fa fa-angle-double-left'></span></button>";
			            if(curIdx>1){
			                var prevSt=((curIdx-1)*data["limit"])-jmlData;
			                btnFirst+="<button class='btn btn-default btn-sm' type='button' onclick='getBarangjual("+prevSt+",\""+lokasi+"\")'><span class='fa fa-angle-left'></span></button>";
			            }

			            var btnLast="";
			            if(curIdx<jmlPage){
			                var nextSt=((curIdx+1)*data["limit"])-jmlData;
			                btnLast+="<button class='btn btn-default btn-sm' type='button' onclick='getBarangjual("+nextSt+",\""+lokasi+"\")'><span class='fa fa-angle-right'></span></button>";
			            }
			            btnLast+="<button class='btn btn-default btn-sm' type='button' onclick='getBarangjual("+lastSt+",\""+lokasi+"\")'><span class='fa fa-angle-double-right'></span></button>";
			            
			            if(jmlPage>=5){
			                if(curIdx>=2){
			                    var idx_start=curIdx - 1;
			                    var idx_end=idx_start+ 4;
			                    if(idx_end>=jmlPage) idx_end=jmlPage;
			                }else{
			                    var idx_start=1;
			                    var idx_end=5;
			                }
			                for (var j = idx_start; j<=idx_end; j++) {
			                    st=(j*data["limit"])-jmlData;
			                    if(curSt==st)  btn="btn-success"; else btn= "btn-default";
			                    btnIdx+="<button class='btn " +btn +" btn-sm' type='button' onclick='getBarangjual("+ st +",\""+lokasi+"\")'>" + j +"</button>";
			                }
			            }else{
			                for (var j = 1; j<=jmlPage; j++) {
			                    st=(j*data["limit"])-jmlData;
			                    if(curSt==st)  btn="btn-success"; else btn= "btn-default";
			                    btnIdx+="<button class='btn " +btn +" btn-sm' type='button' onclick='getBarangjual("+ st +",\""+lokasi+"\")'>" + j +"</button>";
			                }
			            }
			            pagination+=btnFirst + btnIdx + btnLast;
			            $('#pagination').html("Showing 11 to 20 of 1234 " + '<div class="btn-group">' + pagination + "</div>");
			        }
			    }
			}
	});
}

function setBarangJual(kode,nama,satuan,kategori, stok, hargajual){
	var REG_UNIT=$('#REG_UNIT').val();
	var ID_DAFTAR=$('#ID_DAFTAR').val();
	var NOMR=$('#NOMR').val();
	var NMPASIEN=$('#NMPASIEN').val();
	var NMRUANGAN=$('#NMRUANGAN').val();
	var JNSLAYANAN=$('#JNSLAYANAN').val();
	var CARA_BAYAR=$('#CARA_BAYAR').val();
	var KDDOKTER=$('#KDDOKTER').val();
	var NMRUANGAN=$('#NMRUANGAN').val();
	var NORESEP=$('#NORESEP').val();
	var TGLRESEP=$('#TGLRESEP').val();
	var TGLJUAL=$('#TGLJUAL').val();

	if(REG_UNIT==""){
		alert("Data Pasien Masih Kosong");
		$('#keyword').val("");
		$('#show_barang').val("0");
		$('#barang').hide();
		$('#ADD_PASIEN').focus();
		return false;
	}

	if(KDDOKTER==""){
		alert("Dokter Masih Kosong");
		$('#keyword').val("");
		$('#show_barang').val("0");
		$('#barang').hide();
		$('#KDDOKTER').focus();
		return false;
	}

	if(NORESEP==""){
		alert("No Resep Masih Kosong");
		$('#keyword').val("");
		$('#show_barang').val("0");
		$('#barang').hide();
		$('#NORESEP').focus();
		return false;
	}

	if(TGLRESEP==""){
		alert("Tanggal Resep Masih Kosong");
		$('#keyword').val("");
		$('#show_barang').val("0");
		$('#barang').hide();
		$('#TGLRESEP').focus();
		return false;
	}
	if(TGLJUAL==""){
		alert("Tanggal Jual Masih Kosong");
		$('#keyword').val("");
		$('#show_barang').val("0");
		$('#barang').hide();
		$('#TGLJUAL').focus();
		return false;
	}
	
	if(parseInt(stok)<=0){
		alert("Maaf Stok " + nama + " Kosong");
		return false;
	}
	
	$("#modal_transaksi").modal("show");
	$('#modal_transaksi').on('shown.bs.modal', function (e) {
                // do something...
                $('#HJUAL').focus();
                console.clear();
                getSatuan();
                getCarapakai();
                getWaktupakai();
                getKeterangan();
    });
	$('#KDBRG').val(kode);
    $('#NMBRG').val(urldecode(nama));
    $('#JSTOK').val(parseFloat(stok));
    $('#HJUAL').val(hargajual);
    $('#keyword').val("");
	//cariBarang(0);
	$('#show_barang').val("0");
	$('#barang').hide();
}

function getSatuan(){
        var jenis_obat=$('#jenis_obat').val();
        var url = base_url+"search/satuan_pemakaian/"+jenis_obat;
        $.ajax({
            url : url,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
                if(data["status"]==true){
                    var satuan=data["data"];
                    var jmlData=satuan.length;
                    var option="";
                    for(var i=0; i<jmlData;i++){
                        option+="<option value='"+satuan[i]["id_satuan"]+"'>"+satuan[i]["nama_satuan"]+"</option>";
                    }
                    option+="<option value='Lainnya'>Lainnya</option>";
                    $('#satuanAP').html(option);
                }else{
                    alert(data["message"]);
                }
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                
            }
        });
    }
    function getCarapakai(){
        var jenis_obat=$('#jenis_obat').val();
        var url = base_url+"search/cara_pakai/"+jenis_obat;
        //console.log(url);
        $.ajax({
            url : url,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
                if(data["status"]==true){
                    var satuan=data["data"];
                    var jmlData=satuan.length;
                    var option="";
                    for(var i=0; i<jmlData;i++){
                        option+="<option value='"+satuan[i]["id_cara"]+"'>"+satuan[i]["cara_pakai"]+"</option>";
                    }
                    option+="<option value='Lainnya'>Lainnya</option>";
                    $('#cara_pakai').html(option);
                }else{
                    alert(data["message"]);
                }
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                
            }
        });
    }
    function getWaktupakai(){
        var periode=$('#jmlHari').val();
        var url = base_url+"search/waktu_pakai/"+periode;
        //console.log(url);
        $.ajax({
            url : url,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
                if(data["status"]==true){
                    var waktu1=data["waktu1"];
                    //console.log(waktu1);
                    var jmlData1=waktu1.length;
                    var option1="";
                    for(var i=0; i<jmlData1;i++){
                        option1+="<option value='"+waktu1[i]["waktuid"]+"'>"+waktu1[i]["waktu_pakai"]+"</option>";
                    }
                    option1+="<option value='Lainnya'>Lainnya</option>";
                    $('#waktu2').html(option1);

                    var waktu2=data["waktu2"];
                    //console.log(waktu2);
                    var jmlData2=waktu2.length;
                    var option2="<option value=''>Pilih Waktu Pakai</option>";
                    for(var j=0; j<jmlData2;j++){
                        option2+="<option value='"+waktu2[j]["waktuid"]+"'>"+waktu2[j]["waktu_pakai"]+"</option>";
                    }
                    option2+="<option value='Lainnya'>Lainnya</option>";
                    $('#waktu3').html(option2);

                }else{
                    alert(data["message"]);
                }
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                
            }
        });
    }
    function getKeterangan(){
    	var jl = $('#JNSLAYANAN').val();
    	//alert(jl);
        var url = base_url+"search/keterangan/" + jl;
        console.clear();
        console.log(url);
        $.ajax({
            url : url,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
                if(data["status"]==true){
                    var keterangan=data["data"];
                    var jmlData=keterangan.length;
                    var option="<option value=''>Pilih Keterangan</option>";
                    for(var i=0; i<jmlData;i++){
                        option+="<option value='"+keterangan[i]["keteranganid"]+"'>"+keterangan[i]["keterangan"]+"</option>";
                    }
                    option+="<option value='Lainnya'>Lainnya</option>";
                    $('#keterangan').html(option);
                }else{
                    alert(data["message"]);
                }
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                
            }
        });
	}
	function showLog(idx, kdbrg,hmodal,expdate, hbeli, tglbeli){
		var show_status = $('#show'+idx).val();
		if(show_status=="0"){
			$('#show' + idx).val("1");
			$('.detail').hide();
			$('#detail'+idx).show();
			$('.icon').removeClass('fa-minus');
			$('.icon').addClass('fa-plus');
			$('#icon' + idx).removeClass("fa-plus");
			$('#icon' + idx).addClass("fa-minus");
			var url = base_url + "trans_pembelian/getlog?kdbrg=" + kdbrg + "&hmodal=" + hmodal + "&expdate=" + expdate + "&hbeli=" + hbeli + "&tglbeli=" + tglbeli;
			console.log(url);
			$.ajax({
				url: url,
				type: "GET",
				dataType: "JSON",
				success: function (data) {
					console.log(data);
					if (data["status"] == true) {
						var log = data["log"];
						var jmlData = log.length;
						var tabel = "";
						var jenis_transaksi="";
						var jmlbrg=0;
						jnstrans="";
						var sisa=0;
						var sisa_disini =0 ;
						var sisa_barang=0;
						var kdlokasi="";
						var KDLTSTART="";
						var desc="";
						var nama_lokasi = log[0]["NMLOKASI"];
						for (var i = 0; i < jmlData; i++) {
							if (i == 0) KDLTSTART=log[i]["KDLT"];
							if (kdlokasi == "") kdlokasi = log[i]["KDLOKASI"];
							sisa_barang = getSisa(kdbrg, hmodal, expdate, hbeli, tglbeli, KDLTSTART, log[i]["KDLT"], log[i]["KDLOKASI"]);
							if (kdlokasi != log[i]["KDLOKASI"]){
								sisa = getSisa(kdbrg, hmodal, expdate, hbeli, tglbeli,KDLTSTART, log[i]["KDLT"],log[i]["KDLOKASI"]);
								//return false;
								//sisa = 0;
							}else{
								sisa_disini += parseInt(log[i]["JMASUK"]);
							}
							if (log[i]["JTRANS"]=="BL"){
								jenis_transaksi = "Pembelian Barang ";
								jmlbrg = log[i]["JMASUK"];
								//sisa = parseInt(log[i]["JMASUK"]);
								sisa = parseInt(sisa_disini);
								desc = "Masuk Ke " + log[i]["NMLOKASI"];
								//sisa_disini=sisa;

							} else if (log[i]["JTRANS"] == "MT"){
								if (log[i]["JMASUK"]>0){
									jenis_transaksi = "Mutasi Barang ";
									jmlbrg = log[i]["JMASUK"];
									sisa += parseInt(log[i]["JMASUK"]);
									desc = "Masuk Ke " + log[i]["NMLOKASI"];
									//sisa+=parseInt(sisa_disini);
								}else{
									jenis_transaksi = "Mutasi Barang ";
									jmlbrg = log[i]["JKELUAR"];
									sisa_disini -= parseInt(log[i]["JKELUAR"]);
									sisa=sisa_disini;
									desc = "Keluar Dari " + log[i]["NMLOKASI"];
								}
								
							} else if (log[i]["JTRANS"] == "JL") {
								jenis_transaksi = "Penjualan Barang";
								jmlbrg = log[i]["JKELUAR"];
								sisa -= parseInt(log[i]["JKELUAR"]);
								desc = "Keluar Dari " + log[i]["NMLOKASI"];
							}
							if(nama_lokasi==log[i]["NMLOKASI"]) var style = 'bg-yellow'; else var style="";
							tabel += "<tr class='"+style+"'>"
								+ "<td>" + log[i]["NOREFF"] + "</td >"
								+ "<td>" + log[i]["DTTRANS"] + "</td >"
								+"<td>"+jenis_transaksi+"</td >"
								+ "<td>" + desc + "</td>"
								+"<td>"+jmlbrg+"</td>"
								+"<td>"+sisa_barang+"</td>"
							+"</tr >";
							kdlokasi = log[i]["KDLOKASI"];
						}
						
						$('#detail_data'+idx).html(tabel);
					} else {
						alert(data["message"]);
					}
				},
				error: function (jqXHR, textStatus, errorThrown) {

				}
			});
		}else{
			$('#icon' + idx).removeClass("fa-minus");
			$('#icon' + idx).addClass("fa-plus");
			$('#show' + idx).val("0");
			$('#detail' + idx).hide();
		}
		
	}

function getSisa(kdbrg, hmodal, expdate, hbeli, tglbeli, KDLTSTART, KDLTSTOP, lokasi){
	var url = base_url + "trans_pembelian/getlogsisa?kdbrg=" + kdbrg + "&hmodal=" + hmodal + "&expdate=" + expdate + "&hbeli=" + hbeli + "&tglbeli=" + tglbeli + "&dari=" + KDLTSTART + "&sampai=" + KDLTSTOP + "&lokasi=" + lokasi;
		console.log(url);
		var sisa=0;
		$.ajax({
			url: url,
			type: "GET",
			dataType: "JSON",
			async:false,
			success: function (data) {
				
				sisa = parseInt(data["log"]["SISA"]);
				console.log(data["log"]["SISA"]);
			}
		});
		return sisa;
}
function updateNoFaktur(){
	var url = base_url + "trans_pembelian/updatenofaktur";
	var formItems = {};
	formItems['faktur_lama'] = $('#faktur_lama').val();
	formItems['faktur_baru'] = $('#NOFAKTUR').val();
	formItems['kdbl'] = $('#KDBL').val();
	console.log(formItems);
	$.ajax({
		url:url,
		type: "POST",
		data: formItems,
		dataType: "JSON",
		success: function (data) {
			alert(data.message)
		},
		error: function (xhr, ajaxOption, thrownError) {
			console.log('Response : ' + thrownError);
		}
	});
}

const formatter = new Intl.NumberFormat('id-ID');
function enterKeywordKasir(evt) {
	var charCode = (evt.which) ? evt.which : event.keyCode;
	if(evt.keyCode==13){
		riwayatKunjungan(1);
	}
	return true;
}
function riwayatKunjungan(start, aksi = '') {
	$('#start').val(start);
	var search = $('#q').val();
	var limit = $('#limit').val();
	var active = "class='btn btn-primary btn-sm'";
	var jns = $("input[name='jnslayanan']:checked").val();
	
	var url = base_url + "pemakaian_obat/riwayat_kunjungan?q=" + search + "&start=" + start + "&limit=" + limit + "&jns=" + jns;
	//alert(url);
	console.clear();
	console.log(url);
	$.ajax({
		url: url,
		type: "GET",
		dataType: "json",
		data: { get_param: 'value' },
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
		success: function (data) {
			//menghitung jumlah data

			if (data["status"] == true) {
				var kj = data["data"];
				var jmlData = kj.length;
				var limit = data["limit"];
				var tabel = "";
				//Create Tabel
				var no = (parseInt(start) * parseInt(limit)) - parseInt(limit);
				var dari = no + 1;
				var sampai = dari + parseInt(limit);
				var desc = "<button class='btn btn-default btn-sm' type='button'>Showing " + dari + " To " + sampai + " of " + data["row_count"] + "</button>";
				var kwitansi = "";
				var hakKelas;
				for (var i = 0; i < jmlData; i++) {
					no++;
					//kwitansi = cekKwitansi(kj[i]["id_daftar"]);
					console.log("Hak Kelas : " + kj[i]["hakKelas"] + " Kelas Layanan : " + kj[i]["hakKelas"]);
					if (aksi == "") tabel = "<tr>"; else tabel += "<tr>";
					tabel += "<td>" + no + "</td>";
					tabel += "<td>" + kj[i]["no_ktp"] + "</td>";
					tabel += "<td>" + kj[i]["id_daftar"] + "</td>";
					tabel += "<td>" + kj[i]["reg_unit"] + "</td>";
					tabel += "<td>" + kj[i]["nomr"] + "</td>";
					tabel += "<td>" + kj[i]["nama_pasien"] + "</td>";
					if (kj[i]["jns_kelamin"] == "P" || kj[i]["jns_kelamin"] == "0") tabel += "<td>Perempuan</td>";
					else tabel += "<td>Laki Laki</td>";
					tabel += "<td>" + kj[i]["no_bpjs"] + "</td>";
					if (kj[i]["jns_layanan"] != "RI") {
						tabel += "<td class='ranap'>-</td>";
					} else {
						if (kj[i]["hakKelasid"] != null) {
							hakKelas = parseInt(kj[i]["hakKelasid"]);
							if (kj[i]["id_kelas"] == hakKelas) tabel += "<td class='ranap'>" + kj[i]["kelas_layanan"] + "</td>";
							else tabel += "<td class='ranap'>" + kj[i]["kelas_layanan"] + " (Naik Kelas dari " + kj[i]["hakKelas"] + ")</td>"
						} else {
							tabel += "<td class='ranap'>" + kj[i]["kelas_layanan"] + " </td>"
						}

					}

					tabel += "<td>" + kj[i]["nama_ruang"] + "</td>";
					tabel += "<td>" + kj[i]["rujukan"] + "</td>";
					tabel += "<td style='text-align:right;'><a href='" + base_url + "pemakaian_obat/detail/" + kj[i]["reg_unit"] + "' class='btn btn-danger btn-sm'><span class='fa fa-search'></span>&nbsp; Detail</a></td>";
					tabel += "</tr>";
					if (aksi == "") $('#riwayat_kunjungan').append(tabel);
				}
				if (aksi != "") $('#riwayat_kunjungan').html(tabel)
				//Create Pagination
				if (data["row_count"] <= limit) {
					$('#pagination').html("");
				} else {
					console.log("buat Pagination");
					var pagination = "";
					var btnIdx = "";
					jmlPage = Math.ceil(data["row_count"] / limit);
					offset = data["start"] % limit;
                    /*curIdx  = Math.ceil((data["start"]/data["limit"])+1);
                    prev    = (curIdx-2) * data["limit"];
                    next    = (curIdx) * data["limit"];*/


					//var curSt=(curIdx*data["limit"])-jmlData;
					//var mulai = start;
					var curIdx = start;
					var btn = "btn-default";
					//var lastSt=jmlPage;
					var btnFirst = "<button class='btn btn-default btn-sm' onclick='riwayatKunjungan(1)'><span class='fa fa-angle-double-left'></span></button>";
					if (curIdx > 1) {
						var prevSt = curIdx - 1;
						btnFirst += "<button class='btn btn-default btn-sm' onclick='riwayatKunjungan(" + prevSt + ")'><span class='fa fa-angle-left'></span></button>";
					}

					var btnLast = "";
					if (curIdx < jmlPage) {
						var nextSt = curIdx + 1;
						btnLast += "<button class='btn btn-default btn-sm' onclick='riwayatKunjungan(" + nextSt + ")'><span class='fa fa-angle-right'></span></button>";
					}
					console.log(curIdx);
					btnLast += "<button class='btn btn-default btn-sm' onclick='riwayatKunjungan(" + jmlPage + ")'><span class='fa fa-angle-double-right'></span></button>";

					if (jmlPage >= 5) {
						console.clear();
						console.log('Jumlah Halaman > 5');
						if (curIdx >= 3) {
							console.log('Cur Idx >= 3');
							var idx_start = curIdx - 2;
							var idx_end = curIdx + 2;
							if (idx_end >= jmlPage) idx_end = jmlPage;
						} else {
							var idx_start = 1;
							var idx_end = 5;
						}
						for (var j = idx_start; j <= idx_end; j++) {
							if (curIdx == j) btn = "btn-success"; else btn = "btn-default";
							btnIdx += "<button class='btn " + btn + " btn-sm' onclick='riwayatKunjungan(" + j + ")'>" + j + "</button>";
						}
					} else {

						for (var j = 1; j <= jmlPage; j++) {
							if (curIdx == j) btn = "btn-success"; else btn = "btn-default";
							btnIdx += "<button class='btn " + btn + " btn-sm' onclick='riwayatKunjungan(" + j + ")'>" + j + "</button>";
						}
					}
					pagination += "<div class='btn-group'>" + desc + btnFirst + btnIdx + btnLast + "</div>";
					$('#pagination').html(pagination);
				}
			}
		},
		complete: function () {
			$('#loading').hide();
		}
	});

	
}

function lock(kdjl){
	var url = base_url + "trans_pembelian/lock/"+kdjl;
	console.log(url);
	$.ajax({
		url: url,
		type: "GET",
		dataType: "json",
		data: { get_param: 'value' },
		success: function (data) {
			//tampilkanPesan('success', data.message);
			location.reload(); 
		},
		error: function (xhr, ajaxOption, thrownError) {
			console.log('Response : ' + thrownError);
			tampilkanPesan('error','Terjadi kesalahan')
		}
	});
}

function unlock(kdjl){
	var url = base_url + "trans_pembelian/unlock/"+kdjl;
	console.log(url);
	$.ajax({
		url: url,
		type: "GET",
		dataType: "json",
		data: { get_param: 'value' },
		success: function (data) {
			//tampilkanPesan('success', data.message);
			location.reload(); 
		},
		error: function (xhr, ajaxOption, thrownError) {
			console.log('Response : ' + thrownError);
			tampilkanPesan('error','Terjadi kesalahan')
		}
	});
}
function editFaktur(idx) {
	$('#PINIDX').val(idx);
	$("#modal_edit_transaksi").modal("show");
	$('#form_pin').show();
	$('#form2').hide();
	$('#update').prop('disabled', true);
}
function cekPin() {
	var idx = $('#PINIDX').val();
	var pin = $('#PIN').val();
	var kdbl = $('#PINKDBL').val();
	var kdlokasi = $('#PINKDLOKASI').val();
	var tglterima = $('#TGLTERIMA').val();
	$.ajax({
		url: base_url+"trans_pembelian/cekpin",
		type: "POST",
		data: {
			IDX: idx,
			PIN: pin,
			KDBL: kdbl,
			KDLOKASI: kdlokasi,
			TGLTERIMA : tglterima
		},
		dataType: "JSON",
		success: function(data) {
			if (data.status == false) {
				tampilkanPesan('error', data.message);
			} else {
				$('#form_pin').hide();
				$('#update').prop('disabled', false);
				tampilkanPesan('success', data.message);
				var item = data.data;
				console.log(item);
				$('#form2').show();
				$('#IDX').val(item.IDX);
				$('#KDBRG').val(item.KDBRG);
				$('#NMBRG').val(item.NMBRG);
				var expdate = item.EXPDATE;
				var tgl = expdate.split('-'); 
				var tglexp = tgl[2] +"-"+tgl[1]+"-"+tgl[0];
				$('#EXPDATE').val(tglexp);
				$('#JMLBELI').val(item.JMLBELI);
				$('#HBELI').val(item.HBELI);
				$('#HDISKON').val(item.HDISKON);
				$('#HMODAL').val(item.HMODAL);
				//alert(JSTOK);
				$('#JSTOK').val(data.JSTOK);

				$('#OLDEXPDATE').val(item.EXPDATE);
				$('#OLDJMLBELI').val(item.JMLBELI);
				$('#OLDHBELI').val(item.HBELI);
				$('#OLDHDISKON').val(item.HDISKON);
				$('#OLDHMODAL').val(item.HMODAL);

				var HJUAL = 1.2 * parseFloat(item.HMODAL);
				var ppn = 0.1 * parseFloat(item.SUBTOTAL);
				$('#HJUAL').val(HJUAL);
				$('#JUMLAH_PPN').val(ppn);
				$('#SUBTOTAL').val(item.SUBTOTAL);
			}
		},
		error: function(jqXHR, ajaxOption, errorThrown) {
			console.log(jqXHR.responseText);
		}
	});
}