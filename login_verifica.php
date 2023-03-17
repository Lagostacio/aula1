<?php

require('pdo.inc.php');

$user = $_POST['user'];
$pass = $_POST['pass'];

// prepara os dados da consulta
$sql = $pdo->prepare('select * from usuarios where username = :user AND ativo = 1');

//adiciona os dados na consulta
$sql->bindParam(":user",$user);

//roda a consulta
$sql->execute();

// se encontrou o usuario
if($sql->rowCount()){
    // login feito com sucesso

    $user = $sql->fetch(PDO::FETCH_OBJ);

    //verificar se a senha está correta
    if(!password_verify($pass,$user->senha)){
        
        // falha no login
        header('location:login.php?erro=1');
        die;
        
    }


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