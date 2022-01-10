<?php
$current = "dashbord.php";
include_once('nav.php');
if ($_SESSION["type"] == "admin") {
    $connect = mysqli_connect('localhost', 'root', '') or die(mysqli_error($conect));
    mysqli_select_db($connect, 'polytechnique');
    $cand = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM utilisateurs where type='candidat'"));
    $elect = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM utilisateurs where type='voteur'"));
    $vote = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM vote"));
    $candidature = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM candidature"));
    $date = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM candidature where MONTH(date_ouv) =  1 and status like 'confirme'"));
    $date2 = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM candidature where MONTH(date_ouv) =  2 and status like 'confirme'"));
    $date3 = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM candidature where MONTH(date_ouv) =  3 and status like 'confirme'"));
    $date4 = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM candidature where MONTH(date_ouv) =  4 and status like 'confirme'"));
    $date5 = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM candidature where MONTH(date_ouv) =  5 and status like 'confirme'"));
            $date6 = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM candidature where MONTH(date_ouv) =  6 and status like 'confirme'"));
            $date7 = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM candidature where MONTH(date_ouv) =  7 and status like 'confirme'"));
            $date8 = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM candidature where MONTH(date_ouv) =  8 and status like 'confirme'"));
            $date9 = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM candidature where MONTH(date_ouv) =  9 and status like 'confirme'"));
            $date10 = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM candidature where MONTH(date_ouv) =  10 and status like 'confirme'"));
            $date11 = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM candidature where MONTH(date_ouv) =  11 and status like 'confirme'"));
            $date12 = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM candidature where MONTH(date_ouv) =  12 and status like 'confirme'"));





?>

    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="R.png" />
        <link rel="stylesheet" href="dashbordStyle.css">
        <title>Poly Vote | tableau de bord</title>
    </head>

    <body>
        <main>
            <div class="cards">
                <div class="card-single">
                    <div>
                        <h2><?php echo $cand ?></h2>
                        <small>Candidats</small>
                    </div>
                    <div>
                        <span class="fa fa-user"></span>
                    </div>
                </div>

                <div class="card-single">
                    <div>
                        <h2><?php echo $elect ?></h2>
                        <small>Electeurs</small>
                    </div>
                    <div>
                        <span class="fa fa-user-circle"></span>
                    </div>
                </div>
                <div class="card-single">
                    <div>
                        <h2><?php echo $vote ?></h2>
                        <small>Votes</small>
                    </div>
                    <div>
                        <span class="fa fa-check"></span>
                    </div>
                </div>
                <div class="card-single">
                    <div>
                        <h2><?php echo $candidature ?></h2>
                        <small>Candidatures</small>
                    </div>
                    <div>
                        <span class="fa fa-list"></span>
                    </div>
                </div>
            </div>
            <br><br><br>
            <script src="js/canvasjs.min.js"> </script>
            <div class="row" id="" style="width: 100%;float:left">
                <div class="col-md-12 grid-margin">
                    <div class="card">

                        <div class="card-body">

                            <div id="chartContainer" style="height: 280px; width: 100%;"></div>

                            <script type="text/javascript">
                                window.onload = function() {

                                    var chart = new CanvasJS.Chart("chartContainer", {
                                        theme: "light2", // "light2", "dark1", "dark2"
                                        animationEnabled: true, // change to true		
                                        title: {
                                            text: "Nombre de candidature par mois"
                                        },
                                        data: [{
                                            // Change type to "bar", "area", "spline", "pie",etc.
                                            type: "column",
                                            dataPoints: [{
                                                    label: "janvier",
                                                    y: <?php echo "$date" ?>
                                                },
                                                {
                                                    label: "février",
                                                    y: <?php echo "$date2" ?>
                                                },
                                                {
                                                    label: "Mars",
                                                    y: <?php echo  "$date3" ?>
                                                },
                                                {
                                                    label: "Avril",
                                                    y: <?php echo  "$date4" ?>
                                                },
                                                {
                                                    label: "Mai",
                                                    y: <?php echo "$date5"  ?>
                                                },
                                                {
                                                    label: "Juin",
                                                    y: <?php echo "$date6"  ?>
                                                },
                                                {
                                                    label: "Juillet",
                                                    y: <?php echo "$date7" ?>
                                                },
                                                {
                                                    label: "Aout",
                                                    y: <?php echo "$date8"  ?>
                                                },
                                                {
                                                    label: "Septembre",
                                                    y: <?php echo "$date9"  ?>
                                                },
                                                {
                                                    label: "Octobre",
                                                    y: <?php echo "$date10" ?>
                                                },
                                                {
                                                    label: "Novembre",
                                                    y: <?php echo "$date11"  ?>
                                                },
                                                {
                                                    label: "Decembre",
                                                    y: <?php echo "$date12"  ?>
                                                },

                                            ]
                                        }]
                                    });
                                    chart.render();

                                }
                            </script>
                        </div>
                    </div>
                </div>
            </div>

        <?php } else echo "<h1 style='margin-top:200px;margin-left:500px'>vous n'avez pas le droit d'acceder à cette page</h1>"; ?>

        </main>
    </body>

    </html>