<?php
//arquivo que faz a conexão com o banco de dados
//PDO = PHP Data Object
//traz o orientado a objetos para o PHP


$pdo = new PDO("mysql:host=localhost;dbname=meugarcon", "root", "");
if (!$pdo) {
	die('Erro ao criar conexao');
}
?>
