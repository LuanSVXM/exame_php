<?php


if(!isset($_POST['nome']) ){
   
    echo '<h1 style="color:red"> nome inválido </h1> ';
    
    exit();

};


if(!isset($_POST['id']) ){
   
    echo '<h1 style="color:red"> Erro Interno </h1> ';
    
    exit();

};



$database = new SQLite3("../database.db");

$database->exec("PRAGMA foreign_keys=ON");



$nome = $_POST['nome'];


$id = $_POST['id'];


if($id == 0 ) { 
    
    $query = "insert into categorias (nome) values ('$nome')";

}

if($id > 0 ) { 
    
    $query = "update categorias set nome='$nome' where chave = $id";

}




if($database->exec($query)) {

    echo " <script> alert('Salvo com sucesso') </script>"; 
    
    header('Location:  http://localhost:8080/petshop/categorias');

} else {

    echo " <script> alert('Falha ao salvar!') </script>";

}


?>