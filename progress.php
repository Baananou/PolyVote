<?php
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
if ($_GET["query"] == "progres") {
    if (!empty($row)) {
          foreach ($row as $kk => $vv) { 
            $id_cnn = $row[$kk]['id']; 

    $array = runQuery("SELECT nom_choix FROM `resultat` Where id_cond=$id_cnn");
    $total=runQuery("SELECT * FROM resultat where id_cond=$id_cnn");
    $total_count=mysqli_num_rows($connect,$total);
    $num = mysqli_num_rows($connect,$array);    
            $pourcentage = ($num / $total_count * 100);
            echo '  <div class="data3">';
            echo '<div class="progress">';
            echo ' <div class="progress-bar bg-gradient-success" role="progressbar" style="width:' . $pourcentage . '%;height:10px;font-size:10px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>';          
            echo '</div>';
            echo ' <p style="font-size:10px">' . (int)$pourcentage . '%</p>';
            echo "</div>";   
 } }}?>