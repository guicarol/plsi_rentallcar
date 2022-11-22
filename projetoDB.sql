create database projetoDB;

drop table imagem;
drop table extra_detalhes_aluger;
drop table detalhes_aluger;
drop table veiculo;
drop table tipo_veiculo;

use projetoDB;

create table tipo_veiculo (
    id_tipo_veiculo INT NOT NULL PRIMARY KEY auto_increment,
    categoria VARCHAR(21) NOT NULL
)engine=InnoDB;

create table veiculo (
	id_veiculo INT NOT NULL PRIMARY KEY auto_increment,
    marca varchar(21) not null,
    modelo varchar (31) not null,
    combustivel varchar(9) not null,
    preco double(5,2) not null,
    matricula varchar(9) not null unique,
    descricao varchar(255) not null,
    estado enum("pronto", "manutencao") not null,
    tipo_veiculo_id int not null,
    localizacao_id int not null,
    foreign key (localizacao_id) references localizacao(id_localizacao),
    FOREIGN KEY (tipo_veiculo_id) REFERENCES tipo_veiculo(id_tipo_veiculo)
)engine=InnoDB;

create table imagem(
	id_imagem int not null primary key auto_increment,
    imagem varchar(81) not null,
    veiculo_id int not null,
    foreign key(veiculo_id) references veiculo(id_veiculo)
)engine=InnoDB;

create table localizacao (
	id_localizacao int not null primary key auto_increment,
    morada varchar(51) not null,
    cod_postal varchar(9) not null
)engine=InnoDB;

create table extra (
	id_extra int not null primary key auto_increment,
    descricao varchar(255) not null,
    preco double(4,2) not null
)engine=InnoDB;

create table seguro (
	id_seguro int not null primary key auto_increment,
    marca varchar(51) not null,
    cobertura varchar(81) not null,
    preco double(4,2) not null
)engine=InnoDB;

create table fatura (
	id_fatura int not null primary key auto_increment,
    data_fatura datetime,
    preco_total double (5,2) not null
)engine=InnoDB;


create table profile (
	id_profile int not null primary key,
    nome varchar(21) not null,
    apelido varchar(21) not null,
    telemovel int not null unique,
    nif int not null unique,
    nr_carta_conducao varchar(12) not null unique,
	foreign key(id_profile) references user(id)
)engine=InnoDB;

create table analise (
	id_analise int not null primary key auto_increment,
    comentario varchar(255) not null,
    classificacao int not null,
    data_analise datetime,
    id_user int not null,
    foreign key(id_user) references user(id)
)engine=InnoDB;

create table detalhes_aluger (
	id_detalhes_aluguer int not null primary key auto_increment,
    data_inicio datetime,
    data_fim datetime,
    veiculo_id int not null,
    id_user int not null,
    seguro_id int not null,
    localizacao_levantamento_id int not null,
    localizacao_devolucao_id int not null,
    foreign key(veiculo_id) references veiculo(id_veiculo),
    foreign key(id_user) references user(id),
    foreign key(seguro_id) references seguro(id_seguro),
    foreign key(localizacao_levantamento_id) references localizacao(id_localizacao),
    foreign key(localizacao_devolucao_id) references localizacao(id_localizacao)
)engine=InnoDB;

create table extra_detalhes_aluger(
	extra_id int not null,
    detalhes_aluger_id int not null,
    foreign key(extra_id) references extra(id_extra),
    foreign key(detalhes_aluger_id) references detalhes_aluger(id_detalhes_aluguer),
    PRIMARY KEY (extra_id, detalhes_aluger_id)
)engine=InnoDB;

create table assitencia(
	id_assistencia int not null auto_increment primary key,
    dataPedido datetime not null,
    mensagem varchar(91) not null,
    localizacao varchar(51) not null,
    veiculo_id int not null,
    foreign key(veiculo_id) references veiculo(id_veiculo)
)engine=InnoDB;

insert into tipo_veiculo values 
(default, "Cabrio"),
(default, "Carrinha"),
(default, "Citadino"),
(default, "Coupé"),
(default, "Monovolume"),
(default, "Sedan"),
(default, "SUV/TT"),
(default, "Utilitário");

insert into veiculo values
(default, "VW", "Golf", "Diesel", 29.99, "AA-11-AA", "Longa descrição do veiculo", "Pronto", 8, 1),
(default, "BMW", "X1", "Diesel", 59.99, "BB-22-BB", "Longa descrição do veiculo", "Pronto", 7, 2);

insert into localizacao values
(default, "Leiria", "2400-137"),
(default, "Leiria - Batalha", "2440-041");

insert into extra values
(default, "Via-Verde", 6.99),
(default, "Cadeira de Bebé", 3.99);

insert into seguro values
(default, "Seguro Directo" , "Seguro de responsabilidade civil", 7.99),
(default, "Seguro Directo" , "Seguro de danos próprios", 12.99);

insert into analise values
(default, "Melhor serviço para alugar carros, com vários extras. Recomendo!", 5, '2022-11-17',3);