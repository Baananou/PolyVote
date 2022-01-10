<?php
session_start();
$con = mysqli_connect('localhost', 'root', '') or die(mysqli_error($con));
mysqli_select_db($con, 'polytechnique');

$v1 = rand(1111, 9999);
$v2 = rand(1111, 9999);
$v3 = $v1 . $v2;
$v3 = md5($v3);
if (isset($_FILES["avatar"]["name"]) && $_FILES["avatar"]["name"] != "") {
  $Img = $_FILES["avatar"]["name"];
  $destination = "./image/" . $v3 . $Img;
  move_uploaded_file($_FILES["avatar"]["tmp_name"], $destination);
} else {
  $destination = NULL;
}
$mdp = $_POST['mdp'];
$email = $_POST['email'];
$nom = $_POST['nom'];
$type = $_POST['radio'];
$niveau = $_POST['niveau'];
$filiere = $_POST['filiere'];
$groupe = $_POST['groupe'];
$mdp2 = md5($mdp);


$req = "INSERT INTO utilisateurs (email,nom,type,password,niveau,filiere,groupe,avatar) VALUES('$email','$nom','$type','$mdp2','$niveau','$filiere',$groupe,'$destination')";
if (mysqli_query($con, $req)) {
  echo ("<meta http-equiv = 'refresh' content='0;  URL =index.php?successSign'/>");
} else {
  echo mysqli_error($con);
}
