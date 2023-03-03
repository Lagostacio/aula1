<?php

$user = $_POST['user'];
$pass = $_POST['pass'];

echo $user.$pass;

if($user == 'inacio' && $pass == '123'){
    // login feito com sucesso

    //cria uma sessão para armazenar o usuário
    session_start();
    $_SESSION['user'] = 'Inacio';

    // Redireciona o usuário
    header('location:boasvindas.php');
    die;
    
} else{
    // falha no login
    header('location:login.php?erro=1');
    die;
}