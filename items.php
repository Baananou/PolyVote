<?php
$connect = mysqli_connect('localhost', 'root', '') or die(mysqli_error($connect));
mysqli_select_db($connect, 'polytechnique');
$temp = date('Y-m-d | H:i', strtotime("+1 hours"));

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


if ($_GET["query"] == "progres") {

}
?>