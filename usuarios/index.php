<?php 


$database = new SQLite3("../database.db");

$database->exec("PRAGMA foreign_keys=ON");

$usuarios = $database->query("select * from usuarios order by nome asc ");



?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="../imgs/logo4.ico" type="image/x-icon">

    <link rel="stylesheet" href="../css/index.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.0/feather.min.js"
        integrity="sha512-24XP4a9KVoIinPFUbcnjIjAjtS59PUoxQj3GNVpWc86bCqPuy3YxAcxJrxFCxXe4GHtAumCbO2Ze2bddtuxaRw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

    <title>PetShop</title>



</head>

<body>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">

            <div class="modal-content">

                <div class="modal-header">

                    <h5 class="modal-title" id="exampleModalLabel">Adicionar Usuário</h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                </div>

                <div class="modal-body">

                    <form class="formUserModal" method="post" action="add_edit_user.php">

                        <input hidden required type="text" name='id' class="form-control" id="recipient-id">

                        <div class="mb-3">

                            <label for="recipient-name" class="col-form-label">Nome:</label>

                            <input required type="text" name="nome" class="form-control" id="recipient-name">

                        </div>

                        <div class="mb-3">

                            <label for="recipient-senha" class="col-form-label">Senha:</label>

                            <input required type="password" name="senha" class="form-control" id="recipient-senha">

                        </div>

                        <div class="mb-3">

                            <label for="recipient-cpf" class="col-form-label">CPF:</label>

                            <input required onkeypress="$(this).mask('000.000.000-00');" type="text"
                                class="form-control" name="cpf" id="recipient-cpf">

                        </div>

                        <div class="mb-3">

                            <label for="recipient-date" class="col-form-label">Data de Nascimento:</label>

                            <input required type="date" name="data" class="form-control" id="recipient-data">

                        </div>

                        <div class="mb-3">

                            <label for="recipient-admin" class="col-form-label">Admin:</label>

                            <input type="checkbox" name="admin" id="recipient-admin">

                        </div>

                    </form>


                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>

                    <button type="button" id='Salvar' class="btn btn-success">Salvar Usuario</button>

                </div>

            </div>

        </div>

    </div>

    <div class="container">

        <a class="containerImg" href="/petshop">

            <img src="../imgs/logo.png" alt="logo" />


            <span> Usuários </span>

        </a>


        <div class="ContainerButtonAddUser">

            <div class="btnAdd">

                <span>Adicionar Usuário</span>

                <i data-feather="user-plus"></i>

            </div>


        </div>


        <div class="container_listas_users">


            <div class="header_usuarios">


                <div>

                    ID

                </div>


                <div>

                    Nome

                </div>


                <div>

                    CPF

                </div>


                <div>

                    Data De Nascimento

                </div>

            </div>

            <?php 


                while ($user = $usuarios->fetchArray()) {

                    $id = $user['id'];

                    $nome = $user['nome'];

                    $data = str_replace('-', '/', date("d-m-Y", strtotime($user['data_nascimento']))) ;

                    $cpf = $user['cpf'];

                    $function = 'adicionarForm('.$id.", '$nome' ,"."'$cpf',"."'$data'".")";
                
                    echo '
                    <div class="usuarios_lista">


                    <div>

                    '.
    
                        $id
                    .'
                    </div>
    
    
                    <div>
                    
                    '.

                    $nome
                    
                    .'

                    </div>
    
    
                    <div>
                        '.

                        $cpf

                        .'
                    </div>
    
    
                    <div>

                        '.
                    $data
                    .'
                    </div>
    
                    <div class="containeractions">
    
                        <i data-feather="edit" onclick="'.$function.'"></i>
    
                        <i data-feather="trash" onclick="deletar_user('.$id.')"></i>
    
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

    <script src="./user.js"></script>

</body>

</html>