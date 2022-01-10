<?php
$current = "candidature.php";
include_once('nav.php');
if ($_SESSION['type'] == "candidat") {
    function runQuery($query)
    {
        $connect = mysqli_connect('localhost', 'root', '') or die(mysqli_error($connect));
        mysqli_select_db($connect, 'polytechnique');

        $result = mysqli_query($connect, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            $resultset[] = $row;
        }
        if (!empty($resultset))
            return $resultset;
    }
    $id = $_SESSION['id'];

    $row = runQuery("SELECT * from candidature WHERE ajoute_par=$id");
?>

    <body>

        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="icon" href="R.png" />
            <link rel="stylesheet" href="font-awesome.min.css">
            <link rel="stylesheet" href="css/candidature.css">

            <title>Poly Vote | candidature </title>
            <style>
                .alert {
                    background: #90EE90;
                    padding: 20px 40px;
                    min-width: 420px;
                    position: absolute;
                    right: 0;
                    bottom: 100px;
                    border-radius: 4px;
                    border-left: 8px solid #008000;
                    overflow: hidden;
                    opacity: 0;
                    pointer-events: none;
                }

                .alert.showAlert {
                    opacity: 1;
                    pointer-events: auto;
                }

                .alert.show {
                    animation: show_slide 1s ease forwards;
                }

                @keyframes show_slide {
                    0% {
                        transform: translateX(100%);
                    }

                    40% {
                        transform: translateX(-10%);
                    }

                    80% {
                        transform: translateX(0%);
                    }

                    100% {
                        transform: translateX(-10px);
                    }
                }

                .alert.hide {
                    animation: hide_slide 1s ease forwards;
                }

                @keyframes hide_slide {
                    0% {
                        transform: translateX(-10px);
                    }

                    40% {
                        transform: translateX(0%);
                    }

                    80% {
                        transform: translateX(-10%);
                    }

                    100% {
                        transform: translateX(100%);
                    }
                }

                .alert .fa-check {
                    position: absolute;
                    left: 20px;
                    top: 50%;
                    transform: translateY(-50%);
                    color: #008000;
                    font-size: 30px;
                }

                .alert .msg {
                    padding: 0 20px;
                    font-size: 18px;
                    color: #008000;
                }

                .alert .close-btn {
                    position: absolute;
                    right: 0px;
                    top: 50%;
                    transform: translateY(-50%);
                    background: #90EE90;
                    padding: 20px 18px;
                    cursor: pointer;
                }

                .alert .close-btn:hover {
                    background: #ffc766;
                }

                .alert .close-btn .fas {
                    color: #ce8500;
                    font-size: 22px;
                    line-height: 40px;
                }

                /* */
            </style>

        </head>
        <section class="preloader">
            <div class="sk-spinner sk-spinner-pulse"></div>
        </section>



        <body style="overflow-x: hidden;">

            <div class="alert hide">
                <span class="fa fa-check"></span>
                <span class="msg">Candidature ajoutée avec succées !<br> veuillez attendre pour qu'elle soit validée</span>
                <div class="close-btn">
                    <span class="fa fa-times"></span>
                </div>
            </div>
            <main>



                <div class="composant" style="width: 140%;">
                    <div class="ventes">
                        <div class="case">

                            <div class="header-case">
                                <h2>Listes candidatures</h2>

                                <input type="checkbox" id="show">
                                <label for="show" class="button">Ajouter Candidature</label>
                                <div class="container">
                                    <label for="show" class="close-btn fa fa-times" title="close"></label>
                                    <div class="text">
                                        Ajouter candidature
                                    </div>
                                    <form class="form" method="POST">
                                        <div class="data">
                                            <label>Sujet</label>
                                            <input type="texte" minlength="6" name="titre">
                                        </div>
                                        <div class="data">
                                            <label>Date ouverture : </labele>
                                                <input value="<?php echo date("d-m-Y"); ?>" name="date_ouv" type="text" disabled><br>

                                        </div>
                                        <div class="data">
                                            <lable>Date fermeture : </lable>
                                            <input id="datePickerId" name="date_ferm" min="<?php echo date("d-m-Y"); ?>" type="date" required><br><br>

                                        </div>
                                        <script>
                                            datePickerId = document.getElementById("datePickerId");
                                            datePickerId.min = new Date().toISOString().split("T")[0];
                                        </script>

                                        <label>choix</label>
                                        <select class="data" id='choix' name="choix" style="width: 20%;" required>

                                            <?php
                                            for ($i = 1; $i <= 3; $i++) {
                                            ?> <option class="data"><?php echo $i ?></option><?php } ?>
                                        </select>
                                        <a class="add" class="add" style="color:white;" name="ajouterChoix" id="ajouterChoix" onclick="choix(this)"> + </a><br>
                                        <div>
                                            <input class="data" style="margin-top:-5px;margin-bottom:5px" name="choix[]" type="text" required></input>
                                            <input class="data" style="margin-top:5px;margin-bottom:5px" name="choix[]" type="text" required></input>
                                        </div>
                                        <script>
                                            function choix(item) {
                                                var num = document.getElementById('choix').value;
                                                var container = document.getElementById("formm");
                                                if (num == '' || num == "0") {
                                                    container.innerHTML = '';
                                                }



                                                container.innerHTML = '';

                                                for (var i = 0; i < num; i++) {
                                                    var input = document.createElement("input");
                                                    input.type = "text";
                                                    input.name = "choix[]";
                                                    input.className = "data";
                                                    input.style = "margin-top:-20px;width:120%;margin-left:-30px"
                                                    input.required = "true";
                                                    container.appendChild(input);

                                                }

                                                item.innerHTML = '';
                                                item.innerHTML = '-';
                                                item.onclick = function() {
                                                    container.innerHTML = ''
                                                    item.innerHTML = '+';
                                                    item.onclick = function() {
                                                        choix(item);
                                                    }

                                                }

                                            }
                                        </script>
                                        <div id="formm" class="form__group" style="padding:30px;">
                                        </div>

                                        <div class="btn">
                                            <div class="inner"></div>
                                            <button class="add" name="ajoutcandidature" type="submit">Ajouter candidature</button>

                                        </div>

                                    </form>
                                </div>
                            </div>

                            <!-- ---------------------------PHP------------------------------------------->

                            <!-- ------------------------CONTENU DU TABLEAU----------------------------------------->

                            <div class="body-case">
                                <div class="tableau">
                                    <table width="100%">
                                        <thead>
                                            <tr>
                                                <td>Sujet</td>
                                                <td>Date Ouverture</td>
                                                <td>Deadline</td>
                                                <td>Choix</td>
                                                <td>Résultat</td>
                                            </tr>
                                        </thead>
                                        <?php
                                        if (!empty($row)) {
                                            foreach ($row as $kk => $vv) { ?>
                                                <?php
                                                if ($row[$kk]['status'] == "confirme") {
                                                    $id_cnn = $row[$kk]['id'];
                                                    $currentDate = date("Y-m-d");
                                                    $id = $row[$kk]['id'];

                                                    $r1 = mysqli_query($con, "SELECT nom_choix FROM `resultat` Where id_cond=$id_cnn and resultat = (SELECT MAX(resultat) from resultat Where id_cond=$id_cnn)");
                                                    $num = mysqli_num_rows($r1);
                                                    $x = mysqli_fetch_array($r1);

                                                ?>
                                                    <tbody>

                                                        <tr>
                                                            <td><span class="status-produit color-one"></span><?php echo $row[$kk]['titre'] ?></td>
                                                            <td><?php echo $row[$kk]['date_ouv'] ?></td>
                                                            <td><?php echo $row[$kk]['date_ferm'] ?></td>
                                                            <td><?php echo $row[$kk]['choix'] ?> </td>
                                                            <td><?php if ($num == 1) {
                                                                    if ($row[$kk]['close'] == 1) {
                                                                        echo $x["nom_choix"];
                                                                    } else {
                                                                        echo "<p style='color: red; font-weight : 600'> ----- </p>";
                                                                    }
                                                                } else {
                                                                    echo "aucun resultat";
                                                                } ?></td>
                                                        </tr>

                                            <?php }
                                            }
                                        } ?>
                                                    </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>




                <?php
                $con = mysqli_connect('localhost', 'root', '') or die(mysqli_error($con));
                mysqli_select_db($con, 'polytechnique');
                if (isset($_POST['ajoutcandidature'])) {
                    $titre = $_POST['titre'];
                    $date_ouv = date('Y/m/d');
                    $date_ferm = $_POST['date_ferm'];
                    $currentDate = date('Y/m/d');
                    $choix = $_POST['choix'];
                    $niv=$_SESSION["niveau"];
                    $filiere= $_SESSION["filiere"] ;
                    $group=$_SESSION["groupe"];
                  

                    $insert = "";

                    if ($_POST['choix']) {
                        foreach ($_POST['choix'] as $choix) {
                            if ($insert == "") {
                                $insert = mysqli_real_escape_string($con,$choix);
                            } else {
                                $insert .= ",".mysqli_real_escape_string($con,$choix)."";
                            }
                        }
                    }
                    $array = runQuery("SELECT * from utilisateurs ORDER BY id ASC");
                    if (!empty($array)) {
                        foreach ($array as $key => $value) {
                            $id = $array[$key]['id'];
                        }
                    }
                    $close = 0;
                    $id = $_SESSION["id"];
                    $can = mysqli_query($con, "INSERT into candidature(ajoute_par,date_ouv,date_ferm,titre,choix,close,status,niveau,filiere,groupe) values ($id,'$date_ouv','$date_ferm','$titre','$insert','$close','en attente','$niv','$filiere','$group')");

                    if ($can) {
                        $cc = mysqli_fetch_array(mysqli_query($con, "SELECT * from candidature where titre like '$titre' "));
                        $id_cond = $cc["id"];
                        $array = runQuery("SELECT * from utilisateurs ORDER BY id ASC");
                        $nom = $_SESSION["nom"];

                        $titre1 = "Nouvelle candidature";
                        $sujet = mysqli_real_escape_string($con, "Le/La candidat(e) " . $nom . " a ajouté une nouvelle candidture sous le titre " . $titre . " avec les choix " . $insert . " et attends votre validation");
                        $emetteur = $_SESSION['id'];
                        $recepteur = 'admin';
                        if (mysqli_query($con, "INSERT INTO notification (titre,sujet,emetteur,recepteur,id_cand)
              VALUES ('$titre1','$sujet',$emetteur,'$recepteur',$id_cond)")) {
                            echo ("<meta http-equiv = 'refresh' content='0;  URL =candidature.php?successAdd'/>");
                        } else {
                            echo mysqli_error($con);
                        }
                    }
                }




                ?>
                <?php if (isset($_GET['successAdd'])) { ?>
                    <script>
                        $('.alert').addClass("show");
                        $('.alert').removeClass("hide");
                        $('.alert').addClass("showAlert");
                        setTimeout(function() {
                            $('.alert').removeClass("show");
                            $('.alert').addClass("hide");
                        }, 5000);

                        $('.close-btn').click(function() {
                            $('.alert').removeClass("show");
                            $('.alert').addClass("hide");
                        });
                    </script>
                    <!--   echo "<h3   style='font-weight:600'> Candidature ajoutée avec succées ! veuillez attendre pour qu'elle soit validée </h3> "; -->
                <?php   } ?>

            <?php } else echo "<h1 style='margin-top:200px;margin-left:500px'>vous n'avez pas le droit d'acceder à cette page</h1>"; ?>
        </body>

        </main>

        </html>