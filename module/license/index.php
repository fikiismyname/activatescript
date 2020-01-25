<div class="col-md-12">
	<div class="c-toolbar u-mb-medium">
		<h3 class="c-toolbar__title has-divider">License Master</h3>
		<a class="c-btn c-btn--blue u-ml-auto" href="#" data-toggle="modal" data-target="#modal4">Tambah License</a><!-- &nbsp;
		<a class="c-btn c-btn--primary" href="#" data-toggle="modal" data-target="#modalbatch">Tambah License Batch</a> -->
	</div>
	<div class="c-card c-card--responsive u-mb-medium">
		<div class="c-card__header c-card__header--transparent o-line">            
			<h5 class="c-card__title">          
				Tabel License
			</h5>
		</div>
		<div class="c-card__body">  

			<form class='formtablecheckbox' method="post">

				<div class="c-table-responsive@desktop u-mb-medium" style="overflow: hidden">
					<table class="c-table datatablecheckbox">
						<caption class="c-table__title">                            
						</caption>

						<thead class="c-table__head c-table__head--slim">
							<tr class="c-table__row">
								<th class="c-table__cell c-table__cell--head">id</th>
								<th class="c-table__cell c-table__cell--head no-sort">License Code</th>
								<th class="c-table__cell c-table__cell--head no-sort">Domain</th>
								<th class="c-table__cell c-table__cell--head">License to Template</th>
								<th class="c-table__cell c-table__cell--head">Option</th>
							</tr>
						</thead>

						<tbody>
							<?php
							$sql = "SELECT 
							tb_activate.*,
							tb_template.*,
							tb_activate.id as idactivate, 
							tb_activate.id_user_child as id_user_child						
							FROM tb_activate 
							LEFT JOIN tb_template ON tb_activate.template=tb_template.id WHERE id_user_child=$_SESSION[id]";
							$result = $mysql->query($sql);
							if ($result->num_rows > 0) {
								while($row = $result->fetch_assoc()) {
									if (empty($_SESSION['akses'])) {
										echo '
										<tr class="c-table__row">
											<td class="c-table__cell"></td>
											<td class="c-table__cell">'.$row['license'].'</td>
											<td class="c-table__cell">'.$row['domain'].'</td>
											<td class="c-table__cell">'.$row['template'].'</td>
											<td class="c-table__cell">
												<a class="c-btn c-btn--primary c-btn--small" id="updatelicense" href="javascript:;" data-toggle="modal" data-target="#modalupdate" data-domain="'.$row['domain'].'" data-id="'.$row['idactivate'].'" data-template="'.$row['id'].'">Update</a> 
												<a class="c-btn c-btn--danger c-btn--small" id="hapus" href="javascript:;" data-url="?module=license&aksi=hapus&identity='.$row['idactivate'].'" data-toggle="modal" data-target="#modalhapus">Hapus</a></td>
											</td>
										</tr>
										';
									}else{
										echo '
										<tr class="c-table__row">
											<td class="c-table__cell"></td>
											<td class="c-table__cell">'.$row['license'].'</td>
											<td class="c-table__cell">'.$row['domain'].'</td>
											<td class="c-table__cell">'.$row['template'].'</td>
											<td class="c-table__cell">
												<a class="c-btn c-btn--primary c-btn--small" id="updatelicense" href="javascript:;" data-toggle="modal" data-target="#modalupdate" data-domain="'.$row['domain'].'" data-id="'.$row['idactivate'].'" data-template="'.$row['id'].'">Update</a> 
												<a class="c-btn c-btn--danger c-btn--small" id="hapus" href="javascript:;" data-url="?module=license&aksi=hapus&identity='.$row['idactivate'].'" data-toggle="modal" data-target="#modalhapus">Hapus</a></td>
											</td>
										</tr>
										';
									}
								}
							}
							?>
						</tbody>
					</table>
				</div>      

			</form>

			<?php  
			include "modal.tambah.license.php";
			// include "modal.tambahbatch.license.php";
			include "modal.update.license.php";
			include "modal.hapus.license.php";
			include "tambah.license.php";
			include "update.license.php";
			include "hapus.license.php";
			?>

		</div>
	</div>
</div>