$(document).ready(function() {
    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true
    });
});

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
		beforeSend: function() {
            // setting a timeout
            $('#btnSuplesiJasaraharja').prop("disabled",true);
            $('#iconbtnSuplesiJasaraharja').removeClass('fa fa-search')
            $('#iconbtnSuplesiJasaraharja').addClass('fa fa-spinner spin')
        },
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
				tampilkanPesan('warning',data.metaData.message);
			}  
		},
        error: function(xhr) { // if error occured
            $('#error').modal('show');
			$('#xhr').html(xhr.responseText)
            $('#btnSuplesiJasaraharja').prop("disabled",false);
            $('#iconbtnSuplesiJasaraharja').removeClass('fa fa-spinner spin')
            $('#iconbtnSuplesiJasaraharja').addClass('fa fa-search')
        },
        complete: function() {
            $('#btnSuplesiJasaraharja').prop("disabled",false);
            $('#iconbtnSuplesiJasaraharja').removeClass('fa fa-spinner spin')
            $('#iconbtnSuplesiJasaraharja').addClass('fa fa-search')
        },
	});
}
function dataKecelakaan(){
    var noKartu=$('#c-noKartu').val();
    // var formData = {
	// 	tglPelayanan 	: $('#c-tglPelayanan').val(),
	// }
	console.clear();
	// console.log(formData);
	// var formData = new FormData($('#theform')[0]);
	$.ajax({
		url         : url_call_back+"/vclaim/sep/kecelakaan",
		type        : "GET",
		data        : {noKartu : $('#l-noKartu').val()},
		dataType    : "JSON",
		beforeSend: function() {
            // setting a timeout
            $('#btnDataIndukKecelakaan').prop("disabled",true);
            $('#iconbtnDataIndukKecelakaan').removeClass('fa fa-search')
            $('#iconbtnDataIndukKecelakaan').addClass('fa fa-spinner spin')
        },
		success     : function(data){
			console.clear();
			console.log(data);
			if(data.metaData.code==200){
				// location.reload();
                var row=data.response.list;
                var table="";
                for (let index = 0; index < row.length; index++) {
                    table+='<tr><td>'+row[index].noSEP+'</td>'+
                    '<td>'+row[index].tglKejadian+'</td>'+
                    '<td>'+row[index].ppkPelSEP+'</td>'+
                    '<td>'+row[index].kdProp+'</td>'+
                    '<td>'+row[index].kdKab+'</td>'+
                    '<td>'+row[index].kdKec+'</td>'+
                    '<td>'+row[index].ketKejadian+'</td>'+
                    '<td>'+row[index].noSEPSuplesi+'</td>'+
                    '</tr>'
                }
                $('#getdata').html(table);
			}else{
				//alert(data.metaData.message);
				tampilkanPesan('warning',data.metaData.message);
			}  
		},
        error: function(xhr) { // if error occured
            $('#error').modal('show');
			$('#xhr').html(xhr.responseText)
            $('#btnDataIndukKecelakaan').prop("disabled",false);
            $('#iconbtnDataIndukKecelakaan').removeClass('fa fa-spinner spin')
            $('#iconbtnDataIndukKecelakaan').addClass('fa fa-search')
        },
        complete: function() {
            $('#btnDataIndukKecelakaan').prop("disabled",false);
            $('#iconbtnDataIndukKecelakaan').removeClass('fa fa-spinner spin')
            $('#iconbtnDataIndukKecelakaan').addClass('fa fa-search')
        },
	});
}