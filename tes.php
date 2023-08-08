<?php

include 'koneksi.php';

// Menambahkan record bulan baru
$insert = mysqli_query($koneksi, "INSERT INTO bulan_pembayaran VALUES(NULL, 'Juni', '2022', '2000')");


// Ambil ID bulan yg telah ditambah
$id = mysqli_insert_id($koneksi);

// Ambil ID siswa
$query = mysqli_query($koneksi, "SELECT id_siswa FROM siswa");

// Looping
while($data = mysqli_fetch_array($query)):

    $id_siswa = $data['id_siswa'];
    
    $query2 = mysqli_query($koneksi, "INSERT INTO uang_kas VALUES(NULL, '$id_siswa', '$id', '0', '0', '0', '0', 'Belum lunas')");

    if ( $query2 ) {
        echo 'Berhasil';
    } else {
        echo 'Tidak berhasil'.mysqli_error($koneksi);
    }

endwhile;