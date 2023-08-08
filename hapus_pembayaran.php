<?php 
include_once 'koneksi.php';

$id_uang_kas = $_GET['id_uang_kas'];
$id_bulan_pembayaran = $_GET['id_bulan_pembayaran'];

$delete = mysqli_query($koneksi, "DELETE FROM uang_kas WHERE id_uang_kas = '$id_uang_kas'");

if ($delete) {
	echo "<script>
			alert('Data berhasil di hapus');
		  </script>";
    header("Location: detail_bulan_pembayaran.php?id_bulan_pembayaran=$id_bulan_pembayaran");
} else {
	echo "<script>
			alert('Data gagal di hapus!!');
		  </script>";
    header("Location: detail_bulan_pembayaran.php?id_bulan_pembayaran=$id_bulan_pembayaran");
}
?>