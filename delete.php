<?php
include "databaseConnect.php";

$id=$_GET["id"];
$query ="DELETE FROM lesnotes WHERE ID = $id;";
$result = mysqli_query($conn, $query);

header("Location: ./index.php");