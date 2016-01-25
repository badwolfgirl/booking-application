<?php

include('includes/dbConnect.php');
include('includes/dbClass.php');
$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE);
$db->connect(true);

?>