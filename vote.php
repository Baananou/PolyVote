 <?php $current = "vote.php";
    include_once('nav.php');
    $con = mysqli_connect('localhost', 'root', '') or die(mysqli_error($con));
    mysqli_select_db($con, 'polytechnique');
    $id_user = $_SESSION["id"];

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
    $groupe = $_SESSION['groupe'];
    $filiere = $_SESSION['filiere'];
    $niveau = $_SESSION['niveau'];
    $row = runQuery("SELECT * from candidature where status like 'confirme' and filiere ='$filiere' and niveau ='$niveau' and groupe = '$groupe ' ");
    if ($_SESSION['type'] != 'admin') { ?>
     <html lang="en">

     <head>
         <meta charset="UTF-8">
         <meta http-equiv="X-UA-Compatible" content="IE=edge">
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <link rel="stylesheet" href="css/bootstrap.min.css">
         <link rel="stylesheet" href="font-awesome.min.css">
         <link rel="stylesheet" href="css/css/style.css">
         <link rel="icon" href="R.png" />
         <link rel="stylesheet" href="css/tooplate.css">
         <!-- -->
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
         <script src="https://code.jquery.com/jquery-3.4.1.js"></script>

         <title>Poly Vote | Vote</title>
     </head>
     <style>
         .column {
             width: 40%;
             float: left;
             margin-bottom: 20px;
             height: 700px;
             margin-right: 20%;

         }


         /* Style the counter cards */

         .card {
             box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.7);
             border-radius: 10px;
             margin: 15px;
             font-family: arial;
             padding: 16px;
             text-align: left;
             background-color: #ffffff;


         }


         .button {
             border: none;
             outline: 0;
             display: inline-block;
             padding: 8px;
             color: white;

             background-color: #5F9EA0;
             text-align: center;
             cursor: pointer;
             width: 50%;
             font-size: 18px;
             margin: 50px;
             border-radius: 6px;


         }


         button:hover,
         a:hover {
             opacity: 0.7;
         }

         .progress {
             height: 10px;
             width: 300px;
         }

         .search {
             width: 100%;
             position: relative;
             display: flex;
         }

         .searchTerm {
             width: 100%;
             border: 3px solid #00B4CC;
             border-right: none;
             padding: 5px;
             height: 36px;
             border-radius: 5px 0 0 5px;
             outline: none;
             color: #9DBFAF;
         }

         .searchTerm:focus {
             color: #00B4CC;
         }

         .searchButton {
             width: 40px;
             height: 36px;
             border: 1px solid #00B4CC;
             background: #00B4CC;
             text-align: center;
             color: #fff;
             border-radius: 0 5px 5px 0;
             cursor: pointer;
             font-size: 20px;
             padding-top: 5px;
         }

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
             background: #008000;
             padding: 20px 18px;
             cursor: pointer;
         }

         .alert .close-btn:hover {
             background: #ffc766;
         }

         .alert .close-btn .fas {
             color: #90EE90;
             font-size: 22px;
             line-height: 40px;
         }

         /* */
     </style>

     </style>
     </head>

     <body style=" overflow-x: hidden;">
         <div class="alert hide">
             <span class="fa fa-check"></span>
             <span class="msg">Vote effectué avec succès !</span>
             <div class="close-btn">
                 <span class="fas fa-times"></span>
             </div>
         </div>
         <main>


             <script>
                 /* function Progres() {

            $.ajax({
              url: "progress.php",
              data: {
                query: "progres"

              },
              type: "GET",
              success: function(data) {

                $("#progresPoll").empty().append(data);

              }

            })
          } /*
             </script>
             <div class="search">
                 <input onkeyup="Search()" class="searchTerm" type="text" placeholder="Recherche..." id="input" aria-label="Search">
                 <span id='btn' class="searchButton" id="basic-addon1"><a><i class="fa fa-search"></i></a></span>
             </div>
             <br><br>
             <script>
                 function Search() {
                     var input = document.getElementById("input");
                     var filter = input.value.toLowerCase();
                     var element = document.getElementsByClassName('column card');


                     for (i = 0; i < element.length; i++) {

                         if (element[i].innerText.toLowerCase().includes(filter)) {
                             element[i].style.display = "table-row";

                         } else {
                             element[i].style.display = "none";

                         }
                     }
                 }
             </script>
             <?php
                if (!empty($row)) {
                    foreach ($row as $kk => $vv) { ?>
                     <?php
                        $id_cnn = $row[$kk]['id']; ?>

                     <div class="container">
                         <div class="column card" style="margin-left:60px ;" id="data">
                             <form method="post" id="poll_form">
                                 <input type="hidden" name="id_cond" value="<?php echo $row[$kk]['id'] ?>">
                                 <h3><?php echo $row[$kk]['titre']; ?></h3>
                                 <div class="radio">
                                     <label>
                                         <h4>
                                             <?php $ch = explode(',', $row[$kk]['choix']);
                                                foreach ($ch as $k1 => $v1) {
                                                    $val = $ch[$k1];

                                                ?>
                                                 <br><br>

                                                 <input type="radio" name="poll_option" class="poll_option" value="<?php echo $ch[$k1] ?>" required />
                                                 <?php print_r($ch[$k1]) ?>
                                                 <br>
                                                 <?php
                                                    $per = 0;
                                                    $total = 0;
                                                    $row1 = runQuery("SELECT * from resultat where id_cond=$id_cnn");
                                                    $nomc = $ch[$k1];
                                                    $c = mysqli_fetch_array(mysqli_query($con, "SELECT * from resultat where nom_choix like '$nomc' and id_cond=$id_cnn"));



                                                    if (!empty($row1)) {
                                                        foreach ($row1 as $k2 => $v2) {
                                                            $total += $row1[$k2]["resultat"];
                                                            $per = ($c["resultat"] / $total) * 100;
                                                        }
                                                    }
                                                    ?>

                                                 <div class="progress">
                                                     <div class="progress-bar bg-gradient-success" role="progressbar" style="<?php echo ' width:' . $per . '%;height:10px;font-size:10px;'; ?>" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                 </div>

                                                 <?php echo "<p style='font-size:20px;margin-right:0px;float:right;margin-top:-30px'>" . (int)$per . "%</p>"; ?>





                                             <?php
                                                }
                                                $res = mysqli_query($con, "SELECT * from vote where id_voteur=$id_user and id_cond =$id_cnn");
                                                $test = mysqli_num_rows($res);


                                                ?>
                                         </h4>
                                     </label>
                                 </div>
                                 <label> deadline : <?php echo $row[$kk]['date_ferm']; ?></label>
                                 <?php

                                    $currentDate = date("Y-m-d");
                                    $id = $row[$kk]['id'];
                                    if ($row[$kk]['date_ferm'] < $currentDate) {
                                        if (!mysqli_query($con, "UPDATE candidature SET close = 1 WHERE id=$id")) {
                                            echo mysqli_error($con);
                                        } else {
                                            echo "<div style='color:red'> expirée</div>";
                                        }
                                    }
                                    ?>
                                 <br>

                                 <?php
                                    $r1 = mysqli_query($con, "SELECT nom_choix FROM `resultat` Where id_cond=$id_cnn and resultat = (SELECT MAX(resultat) from resultat Where id_cond=$id_cnn)");
                                    $num = mysqli_num_rows($r1);
                                    $x = mysqli_fetch_array($r1);
                                    if ($num == 1) {
                                        if ($row[$kk]['close'] == 1) {
                                            echo "<p style='color: red; font-weight : 600'> Le gangnant c'est " . $x["nom_choix"] . "</p>";
                                        }
                                    } else {
                                        echo "aucun resultat";
                                    }
                                    ?>


                                 <center>

                                     <button class="button" style="margin-bottom: 0px !important;<?php if ($test > 0 || $row[$kk]['close'] == 1) { ?> cursor : not-allowed <?php } ?>" <?php if ($test > 0 || $row[$kk]['close'] == 1) {
                                                                                                                                                                                            echo "disabled";
                                                                                                                                                                                        } ?> type="submit" name="poll_button" id="poll_button" class="button">Voter</button>
                                 </center>
                             </form>

                         </div>

                     </div>

                 <?php }


                    if (isset($_POST["poll_button"])) {
                        $connect = mysqli_connect("localhost", "root", "", "polytechnique");
                        $id_con = $_POST["id_cond"];
                        $id_voteur = $_SESSION["id"];
                        $date = date("Y-m-d");
                        $choix = $_POST["poll_option"];

                        $sql = "INSERT INTO vote (id_cond,id_voteur,dateVote,Nomchoix) values ($id_con,$id_voteur,'$date','$choix')";
                        if (!mysqli_query($connect, $sql)) {
                            echo mysqli_error($connect);
                        } else {
                            $req = "SELECT * from resultat where nom_choix='$choix'";
                            $verif = mysqli_num_rows(mysqli_query($con, $req));

                            if ($verif == 0) {
                                if (!mysqli_query($con, "INSERT INTO resultat (id_cond,nom_choix,resultat) values($id_con,'$choix',1)")) {
                                    echo mysqli_error($con);
                                } else {
                                    echo ("<meta http-equiv = 'refresh' content='0;  URL =vote.php?Success'/>");
                                }
                            } else {
                                $rslt = mysqli_fetch_array(mysqli_query($con, $req));
                                $valeur = $rslt["resultat"] + 1;
                                $id = $rslt["id"];
                                if (!mysqli_query($con, "UPDATE resultat set resultat=$valeur where id=$id ")) {
                                    echo mysqli_error($con);
                                } else {
                                    echo ("<meta http-equiv = 'refresh' content='0;  URL =vote.php?Success'/>");
                                }
                            }
                        }
                    }
                }
                if (isset($_GET['Success'])) { ?>
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
             <?php } ?>


         <?php } else echo "<h1 style='margin-top:200px;margin-left:500px'>vous n'avez pas le droit d'acceder à cette page</h1>"; ?>

     </body>
     </main>

     </html>
     <?php
