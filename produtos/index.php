<?php


$database = new SQLite3("../database.db");

$database->exec("PRAGMA foreign_keys=ON");

$produtos = $database->query("select 
p.chave, p.nome, p.estoque_disponivel AS estoque,
 p.valor, c.nome AS categoria_nome , c.chave AS categoria_id
 from produtos p inner join categorias c on c.chave = p.categoria  order by p.nome asc");

$categorias = $database->query("select * from categorias order by nome asc ")


?>


<!DOCTYPE html>

<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="../imgs/logo4.ico" type="image/x-icon">

    <link rel="stylesheet" href="../css/index.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.0/feather.min.js" integrity="sha512-24XP4a9KVoIinPFUbcnjIjAjtS59PUoxQj3GNVpWc86bCqPuy3YxAcxJrxFCxXe4GHtAumCbO2Ze2bddtuxaRw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

    <title>PetShop</title>



</head>

<body>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">

            <div class="modal-content">

                <div class="modal-header">

                    <h5 class="modal-title" id="exampleModalLabel">Adicionar Produto</h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                </div>

                <div class="modal-body">

                    <form class="formUserModal" method="post" action="add_edit_produtos.php">

                        <input hidden required type="text" name='id' class="form-control" id="recipient-id">

                        <div class="mb-3">

                            <label for="nome" class="col-form-label">Nome:</label>

                            <input required type="text" name="nome" class="form-control" id="nome">

                        </div>

                        <div class="mb-3">

                            <label for="estoque" class="col-form-label">estoque:</label>

                            <input required type="number" name="estoque" class="form-control" id="estoque">

                        </div>

                        <div class="mb-3">

                            <label for="categoria" class="col-form-label">Categoria:</label>

                            <select name='categoria' id='categoria' class="form-select" aria-label="Default select example">
                                <?php

                                while ($row = $categorias->fetchArray()) {
                                    $chave = $row['chave'];
                                    $nome = $row['nome'];
                                    echo '<option value="' . $chave . '">' . $nome . '</option>';
                                }

                                ?>
                            </select>

                        </div>


                        <div class="mb-3">

                            <label for="preco" class="col-form-label">Preço:</label>

                            <input type="number" name="preco" id="preco">

                        </div>

                    </form>


                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>

                    <button type="button" id='Salvar' class="btn btn-success">Salvar Produto</button>

                </div>

            </div>

        </div>

    </div>

    <div class="container">

        <a class="containerImg" href="/petshop">

            <img src="../imgs/logo.png" alt="logo" />


            <span> Produtos </span>

        </a>


        <div class="ContainerButtonAddUser">

            <div class="btnAdd">

                <span>Adicionar Produto</span>

                <i data-feather="package"></i>

            </div>


        </div>


        <div class="container_listas_users">


            <div class="header_produtos">


                <div>

                    ID

                </div>


                <div>

                    Nome

                </div>


                <div>

                    Estoque

                </div>


                <div>

                    Valor

                </div>

                <div>

                    Categoria

                
                </div>

            </div>

            <?php


            while ($prod = $produtos->fetchArray()) {

                $id = $prod['chave'];

                $nome = $prod['nome'];

                $estoque = $prod['estoque'];

                $valor =  floatval($prod['valor']);

                $valor_format = "R$ ". number_format($valor,2,",",".");

                $categoria = $prod['categoria_nome'];

                $id_categoria = $prod['categoria_id'];

                $function = 'adicionarForm('.$id.", '$nome' ,"."'$estoque',"."'$valor',". "'$id_categoria'". ")";

                echo '
                    <div class="produtos_lista">


                    <div>

                    ' .

                    $id
                    . '
                    </div>
    
    
                    <div>
                    
                    ' .

                    $nome

                    . '

                    </div>
    
    
                    <div>
                        ' .

                    $estoque

                    . '
                    </div>
    
    
                    <div>

                        ' .
                    $valor_format
                    . '
                    </div>

                    <div>

                    ' .
                    $categoria
                . '
                </div>
    
                    <div class="containeractions">
    
                        <i data-feather="edit" onclick="' . $function . '" ></i>
    
                        <i data-feather="trash" onclick="deletar_produtos('.$id.')" ></i>
    
                    </div>
    
                </div>
                    
                    ';
            }



            ?>




        </div>






    </div>


    <script>
        feather.replace()
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script src="./produtos.js"></script>

</body>

</html>