<?php
require('verifica_Login.php');
require('twig_carregar.php');


require('models/Model.php');
require('models/Usuario.php');

$id = $_GET['id'] ?? false;

$usr = new Usuario();
$info = $usr->getById($id);

echo $twig->render("usuario_ver.html",[
    'usuario'=>$info,
]);