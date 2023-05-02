<?php

require('models/Model.php');
require('models/Produto.php');

$id = $_POST['id'];
$nome = $_POST['nome'] ?? false;
$preco = $_POST['preco'] ?? false;

if (!$nome || !$preco){
    //Não mostra erro na tela
    // O usuário que aprenda a preencher os campos
    echo 'erro 😱😱😱';
    die;
}


$prod = new Produto();
$prod->update([
    'nome'=>$nome,
    'preco'=>$preco,
],$id);


header('location:/produtos');
die;