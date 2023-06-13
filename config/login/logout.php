<?php
include_once("../conn.php");
unset($_SESSION["id_usuarios"]);
unset($_SESSION["email"]);
unset($_SESSION["senha"]);
unset($_SESSION['loggedin']);
session_destroy();
header("Location: ". "../../index.php");
?>