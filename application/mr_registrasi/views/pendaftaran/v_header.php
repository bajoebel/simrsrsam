<style style="text/css">
.pemberitahuan {
  position: fixed;
  bottom: 0;
  right: 0;
  width: 100%;
  border: 2px solid #FF0000;
  background-color:#CC9966;
  z-index:9999;
}

</style>
<!--
<div class="pemberitahuan">
<marquee><h2 style="color:#990000">Pemberitahuan! SENIN, 16 Maret 2020 Launching Aplikasi Baru</h2> </marquee>
</div>
-->

<div id="navbar" class="navbar navbar-default ace-save-state">
		<div class="navbar-container ace-save-state" id="navbar-container">
			<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
				<span class="sr-only">Toggle sidebar</span>
	
				<span class="icon-bar"></span>
	
				<span class="icon-bar"></span>
	
				<span class="icon-bar"></span>
			</button>
	
			<div class="navbar-header pull-left">
				<a href="<?php echo base_url('pendaftaran/daftar');?>" class="navbar-brand">
					<small>
						<i class="fa fa-leaf"></i>
						SIMRS vClaim
					</small>
				</a>
			</div>
	
			<div class="navbar-buttons navbar-header pull-right" role="navigation">
				<ul class="nav ace-nav">
					<li class="light-blue dropdown-modal">
						<a data-toggle="dropdown" href="#" class="dropdown-toggle">
							<img class="nav-user-photo" src="<?php echo base_url() ?>assets/images/avatars/user.jpg" alt="Jason's Photo" />
								<span class="user-info">
									<small>Welcome,</small>
									<?php echo $this->session->userdata("nama"); ?>
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
						</a>

						<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
							<li>
								<a href="#">
									<i class="ace-icon fa fa-cog"></i>
									Settings
								</a>
							</li>

							<li>
								<a href="#">
									<i class="ace-icon fa fa-user"></i>
									Profile
								</a>
							</li>

							<li class="divider"></li>

							<li>
								<a href="<?php echo base_url('login/logout'); ?>">
										<i class="ace-icon fa fa-power-off"></i>
										Logout
								</a>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</div><!-- /.navbar-container -->
	</div>