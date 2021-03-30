<html>
<head>
	<title>Aplikasi Penerimaan Mahasiswa Baru</title>
</head>
<body>
	<h1>Ubah Data Mahasiswa</h1>

	<?php
	include "koneksi.php";
	$id = $_GET['id'];

	$sql = $pdo->prepare("SELECT * FROM tb_mahasiswa WHERE id=:id");
	$sql->bindParam(':id', $id);
	$sql->execute();
	$data = $sql->fetch();
	?>

	<form method="post" action="p_ubah.php?id=<?php echo $id; ?>" enctype="multipart/form-data">
		<table cellpadding="8">
			<tr>
				<td>Nama</td>
				<td><input type="text" name="nama" value="<?php echo $data['nama']; ?>"></td>
			</tr>
			<tr>
				<td>Jenis Kelamin</td>
				<td>
				<?php
				if($data['jk'] == "Perempuan"){
					echo "<input type='radio' name='jk' value='laki-laki' checked='checked'> Laki-laki";
					echo "<input type='radio' name='jk' value='perempuan'> Perempuan";
				}else{
					echo "<input type='radio' name='jk' value='laki-laki'> Laki-laki";
					echo "<input type='radio' name='jk' value='perempuan' checked='checked'> Perempuan";
				}
				?>
				</td>
			</tr>
			<tr>
                <td>Alamat</td>
				<td><textarea name="alamat"><?php echo $data['alamat']; ?></textarea></td>
			</tr>
            <tr>
                <td>Telepon</td>
                <td><input type="text" name="tlp" value="<?php echo $data['tlp']; ?>"></td>
            </tr>
			<tr>
				<td>Foto</td>
				<td>
					<input type="file" name="foto">
				</td>
			</tr>
		</table>

		<hr>
		<input type="submit" value="Ubah">
		<a href="data_mahasiswa.php"><input type="button" value="Batal"></a>
	</form>
</body>
</html>
