function ulangi(){
    var nomorantri=$('#nomorantri').val();
    var panggil=parseInt(nomorantri)
    bunyi(panggil)
    tampilkanPesan('info','Nomor Antrian '+panggil+" dipanggil...")
}
function panggil(){
    // var nomorantri=$('#nomorantri').val();
    // var panggil=parseInt(nomorantri)+1;
    // $('#nomorantri').val(panggil);
    var antrean = $("input[name='antrean']:checked").val();
    var dokter=$('#dokterJaga').val();
    var nomorantri=$('#nomorantri').val();
    var url = base_url + "antrian/panggilantrean?dokter="+dokter+"&jns="+antrean+"&nomor="+nomorantri;
    console.log(url);
    $.ajax({
        url: url,
        type: "GET",
        dataType: "JSON",
        beforeSend: function () {
            // setting a timeout
            $('#btnPanggil').prop("disabled",true);
			$('#iconPanggil').removeClass('fa fa-ticket')
			$('#iconPanggil').addClass('fa fa-spinner fa-spin')
        },
        success: function (data) {
            if (data.status == true) {
                $('#nomorantri').val(data.no_antrian_poly)
                $('#btnPanggil').prop("disabled",false);
                $('#iconPanggil').removeClass('fa fa-spinner fa-spin')
                $('#iconPanggil').addClass('fa fa-ticket')
                getLastAntrean();
                bunyi(data.no_antrian_poly)
                // tampilkanPesan('success',data["message"]);
                tampilkanPesan('success','Nomor Antrian '+data.no_antrian_poly+" dipanggil...")
            } else {
                tampilkanPesan('error',data["message"]);
            }
        },
        error: function(xhr) { // if error occured
				
            // $('#error').modal('show');
            // $('#xhr').html(xhr.responseText)
            $('#btnPanggil').prop("disabled",false);
            $('#iconPanggil').removeClass('fa fa-spinner fa-spin')
            $('#iconPanggil').addClass('fa fa-ticket')
        },
        complete: function() {
            $('#btnPanggil').prop("disabled",false);
            $('#iconPanggil').removeClass('fa fa-spinner fa-spin')
            $('#iconPanggil').addClass('fa fa-ticket')
        },
    });

    // bunyi(panggil)
    
}
function bunyi(panggil){
    totalwaktu=0;
    //MAINKAN SUARA NOMOR URUT
    setTimeout(function() {
        document.getElementById('bell').pause();
        document.getElementById('bell').currentTime=0;
        document.getElementById('bell').play();
    }, totalwaktu);
    totalwaktu=50;

    var bell = document.getElementById("bell");
    bell.onended = function() {
        setTimeout(function() {
            document.getElementById('suarabelnomorurut').pause();
            document.getElementById('suarabelnomorurut').currentTime=0;
            document.getElementById('suarabelnomorurut').play();
        }, totalwaktu);
    }
    
    
    var label=$('#labelantrean').val();
    if(label==""){
        // var la = document.getElementById("labelantrean");
        // la.onended = function() {
        //     setTimeout(function() {
        //         document.getElementById(la).pause();
        //         document.getElementById(la).currentTime=0;
        //         document.getElementById(la).play();
        //     }, totalwaktu);
        // }
        var suarabelnomorurut = document.getElementById("suarabelnomorurut");
    }else{
        var la = document.getElementById("suarabelnomorurut");
        la.onended = function() {
            setTimeout(function() {
                document.getElementById(label).pause();
                document.getElementById(label).currentTime=0;
                document.getElementById(label).play();
            }, totalwaktu);
        }
        var suarabelnomorurut = document.getElementById(label);
    }

    if(panggil<10){
        suarabelnomorurut.onended = function() {
            setTimeout(function() {
                document.getElementById('angka'+panggil).pause();
                document.getElementById('angka'+panggil).currentTime=0;
                document.getElementById('angka'+panggil).play();
            }, totalwaktu);
        }
        var selesai = document.getElementById('angka'+panggil);
    } else if(panggil==10){
        suarabelnomorurut.onended = function() {
            setTimeout(function() {
                document.getElementById('sepuluh').pause();
                document.getElementById('sepuluh').currentTime=0;
                document.getElementById('sepuluh').play();
            }, totalwaktu);
        }
        var selesai = document.getElementById('sepuluh');
    }else if(panggil==11){
        suarabelnomorurut.onended = function() {
            setTimeout(function() {
                document.getElementById('sebelas').pause();
                document.getElementById('sebelas').currentTime=0;
                document.getElementById('sebelas').play();
            }, totalwaktu);
        }
        var selesai = document.getElementById('sebelas');
    }else if(panggil<20){
        var angka=panggil%10;
        suarabelnomorurut.onended = function() {
            setTimeout(function() {
                document.getElementById('angka'+angka).pause();
                document.getElementById('angka'+angka).currentTime=0;
                document.getElementById('angka'+angka).play();
            }, totalwaktu);
        }
        var angka1=document.getElementById('angka'+angka);
        angka1.onended = function() {
            setTimeout(function() {
                document.getElementById('belas').pause();
                document.getElementById('belas').currentTime=0;
                document.getElementById('belas').play();
            }, totalwaktu);
        }
        var selesai = document.getElementById('belas');
    }else if(panggil<100){
        var mod10=panggil%10;
        // alert (mod10)
        if(mod10==0){
            var angka=panggil/10;
            suarabelnomorurut.onended = function() {
                setTimeout(function() {
                    document.getElementById('angka'+angka).pause();
                    document.getElementById('angka'+angka).currentTime=0;
                    document.getElementById('angka'+angka).play();
                }, totalwaktu);
            }
            var angka1=document.getElementById('angka'+angka);
            angka1.onended = function() {
                setTimeout(function() {
                    document.getElementById('puluh').pause();
                    document.getElementById('puluh').currentTime=0;
                    document.getElementById('puluh').play();
                }, totalwaktu);
            }
            var selesai = document.getElementById('puluh');
        }else{
            var angka=(panggil-mod10)/10;
            suarabelnomorurut.onended = function() {
                setTimeout(function() {
                    document.getElementById('angka'+angka).pause();
                    document.getElementById('angka'+angka).currentTime=0;
                    document.getElementById('angka'+angka).play();
                }, totalwaktu);
                
            }
            var angka1=document.getElementById('angka'+angka);
            angka1.onended = function() {
                setTimeout(function() {
                    document.getElementById('puluh').pause();
                    document.getElementById('puluh').currentTime=0;
                    document.getElementById('puluh').play();
                }, totalwaktu);
            }

            var angka2=document.getElementById('puluh');
            angka2.onended = function() {
                setTimeout(function() {
                    document.getElementById('puluhan'+mod10).pause();
                    document.getElementById('puluhan'+mod10).currentTime=0;
                    document.getElementById('puluhan'+mod10).play();
                }, totalwaktu);
            }
            var selesai = document.getElementById('puluhan'+mod10);
        }
    }else if(panggil==100){
        suarabelnomorurut.onended = function() {
            setTimeout(function() {
                document.getElementById('seratus').pause();
                document.getElementById('seratus').currentTime=0;
                document.getElementById('seratus').play();
            }, totalwaktu);
        }
        var selesai = document.getElementById('seratus');
    }else if(panggil<1000){
        var mod100=panggil%100;
        if(mod100==0){
            var angka=panggil/100;
            if(panggil<200){
                suarabelnomorurut.onended = function() {
                    setTimeout(function() {
                        document.getElementById('seratus').pause();
                        document.getElementById('seratus').currentTime=0;
                        document.getElementById('seratus').play();
                    }, totalwaktu);
                }
                var selesai=document.getElementById('seratus');
            }else{
                suarabelnomorurut.onended = function() {
                    setTimeout(function() {
                        document.getElementById('angka'+angka).pause();
                        document.getElementById('angka'+angka).currentTime=0;
                        document.getElementById('angka'+angka).play();
                    }, totalwaktu);
                }
                var angka1=document.getElementById('angka'+angka);
                angka1.onended = function() {
                    setTimeout(function() {
                        document.getElementById('ratus').pause();
                        document.getElementById('ratus').currentTime=0;
                        document.getElementById('ratus').play();
                    }, totalwaktu);
                }
                var selesai = document.getElementById('ratus');
            }

            
        }else{
            if(panggil<200){
                suarabelnomorurut.onended = function() {
                    setTimeout(function() {
                        document.getElementById('seratus').pause();
                        document.getElementById('seratus').currentTime=0;
                        document.getElementById('seratus').play();
                    }, totalwaktu);
                }
                var ratus=document.getElementById('seratus');
            }else{
                var angka=(panggil-mod100)/100;
                suarabelnomorurut.onended = function() {
                    setTimeout(function() {
                        document.getElementById('angka'+angka).pause();
                        document.getElementById('angka'+angka).currentTime=0;
                        document.getElementById('angka'+angka).play();
                    }, totalwaktu);
                }
                var angka1=document.getElementById('angka'+angka);
                angka1.onended = function() {
                    setTimeout(function() {
                        document.getElementById('ratus').pause();
                        document.getElementById('ratus').currentTime=0;
                        document.getElementById('ratus').play();
                    }, totalwaktu);
                }
                var ratus=document.getElementById('ratus');
            }
            // alert(mod100)
            if(mod100<10){
                
                ratus.onended = function() {
                    setTimeout(function() {
                        document.getElementById('ratusan'+mod100).pause();
                        document.getElementById('ratusan'+mod100).currentTime=0;
                        document.getElementById('ratusan'+mod100).play();
                    }, totalwaktu);
                }
                var selesai = document.getElementById('ratusan'+mod100);
            }else if(mod100==10){
                // var ratus=document.getElementById('ratus');
                ratus.onended = function() {
                    setTimeout(function() {
                        document.getElementById('sepuluh').pause();
                        document.getElementById('sepuluh').currentTime=0;
                        document.getElementById('sepuluh').play();
                    }, totalwaktu);
                }
                var selesai = document.getElementById('sepuluh');
            }else if(mod100==11){
                // var ratus=document.getElementById('ratus');
                ratus.onended = function() {
                    setTimeout(function() {
                        document.getElementById('sebelas').pause();
                        document.getElementById('sebelas').currentTime=0;
                        document.getElementById('sebelas').play();
                    }, totalwaktu);
                }
                var selesai = document.getElementById('sebelas');
            }else if(mod100<20){
                var angkaratusan=parseInt(mod100)%10;
                // var ratus=document.getElementById('ratus');
                ratus.onended = function() {
                    setTimeout(function() {
                        document.getElementById('ratusan'+angkaratusan).pause();
                        document.getElementById('ratusan'+angkaratusan).currentTime=0;
                        document.getElementById('ratusan'+angkaratusan).play();
                    }, totalwaktu);
                }
                var belas=document.getElementById('ratusan'+angkaratusan);
                belas.onended = function() {
                    setTimeout(function() {
                        document.getElementById('belas').pause();
                        document.getElementById('belas').currentTime=0;
                        document.getElementById('belas').play();
                    }, totalwaktu);
                }
                var selesai = document.getElementById('belas');
            }else{
                var mod10=mod100%10;
                // var ratus=document.getElementById('ratus');
                var angkaratusan=(mod100-mod10)/10;
                if(mod10==0){
                    // alert(angkaratusan)
                    ratus.onended = function() {
                        setTimeout(function() {
                            document.getElementById('ratusan'+angkaratusan).pause();
                            document.getElementById('ratusan'+angkaratusan).currentTime=0;
                            document.getElementById('ratusan'+angkaratusan).play();
                        }, totalwaktu);
                    }
                    var puluh=document.getElementById('ratusan'+angkaratusan);
                    puluh.onended = function() {
                        setTimeout(function() {
                            document.getElementById('puluh').pause();
                            document.getElementById('puluh').currentTime=0;
                            document.getElementById('puluh').play();
                        }, totalwaktu);
                    }
                    var selesai = document.getElementById('puluh');
                }else{
                    ratus.onended = function() {
                        setTimeout(function() {
                            document.getElementById('ratusan'+angkaratusan).pause();
                            document.getElementById('ratusan'+angkaratusan).currentTime=0;
                            document.getElementById('ratusan'+angkaratusan).play();
                        }, totalwaktu);
                    }
                    var puluh=document.getElementById('ratusan'+angkaratusan);
                    puluh.onended = function() {
                        setTimeout(function() {
                            document.getElementById('puluh').pause();
                            document.getElementById('puluh').currentTime=0;
                            document.getElementById('puluh').play();
                        }, totalwaktu);
                    }
                    var angka=document.getElementById('puluh');
                    angka.onended = function() {
                        setTimeout(function() {
                            document.getElementById('angka'+mod10).pause();
                            document.getElementById('angka'+mod10).currentTime=0;
                            document.getElementById('angka'+mod10).play();
                        }, totalwaktu);
                    }
                    var selesai=document.getElementById('angka'+mod10);
                }
                
            }
        }
    }

    selesai.onended = function() {
        setTimeout(function() {
            document.getElementById('poliklinik').pause();
            document.getElementById('poliklinik').currentTime=0;
            document.getElementById('poliklinik').play();
        }, totalwaktu);
    }

    var ruang = document.getElementById('poliklinik');
    ruang.onended = function() {
        setTimeout(function() {
            document.getElementById('ruang').pause();
            document.getElementById('ruang').currentTime=0;
            document.getElementById('ruang').play();
        }, totalwaktu);
        getLastAntrean();
    }
}

function getLastAntrean(){
    var dokterjaga=$('#dokterJaga').val();
    var antrean = $("input[name='antrean']:checked").val();
    var curent=$('#nomorantri').val();
    if(antrean>1) {
        
        var url = base_url + "antrian/lastantrean/"+dokterjaga+"/"+antrean;
    }
    else var url = base_url + "antrian/lastantrean/"+dokterjaga+"/"+antrean
    console.log(url);
    $.ajax({
        url: url,
        type: "GET",
        dataType: "JSON",
        beforeSend: function () {
            // setting a timeout
            // $('#btnPanggil').prop("disabled",true);
			// $('#iconPanggil').removeClass('fa fa-arrow-right')
			// $('#iconPanggil').addClass('fa fa-spinner fa-spin')
        },
        success: function (data) {
            if (data.status == true) {
                if(data.data==null){
                    var dokter=$('#dokterJaga :selected').html();
                    $('#v-nomorAntri').html('Kosong');
                    $('#nomorantri').val('0');
                    $('#v-namadokter').html(dokter);
                    $('#v-dokterjuga').html(dokter);
                    $('#v-waktupanggil').html(data.sekarang);
                    $('#v-nomr').html('-');
                    $('#v-waktudaftar').html('-');
                    $('#v-waktupanggil').html('-');
                    $('#v-nik').html('-');
                    $('#v-nama').html('-');
                    if(antrean==1){
                        var nomor='<input type="hidden" name="nomorantri" id="nomorantri" class="form-control pull-right" value="0">';
                        $('#v-nomorantrean').html(nomor);
                    }else{
                        listAntrean(0);
                    }
                    var btn='<button type="button" class="btn btn-danger btn-sm btn-block" disabled><span class="fa fa-ticket"></span> Antrean Habis</button>';
                    $('#btnpanggil').html(btn);
                }else{
                    var dokter=$('#dokterJaga :selected').html();
                    if(data.data.labelantrean=='' || data.data.labelantrean == null) $('#v-nomorAntri').html(data.data.no_antrian_poly);
                    else $('#v-nomorAntri').html(data.data.labelantrean+"."+data.data.no_antrian_poly);
                    $('#nomorantri').val(data.data.no_antrian_poly);
                    $('#v-namadokter').html(dokter);
                    $('#v-dokterjuga').html(dokter);
                    $('#v-waktupanggil').html(data.sekarang);
                    $('#v-nomr').html(data.data.nomr);
                    $('#v-waktudaftar').html(data.data.tglmasuk);
                    $('#v-waktupanggil').html(data.data.tglmasuk);
                    $('#v-nik').html(data.data.no_ktp);
                    $('#v-nama').html(data.data.nama_pasien);

                    $('#id_daftar').val(data.data.id_daftar);
                    $('#idx_daftar').val(data.data.idx_daftar);
                    $('#kodebooking').val(data.data.kodebooking);
                    $('#labelantrean').val(data.data.labelantrean);
                    $('#reg_unit').val(data.data.reg_unit);
                    if(antrean==1){
                        var nomor='<input type="hidden" name="nomorantri" id="nomorantri" class="form-control pull-right" value="'+data.data.no_antrian_poly+'">';
                        $('#v-nomorantrean').html(nomor);
                    }else{
                        listAntrean(data.data.no_antrian_poly);
                    }
                    if(data.data.status_panggil==1){
                        if(data.data.taskid==4) {
                            var btn='<button type="button" class="btn btn-danger btn-sm btn-block" disabled><span class="fa fa-ticket"></span> Pasien Sedang Dilayani</button>';
                            var skipdis="disabled";
                            var bataldis="disabled";
                            var btnlayan='<button type="button" class="btn btn-danger btn-sm btn-block" onclick="selesaiLayan()" id="btnMulailayan"><span id="iconMulaiLayan" class="fa fa-check"></span>Selesai Layani</button>';
                        }else {
                            var btn = '<button type="button" class="btn btn-warning btn-sm btn-block" onclick="panggil()"><span class="fa fa-ticket"></span> Panggil Ulang</button>'
                            var skipdis="";
                            var bataldis="";
                            var btnlayan='<button type="button" class="btn btn-success btn-sm btn-block" onclick="mulaiLayan()" id="btnMulailayan"><span id="iconMulaiLayan" class="fa fa-check"></span>Mulai Layani</button>';
                        }
                        if(antrean==1){
                            var button=btn+
                            '<div class="row top10">'+
                                '<div class="col-md-4">'+btnlayan+
                                '</div>'+
                                '<div class="col-md-4"><button type="button" class="btn btn-info btn-sm btn-block" onclick="skip()"><span class="fa fa-arrow-right " '+skipdis+'></span> Lewati</button></div>'+
                                '<div class="col-md-4"><button type="button" class="btn btn-danger btn-sm btn-block" onclick="batalAntrean()"><span class="fa fa-remove "></span> Batal</button></div>'+
                            '</div>';
                        }else  if(antrean==2){
                            var button=btn+
                            '<div class="row top10">'+
                                '<div class="col-md-4">'+btnlayan+
                                '</div>'+
                                '<div class="col-md-4"><button type="button" class="btn btn-info btn-sm btn-block" onclick="skip()"><span class="fa fa-arrow-right " '+skipdis+'></span> Lewati</button></div>'+
                                '<div class="col-md-4"><button type="button" class="btn btn-danger btn-sm btn-block" onclick="batalAntrean()" '+bataldis+'><span class="fa fa-remove " ></span> Batal</button></div>'+
                            '</div>';
                        }else{
                            var button=btn+
                            '<div class="row top10">'+
                                '<div class="col-md-6">'+btnlayan+
                                '</div>'+
                                '<div class="col-md-6"><button type="button" class="btn btn-danger btn-sm btn-block" onclick="batalAntrean()" '+bataldis+'><span class="fa fa-remove " ></span> Batal</button></div>'+
                            '</div>';
                        }
                        
                    }else{
                        var button='<button type="button" class="btn btn-success btn-sm btn-block" onclick="panggil()"><span class="fa fa-ticket"></span> Panggil Berikutnya</button>';
                        button+='<div class="row top10">'+
                            '<div class="col-md-6">'+'<button type="button" class="btn btn-info btn-sm btn-block" onclick="skip()" id="btnMulailayan"><span  class="fa fa-arrow-right"></span> Lewati</button>'+
                            '</div>'+
                            '<div class="col-md-6"><button type="button" class="btn btn-danger btn-sm btn-block" onclick="batalAntrean()"><span class="fa fa-remove " ></span> Batal</button></div>'+
                        '</div>'
                    }
                    $('#btnpanggil').html(button);
                }
                
            } else {
                tampilkanPesan('error',data["message"], 'Error');
            }
        },
        error: function(xhr) { // if error occured
			// $('#btnPanggil').prop("disabled",false);
            // $('#iconPanggil').removeClass('fa fa-spinner fa-spin')
            // $('#iconPanggil').addClass('fa fa-arrow-right')
        },
        complete: function() {
            // $('#btnPanggil').prop("disabled",false);
            // $('#iconPanggil').removeClass('fa fa-spinner fa-spin')
            // $('#iconPanggil').addClass('fa fa-arrow-right')
        },
    });
}
function listAntrean(pilih){
    var dokterjaga=$('#dokterJaga').val();
    var antrean = $("input[name='antrean']:checked").val();
    var url = base_url + "antrian/listantrean/"+dokterjaga+"/"+antrean;
    console.log(url);
    $.ajax({
        url: url,
        type: "GET",
        dataType: "JSON",
        beforeSend: function () {
            // setting a timeout
            // $('#btnPanggil').prop("disabled",true);
			// $('#iconPanggil').removeClass('fa fa-arrow-right')
			// $('#iconPanggil').addClass('fa fa-spinner fa-spin')
        },
        success: function (data) {
            if (data.status == true) {
                var row=data.data;
                var option='<div class="form-group">'+
                '<label class="control-label col-sm-3" for="pwd">Nomor Antrian:</label>'+
                '<div class="col-sm-9">'+
                '<select name="nomorantri" id="nomorantri" class="form-control" onchange="getLastAntrean()">';
                for (let index = 0; index < row.length; index++) {
                    const baris = row[index];
                    if(baris.no_antrian_poly==pilih) option+='<option value="'+baris.no_antrian_poly+'" selected>'+baris.no_antrian_poly+'</option>';
                    else option+='<option value="'+baris.no_antrian_poly+'">'+baris.no_antrian_poly+'</option>';
                }
                option+="</select></div></div>";
                $('#v-nomorantrean').html(option)
            } else {
                tampilkanPesan('error',data["message"]);
            }
        },
        error: function(xhr) { // if error occured
			// $('#btnPanggil').prop("disabled",false);
            // $('#iconPanggil').removeClass('fa fa-spinner fa-spin')
            // $('#iconPanggil').addClass('fa fa-arrow-right')
        },
        complete: function() {
            // $('#btnPanggil').prop("disabled",false);
            // $('#iconPanggil').removeClass('fa fa-spinner fa-spin')
            // $('#iconPanggil').addClass('fa fa-arrow-right')
        },
    });
}
function mulaiLayan(){
    // var id_daftar=$('#xid_daftar').val();
    // alert(id_daftar);
    var postData = {}
    postData["id_daftar"] = $('#id_daftar').val();
    postData["kodebooking"] = $('#kodebooking').val();
    postData["taskid"] = $('#taskid').val();
    console.clear()
    console.log(postData);
    var url=urljkn+"mobile/updatewaktuantrean";
    // alert(url)
    $.ajax({
        url: url,
        type: "POST",
        data: postData,
        dataType: 'JSON',
        beforeSend: function () {
            // setting a timeout
            $('#btnMulailayan').prop("disabled",true);
			$('#iconMulaiLayan').removeClass('fa fa-check')
			$('#iconMulaiLayan').addClass('fa fa-spinner fa-spin')
        },
        success: function (data) {
            if(data.metadata.code==200){
                // location.reload(); 
                tampilkanPesan('success',data.metadata.message);
                // location.reload(); 
                var idx=$('#idx_daftar').val();
                getLastAntrean();
                // window.open(base_url + "antrian/entry_nota?idx="+idx);
                // window.location.href=base_url + "antrian/entry_nota?idx="+idx
                // setTimeout(location.reload(),5000);
            }else if(data.metadata.code==208){
                var idx=$('#idx_daftar').val();
                getLastAntrean();
                // window.location.href=base_url + "antrian/entry_nota?idx="+idx
                // window.open(base_url + "antrian/entry_nota?idx="+idx);
            }else{
                tampilkanPesan('warning',data.metadata.message,'');
                swal({
                    title: data.metadata.message,
                    text: "Apakah anda akan melanjutkan proses layanan!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: '#DD6B55',
                    confirmButtonText: 'Yes, I am sure!',
                    cancelButtonText: "No, cancel it!",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function(isConfirm){
                    if (isConfirm){
                        var idx=$('#idx_daftar').val();
                        // window.location.href=base_url + "antrian/entry_nota?idx="+idx
                    } else {
                        tampilkanPesan('warning','Ok')
                    }
                 });
            }
        },
        error: function(xhr) { // if error occured
			$('#btnMulailayan').prop("disabled",false);
            $('#iconMulaiLayan').removeClass('fa fa-spinner fa-spin')
            $('#iconMulaiLayan').addClass('fa fa-check');
        },
        complete: function() {
            $('#btnMulailayan').prop("disabled",false);
            $('#iconMulaiLayan').removeClass('fa fa-spinner fa-spin')
            $('#iconMulaiLayan').addClass('fa fa-check')
        },
    });
}

function selesaiLayan(){
    // var id_daftar=$('#xid_daftar').val();
    // alert(id_daftar);
    var postData = {}
    postData["id_daftar"] = $('#id_daftar').val();
    postData["kodebooking"] = $('#kodebooking').val();
    postData["taskid"] = 5;
    console.clear()
    console.log(postData);
    var url=urljkn+"mobile/updatewaktuantrean";
    // alert(url)
    $.ajax({
        url: url,
        type: "POST",
        data: postData,
        dataType: 'JSON',
        beforeSend: function () {
            // setting a timeout
            $('#btnMulailayan').prop("disabled",true);
			$('#iconMulaiLayan').removeClass('fa fa-check')
			$('#iconMulaiLayan').addClass('fa fa-spinner fa-spin')
        },
        success: function (data) {
            if(data.metadata.code==200){
                // location.reload(); 
                tampilkanPesan('success',data.metadata.message);
                // location.reload(); 
                var idx=$('#idx_daftar').val();
                getLastAntrean();
                // window.open(base_url + "antrian/entry_nota?idx="+idx);
                // window.location.href=base_url + "antrian/entry_nota?idx="+idx
                // setTimeout(location.reload(),5000);
            }else if(data.metadata.code==208){
                var idx=$('#idx_daftar').val();
                getLastAntrean();
                // window.location.href=base_url + "antrian/entry_nota?idx="+idx
                // window.open(base_url + "antrian/entry_nota?idx="+idx);
            }else{
                tampilkanPesan('warning',data.metadata.message,'');
                swal({
                    title: data.metadata.message,
                    text: "Apakah anda akan melanjutkan proses layanan!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: '#DD6B55',
                    confirmButtonText: 'Yes, I am sure!',
                    cancelButtonText: "No, cancel it!",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function(isConfirm){
                    if (isConfirm){
                        var idx=$('#idx_daftar').val();
                        window.location.href=base_url + "antrian/entry_nota?idx="+idx
                    } else {
                        tampilkanPesan('warning','Ok')
                    }
                 });
            }
        },
        error: function(xhr) { // if error occured
			$('#btnMulailayan').prop("disabled",false);
            $('#iconMulaiLayan').removeClass('fa fa-spinner fa-spin')
            $('#iconMulaiLayan').addClass('fa fa-check');
        },
        complete: function() {
            $('#btnMulailayan').prop("disabled",false);
            $('#iconMulaiLayan').removeClass('fa fa-spinner fa-spin')
            $('#iconMulaiLayan').addClass('fa fa-check')
        },
    });
}

function skip(){
    var postData = {}
    postData["kodebooking"] = $('#kodebooking').val();
    console.clear()
    console.log(postData);
    var url=base_url+"antrian/skipantrian";
    $.ajax({
        url: url,
        type: "POST",
        data: postData,
        dataType: 'JSON',
        beforeSend: function () {
            // setting a timeout
            $('#btnMulailayan').prop("disabled",true);
			$('#iconMulaiLayan').removeClass('fa fa-check')
			$('#iconMulaiLayan').addClass('fa fa-spinner fa-spin')
        },
        success: function (data) {
            if(data.status==true){
                tampilkanPesan('success',data.message);
                getLastAntrean();
            }else{
                tampilkanPesan('warning',data.message);
            }
        },
        error: function(xhr) { // if error occured
			$('#btnMulailayan').prop("disabled",false);
            $('#iconMulaiLayan').removeClass('fa fa-spinner fa-spin')
            $('#iconMulaiLayan').addClass('fa fa-check');
        },
        complete: function() {
            $('#btnMulailayan').prop("disabled",false);
            $('#iconMulaiLayan').removeClass('fa fa-spinner fa-spin')
            $('#iconMulaiLayan').addClass('fa fa-check')
        },
    });
}
