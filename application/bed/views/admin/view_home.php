<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <?php 
      if(!empty($mode)) $display_mode=$mode->display_mode; else $display_mode='Block';
      //print_r($mode);
      ?>
      <div class="row">
        <div class="col-lg-4 col-xs-4" onclick="<?php echo "setMode('Block')"; ?>">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php if($display_mode=="Block") echo '<i class="fa fa-check"  id="block"></i>'; else echo '<i class="fa fa-th" id="block"></i>'; ?></h3>

              <p>Mode Block</p>
            </div>
            <div class="icon">
              <i class="fa fa-th" ></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-4" onclick="<?php echo "setMode('Tabel')"; ?>">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php if($display_mode=="Tabel") echo '<i class="fa fa-check"  id="tabel"></i>'; else echo '<i class="fa fa-table"  id="tabel"></i>'; ?></h3>

              <p>Mode Tabel</p>
            </div>
            <div class="icon">
              <i class="fa fa-table"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-4" onclick="<?php echo "setMode('Split')";  ?>">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php if($display_mode=="Split") echo '<i class="fa fa-check" id="split"></i>'; else echo '<i class="fa fa-pie-chart" id="split"></i>'; ?></h3>

              <p>Mode Split</p>
            </div>
            <div class="icon">
              <i class="fa fa-pie-chart" ></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        
      </div>
      
<script type="text/javascript">
  function setMode(c){
    var search;
    var url="<?php echo base_url(); ?>"+ "backend/setmode/"+c;
    //console.clear();
    //console.log(url);
    $.ajax({
      url : url,
      type: "GET",
      dataType: "json",
      data: {get_param : 'value'},
      success : function(data){
        if(c=='Tabel') {
          $('#tabel').removeClass("fa-table");
          $('#block').removeClass("fa-check");
          $('#split').removeClass("fa-check");

          $('#tabel').addClass("fa-check");
          $('#block').addClass("fa-th");
          $('#split').addClass("fa-pie-chart");
        }else if(c=='Block'){
          $('#tabel').removeClass("fa-check");
          $('#block').removeClass("fa-th");
          $('#split').removeClass("fa-check");

          $('#tabel').addClass("fa-table");
          $('#block').addClass("fa-check");
          $('#split').addClass("fa-pie-chart");
        }else{
          $('#tabel').removeClass("fa-check");
          $('#block').removeClass("fa-check");
          $('#split').removeClass("fa-pie-chart");

          $('#tabel').addClass("fa-table");
          $('#block').addClass("fa-th");
          $('#split').addClass("fa-check");

          $('#split').removeClass("fa-pie-chart");
          $('#split').addClass("fa-check");
        }
        alert(data["message"]);
      }
    });
  }
</script>
    </section>
    <!-- /.content -->