<?php include 'config.php' ?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Laporan pengadaan Buku</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
</br>
	<div class="container">
			<h3>Pengadaan</h3>
		<br>

		<table class="table table-hover">
    <thead class="table-dark">
				<tr>
					<th style="text-align: center;">No</th>
					<th style="text-align: center;">Nama Buku</th>
					<th style="text-align: center;">Penerbit</th>
					<th style="text-align: center;">Stok</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$no = 1;
				$data = mysqli_query($mysqli, "SELECT  * FROM buku ORDER BY stok ASC");
				while ($d = mysqli_fetch_array($data)) {
				?>
					<tr>
						<td style="text-align: center;"><?php echo $no++; ?></td>
						<td style="text-align: center;"><?php echo $d['nama_buku'] ?></td>
						<td style="text-align: center;"><?php echo $d['penerbit'] ?></td>
						<td style="text-align: center;"><?php echo $d['stok'] ?></td>
					</tr>
				<?php
				}
				?>
			</tbody>
		</table>
		<br>
		<a href="index.php" class="btn btn-dark">Kembali</a><br /><br />
	</div>

</body>

</html>