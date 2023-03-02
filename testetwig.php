<?php
    //testetwig.php
    require('twig_carregar.php');
    
    $template = $twig->load('teste.html');



    echo $template->render([
        'nome' => 'Inácio',
        'idade' => 18,
        'title' => 'Bom Day'
    ]);
