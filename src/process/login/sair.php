<?php
session_start();
include_once("../../../config/conn.php");

unset($_SESSION['emailUsuario']);
unset($_SESSION['senhaUsuario']);
header("Location: ". "../../../index.php");


?>