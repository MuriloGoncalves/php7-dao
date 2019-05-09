<?php

require_once("config.php");
//carrega 1 usuario
//$root = new Usuario();
//$root->loadById(1);
//echo $root;

//Carrega uma lista de usuarios
//$lista = Usuario::getList();
//echo json_encode($lista)

//Carrega uma lista de ususarios buscando pelo Login
//$search = Usuario::search("jo");
//echo json_encode($search);
//Carrega um usuario usando login e senha

$ususario = new Usuario();
$ususario->login("user","123");

echo $ususario;

?>