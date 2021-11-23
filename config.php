<?php 

$server = "10.76.178.13";
$user = "mfsuser";
$pass = "mfsuser@6Dtech";
//$database = "MOBILE_MONEY_TASHICELL_180220220AB";
$database = "MMBL";
$conn = mysqli_connect($server, $user, $pass, $database);

if (!$conn) {
    die("<script>alert('Connection Failed.')</script>");
}

?>

  