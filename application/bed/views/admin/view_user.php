<section class="content">
	<div class="row">
		<div class="col-sm-8">
			<div class="box box-success">
	            <div class="box-header with-border">
	              	<h3 class="box-title">Input Data User</h3>
	            </div>
	            <div class="box-body">
	              	<form class="form-horizontal" action="<?php if(empty($row)) echo base_url() ."backend/user/simpan"; else echo base_url() ."backend/user/update";  ?>" method="POST">
		              	<div class="box-body">
			                <div class="form-group">
			                  	<label for="inputEmail3" class="col-sm-3 control-label">Username</label>
			                  	<?php if(!empty($row)) $id= $row->id; else $id=""; ?>
			                  	<div class="col-sm-9">
			                  		<input type="hidden" name="id" value="<?php echo $id; ?>">
			                    	<input type="text" name="username" class="form-control" id="inputEmail3" placeholder="Username" value="<?php if(!empty($row)) echo $row->username;?>" <?php if(!empty($row)) echo "readonly" ?>>
			                  	</div>
			                </div>
		                	
		                	<div class="form-group">
			                  	<label for="inputEmail3" class="col-sm-3 control-label">Nama Lengkap</label>
			                  	<div class="col-sm-9">
			                    	<input type="text" name="user_namalengkap" class="form-control" id="inputEmail3" placeholder="Nama Lengkap" value="<?php if(!empty($row)) echo $row->user_namalengkap;?>">
			                  	</div>
			                </div>
			                <div class="form-group">
			                  	<label for="inputEmail3" class="col-sm-3 control-label">Jenis Ruang</label>
			                  	<div class="col-sm-9">
			                  		<?php 
			                  		if(!empty($row)){
			                  			$ruid=$row->user_jenisruang;
			                  		}else{
			                  			$ruid="";
			                  		}
			                  		?>

			                    	<select class="form-control" name="user_jenisruang">
			                    		<option value="0">Pilih Ruang</option>
			                    		<?php 
			                    		foreach ($ruang as $r) {
			                    			?>
			                    			<option value="<?php echo $r->grId ?>" <?php if($r->grId==$ruid) echo "selected"; ?>><?php echo $r->grNama ?></option>
			                    			<?php
			                    		}
			                    		?>
			                    	</select>
			                  	</div>
			                </div>
			                <?php if(empty($row)) { ?>
				                <div class="form-group">
				                  	<label for="inputEmail3" class="col-sm-3 control-label">Password</label>
				                  	<div class="col-sm-9">
				                    	<input type="password" name="user_pass" class="form-control" id="inputEmail3" placeholder="Password" value="<?php if(!empty($row)) echo $row->user_pass;?>">
				                  	</div>
				                </div>
				            <?php } ?>
		                	<div class="form-group">	
		                  		<div class="col-sm-offset-3 col-sm-9">
		                    		<div class="checkbox">
		                    			<label>
		                      				<?php if(!empty($row)) $admin=$row->user_admin; else $admin=0; ?>
		                        		<input type="checkbox" value="1" name="user_admin" <?php if($admin==1) echo "checked"; ?>> Admin
		                      			</label>

		                      			<label>
		                      				<?php if(!empty($row)) $status=$row->user_status; else $status=0; ?>
		                        		<input type="checkbox" value="1" name="user_status" <?php if($status==1) echo "checked"; ?>> Aktif
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
	              	<h3 class="box-title">List Data User</h3>
	              	<div class="box-tools">
	              		<form action="<?php echo base_url() ."user" ?>" method='GET'>
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
	              			<th>USERNAME</th>
	              			<th>NAMA LENGKAP</th>
	              			<th>RUANGAN</th>
	              			<th>STATUS</th>
	              			<th>AKSI</th>
	              		</thead>
	              		<tbody>
	              			<?php 
	              			$no=0;
	              			foreach ($user as $j) {
	              				$no++;
	              				?>
	              				<tr class="<?php if($id==$j->id) echo "bg-gray"; ?>">
	              					<td><?php echo $no; ?></td>
	              					<td><?php echo $j->username ?></td>
	              					<td><?php echo $j->user_namalengkap ?></td>
	              					<td><?php echo $j->grNama ?></td>
	              					<td><?php if($j->user_admin==1) echo "<span class='btn btn-success btn-xs'>Admin</span>"; else echo "<span class='btn btn-danger btn-xs'>Non Admin</span>"; ?></td>
	              					<td><?php if($j->user_status==1) echo "<span class='btn btn-success btn-xs'>Aktif</span>"; else echo "<span class='btn btn-danger btn-xs'>Non Aktif</span>"; ?></td>
	              					<td>
	              						<a href="<?php echo base_url() ."user/" .$j->id ?>" class='btn btn-primary btn-xs' ><span class='fa fa-edit'></span></a>
	              						<a href="<?php echo base_url() ."backend/user/delete/" .$j->id ?>" class='btn btn-danger btn-xs' ><span class='fa fa-remove'></span></a>
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