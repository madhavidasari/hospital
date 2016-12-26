<?php

include_once 'db_connect.php';
if(isset($_GET['id']) && !empty($_GET['id'])){
    $sql = "delete from tests where id='" . $_GET["id"] . "'";
        $rs = mysql_query($sql, $conn);
        if ($rs === TRUE) {
            header('Location: deleteTest.php?msg=Test Deleted Succesfully');
        }else {
            header('Location: deleteTest.php?msg=Something Went Wrong while Deleting Test');
        }
}else{
    header('Location: deleteTest.php?msg=Something Went Wrong while Deleting Test');
}
