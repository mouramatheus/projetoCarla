<?php 

//definindo constantes
define("INCLUDE_PATH",'localhost'.DIRECTORY_SEPARATOR.'cirurgias/');

$pdo = new PDO('mysql:host=localhost;dbname=projetoCarla', 'root', '');

if(!isset($pdo)){
	echo "Erro na conexão com o banco de dados";
}

//Indica que vai ser usada a sessão
session_start();


?>