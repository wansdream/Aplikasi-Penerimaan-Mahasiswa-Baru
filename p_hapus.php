<?php
include "koneksi.php";
$id = $_GET['id'];
$sql = $pdo->prepare("SELECT foto FROM siswa WHERE id=:id");
$sql->bindParam(':id', $id);
$sql->execute(); 
$data = $sql->fetch();

// Cek apakah file fotonya ada di folder images
if(is_file("assets/img/".$data['foto'])) // Jika foto ada
	unlink("assets/img/".$data['foto']); // Hapus foto yang telah diupload dari folder images

// Query untuk menghapus data siswa berdasarkan ID yang dikirim
$sql = $pdo->prepare("DELETE FROM tb_mahasiswa WHERE id=:id");
$sql->bindParam(':id', $id);
$execute = $sql->execute(); // Eksekusi / Jalankan query

if($execute){ // Cek jika proses simpan ke database sukses atau tidak
	// Jika Sukses, Lakukan :
	header("location: data_mahasiswa.php"); // Redirect ke halaman index.php
}else{
	// Jika Gagal, Lakukan :
	echo "Data gagal dihapus. <a href='data_mahasiswa.php'>Kembali</a>";
}
?>
