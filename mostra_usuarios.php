<?php
require('verifica_Login.php');
require('twig_carregar.php');
require('pdo.inc.php');

$sql = $pdo->query("select * from usuarios where ativo = 1");
$usuarios = $sql->fetchAll(PDO::FETCH_CLASS);

echo $twig->render("mostra_usuarios.html",[
    'usuarios' => $usuarios,
]);