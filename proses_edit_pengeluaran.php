<?php 
include_once 'koneksi.php';

$id_pengeluaran = $_POST['id_pengeluaran'];
$jumlah_pengeluaran = htmlentities(trim($_POST['jumlah_pengeluaran']));
$keterangan = htmlentities(trim($_POST['keterangan']));
$tanggal_pengeluaran = htmlentities(trim($_POST['tanggal_pengeluaran']));

$jumlah_pengeluaran = escape($jumlah_pengeluaran);
$keterangan = escape($keterangan);
$tanggal_pengeluaran = escape($tanggal_pengeluaran);

$update = mysqli_query($koneksi, "UPDATE pengeluaran SET jumlah_pengeluaran = '$jumlah_pengeluaran', 
                        keterangan = '$keterangan', tanggal_pengeluaran = '$tanggal_pengeluaran' 
                        WHERE id_pengeluaran = '$id_pengeluaran'");

if($update) {
    echo "<script>
            alert('Data berhasil di edit');
            document.location.href = 'pengeluaran.php';
        </script>"; 
}else{
    echo "<script>
            alert('Data gagal di edit');
            document.location.href = 'pengeluaran.php';
        </script>"; 
}

?>