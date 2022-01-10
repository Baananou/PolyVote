<?php

$current = "ListeDesCandidatures.php";
include_once("nav.php");
require_once("utiles.php");

if ($_SESSION["type"] == "admin") {
?>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PolyVote | Liste des candidatures</title>
        <style>
            body {
                overflow: hidden;
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
                /* Hidden by default */
                position: fixed;
                /* Stay in place */
                z-index: 1;
                /* Sit on top */
                padding-top: 100px;
                /* Location of the box */
                left: 0;
                top: 0;
                width: 100%;
                /* Full width */
                height: 100%;
                /* Full height */
                overflow: auto;
                /* Enable scroll if needed */
                background-color: rgb(0, 0, 0);
                /* Fallback color */
                background-color: rgba(0, 0, 0, 0.4);
                /* Black w/ opacity */
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
        </style>
    </head>

    <body>
        <main>
            <br>
            <br>

            <div class="fix" style="z-index:0">
                <h2 style="color:grey; font-size:25px;padding:20px"><i class="fa fa-list" style="color: #00B4CC"> </i> Liste des candidatures</h2>
         <div class="search">
                    <input onkeyup="Search()" class="searchTerm" type="text" placeholder="Recherche..." id="input" aria-label="Search">
                    <span id='btn' class="searchButton" id="basic-addon1"><a><i class="fa fa-search"></i></a></span>
                </div>
                <div class="tableFixHead" style="height:400px">
                    <table class="fl-table" style="overflow-y:scroll;height:400px;">
                        <!--Table head-->
                        <thead>
                            <tr>
                                <th>Titre</th>
                                <th>Ajoutée par</th>
                                <th>date ouverture</th>
                                <th>date fermeture</th>
                                <th>les choix</th>
                                <th>status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                </div>
            </div>
            <!--Table head-->
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



                $array = runQuery("SELECT * from candidature ORDER BY id ASC");
                if (!empty($array)) {
                    foreach ($array as $key => $value) {
                        $nom = GetUserById($array[$key]["ajoute_par"]);
                ?>
                        <tr class="data" >
                            <td><?php echo $array[$key]["titre"] ?></td>
                            <td><?php echo $nom["nom"]  ?></td>
                            <td><?php echo $array[$key]["date_ouv"]; ?></td>
                            <td><?php echo $array[$key]["date_ferm"]; ?> </td>
                            <td><?php echo $array[$key]["choix"]; ?> </td>
                            <td><?php echo $array[$key]["status"]; ?> </td>
                            <input type="hidden" name="delete_id" value="<?php echo $array[$key]["id"]; ?>">
                            <td>
                                <?php if ($array[$key]["status"] == "confirme") { ?>
                                    <form method="post" action="">
                                        <div>

                                            <input type="hidden" class="delete_id_value" value="<?php echo $array[$key]["id"]; ?>">
                                            <a href="javascripit:void(0)" style=" cursor:pointer;" type="submit" class="delete_btn_ajax" value="delete" formaction="?id=<?php echo $array[$key]['id']; ?>"><i class="fa fa-times" style="color: red;"> </i>
                                            </a>

                                        </div>
                                    </form>
                                    <!---->
                                    </a>
                                <?php } else { ?>
                                    -----
                            </td>
                        <?php } ?>

                        </td>
                        </tr>

                <?php }
                } ?>
            </tbody>
            <!--Table body-->
            </table>
            <?php

            $connect = connect();
            if (isset($_POST["delete_btn_set"])) {

                $idn = $_POST["delete_id"];
                $sql = "DELETE FROM utilisateurs where id='$idn'";
                $res = mysqli_query($connect, $sql);
            } elseif (isset($_GET["Confirm"])) {
                $idn = $_GET["Confirm"];
                mysqli_query($connect, "UPDATE candidature set status='confirme' where id=$idn");
                echo ("<meta http-equiv='refresh' content='0;  URL =?BienConfirmé'/>");
            }
            ?>
            <div id="myModalEDIT" class="modal" style="z-index: 9999999999999999999999999;">

                <!-- Modal content -->
                <?php

                if (isset($_GET['EDIT'])) {
                    $id = $_GET['EDIT'];

                    $query = "SELECT * from utilisateurs where id=$id";
                    $rslt = mysqli_query($connect, $query);
                    $row = mysqli_fetch_array($rslt);
                }


                ?>

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
                    if ($email != $row["email"]) {
                        echo ("<meta http-equiv='refresh' content='0;  URL =ListeDesComptes.php?Exist'/>");
                    } else {
                        $sql = mysqli_query($connect, "UPDATE utilisateurs set email='$email',nom='$nom',type='$type',password='$hash',niveau='$niveau',filiere='$filiere',groupe=$groupe where id='$idn'");
                    }
                    if ($sql) {
                        echo ("<meta http-equiv='refresh' content='0;  URL =ListeDesComptes.php?EditSuccess'/>");
                    } else echo mysqli_error(($connect));
                } ?>
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
    </main>

    </html>

<?php
    include('footer.php');
 ?>