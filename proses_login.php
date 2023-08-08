<?php 

include_once 'koneksi.php';

if (isset($_POST['login'])) {
    
    $username = htmlentities(trim($_POST['username']));
    $password = htmlentities(trim($_POST['password']));

    if (!empty($username) || !empty($password)) {
        
        if (cekUsername($username) != 0) {
            
            if (login($username, $password)) {
                
                redirect($username);

            }else{
                echo "<script>
                        alert('Username dan password yang anda masukkan tidak cocok');;
                     </script>";
            }

        }else{
            echo "<script>
                    alert('Username tidak terdaftar, silahkan register terlebih dahulu');
                </script>";
        }

    }else{
        echo "<script>
                alert('Form tidak boleh kosong!');
              </script>";
    }


}

?>