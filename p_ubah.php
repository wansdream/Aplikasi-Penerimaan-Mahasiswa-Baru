<?php
include "koneksi.php";
$id = $_GET['id'];
$nama = $_POST['nama'];
$jk = $_POST['jk'];
$alamat = $_POST['alamat'];
$telp = $_POST['tlp'];
$foto = $_FILES['foto']['name'];
$tmp = $_FILES['foto']['tmp_name'];

// Cek perubahan foto
if(empty($foto)){
	$sql = $pdo->prepare("UPDATE tb_mahasiswa SET nama=:nama, jk=:jk, alamat=:alamat, tlp=:tlp WHERE id=:id");
	$sql->bindParam(':nama', $nama);
	$sql->bindParam(':jk', $jk);
	$sql->bindParam(':alamat', $alamat);
	$sql->bindParam(':tlp', $telp);
	$sql->bindParam(':id', $id);
	$execute = $sql->execute();

	if($sql){ // Cek jika proses simpan ke db
		// if Sukses, Lakukan :
		header("location: data_mahasiswa.php");
	}else{
		// if Gagal, Lakukan :
		echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		echo "<br><a href='form_ubah.php'>Kembali Ke Form</a>";
	}
}else{ 
	$fotobaru = date('dmYHis').$foto;

	// Set path folder tempat menyimpan fotonya
	$path = "assets/img".$fotobaru;

	// Proses upload
	if(move_uploaded_file($tmp, $path)){
		$sql = $pdo->prepare("SELECT foto FROM tb_mahasiswa WHERE id=:id");
		$sql->bindParam(':id', $id);
		$sql->execute();
		$data = $sql->fetch(); // Ambil semua data dari hasil eksekusi $sql

		if(is_file("assets/img".$data['foto'])) 
			unlink("assets/img".$data['foto']); 

		$sql = $pdo->prepare("UPDATE tb_mahasiswa SET nama=:nama, jk=:jk, alamat=:alamat, tlp=:tlp, foto=:foto WHERE id=:id");
		$sql->bindParam(':nama', $nama);
		$sql->bindParam(':jk', $jk);
		$sql->bindParam(':alamat', $alamat);
		$sql->bindParam(':tlp', $telp);
		$sql->bindParam(':foto', $fotobaru);
		$sql->bindParam(':id', $id);
		$execute = $sql->execute(); 

		if($sql){ // Cek proses simpan
			// Jika Sukses, Lakukan :
			header("location: data_mahasiswa.php");
		}else{
			// Jika Gagal, Lakukan :
			echo "Yah gagal. semangat jangan menyerah";
			echo "<br><a href='f_ubah.php'>Kembali</a>";
		}
	}else{
		// Jika gambar gagal diupload, Lakukan :
		echo "gambar gagal diupload:(";
		echo "<br><a href='f_ubah.php'>Kembali</a>";
	}
}
?>
