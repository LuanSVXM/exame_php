
DROP TABLE IF EXISTS usuarios  ;
DROP TABLE IF EXISTS enderecos  ; 
DROP TABLE IF EXISTS categorias ;
DROP TABLE IF EXISTS produtos ;
DROP TABLE IF EXISTS carrinho ;
DROP TABLE IF EXISTS carrinho_produtos ;


create table usuarios (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    cpf  varchar(14) UNIQUE not null,
    nome varchar(200) not null,
    master int default 0,
    senha varchar(50) not null,
    data_nascimento date
);

create table enderecos (
     chave integer PRIMARY KEY AUTOINCREMENT,
     rua varchar(200),
     bairro varchar(200),
     uf char(2),
     pais varchar(200),
     cidade varchar(200),
     cep varchar(10),
     id_user_fk INTEGER,
     FOREIGN KEY (id_user_fk) REFERENCES usuarios(id) 
    
);

create table categorias (
    chave integer PRIMARY key AUTOINCREMENT,
    nome varchar(200)
);

create table produtos (
    chave integer PRIMARY key AUTOINCREMENT,
    estoque_disponivel int default 0,
    categoria integer,
    nome varchar(200),
    valor  decimal(10,2),
    FOREIGN KEY (categoria) REFERENCES categorias(chave) 
    ON DELETE CASCADE 
    ON UPDATE CASCADE
);

create table  carrinho (
    chave integer PRIMARY KEY AUTOINCREMENT,
    pago integer DEFAULT 0,
    valor_total decimal(10,2),
    cond_pag varchar(255),
    id_user_fk integer,
    FOREIGN KEY (id_user_fk) REFERENCES usuarios(id) 
    ON DELETE CASCADE 
    ON UPDATE CASCADE
);


create  TABLE carrinho_produtos (
    chave integer PRIMARY KEY AUTOINCREMENT,
    chave_produto integer not null,
    chave_carrinho integer not null,
    quantidade integer default 1,
    FOREIGN KEY (chave_produto) REFERENCES produtos(chave)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
    FOREIGN KEY (chave_carrinho) REFERENCES carrinho(chave)
    ON DELETE CASCADE
    ON UPDATE CASCADE
);


