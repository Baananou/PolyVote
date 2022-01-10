<?php
$conn = mysqli_connect('localhost', 'root', '') or die(mysqli_error($conn));
mysqli_select_db($conn, 'polytechnique');

$mdp = $_POST['mdp'];
$email = $_POST['email'];

$sql = "SELECT * from utilisateurs where  email like '$email' ";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {
    session_start();
    $user = mysqli_fetch_array($result);
    $mpas = $user["password"];
    if (md5($mdp) == $mpas) {
        $_SESSION["id"] = $user['id'];
        $_SESSION["email"]= $user['email'];
        $_SESSION["type"] = $user['type'];
        $_SESSION["nom"] = $user['nom'];
        $_SESSION["groupe"] = $user['groupe'];
        $_SESSION["niveau"] = $user['niveau'];
        $_SESSION["filiere"] = $user['filiere'];
        if ($_SESSION['type']=='admin'){
            echo ("<meta http-equiv = 'refresh' content='0;  URL =dashbord.php?Success'/>");

        }else
        echo ("<meta http-equiv = 'refresh' content='0;  URL =acceuil.php?Success'/>");
    } else {
        echo ("<meta http-equiv='refresh' content='0;  URL =index.php?ErreurMDP'/>");
        
    }
} else {
    $sql_email = "SELECT * from utilisateurs where email='$email'";
    $result_email = mysqli_query($conn, $sql_email);
    $count_email = mysqli_num_rows($result_email);

    $sql_mdp = "SELECT password from utilisateurs where email='$email'";
    $result_mdp = mysqli_query($conn, $sql_mdp);
    $mdp_local = mysqli_fetch_array($result_mdp);
    if ($count_email == 0) {
    
       echo ("<meta http-equiv='refresh' content='0;  URL =index.php?Notfound'/>");
    } elseif ($count_email == 1) {
    if (md5($mdp) != $mdp_local[0]) {
        echo ("<meta http-equiv='refresh' content='0;  URL =index.php?ErreurMDP'/>");
    }    
    } else {
        echo ("<meta http-equiv='refresh' content='0;  URL =index.php?Notfound'/>"); 
    }
}
?>