$(document).ready(function() {
    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true
    });
	$.widget("custom.cariobat", $.ui.autocomplete, {
		_create: function() {
			this._super();
			this.widget().menu("option", "items", "> li:not(.ui-autocomplete-header)");
		},
		_renderMenu(ul, items) {
			var self = this;
			
			let header = {
					kode: "KODE",
					nama: "NAMA OBAT",
					isheader: true
				};
				self._renderItemData(ul, header);
				$.each(items, function(index, item) {
					self._renderItemData(ul, item);
				});
				console.clear();
				
			

		},
		_renderItemData(ul, item) {
			return this._renderItem(ul, item).data("ui-autocomplete-item", item);
		},
		_renderItem(ul, item) {
			var li = $("<li class='ui-menu-item' role='presentation'></li>");
			if (item.isheader)
				li = $("<li class='ui-autocomplete-header' role='presentation'  style='font-weight:bold !important;'></li>");
			var jual_tipe=$('#jual_tipe').val();
			
			var content = "<div class='row ui-menu-item-wrapper'>" +
				"<div class='col-xs-3'>" + item.kode + "</div>" +
				"<div class='col-xs-9'>" + item.nama + "</div>" +
				"</div>";
			
			li.html(content);
			console.log(content);

			return li.appendTo(ul);
		}

	});

	$("#keywordObat").cariobat({
		minLength: 1,
		source: function(request, response) {
			var url = base_url+"vclaim/referensi/obatprb";
			console.log(url);
			$.ajax({
				url:url,
				dataType: "JSON",
				method: "GET",
				data: {
					param: request.term
				},
				success: function(data) {
					console.log(data)
					if(data.metaData.code==200){
						var barang = data.response.list;
						response(barang.slice(0, 15));
						$('#err_obat').html("");
					}else{
						$("#keywordObat").removeClass("ui-autocomplete-loading");
						$('#err_obat').html(data.metaData.message);
					}
					if(request.term=="") $('#err_obat').html("");
				},
				error: function(jqXHR, ajaxOption, errorThrown) {
					console.log(errorThrown);
				}
			});
		},
		focus: function(event, ui) {
			/*$("#KDDOKTER").val(ui.item['NRP']);
			$("#NMDOKTER").val(ui.item['pgwNama']);*/
			$("#keywordObat").removeClass("ui-autocomplete-loading");
			return false;
		},
		select: function(event, ui) {
			
			$("#keywordObat").removeClass("ui-autocomplete-loading");
			$('#keywordObat').val("");
			tambahObat(ui.item['kode'],ui.item['nama']);
			//alert("harga Focus");
			$('#harga').focus();
			//setBarangJual(ui.item['KDBRG'], ui.item['NMBRG'], ui.item['NMSATUAN'], ui.item['NMKTBRG'], ui.item['JSTOK'], ui.item['HJUAL']);
			return false;
		}
	});
    diagnosaprb();
});

function tambahObat(kode, nama){
	
	var formData = {
		noSep : $('#noSep').val(),
		kdObat: kode, //Baru
		nmObat: nama, //Baru
	}
	console.clear();
	// console.log(formData);
	// var formData = new FormData($('#theform')[0]);
	$.ajax({
		url         : url_call_back+"/vclaim/prb/addobat",
		type        : "POST",
		data        : formData,
		dataType    : "JSON",
		success     : function(data){
			console.clear();
			console.log(data);
			var noSep=$('#noSep').val();
			getTempPrb(noSep);
		},
		error       : function(jqXHR,ajaxOption,errorThrown){
			console.log(jqXHR.responseText);                    
		}
	});
}
function getTempPrb(noSep){
	var url = base_url+"vclaim/prb/listtempprb/"+noSep;
	console.log(url);
	$.ajax({
		url:url,
		dataType: "JSON",
		method: "GET",
		data: {},
		success: function(data) {
			console.log(data)
			var table='';
			for (let i = 0; i < data.length; i++) {
				table+='<tr><td>'+data[i].kdObat+'</td>'+
				'<td>'+data[i].nmObat+'</td>'+
				'<td>'+
				'<input type="hidden" name="kode'+i+'" id="kode'+i+'" value="'+data[i].kdObat+'">'+
				'<input type="hidden" name="nama'+i+'" id="nama'+i+'" value="'+data[i].nmObat+'">'+
				'<input type="hidden" name="idx[]" id="idx'+i+'" value="'+i+'">'+
				'<input type="text" name="signa1'+i+'" id="signa1'+i+'" value="" class="form-control">'+
				'</td>'+
				'<td>'+
				'<input type="text" name="signa2'+i+'" id="signa2'+i+'" value="" class="form-control">'+
				'</td>'+
				'<td>'+
				'<input type="text" name="jmlObat'+i+'" id="jmlObat'+i+'" value="" class="form-control">'+
				'</td>'+
				'<td><button type="button" class="btn btn-danger btn-sm" onclick="removeTemp('+data[i].idx+')"><span class="fa fa-remove"></span></button>'+
				'</td>'+
				'</tr>';
			}
			$('#dataobat').html(table);
		},
		error: function(jqXHR, ajaxOption, errorThrown) {
			console.log(errorThrown);
		}
	});
}
function diagnosaprb(){
	$.ajax({
		url         : url_call_back+"/vclaim/referensi/diagnosaprb",
		type        : "GET",
		data        : {},
		dataType    : "JSON",
		success     : function(data){
			console.clear();
			console.log(data);
			if(data.metaData.code==200){
				// location.reload();
                // if(data.response.kode==1) tampilkanPesan('success',data.response.status);
                // else tampilkanPesan('warning',data.response.status);
                var row=data.response.list;
                var table="<option value=''>Pilih Program PRB</option>";
                for (let index = 0; index < row.length; index++) {
                    table+="<option value='"+row[index].kode+"'>"+row[index].nama+"</option>";
                }
                // if(row.length<=0) table="<tr><td colspan='6'>Data suplesi tidak ada</td></tr>";
                $('#programPRB').html(table)
			}else{
				//alert(data.metaData.message);
				tampilkanPesan('danger',data.metaData.message);
			}  
		},
		error       : function(jqXHR,ajaxOption,errorThrown){
			console.log(jqXHR.responseText);                    
		}
	});
}
function suplesiJasaraharja(){
    var noKartu=$('#c-noKartu').val();
    // var formData = {
	// 	tglPelayanan 	: $('#c-tglPelayanan').val(),
	// }
	console.clear();
	// console.log(formData);
	// var formData = new FormData($('#theform')[0]);
	$.ajax({
		url         : url_call_back+"/vclaim/sep/suplesi?noKartu="+noKartu,
		type        : "GET",
		data        : {tglPelayanan : $('#c-tglPelayanan').val()},
		dataType    : "JSON",
		success     : function(data){
			console.clear();
			console.log(data);
			if(data.metaData.code==200){
				// location.reload();
                // if(data.response.kode==1) tampilkanPesan('success',data.response.status);
                // else tampilkanPesan('warning',data.response.status);
                var row=data.response.jaminan;
                var table="";
                for (let index = 0; index < row.length; index++) {
                    table+="<tr>"+
                    "<td>"+row[index].noRegister+"</td>"+
                    "<td>"+row[index].noSep+"</td>"+
                    "<td>"+row[index].noSepAwal+"</td>"+
                    "<td>"+row[index].noSuratJaminan+"</td>"+
                    "<td>"+row[index].tglKejadian+"</td>"+
                    "<td>"+row[index].tglSep+"</td>"+
                    "</tr>";
                }
                if(row.length<=0) table="<tr><td colspan='6'>Data suplesi tidak ada</td></tr>";
                $('#datasuplesi').html(table)
			}else{
				//alert(data.metaData.message);
				tampilkanPesan('danger',data.metaData.message);
			}  
		},
		error       : function(jqXHR,ajaxOption,errorThrown){
			console.log(jqXHR.responseText);                    
		}
	});
}
function cariPRB(){
    var dari=$('#tglMulai').val();
    var sampai=$('#tglSelesai').val();
    // var formData = {
	// 	tglPelayanan 	: $('#c-tglPelayanan').val(),
	// }
	console.clear();
	// console.log(formData);
	// var formData = new FormData($('#theform')[0]);
	$.ajax({
		url         : url_call_back+"/vclaim/prb/listprb/"+dari+"/"+sampai,
		type        : "GET",
		data        : {},
		dataType    : "JSON",
		success     : function(data){
			console.clear();
			console.log(data);
			if(data.metaData.code==200){
				// location.reload();
                var row=data.response.list;
                var table="";
                for (let index = 0; index < row.length; index++) {
                    table+='<tr><td>'+row[index].noSEP+'</td>'+
                    '<td>'+row[index].noSRB+'</td>'+
                    '<td>'+row[index].noKartu+'</td>'+
                    '<td>'+row[index].nama+'</td>'+
                    '<td>'+row[index].alamat+'</td>'+
                    '<td>'+row[index].email+'</td>'+
                    '<td>'+row[index].noTelepon+'</td>'+
                    '<td>'+row[index].programPRB.nama+'</td>'+
                    '<td>'+row[index].keterangan+'</td>'+
                    '<td>'+row[index].saran+'</td>'+
                    '<td>'+row[index].tglSRB+'</td>'+
                    '<td>'+row[index].DPJP.nama+'</td>'+
                    '</tr>'
                }
                $('#getdata').html(table);
			}else{
				//alert(data.metaData.message);
				tampilkanPesan('danger',data.metaData.message);
			}  
		},
		error       : function(jqXHR,ajaxOption,errorThrown){
			console.log(jqXHR.responseText);                    
		}
	});
}
function cariSep(){
    var sep=$('#noSep').val();
	$.ajax({
		url         : url_call_back+"/vclaim/sep/cari/"+sep,
		type        : "GET",
		data        : {},
		dataType    : "JSON",
		success     : function(data){
			console.clear();
			console.log(data);
			if(data.metaData.code==200){
				// location.reload();
                $('#noKartu').val(data.response.peserta.noKartu)
				$('#namaPasien').val(data.response.peserta.nama)
				var option   = "<option value='"+data.response.dpjp.kdDPJP+"' selected>"+data.response.dpjp.nmDPJP+"</option>";
				$('#kodeDPJP').html(option);
				getTempPrb(sep);
				// getdpjp(data.response.tglSep,data.response.data.response.dpjp.kdDPJP)
			}else{
				//alert(data.metaData.message);
				tampilkanPesan('danger',data.metaData.message);
			}  
		},
		error       : function(jqXHR,ajaxOption,errorThrown){
			console.log(jqXHR.responseText);                    
		}
	});
}
function getdpjp(param2="",param3="",dpjppilih="") {
	// var jl=$('#jns_layanan').val();
	// if(param3=="IGD") param1=1;
	// else{
	// 	if(param1=="") param1 = $('#jnsPelayanan').val();
	// }
	if(param2=="")  param2 = $('#tglSep').val();
	if(param3=="")  param3 = $('#tujuan').val();
	var url = url_call_back+"/vclaim/referensi/dpjp/2/"+param2;
	$.ajax({
	    url     : url,
	    type    : "GET",
	    dataType: "json",
	    data    :  {spesialis : param3},
	    success : function(data){
	        //menghitung jumlah data
			//console.clear();
			//alert(param1 +" " +param2 + " " + param3);
	        console.log(url);
	        if(data.metaData.code==200){
	            var dokter    = data.response.list;
	            var jmlData=dokter.length;
	            var option   = "<option value=''>Pilih Dokter</option>";
	            //Create Tabel
	            for(var i=0; i<jmlData;i++){
					if(dpjppilih==dokter[i]['kode']) option+="<option value='"+dokter[i]["kode"]+"' selected>"+dokter[i]["nama"]+"</option>";
					else option+="<option value='"+dokter[i]["kode"]+"' >"+dokter[i]["nama"]+"</option>";
	                
	            }
				$('#kodeDPJP').html(option);
	        }else{
				var poli=$('#txtnmpoli').val();
				alert("Error saat pencarian data dokter "+ poli + ' karena ' +data.metaData.message)
			}
	    }
	});
}
function simpanPRB(){
url = base_url + "vclaim/prb/insert";
    var formData = new FormData($('#form')[0]);
    $.ajax({
        url : url,
        type: "POST",
        data : formData,
        processData: false,
        contentType: false,
        dataType: 'JSON',
        success: function(data)
        {
            if(data.metaData.code==200){
				$('#noSep').val("");
				$('#noKartu').val("");
				$('#namaPasien').val("");
				$('#alamat').val("");
				$('#email').val("");
				$('#programPRB').val("");
				$('#kodeDPJP').val("");
				$('#keterangan').val("");
				$('#saran').val("");
				$('#dataobat').html("");
                tampilkanPesan('success',data.metaData.message);
            }
            else{
				tampilkanPesan('warning',data.metaData.message);
            }
            
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            swal({
             title: "Terjadi Kesalahan ",
             text: "Gagal Menyimpan Data",
             type: "error",
             timer: 5000
            });
        }
    });
}
function removeTemp(idx){
	swal({
		title: "Konfirmasi",
		text: 'Apakah anda yakin akan menghapus obat ini dari list obat prb?',
		type: "warning",
		showCancelButton: true,
		confirmButtonText: "Ya",
		cancelButtonText: "Tidak",
		closeOnConfirm: true,
		closeOnCancel: true
	},
	function(isConfirm) {
		if (isConfirm) {
			$.ajax({
				url     : base_url+"vclaim/prb/deletetempobat/"+idx,
				type    : "GET",
				dataType: "json",
				data    :  {},
				success : function(data){
					var noSep=$('#noSep').val();
					getTempPrb(noSep);
				}
			});
		}
	})
}