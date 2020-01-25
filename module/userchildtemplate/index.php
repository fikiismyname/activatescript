<div class="col-md-12">
	<div class="c-toolbar u-mb-medium">
		<h3 class="c-toolbar__title has-divider">Module User Template</h3>
		<a class="c-btn c-btn--blue u-ml-auto" href="#" data-toggle="modal" data-target="#modal4">Tambah User Template</a>
	</div>
	<div class="c-card c-card--responsive u-mb-medium">
		<div class="c-card__header c-card__header--transparent o-line">            
			<h5 class="c-card__title">			
				Table User Template 
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
								<th class="c-table__cell c-table__cell--head"></th>
								<th class="c-table__cell c-table__cell--head">User</th>
								<th class="c-table__cell c-table__cell--head no-sort">Template</th>
								<th class="c-table__cell c-table__cell--head no-sort">Option</th>
							</tr>
						</thead>

						<tbody>
							<?php
							$sql = "SELECT 
							tuct.id as id,
							tuct.id_user_child as id_user_child,
							tuct.id_template as id_template,
							template.id as template_id,
							template.template as templatename,
							tuc.username as username
							FROM tb_user_child_template as tuct
							INNER JOIN tb_template as template
							ON tuct.id_template=template.id
							INNER JOIN tb_user_child as tuc
							ON tuct.id_user_child=tuc.id
							WHERE tuct.id_user ='$_SESSION[id]'";
							$result = $mysql->query($sql);
							if ($result->num_rows > 0) {
								while($row = $result->fetch_assoc()) {
									echo '
									<tr class="c-table__row">
										<td class="c-table__cell">'.$row['id'].'</td>
										<td class="c-table__cell">'.$row['username'].'</td>
										<td class="c-table__cell">'.$row['templatename'].'</td>
										<td class="c-table__cell">
											<a class="c-btn c-btn--danger c-btn--small" id="hapus" href="javascript:;" data-url="?module=userchildtemplate&aksi=hapus&identity='.$row['id'].'" data-toggle="modal" data-target="#modalhapus">Hapus</a></td></tr>
											';
										}
									}
									?>							
								</tbody>
							</table>
						</div>		

					</form>

					<?php  
					include "modal.tambah.user.php";
					//include "modal.update.user.php";
					include "modal.hapus.user.php";
					include "tambah.user.php";
					include "update.user.php";
					include "hapus.user.php";
					?>

				</div>
			</div>
		</div>