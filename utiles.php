<?php

function connect(){
        $connect = mysqli_connect('localhost', 'root', '') or die(mysqli_error($connect));
        mysqli_select_db($connect, 'polytechnique');
    return $connect;}

$connect=connect();
    function GetUserById($id){
        $connect=connect();
        $user=mysqli_fetch_array(mysqli_query($connect,"SELECT * from utilisateurs where id=$id"));
        return $user;
    }

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
if(isset($_POST["query"])){
    $query=$_POST["query"];
    if($query=="notif"){
        $type=$_POST["type"];
        $num=mysqli_num_rows(mysqli_query($connect,"SELECT * from notification where recepteur like '$type'"));
        echo $num;
    }
}