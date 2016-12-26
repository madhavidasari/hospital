<?php

include_once 'db_connect.php';
if(isset($_GET['id']) && !empty($_GET['id'])){
    $sql = "delete from departments where id='" . $_GET["id"] . "'";
        $rs = mysql_query($sql, $conn);
        if ($rs === TRUE) {
            header('Location: deleteDepartment.php?msg=Department Deleted Succesfully');
        }else {
            header('Location: deleteDepartment.php?msg=Something Went Wrong while Deleting Department');
        }
}else{
    header('Location: deleteDepartment.php?msg=Something Went Wrong while Deleting Department');
}
