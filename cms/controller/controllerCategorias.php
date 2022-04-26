<?php
function inserirContato($dadosCategoria){
    if(!empty($dadosCategoria)){
      if(!empty($dadosCategoria["txtCategoria"])){
        $arrayDados = array(
          "categoria" => $dadosCategoria["txtCategoria"]
        );

        require_once("./model/bd/categoria.php");

        if(insertCategoria($arrayDados)){
          return true;
        }else{
          return array("idErro" => 1, 
          "message" => "não foi possivel inserir os dados no Banco de Dados!!!");
        }
      }else{
          return array("idErro" => 2,
          "message" => "existem campos obrigatorios que não foram preenchidos!!!");
      }
    }
  }
  function excluirCategoria($id){
    if($id != 0 && !empty($id) && is_numeric($id)){
      require_once("./model/bd/categoria.php");
      
      if(deleteCategoria($id)){
        return true;
      }else{
        return array('idErro' => 3,
                     'message' => "O banco não pode excluir o registro.");
      }
    }else{
        return array('idErro' => 4,
                     'message' => "Não é possivel excluir o registro sem informar um id valido.");
    }
  }

  function listarCategoria(){
    require_once("./model/bd/categoria.php");

    $dados = selectAllCategorias();

    if(!empty($dados)){
      return $dados;
    }else{
      return false;
    }
  }
  ?>
