<?php 
include_once 'koneksi.php';
$jumlah_pengeluaran = htmlentities(trim($_POST['jumlah_pengeluaran']));
$keterangan = htmlentities(trim($_POST['keterangan']));
$tanggal_pengeluaran = htmlentities(trim($_POST['tanggal_pengeluaran']));
$gambar = $_POST['gambar']; 

$namaGambar = $_FILES['gambar']['name'];
$namaSementara = $_FILES['gambar']['tmp_name'];
$folderPenyimpanan = 'img/';
$upload = move_uploaded_file($namaSementara, $folderPenyimpanan.$namaGambar);

$jumlah_pengeluaran = escape($jumlah_pengeluaran);
$keterangan = escape($keterangan);
$tanggal_pengeluaran = escape($tanggal_pengeluaran);

$insert = mysqli_query($koneksi, "INSERT INTO pengeluaran(jumlah_pengeluaran, keterangan, gambar, tanggal_pengeluaran)
                        VALUES('$jumlah_pengeluaran', '$keterangan', '$namaGambar', '$tanggal_pengeluaran')");

if ($insert) {
    echo "<script>
            alert('Data berhasil di tambahkan');
            document.location.href = 'pengeluaran.php';
        </script>"; 
}else{
    echo "<script>
			alert('Data gagal di tambahkan');
            document.location.href = 'pengeluaran.php';
		  </script>";
}

?>