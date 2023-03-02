<?php

$user = $_POST['user'];
$pass = $_POST['pass'];

echo $user.$pass;

if($user == 'inacio' && $pass == '123'){
    // login feito com sucesso
    header('location:boasvindas.php');
    die;
} else{
    // falha no login
    header('location:login.php?erro=1');
    die;
}