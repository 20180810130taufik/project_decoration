<?php 
session_start();

include "../koneksi.php";

function getdata($conn,$query){
    $data = mysqli_query($conn,$query);
    if (mysqli_num_rows($data) > 0) {
        while($row = mysqli_fetch_assoc($data)){
            $hasil[] = $row;
        }
        return $hasil;
    }
}

function execute($conn,$query){
    $db = mysqli_query($conn,$query);

    if($db){
        return 1;
    } else{
        return 0;
    }
}



function get_by_id($conn,$query){
    $db = mysqli_query($conn,$query);
    return mysqli_fetch_assoc($db);
}

function delete($where,$table,$redirect){
    $query = 'DELETE FROM ' . $table . ' WHERE ' . $where;
    echo $query;
}

?>