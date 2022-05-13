<?php
/**************************************************************************
 * Objetivo: Arquivo de rota, prar segmentar as ações encaminhadas pela view
 *     (dados de um form,listagem de dados, ação de excluir ou atualizar).
 *     Esse arquivo sera respomsasvel por emcaminhar as solicitações para a Controller
 * 
 * Autor: Leonardo
 * Data:07/04/2022
 * Versão: 1.0
 * 
 *************************************************************************/

 $action = (string)null;
 $component = (string)null;
 //validando se a requisição dos post de um formulario
    if($_SERVER['REQUEST_METHOD']== 'POST'|| $_SERVER['REQUEST_METHOD'] == 'GET'){

        $component = strtoupper($_GET['component']);
        $action = strtoupper($_GET['action']);

        //estrutura condicional para validar quem esta solicitando algo para a router
        switch($component){
            case'CONTATOS':
                //import da controler
                require_once('controller/controllerContato.php');

                if($action =='DELETAR'){
                    //recebe o id do registro q devera ser excluido, que foi enviado pela url no link da img do excluir que foi acionado na index
                    $idContato = $_GET['id'];
                    //chama a função de excluir na controller
                    $resposta = excluirContato($idContato);
                    
                    if(is_bool($resposta)){
                        if($resposta){
                            echo("<script>
                            alert('Registro excluido com sucesso!');
                            window.location.href = 'dashContatos.php'</script>");
                        }
                    }else if(is_array($resposta)){
                        echo("<script>
                        alert('".$resposta['message']."');
                        window.history.back();
                        </script>");
                    }
                }
                break;
        
            case 'CATEGORIAS';
                require_once("controller/controllerCategorias.php");

                if($action == 'INSERIR'){
                    
                    
                    // if(isset($_FILES) && !empty($_FILES)){
                    //     $resposta = inserirCategoria($_POST, $_FILES);
                    // }else{
                    //     $resposta = inserirCategoria($_POST, null);
                    // }
                    

                    $resposta = inserirCategoria($_POST);
                    var_dump($resposta);
                    if(is_bool($resposta)){

                        if($resposta){
                            echo("<script>
                            alert('Registro inserido com sucesso');
                            window.location.href = 'dashCategorias.php'</script>");
                        }elseif (is_array($resposta)){
                        echo("<script>
                                alert('".$resposta['message']."');
                                window.history.back();
                                </script>");
                            }
                    }

                }else if($action =='DELETAR'){
                    //recebe o id do registro q devera ser excluido, que foi enviado pela url no link da img do excluir que foi acionado na index
                    $idCategorias = $_GET['id'];

                    //chama a função de excluir na controller
                    $resposta = excluirCategoria($idCategorias);
                    
                    if(is_bool($resposta)){
                        if($resposta){
                            echo("<script>
                            alert('Registro excluido com sucesso!');
                            window.location.href = 'dashCategorias.php'</script>");
                        }
                    }else if(is_array($resposta)){
                        echo("<script>
                        alert('".$resposta['message']."');
                        window.history.back();
                        </script>");
                    }
                }else if($action == 'EDITAR'){
                
                    $idCategorias=$_GET['id'];

                    

                    $arrayDados=array (
                        "idcategorias" => $idCategorias
                    );
                    
                    $resposta = atualizarCategoria($_POST, $arrayDados);

                    
                    
                    if (is_bool($resposta)){

                        //verificar se o retorno foi verdadeiro
                        if($resposta)
                            echo("<script>
                            alert('Registro Atualizado com sucesso');
                            window.location.href = 'dashCategorias.php'</script>");
                    }elseif(is_array($resposta))
                    echo("<script>
                            alert('".$resposta['message']."');
                            window.history.back();
                            </script>");
                }else if($action == 'BUSCAR'){

                    $idCategorias = $_GET['id'];

                    $dados = buscarCategoria($idCategorias);
                    
                    session_start();

                    $_SESSION['dadosCategoria'] = $dados;


                    require_once('dashCategorias.php');
                }  
                break;
         
            case 'USUARIOS';
                require_once('controller/controllerUsuarios.php');

                if($action == 'INSERIR'){

                    
                    $resposta = inserirUsuario($_POST);

                    if(is_bool($resposta)){
                        if($resposta){
                            echo("<script>
                            alert('Registro inserido com sucesso');
                            window.location.href = 'dashUsuarios.php'</script>");
                        }
                        }elseif(is_array($resposta)){
                            echo("<script>
                            alert('".$resposta['message']."');
                            window.history.back();
                            </script>");
                        }   
                }else if($action == 'DELETAR'){
                    $idusuarios = $_GET['id'];

                    $arrayDados = array(
                        "id" => $idusuarios
                    );

                    $resposta = excluirUsuario($arrayDados);

                    if(is_bool($resposta)){
                        if($resposta){
                            echo("<script>
                                    alert('Registro excluido com sucesso!');
                                    window.location.href = 'dashUsuarios.php'</script>");
                        }
                    }else if (is_array($resposta)){
                        echo("<script>
                        alert('".$resposta['message']."');
                        window.history.back();
                        </script>");
                    }
                
                }else if ($action == 'BUSCAR'){
                    $idusuarios = $_GET['id'];

                    $dados = buscarUsuario($idusuarios);

                    // session_start();

                    $_SESSION['dadosContato'] = $dados;

                    require_once('dashUsuarios.php');

                }else if($action == 'EDITAR'){
                    $idusuarios = $_GET['id'];

                    $arrayDados = array (
                        "id" =>$idusuarios
                    );


                    $resposta = atualizarUsuario($_POST, $arrayDados);

                    if(is_bool($resposta)){
                        if($resposta){
                            echo("<script>
                            alert('Registro Atualizado com sucesso');
                            window.location.href = 'dashUsuarios.php'</script>");
                        }
                    
                    }elseif(is_array($resposta)){
                        echo("<script>
                        alert('".$resposta['message']."');
                        window.history.back();
                        </script>");
                    }
                }
                break;
        
        }
}
?>