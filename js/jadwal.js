function getData(start){
	$('#start').val(start);
	var search = $('#q').val();
	var limit = $('#limit').val();
	var param = $('#param').val();
	var url = base_url+'jkn/jadwal/getdata?keyword=' + search + "&start=" + start + "&limit=" + limit +"&param=" + param
	console.clear()
	console.log(url)
	$.ajax({
		url     : url,
		type    : "GET",
		dataType: "json",
		data    : {get_param : 'value'},
		beforeSend: function () {
			var tabel = "<tr id='loading'><td colspan='5'><b>Loading...</b></td></tr>";
			$('#data').html(tabel);
			$('#pagination').html('');
		},
		success : function(data){
			if(data["status"]==true){
				$('#data').html('');
				var res    = data["data"];
				var jmlData=res.length;
				var limit   = data["limit"];
				var tabel   = "";
				//Create Tabel
				var no = (parseInt(start)*parseInt(limit))-parseInt(limit);
				var dari = no+1;
				var sampai = no+parseInt(limit);
				var desc = "<button class='btn btn-default btn-sm' type='button'>Showing "+ dari + " To " + sampai + " of " +data["row_count"]+"</button>";
				for(var i=0; i<jmlData;i++){
					no++;
					tabel="<tr>";tabel+="<td>"+no+"</td>";
					tabel+="<td>"+res[i]['kodedokterrs']+"</td>";
					tabel+="<td>"+res[i]['kodedokterjkn']+"</td>";
					tabel+="<td>"+res[i]['namadokter']+"</td>";
					tabel+="<td>"+res[i]['kodepolijkn']+' - '+res[i]['poliklinik']+"</td>";
					tabel+="<td>"+res[i]['rincian_jadwal']+"</td>";
					tabel+="<td style='text-align:right;'><div class='btn-group'><a href='#' class='btn btn-warning btn-xs' onclick='ubahJadwal(\""+res[i]['kodedokterrs']+"\",\""+res[i]['kodepolirs']+"\")'><span class='fa fa-pencil'></span> Edit</a><button onclick='hapus(\""+res[i]['kodedokterrs']+"\",\""+res[i]['kodepolirs']+"\")' class='btn btn-danger btn-xs'><span class='fa fa-trash'></span> Hapus</button></div></td>";tabel+="</tr>";
					$('#data').append(tabel);
				}
				//Create Pagination
				if(data["row_count"]<=limit){
					$('#pagination').html("");
				}else{
					console.log("buat Pagination");
					var pagination="";
					var btnIdx="";
					jmlPage = Math.ceil(data["row_count"]/limit);
					offset  = data["start"] % limit;
					var curIdx = start;
					var btn="btn-default";
					//var lastSt=jmlPage;
					var btnFirst="<button class='btn btn-default btn-sm' onclick='getData(1)'><span class='fa fa-angle-double-left'></span></button>";
					if (curIdx > 1) {
						var prevSt=curIdx-1;
						btnFirst+="<button class='btn btn-default btn-sm' onclick='getData("+prevSt+")'><span class='fa fa-angle-left'></span></button>";
					}

					var btnLast="";
					if(curIdx<jmlPage){
						var nextSt=curIdx+1;
						btnLast+="<button class='btn btn-default btn-sm' onclick='getData("+nextSt+")'><span class='fa fa-angle-right'></span></button>";
					}
					console.log(curIdx);
					btnLast+="<button class='btn btn-default btn-sm' onclick='getData("+jmlPage+")'><span class='fa fa-angle-double-right'></span></button>";
					
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
							if(curIdx==j)  btn="btn-primary"; else btn= "btn-default";
							btnIdx+="<button class='btn " +btn +" btn-sm' onclick='getData("+ j +")'>" + j +"</button>";
						}
					}else{

						for (var j = 1; j<=jmlPage; j++) {
							if(curIdx==j)  btn="btn-primary"; else btn= "btn-default";
							btnIdx+="<button class='btn " +btn +" btn-sm' onclick='getData("+ j +")'>" + j +"</button>";
						}
					}
					pagination+="<div class='btn-group'>"+desc+btnFirst + btnIdx + btnLast+"</div>";
					$('#pagination').html(pagination);
				}
			}
		},
		complete : function(){
			//$('#loading').hide();
		}
	});
}
getData(1)   

function tambahJadwal(){
	$('#modaljadwal').modal('show');
	resetApp();

}
function resetApp(){
	$('#kodepolirs').val("");
	// $('#kodedokterrs').html("<option value=''>Pilih Dokter</option>");
	$('#seninaktif').prop('checked',false);
	$('#seninbuka').prop('readonly',true);
	$('#senintutup').prop('readonly',true);
	$('#seninbuka').val('')
	$('#senintutup').val('')
	$('#selasaaktif').prop('checked',false);
	$('#selasabuka').prop('readonly',true);
	$('#selasatutup').prop('readonly',true);
	$('#selasabuka').val('')
	$('#selasatutup').val('')
	$('#rabuaktif').prop('checked',false);
	$('#rabubuka').prop('readonly',true);
	$('#rabututup').prop('readonly',true);
	$('#rabubuka').val('')
	$('#rabututup').val('')
	$('#kamisaktif').prop('checked',false);
	$('#kamisbuka').prop('readonly',true);
	$('#kamistutup').prop('readonly',true);
	$('#kamisbuka').val('')
	$('#kamistutup').val('')
	$('#jumataktif').prop('checked',false);
	$('#jumatbuka').prop('readonly',true);
	$('#jumattutup').prop('readonly',true);
	$('#jumatbuka').val('')
	$('#jumattutup').val('')
	$('#sabtuaktif').prop('checked',false);
	$('#sabtubuka').prop('readonly',true);
	$('#sabtututup').prop('readonly',true);
	$('#sabtubuka').val('')
	$('#sabtututup').val('') 
	$('#mingguaktif').prop('checked',false);
	$('#minggubuka').prop('readonly',true);
	$('#minggututup').prop('readonly',true);
	$('#minggubuka').val('')
	$('#minggututup').val('')
}
function getDokter(ruang="",pilih=""){
	if(ruang=="") ruang=$('#kodepolirs').val();
	// alert(ruang)
	var url = base_url+"jkn/jadwal/datadokter";
	$.ajax({
		url     : url,
		type    : "GET",
		dataType: "json",
		data    : {poli : ruang},
        beforeSend: function() {
            // setting a timeout
            // $('#listjadwal').html('<tr><td colspan="5"><span class="fa fa-spinner fa-spin"></span> Menunggu...</td></tr>');
        },
		success : function(data){
		    //menghitung jumlah data
		    
			$('#kodepolijkn').val(data.ruang.kodepolijkn)
			$('#subspesialis').val(data.ruang.kodejkn)
			// getJadwalDokter()
		}
	});

}

function getJadwalDokter(ruang="",dokter=""){
	if(ruang=="") ruang=$('#kodepolirs').val();
	if(dokter=="") dokter=$('#kodedokterrs').val();
	var url = base_url+"jkn/jadwal/datajadwaldokter";
	$.ajax({
		url     : url,
		type    : "GET",
		dataType: "json",
		data    : {poli : ruang,dokter : dokter},
        beforeSend: function() {
            // setting a timeout
            // $('#listjadwal').html('<tr><td colspan="5"><span class="fa fa-spinner fa-spin"></span> Menunggu...</td></tr>');
        },
		success : function(data){
		    //menghitung jumlah data
		    
			if(data.jadwal !=null){
				if(data.jadwal.jam_mulai_senin != null){
					$('#seninaktif').prop('checked',true);
					$('#seninbuka').prop('readonly',false);
					$('#senintutup').prop('readonly',false);
					$('#seninbuka').val(data.jadwal.jam_mulai_senin)
					$('#senintutup').val(data.jadwal.jam_selesai_senin)
				}else{
					$('#seninaktif').prop('checked',false);
					$('#seninbuka').prop('readonly',true);
					$('#senintutup').prop('readonly',true);
					$('#seninbuka').val('')
					$('#senintutup').val('')
				}
				if(data.jadwal.jam_mulai_selasa != null){
					$('#selasaaktif').prop('checked',true);
					$('#selasabuka').prop('readonly',false);
					$('#selasatutup').prop('readonly',false);
					$('#selasabuka').val(data.jadwal.jam_mulai_selasa)
					$('#selasatutup').val(data.jadwal.jam_selesai_selasa)
				}else{
					$('#selasaaktif').prop('checked',false);
					$('#selasabuka').prop('readonly',true);
					$('#selasatutup').prop('readonly',true);
					$('#selasabuka').val('')
					$('#selasatutup').val('')
				}
				if(data.jadwal.jam_mulai_rabu != null){
					$('#rabuaktif').prop('checked',true);
					$('#rabubuka').prop('readonly',false);
					$('#rabututup').prop('readonly',false);
					$('#rabubuka').val(data.jadwal.jam_mulai_rabu)
					$('#rabututup').val(data.jadwal.jam_selesai_rabu)
				}else{
					$('#rabuaktif').prop('checked',false);
					$('#rabubuka').prop('readonly',true);
					$('#rabututup').prop('readonly',true);
					$('#rabubuka').val('')
					$('#rabututup').val('')
				}
				if(data.jadwal.jam_mulai_kamis != null){
					$('#kamisaktif').prop('checked',true);
					$('#kamisbuka').prop('readonly',false);
					$('#kamistutup').prop('readonly',false);
					$('#kamisbuka').val(data.jadwal.jam_mulai_kamis)
					$('#kamistutup').val(data.jadwal.jam_selesai_kamis)
				}else{
					$('#kamisaktif').prop('checked',false);
					$('#kamisbuka').prop('readonly',true);
					$('#kamistutup').prop('readonly',true);
					$('#kamisbuka').val('')
					$('#kamistutup').val('')
				}
				if(data.jadwal.jam_mulai_jumat != null){
					$('#jumataktif').prop('checked',true);
					$('#jumatbuka').prop('readonly',false);
					$('#jumattutup').prop('readonly',false);
					$('#jumatbuka').val(data.jadwal.jam_mulai_jumat)
					$('#jumattutup').val(data.jadwal.jam_selesai_jumat)
				}else{
					$('#jumataktif').prop('checked',false);
					$('#jumatbuka').prop('readonly',true);
					$('#jumattutup').prop('readonly',true);
					$('#jumatbuka').val('')
					$('#jumattutup').val('')
				}
				if(data.jadwal.jam_mulai_sabtu != null){
					$('#sabtuaktif').prop('checked',true);
					$('#sabtubuka').prop('readonly',false);
					$('#sabtututup').prop('readonly',false);
					$('#sabtubuka').val(data.jadwal.jam_mulai_sabtu)
					$('#sabtututup').val(data.jadwal.jam_selesai_sabtu)
				}else{
					$('#sabtuaktif').prop('checked',false);
					$('#sabtubuka').prop('readonly',true);
					$('#sabtututup').prop('readonly',true);
					$('#sabtubuka').val('')
					$('#sabtututup').val('')
				}
				if(data.jadwal.jam_mulai_minggu != null){
					$('#mingguaktif').prop('checked',true);
					$('#minggubuka').prop('readonly',false);
					$('#minggututup').prop('readonly',false);
					$('#minggubuka').val(data.jadwal.jam_mulai_minggu)
					$('#minggututup').val(data.jadwal.jam_selesai_minggu)
				}else{
					$('#mingguaktif').prop('checked',false);
					$('#minggubuka').prop('readonly',true);
					$('#minggututup').prop('readonly',true);
					$('#minggubuka').val('')
					$('#minggututup').val('')
				}
			}
			
			$('#kodedokterjkn').val(data.dokter.dokterjkn)
		}
	});
}

function ubahJadwal(kodedokterrs,kodepolirs){
	$('#modaljadwal').modal('show');
	// $('#kodepolirs').val(kodepolirs)
	
	$("#kodepolirs").val(kodepolirs).trigger('change');
	$("#kodedokterrs").val(kodedokterrs).trigger('change');
	// getDokter(kodepolirs,kodedokterrs);
	getJadwalDokter(kodepolirs,kodedokterrs)
}
function setaktif(idx){
	if(idx==1){
		if($('#seninaktif').prop('checked')){
			$('#seninbuka').prop('readonly',false)
			$('#senintutup').prop('readonly',false)
		}else{
			$('#seninbuka').prop('readonly',true)
			$('#senintutup').prop('readonly',true)
		}
	}else if(idx==2){
		if($('#selasaaktif').prop('checked')){
			$('#selasabuka').prop('readonly',false)
			$('#selasatutup').prop('readonly',false)
		}else{
			$('#selasabuka').prop('readonly',true)
			$('#selasatutup').prop('readonly',true)
		}
	}else if(idx==3){
		if($('#rabuaktif').prop('checked')){
			$('#rabubuka').prop('readonly',false)
			$('#rabututup').prop('readonly',false)
		}else{
			$('#rabubuka').prop('readonly',true)
			$('#rabututup').prop('readonly',true)
		}
	}else if(idx==4){
		if($('#kamisaktif').prop('checked')){
			$('#kamisbuka').prop('readonly',false)
			$('#kamistutup').prop('readonly',false)
		}else{
			$('#kamisbuka').prop('readonly',true)
			$('#kamistutup').prop('readonly',true)
		}
	}else if(idx==5){
		if($('#jumataktif').prop('checked')){
			$('#jumatbuka').prop('readonly',false)
			$('#jumattutup').prop('readonly',false)
		}else{
			$('#jumatbuka').prop('readonly',true)
			$('#jumattutup').prop('readonly',true)
		}
	}
	else if(idx==6){
		if($('#sabtuaktif').prop('checked')){
			$('#sabtubuka').prop('readonly',false)
			$('#sabtututup').prop('readonly',false)
		}else{
			$('#sabtubuka').prop('readonly',true)
			$('#sabtututup').prop('readonly',true)
		}
	}
	else if(idx==7){
		if($('#mingguaktif').prop('checked')){
			$('#minggubuka').prop('readonly',false)
			$('#minggututup').prop('readonly',false)
		}else{
			$('#minggubuka').prop('readonly',true)
			$('#minggututup').prop('readonly',true)
		}
	}
}
function simpanJadwal(){
	var url = base_url + "jkn/jadwal/simpanjadwal";
	//alert(url);
	var formData = new FormData($('#jadwalform')[0]);
    $.ajax({
        url : url,
        type: "POST",
        data : formData,
        processData: false,
        contentType: false,
        dataType: 'JSON',
        success: function(data)
        {
            if(data.metadata.code==200){
				alert(data.metadata.message)
				$('#modaljadwal').modal('hide');
                getData(1)
            }
            else{
                alert(data.metadata.message)
            }
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert("Gagal update Jadwal Dokter")
        }
    });
}
function hapus(kodedokterrs="",kodepolirs=""){
	var konfirmasi = confirm("Apakah yakin data akan di hapus");
    if (konfirmasi == true) {
		var url = base_url+"jkn/jadwal/hapusjadwal";
		$.ajax({
			url     : url,
			type    : "GET",
			dataType: "json",
			data    : {poli : kodepolirs,dokter : kodedokterrs},
			beforeSend: function() {
				// setting a timeout
				// $('#listjadwal').html('<tr><td colspan="5"><span class="fa fa-spinner fa-spin"></span> Menunggu...</td></tr>');
			},
			success : function(data){
				//menghitung jumlah data
				getData(1);
			}
		});
	}
}