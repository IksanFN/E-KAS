<?php 
include_once 'koneksi.php';


$id_bulan_pembayaran = $_POST['id_bulan_pembayaran'];
$id_siswa = htmlentities(trim($_POST['id_siswa']));
$mingguKe1 = htmlentities(trim($_POST['minggu_ke_1']));
$mingguKe2 = htmlentities(trim($_POST['minggu_ke_2']));
$mingguKe3 = htmlentities(trim($_POST['minggu_ke_3']));
$mingguKe4 = htmlentities(trim($_POST['minggu_ke_4']));
$status = htmlentities(trim($_POST['status']));

$id_siswa = escape($id_siswa);
$mingguKe1 = escape($mingguKe1);
$mingguKe2 = escape($mingguKe2);
$mingguKe3 = escape($mingguKe3);
$mingguKe4 = escape($mingguKe4);
$status = escape($status);

$insert = mysqli_query($koneksi, 
            "INSERT INTO uang_kas(id_siswa, id_bulan_pembayaran, minggu_ke_1, minggu_ke_2, minggu_ke_3, minggu_ke_4, status) 
            VALUES('$id_siswa', '$id_bulan_pembayaran', '$mingguKe1', '$mingguKe2', '$mingguKe3', '$mingguKe4', '$status')");

if ($insert) {
    echo "<script>
            alert('Data berhasil di tambahkan');
        </script>"; 
    header("Location: detail_bulan_pembayaran.php?id_bulan_pembayaran=$id_bulan_pembayaran");
}else{
    echo "<script>
			alert('Data gagal di tambahkan');
		  </script>";
    header("Location: detail_bulan_pembayaran.php?id_bulan_pembayaran=$id_bulan_pembayaran");
}


?>