<?php


if(!isset($_POST['nome']) ){
   
    echo '<h1 style="color:red"> nome inválido </h1> ';
    
    exit();

};


if(!isset($_POST['id']) ){
   
    echo '<h1 style="color:red"> Erro Interno </h1> ';
    
    exit();

};


if(strlen($_POST['nome']) < 2) {

    echo '<h1 style="color:red"> nome inválido </h1>';
    
    exit();

}

if(!isset($_POST['preco']) || strlen($_POST['preco']) < 1 ){
    
    echo '<h1 style="color:red"> preco 1 dígitos ou mais </h1>';
    
    exit();
};

if(!isset($_POST['categoria'])  ) {

  
    
    echo '<h1 style="color:red"> categoria inválido'. intval($_POST['categoria']).  '</h1>';
   
    exit();

};



if(!isset($_POST['estoque'])) {
    
    echo '<h1 style="color:red"> Estoque inválido </h1>';
    
    exit();

};




$database = new SQLite3("./database.db");

$database->exec("PRAGMA foreign_keys=ON");


$id = $_POST['id'];

$nome = $_POST['nome'];

$estoque = $_POST['estoque'];

$valor =  $_POST['preco'];

$valor_format = "R$ ". number_format($valor,2,",",".");

$categoria = $_POST['categoria'];


if($id == 0 ) { 
    
    $query = "insert into produtos (nome,valor,categoria,estoque_disponivel) values ('$nome', $valor , $categoria , $estoque)";

}

if($id > 0 ) { 
    
    $query = "update produtos set nome='$nome' , valor='$valor', categoria='$categoria', estoque_disponivel='$estoque' where chave = $id";

}




if($database->exec($query)) {

    echo " <script> alert('Salvo com sucesso') </script>"; 
    
    header('Location: http://localhost:8080/produtos');

} else {

    echo " <script> alert('Falha ao salvar!') </script>";

}


?>