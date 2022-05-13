<?php

 require_once("conexaoMySql.php");

function insertCategoria($dadosCategoria){

        $conexao = conexaoMysql();

        $sql = "insert into tblcategorias
                (categoria)
                values(
            '".$dadosCategoria["categoria"]."');"; 
            
        if(mysqli_query($conexao, $sql)){
            if(mysqli_affected_rows($conexao)){
                $statusResultado = true;
            }else{
                $statusResultado = false;
            }      
          }else{
            $statusResultado = false;
          }
            fecharConexaoMysql($conexao);
            return $statusResultado;
} 
function selectAllCategorias(){
        $conexao = conexaoMysql();
        $sql = "select * from tblcategorias order by idcategorias desc";
        $result = mysqli_query($conexao, $sql);
    
        if($result)
        {
          $cont =0;
          while($rsDados = mysqli_fetch_assoc($result))
          {
            $arrayDados[$cont] = array(
              "id"        => $rsDados["idcategorias"],
              "categoria"      => $rsDados["categoria"],
            );
            $cont++;
          }   
            
            fecharConexaoMysql($conexao);
    
            if(isset($arrayDados))
                return $arrayDados;
              else
              return false;
        }
}
function deleteCategoria($id){

        $conexao = conexaoMysql();
    
        $sql = "delete from tblcategorias where idcategorias =".$id;
        
        

        if(mysqli_query($conexao, $sql)){
          if(mysqli_affected_rows($conexao)){
              $statusResultado = true;
          }else{
              $statusResultado = false;
          }
    
         }else{
          $statusResultado = false;
         }
    
        fecharConexaoMysql($conexao);

        return $statusResultado;
}
function updateCategoria($dadosCategoria){
    $statusResultado= (boolean) false;

    $conexao = conexaoMysql();
    $sql = "update tblcategorias set
    categoria       =   '".$dadosCategoria['categoria']."'
    where idcategorias = ".$dadosCategoria['idcategorias'];

    
     //executa o script no BD
        //Validação para verificar  se o script sql esta correto
        if(mysqli_query($conexao, $sql))
        {
            //validação para ver se al inha for gravada no bd 
            if(mysqli_affected_rows($conexao))
            {
                fecharConexaoMySql($conexao);
                $statusRespota = true;
                }
                else{
                    fecharConexaoMySql($conexao);
                    $statusRespota = false;
                }
            }else{
                fecharConexaoMySql($conexao);
                $statusRespota = false;
            }
    
            fecharConexaoMySql($conexao);
            return $statusRespota;
            
        
}
function selectByIdCategoria($id){

  //abrindo conexão com o BD

  $conexao = conexaoMysql();

  $sql = "select * from tblcategorias where idcategorias =".$id;

  $result = mysqli_query($conexao, $sql);

  if($result){
     if($rsDados = mysqli_fetch_assoc($result)){

      $arrayDados = array(
        "idcategorias" => $rsDados['idcategorias'],
        "categoria" => $rsDados['categoria']

      );
     }

     fecharConexaoMySql($conexao);

     return $arrayDados;
  }
}
?>