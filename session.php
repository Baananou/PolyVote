<?php if ($_GET["query"] == "session") {
    session_start();
    if ($_SESSION['type'] != "admin") {
        $session = $_GET["activity"];
        // update last activity time stamp
        if (time() - $session > 900) {

            $id = $_SESSION['id'];
            echo "logout.php?Session_Expired=$id";
        }
    }
} ?>