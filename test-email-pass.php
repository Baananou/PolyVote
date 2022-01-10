<?php
$email = strtolower($_POST['email']);


// test email déjà présnete en BDD
$idc = mysqli_connect("localhost", "root", "", "polytechnique");
$r1 = mysqli_query($idc, "select * from utilisateurs where email = '$email'");

if (mysqli_num_rows($r1) == 0) {
    die("5");
}
                  ?>