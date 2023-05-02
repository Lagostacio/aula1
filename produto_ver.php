<?php
require('verifica_Login.php');
require('twig_carregar.php');


require('models/Model.php');
require('models/Produto.php');

$id = $_GET['id'] ?? false;

$prod = new produto();
$info = $prod->getById($id);

echo $twig->render("produto_ver.html",[
    'produto'=>$info,
]);