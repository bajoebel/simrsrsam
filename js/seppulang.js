$(document).ready(function() {
    riwayatPulang();
});

function riwayatPulang(){
    var bulan=$('#bulan').val();
	var tahun=$('#tahun').val();
	if(tahun.length!=4) return false;
    var filter=$('#filter').val();
	var url = url_call_back+"/vclaim/sep/listpulang/"+bulan+"/"+tahun;
	$.ajax({
	    url     : url,
	    type    : "GET",
	    dataType: "json",
	    data    :  {filter : filter},
	    success : function(data){
	        if(data.metaData.code==200){
	            var histori    = data.response.list;
	            var jmlData=histori.length;
	            var table   = "";
	            //Create Tabel
	            for(var i=0; i<jmlData;i++){
					table+='<tr>'+
                        '<td>'+histori[i].noSep+'</td>'+
                        '<td>'+histori[i].noSepUpdating+'</td>'+
                        '<td>'+histori[i].jnsPelayanan+'</td>'+
                        '<td>'+histori[i].ppkTujuan+'</td>';
					table+='<td>'+histori[i].noKartu+'</td>';
                    table+='<td>'+histori[i].nama+'</td>'+
                        '<td>'+histori[i].tglSep+'</td>'+
                        '<td>'+histori[i].tglPulang+'</td>'+
                        '<td>'+histori[i].status+'</td>'+
                        '<td>'+histori[i].tglMeninggal+'</td>'+
                        '<td>'+histori[i].noSurat+'</td>'+
                        '<td>'+histori[i].keterangan+'</td>'+
                        '<td>'+histori[i].user+'</td>'+
                        '<td><a href="'+base_url+'vclaim/sep/detail/'+histori[i].noSep+'" class="btn btn-primary btn-sm"> <span class="fa fa-search"></span> Detail</a></td>'+
                    '</tr>';
	            }
				$('#getdata').html(table);
				// var faskes=$('#r-faskes').val();
	        }else{
				$('#getdata').html('<tr><td colspan="10">Tidak Ada Data</td></tr>');
				tampilkanPesan('warning',data.metaData.message)
			}
	    }
	});
}
