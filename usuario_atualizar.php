<?php

require('models/Model.php');
require('models/Usuario.php');

$id = $_POST['id'];
$nome = $_POST['nome'] ?? false;
$email = $_POST['email'] ?? false;
$username = $_POST['username'] ?? false;

if (!$nome || !$email || !$username){
    //Não mostra erro na tela
    // O usuário que aprenda a preencher os campos
    die;
}


$usr = new Usuario();
$usr->update([
    'nome'=>$nome,
    'email'=>$email,
    'username'=>$username,
],$id);


header('location:mostra_usuarios.php');
die;