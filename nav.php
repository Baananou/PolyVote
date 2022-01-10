<?php session_start();
if (isset($_SESSION['type'])) {
    $_SESSION['LAST_ACTIVITY'] = time();
    $email = $_SESSION['email'];
    $con = mysqli_connect('localhost', 'root', '') or die(mysqli_error($con));
    mysqli_select_db($con, 'polytechnique');
    $req = mysqli_query($con, "SELECT * FROM utilisateurs where email='$email' ");
    $row = mysqli_fetch_array($req);
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/fontawesome.css">
        <link rel="stylesheet" href="css/css/style.css">
        <link rel="icon" href="R.png" />
        <link rel="stylesheet" href="css/tooplate.css">
        <script src="js/jquery.js" type="text/javascript"></script>

        <title>Poly Vote</title>

        <style>
            #hideMe {
                text-align: center;
                position: relative;
            }

            #hideMe {

                -moz-animation: cssAnimation 0s ease-in 4s forwards;
                /* Firefox */
                -webkit-animation: cssAnimation 0s ease-in 4s forwards;
                /* Safari and Chrome */
                -o-animation: cssAnimation 0s ease-in 4s forwards;
                /* Opera */
                animation: cssAnimation 0s ease-in 4s forwards;
                -webkit-animation-fill-mode: forwards;
                animation-fill-mode: forwards;
                transition: 3s all;

            }

            @keyframes cssAnimation {
                to {
                    width: 0;
                    height: 0;
                    overflow: hidden;
                    transition: 2s all;
                }
            }

            @-webkit-keyframes cssAnimation {
                to {
                    width: 0;
                    height: 0;
                    visibility: hidden;
                    transition: 2s all;
                }
            }

            @keyframes slideUp {
                0% {
                    transform: translateY(700px);
                }

                100% {
                    transform: translateY(0px);
                }
            }

            @keyframes slideLeft {
                0% {
                    transform: translateX(700px);
                }

                100% {
                    transform: translateX(0px);
                }
            }
        </style>

        <style>
            body {

                animation: fadein 0.3s;

            }

            html {
                scroll-behavior: smooth;
            }

            @keyframes fadein {
                from {
                    opacity: 0;
                }

                to {
                    opacity: 1;
                }
            }

            .logo {
                margin: 0;
                font-size: 1.45em;
            }

            .main-nav {
                margin-top: 5px;
                display: flex;
                flex-wrap: nowrap;
            }

            .logo a,
            .main-nav a {
                padding: 10px 15px;
                text-transform: uppercase;
                text-align: center;
                display: flex;
                
            }

            .main-nav a {
                color: #34495e;
                font-size: .88em;
            }

            /* .header {
                padding-top: .5em;
                padding-bottom: .5em;
                border: 1px solid #a2a2a2;
                background-color: #f4f4f4;
                -webkit-box-shadow: 0px 0px 14px 0px rgba(0, 0, 0, 0.75);
                -moz-box-shadow: 0px 0px 14px 0px rgba(0, 0, 0, 0.75);
                box-shadow: 0px 0px 14px 0px rgba(0, 0, 0, 0.75);
                -webkit-border-radius: 5px;
                -moz-border-radius: 5px;
                border-radius: 5px;
            } */


            /* ================================= Media Queries ==================================== */




            /* @media (min-width: 769px) {

                .header,
                .main-nav {
                    display: flex;
                }

                .header {
                    flex-direction: column;
                    align-items: center;
                }

                .header {
                    width: 80%;
                    margin: 0 auto;
                    max-width: 1150px;
                }
            }

            @media (min-width: 1025px) {
                .header {
                    flex-direction: row;
                    justify-content: space-between;
                }
            } */

            li a {
                color: #008ea1;
            }

            .badge1 {
                position: absolute;
                left: 60px;
                font-size: 10px;
                border-radius: 50%;
                background: red;
                color: white;
                padding: 7px;
                margin-top:-10px ;
            }
        </style>

    </head>
    <section class="preloader">
        <div class="sk-spinner sk-spinner-pulse"></div>
    </section>

    <body>

        <!-- preloader section -->
        <header class="header">

            <h2 class="logo">
                <a href="profile.php">
                    <?php if ($row['avatar'] != "") { ?>
                    <img src="<?php echo $row['avatar']; ?>" width="30px" height="30px" style="border-radius: 50%;">
                    <?php } ?> &nbsp;<?php echo $row["nom"]; ?> 
                    
                    <small style="text-decoration: none;">(<?php echo $row["type"] ?>)</small>
                </a>

            </h2>

            <!-- navigation section -->
            <ul class="main-nav">

                <li>
                    <?php if ($row["type"] != "admin") { ?>
                    <a <?php if ($current == "profile.php") {echo "class='active'";} 
                                else echo "style='color:gray;'"; ?> href="profile.php">
                                <i class="fa fa-user">  </i> Profile
                    </a><?php } ?>

                </li>

                <li>
                    <?php if ($row["type"] != "admin") { ?>
                    <a <?php if ($current == "acceuil.php#fil") {echo "class='active'";}
                                else echo " style='color:gray'"; ?> href="acceuil.php#fil">Filieres
                    </a><?php } ?>
                </li>

                <li>
                    <?php if ($row["type"] != "admin") { ?>
                    <a <?php if ($current == "acceuil.php#map") {echo "class='active'";} 
                                else echo " style='color:gray'"; ?> href="acceuil.php#map">Nous Trouver
                    </a><?php } ?>
                </li>

                <li>
                    <?php if ($row["type"] != "admin") { ?>
                    <a <?php if ($current == "acceuil.php#part") {echo "class='nav-link active'";} 
                                else echo "  style='color:gray'"; ?> href="acceuil.php#part">Nos partenaires
                    </a><?php } ?>
                </li>

                <li>
                    <a style='color:gray;' href="logout.php">
                        <i class="fa fa-sign-out"></i> Deconnexion
                    </a>
                </li>

            </ul>
        </header>


        <div class="sidebar">
            <div class="sidebar-brand">
                <h2><span class="fa fa-user-o"></span><a href="#"><img src="Logo.png" width="200px"></a></h2>
            </div>

            <div class="sidebar-menu">
                <ul>
                    <?php if ($row["type"] != "admin") { ?>

                        <li>
                            <a <?php if ($current == "acceuil.php") {
                                    echo "class=' active'";
                                } else echo "class='nav-link'"; ?> href="acceuil.php"><span class="fa fa-home"> </span><span> Accueil</span></a>
                        </li>
                    <?php } ?>
                    <?php if ($row["type"] != "admin") { ?>

                        <li>
                            <a <?php if ($current == "vote.php") {
                                    echo "class='nav-link active'";
                                } else echo "class='nav-link'"; ?> href="vote.php"><span class="fa fa-check"> </span><span> Voter</span></a>
                        </li>
                    <?php } ?>
                    <li>
                        <?php if ($row["type"] == "candidat") { ?>
                            <a <?php if ($current == "candidature.php") {
                                    echo "class='nav-link active'";
                                } else echo "class='nav-link'"; ?> href="candidature.php"><span class="fa fa-list"> </span><span> Candidature</span></a>

                    </li>
                <?php } ?>
                <?php if ($row["type"] == "admin") { ?>
                    <li>
                        <a <?php if ($current == "dashbord.php") {
                                echo "class='nav-link active'";
                            } else echo "class='nav-link'"; ?> href="dashbord.php"><span class="fa fa-bar-chart"> </span><span> Tableau de bord</span></a>
                    </li>

                <?php } ?>
                <?php if ($row["type"] == "admin") { ?>
                    <li>
                        <a <?php if ($current == "ListeDesComptes.php") {
                                echo "class='nav-link active'";
                            } else echo "class='nav-link'"; ?> href="ListeDesComptes.php"><span class="fa fa-user"></span> Liste des utilisateurs</a>



                    <?php } ?>
                    </li>

                    <?php if ($row["type"] == "admin") { ?>
                        <li>
                            <a <?php if ($current == "ListeDesCandidatures.php") {
                                    echo "class='nav-link active'";
                                } else echo "class='nav-link'"; ?> href="ListesDesCandidatures.php"><span class="fa fa-list"></span><span>Liste Des Candidatures</span></a>
                        </li>

                    <?php } ?>
                    <?php if ($row["type"] == "admin") { ?>
                        <li>
                            <a <?php if ($current == "Notif.php") {
                                    echo "class='nav-link active'";
                                } else echo "class='nav-link'"; ?> href="Notif.php"><span class="fa fa-bell"></span> <span class="badge1" id="notifN"></span>Notifications</a>
                        </li>
                        <script>
                            jQuery(function($) {
                                setInterval(() => {
                                    NotifNumber()
                                }, 500);

                                function NotifNumber() {
                                    $.ajax({
                                        type: "post",
                                        url: "utiles.php",
                                        data: {
                                            query: "notif",
                                            type: "admin"
                                        },
                                        success: function(data) {
                                            $("#notifN").html("").append(data);

                                        }
                                    })
                                }
                            })
                        </script>

                    <?php } ?>


                </ul>
            </div>
        </div>
        
        <!-- ----------------------------------------------------- -->

        <script>
            jQuery(function($) {
                setInterval(function() {
                    Session()
                }, 5000);

                function Session() {
                    $.ajax({
                        url: "session.php",
                        data: {
                            query: "session",
                            activity: "<?php echo $_SESSION['LAST_ACTIVITY'] ?>"
                        },
                        type: "GET",
                        success: function(data) {
                            if (data.substr(0, 6) == "logout") {
                                window.location.href = data;
                            }
                        }

                    })
                }
            });
        </script>

        <!-- home section -->



        <!-- copyright section -->


        <!-- JAVASCRIPT JS FILES -->
        <script src="css/js/jquery.js"></script>
        <script src="css/js/bootstrap.min.js"></script>
        <script src="css/js/jquery.parallax.js"></script>
        <script src="css/js/smoothscroll.js"></script>
        <script src="css/js/nivo-lightbox.min.js"></script>
        <script src="css/js/wow.min.js"></script>
        <script src="css/js/custom.js"></script>

    </body>

    </html>
<?php } else {
    header('Location:index.php?LogIN');
} ?>