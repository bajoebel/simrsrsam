$(document).ready(function() {
    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true
    });
});
function listFinger(){
    // var keyword="";
    $.ajax({
        url: base_url+"vclaim/sep/riwayatpengajuan",
        type: "GET",
        dataType: "json",
        data: { start: start },
        success: function (data) {
            //menghitung jumlah data
            //console.clear();
            $('#jmldata').val(data["row_count"]);
            if (data["status"] == true) {
                var row = data["data"];
                var jmlData = row.length;
                var limit = data["limit"]
                var tabel = "";
                //Create Tabel
                for (var i = 0; i < jmlData; i++) {
                    start++;
                    if (parseInt(row[i]["JSTOK"]) <= 0) bg = "style='background:#e70f0f; color:#fff'"; else bg = "";
                    tabel += '<tr>';
                    tabel += "<td>" + row[i]["noKartu"] + "</td>";
                    tabel += "<td>" + row[i]["tglSep"] + "</td>";
                    if(row[i]["jnsPelayanan"]==1) tabel += "<td>Rawat Inap</td>";
                    else  tabel += "<td>Rawat Jalan</td>";
                    if(row[i]["jnsPengajuan"]==1) tabel += "<td>Pengajuan Backdate</td>";
                    else tabel += "<td>Pengajuan Finger Print</td>";
                    tabel += "<td>" + row[i]["keterangan"] + "</td>";
                    tabel += '<td class=\'text-right\'>';
                    if(row[i]["statuspengajuan"]=="Terkirim") var style='btn-success'; else var style='btn-warning'; 
                    tabel += '<button type=\'button\' class=\'btn '+style+' btn-xs\'> '+row[i]["statuspengajuan"]+' </button>';
                    tabel += '</td>';
                    tabel += '<td class=\'text-right\'>';
                    if(row[i]["statuspengajuan"]=="Terkirim" || row[i]["statuspengajuan"]=="Pending" ) tabel += '<button type=\'button\' class=\'btn btn-success btn-xs\' id="pilih' + i + '" onclick=\'aprovePengajuan("' + row[i]["idx"] + '")\'><span class=\'fa fa-check\' ></span> Aprove Pengajuan </button>';
                    else tabel += '<button type=\'button\' class=\'btn btn-success btn-xs\' id="pilih' + i + '" onclick=\'aprovePengajuan("' + row[i]["idx"] + '")\' disabled><span class=\'fa fa-check\' ></span> Aprove Pengajuan </button>';
                    tabel += '</td>';
                    tabel += "</tr>";
                }
                if(data["row_count"]==0) tabel="<tr><td colspn='5'>Belum ada data pengajuan</td></tr>";
                // alert(table)
                $('#getdata').html(tabel);
                //Create Pagination
                if (data["row_count"] <= limit) {
                    $('#pagination').html("");
                } else {
                    var pagination = "";
                    var btnIdx = "";
                    jmlPage = Math.ceil(data["row_count"] / limit);
                    offset = data["start"] % limit;
                    curIdx = Math.ceil((data["start"] / data["limit"]) + 1);
                    prev = (curIdx - 2) * data["limit"];
                    next = (curIdx) * data["limit"];

                    var curSt = (curIdx * data["limit"]) - jmlData;
                    var st = start;
                    var btn = "btn-default";
                    var lastSt = (jmlPage * data["limit"]) - jmlData
                    var btnFirst = "<button class='btn btn-default btn-sm' type='button' onclick='getrowjual(0,\"" + lokasi + "\")'><span class='fa fa-angle-double-left'></span></button>";
                    if (curIdx > 1) {
                        var prevSt = ((curIdx - 1) * data["limit"]) - jmlData;
                        btnFirst += "<button class='btn btn-default btn-sm' type='button' onclick='getrowjual(" + prevSt + ",\"" + lokasi + "\")'><span class='fa fa-angle-left'></span></button>";
                    }

                    var btnLast = "";
                    if (curIdx < jmlPage) {
                        var nextSt = ((curIdx + 1) * data["limit"]) - jmlData;
                        btnLast += "<button class='btn btn-default btn-sm' type='button' onclick='getrowjual(" + nextSt + ",\"" + lokasi + "\")'><span class='fa fa-angle-right'></span></button>";
                    }
                    btnLast += "<button class='btn btn-default btn-sm' type='button' onclick='getrowjual(" + lastSt + ",\"" + lokasi + "\")'><span class='fa fa-angle-double-right'></span></button>";

                    if (jmlPage >= 5) {
                        if (curIdx >= 2) {
                            var idx_start = curIdx - 1;
                            var idx_end = idx_start + 4;
                            if (idx_end >= jmlPage) idx_end = jmlPage;
                        } else {
                            var idx_start = 1;
                            var idx_end = 5;
                        }
                        for (var j = idx_start; j <= idx_end; j++) {
                            st = (j * data["limit"]) - jmlData;
                            if (curSt == st) btn = "btn-success"; else btn = "btn-default";
                            btnIdx += "<button class='btn " + btn + " btn-sm' type='button' onclick='getrowjual(" + st + ",\"" + lokasi + "\")'>" + j + "</button>";
                        }
                    } else {
                        for (var j = 1; j <= jmlPage; j++) {
                            st = (j * data["limit"]) - jmlData;
                            if (curSt == st) btn = "btn-success"; else btn = "btn-default";
                            btnIdx += "<button class='btn " + btn + " btn-sm' type='button' onclick='getrowjual(" + st + ",\"" + lokasi + "\")'>" + j + "</button>";
                        }
                    }
                    pagination += btnFirst + btnIdx + btnLast;
                    $('#pagination').html("Showing 11 to 20 of 1234 " + '<div class="btn-group">' + pagination + "</div>");
                }
            }
        }
    });
}
function cekFinger(){
    var noKartu=$('#c-noKartu').val();
    // var formData = {
	// 	tglPelayanan 	: $('#c-tglPelayanan').val(),
	// }
	console.clear();
	// console.log(formData);
	// var formData = new FormData($('#theform')[0]);
	$.ajax({
		url         : url_call_back+"/vclaim/sep/cekfinger?noKartu="+noKartu,
		type        : "GET",
		data        : {tglPelayanan : $('#c-tglPelayanan').val()},
		dataType    : "JSON",
        beforeSend: function() {
            // setting a timeout
            $('#btnCekFinger').prop("disabled",true);
            $('#iconbtnCekFinger').removeClass('fa fa-search')
            $('#iconbtnCekFinger').addClass('fa fa-spinner spin')
        },
		success     : function(data){
			console.clear();
			console.log(data);
			if(data.metaData.code==200){
				// location.reload();
                if(data.response.kode==1) tampilkanPesan('success',data.response.status);
                else tampilkanPesan('warning',data.response.status);
                
			}else{
				//alert(data.metaData.message);
				tampilkanPesan('danger',data.metaData.message);
			}  
		},
		error: function(xhr) { // if error occured
            $('#error').modal('show');
			$('#xhr').html(xhr.responseText)
            $('#btnCekFinger').prop("disabled",false);
            $('#iconbtnCekFinger').removeClass('fa fa-spinner spin')
            $('#iconbtnCekFinger').addClass('fa fa-search')
        },
        complete: function() {
            $('#btnCekFinger').prop("disabled",false);
            $('#iconbtnCekFinger').removeClass('fa fa-spinner spin')
            $('#iconbtnCekFinger').addClass('fa fa-search')
        },
	});
}
function listFinger(){
    var noKartu=$('#c-noKartu').val();
    // var formData = {
	// 	tglPelayanan 	: $('#c-tglPelayanan').val(),
	// }
	console.clear();
	// console.log(formData);
	// var formData = new FormData($('#theform')[0]);
	$.ajax({
		url         : url_call_back+"/vclaim/sep/listfinger",
		type        : "GET",
		data        : {tglPelayanan : $('#l-tglPelayanan').val()},
		dataType    : "JSON",
        beforeSend: function() {
            // setting a timeout
            $('#btn').prop("disabled",true);
            $('#icon').removeClass('fa fa-search')
            $('#icon').addClass('fa fa-spinner spin')
        },
		success     : function(data){
			console.clear();
			console.log(data);
			if(data.metaData.code==200){
				// location.reload();
                var row=data.response.list;
                var table="";
                for (let index = 0; index < row.length; index++) {
                    table+='<tr><td>'+row[index].noKartu+'</td><td>'+row[index].noSEP+'</td></tr>'
                }
                $('#getdata').html(table);
			}else{
				//alert(data.metaData.message);
				tampilkanPesan('danger',data.metaData.message);
			}  
		},
		error: function(xhr) { // if error occured
            $('#error').modal('show');
			$('#xhr').html(xhr.responseText)
            $('#btn').prop("disabled",false);
            $('#icon').removeClass('fa fa-spinner spin')
            $('#icon').addClass('fa fa-search')
        },
        complete: function() {
            $('#btn').prop("disabled",false);
            $('#icon').removeClass('fa fa-spinner spin')
            $('#icon').addClass('fa fa-search')
        },
	});
}