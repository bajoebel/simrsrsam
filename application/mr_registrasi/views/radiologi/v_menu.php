<?php
    error_reporting(0);
?>
<div id="sidebar" class="sidebar responsive ace-save-state">
<script type="text/javascript">
        try{ace.settings.loadState('sidebar')}catch(e){}
		
		window.setTimeout("waktu()",1000);
		function waktu() {
			var tanggal = new Date();
			setTimeout("waktu()",1000);
			document.getElementById("jam").innerHTML = tanggal.getHours();
			document.getElementById("menit").innerHTML = tanggal.getMinutes();
			document.getElementById("detik").innerHTML = tanggal.getSeconds();
		}
</script>

<style>
    #jam-digital{overflow:hidden; width:350px}
    #hours{float:left; width:100px; height:50px; background-color:#6B9AB8; margin-right:25px}
    #minute{float:left; width:100px; height:50px; background-color:#A5B1CB}
    #second{float:right; width:100px; height:50px; background-color:#FF618A; margin-left:25px}
    #jam-digital p{color:#FFF; font-size:36px; text-align:center; margin-top:4px}
</style>

        <div class="sidebar-shortcuts" id="sidebar-shortcuts">
                <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
                        <button class="btn btn-success">
                                        <span id="jam"></span>
                        </button> :

                        <button class="btn btn-success">
                                        <span id="menit"></span>
                        </button> :

                        <button class="btn btn-danger">
										<span id="detik"></span>
                        </button>
                </div>

                <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
                        <span class="btn btn-success"></span>

                        <span class="btn btn-success"></span>

                        <span class="btn btn-danger"></span>
                </div>
        </div><!-- /.sidebar-shortcuts -->

        <ul class="nav nav-list">
                <li class="<?php echo $active1; ?>" >
                        <a href="<?php echo base_url('radiologi/pemeriksaan');?>">
                                <i class="menu-icon glyphicon 	glyphicon-pencil "></i>
                                <span class="menu-text"> PEMERIKSAAN </span>
                        </a>

                        <b class="arrow"></b>
                </li>
                <li class="<?php echo $active2; ?>" >
                        <a href="<?php echo base_url('radiologi/list_pemeriksaan');?>">
                                <i class="menu-icon glyphicon 	glyphicon-list "></i>
                                <span class="menu-text"> LIST RADIOLOGI </span>
                        </a>

                        <b class="arrow"></b>
                </li>
        </ul><!-- /.nav-list -->

        <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
                <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
        </div>
</div>