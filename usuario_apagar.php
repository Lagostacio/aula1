<?php

require('twig_carregar.php');
require('pdo.inc.php');

//rotina de POST - apagar o usuario

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // modifica o usuário para ativo = 0
    $id = $_POST['id'] ?? false;
    if($id){
        $sql = $pdo->prepare('update usuarios set ativo = 0 where id = ?');
        $sql->execute([$id]);
        
    }

    header('location: mostra_usuarios.php');
    die;

}





// rotina de GET - mostrar informações na tela
$id = $_GET['id'] ?? false;
$sql = $pdo->prepare("select * from usuarios where id = ?");
$sql->execute([$id]);
$usuario = $sql->fetch(PDO::FETCH_OBJ);

echo $twig->render("usuario_apagar.html",[
    'usuario' => $usuario,
]);

