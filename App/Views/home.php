<?php
use app\App\core\App;

if (isset ($_SESSION['user'])):
    $user =$_SESSION['user'];
else:
    $user = null;
endif;
?>

<h1> Home </h1>

<h3>Welkom <?php if( $user != null): echo $user['first_name'];
    else: echo ' U bent niet ingelogd'; endif; ?></h3>