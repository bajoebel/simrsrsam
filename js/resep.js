function urldecode(str) {
    return decodeURIComponent((str + '').replace(/%(?![\da-f]{2})/gi, function () {
          return '%25'
    }).replace(/\+/g, '%20'))
}

function cariBarang(start=0){
	var lokasi = $('#lokasi').val();
	console.clear();
	console.log(lokasi);
	alert(lokasi);
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
	var lokasi = $('#lokasi').val();
	//alert(lokasi);
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
			            $('#pagination').html("Showing 11 to 20 of 1234 " +pagination );
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
    
    setTimeout(function () { $('#EXPDATE').focus(); }, 500);
	$('#keyword').val("");
	cariBarang(0);
	$('#show_barang').val("0");
	$('#barang').hide();
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

function cariBarangjual(start=0){
	var lokasi = $('#lokasi').val();
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
			            if(parseInt(barang[i]["JSTOK"])<=0) bg="style='background:#bab1b1; color:#000'"; else bg="";
			            tabel+='<tr onclick=\'setBarangJual("' +barang[i]["KDBRG"] +'","' +barang[i]["NMBRG"] +'","' +barang[i]["NMSATUAN"] +'","' +barang[i]["NMKTBRG"] +'","' +barang[i]["JSTOK"] +'","' +barang[i]["HJUAL"] +'")\' '+bg+'>';
			            tabel+="<td>"+barang[i]["KDBRG"]+"</td>";
			            tabel+="<td>"+barang[i]["NMBRG"]+"</td>";
			            tabel+="<td>"+barang[i]["JSTOK"]+ " <b>" +barang[i]["NMSATUAN"]+"</b></td>";
			            tabel+="<td>"+barang[i]["NMKTBRG"]+"</td>";
			            
			            //if(cara_bayar>1 || cara_bayar<7) tabel+="<td class='text-right'>Rp. "+barang[i]["HMODAL"]+"</td>";
			            //else tabel+="<td class='text-right'>Rp. "+barang[i]["HJUAL"]+"</td>";
			            tabel+="<td class='text-right'>Rp. "+barang[i]["HJUAL"]+"</td>";
			            tabel+='<td class=\'text-right\'>';
			            if(bg=="") tabel+='<button type=\'button\' class=\'btn btn-success btn-xs\' id="pilih'+i+'" onclick=\'setBarangJual("' +barang[i]["KDBRG"] +'","' +barang[i]["NMBRG"] +'","' +barang[i]["NMSATUAN"] +'","' +barang[i]["NMKTBRG"] +'","' +barang[i]["JSTOK"] +'","' +barang[i]["HJUAL"] +'")\'><span class=\'fa fa-check\' ></span></button>';
 			            else tabel+='<button type=\'button\' class=\'btn btn-danger btn-xs\' id="pilih'+i+'" disabled ><span class=\'fa fa-ban\' ></span></button>';
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
			            $('#pagination').html("Showing 11 to 20 of 1234 " +pagination );
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

    function simpanResep(){
    	var waktu1=$('#waktu1').val();
        var wm="";
        if(waktu1=="0"||waktu1==""){
            wm="";
        }else{
            wm=waktu1 + " Jam ";
        }
        var wm3="";
        var waktu3=$('#waktu3').val();
        if(waktu3==""){
            wm3="";
        }else{
            wm3=$('#waktu3 :selected').html() +",";
        }

        var ket="";
        var keterangan=$('#keterangan').val();
        if(keterangan==""){
            ket="";
        }else{
            ket=$('#keterangan :selected').html();
        }

        var formItems = {};
            formItems['idx_pendaftaran'] = $('#idx_pendaftaran').val();
            formItems['NMBRG'] = $('#NMBRG').val();
            formItems['JSTOK'] = $('#JSTOK').val();
            formItems['HJUAL'] = $('#HJUAL').val();
            formItems['JMLJUAL'] = $('#JMLJUAL').val();
            formItems['DISKON'] = $('#DISKON').val();
            formItems['R'] = $('#R').val();
            formItems['SUBTOTAL'] = $('#SUBTOTAL').val();
            formItems['AP'] = $('#jmlHari').val()+" x Sehari, "+ $('#jmlSatuanAP').val() + " " +$('#satuanAP :selected').html() + ", "+$('#cara_pakai :selected').html()+" " + wm  + $('#waktu2 :selected').html() + ", " + wm3 + ket ;

            //$('#dokterJaga :selected').html()
            formItems['AP_JENISOBAT'] = $('#jenis_obat').val()+"#"+$('#jenis_obat :selected').html();
            formItems['AP_JMLHARI'] = $('#jmlHari').val();
            formItems['AP_JMLSATUAN'] = $('#jmlSatuanAP').val();
            formItems['AP_SATUAN'] = $('#satuanAP').val()+"#"+ $('#satuanAP :selected').html();
            formItems['AP_CARAPAKAI'] = $('#cara_pakai').val()+"#"+$('#cara_pakai :selected').html();
            formItems['AP_WAKTUJML'] = $('#waktu1').val(); //Dalam Jam
            formItems['AP_WAKTUPAKAI'] = $('#waktu2').val()+"#"+$('#waktu2 :selected').html();
            formItems['AP_WAKTUKET'] = $('#waktu3').val()+"#"+$('#waktu3 :selected').html();
            formItems['AP_KET'] = $('#keterangan').val()+"#"+$('#keterangan :selected').html();
            formItems['AP_EXPDATE'] = $('#expdate').val();

        if(formItems['KDBRG']==""){
            $('#ADDBARANG').click();
        }else if(formItems['JSTOK']=="" || formItems['JSTOK']=="0"){
            alert("Stok tidak boleh kosong");
        }else if(formItems['HJUAL']=="" || formItems['HJUAL']=="0"){
            alert("Harga jual tidak boleh kosong");
        }else if(formItems['JMLJUAL']=="" || formItems['JMLJUAL']=="0"){
            alert("Jumlah jual masih kosong");
            $('#JMLJUAL').focus();
        }else if(formItems['R']=="" || formItems['R']=="0"){
            alert("Nilai R tidak boleh kosong. Silahkan refresh browser anda!");
        }else if(formItems['SUBTOTAL']=="" || formItems['SUBTOTAL']=="0"){
            alert("Subtotal tidak boleh kosong. Silahkan refresh browser anda!");
        }else{  
            $.ajax({
                url         : "<?php echo base_url().'farmasi.php/trans_penjualan/simpanTemp' ?>",
                type        : "POST",
                data        : formItems,
                dataType    : "JSON",
                success     : function(data){
                    getTemp();
                    if(data.code==200){
                        var masih = confirm("Apakah Masih ada data?");
                        if (masih == true) {
                          $('#keyword').focus();
                          $('#barang').hide();
                        } else {
                          $('#simpan').focus();
                          $('#barang').hide();
                        } 
                        kosongkanObjTemp();
                        $("#modal_transaksi").modal("hide");
                        
                    }else{
                        alert(data.message);
                    }
                },
                error       : function(xhr, ajaxOption, thrownError){
                    console.log('Response : ' + thrownError);
                }
            }); 
        }
    }