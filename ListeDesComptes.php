<?php

$current = "ListeDesComptes.php";
include_once("nav.php");
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
if ($_SESSION["type"] == "admin") {
?>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PolyVote | Liste des comptes</title>
        <style>
            body {
                overflow: hidden;
                font-size: 15px;
            }


            .table.table-bordered th {
                text-align: center;
            }

            td {
                text-align: center;
            }

            td button {
                background-color: transparent;
                border: none;
            }

            td button:focus {

                outline: none;
            }


            th {
                text-align: center;
            }

            .modal {
                display: none;
                position: fixed;
                z-index: 99999;
                padding-top: 100px;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
                overflow: auto;
                background-color: rgb(0, 0, 0);
                background-color: rgba(0, 0, 0, 0.4);
            }


            /* Modal Content */
            .fix {
                position: sticky;
                top: 0;
                background-color: white;
                z-index: 1;
            }

            .tableFixHead {
                overflow-y: auto;
                height: 500px;

            }

            .tableFixHead thead th {
                position: sticky;
                top: 0;
                z-index: 1;
                background-color: white;
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

            .modal-content1 {
                background-color: #f5f5f5;
                margin: auto;
                padding: 20px;
                border: 1px solid #888;
                width: 30%;
                height: auto;
                border-radius: 20px;
                transition: 0.8s all;
                margin-top: -95px;
                z-index: 99999999999999999999;
                animation: fadein 0.5s;

            }

            /* The Close Button */
            .close,
            .close1,
            .close2,
            .close3,
            .close4,
            .close5,
            .close6,
            .close7,
            .close8 {
                color: #aaaaaa;
                float: right;
                font-size: 28px;
                font-weight: bold;
            }

            .close:hover,
            .close:focus {
                color: #000;
                text-decoration: none;
                cursor: pointer;
            }

            .close1:hover,
            .close1:focus {
                color: #000;
                text-decoration: none;
                cursor: pointer;
            }

            .close2:hover,
            .close2:focus,
            .close3:hover,
            .close3:focus,
            .close4:hover,
            .close4:focus,
            .close5:hover,
            .close5:focus,
            .close6:hover,
            .close6:focus,
            .close7:hover,
            .close7:focus,
            .close8:focus,
            .close8:hover {
                color: #000;
                text-decoration: none;
                cursor: pointer;
            }




            .modal.user {
                width: 90%;
                max-width: 340px;
                margin: auto;
            }

            .modal .user__header {
                text-align: center;
                opacity: 1;


            }

            .modal .user__title {
                font-size: 20px;
                margin-bottom: -10px;
                font-weight: 500;
                color: black;
                font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
            }

            .modal .form {
                border-radius: 8px;
                overflow: hidden;
                opacity: 1;



            }

            .modal .form--no {
                -webkit-animation: NO 1s ease-in-out;
                animation: NO 1s ease-in-out;
                opacity: 1;
                transform: translate3d(0, 0, 0);
            }

            .form__input {
                display: block;
                width: 100%;
                padding: 20px;
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                -webkit-appearance: none;
                border: 0;
                outline: 0;
                font-size: 15px;
                transition: 0.3s;
            }

            .modal .form__input:focus {
                background: #f7f7f7;
            }
            /* .btncon{
                display: flex;
                flex-wrap: nowrap;
                justify-content: center;
                align-items: center;
            } */

            .btn {
                display: block;
                width: 100%;
                padding: 10px;
                margin: auto;
                -webkit-appearance: none;
                outline: 0;
                border: #05324f 1px solid;
                color: #05324f;
                font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
                background-color: white;
                transition: 0.3s;
                font-size: 15px;
                border-radius: 8px;
            }

            .btn:hover {
                background: #05324f;
                cursor: pointer;
                color: white;
            }

            .form .btn {
                display: block;
                width: 50%;
                padding: 12px;
                margin: auto;

                -webkit-appearance: none;
                outline: 0;
                border: limegreen 1px solid;
                color: limegreen;
                font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
                background-color: white;
                transition: 0.3s;
                font-size: 15px;
                border-radius: 40px;
            }

            .from .btn:hover {
                background: limegreen;
                cursor: pointer;
                color: white;
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



            @keyframes slideLeft {
                0% {
                    transform: translateX(700px);
                }

                100% {
                    transform: translateX(0px);
                }
            }

            .table-wrapper {
                margin: 10px 70px 70px;
                box-shadow: 0px 35px 50px rgba(0, 0, 0, 0.2);
            }

            .fl-table {
                border-radius: 5px;
                font-size: 12px;
                font-weight: normal;
                border: none;
                border-collapse: collapse;
                width: 100%;
                max-width: 100%;
                white-space: nowrap;
                background-color: white;
            }

            .fl-table td,
            .fl-table th {
                text-align: center;
                padding: 8px;
            }

            .fl-table td {
                border-right: 1px solid #f8f8f8;
                font-size: 12px;
            }

            .fl-table thead th {
                color: #ffffff;
                background: #4FC3A1;
            }


            .fl-table thead th:nth-child(odd) {
                color: #ffffff;
                background: #324960;
            }

            .fl-table tr:nth-child(even) {
                background: #F8F8F8;
            }

            /* Responsive */

            @media (max-width: 767px) {
                .fl-table {
                    display: block;
                    width: 100%;
                }

                .table-wrapper:before {
                    content: "Scroll horizontally >";
                    display: block;
                    text-align: right;
                    font-size: 11px;
                    color: white;
                    padding: 0 0 10px;
                }

                .fl-table thead,
                .fl-table tbody,
                .fl-table thead th {
                    display: block;
                }

                .fl-table thead th:last-child {
                    border-bottom: none;
                }

                .fl-table thead {
                    float: left;
                }

                .fl-table tbody {
                    width: auto;
                    position: relative;
                    overflow-x: auto;
                }

                .fl-table td,
                .fl-table th {
                    padding: 20px .625em .625em .625em;
                    height: 60px;
                    vertical-align: middle;
                    box-sizing: border-box;
                    overflow-x: hidden;
                    overflow-y: auto;
                    width: 120px;
                    font-size: 13px;
                    text-overflow: ellipsis;
                }

                .fl-table thead th {
                    text-align: left;
                    border-bottom: 1px solid #f7f7f9;
                }

                .fl-table tbody tr {
                    display: table-cell;
                }

                .fl-table tbody tr:nth-child(odd) {
                    background: none;
                }

                .fl-table tr:nth-child(even) {
                    background: transparent;
                }

                .fl-table tr td:nth-child(odd) {
                    background: #F8F8F8;
                    border-right: 1px solid #E6E4E4;
                }

                .fl-table tr td:nth-child(even) {
                    border-right: 1px solid #E6E4E4;
                }

                .fl-table tbody td {
                    display: block;
                    text-align: center;
                }
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
                z-index: 99999999999;
            }

            .alert1 {
                background: #ffdb9b;
                padding: 20px 40px;
                min-width: 420px;
                position: absolute;
                right: 0;
                bottom: 100px;
                border-radius: 4px;
                border-left: 8px solid #ffa502;
                overflow: hidden;
                opacity: 0;
                pointer-events: none;
                z-index: 99999999999;
            }

            .alert.showAlert {
                opacity: 1;
                pointer-events: auto;
            }

            .alert1.showAlert {
                opacity: 1;
                pointer-events: auto;
            }

            .alert.show {
                animation: show_slide 1s ease forwards;
            }

            .alert1.show {
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

            .alert1.hide {
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

            .alert1 .fa-exclamation-circle {
                position: absolute;
                left: 20px;
                top: 50%;
                transform: translateY(-50%);
                color: #ce8500;
                font-size: 30px;
            }

            .alert .msg {
                padding: 0 20px;
                font-size: 18px;
                color: #008000;
            }

            .alert1 .msg {
                padding: 0 20px;
                font-size: 18px;
                color: #ce8500;
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

            .alert1 .close-btn {
                position: absolute;
                right: 0px;
                top: 50%;
                transform: translateY(-50%);
                background: #ffd080;
                padding: 20px 18px;
                cursor: pointer;
            }

            .alert .close-btn:hover {
                background: #008000;
            }

            .alert1 .close-btn:hover {
                background: #ffc766;
            }

            .alert .close-btn .fa {
                color: #90EE90;
                font-size: 22px;
                line-height: 40px;
            }

            .alert1 .close-btn .fa {
                color: #ce8500;
                font-size: 22px;
                line-height: 40px;
            }
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
        <div class="alert1 hide">
            <span class="fa fa-exclamation-circle"></span>
            <span class="msg">E-mail Existant !</span>
            <div class="close-btn">
                <span class="fa fa-times"></span>
            </div>
        </div>
        <main>
            <!-- TABLE -->
            <div class="fix" style="z-index:0">

                <div class="tableFixHead" style="height:600px">
                    <h2 style="color:grey; font-size:25px;margin:20px"><i class="fa fa-user" style="color: #00B4CC"> </i> Liste des comptes</h2>
                    <div class="search">
                        <input onkeyup="Search()" class="searchTerm" type="text" placeholder="Recherche..." id="input" aria-label="Search">
                        <span id='btn' class="searchButton" id="basic-addon1"><a><i class="fa fa-search"></i></a></span>
                    </div>

                    <table class="fl-table" style="overflow-y:scroll;;height:400px;">
                        <!--Table head-->
                        <thead>
                            <tr>
                                <th>Email</th>
                                <th>Nom et Prenom</th>
                                <th>Type</th>
                                <th>Niveau</th>
                                <th>Filiere</th>
                                <th>Groupe</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                </div>
            </div>

            <!--Table body-->
            <tbody>
                <script>
                    function Search() {
                        var input = document.getElementById("input");
                        var filter = input.value.toLowerCase();
                        var element = document.getElementsByClassName('data');


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



                $array = runQuery("SELECT * from utilisateurs ORDER BY id ASC");
                if (!empty($array)) {
                    foreach ($array as $key => $value) {
                ?>
                        <tr class="data">
                            <td><?php echo $array[$key]["email"] ?></td>
                            <td><?php echo $array[$key]["nom"] ?></td>
                            <td><?php echo $array[$key]["type"]; ?></td>
                            <td><?php echo $array[$key]["niveau"]; ?> </td>
                            <td><?php echo $array[$key]["filiere"]; ?> </td>
                            <td><?php echo $array[$key]["groupe"]; ?> </td>
                            <input type="hidden" name="delete_id" value="<?php echo $array[$key]["id"]; ?>">

                            <td>
                                <form method="post" action="">
                                    <div class="btncon">
                                        <a id="EDIT" href="?EDIT=<?php echo  $array[$key]["id"] ?>" class="myBtn" style="cursor : pointer;" name="edit " id="EDIT" value="edit"><i class="fa fa-edit" style="color:green;width:20px;font-size: 20px"></i>
                                            <!---->
                                        </a>


                                        <input type="hidden" class="delete_id_value" value="<?php echo $array[$key]["id"]; ?>">
                                        <a href="javascripit:void(0)" style=" cursor:pointer;" type="submit" class="delete_btn_ajax" value="delete" formaction="?id=<?php echo $array[$key]['id']; ?>"><i class="fa fa-trash" style="color:red;width:20px;font-size:20px"></i>
                                        </a>


                                    </div>
                                </form>
                                <?php

                                $connect = mysqli_connect('localhost', 'root', '') or die(mysqli_error($connect));
                                mysqli_select_db($connect, 'polytechnique');
                                if (isset($_POST["delete_btn_set"])) {

                                    $idn = $_POST["delete_id"];
                                    $sql = "DELETE FROM utilisateurs where id='$idn'";
                                    $res = mysqli_query($connect, $sql);
                                }
                                ?>
                            </td>

                        </tr>


                <?php }
                } ?>
            </tbody>

            </table>
            </div>

        </main>
        <div id="myModalEDIT" class="modal">

            <!-- Modal content -->
            <?php

            if (isset($_GET['EDIT'])) {
                $id = $_GET['EDIT'];

                $query = "SELECT * from utilisateurs where id=$id";
                $rslt = mysqli_query($connect, $query);
                $row = mysqli_fetch_array($rslt);
            }


            ?>
            <div class="modal-content1">
                <span class="close7">&times;</span>
                <div class="user">
                    <div class="user__header">
                        <h1 class="">Modifier Compte</h1>
                    </div>
                    <hr>
                    <form class="form" action="" method="POST">
                        <div class="form__group" id="nom">
                            <label>Nom & Prénom</label>
                            <input type="text" name="nom" placeholder="Nom et prenom" class="form__input" value="<?php echo $row['nom']; ?>" required />
                        </div>
                        <div class="form__group" id="email">
                            <label>Email</label>
                            <input type="email" name="email" placeholder="email" class="form__input" value="<?php echo $row['email']; ?>" />
                        </div>
                        <div class="form__group" id="filiere">
                            <label>Filiere</label>
                            <input type="text" name="filiere" placeholder="filiere" class="form__input" value="<?php echo $row['filiere']; ?>" />
                        </div>
                        <div class="form__group" id="niveau">
                            <label>Niveau</label>
                            <input type="text" name="niveau" placeholder="niveau" class="form__input" value="<?php echo $row['niveau']; ?>" />
                        </div>
                        <div class="form__group" id="groupe">
                            <label>Groupe</label>
                            <input type="number" name="groupe" placeholder="groupe" class="form__input" value="<?php echo $row['groupe']; ?>" />
                        </div>

                        <div class="form__group">
                            <label for="">Mot de passe</label>

                            <input type="password" minlength="5" name="mdp" placeholder="Nouveau mot de passe" minlength="5" class="form__input" value="" />
                            <input type="hidden" value="<?php echo $row['password']; ?>" name="mdp2">

                        </div>


                        <div class="form__group">
                            <label for="">Type</label>

                            <select name="type" id="type" value="" class="form__input" required>
                                <option id="typeBase" value="<?php echo $row["type"] ?>"><?php echo $row["type"] ?></option>
                                <option id="" value="admin">admin</option>
                                <option id="" value="voteur">électeur</option>
                                <option id="" value="candidat">candidat</option>

                            </select>
                        </div>
                        <br>

                </div>
                <input type="hidden" name="id_usr" value="<?php echo $row["id"]; ?>">
                <button class="btn" name="editing" type="submit">Modifier </button>
                </form>
            </div>
        </div>
        <?php
        if (isset($_POST["editing"])) {
            $nom = $_POST["nom"];
            $email = $_POST["email"];
            $mdp = $_POST["mdp2"];
            $hash = $_POST["mdp2"];

            if (!empty($_POST["mdp"])) {
                $mdp = $_POST["mdp"];
                $hash = md5($mdp);
            }

            $type = $_POST["type"];
            $idn = $_POST["id_usr"];
            $groupe = $_POST['groupe'];
            $niveau = $_POST['niveau'];
            $filiere = $_POST['filiere'];
            if ($email != "") {
                $query = "SELECT * FROM utilisateurs where email like '$email'";
                $verif_email = mysqli_num_rows(mysqli_query($connect, $query));
            } else {
                $verif_email = 0;
            }
            // email Update !

            if ($verif_email == 1 && $email != $row["email"]) {
                echo "<meta http-equiv='refresh' content='0;  URL =ListeDesComptes.php?Exist'/>";
            } else {
                if ($sql = mysqli_query($connect, "UPDATE utilisateurs set email='$email',nom='$nom',type='$type',password='$hash',niveau='$niveau',filiere='$filiere',groupe=$groupe where id='$idn'")) {
                    echo "<meta http-equiv='refresh' content='0;  URL =ListeDesComptes.php?EditSuccess'/>";
                }
            }
        }
        ?>
        <?php if (isset($_GET['EditSuccess'])) { ?>
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
        <?php if (isset($_GET['Exist'])) { ?>
            <script>
                $('.alert1').addClass("show");
                $('.alert1').removeClass("hide");
                $('.alert1').addClass("showAlert");
                setTimeout(function() {
                    $('.alert1').removeClass("show");
                    $('.alert1').addClass("hide");
                }, 5000);

                $('.close-btn').click(function() {
                    $('.alert1').removeClass("show");
                    $('.alert1').addClass("hide");
                });
            </script>
        <?php } ?>
        <script>
            var modal6 = document.getElementById("myModalEDIT");
            var span6 = document.getElementsByClassName("close7")[0];

            <?php if (isset($_GET["EDIT"])) { ?>
                modal6.style.display = "block";
                span6.onclick = function() {

                    modal6.style.display = "none";
                }
            <?php } ?>

            // Get the button that opens the modal
            var btn6 = document.getElementById("EDIT");

            // Get the <span> element that closes the modal

            // When the user clicks the button, open the modal 
            btn6.onclick = function() {
                modal5.style.display = "block";
            }

            // When the user clicks on <span> (x), close the modal
            span6.onclick = function() {

                modal6.style.display = "none";
            }

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
                if (event.target == modal6) {

                    modal6.style.display = "none";

                }
            }
        </script>

    <?php } else echo "<h1 style='margin-top:200px;margin-left:500px'>vous n'avez pas le droit d'acceder à cette page</h1>"; ?>

    </body>

    </html>
    <?php include('footer.php'); ?>