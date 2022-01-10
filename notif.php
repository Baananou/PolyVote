<?php $current = "Notif.php";

include('nav.php');
require_once("./utiles.php");
$type = $_SESSION["type"];
if ($_SESSION['type'] == "admin") { ?>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">*
        <link rel="stylesheet" href="assets/css/fontawesome.css">

        <title>Poly Vote | notifications </title>
        <style>
            .composant {
                margin-top: 3.5rem;
                display: grid;
                grid-gap: 2rem;
                grid-template-columns: 69% auto;

            }

            .case {
                background: #fff;
                border-radius: 10px;
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

            .accept {
                text-decoration: none;
                color: black;


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
            <span class="msg">Candidature acceptée</span>
            <div class="close-btn">
                <span class="fa fa-times"></span>
            </div>
        </div>
        <main>

            <div class="fix" style="z-index:0">

                <h2 style="color:grey; font-size:25px"><i class="fa fa-list" style="color: #00B4CC"> </i> Liste des notifications</h2><br>
                <div class="search">
                    <input onkeyup="Search()" class="searchTerm" type="text" placeholder="Recherche..." id="input" aria-label="Search">
                    <span id='btn' class="searchButton" id="basic-addon1"><a><i class="fa fa-search"></i></a></span>
                </div>
            </div><br><br>
            <!-- Grid column -->

            <!-- Grid row -->
            <!--Table-->
            <div class="tableFixHead" style="height:400px">
                <table class="fl-table" style="overflow-y:scroll;;height:100px;">
                    <!--Table head-->
                    <thead>
                        <tr>
                            <th>Emetteur</th>
                            <th>Sujet</th>
                            <th>Action</th>
                        </tr>
                    </thead>
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
                $array = runQuery("SELECT * from notification where recepteur like '$type' and id_cand!='' ");
                if (!empty($array)) {
                    foreach ($array as $key => $value) {

                ?>
            <tbody>
                <tr class="data">
                    <td><?php $nom = GetUserById($array[$key]['emetteur']);
                        echo $nom["nom"];  ?></td>
                    <input type="hidden" name="delete_id1" value="<?php echo $array[$key]["id_cand"]; ?>">

                    <td><?php echo $array[$key]['sujet']; ?></td>
                    <input type="hidden" class="delete_id_value1" value="<?php echo $array[$key]["id_cand"]; ?>">

                    <td><a class="accept" name="accept" href='?OK="<?php echo $array[$key]['id_cand'] ?>"'><i class="fa fa-check" style="color: green;"> </i> </a>&nbsp; <a class="refuse" href='?NOTok="<?php echo $array[$key]['id_cand'] ?>"' name="refuse"><i class="fa fa-times" style="color: red;"> </i></a></td>
                </tr>
            </tbody>
    <?php }
                } ?>
    </table>
    <?php
    if (isset($_POST["delete_btn_set1"])) {
        $id = $_POST["delete_id1"];
        mysqli_query($con, "DELETE FROM notification where id_cand=$id");
        mysqli_query($con, "DELETE FROM candidature where id=$id");
    } else if (isset($_GET["OK"])) {
        $id = $_GET["OK"];
        mysqli_query($con, "DELETE FROM notification where id_cand=$id");
        mysqli_query($con, "UPDATE candidature SET status='confirme' where  id=$id");
        echo ("<meta http-equiv = 'refresh' content='0;  URL =?Confirmée'/>");
    }
    ?>
    <?php if (isset($_GET['Confirmée'])) { ?>
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

    <!--Table body-->

    <!--Table-->

<?php } else echo "<h1 style='margin-top:200px;margin-left:500px'>vous n'avez pas le droit d'acceder à cette page</h1>"; ?>


    </body>
    </main>
    <?php include('footer.php'); ?>

    </html>