<?php


$database = new SQLite3("../database.db");

$database->exec("PRAGMA foreign_keys=ON");

$enderecos = $database->query("select * from enderecos");



?>


<!DOCTYPE html>
<html lang="en">

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

                    <h5 class="modal-title" id="exampleModalLabel">Adicionar Categoria</h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                </div>

                <div class="modal-body">

                    <form class="formUserModal" method="post" action="add_edit_categoria.php">

                        <input hidden required type="text" name='id' class="form-control" id="recipient-id">

                        <div class="mb-3">

                            <label for="recipient-name" class="col-form-label">Nome:</label>

                            <input required type="text" name="nome" class="form-control" id="recipient-name">

                        </div>


                    </form>


                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>

                    <button type="button" id='Salvar' class="btn btn-success">Salvar Endereços</button>

                </div>

            </div>

        </div>

    </div>

    <div class="container">

        <div class="containerImg">

            <a href="/petshop">

                <img src="../imgs/logo.png" alt="logo" />

            </a>


            <span> Endereços </span>

        </div>


        <div class="ContainerButtonAddUser">

            <div class="btnAdd">

                <span>Adicionar Endereços</span>

                <i data-feather="home"></i>

            </div>


        </div>


        <div class="container_listas_users">


            <div class="header_categorias">


                <div>

                    ID

                </div>


                <div>

                    Nome

                </div>


            </div>

            <?php


            while ($endereco = $enderecos->fetchArray()) {

                $id = $endereco['chave'];

                $endereco_completo = $endereco['rua'].','.$endereco['bairro'].',';

                $nome = $endereco_completo;

                $function = 'adicionarForm(' . $id . ", '$nome' ," . ")";

                echo '
                    <div class="categorias_lista">


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
    
    
                    <div class="containeractions">
    
                        <i data-feather="edit" onclick="' . $function . '"></i>
    
                        <i data-feather="trash" onclick="deletar_categorias('.$id.')"></i>
    
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

    <script src="./categorias.js"></script>

</body>

</html>