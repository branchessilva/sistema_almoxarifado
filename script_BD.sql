
create table estado(
	cod_estado int primary key not null auto_increment,
	nome varchar(10) not null
	);
	
create table setor(
	cod_setor int primary key not null auto_increment,
    nome varchar(45) not null
);

create table perfil (
	cod_perfil int primary key not null auto_increment,
    nome varchar(5) not null
);

create table usuario(
	matricula int primary key not null,
	nome varchar(45) not null,
    fk_Setor int, 
    fk_Perfil int,
    constraint fk_setor foreign key (fk_Setor) references setor (cod_setor),
    constraint fk_perfil foreign key (fk_Perfil) references perfil (cod_perfil)
);

create table pedido(
	cod_pedido int primary key not null auto_increment,
	recebedor int,
    autorizador int,
    solicitante int not null,
    data_Pedido date not null,
    fk_Estado int not null,
	hora time not null,
    constraint fk_estado foreign key (fk_Estado) references estado (cod_estado)
);

create table itens(
	cod_item int primary key not null,
    nome varchar(45) not null,
    quantidade_Estoque int,
    unidade_Tipo varchar (10) not null
);

create table pedido_Item(
    fk_Pedido int,
    fk_Item int,
	constraint fk_pedido foreign key (fk_Pedido) references pedido (cod_pedido),
    constraint fk_item foreign key (fk_Item) references itens (cod_item),
	constraint  cod_Pedido_Item primary key (fk_Pedido, fk_Item),
    quantidade_Solicitada int not null,
    quantidade_Fornecida int 
);


/*Insert para perfil*/
insert into perfil (nome) values ('Autorizado');
insert into perfil (nome) values ('Comum');
insert into perfil (nome) values ('Almoxarifado');

/*Insert para itens*/
INSERT INTO itens (cod_Item, nome, quantidade_Estoque, unidade_Tipo) VALUES (1,"Café", 15, "PACOTE");

/*Insert para estado*/
Insert into estado (nome) values ('Aprovado');
Insert into estado (nome) values ('Pendente');
Insert into estado (nome) values ('Cancelado');
Insert into estado (nome) values ('Cancelado pelo usuario');