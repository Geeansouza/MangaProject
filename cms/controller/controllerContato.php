<?php
/******************************************
 * Objetivos Arquivo reponsavel pela manipulção de dados contaveis
 *  Obs (Este arquivo fara a ponte entre a view e a Model)
 * Autor:Leonardo
 * Data:07/04/2022
 * Versão: 1.0 
 * 
 *********************************************/

//função para receber dados da view e encaminhar para a model (inserir)

function listarContato(){
    //import do arquivo que vai buscar os dados no BD
    require_once('model/bd/contato.php');
    //chama a função que vai buscar os dados do BD
    $dados = selecteAllContatos();

    if(!empty($dados))
        return $dados;
    else
        return false;
}

function excluirContato($id){

    //validação para verificar se o id contem um numero valido
    if($id != 0 && !empty($id) && is_numeric($id)){
        //import dos arquivos
        require_once('model/bd/contato.php');
        //chama a funcao da model e valida se o retorno foi verdadeiro ou falso
            if(deleteContato($id))
                return true;
            else
                return array('idErro' => 3, 'message' => 'o banco de dados não pode excluir o registro.');
    }else{
        return array('idErro' => 4, 'message' => 'não é possivel excluir um registro sem informar um id válido');
    }    
}


?>
