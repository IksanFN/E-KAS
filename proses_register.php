<?php 
include_once 'koneksi.php';

if (isset($_POST['register'])) {
    
    $username = htmlentities(trim($_POST['username']));
    $password = htmlentities(trim($_POST['password']));

    if (!empty($username) || !empty($password)) {
        
        if (cekUsername($username) == 0) {
            
            if (register($username, $password)) {
                
                redirect($username);

            }else{
                echo "<script>
                        alert('Gagal melakukan register');;
                     </script>";
            }

        }else{
            echo "<script>
                    alert('Username sudah ada, silahkan gunakan username lain');
                </script>";
        }

    }else{
        echo "<script>
                alert('Form tidak boleh kosong!');
              </script>";
    }


}

?>