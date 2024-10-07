        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row py-3">
		<div class="col-lg-6 bg-white border rounded p-3">
			<table>
				<tr>
					<th>Username</th>
					<td style="width: 2rem; text-align: center;"> : </td>
					<td style="min-width: 15rem !important"><?= $user['username']; ?></td>
				</tr>
				<tr>
					<th>Nama</th>
					<td style="width: 2rem; text-align: center;"> : </td>
					<td style="min-width: 15rem !important"><?= $user['nama']; ?></td>
				</tr>
				<tr>
					<th>Level</th>
					<td style="width: 2rem; text-align: center;"> : </td>
					<td style="min-width: 15rem !important"><?= $user['level']; ?></td>
				</tr>
				<tr>
					<th>NIK</th>
					<td style="width: 2rem; text-align: center;"> : </td>
					<td style="min-width: 15rem !important"><?= $user['nik']; ?></td>
				</tr>
				<tr>
					<th>Jenis Kelamin</th>
					<td style="width: 2rem; text-align: center;"> : </td>
					<td style="min-width: 15rem !important"><?= $user['jenis_kelamin']; ?></td>
				</tr>
				<tr>
					<th>Email</th>
					<td style="width: 2rem; text-align: center;"> : </td>
					<td style="min-width: 15rem !important"><?= $user['email']; ?></td>
				</tr>
				<tr>
					<th>Alamat</th>
					<td style="width: 2rem; text-align: center;"> : </td>
					<td style="min-width: 15rem !important"><?= $user['alamat']; ?></td>
				</tr>
				<tr>
					<th>Nomor HP</th>
					<td style="width: 2rem; text-align: center;"> : </td>
					<td style="min-width: 15rem !important"><?= $user['no_hp']; ?></td>
				</tr>
				<tr>
					<th>Divisi</th>
					<td style="width: 2rem; text-align: center;"> : </td>
					<td style="min-width: 15rem !important"><?= $user['divisi']; ?></td>
				</tr>
				<tr>
					<td colspan="3">
						<div class="row pt-3">
							<div class="col">
								<a href="<?= base_url('user/changePassword/'); ?><?= $user['id_user']; ?>" class="btn btn-danger"><i class="fas fa-fw fa-lock"></i> Ganti Password</a>
							</div>
							<div class="col">
								<a href="<?= base_url('user/updateProfile/'); ?><?= $user['id_user']; ?>" class="btn btn-success"><i class="fas fa-fw fa-user-edit"></i> Update Profil</a>
							</div>
						</div>
					</td>
				</tr>
			</table>
		</div>
	</div>

    </div>
<!-- /.container-fluid -->
        
    </div>
        <!-- End of Main Content -->