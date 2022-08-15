<?php

    include "Model/database.php";

    $post_id = $_POST["post_id"];

    $db->query("DELETE FROM posts WHERE id = $post_id");

?>