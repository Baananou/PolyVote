<?php
session_start();
if (!isset($_SESSION["type"])) {
?>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poly Vote</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="R.png" />
    <script src="js/jquery.js" type="text/javascript"></script>
    <link rel="stylesheet" href="css/fontawesome.min.css">

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
  </head>

  <body>
    <br>
    <form method="POST" action="connecter.php">
      <div class="cont">
        <div class="form sign-in">
          <h2>Se connecter</h2><br>
          <label>
            <input name="email" placeholder="Email" type="email" required />
          </label><br>
          <label>
            <input id="mdpp" placeholder="Mot de passe" pattern="[^'\x22]+" title="Saisir le mot de passe" name="mdp" type="password" required />
          </label><br>
          <P id="maj" style="display: none;text-align: center; color: black;font-size:13px;font-family:noto">La touche majusucule est activée!</P>
          <script>
            jQuery(function($) {
              document.querySelector("#mdpp").addEventListener('keyup', checkCapsLock);
              document.querySelector("#mdpp").addEventListener('mousedown', checkCapsLock);

              function checkCapsLock(e) {
                var txt = document.getElementById("maj");

                var caps_lock_on = e.getModifierState('CapsLock');

                if (caps_lock_on == true) {

                  txt.style.display = "block";
                } else {
                  txt.style.display = "none";
                }
              }
            })
          </script>

          <button type="submit" class="submit">Se connecter</button>

          <div id="hideMe">
            <?php
            if (isset($_GET["Notfound"])) {
            ?>
              <a style="font-size: 12px;font-family: Montserrat-Bold;color:red;font-weight:600"><i class="fa fa-times"> </i>&nbsp; Utilisateur non trouvé .</a>


            <?php } elseif (isset($_GET["ErreurMDP"])) {
            ?>
              <a style="font-size: 12px;font-family: Montserrat-Bold;color:red;font-weight:600"><i class="fa fa-times"> </i> &nbsp; Mot de passe incorrect</a>

            <?php } elseif (isset($_GET['successSign'])) { ?>
              <a style=" font-size: 12px;font-family: Montserrat-Bold;color:green;font-weight:600"> Inscription réuissite ! veuillez vous connecter.</a>
            <?php } elseif (isset($_GET['Mailinvalide'])) { ?>
              <a style=" font-size: 12px;font-family: Montserrat-Bold;color:red;font-weight:600"><i class="fa fa-times"> </i>&nbsp; utilisateur non trouvé ! </a>
            <?php } elseif (isset($_GET['Mailvalide'])) { ?>
              <a style=" font-size: 12px;font-family: Montserrat-Bold;color:green;font-weight:600"> Demande envoyée! veuillez contacter l'administration </a>
            <?php } elseif (isset($_GET["LogIN"])) { ?>
              <a style="font-size: 12px;font-family: Montserrat-Bold;color:red;font-weight:600"><i class="fa fa-times"> </i>&nbsp; Vous devez se connecter !</a> <?php } ?>
          </div>
          <?php if (isset($_GET["Session_Expired"])) { ?>
            <center> <a style="font-size: 12px;font-family: Montserrat-Bold;color:red;font-weight:600">Session expirée! Veuillez se reconnecter.</a></center>


          <?php } ?>
          <div style="text-align: center;margin-top:15px;">

            <a id="" href="forgot.php" style="font-size: 17px;font-weight: bold;cursor: pointer;font-family: Montserrat-Bold;text-decoration:none;color:gray">Mot de passe oublié?</a>

          </div>
    </form>
    </form>
    <form method="POST" action="sinscrire.php" enctype="multipart/form-data">
      <div class="sub-cont">
        <div class="img">
          <div class="img__text m--up">
            <h2>Nouveau membre?</h2>
            <p>S'inscrire pour pouvoir voter !</p>
            <img src="Logo.png" width="200px">
          </div>
          <div class="img__text m--in">
            <h2>vous avez déjà un compte?</h2>
            <img src="Logo.png" width="200px">
          </div>
          <div class="img__btn">
            <span class="m--up">S'inscrire</span>
            <span class="m--in">Se connecter</span>
          </div>
        </div>
        <div class="form sign-up">
          <h2>Bienvenu</h2>
          <br>
          <label>

            <input placeholder="Nom et prénom" minlength="6" name="nom" type="text" required />
          </label>
          <label>
            Filiére
            <select name="filiere" required> o hethi code fel connecter.php
              <option value="info">Génie informatique</option>
              <option value="math">Génie Mathématique</option>
              <option value="bio">Génie Biologique</option>
              <option value="civil">Génie civil</option>
              <option value="EA">Génie électrique et automatique</option>
              <option value="elect">Génie électromécanique</option>
              <option value="mec">Génie mécanique</option>
              <option value="prepa">Préparatoire</option>
              <option value="archi">Architecture</option>
              &nbsp;
            </select>
          </label>
          <label style="display: flex;">

            Niveau
            <select name="niveau" required>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
            </select> &nbsp;
            Groupe
            <select name="groupe" required>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
            </select>&nbsp;
          </label>

          <label>

            <input placeholder="Email" id="email" onkeyup="testEmail()" name="email" type="email" required />
          </label>
          <style>
            #erreur,
            #erreur2 {
              color: red;
              margin-top: 5px;
            }
          </style>
          <label><span id="erreur"></span></label>
          <label>



            <label style="display: flex;">
              <span>Electeur</span> <input type="radio" name="radio" value="voteur" checked />
              <span>Candidat</span> <input type="radio" value="candidat" name="radio" />
            </label>

            <br>
            <input placeholder="Mot de passe" minlength="5" name="mdp" type="password" required />
          </label>
          <label>

            <input type="file" name="avatar" />
          </label>
          <button id="subAjout" type="submit" class="submit">S'inscrire</button>

          <script>
            var emailValide = false;

            function testEmail() {
              emailValide = false;
              $.ajax({
                type: 'POST',
                url: 'test-email.php',
                data: {
                  email: $("#email").val()
                },
                success: function(output) {
                  $('#email').css("border", "2px solid red");

                  if (output == "0") {
                    emailValide = true;
                    $('#erreur').html("");
                    $('#email').css("border", "2px solid green");
                    $("#subAjout").removeAttr("disabled");
                    $("#subAjout").css("cursor", "pointer");

                  }

                  if (output == "4") {
                    $('#erreur').html("Cette adresse est déjà inscrite");
                    $("#subAjout").attr("disabled", true);
                    $("#subAjout").css("cursor", "not-allowed");
                  } else if (output == "2") {
                    $('#erreur').html("Ce domaine n'est pas autorisé à s'enregister !");
                    $("#subAjout").attr("disabled", true);
                    $("#subAjout").css("cursor", "not-allowed");
                  }
                  if (output == '5') {
                    $('#erreur2').html("Utilisateur non trouvé !");
                    $("#subAjout2").attr("disabled", true);
                    $("#subAjout2").css("cursor", "not-allowed");
                  }
                }
              });
            }

            function controle() {
              var valid = true;
              // validation de l'email
              if (!emailValide) {
                valid = false;
              }
              return valid;
            }
          </script>
        </div>
      </div>
      </div>
    </form>

    <div id="myModal" class="modal" style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;">

      <!-- Modal content -->
      <div class="modal-content1">
        <span class="close">&times;</span>
        <div class="user">
          <header class="user__header">
            <h1 class="user__title">Récuperer votre mot de passe</h1>

          </header>

          <br><br>
          <form class="" action="index.php" method="POST">
            <br>
            <div class="">
              <input name="email" id="email1" onkeyup="testEmail1()" type="email" placeholder="email" required>
            </div>
            <label><span id="erreur2"></span></label>


            <button id="subAjout2" name="forgot_password" class="submit" type="submit">Envoyer Demande</button>
          </form>
          <?php if (isset($_POST['forgot_password'])) {
            $conn = mysqli_connect('localhost', 'root', '') or die(mysqli_error($conn));
            mysqli_select_db($conn, 'polytechnique');
            $email = $_POST['email'];
            $sql = "SELECT * from utilisateurs where  email like '$email' ";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) == 1) {
            }
          } ?>
        </div>

      </div>
    </div>
    <script>
      var modal = document.getElementById("myModal");

      // Get the button that opens the modal
      var btn = document.getElementById("Open");

      // Get the <span> element that closes the modal
      var span = document.getElementsByClassName("close")[0];

      // When the user clicks the button, open the modal 
      btn.onclick = function() {
        modal.style.display = "block";
      }

      // When the user clicks on <span> (x), close the modal
      span.onclick = function() {
        modal.style.display = "none";
      }

      // When the user clicks anywhere outside of the modal, close it
      window.onclick = function(event) {
        if (event.target == modal) {
          modal.style.display = "none";
        }
      }
    </script>

    <?php

    $connect = mysqli_connect('localhost', 'root', '') or die(mysqli_error($connect));
    mysqli_select_db($connect, 'ploytechnique');

    if (isset($_POST["recuperer"])) {
      $temp = date('Y-m-d | H:i', strtotime("+1 hours"));
      $email = $_POST["email"];
      $query = mysqli_fetch_array(mysqli_query($connect, "SELECT * from utilisateurs where email='$email'"));
      $nom = $query["nom"];
      $sql = mysqli_fetch_array(mysqli_query($connect, "SELECT * from utilisateurs where email='$email'"));
      if (!empty($sql)) {
        $nom = $sql["nom"];

        require_once("PHPMailer/PHPMailerAutoload.php");
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = "ssl";
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = '465';
        $mail->isHTML();
        $mail->Username = "informatiques213@gmail.com";
        $mail->Password = "polyvote123";
        $mail->SetFrom('no-reply@polytechnicien.tn');
        $mail->Subject = "Demande de recuperation du mot de passe";
        $mail->Body = "Bonjour,<br>L'utilisateur <strong>" . $nom . "</strong> a demandé de recupérer son mot de passe le " . date("Y-m-d , H:i") . "<br>Il veut que vous le récupère le plutôt possible.<br><br><strong><em>PolyVote</em></strong>";
        $mail->AddAddress("amenyelokb@gmail.com");
        $mail->Send();
        echo ("<meta http-equiv='refresh' content='0;  URL =index.php?MailValid'/>");
      } else
        echo ("<meta http-equiv='refresh' content='0;  URL =index.php?Mailinvalide'/>");
    } ?>

    <script>
      document.querySelector('.img__btn').addEventListener('click', function() {
        document.querySelector('.cont').classList.toggle('s--signup');
      });
    </script>
    </form>

  </body>
  <script type="text/Javascript">
    function preback() {
                window.history.forward();
            }
            setTimeout("preback()", 0);
            window.onunload = function() {
                null
            };
        </script>
  <script>
    history.pushState(null, null, location.href);
    window.onpopstate = function() {
      history.go(1);
    };
  </script>
  <script>
    var emailValide = false;

    function testEmail1() {
      emailValide = false;
      $.ajax({
        type: 'POST',
        url: 'test-email-pass.php',
        data: {
          email: $("#email1").val()
        },
        success: function(output) {
          $('#email1').css("border", "2px solid red");
          if (output == '5') {
            $('#erreur2').html("Utilisateur non trouvé !");
            $("#subAjout2").attr("disabled", true);
            $("#subAjout2").css("cursor", "not-allowed");
          } else {
            emailValide = true;
            $('#erreur2').html("");
            $('#email1').css("border", "2px solid green");
            $("#subAjout2").removeAttr("disabled");
            $("#subAjout2").css("cursor", "pointer");

          }
        }
      });
    }
  </script>


  </html>
<?php } else {
  header("Location:acceuil.php");
} ?>