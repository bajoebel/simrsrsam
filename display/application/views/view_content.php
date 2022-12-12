<div class="row"  >
  <?php if(empty($setting)) $mode ="Tabel"; else $mode = $setting->display_mode; ?>
  
  <div class="col-md-12">
    <input type="hidden" name="mode" id="mode" value="<?php echo $mode; ?>">
    <input type="hidden" name="txt" id="txt" value="0">
    <div id="block"></div>
    <div id="tabel"></div>
  </div>
    
</div>
<!-- jQuery 3 -->
<script src="<?php echo base_url() ."assets/" ?>components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript">
  var elem = document.getElementById("body-content");
  var c = 0;
  var t;
  var hitung=0;
  var timer_is_on = 0;
  var base_url = "<?php echo base_url() ?>";
  //var mode=$('mode').val();
  getDisplay();
  //getKamar(0);
  //startCount();
  var c=0;
  var mode="";
  var interval=1000;
  timedCount();
  function timedCount() {
    //document.getElementById("txt").value = c;
    //console.log(c);
    $('#txt').val(c);
    //if(mode!=$('#mode').val()) c=0;
    var mode = $('#mode').val();
    if(mode=='Tabel'||mode=='Split') interval=5000; else interval = 1000;
    var limit=<?php echo $limit ?>;
    var jmlData=<?php echo $jmlData ?>;
    //alert(jmlData);
    if(c==jmlData%limit) c=1;
    else c = c + 1;
    if(c==1) {
      //alert("Full");
      show_full();
    }
    t = setTimeout(timedCount, interval);
    //console.clear();
    //hitung++;
    //console.log(c);
    //if(c%5==0) getKelas();
    getDisplay();
    //getKamar(c);
  }
  function getDisplay(){
    var search;
    var url=base_url + "display/mode";
    $.ajax({
      url : url,
      type: "GET",
      dataType: "json",
      data: {get_param : 'value'},
      success : function(data){
        $('#mode').val(data["display_mode"])
        if(data["display_mode"]=="Block"){
          $('#tabel').removeClass("col-md-6");
          $('#block').removeClass("col-md-6");
          $('#tabel').hide();
          $('#block').show();
          getRuangan();
        }else if(data["display_mode"]=="Tabel"){
          //(c);
          $('#tabel').removeClass("col-md-6");
          $('#block').removeClass("col-md-6");
          $('#tabel').show();
          $('#block').hide();
          getKamar(c);
        }else{
          getRuangan();
          getKamar(c);
          $('#tabel').addClass("col-md-6");
          $('#block').addClass("col-md-6");
          $('#tabel').show();
          $('#block').show();
        }
      }
    });  
  }

  function getRuangan(){
    //alert("test");
    var url=base_url + "display/ruangan";
    $.ajax({
      url : url,
      type: "GET",
      dataType: "json",
      data: {get_param : 'value'},
      success : function(data){
        var jmlData=data.length;
        var display="";
        var total_bed=0;
        var terisi=0;
        var tersedia=0;
        var style_ruang = 'nama_ruang';
        var style_total = 'bulat';
        var style_kelas = 'kelas';
        var style_jumlah= 'jumlah';
        var mode=$('#mode').val();
        if(mode=='Split'){
          style_ruang='split_nama_ruang';
          style_total='split_bulat';
          style_kelas='split_kelas';
          style_jumlah='split_jumlah';
        }else{
          style_ruang='nama_ruang';
          style_total='bulat';
          style_kelas='kelas';
          style_jumlah='jumlah';
        }
        var offset=0;
        var jmlkelas=0;
        for (var i = 0 ; i < jmlData; i++) {
          total_bed=parseInt(data[i]["k_super_vip"])+parseInt(data[i]["k_vip"])+parseInt(data[i]["k_kelas_1"])+parseInt(data[i]["k_kelas_2"])+parseInt(data[i]["k_kelas_3"])+parseInt(data[i]["k_intermediate"])+parseInt(data[i]["k_rawat_khusus"])+parseInt(data[i]["k_isolasi"])+parseInt(data[i]["k_stroke_care_unit"])+parseInt(data[i]["k_incubator"])+parseInt(data[i]["k_box_bayi"])+parseInt(data[i]["k_hcu"])+parseInt(data[i]["k_gynekologi"]);
          //if(i==0) display+="<div class='col-md-1'></div>";
          jmlkelas=0;
          offset=i%5;
          if(total_bed>0){
            
            display+='<div class="col-5 shadow">';
            display+='<div class="box box-primary box-solid ">';
            display+='<div class="row">';
            display+='<div class="col-md-12">';
            display+='<div class=" col-md-12 bg-primary '+style_ruang+'">';
            display+=data[i]["jenis_ruangan"];
            display+='<b class="'+ style_total +'">' + total_bed +'</b>';
            display+='</div>';
            display+='</div>';
            display+='<div class="col-md-12">';
            //Display Kelas
            if(data[i]["k_super_vip"]>0){
              terisi=parseInt(data[i]["tlk_super_vip"]) + parseInt(data[i]["tpr_super_vip"]);
              tersedia=pasrseInt(data[i]["k_super_vip"])-terisi;
              display+='<div class="col-md-8 '+style_kelas+' ">SUPER VIP</div>';
              display+='<div class="col-md-2 bg-green '+style_jumlah+' text-center" >'+tersedia+'</div>';
              display+='<div class="col-md-2 bg-red '+style_jumlah+' text-center" >'+terisi+'</div>';
              jmlkelas++;
            }
            if(data[i]["k_vip"]>0){
              terisi=parseInt(data[i]["tlk_vip"]) + parseInt(data[i]["tpr_vip"]);
              tersedia=parseInt(data[i]["k_vip"])-terisi;
              display+='<div class="col-md-8 '+style_kelas+' ">VIP</div>';
              display+='<div class="col-md-2 bg-green '+style_jumlah+' text-center" >'+tersedia+'</div>';
              display+='<div class="col-md-2 bg-red '+style_jumlah+' text-center" >'+terisi+'</div>';
              jmlkelas++;
            }
            jmlkelas++;
            //alert(data[i]['nonkelas']);
            if(data[i]["nonkelas"]==0){
              //if(data[i]["k_kelas_1"]>0){
              terisi=parseInt(data[i]["tlk_kelas_1"]) + parseInt(data[i]["tpr_kelas_1"]);
              tersedia=parseInt(data[i]["k_kelas_1"])-terisi;
              display+='<div class="col-md-8 '+style_kelas+' ">KELAS I</div>';
              display+='<div class="col-md-2 bg-green '+style_jumlah+' text-center" >'+tersedia+'</div>';
              display+='<div class="col-md-2 bg-red '+style_jumlah+' text-center" >'+terisi+'</div>';
              console.log("Data Kelas I " + data[i]["jenis_ruangan"]);
              console.log("TERISI : " + data[i]["tlk_kelas_1"] +"+"+data[i]["tpr_kelas_1"]+"="+terisi);
              console.log("TERSEDIA : " + data[i]["k_kelas_1"]+"-"+terisi + "=" + tersedia);
              //}
              jmlkelas++;
              //if(data[i]["k_kelas_2"]>0){
              terisi=parseInt(data[i]["tlk_kelas_2"]) + parseInt(data[i]["tpr_kelas_2"]);
              tersedia=parseInt(data[i]["k_kelas_2"])-terisi;
              display+='<div class="col-md-8 '+style_kelas+' ">KELAS II</div>';
              display+='<div class="col-md-2 bg-green '+style_jumlah+' text-center" >'+tersedia+'</div>';
              display+='<div class="col-md-2 bg-red '+style_jumlah+' text-center" >'+terisi+'</div>';
              //}

              jmlkelas++;
              //if(data[i]["k_kelas_3"]>0){
              terisi=parseInt(data[i]["tlk_kelas_3"]) + parseInt(data[i]["tpr_kelas_3"]);
              tersedia=parseInt(data[i]["k_kelas_3"])-terisi;
              display+='<div class="col-md-8 '+style_kelas+' ">KELAS III</div>';
              display+='<div class="col-md-2 bg-green '+style_jumlah+' text-center" >'+tersedia+'</div>';
              display+='<div class="col-md-2 bg-red '+style_jumlah+' text-center" >'+terisi+'</div>';
              //}
            }else{
              jmlkelas--;
            }
            if(data[i]["k_intermediate"]>0){
              terisi=parseInt(data[i]["tlk_intermediate"]) + parseInt(data[i]["tpr_intermediate"]);
              tersedia=parseInt(data[i]["k_intermediate"])-terisi;
              display+='<div class="col-md-8 '+style_kelas+' ">INTERMEDIATE</div>';
              display+='<div class="col-md-2 bg-green '+style_jumlah+' text-center" >'+tersedia+'</div>';
              display+='<div class="col-md-2 bg-red '+style_jumlah+' text-center" >'+terisi+'</div>';
              jmlkelas++;
            }
            if(data[i]["k_isolasi"]>0){
              terisi=parseInt(data[i]["tlk_isolasi"]) + parseInt(data[i]["tpr_isolasi"]);
              tersedia=parseInt(data[i]["k_isolasi"])-terisi;
              display+='<div class="col-md-8 '+style_kelas+' ">ISOLASI</div>';
              display+='<div class="col-md-2 bg-green '+style_jumlah+' text-center" >'+tersedia+'</div>';
              display+='<div class="col-md-2 bg-red '+style_jumlah+' text-center" >'+terisi+'</div>';
              jmlkelas++;
            }
            if(data[i]["k_rawat_khusus"]>0){
              terisi=parseInt(data[i]["tlk_rawat_khusus"]) + parseInt(data[i]["tpr_rawat_khusus"]);
              tersedia=parseInt(data[i]["k_rawat_khusus"])-terisi;
              display+='<div class="col-md-8 '+style_kelas+' ">RAWAT KHUSUS</div>';
              display+='<div class="col-md-2 bg-green '+style_jumlah+' text-center" >'+tersedia+'</div>';
              display+='<div class="col-md-2 bg-red '+style_jumlah+' text-center" >'+terisi+'</div>';
              jmlkelas++;
            }
            if(data[i]["k_stroke_care_unit"]>0){
              terisi=parseInt(data[i]["tlk_stroke_care_unit"]) + parseInt(data[i]["tpr_stroke_care_unit"]);
              tersedia=parseInt(data[i]["k_stroke_care_unit"])-terisi;
              display+='<div class="col-md-8 '+style_kelas+' ">STROKE CARE UNIT</div>';
              display+='<div class="col-md-2 bg-green '+style_jumlah+' text-center" >'+tersedia+'</div>';
              display+='<div class="col-md-2 bg-red '+style_jumlah+' text-center" >'+terisi+'</div>';
              jmlkelas++;
            }
            if(data[i]["k_incubator"]>0){
              terisi=parseInt(data[i]["tlk_incubator"]) + parseInt(data[i]["tpr_incubator"]);
              tersedia=parseInt(data[i]["k_incubator"])-terisi;
              display+='<div class="col-md-8 '+style_kelas+' ">INCUBATOR</div>';
              display+='<div class="col-md-2 bg-green '+style_jumlah+' text-center" >'+tersedia+'</div>';
              display+='<div class="col-md-2 bg-red '+style_jumlah+' text-center" >'+terisi+'</div>';
              jmlkelas++;
            }
            if(data[i]["k_box_bayi"]>0){
              terisi=parseInt(data[i]["tlk_box_bayi"]) + parseInt(data[i]["tpr_box_bayi"]);
              tersedia=parseInt(data[i]["k_box_bayi"])-terisi;
              display+='<div class="col-md-8 '+style_kelas+' ">COVIS</div>';
              display+='<div class="col-md-2 bg-green '+style_jumlah+' text-center" >'+tersedia+'</div>';
              display+='<div class="col-md-2 bg-red '+style_jumlah+' text-center" >'+terisi+'</div>';
              jmlkelas++;
            }
            if(data[i]["k_hcu"]>0){
              terisi=parseInt(data[i]["tlk_hcu"]) + parseInt(data[i]["tpr_hcu"]);
              tersedia=parseInt(data[i]["k_hcu"])-terisi;
              display+='<div class="col-md-8 '+style_kelas+' ">HCU</div>';
              display+='<div class="col-md-2 bg-green '+style_jumlah+' text-center" >'+tersedia+'</div>';
              display+='<div class="col-md-2 bg-red '+style_jumlah+' text-center" >'+terisi+'</div>';
              jmlkelas++;
            }
            if(data[i]["k_gynekologi"]>0){
              terisi=parseInt(data[i]["tlk_gynekologi"]) + parseInt(data[i]["tpr_gynekologi"]);
              tersedia=parseInt(data[i]["k_gynekologi"])-terisi;
              display+='<div class="col-md-8 '+style_kelas+' ">GYNEKOLOGI</div>';
              display+='<div class="col-md-2 bg-green '+style_jumlah+' text-center" >'+tersedia+'</div>';
              display+='<div class="col-md-2 bg-red '+style_jumlah+' text-center" >'+terisi+'</div>';
              jmlkelas++;
            }
            if(jmlkelas<7){
              for(var j = jmlkelas;j<7;j++){
                display+='<div class="col-md-12 '+style_kelas+' ">&nbsp;</div>';
              }
            }
            //display+='<div class="col-md-12 '+style_kelas+' ">'+jmlkelas+'</div>';

            display+='</div></div></div></div>';
            //display+="<div class='col-md-1'></div>";
            if(i%5==4) display+="<div class='row'></div>";

          }
        }
        //alert(mode);
        
        if(mode=="Block") {
          //display+='<div class="row"></div>';
          //display+="";
          display+='<div class="col-md-6 shadow">';
        }else{
          display+='<div class="col-md-6 shadow">';
        }

        display+='<div class="">';
        display+='<div class="row">';
        display+='<div class="col-md-12 text-center" >';
        display+='<div class=" col-md-1 bg-green '+style_ruang+'">&nbsp;</div>';
        display+='<div class=" col-md-2 '+style_ruang+'"><b> = Kosong</b></div>';
        display+='<div class=" col-md-1 bg-red '+style_ruang+'">&nbsp;</div>';
        display+='<div class=" col-md-2 '+style_ruang+'"><b> = Terisi</b></div>';
        display+='<div class=" col-md-1 bg-blue '+style_ruang+'"><div class="bulat" style="width:100%">&nbsp;</div></div>';
        display+='<div class=" col-md-5 '+style_ruang+'"><b> = Jumlah Tempat Tidur</b></div>';
        display+='</div>';
        display+='</div>';
        display+='</div>';
        display+='</div>';
        $('#block').html(display);
        console.clear();
        console.log(mode);
        console.log(display);
      }
    });  
  }
  function startCount() {
    if (!timer_is_on) {
      timer_is_on = 1;
      timedCount();
    }
  }
  function getKelas(){
    var search;
    var url=base_url + "display/datakelas";
    //console.clear();
    //console.log(url);
    $.ajax({
      url : url,
      type: "GET",
      dataType: "json",
      data: {get_param : 'value'},
      success : function(data){
        //console.log(data);
        var jmlData=data.length;
        var kelas="";
        var a=0;
        var style = 'box-info';
        var bedtersedia=0;
        var bedterisi=0;
        var bedkosong=0;
        for (var i = 0; i < jmlData; i++) {
          
          a=i+1;
          if(a==1 || a%3==1) style='box-info';
          if(a==2 || a%3==2) style='box-warning';
          if(a==3 || a%3==0) style='box-danger';
          bedtersedia=(parseInt(data[i]["kapasitas_pria"]) +parseInt(data[i]["kapasitas_wanita"])+parseInt(data[i]["kapasitas_priawanita"]))-parseInt(data[i]["bed_rusak"]);
          bedterisi=parseInt(data[i]["terisi_pria"])+parseInt(data[i]["terisi_wanita"])+parseInt(data[i]["terisi_priawanita"]);
          bedkosong=bedtersedia-bedterisi;
          //console.log(bedkosong);
          kelas+="<div class=\"col-md-4\"><div class=\"box " +style +" box-solid\"><div class=\"box-header with-border text-center\"><h3 class=\"box-title \">"+data[i]["kelas_nama"] +"</h3></div><div class=\"box-body text-center \"><button class=\"btn btn-default btn-block\"><div class=\"font32 \">"+bedkosong +"</div></button></div><div class=\"box-footer box-success text-center\"><h3>TERISI : "+bedterisi+"</h3></div></div></div>";
        }
        $('#kelas').html(kelas);
        //console.log(kelas);
      }
    });
  }
  function getKamar(c){
    var search;
    var url=base_url + "display/datakamar/"+c;
    //console.clear();
    //console.log(url);
    $.ajax({
      url : url,
      type: "GET",
      dataType: "json",
      data: {get_param : 'value'},
      success : function(data){
        //console.log(data);
        var jmlData=data.length;
        var kelas="";
        var a=0;
        var style = 'box-info';
        var bedtersedia=0;
        var bedterisi=0;
        var bedkosong=0;
        var no=0;
        kelas+='<div class="col-md-12"><table class="table table-hover bordered" style="box-shadow: 5px 10px #a4e09b;font-size: 12pt;">';
        kelas+='<thead class="bg-green text-center">';
        kelas+='<tr>';
        kelas+='<th rowspan="2">#</th>';
        kelas+='<th rowspan="2">RUANGAN</th>';
        kelas+='<th rowspan="2">KELAS</th>';
        kelas+='<th rowspan="2">JML BED</th>';
        kelas+='<th colspan="2" class="text-center">TERISI</th>';
        kelas+='<th rowspan="2" class="text-center">KOSONG</th>';
        kelas+='</tr>';
        kelas+='<tr>';
        kelas+='<th class="text-center">PRIA</th>';
        kelas+='<th class="text-center">WANITA</th>';
        kelas+='</tr>';
        kelas+='</thead>';
        kelas+='<tbody>';
        for (var i = 0; i < jmlData; i++) {
          jmlbed=parseInt(data[i]["total_TT"]);
          no=c;
          terpakai_male=parseInt(data[i]["terpakai_male"]);
          terpakai_female=parseInt(data[i]["terpakai_female"]);
          bedkosong=jmlbed-terpakai_male-terpakai_female;
          if(bedkosong==0) bg= "bg-red"; else bg= "bg-green";
          kelas+='<tr>';
          kelas+='<td>'+no+'</td>';
          kelas+='<td>'+data[i]["jenis_ruangan"]+'</td>';
          kelas+='<td>' +data[i]["kelas_perawatan"] +'</td>';
          kelas+='<td class="text-center bg-green">'+jmlbed +'</td>';
          kelas+='<td class="text-center">' +terpakai_male +'</td>';
          kelas+='<td  class="text-center">' + terpakai_female +'</td>';
          kelas+='<td  class="text-center ' +bg +'">'+bedkosong +'</td></tr>';
          c++;
        }
        kelas+='</tbody></table></div>';
        $('#tabel').html(kelas);
        //console.log(kelas);
      }
    });
  }
  function stopCount() {
    clearTimeout(t);
    timer_is_on = 0;
  }
  function show_full(){
    req = elem.requestFullScreen || elem.webkitRequestFullScreen || elem.mozRequestFullScreen;
    //req.call(elem);
    return req;
    //alert("SHOW FULL SCREEN");
  }
</script>