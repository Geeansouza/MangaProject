<?php
/******************************************
 * Objetivos Arquivo reponsavel pela manipulção de dados contaveis
 *  Obs (Este arquivo fara a ponte entre a view e a Model)
 * Autor:Leonardo
 * Data:09/05/2022
 * Versão: 1.0 
 * 
 *********************************************/

function inserirUsuario ($dadosUsuario){

    if(!empty($dadosUsuario)){
        if(!empty($dadosUsuario['txtNome']) && !empty($dadosUsuario['txtUsuario']) && !empty($dadosUsuario['txtEmail']) && !empty($dadosUsuario['txtSenha'])){

            $arrayDados = array (
                "nome" => $dadosUsuario['txtNome'],
                "usuario" => $dadosUsuario['txtUsuario'],
                "email" => $dadosUsuario['txtEmail'],
                "senha" => $dadosUsuario['txtSenha']
            );

           

          
            require_once('./model/bd/usuarios.php');

            if(insertUsuario($arrayDados)){ 
                return true;
            }else{
                
                return array('idErro' => 1,
                'message' => 'Não foi possivel inserir os dados no banco de dados');die;
                
            }
        }
        else{
            return array('idErro' => 2,
            'message' => 'Existem campos obrigatorios que não foram preenchdidos');
        }
    }
}
function atualizarUsuario ($dadosUsuario, $arrayDados){
    
    $id = $arrayDados['id'];

    if(!empty($dadosUsuario)){
        if(!empty($dadosUsuario['txtNome']) && !empty($dadosUsuario['txtUsuario']) && !empty($dadosUsuario['txtEmail']) && !empty($dadosUsuario['txtSenha'])){
            if(!empty($id) && $id !=0 && is_numeric($id)){

                $arrayDados = array (
                    "id" => $id,
                    "nome" => $dadosUsuario['txtNome'],
                    "usuario" => $dadosUsuario['txtEmail'],
                    "email" => $dadosUsuario['txtEmail'],
                    "senha" => $dadosUsuario['txtSenha']
                );
                require_once('model/bd/usuarios.php');

                if(updateUsuario($arrayDados)){
                    return true;
                }else{
                    return array('idErro' => 1,
                    'message' => 'Não foi possivel atualizar os dados no banco de dados');
                }
            }else{
                return array('idErro' => 4, 'message' => 'não é possivel atualizar um registro sem informar um id válido');
            }
        }else{
            return array('idErro' => 2,
            'message' => 'Existem campos obrigatorios que não foram preenchdidos');
        }
    }
}
function excluirUsuario($arrayDados){
    $id = $arrayDados['id'];

    if($id != 0 && !empty($id) && is_numeric($id)){

        require_once("./model/bd/usuarios.php");
        if(deleteUsuario($id)){
            return true;
        }else{
            return array('idErro' => 3, 'message' => 'o banco de dados não pode excluir o registro.');
        }
    }else{
        return array('idErro' => 4, 'message' => 'não é possivel excluir um registro sem informar um id válido');
    }
}
function listarUsuario(){
    require_once('model/bd/usuarios.php');

    $dados = selectAllUsuarios();

    if(!empty($dados)){
        return $dados;
    }else{
        return false;
    }
}
function buscarUsuario($id){
    if($id !=0 && !empty($id) && is_numeric($id)){
        require_once('model/bd/contato.php');

        // $dados = selectByIdUsuario($id);

        if(!empty($dados)){
            return $dados;
        }else{
            return false;
        }
    }else{
        return array('idErro' => 4, 'message' => 'não é possivel buscar um registro sem informar um id válido');
    }
}
?>