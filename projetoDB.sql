create database projetoDB;

use projetoDB;

drop table assistencia, extra_detalhes_aluguer, detalhes_aluguer, analise, seguro, extra, imagem, veiculo, localizacao, tipo_veiculo;

create table tipo_veiculo (
    id_tipo_veiculo INT NOT NULL PRIMARY KEY auto_increment,
    categoria VARCHAR(21) NOT NULL
)engine=InnoDB;

create table localizacao (
	id_localizacao int not null primary key auto_increment,
    localizacao varchar(51) not null,
    morada varchar(71) not null,
    cod_postal varchar(9) not null
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
    franquia int not null,
    foreign key (localizacao_id) references localizacao(id_localizacao),
    FOREIGN KEY (tipo_veiculo_id) REFERENCES tipo_veiculo(id_tipo_veiculo)
)engine=InnoDB;

create table imagem(
	id_imagem int not null primary key auto_increment,
    imagem varchar(81) not null,
    veiculo_id int not null,
    foreign key(veiculo_id) references veiculo(id_veiculo)
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
    data_analise datetime not null,
    profile_id int not null,
    foreign key(profile_id) references profile(id_profile)
)engine=InnoDB;

create table detalhes_aluguer (
	id_detalhes_aluguer int not null primary key auto_increment,
    data_inicio datetime not null,
    data_fim datetime not null,
    veiculo_id int not null,
    profile_id int not null,
    seguro_id int not null,
    localizacao_levantamento_id int not null,
    localizacao_devolucao_id int not null,
    foreign key(veiculo_id) references veiculo(id_veiculo),
    foreign key(profile_id) references profile(id_profile),
    foreign key(seguro_id) references seguro(id_seguro),
    foreign key(localizacao_levantamento_id) references localizacao(id_localizacao),
    foreign key(localizacao_devolucao_id) references localizacao(id_localizacao)
)engine=InnoDB;

create table extra_detalhes_aluguer(
	id_extra_detalhes_aluguer int not null auto_increment primary key,
	extra_id int not null,
    detalhes_aluguer_id int not null,
    foreign key(extra_id) references extra(id_extra),
    foreign key(detalhes_aluguer_id) references detalhes_aluguer(id_detalhes_aluguer)
)engine=InnoDB;

create table assistencia(
	id_assistencia int not null auto_increment primary key,
    data_pedido datetime not null,
    mensagem varchar(91) not null,
    localizacao varchar(51) not null,
    condicao enum("resolvido", "nao_resolvido") not null default 'nao_resolvido',
    veiculo_id int not null,
    profile_id int not null,
    foreign key(profile_id) references profile(id_profile),
    foreign key(veiculo_id) references veiculo(id_veiculo)
)engine=InnoDB;

create table fatura(
	id_fatura int not null auto_increment primary key,
    data_fatura datetime not null,
    preco_total double (5,2) not null,
    detalhes_aluguer_fatura_id int not null,
    foreign key(detalhes_aluguer_fatura_id) references detalhes_aluguer(id_detalhes_aluguer)
)engine=InnoDB;

create table linha_fatura(
	id_linha_fatura int not null auto_increment primary key,
    descricao varchar(255) not null,
    preco double (5,2) not null,
    fatura_id int not null,
    foreign key(fatura_id) references fatura(id_fatura)
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

insert into localizacao values
(default, "Leiria", "Rua dos testes Leiria", "2400-137"),
(default, "Leiria - Batalha", "Rua dos teste Batalha", "2440-041");

insert into veiculo values
(default, "VW", "Golf", "Diesel", 29.99, "AA-11-AA", "Longa descrição do veiculo", "pronto", 8, 1, 1250),
(default, "Seat", "Ibiza", "Gasolina", 17.99, "CC-33-CC", "Longa descrição do veiculo", "manutencao", 3, 1, 1100),
(default, "BMW", "X1", "Diesel", 59.99, "BB-22-BB", "Longa descrição do veiculo", "pronto", 7, 2, 3100);

insert into extra values
(default, "Via-Verde", 6.99),
(default, "Cadeira de Bebé", 3.99);

insert into seguro values
(default, "Seguro Directo" , "Seguro de responsabilidade civil", 7.99),
(default, "Seguro Directo" , "Seguro de danos próprios", 12.99);

insert into analise values
(default, "Melhor serviço para alugar carros, com vários extras. Recomendo!", 5, now(),3);

insert into assistencia values
(default, now(), "O veiculo deixou de pegar.", "Leiria, Rua de Leiria", 'resolvido', 2, 3),
(default, now(), "O veiculo ficou sem combustivel.", "Batalha, Rua da Batalha", default, 1, 2),
(default, now(), "O veiculo nao fecha vidro do condutor.", "Leiria, Rua do IPL", default, 2, 2);