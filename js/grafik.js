$(document).ready(function() {
    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true
    });
});
function pertanggal(){
	var server = $('#server').val();
	var tgl = $('#tgl').val();
	var url = base_url+'jkn/mobile/waktutunggupertanggal/' + server + "?tgl=" + tgl
	console.clear()
	console.log(url)
	$.ajax({
		url     : url,
		type    : "GET",
		dataType: "json",
		data    : {get_param : 'value'},
		beforeSend: function () {
			var tabel = "<b>Loading...</b>";
			$('#pertanggal').html(tabel);
		},
		success : function(data){
			if(data.metadata.code==200){
				$('#pertanggal').html('');
				var row    = data.response.list;
				//Create Tabel
				console.clear();
				var grf="";
                for (let index = 0; index < row.length; index++) {
                    const element = row[index];
                    // const randomColor = Math.floor(Math.random()*16777215).toString(16);
                    // const randomColor = (Math.random() * 0xFFFFFF << 0).toString(16).padStart(6, '0');
                    // console.log(randomColor);
                    for (let index = 0; index < row.length; index++) {
						const element = row[index];
						// const randomColor = Math.floor(Math.random()*16777215).toString(16);
						const randomColor = (Math.random() * 0xFFFFFF << 0).toString(16).padStart(6, '0');
						console.log(randomColor);
						// let arrdata = [element.avg_waktu_task1, element.avg_waktu_task2, element.avg_waktu_task3,element.avg_waktu_task4,element.avg_waktu_task5,element.avg_waktu_task6];
						let maxval=Math.max(element.avg_waktu_task1, element.avg_waktu_task2, element.avg_waktu_task3,element.avg_waktu_task4,element.avg_waktu_task5,element.avg_waktu_task6);
						// alert(maxval);
						let task1persen=(element.avg_waktu_task1/maxval) * 90;
						let task2persen=(element.avg_waktu_task2/maxval) *90;
						let task3persen=(element.avg_waktu_task3/maxval) *90;
						let task4persen=(element.avg_waktu_task4/maxval) *90;
						let task5persen=(element.avg_waktu_task5/maxval) *90;
						let task6persen=(element.avg_waktu_task6/maxval) *90;
						grf+=''+
						'<div class="kotak">'+
							'<div class="col-md-12" style="text-align:center;border-bottom:3px double #000">'+
								'<label for="">Rata Rata Waktu Tunggu Poliklinik '+element.namapoli+' (Detik) Pada Tanggal '+element.tanggal+' dari '+element.jumlah_antrean+' Antrean</label>'+
							'</div>'+
							'<div class="col-md-12" style="text-align:left;padding:1px;">'+
								'<div class="row">'+
									'<div class="col-md-3" style="text-align:right;"><i>Waktu Tunggu Admisi</i></div>'+
									'<div class="col-md-9">'+
										'<div style="width:'+task1persen+'%; height:25px;float:left;"><div class="progress" style="background:#5bc6a5;"></div></div>&nbsp;'+element.avg_waktu_task1+
									'</div>'+
								'</div>'+
								'<div class="row">'+
									'<div class="col-md-3" style="text-align:right;"><i>Waktu Layan Admisi</i></div>'+
									'<div class="col-md-9">'+
										'<div style="width:'+task2persen+'%; height:25px;float:left;"><div class="progress" style="background:#e8e7ab;"></div></div>&nbsp;'+element.avg_waktu_task2+
									'</div>'+
								'</div>'+
								'<div class="row">'+
									'<div class="col-md-3" style="text-align:right;"><i>Waktu Tunggu Poli</i></div>'+
									'<div class="col-md-9">'+
										'<div style="width:'+task3persen+'%; height:25px;float:left;"><div class="progress" style="background:#8aeff2;"></div></div>&nbsp;'+element.avg_waktu_task3+
									'</div>'+
								'</div>'+
								'<div class="row">'+
									'<div class="col-md-3" style="text-align:right;"><i>Waktu Layan Poli</i></div>'+
									'<div class="col-md-9">'+
										'<div style="width:'+task4persen+'%; height:25px;float:left;"><div class="progress" style="background:#a0dd9c;"></div></div>&nbsp;'+element.avg_waktu_task4+
									'</div>'+
								'</div>'+
								'<div class="row">'+
									'<div class="col-md-3" style="text-align:right;"><i>Waktu Tunggu Farmasi</i></div>'+
									'<div class="col-md-9">'+
										'<div style="width:'+task5persen+'%; height:25px;float:left;"><div class="progress" style="background:#697523;"></div></div>&nbsp;'+element.avg_waktu_task5+
									'</div>'+
								'</div>'+
								'<div class="row">'+
									'<div class="col-md-3" style="text-align:right;"><i>Waktu Layan Farmasi</i></div>'+
									'<div class="col-md-9">'+
										'<div style="width:'+task6persen+'%; height:25px;float:left;"><div class="progress" style="background:#ffc4a6;"></div></div>&nbsp;'+element.avg_waktu_task6+
									'</div>'+
								'</div>'+
							'</div>'+
						'</div>';
					}
                }
                $('#pertanggal').html(grf);
			}else{
				$('#pertanggal').html(data.metadata.message)
			}
		},
		complete : function(){
			//$('#loading').hide();
		}
	});
}

function perbulan(){
	var server = $('#server1').val();
	var bulan = $('#bulan').val();
	var tahun = $('#tahun').val();
	var url = base_url+'jkn/mobile/waktutungguperbulan/' + server + "?bulan=" + bulan+"&tahun="+tahun
	console.clear()
	console.log(url)
	$.ajax({
		url     : url,
		type    : "GET",
		dataType: "json",
		data    : {get_param : 'value'},
		beforeSend: function () {
			var tabel = "<b>Loading...</b>";
			$('#perbulan').html(tabel);
		},
		success : function(data){
			if(data.metadata.code==200){
				$('#perbulan').html('');
				var row    = data.response.list;
				//Create Tabel
				console.clear();
				var grf="";
                for (let index = 0; index < row.length; index++) {
                    const element = row[index];
                    // const randomColor = Math.floor(Math.random()*16777215).toString(16);
                    // const randomColor = (Math.random() * 0xFFFFFF << 0).toString(16).padStart(6, '0');
                    // console.log(randomColor);
                    for (let index = 0; index < row.length; index++) {
						const element = row[index];
						// const randomColor = Math.floor(Math.random()*16777215).toString(16);
						const randomColor = (Math.random() * 0xFFFFFF << 0).toString(16).padStart(6, '0');
						console.log(randomColor);
						// let arrdata = [element.avg_waktu_task1, element.avg_waktu_task2, element.avg_waktu_task3,element.avg_waktu_task4,element.avg_waktu_task5,element.avg_waktu_task6];
						let maxval=Math.max(element.avg_waktu_task1, element.avg_waktu_task2, element.avg_waktu_task3,element.avg_waktu_task4,element.avg_waktu_task5,element.avg_waktu_task6);
						// alert(maxval);
						let task1persen=(element.avg_waktu_task1/maxval) * 90;
						let task2persen=(element.avg_waktu_task2/maxval) *90;
						let task3persen=(element.avg_waktu_task3/maxval) *90;
						let task4persen=(element.avg_waktu_task4/maxval) *90;
						let task5persen=(element.avg_waktu_task5/maxval) *90;
						let task6persen=(element.avg_waktu_task6/maxval) *90;
						grf+=''+
						'<div class="kotak">'+
							'<div class="col-md-12" style="text-align:center;border-bottom:3px double #000">'+
								'<label for="">Rata Rata Waktu Tunggu Poliklinik '+element.namapoli+' (Detik) Pada Tanggal '+element.tanggal+' dari '+element.jumlah_antrean+' Antrean</label>'+
							'</div>'+
							'<div class="col-md-12" style="text-align:left;padding:1px;">'+
								'<div class="row">'+
									'<div class="col-md-3" style="text-align:right;"><i>Waktu Tunggu Admisi</i></div>'+
									'<div class="col-md-9">'+
										'<div style="width:'+task1persen+'%; height:25px;float:left;"><div class="progress" style="background:#5bc6a5;"></div></div>&nbsp;'+element.avg_waktu_task1+
									'</div>'+
								'</div>'+
								'<div class="row">'+
									'<div class="col-md-3" style="text-align:right;"><i>Waktu Layan Admisi</i></div>'+
									'<div class="col-md-9">'+
										'<div style="width:'+task2persen+'%; height:25px;float:left;"><div class="progress" style="background:#e8e7ab;"></div></div>&nbsp;'+element.avg_waktu_task2+
									'</div>'+
								'</div>'+
								'<div class="row">'+
									'<div class="col-md-3" style="text-align:right;"><i>Waktu Tunggu Poli</i></div>'+
									'<div class="col-md-9">'+
										'<div style="width:'+task3persen+'%; height:25px;float:left;"><div class="progress" style="background:#8aeff2;"></div></div>&nbsp;'+element.avg_waktu_task3+
									'</div>'+
								'</div>'+
								'<div class="row">'+
									'<div class="col-md-3" style="text-align:right;"><i>Waktu Layan Poli</i></div>'+
									'<div class="col-md-9">'+
										'<div style="width:'+task4persen+'%; height:25px;float:left;"><div class="progress" style="background:#a0dd9c;"></div></div>&nbsp;'+element.avg_waktu_task4+
									'</div>'+
								'</div>'+
								'<div class="row">'+
									'<div class="col-md-3" style="text-align:right;"><i>Waktu Tunggu Farmasi</i></div>'+
									'<div class="col-md-9">'+
										'<div style="width:'+task5persen+'%; height:25px;float:left;"><div class="progress" style="background:#697523;"></div></div>&nbsp;'+element.avg_waktu_task5+
									'</div>'+
								'</div>'+
								'<div class="row">'+
									'<div class="col-md-3" style="text-align:right;"><i>Waktu Layan Farmasi</i></div>'+
									'<div class="col-md-9">'+
										'<div style="width:'+task6persen+'%; height:25px;float:left;"><div class="progress" style="background:#ffc4a6;"></div></div>&nbsp;'+element.avg_waktu_task6+
									'</div>'+
								'</div>'+
							'</div>'+
						'</div>';
					}
                }
                $('#perbulan').html(grf);
			}else{
				$('#perbulan').html(data.metadata.message)
			}
		},
		complete : function(){
			//$('#loading').hide();
		}
	});
}
pertanggal() 
