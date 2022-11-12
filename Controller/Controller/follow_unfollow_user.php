<?php

include "Model/database.php";

$user_id_follow= $_POST["user_id_follow"];
$user_id = $_SESSION["user_id"];

$count = $db->query("SELECT * FROM follows WHERE followings_id = $user_id_follow AND followers_id = $user_id")->num_rows;
if($count == 0)
{
    $db->query("INSERT INTO follows(followings_id, followers_id) VALUES($user_id_follow, $user_id)");
}
else
{
    $db->query("DELETE FROM follows WHERE followings_id = $user_id_follow AND followers_id = $user_id");
  
}

?>
