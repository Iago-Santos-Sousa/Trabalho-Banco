<?php
include_once("../conn.php");

unset($_SESSION["id_usuarios"]);
unset($_SESSION["email"]);
unset($_SESSION["senha"]);
session_destroy();
// header("Location: ". "../../index.php");
header("Location: ". "../../index.php");


?>