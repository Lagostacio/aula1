<?php
require('./models/Model.php');
require('./models/Produto.php');

$nome = $_POST['nome'] ?? false;
$preco = $_POST['preco'] ?? false;

if (!$nome || !$preco){
    header('location:/novo_produto');
    die;
}


$prod = new Produto();
$prod->create([
    "nome"=>$nome,
    "preco"=>$preco
]);

header('location:/produtos');
die;