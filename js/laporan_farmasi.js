$(document).ready(function() {
	$(".inputmask").inputmask();
	
	$('.tanggal').inputmask('dd/mm/yyyy', {
		'placeholder': 'dd/mm/yyyy'
	});
	$('.tanggal').datepicker({
		autoclose: true,
		format: "dd/mm/yyyy"
	});
});
function cariBarang(start = 0, lokasi = "") {
	
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
		getLaporanStok(start,lokasi);
	}else{
		$('#barang').hide();
		$('#show_barang').val("0");
	}
}
function getLaporanStok(start=0){
    var lokasi = $('#sblokasi').val();
    var jenis = $('#sbjenis').val();
    var kategori = $('#sbkategori').val();
    var keyword = $('#sbkeyword').val();
	var url = base_url + "laporan/data_stok?start="+start+"&lokasi="+lokasi+"&jenis="+jenis+"&kategori="+kategori+"&keyword="+keyword;
    console.log(url);
	$.ajax({
			url     : url,
			type    : "GET",
			dataType: "json",
			data    : {get_param : 'value'},
			success : function(data){
			    //menghitung jumlah data
                //console.clear();
                
			    $('#jmldata').val(data["row_count"]);
                if (data["status"] == true) {
                    $('#headerstok').html(data.header);
			        var barang    = data["data"];
			        var jmlData=barang.length;
			        var limit   = data["limit"]
			        var tabel   = "";
			        //Create Tabel
					var hjual =0;
					background = '';
			        for(var i=0; i<jmlData;i++){
						start++;
						if (parseInt(barang[i]["selisih"]) <= 0) background ='style="background-color:#dd4b39;color:#fff"';
						else {
							if (parseInt(barang[i]["selisih"]) <= 30) background = 'style="background-color:#f39c12 ;color:#fff';
							else background='';
						}
                        tabel += '<tr '+background+'">';
                        tabel+="<td>"+start+"</td>";
                        if(lokasi == "") tabel+="<td>"+barang[i]["NMLOKASI"]+"</td>";
						tabel+="<td>"+barang[i]["KDBRG"]+"</td>";
                        tabel += "<td>" + barang[i]["NMBRG"] + "</td>";
                        tabel+="<td>"+barang[i]["NMGENERIK"]+"</td>";
						tabel+="<td>"+barang[i]["NMSATUAN"]+"</td>";
						tabel += "<td>" + barang[i]["HMODAL"] + "</td>";
						hjual = 1.2*parseFloat(barang[i]["HMODAL"])
						tabel += "<td>" + hjual + "</td>";
						tabel += "<td>" + barang[i]["TGLBELI"] + "</td>";
						tabel += "<td>" + barang[i]["TGLEXP"] + "</td>";
                        if (kategori == "") tabel += "<td>" + barang[i]["NMKTBRG"] + "</td>";
                        if(jenis=="") tabel+="<td>"+barang[i]["JENISBRG"]+"</td>";
						tabel+="<td>"+barang[i]["JSTOK"]+"</td>";
						tabel+="</tr>";
			        }
			        $('#datastok').html(tabel);
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
						var btnFirst="<button class='btn btn-default btn-sm' type='button' onclick='getLaporanStok(0)'><span class='fa fa-angle-double-left'></span></button>";
						if(curIdx>1){
							var prevSt=((curIdx-1)*data["limit"])-jmlData;
							btnFirst+="<button class='btn btn-default btn-sm' type='button' onclick='getLaporanStok("+prevSt+")'><span class='fa fa-angle-left'></span></button>";
						}

						var btnLast="";
						if(curIdx<jmlPage){
							var nextSt=((curIdx+1)*data["limit"])-jmlData;
							btnLast+="<button class='btn btn-default btn-sm' type='button' onclick='getLaporanStok("+nextSt+")'><span class='fa fa-angle-right'></span></button>";
						}
						btnLast+="<button class='btn btn-default btn-sm' type='button' onclick='getLaporanStok("+lastSt+")'><span class='fa fa-angle-double-right'></span></button>";

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
								btnIdx+="<button class='btn " +btn +" btn-sm' type='button' onclick='getLaporanStok("+ st +")'>" + j +"</button>";
							}
						}else{
							for (var j = 1; j<=jmlPage; j++) {
								st=(j*data["limit"])-jmlData;
								if(curSt==st)  btn="btn-success"; else btn= "btn-default";
								btnIdx+="<button class='btn " +btn +" btn-sm' type='button' onclick='getLaporanStok("+ st +")'>" + j +"</button>";
							}
						}
						pagination+=btnFirst + btnIdx + btnLast;
						$('#pagination').html("Showing 11 to 20 of 1234 " + '<div class="btn-group">' + pagination+'</div>');
											}
			    	}
					}
				});
}
function getLaporanStokAwal(start=0){
    var lokasi = $('#salokasi').val();
    var jenis = $('#sajenis').val();
    var kategori = $('#sakategori').val();
    var keyword = $('#sakeyword').val();
	var url = base_url + "laporan/data_stok_awal?start="+start+"&lokasi="+lokasi+"&jenis="+jenis+"&kategori="+kategori+"&keyword="+keyword;
    console.log(url);
	$.ajax({
			url     : url,
			type    : "GET",
			dataType: "json",
			data    : {get_param : 'value'},
			success : function(data){
			    //menghitung jumlah data
                //console.clear();
                
			    $('#jmldata').val(data["row_count"]);
                if (data["status"] == true) {
                    $('#headerstoksa').html(data.header);
			        var barang    = data["data"];
			        var jmlData=barang.length;
			        var limit   = data["limit"]
			        var tabel   = "";
			        //Create Tabel
			        for(var i=0; i<jmlData;i++){
start++;
                        tabel += '<tr>';
                        tabel+="<td>"+start+"</td>";
                        if (lokasi == "") tabel += "<td>" + barang[i]["NMLOKASI"] + "</td>";
                        tabel+="<td>"+barang[i]["TGLSA"]+"</td>";
                        tabel += "<td>" + barang[i]["NOSA"] + "</td>";
                        
tabel+="<td>"+barang[i]["KDBRG"]+"</td>";
                        tabel += "<td>" + barang[i]["NMBRG"] + "</td>";
                        tabel += "<td>" + barang[i]["NMGENERIK"] + "</td>";
                        tabel += "<td>" + barang[i]["HMODAL"] + "</td>";
                        tabel += "<td>" + barang[i]["EXPDATE"] + "</td>";
                        tabel+="<td>"+barang[i]["NMSATUAN"]+"</td>";
                        if (kategori == "") tabel += "<td>" + barang[i]["NMKTBRG"] + "</td>";
                        if(jenis=="") tabel+="<td>"+barang[i]["JENISBRG"]+"</td>";
tabel+="<td>"+barang[i]["JSTOK"]+"</td>";
tabel+="</tr>";
			        }
			        $('#datastoksa').html(tabel);
			        //Create Pagination
			        if(data["row_count"]<=limit){
$('#paginationsa').html("");
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
var btnFirst="<button class='btn btn-default btn-sm' type='button' onclick='getLaporanStokAwal(0)'><span class='fa fa-angle-double-left'></span></button>";
if(curIdx>1){
    var prevSt=((curIdx-1)*data["limit"])-jmlData;
    btnFirst+="<button class='btn btn-default btn-sm' type='button' onclick='getLaporanStokAwal("+prevSt+")'><span class='fa fa-angle-left'></span></button>";
}

var btnLast="";
if(curIdx<jmlPage){
    var nextSt=((curIdx+1)*data["limit"])-jmlData;
    btnLast+="<button class='btn btn-default btn-sm' type='button' onclick='getLaporanStokAwal("+nextSt+")'><span class='fa fa-angle-right'></span></button>";
}
btnLast+="<button class='btn btn-default btn-sm' type='button' onclick='getLaporanStokAwal("+lastSt+")'><span class='fa fa-angle-double-right'></span></button>";

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
        btnIdx+="<button class='btn " +btn +" btn-sm' type='button' onclick='getLaporanStokAwal("+ st +")'>" + j +"</button>";
    }
}else{
    for (var j = 1; j<=jmlPage; j++) {
        st=(j*data["limit"])-jmlData;
        if(curSt==st)  btn="btn-success"; else btn= "btn-default";
        btnIdx+="<button class='btn " +btn +" btn-sm' type='button' onclick='getLaporanStokAwal("+ st +")'>" + j +"</button>";
    }
}
pagination+=btnFirst + btnIdx + btnLast;
$('#paginationsa').html("Showing 11 to 20 of 1234 " + '<div class="btn-group">' + pagination+'</div>');
			        }
			    }
			}
	});
}
function getKartuStok(start=0){
    var lokasi = $('#kslokasi').val();
    var jenis = $('#ksjenis').val();
    var kategori = $('#kskategori').val();
    var keyword = $('#kskeyword').val();
	var url = base_url + "laporan/data_kartu_stok?start="+start+"&lokasi="+lokasi+"&jenis="+jenis+"&kategori="+kategori+"&keyword="+keyword+"&action=1";
    console.log(url);
	$.ajax({
			url     : url,
			type    : "GET",
			dataType: "json",
			data    : {get_param : 'value'},
			success : function(data){
			    //menghitung jumlah data
                //console.clear();
                
			    $('#jmldata').val(data["row_count"]);
                if (data["status"] == true) {
                    $('#headerstokks').html(data.header);
			        var barang    = data["data"];
			        var jmlData=barang.length;
			        var limit   = data["limit"]
			        var tabel   = "";
			        //Create Tabel
			        for(var i=0; i<jmlData;i++){
start++;
                        tabel += '<tr>';
                        tabel+="<td>"+start+"</td>";
                        if(lokasi == "") tabel+="<td>"+barang[i]["NMLOKASI"]+"</td>";
tabel+="<td>"+barang[i]["KDBRG"]+"</td>";
                        tabel += "<td>" + barang[i]["NMBRG"] + "</td>";
                        tabel+="<td>"+barang[i]["NMGENERIK"]+"</td>";
tabel+="<td>"+barang[i]["NMSATUAN"]+"</td>";
                        if (kategori == "") tabel += "<td>" + barang[i]["NMKTBRG"] + "</td>";
                        if(jenis=="") tabel+="<td>"+barang[i]["JENISBRG"]+"</td>";
						tabel += "<td>" + barang[i]["JSTOK"] + "</td>";
						tabel += "<td style='width:100px;'><button class='btn btn-default btn-sm' onclick='openRange(\""+barang[i]["KDBRG"]+"\")'><i class='fa fa-print'></i> Cetak Kartu Stok</button></td>";
tabel+="</tr>";
			        }
			        $('#datastokks').html(tabel);
			        //Create Pagination
			        if(data["row_count"]<=limit){
$('#paginationks').html("");
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
var btnFirst="<button class='btn btn-default btn-sm' type='button' onclick='getKartuStok(0)'><span class='fa fa-angle-double-left'></span></button>";
if(curIdx>1){
    var prevSt=((curIdx-1)*data["limit"])-jmlData;
    btnFirst+="<button class='btn btn-default btn-sm' type='button' onclick='getKartuStok("+prevSt+")'><span class='fa fa-angle-left'></span></button>";
}

var btnLast="";
if(curIdx<jmlPage){
    var nextSt=((curIdx+1)*data["limit"])-jmlData;
    btnLast+="<button class='btn btn-default btn-sm' type='button' onclick='getKartuStok("+nextSt+")'><span class='fa fa-angle-right'></span></button>";
}
btnLast+="<button class='btn btn-default btn-sm' type='button' onclick='getKartuStok("+lastSt+")'><span class='fa fa-angle-double-right'></span></button>";

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
        btnIdx+="<button class='btn " +btn +" btn-sm' type='button' onclick='getKartuStok("+ st +")'>" + j +"</button>";
    }
}else{
    for (var j = 1; j<=jmlPage; j++) {
        st=(j*data["limit"])-jmlData;
        if(curSt==st)  btn="btn-success"; else btn= "btn-default";
        btnIdx+="<button class='btn " +btn +" btn-sm' type='button' onclick='getKartuStok("+ st +")'>" + j +"</button>";
    }
}
pagination+=btnFirst + btnIdx + btnLast;
$('#paginationks').html("Showing 11 to 20 of 1234 " + '<div class="btn-group">' + pagination+'</div>');
			        }
			    }
			}
	});
}
function getHistoriPembelianBarang(start = 0) {
	var lokasi = $('#kslokasi').val();
	var jenis = $('#ksjenis').val();
	var kategori = $('#kskategori').val();
	var keyword = $('#kskeyword').val();
	var url = base_url + "laporan/data_stok?start=" + start + "&lokasi=" + lokasi + "&jenis=" + jenis + "&kategori=" + kategori + "&keyword=" + keyword + "&action=1";
	console.log(url);
	$.ajax({
		url: url,
		type: "GET",
		dataType: "json",
		data: { get_param: 'value' },
		success: function (data) {
			//menghitung jumlah data
			//console.clear();

			$('#jmldata').val(data["row_count"]);
			if (data["status"] == true) {
				$('#headerstokks').html(data.header);
				var barang = data["data"];
				var jmlData = barang.length;
				var limit = data["limit"]
				var tabel = "";
				//Create Tabel
				for (var i = 0; i < jmlData; i++) {
					start++;
					tabel += '<tr>';
					tabel += "<td>" + start + "</td>";
					if (lokasi == "") tabel += "<td>" + barang[i]["NMLOKASI"] + "</td>";
					tabel += "<td>" + barang[i]["KDBRG"] + "</td>";
					tabel += "<td>" + barang[i]["NMBRG"] + "</td>";
					tabel += "<td>" + barang[i]["NMGENERIK"] + "</td>";
					tabel += "<td>" + barang[i]["NMSATUAN"] + "</td>";
					if (kategori == "") tabel += "<td>" + barang[i]["NMKTBRG"] + "</td>";
					if (jenis == "") tabel += "<td>" + barang[i]["JENISBRG"] + "</td>";
					tabel += "<td>" + barang[i]["JSTOK"] + "</td>";
					tabel += "<td style='width:100px;'><button class='btn btn-default btn-sm' onclick='openHistori(\"" + barang[i]["KDBRG"] + "\")'><i class='fa fa-search'></i> Lihat Histori Pembelian</button></td>";
					tabel += "</tr>";
				}
				$('#datastokks').html(tabel);
				//Create Pagination
				if (data["row_count"] <= limit) {
					$('#paginationks').html("");
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
					var btnFirst = "<button class='btn btn-default btn-sm' type='button' onclick='getHistoriPembelianBarang(0)'><span class='fa fa-angle-double-left'></span></button>";
					if (curIdx > 1) {
						var prevSt = ((curIdx - 1) * data["limit"]) - jmlData;
						btnFirst += "<button class='btn btn-default btn-sm' type='button' onclick='getHistoriPembelianBarang(" + prevSt + ")'><span class='fa fa-angle-left'></span></button>";
					}

					var btnLast = "";
					if (curIdx < jmlPage) {
						var nextSt = ((curIdx + 1) * data["limit"]) - jmlData;
						btnLast += "<button class='btn btn-default btn-sm' type='button' onclick='getHistoriPembelianBarang(" + nextSt + ")'><span class='fa fa-angle-right'></span></button>";
					}
					btnLast += "<button class='btn btn-default btn-sm' type='button' onclick='getHistoriPembelianBarang(" + lastSt + ")'><span class='fa fa-angle-double-right'></span></button>";

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
							btnIdx += "<button class='btn " + btn + " btn-sm' type='button' onclick='getHistoriPembelianBarang(" + st + ")'>" + j + "</button>";
						}
					} else {
						for (var j = 1; j <= jmlPage; j++) {
							st = (j * data["limit"]) - jmlData;
							if (curSt == st) btn = "btn-success"; else btn = "btn-default";
							btnIdx += "<button class='btn " + btn + " btn-sm' type='button' onclick='getHistoriPembelianBarang(" + st + ")'>" + j + "</button>";
						}
					}
					pagination += btnFirst + btnIdx + btnLast;
					$('#paginationks').html("Showing 11 to 20 of 1234 " + '<div class="btn-group">' + pagination + '</div>');
				}
			}
		}
	});
}
function openRange(kdbrg) {
	var kdlokasi = $('#kslokasi').val();
	$('#dari').val("");
	$('#sampai').val("");
	if (kdlokasi == "") {
		tampilkanPesan('warning', 'Lokasi Belum Dipilih');
		return false;
	}
	$('#KDBRG').val(kdbrg);
	$("#modal_range").modal("show");   
}
function openHistori(kdbrg){
	var url = base_url + "laporan/histori_pembelian?kode=" + kdbrg;
	console.log(url);
	$.ajax({
		url: url,
		type: "GET",
		dataType: "json",
		data: { get_param: 'value' },
		success: function (data) {
			//menghitung jumlah data
			//console.clear();

			$('#jmldata').val(data["row_count"]);
			if (data["status"] == true) {
				$("#modal_histori").modal("show");  
				var transaksi = data["data"];
				var jmlData = transaksi.length;
				var tabel = "";
				//Create Tabel
				var start=0;
				for (var i = 0; i < jmlData; i++) {
					start++;
					tabel += '<tr>';
					tabel += "<td>" + start + "</td>";
					tabel += "<td>" + transaksi[i]["TGLTERIMA"] + "</td>";
					tabel += "<td>" + transaksi[i]["NMLOKASI"] + "</td>";
					tabel += "<td>" + transaksi[i]["NMSUPPLIER"] + "</td>";
					tabel += "<td>" + transaksi[i]["JMLBELI"] + "</td>";
					tabel += "</tr>";
				}
				$('#namabarang').html(transaksi[0]["NMBRG"]);
				$('#datahistori').html(tabel);
			}
		}
	});
}
function PrintKartuStok() {
	var kdbrg = $('#KDBRG').val();
	var kdlokasi = $('#kslokasi').val();
	var dari = $('#dari').val();
	var sampai = $('#sampai').val();
	if (kdlokasi == "") {
		tampilkanPesan('warning', 'Lokasi Belum Dipilih');
		return false;
	}
	if (dari == "" || sampai=="") {
		tampilkanPesan('warning', 'Range Tanggal Belum DIpilih');
		return false;
	}
	window.open(base_url + "lap_kartu_stok/cetak?kode=" + kdbrg + "&tAwal=" + dari + "&tAkhir=" + sampai + "&kLok=" + kdlokasi);
}

function printLaporanStok() {
	var lokasi = $('#sblokasi').val();
	var jenis = $('#sbjenis').val();
	var kategori = $('#sbkategori').val();
	var url = base_url + "laporan/cetakstok?lokasi="+lokasi+"&jenis="+jenis+"&kategori="+kategori;
	window.open(url);
}
function printLaporanStokAwal() {
	var lokasi = $('#salokasi').val();
    var jenis = $('#sajenis').val();
    var kategori = $('#sakategori').val();
	var url = base_url + "laporan/cetakstokawal?lokasi=" + lokasi + "&jenis=" + jenis + "&kategori=" + kategori;
	window.open(url);
}
//Laporan Pembelian
function getLaporanPembelian(start=0) {
	var lokasi = $('#sblokasi').val();
    var jenis = $('#sbjenis').val();
	var kategori = $('#sbkategori').val();
	var supplier = $('#sbsuplier').val();
	var dari = $('#sbdari').val();
	var sampai = $('#sbsampai').val();
	var url = base_url + "laporan/data_pembelian?start="+start+"&lokasi="+lokasi+"&jenis="+jenis+"&kategori="+kategori+"&supplier="+supplier+"&dari="+dari+"&sampai="+sampai;
    console.log(url);
	$.ajax({
		url     : url,
		type    : "GET",
		dataType: "json",
		data    : {get_param : 'value'},
		success : function(data){
			//menghitung jumlah data
            //console.clear();
                
			$('#jmldata').val(data["row_count"]);
            if (data["status"] == true) {
                //$('#headerstok').html(data.header);
			    var barang    = data["data"];
			    var jmlData=barang.length;
			    var limit   = data["limit"]
			    var tabel   = "";
				//Create Tabel
				var kdbl = '-';
				var colspan = 10;
				if (lokasi == "") colspan++;
				if (kategori == "") colspan++;
				if (jenis == "") colspan++;
				console.clear();
				grandtot = "";
				var spantot = colspan - 1;
			    for(var i=0; i<jmlData;i++){
					start++;
					//console.log()
					if (kdbl == '-' || kdbl != barang[i]['KDBL']) {
						start = 1;
						//console.log("KDBL 1 ("+i+") : " + kdbl +" KDBL 2 ("+i+") : " + barang[i]["KDBL"])
						if (kdbl != '-') tabel += grandtot;
						tabel += '<tr>';
						tabel += "<td colspan='" + colspan + "' class='bg-gray'>";
						tabel += "<table style='width:100%'>";
						if (lokasi == "") {
							tabel += "<tr>" +
								"<th>Lokasi  </th>" +
								"<th colspan='"+spantot+"'> : "+barang[i]['NMLOKASI']+"</th>" +
								"</tr>"
;						}
						tabel += "<tr>" +
							"<th style='width:100px'>Kode Beli</th>" +
							"<th style='width:200px'>: " + barang[i]['KDBL'] + " </th>" +
							"<th style='width:100px'>Tanggal Beli</th>" +
							"<th style='width:200px'>: " + barang[i]['DTBL'] + "</th>" +
							"<th style='width:100px'>Jenis Bayar</th>" +
							"<th >: " + barang[i]['PEMBAYARAN'] + " </th>" +
							"</tr>" +
							"<tr>" +
							"<th>No Faktur</th>" +
							"<th>: " + barang[i]['NOFAKTUR'] + "</th>" +
							"<th>Supplier</th>" +
							"<th style='width:200px'>: " + barang[i]['NMSUPPLIER'] + "</th>";
						if(barang[i]['PEMBAYARAN']=="CREDIT"){
						tabel += "<th style='width:200px'>Deadline</th>" +
								"<th>: " + barang[i]['JTEMPO'] + " </th>";
						} else {
							tabel += "<th style='width:200px'>&nbsp;</th>" +
								"<th>&nbsp;</th>";
						}
						tabel+="</tr>"+
							"</table>"+
							"</th>";
						tabel += '</tr>';
						
						grandtot = "<tr style='font-weight:bold'>"+
							"<td class='text-right' colspan='"+spantot+"' >Total Faktur</td>"+
							"<td class='text-right'>Rp. "+barang[i]['TOTFAKTUR']+" </td>"+
							"</tr>";
						if(barang[i]['TOTDISKON_ITEM']>0)
						{
							grandtot += "<tr style='font-weight:bold'>" +
							"<td class='text-right' colspan='"+spantot+"' >Total Diskon</td>"+
							"<td class='text-right'>Rp. "+barang[i]['TOTDISKON_ITEM']+" </td>"+
								"</tr>";
						}
						
						if(barang[i]['DISKON_GLOBAL']>0)
						{
							grandtot += "<tr style='font-weight:bold'>" +
							"<td class='text-right' colspan='"+spantot+"' >Diskon Global</td>"+
							"<td class='text-right'>Rp. "+barang[i]['DISKON_GLOBAL']+" </td>"+
								"</tr>";
						}
						if(barang[i]['TOTPPN']>0)
						{
							grandtot += "<tr style='font-weight:bold'>" +
							"<td class='text-right' colspan='"+spantot+"' >Total PPN</td>"+
							"<td class='text-right'>Rp. "+barang[i]['TOTPPN']+" </td>"+
								"</tr>";
						}
						if(barang[i]['ONGKIR']>0){
							grandtot += "<tr style='font-weight:bold'>"+
							"<td class='text-right' colspan='"+spantot+"' >ONGKIR</td>"+
							"<td class='text-right'>Rp. "+barang[i]['ONGKIR']+" </td>"+
								"</tr>";
						}
						grandtot += "<tr style='font-weight:bold'>"+
							"<td class='text-right' colspan='"+spantot+"' >Grand Total</td>"+
							"<td class='text-right'>Rp. "+barang[i]['GRANDTOT']+" </td>"+
						"</tr>";
						
						tabel += data.header;
					}
					kdbl = barang[i]["KDBL"];
                    tabel += '<tr>';
                    tabel+="<td>"+start+"</td>";
					if (lokasi == "") tabel += "<td>" + barang[i]["NMLOKASI"] + "</td>";
			        tabel+="<td>"+barang[i]["KDBRG"]+"</td>";
                    tabel += "<td>" + barang[i]["NMBRG"] + "</td>";
                    tabel+="<td>"+barang[i]["NMGENERIK"]+"</td>";
			        tabel+="<td>"+barang[i]["NMSATUAN"]+"</td>";
                    if (kategori == "") tabel += "<td>" + barang[i]["NMKTBRG"] + "</td>";
					if (jenis == "") tabel += "<td>" + barang[i]["JENISBRG"] + "</td>";
					tabel += "<td class='text-right'>" + barang[i]["JSTOK"] + "</td>";
					tabel += "<td class='text-right'>Rp. " + barang[i]["HBELI"] + "</td>";
					tabel += "<td class='text-right'>Rp. " + barang[i]["HDISKON"] + "</td>";
					tabel += "<td class='text-right'>Rp. " + barang[i]["HMODAL"] + "</td>";
					tabel += "<td class='text-right'>Rp. " + barang[i]["SUBTOTAL"] + "</td>";
					tabel += "</tr>";
					
				}
				tabel += grandtot;
			    $('#datastok').html(tabel);
			    //Create Pagination
			    if(data["row_count"]<=limit){
					$('#pagination').html("");
			    }else{
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
					var btnFirst = "<button class='btn btn-default btn-sm' type='button' onclick='getLaporanPembelian(0" +
							")'><span class='fa fa-angle-double-left'></span></button>";
					if (curIdx > 1) {
						var prevSt = ((curIdx - 1) * data["limit"]) - jmlData;
						btnFirst += "<button class='btn btn-default btn-sm' type='button' onclick='getLaporanPembelian(" +
								prevSt + ")'><span class='fa fa-angle-left'></span></button>";
					}

					var btnLast = "";
					if (curIdx < jmlPage) {
						var nextSt = ((curIdx + 1) * data["limit"]) - jmlData;
						btnLast += "<button class='btn btn-default btn-sm' type='button' onclick='getLaporanPembelian(" +
								nextSt + ")'><span class='fa fa-angle-right'></span></button>";
					}
					btnLast += "<button class='btn btn-default btn-sm' type='button' onclick='getLaporanPembelian(" +
							lastSt + ")'><span class='fa fa-angle-double-right'></span></button>";

					if (jmlPage >= 5) {
						if (curIdx >= 2) {
							var idx_start = curIdx - 1;
							var idx_end = idx_start + 4;
							if (idx_end >= jmlPage) 
								idx_end = jmlPage;
							}
						else {
							var idx_start = 1;
							var idx_end = 5;
						}
						for (var j = idx_start; j <= idx_end; j++) {
							st = (j * data["limit"]) - jmlData;
							if (curSt == st) 
								btn = "btn-success";
							else 
								btn = "btn-default";
							btnIdx += "<button class='btn " + btn +
									" btn-sm' type='button' onclick='getLaporanPembelian(" + st + ")'>" + j +
									"</button>";
						}
					} else {
						for (var j = 1; j <= jmlPage; j++) {
							st = (j * data["limit"]) - jmlData;
							if (curSt == st) 
								btn = "btn-success";
							else 
								btn = "btn-default";
							btnIdx += "<button class='btn " + btn +
									" btn-sm' type='button' onclick='getLaporanPembelian(" + st + ")'>" + j +
									"</button>";
						}
					}
					pagination += btnFirst + btnIdx + btnLast;
					$('#pagination').html('<div class="btn-group">' + pagination+'</div>');
			    }
			}
		}
	});
}

function printLaporanPembelian() {
	var lokasi = $('#sblokasi').val();
	var jenis = $('#sbjenis').val();
	var supplier = $('#sbsuplier').val();
	var kategori = $('#sbkategori').val();
	var dari = $('#sbdari').val();
	var sampai = $('#sbsampai').val();
	var url = base_url + "laporan/cetakpembelian?lokasi=" + lokasi + "&jenis=" + jenis + "&kategori=" + kategori+"&supplier=" + supplier+ "&dari=" + dari+ "&sampai=" + sampai;
	window.open(url);
}

//laporan Retur Pembelian
function getLaporanReturPembelian(start=0) {
	var lokasi = $('#salokasi').val();
	var supplier = $('#sasuplier').val();
	var dari = $('#sadari').val();
	var sampai = $('#sasampai').val();
	var url = base_url + "laporan/data_retur_pembelian?start="+start+"&lokasi="+lokasi+"&supplier="+supplier+"&dari="+dari+"&sampai="+sampai;
    console.log(url);
	$.ajax({
		url     : url,
		type    : "GET",
		dataType: "json",
		data    : {get_param : 'value'},
		success : function(data){
			//menghitung jumlah data
            //console.clear();
                
			$('#jmldata').val(data["row_count"]);
            if (data["status"] == true) {
                //$('#headerstok').html(data.header);
			    var barang    = data["data"];
			    var jmlData=barang.length;
			    var limit   = data["limit"]
			    var tabel   = "";
				//Create Tabel
				var kdbl = '-';
				var colspan = 10;
				if (lokasi == "") colspan++;
				console.clear();
				grandtot = "";
				var spantot = colspan - 1;
			    for(var i=0; i<jmlData;i++){
					start++;
					//console.log()
					if (kdbl == '-' || kdbl != barang[i]['KDBL']) {
						start = 1;
						//console.log("KDBL 1 ("+i+") : " + kdbl +" KDBL 2 ("+i+") : " + barang[i]["KDBL"])
						if (kdbl != '-') tabel += grandtot;
						tabel += '<tr>';
						tabel += "<td colspan='" + colspan + "' class='bg-gray'>";
						tabel += "<table style='width:100%'>";
						if (lokasi == "") {
							tabel += "<tr>" +
								"<th>Lokasi  </th>" +
								"<th colspan='"+spantot+"'> : "+barang[i]['NMLOKASI']+"</th>" +
								"</tr>"
;						}
						tabel += "<tr>" +
							"<th style='width:100px'>Kode Ret</th>" +
							"<th style='width:200px'>: " + barang[i]['KDBL_RET'] + " </th>" +
							"<th style='width:100px'>Tanggal Ret</th>" +
							"<th style='width:200px'>: " + barang[i]['DTBL_RET'] + "</th>" +
							"<th style='width:100px'>Jenis Bayar</th>" +
							"<th >: " + barang[i]['PEMBAYARAN'] + " </th>" +
							"</tr>" +
							"<tr>" +
							"<th>No Faktur</th>" +
							"<th>: " + barang[i]['NOFAKTUR'] + "</th>" +
							"<th>Supplier</th>" +
							"<th style='width:200px'>: " + barang[i]['NMSUPPLIER'] + "</th>";
						if(barang[i]['PEMBAYARAN']=="CREDIT"){
						tabel += "<th style='width:200px'>Deadline</th>" +
								"<th>: " + barang[i]['JTEMPO'] + " </th>";
						} else {
							tabel += "<th style='width:200px'>&nbsp;</th>" +
								"<th>&nbsp;</th>";
						}
						tabel+="</tr>"+
							"</table>"+
							"</th>";
						tabel += '</tr>';
						
						grandtot = "<tr style='font-weight:bold'>"+
							"<td class='text-right' colspan='"+spantot+"' >Total Faktur</td>"+
							"<td class='text-right'>Rp. "+barang[i]['TOTFAKTUR']+" </td>"+
							"</tr>";
						if(barang[i]['TOTDISKON_ITEM']>0)
						{
							grandtot += "<tr style='font-weight:bold'>" +
							"<td class='text-right' colspan='"+spantot+"' >Total Diskon</td>"+
							"<td class='text-right'>Rp. "+barang[i]['TOTDISKON_ITEM']+" </td>"+
								"</tr>";
						}
						
						if(barang[i]['DISKON_GLOBAL']>0)
						{
							grandtot += "<tr style='font-weight:bold'>" +
							"<td class='text-right' colspan='"+spantot+"' >Diskon Global</td>"+
							"<td class='text-right'>Rp. "+barang[i]['DISKON_GLOBAL']+" </td>"+
								"</tr>";
						}
						if(barang[i]['TOTPPN']>0)
						{
							grandtot += "<tr style='font-weight:bold'>" +
							"<td class='text-right' colspan='"+spantot+"' >Total PPN</td>"+
							"<td class='text-right'>Rp. "+barang[i]['TOTPPN']+" </td>"+
								"</tr>";
						}
						if(barang[i]['ONGKIR']>0){
							grandtot += "<tr style='font-weight:bold'>"+
							"<td class='text-right' colspan='"+spantot+"' >ONGKIR</td>"+
							"<td class='text-right'>Rp. "+barang[i]['ONGKIR']+" </td>"+
								"</tr>";
						}
						grandtot += "<tr style='font-weight:bold'>"+
							"<td class='text-right' colspan='"+spantot+"' >Grand Total</td>"+
							"<td class='text-right'>Rp. "+barang[i]['GRANDTOT']+" </td>"+
						"</tr>";
						
						tabel += data.header;
					}
					kdbl = barang[i]["KDBL"];
                    tabel += '<tr>';
                    tabel+="<td>"+start+"</td>";
					if (lokasi == "") tabel += "<td>" + barang[i]["NMLOKASI"] + "</td>";
			        tabel+="<td>"+barang[i]["KDBRG"]+"</td>";
                    tabel += "<td>" + barang[i]["NMBRG"] + "</td>";
                    tabel+="<td>"+barang[i]["NMGENERIK"]+"</td>";
			        tabel+="<td>"+barang[i]["NMSATUAN"]+"</td>";
                    tabel += "<td>" + barang[i]["NMKTBRG"] + "</td>";
					tabel += "<td>" + barang[i]["JENISBRG"] + "</td>";
					tabel += "<td class='text-right'>" + barang[i]["JSTOK"] + "</td>";
					tabel += "<td class='text-right'>Rp. " + barang[i]["HMODAL"] + "</td>";
					var sub_tot = barang[i]["JSTOK"] * barang[i]["HMODAL"];
					tabel += "<td class='text-right'>Rp. " + sub_tot + "</td>";
					tabel += "</tr>";
					
				}
				tabel += grandtot;
			    $('#datastoksa').html(tabel);
			    //Create Pagination
			    if(data["row_count"]<=limit){
					$('#paginationsa').html("");
			    }else{
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
					var btnFirst = "<button class='btn btn-default btn-sm' type='button' onclick='getLaporanPembelian(0" +
							")'><span class='fa fa-angle-double-left'></span></button>";
					if (curIdx > 1) {
						var prevSt = ((curIdx - 1) * data["limit"]) - jmlData;
						btnFirst += "<button class='btn btn-default btn-sm' type='button' onclick='getLaporanPembelian(" +
								prevSt + ")'><span class='fa fa-angle-left'></span></button>";
					}

					var btnLast = "";
					if (curIdx < jmlPage) {
						var nextSt = ((curIdx + 1) * data["limit"]) - jmlData;
						btnLast += "<button class='btn btn-default btn-sm' type='button' onclick='getLaporanPembelian(" +
								nextSt + ")'><span class='fa fa-angle-right'></span></button>";
					}
					btnLast += "<button class='btn btn-default btn-sm' type='button' onclick='getLaporanPembelian(" +
							lastSt + ")'><span class='fa fa-angle-double-right'></span></button>";

					if (jmlPage >= 5) {
						if (curIdx >= 2) {
							var idx_start = curIdx - 1;
							var idx_end = idx_start + 4;
							if (idx_end >= jmlPage) 
								idx_end = jmlPage;
							}
						else {
							var idx_start = 1;
							var idx_end = 5;
						}
						for (var j = idx_start; j <= idx_end; j++) {
							st = (j * data["limit"]) - jmlData;
							if (curSt == st) 
								btn = "btn-success";
							else 
								btn = "btn-default";
							btnIdx += "<button class='btn " + btn +
									" btn-sm' type='button' onclick='getLaporanPembelian(" + st + ")'>" + j +
									"</button>";
						}
					} else {
						for (var j = 1; j <= jmlPage; j++) {
							st = (j * data["limit"]) - jmlData;
							if (curSt == st) 
								btn = "btn-success";
							else 
								btn = "btn-default";
							btnIdx += "<button class='btn " + btn +
									" btn-sm' type='button' onclick='getLaporanPembelian(" + st + ")'>" + j +
									"</button>";
						}
					}
					pagination += btnFirst + btnIdx + btnLast;
					$('#paginationsa').html('<div class="btn-group">' + pagination+'</div>');
			    }
			}
		}
	});
}