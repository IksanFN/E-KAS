<?php 	
include_once 'koneksi.php';

$id_siswa = $_GET['id_siswa'];

$delete = mysqli_query($koneksi, "DELETE FROM siswa WHERE id_siswa = '$id_siswa'");

if ($delete) {
	echo "<script>
			alert('Data berhasil di hapus');
			document.location.href = 'siswa.php';
		  </script>";
} else {
	echo "<script>
			alert('Data gagal di hapus!!');
			document.location.href = 'siswa.php';
		  </script>";
}


 ?>