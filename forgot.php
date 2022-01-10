<?php
session_start();
$error = array();

require "mail.php";

if (!$con = mysqli_connect("localhost", "root", "", "polytechnique")) {

    die("could not connect");
}

$mode = "enter_email";
if (isset($_GET['mode'])) {
    $mode = $_GET['mode'];
}

//something is posted
if (count($_POST) > 0) {

    switch ($mode) {
        case 'enter_email':
            // code...
            $email = $_POST['email'];
            //validate email
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error[] = "SVP entrez un e-mail valide";
            } elseif (!valid_email($email)) {
                $error[] = "cet email non trouvé";
            } else {

                $_SESSION['forgot']['email'] = $email;
                send_email($email);
                header("Location: forgot.php?mode=enter_code");
                die;
            }
            break;

        case 'enter_code':
            // code...
            $code = $_POST['code'];
            $result = is_code_correct($code);

            if ($result == "the code is correct") {

                $_SESSION['forgot']['code'] = $code;
                header("Location: forgot.php?mode=enter_password");
                die;
            } else {
                $error[] = $result;
            }
            break;

        case 'enter_password':
            // code...
            $password = $_POST['password'];
            $password2 = $_POST['password2'];

            if ($password !== $password2) {
                $error[] = "Mot de passes non conformes";
            } elseif (!isset($_SESSION['forgot']['email']) || !isset($_SESSION['forgot']['code'])) {
                header("Location: forgot.php");
                die;
            } else {

                save_password($password);
                if (isset($_SESSION['forgot'])) {
                    unset($_SESSION['forgot']);
                }

                header("Location: index.php");
                die;
            }
            break;

        default:
            // code...
            break;
    }
}

function send_email($email)
{

    global $con;

    $expire = time() + (60 * 1);
    $code = rand(10000, 99999);
    $email = addslashes($email);

    $query = "insert into codes (email,code,expire) value ('$email','$code','$expire')";
    mysqli_query($con, $query);

    //send email here
    send_mail($email, 'Password reset', "Your code is " . $code);
}

function save_password($password)
{

    global $con;

    $password = md5($password);
    $email = addslashes($_SESSION['forgot']['email']);

    $query = "update utilisateurs set password = '$password' where email = '$email' limit 1";
    mysqli_query($con, $query);
}

function valid_email($email)
{
    global $con;

    $email = addslashes($email);

    $query = "select * from utilisateurs where email = '$email' limit 1";
    $result = mysqli_query($con, $query);
    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            return true;
        }
    }

    return false;
}

function is_code_correct($code)
{
    global $con;

    $code = addslashes($code);
    $expire = time();
    $email = addslashes($_SESSION['forgot']['email']);

    $query = "select * from codes where code = '$code' && email = '$email' order by id desc limit 1";
    $result = mysqli_query($con, $query);
    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            if ($row['expire'] > $expire) {

                return "the code is correct";
            } else {
                return "the code is expired";
            }
        } else {
            return "the code is incorrect";
        }
    }

    return "the code is incorrect";
}


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Poly Vote | Mot de passe oublié</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="icon" href="R.png" />

</head>

<body>
    <style type="text/css">
        * {
            font-family: tahoma;
            font-size: 13px;
            animation: fadein 0.5s;

        }

        @keyframes fadein {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        form {
            width: 100%;
            margin: auto;
            border: solid thin #ccc;
            padding: 10px;
            box-shadow: 0 0 40px 20px rgba(0, 0, 0, 0.26);
            justify-content: center;
            box-sizing: border-box;
            align-content: center;
            text-align: center;


        }
    </style>

    <?php

    switch ($mode) {
        case 'enter_email':

    ?>
            <div class="container padding-bottom-3x mb-2 mt-5">
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-md-10">



                        <form class="card mt-4" method="post" action="forgot.php?mode=enter_email">
                            <div class="card-body">
                                <h1>Mot de passe oublié</h1>
                                <h3>Entrez votre e-mail ci-dessous</h3>
                                <span style="font-size: 12px;color:red;">
                                    <?php
                                    foreach ($error as $err) {
                                        // code...
                                        echo $err . "<br>";
                                    }
                                    ?>
                                </span>
                                <input class="form-control" type="email" name="email" placeholder="Email"><br>
                                <br style="clear: both;">
                                <a class="btn btn-danger" href="index.php">Se connecter</a>
                                <input class="btn btn-success" type="submit" value="Suivant">


                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php
            break;

        case 'enter_code':
            // code...
        ?>
            <div class="container padding-bottom-3x mb-2 mt-5">
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-md-10">
                        <form method="post" class="card mt-4" action="forgot.php?mode=enter_code">
                            <div class="card-body">
                                <h1>Mot de passe oublié</h1>
                                <h3>Veuillez entrer le code envoyé à votre email</h3>
                                <span style="font-size: 12px;color:red;">
                                    <?php
                                    foreach ($error as $err) {
                                        // code...
                                        echo $err . "<br>";
                                    }
                                    ?>
                                </span>

                                <input class="form-control" type="text" name="code" placeholder="12345"><br>
                                <br style="clear: both;">
                                <input class="btn btn-success" type="submit" value="suivant" style="float: right;">
                                <a href="forgot.php">
                                    <input type="button" class="btn btn-primary" value="Recommencer">
                                </a>

                                <a class="btn btn-danger" href="index.php">Se connecter</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php
            break;

        case 'enter_password':
            // code...
        ?>
            <div class="container padding-bottom-3x mb-2 mt-5">
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-md-10">
                        <form class="card mt-4" method="post" action="forgot.php?mode=enter_password">
                            <div class="card-body">
                                <h1>Mot de passe oublié</h1>
                                <h3>Entrez votre nouveau mot de passe</h3>
                                <span style="font-size: 12px;color:red;">
                                    <?php
                                    foreach ($error as $err) {
                                        // code...
                                        echo $err . "<br>";
                                    }
                                    ?>
                                </span>

                                <input class="form-control" type="password" name="password" placeholder="Password"><br>
                                <input class="form-control" type="password" name="password2" placeholder="Retype Password"><br>
                                <br style="clear: both;">
                                <input class="btn btn-success" type="submit" value="Suivant" style="float: right;">
                                <a href="forgot.php">
                                    <input type="button" class="btn btn-danger" value="Recommencer">
                                </a>

                                <a class="btn btn-primary" href="index.php">Se connecter</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    <?php
            break;

        default:
            // code...
            break;
    }

    ?>


</body>

</html>