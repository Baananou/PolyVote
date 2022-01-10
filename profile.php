  <?php

  $current = "profile.php";
  include_once('nav.php');
  // include_once('connecter.php');

  $con = mysqli_connect('localhost', 'root', '') or die(mysqli_error($con));
  mysqli_select_db($con, 'polytechnique');
  $type = $_SESSION['type'];
  $req = mysqli_query($con, "SELECT * FROM utilisateurs where type not like '$type' and type not like 'admin' ");
  $row = mysqli_fetch_array($req);
  if ($_SESSION['type'] != 'admin') { ?>

    <html lang="en">

    <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Poly Vote | profil</title>
      <link rel="stylesheet" href="css/prifile.css">
      <link rel="icon" href="R.png" />
      <style>
        input {
          border: none;

        }

        input:after {
          border: 1px solid gray;
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

        .alert .close-btn .fa {
          color: #90EE90;
          font-size: 22px;
          line-height: 40px;
        }

        /* */
      </style>
    </head>


    <body style=" overflow-x: hidden;">
      <div class="alert hide">
        <span class="fa fa-check"></span>
        <span class="msg">Modifié avec succès !</span>
        <div class="close-btn">
          <span class="fa fa-times"></span>
        </div>
      </div>
      <main>
        <div class="container" style="background: white;">
          <div class="row">




            <div class="panel panel-info">
              <div class="panel-heading">
                <form style="margin:20px" action="profile.php" method="post" enctype="multipart/form-data">


                  <div>
                    <?php
                    $email = $_SESSION['email'];
                    $img = "SELECT * from utilisateurs where email='$email'";
                    $que = mysqli_query($con, $img);
                    $row = mysqli_fetch_array($que);
                    ?>
                  </div><br><br>
                  <h1>
                    <input style="font-size:30px;margin:10px" name="nouv_nom" minlength="6" value="<?php echo $row['nom'];  ?>" required>
                  </h1>
              </div>
              <div class="panel-body">
                <div class="row">
                  <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" width="100px" height="100px" style="border-radius: 50%;float:left" src="<?php echo $row['avatar'] ?>" class="img-circle img-responsive"> </div>
                  <div class=" col-md-9 col-lg-9 ">
                    <table class="table table-user-information">
                      <tbody>
                        <tr>
                          <td>Department:</td>
                          <td><input type="text" value="<?php echo $row['filiere']; ?>"></td>
                        </tr>

                        <tr>
                          <td>Niveau</td>
                          <td><input type="text" value="<?php echo $row['niveau']; ?>"></td>
                        </tr>
                        <tr>
                          <?php if ($row['groupe'] != 0) { ?><td>Groupe</td>
                            <td><input type="text" value=" <?php echo $row['groupe']; ?>"></td>
                          <?php } ?>
                        </tr>
                        <tr>
                          <td>Email</td>
                          <td><a href="<?php echo $_SESSION['email']; ?>"><?php echo $_SESSION['email']; ?></a></td>
                        </tr>
                        <tr>
                          <td>Rôle</td>
                          <td><?php echo $row['type']; ?></td>
                        </tr>
                        <tr>
                          <td>Image</td>
                          <td> <input type="file" name="avatar"><br></td>
                        </tr>

                        <input type="hidden" name="nouv_type" value="<?php echo $row['type']; ?>">


                        <p>Ecole Polytechnique De Sousse</p>

                      </tbody>
                    </table>

                    <p><button style="margin:20px;width:90%" class="btn btn-sm btn-primary" type="submit" name="modifier">Modifier</button></p>

                    </form>
                    <?php if (isset($_POST['modifier'])) {
                      $nouv_nom = $_POST['nouv_nom'];
                      $nouv_type = $_POST['nouv_type'];
                      $email = $_SESSION['email'];
                      $v1 = rand(1111, 9999);
                      $v2 = rand(1111, 9999);
                      $v3 = $v1 . $v2;
                      $v3 = md5($v3);
                      if (isset($_FILES["avatar"]["name"]) && $_FILES["avatar"]["name"] != "") {
                        $Img = $_FILES["avatar"]["name"];
                        $destination = "./image/" . $v3 . $Img;
                        move_uploaded_file($_FILES["avatar"]["tmp_name"], $destination);
                      } else {
                        $destination = $row["avatar"];
                      }

                      if ($nouv_nom != "") {
                        $insert = mysqli_query($con, "UPDATE utilisateurs set nom='$nouv_nom', type='$nouv_type',avatar='$destination' where email='$email'");
                        if ($insert) {
                          echo ("<meta http-equiv = 'refresh' content='0;  URL =profile.php?successUpdate'/>");

                    ?> <?php }
                      }
                    }
                    if (isset($_GET['successUpdate'])) { ?>

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

                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
        </div>
    </body>


    </html>
  <?php } else echo "<h1 style='margin-top:200px;margin-left:500px'>vous n'avez pas le droit d'acceder à cette page</h1>"; ?>
  </main>