<!DOCTYPE html>
<html>
<head>
	<title>MyApp | Halaman Utama</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container-fluid">
				<a class="navbar-brand" href="#">MyApp</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="colapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav me-auto mb-2 mb-lg-0">
						<li class="nav-item">
							<a class="nav-link active" href="#">Pasien</a>
						</li>
						<li class="nav-item">
							<a class="nav-link active" href="logout.php">Log Out</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<div class="row mt-3">
			<div class="col-sm">
				<h3>Tabel Pasien</h3>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<a href="tambahpasien.php" class="btn btn-primary btn-sm d-flex justify-content-center">Tambah Data</a>
			</div>
		</div>
		<div class="row mt-3">
			<div class="col">
				<table class="table table-striped table-hover table-">
					<tr>
						<th>No</th>
						<th>ID Pasien</th>
						<th>Nama Pasien</th>
						<th>Jenis Kelamin</th>
						<th>Alamat</th>
						<th>Action</th>
					</tr>

					<?php
					include 'koneksi.php';
					$no = 1;
					$hasil = $koneksi->query("SELECT * FROM pasien");
					?>
					<?php
					while ($row = $hasil->fetch_assoc()) {
						# code...

					?>
					<tr>
						<td><?= $no++;?></td>
						<td><?= $row['idPasien']; ?></td>
						<td><?= $row['nmPasien']; ?></td>
						<td><?= $row['jk']; ?></td>
						<td><?= $row['alamat']; ?></td>
						<td>
                            <a href="editpasien.php?edit=<?= $row['idPasien']; ?>" class="btn btn-warning btn-sm">Edit</a>

                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapusdata<?= $row['idPasien']; ?>">
                                Hapus
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="hapusdata<?= $row['idPasien']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel"> Yakin ingin menghapus data</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                            <a href="koneksi.php?idPasien=<?= $row['idPasien']; ?>" type="button" class="btn btn-danger">Hapus</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
					</tr>
					<?php
				}
					?>
				</table>
			</div>
		</div>
	</div>
</body>

<script src="assets/js/bootstrap.min.js"></script>

</html>