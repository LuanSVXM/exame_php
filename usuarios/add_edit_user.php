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

if(!isset($_POST['senha']) || strlen($_POST['senha']) < 4 ){
    
    echo '<h1 style="color:red"> senha tem que ter 4 dígitos ou mais </h1>';
    
    exit();
};

if(!isset($_POST['cpf']) || strlen($_POST['cpf']) != 14 ) {
    
    echo '<h1 style="color:red"> cpf inválido </h1>';
    
    exit();

};

if(!isset($_POST['data']) || strlen($_POST['data']) != 10 ) {
    
    echo '<h1 style="color:red"> data de nascimento inválido </h1>';
    
    exit();

};




$database = new SQLite3("../database.db");

$database->exec("PRAGMA foreign_keys=ON");


$admin = isset($_POST['admin']) ? 1 : 0 ;

$senha = md5($_POST['senha']);

$nome = $_POST['nome'];

$cpf = $_POST['cpf'];

$data = $_POST['data'];

$id = $_POST['id'];


if($id == 0 ) { 
    
    $query = "insert into usuarios (nome, senha, cpf, data_nascimento, master) values ('$nome','$senha', '$cpf', '$data', $admin)";

}

if($id > 0 ) { 
    
    $query = "update usuarios set nome='$nome' , senha='$senha', cpf='$cpf', data_nascimento='$data', master= $admin where id = $id";

}




if($database->exec($query)) {

    echo " <script> alert('Salvo com sucesso') </script>"; 
    
    header('Location: http://localhost:8080/petshop/usuarios');

} else {

    echo " <script> alert('Falha ao salvar!') </script>";

}


?>