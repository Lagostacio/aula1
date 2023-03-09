<?php

require('pdo.inc.php');

$user = $_POST['user'];
$pass = $_POST['pass'];

// prepara os dados da consulta
$sql = $pdo->prepare('select * from usuarios where username = :user and senha = :pass ');

//adiciona os dados na consulta
$sql->bindParam(":user",$user);
$sql->bindParam(":pass",$pass);

//roda a consulta
$sql->execute();

// se encontrou o usuario
if($sql->rowCount()){
    // login feito com sucesso

    $user = $sql->fetch(PDO::FETCH_OBJ);


    //cria uma sessão para armazenar o usuário
    session_start();
    $_SESSION['user'] = $user->nome;

    // Redireciona o usuário
    header('location:boasvindas.php');
    die;
    
} else{
    // falha no login
    header('location:login.php?erro=1');
    die;
}