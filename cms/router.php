<?php
/**************************************************************************
 * Objetivo: Arquivo de rota, prar segmentar as ações encaminhadas pela view
 *     (dados de um form,listagem de dados, ação de excluir ou atualizar).
 *     Esse arquivo sera respomsasvel por emcaminhar as solicitações para a Controller
 * 
 * Autor: Gean
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
                            window.location.href = 'dashboard.php'</script>");
                        }
                    }else if(is_array($resposta)){
                        echo("<script>
                        alert('".$resposta['message']."');
                        window.history.back();
                        </script>");
                    }
        }
        case "CATEGORIAS";
            
            require_once("Controller/controllerCategorias.php");

            if($action =='DELETAR'){
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
    }
    }
}
?>