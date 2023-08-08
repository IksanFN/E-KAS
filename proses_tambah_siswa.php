<?php 
include_once 'koneksi.php';

$nama = htmlentities(trim($_POST['nama']));
$no_hp = htmlentities(trim($_POST['no_hp']));
$alamat = htmlentities(trim($_POST['alamat']));

$insert = mysqli_query($koneksi, "INSERT INTO siswa(nama, no_hp, alamat) VALUES('$nama', '$no_hp', '$alamat')");

if (!empty($nama) || !empty($no_hp) || !empty($alamat)) {
	
	if ($insert) {
		echo "<script>
			alert('Data berhasil di tambah');
			document.location.href = 'siswa.php';
		  </script>";
	}else{
		echo "<script>
			alert('Data gagal di tambah');
			document.location.href = 'siswa.php';
		  </script>";
	}

}else{
	echo "<script>
			alert('Form tidak boleh kosong!');
			document.location.href = 'tambah_siswa.php';
		  </script>";
}