<?php 

$host = "localhost";
$user = "root";
$password = "";
$dbName = "e-cash";

$koneksi = mysqli_connect($host, $user, $password, $dbName);

if (!$koneksi) {
	die('Terjadi Kesalahan');
}

// ============ Function ============
// Register
function register($username, $password){

	global $koneksi;

	$username = escape($username);
	$password = escape($password);

	$passwordHash = password_hash($password, PASSWORD_DEFAULT);

	$insert = mysqli_query($koneksi, "INSERT INTO user(username, password) VALUES('$username', '$passwordHash')");

	if ($insert) {
		return true;
	}else{
		return false;
	}

}

// Cek Username
function cekUsername($username){
	global $koneksi;

	$username = escape($username);

	$cek = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username'");

	if ($cek) {
		return mysqli_num_rows($cek);
	}

}

function login($username, $password){
	global $koneksi;

	$username = escape($username);
	$password = escape($password);

	$login = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username'");
	$data = mysqli_fetch_assoc($login);


	if (password_verify($password, $data['password'])) {
		return true;
	}else{
		return false;
	}

}

// Redirect 
function redirect($username){
	$_SESSION['username'] = $username;
	header("Location: index.php");
}

// sql injection
function escape($data)
{
	global $koneksi;
	return mysqli_real_escape_string($koneksi, $data);
}

 ?>