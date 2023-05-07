<?php
// session_start();
include_once("../conn.php");

unset($_SESSION['emailUsuario']);
unset($_SESSION['senhaUsuario']);
unset($_SESSION['nomeUsuario']);
unset($_SESSION['sobrenomeUsuario']);
unset($_SESSION['confirmarsenha']);
session_destroy();
header("Location: ". "../../index.php");


?>