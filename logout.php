<?php

$connect = mysqli_connect('127.0.0.1', 'root', '') or die(mysqli_error($connect));
mysqli_select_db($connect, 'polytechnique');
session_start();


session_unset();
session_destroy();
echo ("<meta http-equiv='refresh' content='0;  URL =index.php'/>");
if (isset($_GET["Session_Expired"])) {
 

    echo ("<meta http-equiv='refresh' content='0;  URL =index.php?Session_Expired'/>");
} 


exit();
?>