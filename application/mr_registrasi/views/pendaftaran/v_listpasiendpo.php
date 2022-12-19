<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                        <i class="ace-icon fa fa-home home-icon"></i>
                        <a href="<?php echo base_url('pendaftaran/list_dpo');?>">Home</a>
                </li>

                <li class="active">Pasien DPO</li>
            </ul>
            </div>

            <div class="page-content">
                    <div class="page-header">
                            <h1>
                                    PASIEN DPO
                            </h1>
                    </div><!-- /.page-header -->

                
				<div class="row">
					<div class="col-xs-12">
					<form class="form-horizontal" action="<?php echo site_url('pendaftaran/list_dpo'); ?>" method="GET">
							<div class="col-sm-6">
								<div class="form-group">
								<button class="btn btn-sm btn-primary" name="tambah" id="tambah" data-toggle="button">
									TAMBAH DATA
								</button>
								</div>
							</div>
							<div class="col-sm-6">
									<div class="form-group">
										<div class="input-group">
											<input type="text" name="nomr_cari" id="nomr_cari" class="limited col-sm-offset-6 col-xs-12 col-sm-6" maxlength="10" onkeypress="return hanyaAngka(event)" placeholder="Pencarian NoMR" value="<?php echo (!empty($_GET['nomr_cari'])) ? $_GET['nomr_cari'] : ''; ?>" style='color:#000000;' />
											<span class="input-group-btn">
												<button class="btn btn-primary btn-sm">
														<span class="ace-icon fa fa-search icon-on-right bigger-110"></span>
														Search
												</button>
											</span>
										</div>
									</div>
							</div>
					</form>
					</div>
                    <div class="col-xs-12">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="clearfix">
                                        <div class="pull-right tableTools-container"></div>
                                </div>
                               

                                    <!-- div.table-responsive -->

                                    <!-- div.dataTables_borderWrap -->
                                <div>
                                    <table id="simple-table" class="table table-bordered table-hover" style='color:#000000;'>
                                        <thead>
                                            <tr>
                                                <th class="center">NO</th>
												<th class="center">NOMR</th>
                                                <th class="center">NAMA PASIEN</th>
                                                <th class="center" width="500px">KETERANGAN</th>
												<th class="center" width="150px">TGL INPUT</th>
                                                <th class="center" width="100px">STATUS</th>
												<th class="center" width="50px">#</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            
                                            $no = ($this->uri->segment('3') + 1) - 1;
                                            foreach ($pasien as $p){
											if($p->status_dpo == 0){
												$status = "DPO";
											}else{
												$status = "Selesai";
											}
                                            $no++;
                                            echo"<tr>
                                            <td class='center'>$no</td>
                                            <td>$p->nomr</td>
                                            <td>$p->nama</td>
                                            <td>$p->keterangan</td>
											<td>$p->tgl_entri_dpo</td>
											<td class='center'>$status</td>
                                            <td class='center'>
                                                <div class='hidden-sm hidden-xs action-buttons'>
                                                        <a href='#modal-edit' data-toggle='modal' data-rel='tooltip' data-placement='left' title='Edit data DPO' data-id='$p->Id'>
                                                                <i class='ace-icon fa fa-pencil-square-o bigger-130' ></i>
                                                        </a>
                                                </div>
                                            </td>
                                            </tr>";
                                            }
                                            echo"<tr>
                                            <td align='right' colspan='8'>Jumlah Pasien : $jumlah Orang</td>
                                            </tr>";
                                            ?>
                                        </tbody>
                                    </table>
									
                                    <div class="text-center">
                                        <?php 
										
                                        echo $this->pagination->create_links();
										
										
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <!-- PAGE CONTENT ENDS -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.page-content -->
    </div>
</div> 
<div id="modal-tambah" class="modal fade" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header no-padding">
					<div class="table-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
									<span class="white">&times;</span>
							</button>
							TAMBAH DATA DPO
					</div>
			</div>

			<div class="modal-body no-padding">
			<br />
				<div class="form-horizontal">
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label class="control-label col-xs-12 col-sm-3 no-padding-right">No MR:</label>
								<div class="col-xs-12 col-sm-6">
									<div class="clearfix">
										<input type="text" name="nomr" id="nomr" onkeypress="return hanyaAngka(event)" class="limited col-xs-12 col-sm-10" maxlength="10" placeholder="Pencarian NOMR" style='color:#000000;'/>
										<button id="cari" name="cari" type="button" class="btn btn-primary btn-sm" data-toggle="button" data-loading-text="Loading...">
										<i class="ace-icon glyphicon glyphicon-search "></i>
										</button>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-xs-12 col-sm-3 no-padding-right">Nama Pasien :</label>
	
								<div class="col-xs-12 col-sm-9">
									<div class="clearfix">
										<input type="text" name="nama" id="nama" class="col-xs-12 col-sm-10" value="" style='color:#000000;' readonly/>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-xs-12 col-sm-3 no-padding-right">Keterangan :</label>
	
								<div class="col-xs-12 col-sm-9">
									<div class="clearfix">
										<textarea name="ket" id="ket" class="col-xs-12 col-sm-10" style='color:#000000;'></textarea>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button id="simpan" class="btn btn-sm btn-primary">
					SIMPAN
				</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>
<div id="modal-edit" class="modal fade" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header no-padding">
					<div class="table-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
									<span class="white">&times;</span>
							</button>
							EDIT DATA DPO
					</div>
			</div>

			<div class="modal-body no-padding">
			<br />
				<div class="form-horizontal">
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label class="control-label col-xs-12 col-sm-3 no-padding-right">No MR:</label>
								<div class="col-xs-12 col-sm-6">
									<div class="clearfix">
										<input type="hidden" name="eid" id="eid" class="col-xs-12 col-sm-10" value="" style='color:#000000;' readonly/>
										<input type="text" name="enomr" id="enomr" onkeypress="return hanyaAngka(event)" class="limited col-xs-12 col-sm-10" maxlength="10" style='color:#000000;' readonly/>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-xs-12 col-sm-3 no-padding-right">Nama Pasien :</label>
	
								<div class="col-xs-12 col-sm-9">
									<div class="clearfix">
										<input type="text" name="enama" id="enama" class="col-xs-12 col-sm-10" value="" style='color:#000000;' readonly/>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-xs-12 col-sm-3 no-padding-right">Keterangan :</label>
	
								<div class="col-xs-12 col-sm-9">
									<div class="clearfix">
										<textarea name="eket" id="eket" class="col-xs-12 col-sm-10" style='color:#000000;'></textarea>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-xs-12 col-sm-3 no-padding-right">Status :</label>
	
								<div class="col-xs-12 col-sm-9">
									<div class="clearfix">
										<select style='color:#000000;' name="estat" id="estat">
											<option value="0"> DPO </option>
											<option value="1"> Selesai </option>
										</select>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button id="esimpan" class="btn btn-sm btn-primary">
					SIMPAN
				</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>
<script type="text/javascript">
    function hanyaAngka(evt) {
	  var charCode = (evt.which) ? evt.which : event.keyCode
	   if (charCode > 31 && (charCode < 48 || charCode > 57))

		return false;
	  return true;
	}
	jQuery(function($) {
        $('[data-rel=tooltip]').tooltip();
		
		$('.date-picker').datepicker({
					autoclose: true,
					todayHighlight: true
		})
		.next().on(ace.click_event, function(){
			$(this).prev().focus();
		});
		
		$('#tambah').click(function(){
			$('#nomr').val("");
			$('#nama').val("");
			$('#ket').val("");
			$('#modal-tambah').modal('show');
		});
		
		$('#nomr').keydown(function(e){
            if($(this).val() !== ""){
                if(e.keyCode==13){
                    $('#cari').click();
                }
            }
        })
		
		$('#cari').click(function(){
			var btn = $(this);
			btn.button('loading')
			
			var nomr_pasien = $("#nomr").val();
			if(nomr_pasien == ""){
				$('#nomr').val("");
				$('#nama').val("");
				$('#ket').val("");
				btn.button('reset')
				return false;
			}
			$.ajax({ 
				type	: 'POST',
				url		: "<?php echo base_url().'pendaftaran/cek_dpo'; ?>", 
				data	: "nomr="+nomr_pasien, 
				dataType: "JSON", 
				success	: function(data){ 
					console.log(data)
					if(data.MESSAGE=="OK"){
						$.ajax({ 
							type	: 'POST',
							url		: "<?php echo base_url().'pendaftaran/nomr_pasien'; ?>", 
							data	: "nomr="+nomr_pasien, 
							dataType: "JSON", 
							success	: function(data){ 
								console.log(data)
								if(data.MESSAGE=="OK"){
									$("#nama").val(data.NAMA);
									btn.button('reset')
								}else{
									$('#nomr').val("");
									$('#nama').val("");
									$('#ket').val("");
									btn.button('reset')
									bootbox.alert(data.MESSAGE);
								} 
							}
						});
					}else{
						$('#nomr').val("");
						$('#nama').val("");
						$('#ket').val("");
						btn.button('reset')
                        bootbox.alert(data.MESSAGE);
                    } 
				}
			});
			 
		});
		
		$('#simpan').click(function(){
			var nomr 		= $('#nomr').val();
			var nama 		= $('#nama').val();
			var ket 		= $('#ket').val();
			
			if(nomr ==""){
				alert("NOMR tidak boleh kosong...");
				return false;
			}
			if(nama ==""){
				alert("Nama tidak boleh kosong...");
				return false;
			}
			if(ket ==""){
				alert("Keterangan tidak boleh kosong...");
				return false;
			}
			$.ajax({
                type : "POST",
                url  : "<?php echo base_url().'pendaftaran/simpan_dpo'; ?>",
                data : "nomr="+nomr+"&nama="+nama+"&ket="+ket,
                success:function(data){
						window.location=("<?php echo base_url('pendaftaran/list_dpo');?>");
						return true;               
                },
                error:function(xhr, ajaxOptions, thrownError){
                    alert('Error Function : '+thrownError);
                }
            });
		});
		
		$('#esimpan').click(function(){
			var id 			= $('#eid').val();
			var ket 		= $('#eket').val();
			var stat 		= $('#estat').val();
			
			if(ket ==""){
				alert("Keterangan tidak boleh kosong...");
				return false;
			}
			if(stat ==""){
				alert("Status tidak boleh kosong...");
				return false;
			}
			$.ajax({
                type : "POST",
                url  : "<?php echo base_url().'pendaftaran/edit_dpo'; ?>",
                data : "id="+id+"&ket="+ket+"&stat="+stat,
                success:function(data){
						window.location=("<?php echo base_url('pendaftaran/list_dpo');?>");
						return true;               
                },
                error:function(xhr, ajaxOptions, thrownError){
                    alert('Error Function : '+thrownError);
                }
            });
		});
		
		$('#modal-edit').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
            $.ajax({
                type : 'POST',
                url : '<?php echo base_url().'pendaftaran/modaleditdpo'; ?>',
                data :  'rowid='+ rowid,
                success : function(data){
				var response =  eval("(" + data + ")");
                	if(response.MESSAGE=="OK"){
						$("#eid").val(response.ID);
						$("#enomr").val(response.NOMR);
						$("#enama").val(response.NAMA);
						$("#eket").val(response.KET);
						$("#estat").val(response.STAT);
					}else{
						$("#eid").val("");
						$('#enomr').val("");
						$('#enama').val("");
						$('#eket').val("");
						$('#estat').val("");
                        bootbox.alert(response.MESSAGE);
                    } 
                }
            });
        });
    });
</script>