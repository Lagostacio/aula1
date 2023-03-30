<?php
require('verifica_Login.php');
require('twig_carregar.php');


require('models/Model.php');
require('models/Usuario.php');

$usr = new Usuario();
var_dump($usr);

echo $twig->render("mostra_usuarios.html",[
    'usuarios' => $usuarios,
]);