<html>
<head>
	<title>Aplikasi CRUD dengan PHP</title>
</head>
<body>
	<h1>Tambah Data Siswa</h1>
	<form method="post" action="p_simpan.php" enctype="multipart/form-data">
	<table cellpadding="8">
	<tr>
		<td>Nama</td>
		<td><input type="text" name="nama"></td>
	</tr>
	<tr>
		<td>Jenis Kelamin</td>
		<td>
		<input type="radio" name="jk" value="Laki-laki"> Laki-laki
		<input type="radio" name="jk" value="Perempuan"> Perempuan
		</td>
	</tr>
	<tr>
		<td>Alamat</td>
		<td><textarea name="alamat"></textarea></td>
	</tr>
	<tr>
		<td>Telepon</td>
		<td><input type="text" name="tlp"></td>
	</tr>
	<tr>
		<td>Foto</td>
		<td><input type="file" name="foto"></td>
	</tr>
	</table>
	
	<hr>
	<input type="submit" value="Simpan">
	<a href="data_mahasiswa.php"><input type="button" value="Batal"></a>
	</form>
</body>
</html>
