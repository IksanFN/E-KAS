<?php 
include_once 'koneksi.php';

// Ambil data dari form
$nama_bulan = htmlspecialchars(trim($_POST['nama_bulan']));
$tahun = htmlspecialchars(trim($_POST['tahun']));
$pembayaran_perminggu = htmlspecialchars(trim($_POST['pembayaran_perminggu']));

// SQL Injection
$nama_bulan = escape($nama_bulan);
$tahun = escape($tahun);
$pembayaran_perminggu = escape($pembayaran_perminggu);

// Menambahkan record bulan baru
$insert = mysqli_query($koneksi, "INSERT INTO bulan_pembayaran VALUES(NULL, '$nama_bulan', '$tahun', '$pembayaran_perminggu')");

// Ambil ID bulan yg telah ditambah
$id = mysqli_insert_id($koneksi);

// Ambil ID siswa
$query = mysqli_query($koneksi, "SELECT id_siswa FROM siswa");

// Looping
while($data = mysqli_fetch_array($query)):

    $id_siswa = $data['id_siswa'];
    
    $query2 = mysqli_query($koneksi, "INSERT INTO uang_kas VALUES(NULL, '$id_siswa', '$id', '0', '0', '0', '0', 'Belum lunas')");

    if ( $query2 ) {
        echo "<script>
	            alert('Bulan baru berhasil ditambahkan');
	            document.location.href = 'uang_kas.php';
	        </script>";
    } else {
        echo "<script>
            	alert('Bulan baru gagal ditambahkan!');
            	document.location.href = 'uang_kas.php';
        	</script>";
    }

endwhile;


?>

'160411004400100100',
'160411004400100250',
'160411004400100220',
'160411004400100260',
'160411004400100210',
'160411004400102310'


'8818180e-670d-45fa-a5a3-545612ea609a',
'2ca20cc8-0b65-496c-add5-c6c092e1baab',
'ae2e27a0-ed12-47f4-8684-8d49e2f9fc10',
'48b72ad0-f498-41a6-a01e-16c2fd80b018',
'62475701-5bf4-4104-a789-28097f5d73d4',
'3dc0e7bb-4708-4a30-a811-1bca69a6a9f8'