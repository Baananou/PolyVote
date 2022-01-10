  <?php

  $current = "acceuil.php";
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
  $row = runQuery("SELECT * from candidature");
  if ($_SESSION['type'] != 'admin') { ?>

    <html lang="en">

    <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="icon" href="R.png" />
      <link rel="stylesheet" href="assets/css/fontawesome.css">
      <link rel="stylesheet" href="assets/css/tooplate-main.css">
      <link rel="stylesheet" href="assets/css/owl.css">

      <title>Poly Vote | accueil </title>
      <style>
        button:hover,
        a:hover {
          opacity: 0.7;
        }
      </style>
    </head>

    <body>
      <main>


        <!-- Navigation -->


        <!-- Page Content -->
        <!-- Banner Starts Here -->
        <div class="banner">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="caption">
                  <h2>Le succès commence par un bon choix</h2>
                  <div class="line-dec"></div>
                  <p>L'école Polytechnique Sousse : Fondée en 2009, L’Ecole Polytechnique de Sousse est une grande école privée d’enseignement et de recherche à vocation internationale, accréditée EUR- ACE et qui a pour unique vocation de former des ingénieurs ayant un niveau technique et scientifique conforme aux meilleurs standards internationaux. Elle se fixe résolument comme mission de garantir une excellente insertion professionnelle à ses jeunes diplômés en les propulsant directement à l’employabilité.
                  </p>
                  <div class="main-button">
                    <a href="vote.php">Voter maintenant!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Banner Ends Here -->

        <!-- Featured Starts Here -->
        <div class="featured-items" id="fil">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="section-heading">
                  <div class="line-dec"></div>
                  <h1>FILIERES</h1>
                </div>
              </div>
              <div class="col-md-12">
                <div class="owl-carousel owl-theme">
                  <a href="single-product.html">
                    <div class="featured-item">
                      <img src="image/G.Biotechnologique.png" alt="Item 1">
                      <h4>Génie Biotechnologique</h4>

                    </div>
                  </a>
                  <a href="single-product.html">
                    <div class="featured-item">
                      <img src="image/G.Civil.png" alt="Item 2">
                      <h4>Génie Civil</h4>
                    </div>
                  </a>
                  <a href="single-product.html">
                    <div class="featured-item">
                      <img src="image/G.electrique&automatique.png" alt="Item 3">
                      <h4>Génie électrique et automatique</h4>
                    </div>
                  </a>
                  <a href="single-product.html">
                    <div class="featured-item">
                      <img src="image/G.electromecanique.png" alt="Item 4">
                      <h4>Génie électromécanique</h4>
                    </div>
                  </a>
                  <a href="single-product.html">
                    <div class="featured-item">
                      <img src="image/G.Info.png" alt="Item 5">
                      <h4>Génie informatique</h4>

                    </div>
                  </a>
                  <a href="single-product.html">
                    <div class="featured-item">
                      <img src="image/G.InfoDeGestion.png" alt="Item 6">
                      <h4>Génie informatique de gestion</h4>
                    </div>
                  </a>
                  <a href="single-product.html">
                    <div class="featured-item">
                      <img src="image/G.MathApplique.png" alt="Item 7">
                      <h4>Génie mathématique appliqué</h4>

                    </div>
                  </a>
                  <a href="single-product.html">
                    <div class="featured-item">
                      <img src="image/G.mecanique.png" alt="Item 8">
                      <h4>Génie mécanique</h4>
                    </div>
                  </a>
                  <a href="single-product.html">
                    <div class="featured-item">
                      <img src="image/G;Telecom&reseau.png" alt="Item 9">
                      <h4>Génie télécom et réseau</h4>

                    </div>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Featred Ends Here -->


        <!-- Subscribe Form Starts Here -->


        <div class="container" id="map">
          <div class="row">
            <div class="col-md-12">
              <div class="section-heading">

                <center>
                  <div class="line-dec" style="text-align: center;"></div>
                </center>
                <h1 style="text-align: center;font-size:40px">Nous Trouvez</h1>

                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6106.772491916551!2d10.582119950171519!3d35.825705828967436!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12fd8b3a0237010f%3A0x4418fc1f1a3cb73f!2sPolytechnique%20Sousse!5e0!3m2!1sfr!2stn!4v1640614453732!5m2!1sfr!2stn" width="1000" height="350" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
              </div>
            </div>

          </div>
        </div>


        <!-- Subscribe Form Ends Here -->
        <div class="featured-items" id="fil">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="section-heading">
                  <center>
                    <div class="line-dec" style="text-align: center;"></div>
                  </center>
                  <h1 id="part" style="text-align: center;font-size:40px">Nos partenaires</h1>
                </div>
              </div>
              <img src="Capture.JPG" width="1000px">
            </div>
          </div>
        </div>
        </div>
        </div>


        <!-- Footer Starts Here -->
        <div class="footer">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="logo">
                  <img src="Logo.png" alt="">
                </div>
              </div>
              <div class="col-md-12">
                <div class="footer-menu">
                  <ul>
                    <li><a href="acceuil.php">Accueil</a></li>
                    <li><a href="vote.php">Voter</a></li>
                    <li><a href="candidature.php">Candidature</a></li>
                    <li><a href="acceuil.php#map">Nous trouver</a></li>
                    <li><a href="acceuil.php#part">Nos Partenaires</a></li>
                    <li><a href="acceuil.php#fil">Filieres</a></li>
                  </ul>
                </div>
              </div>

            </div>
          </div>
        </div>
        <!-- Footer Ends Here -->


        <!-- Sub Footer Starts Here -->
        <div class="sub-footer" style="background: #191970;">
          <div class="container">
            <div class="row" style="">
              <div class="col-md-12" style="color:white;font-weight:700;padding:30px">

                <i class="fa fa-map-marker"></i>
                Route Ceinture Sahloul Entrée Kalaa Sghira 4021 – sousse Tunisie.<br><br>
                <i class="fa fa-phone"></i>
                (+216) 99 277 877 <br><br>
                <i class="fa fa-phone"></i>
                (+216) 96 277 877<br><br>
                <i class="fa fa-phone"></i>
                (+216) 73 277 877<br><br>
                <i class="fa fa-phone"></i>
                (+216) 92 277 807<br><br>

                contact@polytecsousse.tn
                <ul class="social-icons" style="margin: 30px;">
                  <li>
                    <a href="https://www.facebook.com/EcolePolytechniqueSousse" style="margin: 20px;"><i class="fa fa-facebook"></i></a>
                    <a href="https://twitter.com/PolytecSousse" style="margin: 20px;"><i class="fa fa-twitter"></i></a>
                    <a href="https://www.instagram.com/polytecsousse_eps/" style="margin: 20px;"><i class="fa fa-instagram"></i></a>
                    <a href="https://www.youtube.com/channel/UCJTvyonYu0jhxk2Knr1CYIg/videos" style="margin: 20px;"><i class="fa fa-youtube"></i></a>
                  </li>
                </ul>
                <div class="copyright-text">
                  <p>Copyright &copy; 2022 Poly Vote


                </div>
              </div>
            </div>
          </div>
          <!-- Sub Footer Ends Here -->


          <!-- Bootstrap core JavaScript -->
          <script src="vendor/jquery/jquery.min.js"></script>
          <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


          <!-- Additional Scripts -->
          <script src="assets/js/custom.js"></script>
          <script src="assets/js/owl.js"></script>


          <script language="text/Javascript">
            cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
            function clearField(t) { //declaring the array outside of the
              if (!cleared[t.id]) { // function makes it static and global
                cleared[t.id] = 1; // you could use true and false, but that's more typing
                t.value = ''; // with more chance of typos
                t.style.color = '#fff';
              }
            }
          </script>
      </main>
    </body>

    </html>
  <?php } else echo "vous n'avez pas le droit d'acceder à cette page"; ?>