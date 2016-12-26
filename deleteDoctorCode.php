<?php

include_once 'db_connect.php';
if(isset($_GET['id']) && !empty($_GET['id'])){
    $sql = "delete from doctors where id='" . $_GET["id"] . "'";
        $rs = mysql_query($sql, $conn);
        if ($rs === TRUE) {
            header('Location: deleteDoctor.php?msg=Doctor Deleted Succesfully');
        }else {
            header('Location: deleteDoctor.php?msg=Something Went Wrong while Deleting Doctor');
        }
}else{
    header('Location: deleteDoctor.php?msg=Something Went Wrong while Deleting Doctor');
}
