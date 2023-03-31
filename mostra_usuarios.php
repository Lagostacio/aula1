<?php
require('verifica_Login.php');
require('twig_carregar.php');


require('models/Model.php');
require('models/Usuario.php');

$usr = new Usuario();
$usuarios = $usr->getAll();

echo $twig->render("mostra_usuarios.html",[
    'usuarios' => $usuarios,
]);