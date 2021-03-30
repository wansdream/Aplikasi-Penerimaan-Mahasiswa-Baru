<html>
<head>
	<title>Aplikasi Penerimaan Mahasiswa Baru</title>
	<link rel="stylesheet" type="text/css" href="assets/css">
	<link href="https://fonts.googleapis.com/css2?family=Palanquin+Dark&display=swap" rel="stylesheet">
</head>
<body>
	<h1>Data Mahasiswa</h1>
	<a href="index.php">Home</a><br><br>
	<a href="f_simpan.php">Tambah Data</a><br><br>
	<table border="" class="table">
	<tr>
		<th>Nama</th>
		<th>Jenis Kelamin</th>
		<th>Telepon</th>
		<th>Alamat</th>
		<th>Foto</th>
		<th colspan="2">Aksi</th>
	</tr>
	<?php
	// Load file koneksi.php
	include "koneksi.php";

	// query menampilkan data
	$sql = $pdo->prepare("SELECT * FROM tb_mahasiswa");
	$sql->execute(); 

	while($data = $sql->fetch()){ 
		echo "<tr>";
		echo "<td>".$data['nama']."</td>";
		echo "<td>".$data['jk']."</td>";
		echo "<td>".$data['tlp']."</td>";
		echo "<td>".$data['alamat']."</td>";
		echo "<td><img src='assets/img/".$data['foto']."' width='100' height='100'></td>";
		echo "<td><a href='f_ubah.php?id=".$data['id']."'>Ubah</a></td>";
		echo "<td><a href='p_hapus.php?id=".$data['id']."'>Hapus</a></td>";
		echo "</tr>";
	}
	?>
	</table>
</body>
</html>
