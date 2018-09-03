<?php
    require('../crud/config.php');
    require('../crud/crud.php');
    
    $nomeMusica = $_POST ["nomeMusica"];
    $tomMusica = $_POST ["tomMusica"];
    $autorMusica= $_POST ["autorMusica"];

    $dados = array("musica"=>$nomeMusica,
                   "tom"=>$tomMusica,
                   "autor"=>$autorMusica);

    inserir("musicas", $dados);
?>