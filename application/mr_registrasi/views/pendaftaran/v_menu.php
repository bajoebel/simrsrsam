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
	<?php
		if($this->session->userdata("roles") == "1" || $this->session->userdata("roles") == "17"){
	?>
            <li class="<?php echo $menu1; ?>">
                        <a href="" class="dropdown-toggle">
                                <i class="menu-icon fa fa-users "></i>
                                <span class="menu-text"> PENDAFTARAN</span>

                                <b class="arrow fa fa-angle-down"></b>
                        </a>

                        <b class="arrow"></b>
                        
                        <ul class="submenu">
                                <li class="<?php echo $active11; ?>">
                                        <a href="<?php echo base_url('pendaftaran/daftar');?>">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                RAWAT JALAN
                                        </a>

                                        <b class="arrow"></b>
                                </li>
                                
                                <li class="<?php echo $active12; ?>">
                                        <a href="<?php echo base_url('pendaftaran/daftar_ranap');?>">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                RAWAT INAP
                                        </a>

                                        <b class="arrow"></b>
                                </li>
								<!--
								<li class="<?php echo $active13; ?>">
                                        <a href="<?php echo base_url('pendaftaran/input_inap');?>">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                RUANG RAWAT PASIEN
                                        </a>

                                        <b class="arrow"></b>
                                </li>
								-->
                        </ul>
                </li>
				<!--
				<li class="<?php echo $menu3; ?>">
                        <a href="" class="dropdown-toggle">
                                <i class="menu-icon fa fa-list"></i>
                                <span class="menu-text"> DATA PASIEN </span>

                                <b class="arrow fa fa-angle-down"></b>
                        </a>
                        <b class="arrow"></b>
                        <ul class="submenu">
								<li class="<?php echo $active35; ?>">
                                        <a href="<?php echo base_url('pendaftaran/list_pasienruang');?>">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                LIST PASIEN RUANGAN
                                        </a>

                                        <b class="arrow"></b>
                                </li>
                        </ul>
                </li>
				-->
               
               <li class="<?php echo $active2; ?>" >
                        <a href="<?php echo base_url('pendaftaran/create_sep');?>">
                                <i class="menu-icon glyphicon 	glyphicon-pencil "></i>
                                <span class="menu-text"> CREATE SEP </span>
                        </a>

                        <b class="arrow"></b>
                </li>
				<?php
			}if($this->session->userdata("roles") == "18"){
		?>
		
		 <li class="<?php echo $active34; ?>">
                                        <a href="<?php echo base_url('pendaftaran/list_sep');?>">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                LIST PASIEN SEP
                                        </a>
		<li class="<?php echo $menu4; ?>">
                        <a href="#"  class="dropdown-toggle">
                                <i class="menu-icon glyphicon glyphicon-book"></i>
                                <span class="menu-text"> RIWAYAT PASIEN </span>
                                <b class="arrow fa fa-angle-down"></b>
                        </a>

                        <b class="arrow"></b>
                        
                        <ul class="submenu">
                                <li class="<?php echo $active41; ?>">
                                        <a href="<?php echo base_url('pendaftaran/list_riwayatrajal');?>">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                RAWAT JALAN
                                        </a>

                                        <b class="arrow"></b>
                                </li>
                                
                                <li class="<?php echo $active42; ?>">
                                        <a href="<?php echo base_url('pendaftaran/list_riwayatranap');?>">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                RAWAT INAP
                                        </a>

                                        <b class="arrow"></b>
                                </li>
                        </ul>
                </li>
		
		
		
		
		
		<?php
			}if($this->session->userdata("roles") == "2"){
		?>
		<li class="<?php echo $active8; ?>" >
                        <a href="<?php echo base_url('pendaftaran/jadwal_dokter');?>">
                                <i class="menu-icon fa 	fa-calendar "></i>
                                <span class="menu-text"> JADWAL DOKTER </span>
                        </a>

                        <b class="arrow"></b>
                </li>
		<?php
			}if($this->session->userdata("roles") == "1" || $this->session->userdata("roles") == "17"){
		?>		
                <li class="<?php echo $menu3; ?>">
                        <a href="" class="dropdown-toggle">
                                <i class="menu-icon fa fa-list"></i>
                                <span class="menu-text"> DATA PASIEN </span>

                                <b class="arrow fa fa-angle-down"></b>
                        </a>
                        <b class="arrow"></b>
                        <ul class="submenu">
                                <li class="<?php echo $active31; ?>">
                                        <a href="<?php echo base_url('pendaftaran/list_pasien');?>">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                LIST DATA PASIEN
                                        </a>

                                        <b class="arrow"></b>
                                </li>
                                
                                <li class="<?php echo $active32; ?>">
                                        <a href="<?php echo base_url('pendaftaran/list_kunjungan');?>">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                LIST KUNJ. PASIEN
                                        </a>

                                        <b class="arrow"></b>
                                </li>
                                
                                <li class="<?php echo $active33; ?>">
                                        <a href="<?php echo base_url('pendaftaran/list_rawatinap');?>">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                LIST PASIEN RANAP
                                        </a>

                                        <b class="arrow"></b>
                                </li>
								<li class="<?php echo $active35; ?>">
                                        <a href="<?php echo base_url('pendaftaran/list_pasienruang');?>">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                LIST PASIEN RUANGAN
                                        </a>

                                        <b class="arrow"></b>
                                </li>
                                
                                <li class="<?php echo $active34; ?>">
                                        <a href="<?php echo base_url('pendaftaran/list_sep');?>">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                LIST PASIEN SEP
                                        </a>

                                        <b class="arrow"></b>
                                </li>
                        </ul>
                </li>


                <li class="<?php echo $menu4; ?>">
                        <a href="#"  class="dropdown-toggle">
                                <i class="menu-icon glyphicon glyphicon-book"></i>
                                <span class="menu-text"> RIWAYAT PASIEN </span>
                                <b class="arrow fa fa-angle-down"></b>
                        </a>

                        <b class="arrow"></b>
                        
                        <ul class="submenu">
                                <li class="<?php echo $active41; ?>">
                                        <a href="<?php echo base_url('pendaftaran/list_riwayatrajal');?>">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                RAWAT JALAN
                                        </a>

                                        <b class="arrow"></b>
                                </li>
                                
                                <li class="<?php echo $active42; ?>">
                                        <a href="<?php echo base_url('pendaftaran/list_riwayatranap');?>">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                RAWAT INAP
                                        </a>

                                        <b class="arrow"></b>
                                </li>
                        </ul>
                </li>
				
				<li class="<?php echo $menu5; ?>">
                        <a href="#"  class="dropdown-toggle">
                                <i class="menu-icon fa fa-globe"></i>
                                <span class="menu-text"> PASIEN ONLINE </span>
                                <b class="arrow fa fa-angle-down"></b>
                        </a>

                        <b class="arrow"></b>
                        
                        <ul class="submenu">
                                <li class="<?php echo $active51; ?>">
                                        <a href="<?php echo base_url('pendaftaran/pasien_ol_baru');?>">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                PASIEN BARU
                                        </a>

                                        <b class="arrow"></b>
                                </li>
                                
                                <li class="<?php echo $active52; ?>">
                                        <a href="<?php echo base_url('pendaftaran/pasien_ol');?>">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                PASIEN LAMA
                                        </a>

                                        <b class="arrow"></b>
                                </li>
                        </ul>
                </li>
		<?php
			}if($this->session->userdata("roles") == "1" ||$this->session->userdata("roles") == "3"|| $this->session->userdata("roles") == "2" || $this->session->userdata("roles") == "17"){
		?>
				
		<li class="<?php echo $menu6; ?>">
                        <a href="#"  class="dropdown-toggle">
                                <i class="menu-icon glyphicon glyphicon-book"></i>
                                <span class="menu-text"> LAPORAN </span>
                                <b class="arrow fa fa-angle-down"></b>
                        </a>

                        <b class="arrow"></b>
                        
                        <ul class="submenu">
							<li class="<?php echo $active67; ?>">
                                        <a href="<?php echo base_url('pendaftaran/list_jnslayanan');?>">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                               JNS.LAYANAN/USER
                                        </a>

                                        <b class="arrow"></b>
                                </li>
							<li class="<?php echo $active65; ?>">
                                        <a href="<?php echo base_url('pendaftaran/list_harianjalan');?>">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                HARIAN JALAN
                                        </a>

                                        <b class="arrow"></b>
                                </li>
							<li class="<?php echo $active64; ?>">
                                        <a href="<?php echo base_url('pendaftaran/list_harianranap');?>">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                HARIAN RANAP
                                        </a>

                                        <b class="arrow"></b>
                                </li>
                                <li class="<?php echo $active61; ?>">
                                        <a href="<?php echo base_url('pendaftaran/list_kunjungan_layanan');?>">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                KUNJ. PERLAYANAN
                                        </a>

                                        <b class="arrow"></b>
                                </li>
                                
                                <li class="<?php echo $active62; ?>">
                                        <a href="<?php echo base_url('pendaftaran/list_kunjungan_user');?>">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                KUNJ. PERUSER
                                        </a>

                                        <b class="arrow"></b>
                                </li>
								<li class="<?php echo $active63; ?>">
                                        <a href="<?php echo base_url('pendaftaran/list_demografi');?>">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                DEMOGRAFI
                                        </a>

                                        <b class="arrow"></b>
                                </li>
								<li class="<?php echo $active68; ?>">
                                        <a href="<?php echo base_url('pendaftaran/list_onlinebaru');?>">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                PASIEN BARU ONLINE
                                        </a>

                                        <b class="arrow"></b>
                                </li>
								<li class="<?php echo $active66; ?>">
                                        <a href="<?php echo base_url('pendaftaran/list_online');?>">
                                                <i class="menu-icon fa fa-caret-right"></i>
                                                PASIEN LAMA ONLINE
                                        </a>

                                        <b class="arrow"></b>
                                </li>
                        </ul>
                </li>
		<?php
			}if($this->session->userdata("roles") == "1" || $this->session->userdata("roles") == "17"){
		?>
				
				<li class="<?php echo $active7; ?>" >
                        <a href="<?php echo base_url('pendaftaran/list_dpo');?>">
                                <i class="menu-icon fa fa-lock"></i>
                                <span class="menu-text">PASIEN DPO </span>
                        </a>

                        <b class="arrow"></b>
                </li>
		<li>
				<a href="http://192.168.2.100/display/" target="_blank">
						<i class="menu-icon fa  fa-desktop"></i>
						<span class="menu-text">DISPLAY RUANGAN </span>
				</a>

				<b class="arrow"></b>
		</li>
		<?php
			}
		?>

        </ul><!-- /.nav-list -->

        <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
                <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
        </div>
</div>