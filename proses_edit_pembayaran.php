<?php 
include_once 'koneksi.php';

$id_uang_kas = $_POST['id_uang_kas'];
$id_siswa = htmlentities($_POST['id_siswa']);
$id_bulan_pembayaran = $_POST['id_bulan_pembayaran'];
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

$dataBulan = mysqli_query($koneksi, "SELECT * FROM bulan_pembayaran WHERE id_bulan_pembayaran = '$id_bulan_pembayaran'");
$result = mysqli_fetch_assoc($dataBulan);
$pembayaran_perminggu = $result['pembayaran_perminggu'];

// var_dump($pembayaran_perminggu);
// die;

$update = mysqli_query($koneksi, "UPDATE uang_kas SET id_siswa = '$id_siswa', minggu_ke_1 = '$mingguKe1', 
                        minggu_ke_2 = '$mingguKe2', minggu_ke_3 = '$mingguKe3', minggu_ke_4 = '$mingguKe4',
                        status = '$status' WHERE id_uang_kas = '$id_uang_kas'");



if ($mingguKe1 OR $mingguKe2 OR $mingguKe3 OR $mingguKe4 != $pembayaran_perminggu) {
    echo "<script>
            alert('Maaf, uang yang masuk tidak sesuai dengan ketentuan!!');
        </script>"; 
    header("Location: detail_bulan_pembayaran.php?id_bulan_pembayaran=$id_bulan_pembayaran");
}else{



    if ($update) {
        echo "<script>
                alert('Data berhasil di edit');
            </script>"; 
        header("Location: detail_bulan_pembayaran.php?id_bulan_pembayaran=$id_bulan_pembayaran");
    }else{
        echo "<script>
                alert('Data gagal di edit');
            </script>"; 
        header("Location: detail_bulan_pembayaran.php?id_bulan_pembayaran=$id_bulan_pembayaran");
    }

}



?>