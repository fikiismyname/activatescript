<div class="col-md-12">
	<div class="c-toolbar u-mb-medium">
		<h3 class="c-toolbar__title has-divider">Template Master</h3>
		<a class="c-btn c-btn--blue u-ml-auto" href="#" data-toggle="modal" data-target="#modal4">Tambah Template</a><!-- &nbsp;
		<a class="c-btn c-btn--primary" href="#" data-toggle="modal" data-target="#modalbatch">Tambah Template Batch</a> -->
	</div>
	<div class="c-card c-card--responsive u-mb-medium">
		<div class="c-card__header c-card__header--transparent o-line">            
			<h5 class="c-card__title">          
				Tabel Template
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
								<th class="c-table__cell c-table__cell--head no-sort">Template</th>
								<th class="c-table__cell c-table__cell--head no-sort">URL</th>
								<th class="c-table__cell c-table__cell--head">Protected</th>
								<th class="c-table__cell c-table__cell--head">Option</th>
							</tr>
						</thead>

						<tbody>
							<?php
							if ($_SESSION['akses'] == 'User') {
								$sql = "SELECT * FROM tb_template WHERE id_user='$_SESSION[id]'";
							}else {
								$sql = "SELECT * FROM tb_template";
							}
							$result = $mysql->query($sql);
							if ($result->num_rows > 0) {
								while($row = $result->fetch_assoc()) {
									echo '
									<tr class="c-table__row">
										<td class="c-table__cell"></td>
										<td class="c-table__cell">'.$row['template'].'</td>
										<td class="c-table__cell">'.$row['url'].'</td>
										<td class="c-table__cell">'.substr($row['protected'], 0,15).'</td>
										<td class="c-table__cell">
											<a class="c-btn c-btn--primary c-btn--small" id="getjavascript" href="javascript:;" data-toggle="modal" data-target="#modalgetjavascript" data-javascript="<script src=&quot;'.home_base_url()."files/protected/".str_replace(' ', '', $row['template']).'.js&quot;></script>">Code</a> 
											<a class="c-btn c-btn--primary c-btn--small" id="updatetemplate" href="javascript:;" data-toggle="modal" data-target="#modalupdate" data-template="'.$row['template'].'" data-id="'.$row['id'].'" data-url="'.$row['url'].'" data-protected="'.htmlspecialchars(base64_decode($row['protected'])).'">Update</a> 
											<a class="c-btn c-btn--danger c-btn--small" id="hapus" href="javascript:;" data-url="?module=template&aksi=hapus&identity='.$row['id'].'&template='.$row['template'].'" data-toggle="modal" data-target="#modalhapus">Hapus</a></td>
										</td>
									</tr>
									';
								}
							}
							?>
						</tbody>
					</table>
				</div>      

			</form>

			<?php  
			include "modal.tambah.template.php";
			include "modal.getjavascript.template.php";
			include "modal.update.template.php";
			include "modal.hapus.template.php";
			include "tambah.template.php";
			include "update.template.php";
			include "hapus.template.php";
			?>

		</div>
	</div>
</div>