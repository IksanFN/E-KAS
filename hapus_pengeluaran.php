<?php 
include_once 'koneksi.php';

$id_pengeluaran = $_GET['id_pengeluaran'];

$delete = mysqli_query($koneksi, "DELETE FROM pengeluaran WHERE id_pengeluaran = '$id_pengeluaran'");

if ($delete) {
	echo "<script>
			alert('Data berhasil di hapus');
			document.location.href = 'pengeluaran.php';
		  </script>";
} else {
	echo "<script>
			alert('Data gagal di hapus!!');
			document.location.href = 'pengeluaran.php';
		  </script>";
}

?>