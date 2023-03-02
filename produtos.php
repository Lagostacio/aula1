<?php
    # produtos.php
    require('twig_carregar.php');

    $template = $twig->load("produtos.html");

    $produtos = [
        [
            'nome' => 'Chinelo',
            'preco' => 30,
        ],
        [
            'nome' => 'Camiseta',
            'preco' => 50,
        ],
        [
            'nome' => 'Boné',
            'preco' => 39.9,
        ],
        [
            'nome' => 'Batmóvel',
            'preco' => 3696969,
        ],
    ];

    echo $template->render([
        'title' => 'Produtos',
        //'produtos' => $produtos,
        'produtos' => null,
    ]);