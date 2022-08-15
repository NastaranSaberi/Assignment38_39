<?php

    include "Model/database.php";

        
    $caption = $_POST["caption"];
    $user_id = $_SESSION["user_id"];
    $media = $_SESSION["media"];

 
    $db->query("UPDATE posts SET media = '$media',caption = '$caption',user_id = '$user_id' WHERE id = $id ");
       

    header("Location: profile");


  
?>