<section class="content">
	<div class="row">
		<div class="col-sm-6">
			<div class="box box-success">
	            <div class="box-header with-border">
	              	<h3 class="box-title">Input Data Jenis</h3>
	            </div>
	            <div class="box-body">
	              	<form class="form-horizontal" action="<?php if(empty($row)) echo base_url() ."backend/jenis/simpan"; else echo base_url() ."backend/jenis/update";  ?>" method="POST">
		              	<div class="box-body">
			                <div class="form-group">
			                  	<label for="inputEmail3" class="col-sm-3 control-label">Jenis Ruangan</label>
			                  	<?php if(!empty($row)) $id= $row->jenis_id; else $id=""; ?>
			                  	<div class="col-sm-9">
			                  		<input type="hidden" name="jenis_id" value="<?php echo $id; ?>">
			                    	<input type="text" name="jenis_ruangan" class="form-control" id="inputEmail3" placeholder="Jenis Ruangan" value="<?php if(!empty($row)) echo $row->jenis_ruangan;?>">
			                  	</div>
			                </div>
		                
		                	<div class="form-group">
		                  		<div class="col-sm-offset-3 col-sm-9">
		                    		<div class="checkbox">
		                      			<label>
		                      				<?php if(!empty($row)) $status=$row->jenis_status; else $status=0; ?>
		                        		<input type="checkbox" value="1" name="jenis_status" <?php if($status==1) echo "checked"; ?>> Aktif
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
	              	<h3 class="box-title">List Data Jenis</h3>
	              	<div class="box-tools">
	              		<form action="<?php echo base_url() ."jenis" ?>" method='GET'>
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
	              			<th>JENIS RUANGAN</th>
	              			<th>STATUS</th>
	              			<th>AKSI</th>
	              		</thead>
	              		<tbody>
	              			<?php 
	              			$no=0;
	              			foreach ($jenis as $j) {
	              				$no++;
	              				?>
	              				<tr class="<?php if($id==$j->jenis_id) echo "bg-gray"; ?>">
	              					<td><?php echo $no; ?></td>
	              					<td><?php echo $j->jenis_ruangan ?></td>
	              					<td><?php if($j->jenis_status==1) echo "<span class='btn btn-success btn-xs'>Aktif</span>"; else echo "<span class='btn btn-danger btn-xs'>Non Aktif</span>"; ?></td>
	              					<td>
	              						<a href="<?php echo base_url() ."jenis/" .$j->jenis_id ?>" class='btn btn-primary btn-xs' ><span class='fa fa-edit'></span></a>
	              						<a href="<?php echo base_url() ."backend/jenis/delete/" .$j->jenis_id ?>" class='btn btn-danger btn-xs' ><span class='fa fa-remove'></span></a>
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