<?php

require('pdo.inc.php');

$nome = $_POST['nome'] ?? false;
$email = $_POST['email'] ?? false;
$user = $_POST['user'] ?? false;
$pass = $_POST['pass'] ?? false;
$admin = $_POST['admin'] ?? false;
$ativo = 1;

if (!$user || !$pass){
    header('location:novo_usuario.php');
    die;
}

$pass = password_hash($pass,PASSWORD_BCRYPT);

$sql = $pdo->prepare("insert into usuarios (nome, email, username, senha, admin, ativo)
 values (:nome, :email, :user, :pass, :adm, :ativo);");

$sql->bindParam(":nome",$nome);
$sql->bindParam(":email",$email);
$sql->bindParam(":user",$user);
$sql->bindParam(":pass",$pass);
$sql->bindParam(":adm",$admin);
$sql->bindParam(":ativo",$ativo);

$sql->execute();