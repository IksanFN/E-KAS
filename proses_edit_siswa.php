<?php 	
include_once 'koneksi.php';

$id_siswa = $_POST['id_siswa'];
$nama = htmlentities(trim($_POST['nama']));
$no_hp = htmlentities(trim($_POST['no_hp']));
$alamat = htmlentities(trim($_POST['alamat']));

$update = mysqli_query($koneksi, "UPDATE siswa SET nama = '$nama', no_hp = '$no_hp', alamat = '$alamat' WHERE id_siswa = '$id_siswa'");
	
if ($update) {
	echo "<script>
			alert('Data berhasil di edit');
			document.location.href = 'siswa.php';
		  </script>";
}else{
	echo "<script>
			alert('Data gagal di edit');
			document.location.href = 'siswa.php';
		  </script>";
}

?>
