<?php

    require('twig_carregar.php');
    require('pdo.inc.php');
    require('mailer.inc.php');

    //mensagem de erro
    $msg = '';

    //rotina de POST - Recuperar senha
if ($_SERVER['REQUEST_METHOD']=='POST'){

    $username = $_POST['username'] ?? false;

    $sql = $pdo->prepare("SELECT * FROM usuarios WHERE username = ?");
    $sql->execute([$username]);

    // se encontrou o usuário
    if ($sql->rowCount()){
        // aqui fica a rotina de recuperar senha
        //pega o id do usuario
        $usuario = $sql->fetch(PDO::FETCH_ASSOC);

        // gera um token aleatorio
        $token = uniqid(null, true) . bin2hex(random_bytes(16));
        
        //grava o token para o usuário no banco
        $sql = $pdo->prepare('UPDATE usuarios SET recupera_token = :token WHERE id = :id_usr');
        $sql->execute([
            ':token' => $token,
            ':id_usr' => $usuario['id']
        ]);
        $msg = 'vai lá olhar o teu e-mail';

        echo $twig->render('email_recupera_senha.html',[
            'token' => $token
        ]);
        die;

    } else{
        $msg = 'Usuário não encontrado. Tu bebeu? >//<';
    }

}


    echo $twig->render('recuperar_senha.html',[
        'msg' => $msg,
    ]);

