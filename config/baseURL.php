<?php
// Obtém o protocolo (http ou https)
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
echo $protocol."<br>";

// Obtém o nome do host
$host = $_SERVER['HTTP_HOST'];
echo $host."<br>";

// Obtém o caminho do arquivo atual
$path = $_SERVER['PHP_SELF'];
echo $path."<br>";

// Remove o nome do arquivo atual do caminho
$basePath = dirname($path);
echo $basePath."<br>";

// Cria a base URL concatenando o protocolo, host e caminho base
$baseUrl = $protocol . '://' . $host . $basePath . '/';
echo $baseUrl;








?>