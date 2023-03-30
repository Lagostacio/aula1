<?php

function verifica_nome_arquivo($caminho,$arquivo){
    // não existe, pode confiar!
    if (!file_exists($caminho . $arquivo)){
        return $arquivo;
    }

    // Vish... O arquivo existe!
    $separado = explode('.',$arquivo);
    $ext = array_pop($separado);
    $arquivo = implode('.',$separado);

    $i = 1;
    while(file_exists("{$caminho}{$arquivo}{$i}.{$ext}")){
        $i++;
    }

    return "{$arquivo}{$i}.{$ext}";
}
