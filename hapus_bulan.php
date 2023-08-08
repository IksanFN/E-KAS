<?php 
include_once 'koneksi.php';

$id = $_GET['id_bulan_pembayaran'];

$delete = mysqli_query($koneksi, "DELETE FROM bulan_pembayaran WHERE id_bulan_pembayaran = '$id'");

if ($delete) {
    echo "<script>
			alert('Data berhasil di hapus');
			document.location.href = 'uang_kas.php';
		  </script>";
}else{
    echo "<script>
			alert('Data gagal di hapus');
			document.location.href = 'uang_kas.php';
		  </script>";
}

?>