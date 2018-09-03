<?php
    require('./crud/config.php');
    require('./crud/crud.php');
?>
<!doctype <!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cadastro de Música</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="./bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" media="screen" href="./css/index.css" />
</head>

<body background='./img/fundo.png'>
    <header>
        <nav class="navbar-dark bg-dark">
            <div class="">
                <div class="alinhaTitulo">
                        <label class="titulo">REPERTÓRIO</label>
                </div>
            </div>
        </nav>
    </header>

    <div class="container">
        <div class="alinhaConteudoInput">
            <input type="text" class="form-control" id='inputSearch' placeholder="Pesquise aqui" />
            <button type="submit" class="btn btn-outline-primary" id="botoes"><i class="fa fa-search" ></i>Pesquisar</button>
            <button type="submit" class="btn btn-outline-success" id="botoes"><i class="fa fa-plus" ></i>Adicionar</button>
        </div>
    </div>

    <div class="container" id="tabela">
        <table class="table table-striped table-dark" >
            <thead>
                <tr>
                    <td align='center'>#</td>
                    <td align='center'>Música</td>
                    <td align='center'>Tom</td>
                    <td align='center'>Autor</td>
                    <td align='center' colspan=2>Ações</td>
                </tr>
            </thead>
            <tbody>
                <?php
                    $musicas = consultar("musicas");
                    foreach($musicas as $musica){
                ?>
                <tr>
                    <td><?php echo $musica["Id"]?> </td>
                    <td><?php echo $musica["musica"]?> </td>
                    <td><?php echo $musica["tom"]?> </td>
                    <td><?php echo $musica["autor"]?> </td>
                    <td align='center'><button class='btn btn-outline-warning' ><i id ='btnTabela' class="fa fa-pencil"></i>Editar</button></td>
                    <td align='center'><button class='btn btn-outline-danger' ><i id='btnTabela' class="fa fa-trash"></i>excluir</button></td>
                </tr>
                    <?php }?>
            </tbody>

        </table>
    </div>


    <script src="./bootstrap/jQuery/jquery.min.js"></script>
    <script src="./bootstrap/js/bootstrap.min.js"></script>
</body>

</html>