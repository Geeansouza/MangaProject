<html lang="pt-br">
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
                    <p class="tg">Manga Hause</p>
                    <p class="gerenciamento">Gerenciamento de Conteúdo do Site</p>
                </div>
                <div id="img">
                    <img id="logo"src="img/Tg.png" alt="">

                </div>
           </div>
           <div id="atalhos">
               <div id="buttons">  
                   <button id=adm>
                   <a href="dashboard.php">
                            <img id="admin" src="img/admin.jpg" alt="">
                        </a>
                    </button>
                    <button id=categorias>
                        <img id="admin" src="img/categorias.png" alt="">
                    </button>
                    <button id=contatos>
                    <a href="dashContato.php">
                            <img id="admin" src="img/contato.jpg" alt="">
                        </a>
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
                    <td class="tblColunas registros"><?=$item['name']?>
                        <a onclick="return confirm('Deseja realmente Excluir este item?');" href="router.php?component=categorias&action=deletar&id=<?=$item['id']?>">
                                    <img src="img/trash.png" alt="Excluir" title="Excluir" class="excluir">
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