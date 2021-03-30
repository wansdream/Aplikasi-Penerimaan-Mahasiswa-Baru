<?php
include "koneksi.php";
$nama = $_POST['nama'];
$jk = $_POST['jk'];
$alamat = $_POST['alamat'];
$tlp = $_POST['tlp'];
$foto = $_FILES['foto']['name'];
$tmp = $_FILES['foto']['tmp_name'];
$fotobaru = date('dmYHis').$foto;
$path = "assets/img/".$fotobaru;

// Proses upload
if(move_uploaded_file($tmp, $path)){ 
	$sql = $pdo->prepare("INSERT INTO tb_mahasiswa(nama, jk, alamat, tlp, foto) VALUES(:nama,:jk,:alamat,:tlp,:foto)");
	$sql->bindParam(':nama', $nama);
	$sql->bindParam(':jk', $jk);
	$sql->bindParam(':tlp', $tlp);
	$sql->bindParam(':alamat', $alamat);
	$sql->bindParam(':foto', $fotobaru);
	$sql->execute();

	if($sql){ 
		header("location: data_mahasiswa.php");
	}else{
		echo "simpan data gagal!!!";
		echo "<br><a href='f_simpan.php'>Kembali Ke Form</a>";
	}
}else{
	echo "Maaf, Gambar gagal untuk diupload.";
	echo "<br><a href='f_simpan.php'>Kembali Ke Form</a>";
}
?>
