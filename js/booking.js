$(document).ready(function () {
    listBooking()
});
function listBooking(){
    var tgl = $('#tgl').val();
	var url = base_url+"jkn/booking/listbooking";
	$.ajax({
		url     : url,
		type    : "GET",
		dataType: "json",
		data    : {
			keyword : $('#keyword').val(),
			tgl : $('#tgl').val()
		},
        beforeSend: function() {
            // setting a timeout
            $('#data').html('<tr><td colspan="10"><span class="fa fa-spinner fa-spin"></span> Menunggu...</td></tr>');
        },
		success : function(data){
		    //menghitung jumlah data
		    console.clear();
			console.log(data)
		    if(data.metadata.code==200){
		        var poli    = data.response;
		        console.log(poli);
		        var jmlData=poli.length;
				var table="";
				var no=0;
		        for (let i = 0; i < poli.length; i++) {
					no++;
					const e = poli[i];
					table+=`<tr>
					<td>`+no+`</td>
					<td>`+e.kodebooking+`</td>
					<td>`+e.norm+`</td>
					<td>`+e.nik+`</td>
					<td>`+e.nomorkartu+`</td>
					<td>`+e.nama+`</td>
					<td>`+e.namapoli+`</td>
					<td>`+e.namadokter+`</td>
					<td>`+e.nomorantrean+`</td>
					<td>`+(e.checkin=="0"?"<span class='btn btn-danger btn-xs'>Belum Checkin</span>":"<span class='btn btn-success btn-xs'>Sudah Checkin</span>")+`</td>
					<td style="width: 150px;">
					<div class="btn-group">
					<button class="btn btn-success btn-sm" onclick="aprovePasien('`+e.kodebooking+`','`+e.norm+`')" `+(e.tanggalperiksa!=tgl ||e.checkin=="0" ? "disabled" : "")+`><span class="fa fa-check"></span>Aprove</button>
					<button class="btn btn-danger btn-sm" onclick="batalPasien('`+e.kodebooking+`','`+e.norm+`')"><span class="fa fa-remove"></span>Batal</button>
					</div>
					</td>
					</tr>`
				}
		        
		        $('#data').html(table);
		        
		    }else{
                $('#data').html("<tr><td colspan='10'>"+data.metadata.message+"</td></tr>");
            }
		}
	});
}

function aprovePasien(kodebooking,nomr){
    var prefix=nomr.substr(0, 2);
    // alert(prefix); return false;
    if(prefix!="S-") var url=base_url+"registrasi/daftar_rawat_jalan/"+nomr+"?bookingjkn="+kodebooking; 
    else var url=base_url+"/pasien_baru/tambah?jns=rj&bookingjkn="+kodebooking; 
	location.href=url;
}

function batalPasien(kodebooking){
	swal({
		title: "Konfirmasi",
		text: 'Apakah anda yakin akan membatalkan antrian kodebooking ' + kodebooking + '?',
		type: "warning",
		showCancelButton: true,
		confirmButtonText: "Ya",
		cancelButtonText: "Tidak",
		closeOnConfirm: true,
		closeOnCancel: true
	},
	function (isConfirm) {
		if (isConfirm) {
			var formData = {
				kodebooking : kodebooking,
				taskid : 99
			}
			var url = base_url+"jkn/mobile/updatewaktuantrean";
			$.ajax({
				url         : url,
				type        : "POST",
				data        : formData,
				dataType    : "JSON",
				success     : function(data){
					console.clear();
					
					console.log(data);
					if(data.metadata.code==200){
						tampilkanPesan('success',data.metadata.message);
					}else{
						//alert(data.metaData.message);
						tampilkanPesan('warning',data.metadata.message);
					}  
				},
				error       : function(jqXHR,ajaxOption,errorThrown){
					console.log(jqXHR.responseText);                    
				}
			});
		}
	});
	
}