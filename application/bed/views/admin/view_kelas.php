<section class="content">
	<div class="row">
		<div class="col-sm-6">
			<div class="box box-success">
	            <div class="box-header with-border">
	              	<h3 class="box-title">Input Data Kelas</h3>
	            </div>
	            <div class="box-body">
	              	<form class="form-horizontal" action="<?php if(empty($row)) echo base_url() ."backend/kelas/simpan"; else echo base_url() ."backend/kelas/update";  ?>" method="POST">
		              	<div class="box-body">
		              		<?php 
		              		if(!empty($row)) $id= $row->kelas_id; else $id="";
		              		if(empty($id)){
		              			?>
		              			<div class="form-group">
				                  	<label for="inputEmail3" class="col-sm-3 control-label">Kode Kelas</label>
				                  	<?php if(!empty($row)) $id= $row->kelas_id; else $id=""; ?>
				                  	<div class="col-sm-9">
				                  		<input type="text" name="kelas_id" class="form-control" id="inputEmail3" placeholder="Kode Kelas" value="<?php if(!empty($row)) echo $row->kelas_id;?>">
				                  	</div>
				                </div>
		              			<?php
		              		}else{
		              			?>
		              			<input type="hidden" name="kelas_id" value="<?php echo $id; ?>">
		              			<?php
		              		}
		              		?>
			                <div class="form-group">
			                  	<label for="inputEmail3" class="col-sm-3 control-label">Nama Kelas</label>
			                  	<div class="col-sm-9">
			                  		<input type="text" name="kelas_nama" class="form-control" id="inputEmail3" placeholder="Nama Kelas" value="<?php if(!empty($row)) echo $row->kelas_nama;?>">
			                  	</div>
			                </div>
		                
		                	<div class="form-group">
		                  		<div class="col-sm-offset-3 col-sm-9">
		                    		<div class="checkbox">
		                      			<label>
		                      				<?php 
		                      				if(!empty($row)) {
		                      					$status=$row->kelas_status;
		                      					$kemenkes=$row->kelas_kemenkes;
		                      				}else{
		                      					$status=0;
		                      					$kemenkes=0;
		                      				}
		                      				?>
		                        		<input type="checkbox" value="1" name="kelas_status" <?php if($status==1) echo "checked"; ?>> Aktif<br>
		                        		<input type="checkbox" value="1" name="kelas_kemenkes" <?php if($kemenkes==1) echo "checked"; ?>> Kemenkes
		                      			</label>
		                    		</div>
		                  		</div>
		                	</div>
		              	</div>
		              	<!-- /.box-body -->
		             	<div class="box-footer">
		                	<!--button type="submit" class="btn btn-default">Cancel</button-->
		                	<button type="submit" class="btn btn-success pull-right">Simpan</button>
		              	</div>
		              	<!-- /.box-footer -->
		            </form>
	            </div>
	        </div>

	        <div class="box box-success">
	            <div class="box-header with-border">
	              	<h3 class="box-title">List Data Kelas</h3>
	              	<div class="box-tools">
	              		<form action="<?php echo base_url() ."kelas" ?>" method='GET'>
			                <div class="input-group input-group-sm" style="width: 300px;">
			                  	<input type="text" name="q" class="form-control pull-right" value="<?php if(!empty($q)) echo $q; ?>" placeholder="Search" >
								<div class="input-group-btn">
			                    	<button type="submit" class="btn btn-success"><i class="fa fa-search"></i></button>
			                  	</div>
			                </div>
			            </form>
		            </div>
	            </div>
	            <div class="box-body">
	              	<table class="table table-bordered">
	              		<thead>
	              			<th>NO</th>
	              			<th>KODE</th>
	              			<th>KELAS</th>
	              			<th>STATUS</th>
	              			<th>KEMKES</th>
	              			<th>AKSI</th>
	              		</thead>
	              		<tbody>
	              			<?php 
	              			$no=0;
	              			foreach ($kelas as $j) {
	              				$no++;
	              				?>
	              				<tr class="<?php if($id==$j->kelas_id) echo "bg-gray"; ?>">
	              					<td><?php echo $no; ?></td>
	              					<td><?php echo $j->kelas_id ?></td>
	              					<td><?php echo $j->kelas_nama ?></td>
	              					<td><?php if($j->kelas_status==1) echo "<span class='btn btn-success btn-xs'>Aktif</span>"; else echo "<span class='btn btn-danger btn-xs'>Non Aktif</span>"; ?></td>
	              					<td><?php if($j->kelas_kemenkes==1) echo "<span class='btn btn-success btn-xs'>Aktif</span>"; else echo "<span class='btn btn-danger btn-xs'>Non Aktif</span>"; ?></td>
	              					<td>
	              						<a href="<?php echo base_url() ."kelas/" .$j->kelas_id ?>" class='btn btn-primary btn-xs' ><span class='fa fa-edit'></span></a>
	              						<a href="<?php echo base_url() ."backend/kelas/delete/" .$j->kelas_id ?>" class='btn btn-danger btn-xs' ><span class='fa fa-remove'></span></a>
	              					</td>
	              				</tr>
	              				<?php
	              			}
	              			?>
	              		</tbody>
	              	</table>
	              	<?php echo $pagination;?>
	            </div>
	        </div>
		</div>
	</div>
</section>