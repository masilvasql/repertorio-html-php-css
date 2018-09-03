<?php
    
    function abreConexao(){
        $conexao = @mysqli_connect(SERVIDOR, USUARIO, SENHA, BANCO) or die("ERRO AO ABRIR CONEXAO");
        @mysqli_set_charset($conexao,CHARSET);
        return $conexao;
    }
    
    function fechaConexao($conexao){
        @mysqli_close($conexao) or die ("FALHA AO FECHAR CONEXÃO");
    }

    function executar($sql){
        $conexao = abreConexao();
        $qry = @mysqli_query($conexao, $sql) or die ("ERRO AO EXECUTAR FUNÇÃO EXECUTAR - CRUD");

        fechaConexao($conexao);
        return $qry;
    }

    function consultar($tabela, $condicao = null, $campos = "*"){
        $sql = "SELECT {$campos} FROM {$tabela}  {$condicao}";
        $query = executar($sql);
        if(!mysqli_num_rows($query))
            return false;
        else{
            while($linha = @mysqli_fetch_assoc($query)){
                $dados[] = $linha;
            }
            return $dados;
        }       
    }


    function inserir($tabela, array $dados){
        
        $campos = implode(", ",array_keys($dados));
        $valores = "'".implode("', '",$dados)."'";
        $sql = "INSERT INTO $tabela ({$campos}) values ({$valores})";
        return executar($sql);
    }

    function alterar($tabela, array $dados, $condicao){
        foreach($dados as $chave => $valor)
            $campos[] = "${chave} = '${chave}' ";

        $campos = implode(", ",$campos);
        $sql = "update ${tabela} SET ${campos} where ${condicao}";
        return executar($sql);
    }

    function deletar($tabela, $condicao){
        $sql = "DELETE FROM $tabela WHERE {$condicao}";
        return executar($sql);
    }
?>