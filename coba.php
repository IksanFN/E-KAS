<?php 
include_once 'koneksi.php';



$siswa = mysqli_query($koneksi, "SELECT status FROM uang_kas WHERE status = 'Lunas'");

$result = mysqli_fetch_assoc($siswa);

var_dump($result);


 ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dta</title>
</head>
<body>

    <table border="1">
        <tr>
            <th>Nama</th>
            <th>Minggu ke 1</th>
            <th>Minggu ke 2</th>
            <th>Minggu ke 3</th>
            <th>Minggu ke 4</th>
            <th>Status</th>
        </tr>
        <?php foreach($query as $data) : ?>
        <?php while($dataSiswa = mysqli_fetch_assoc($siswa)) : ?>
        <tr>
           
            <td><?php echo $dataSiswa['nama']; ?></td>
            <td><?php echo $data['minggu_ke_1']; ?></td>
            <td><?php echo $data['minggu_ke_2']; ?></td>
            <td><?php echo $data['minggu_ke_3'] ?></td>
            <td><?php echo $data['minggu_ke_4'] ?></td>
            <td><?php echo $data['status'] ?></td>
        </tr>
    <?php endwhile; ?>
        <?php endforeach; ?>
    </table>

</body>
</html>