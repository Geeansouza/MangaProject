
<?php
//variavel criada para diferenciar no action do formulario qual ação deveria ser levada para a router (inserir ou editar).
    //nas condições abaixo, mudamos o action dessa variavel para a ação de editar.
    $form = (string)"router.php?component=categorias&action=inserir";
    //valida se a utilização de variaveis de sessao esta ativa no servidor
    if(session_status()){
        //valida se a variavel de sessao dados contato não esta vazia
         if(!empty($_SESSION['dadosContato'])){
             $id        = $_SESSION['dadosContato']['id'];
             $categoria = $_SESSION['dadosContato']['categoria'];

             //mudamos a ação do form para editar o registro no click do bt "salvar"
             $form = "router.php?component=categoria&action=editar&id=".$id;

             //destroi uma variavel da memoria do server
             unset($_SESSION['dadosContato']);
         }
    }

?><html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/categorias.css">
    <title>.</title>
</head>
<body>
   <main>
       <div id=caixa>
           <div id="topo">
                <div id="titulo">
                    <p class="cms">CMS</p>
                    <p class="gerenciamento">Gerenciamento de Conteúdo do Site</p>
                </div> 
           </div>
           <div id="atalhos">
               <div id="buttons">  
                   <button id=adm>
                        <img id="admin" src="img/admin.jpg" alt="">
                    </button>
                    <button id=categorias>
                        <img id="admin" src="img/categorias.png" alt="">
                    </button>
                    <button id=contatos>
                        <img id="admin" src="img/contato.jpg" alt="">
                    </button>
                    <button id=usuarios>
                        <img id="admin" src="img/user.png" alt="">
                    </button>
                </div>
                <Div id=sair>
                    <button id="salir">
                        <img id="imgs"src="img/Vector.png" alt="">
                    </button>
                </Div>
            </div>
           <div id="sessao">

           <div id="cadastroInformacoes">
                <!-- enctype="multipart/form-data essa opção é obrigatoria para enviar arquivos do formulario em htmlk para o servidor -->
                <form  action="<?=$form?>" name="frmCadastro" method="post" enctype="multipart/form-data">
                    <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label> Categorias:</label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <input type="text" name="txtCategoria" value="<?=isset($categorias)?$categorias:null ?>" placeholder="Digite a Categoria" maxlength="100">
                        </div>
                    </div>
                    <div class="enviar">
                        <div class="enviar">
                            <input type="submit" name="btnEnviar" value="Salvar">
                        </div>
                    </div>

           <div id="consultaDeDados">
            <table id="tblConsulta" >
                <tr>
                    <td id="tblTitulo" colspan="6">
                        <h1> Categorias</h1>
                    </td>
                </tr>
                <tr id="tblLinhas">
                    <td class="tblcontato destaque">Nome</td>
                </tr>
                <?php
                    require_once('controller/controllerCategorias.php');
                    $listacategoria = listarCategoria();
                    
                    if($listacategoria){
                        foreach ($listacategoria as $item) {
                ?>
                <tr id="tblLinhas">
                    <td class="tblColunas registros"><?=$item['categoria']?>
                        <a onclick="return confirm('Deseja realmente Excluir este item?');" href="router.php?component=categorias&action=deletar&id=<?=$item['id']?>">
                            <img src="img/trash.png" alt="Excluir" title="Excluir" class="excluir">
                        </a>
                        <a href="router.php?component=categorias&action=editar&id=<?=$item['id']?>">
                            <img src="img/edicao.png" class="excluir" alt="">
                        </a>
                    </td>
                </tr>
                <?php
                        } 
                    }
                ?>
            </table>
        </div>
   </main>
</body>
</html>