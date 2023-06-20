<?php
use app\App\core\App;

$user =$_SESSION['user'];
?>

<h1> Home </h1>

<h3>Welkom <?php echo $user['first_name'] ?></h3>