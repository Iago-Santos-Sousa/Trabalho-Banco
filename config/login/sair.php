<?php
include_once("../conn.php");

// unset($_SESSION["id"]);
// unset($_SESSION["email"]);
session_destroy();
// header("Location: ". "../../index.php");
header("Location: ". "../../homeSistema.php");


?>