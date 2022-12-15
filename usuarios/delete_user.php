<?php

if(!isset($_GET['id']) ){
   
    echo '<h1 style="color:red"> Erro Interno </h1> ';
    
    exit();

};



$database = new SQLite3("../database.db");

$database->exec("PRAGMA foreign_keys=ON");

$id = $_GET['id'];

if($id <= 0) {
   
    echo '<h1 style="color:red"> Erro Interno </h1> ';
    
    exit();

}

$query = "delete from usuarios where id = $id";



if($database->exec($query)) {

    echo " <script> alert('Deletado com sucesso') </script>"; 
    
    header('Location: http://localhost:8080/petshop/usuarios');

} else {

    echo " <script> alert('Falha ao Deletar!') </script>";

}




?>