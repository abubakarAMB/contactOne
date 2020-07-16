<?php

include "db.php";

if (isset($_GET["id"]) &&  !empty($_GET["id"])) {
    
    $id = $_GET["id"];

    $sql = "SELECT * FROM users WHERE id = ".$id;

    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
      
         $delete_sql = "DELETE FROM users WHERE id = ".$id;

        if ($conn->query($delete_sql) === TRUE) {
            header("location: index.php?message=record deleted successfully!");
        }else {
            header("location: index.php?message=fail to delete record");
        }


    }else {
        header("location: index.php");

    }
  


}else {
    header("location: index.php");
}




?>