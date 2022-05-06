<?php
/******************************************************** 
*Objetivo: Arquivo para criar a conexão com o bd MySql
*autor:Leonardo
*data: 07/04/2022
*versão: 1.0
*********************************************************/

//contantes para estabelecer a conexão com o BD(local do BD, Senha e database)
const SERVER = 'localhost';
const USER = 'root';
const PASSWORD = 'bcd127';
const DATABASE = 'db_manga';
//abre a conexao com o banco de dados mysql
function conexaoMysql(){
    $conexao = array();

    //se a conexao for estabelecida com o BD, iremos ter um array de dados sobre a conexao
    $conexao = mysqli_connect(SERVER, USER, PASSWORD, DATABASE);

    //Validação para verificar se a conexão foi realizada com sucesso
    if($conexao){
        return $conexao;
    }else{
        return false;
    }
}

//fecha a conexão do BD no MySql
function fecharConexaoMySql($conexao){

    mysqli_close($conexao);
}

//Existem 3 formas de criar a conexão com o BD Mysql
//    mysql_connect() - versão antiga do PHP de fazer conexão com o BD
//       (não oferece performace e segurança)
//    mysqli_connect() - versão mais atualizada do PHP de fazer conexão do BD
//       (Ela permite ser utilizada para programação estruturada e POO)
//    PDO() - versão mais completa e eficiente para conexão com BD
//       (é indicada pela segurança e POO)
?>