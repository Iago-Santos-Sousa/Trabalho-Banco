<?php
session_start();
include_once("./src/process/conn.php");
unset($_SESSION['emailUsuario']);
unset($_SESSION['senhaUsuario']);
header("Location: ". "../../../index.php");


?>