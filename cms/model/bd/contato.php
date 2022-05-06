<?php
/**************************************************************************
 * Objetivo: responsavel de manipular os dados dentro   BD 
 *              (insert,update,select e delete)
 * 
 * Autor: Leonardo
 * Data:07/04/2022
 * Versão: 1.0
 * 
 *************************************************************************/


 //import 

 require_once('conexaoMySql.php');

 //funcao para realizar o insert no BD
 function insertContato($dadosContato){

    //abrindo conexao com bd
    $conexao = conexaoMysql();
    $sql ="insert into tblcontatos
        (nome,
        email,
        celular,
        message)
    values
    ('".$dadosContato["nome"]."',
    '".$dadosContato["email"]."',
    '".$dadosContato["celular"]."',
    '".$dadosContato["message"]."');";

    //executa o Script no BD
        //validação para verificar se o script sql esta correto
    
    if(mysqli_query($conexao, $sql)){
        //validação para ver se a linha foi gravada no bd
        if(mysqli_affected_rows($conexao)){
            fecharConexaoMySql($conexao);
            $statusResposta = true;
        }else{
            fecharConexaoMySql($conexao);
            $statusResposta = false;
        }
    }else{
        fecharConexaoMySql($conexao);
        $statusResposta =false;
    }
    fecharConexaoMySql($conexao);
    return $statusResposta;

 }
 function selecteAllContatos(){

    $arrayDados = (boolean)false;
     //abrindo conexao com o Bd
     $conexao = conexaoMysql();
     //script para listar todos os dados do Bd
     $sql = "select * from tblcontato order by idcontato desc";
     //executa o script sql no Bd e Guarda o retorno dos dados, se houver
     $result = mysqli_query($conexao, $sql);
     //valida se o Bd Retornou os registro
     if($result){
         $cont = 0;
         while($rsDados = mysqli_fetch_assoc($result)){
            //Criar um array com os dados BD
            $arrayDados[$cont] = array(
                "id"        =>  $rsDados['idcontato'],
                "nome"      =>  $rsDados['name'],
                "email"     =>  $rsDados['email'],
                "celular"   =>  $rsDados['celular'],
                "message"   =>  $rsDados['message']
                );
            $cont++;
        }
        //solicita o fechamento da conexão com o Bd
        fecharConexaoMySql($conexao);

        return $arrayDados;
    }
}
function deleteContato($id){
    //abrindo conexão com o bd
    $conexao = conexaoMysql();
    //script para deletar um registro no bd
    $sql ="delete from tblcontato where idcontato=".$id;

    //validando se o script esta correto, sem erro de sixtaxe e executa o bd
    if(mysqli_query($conexao, $sql)){
        //valida se o bd teve sucesso na execução do script
        if(mysqli_affected_rows($conexao))
        $statusResposta = true;

    }
    //fechando bd
    fecharConexaoMySql($conexao);

    return $statusResposta;
}
?>