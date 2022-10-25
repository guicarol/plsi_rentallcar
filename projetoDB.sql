create database projetoDB;

use projetoDB;

create table tipoVeiculo (
    idTipoVeiculo INT NOT NULL PRIMARY KEY auto_increment,
    categoria VARCHAR(21) NOT NULL
)engine=InnoDB;

create table veiculo (
	idVeiculo INT NOT NULL PRIMARY KEY auto_increment,
    marca varchar(21) not null,
    modelo varchar (31) not null,
    combustivel varchar(9) not null,
    preco double(3,2) not null,
    matricula varchar(9) not null,
    descricao varchar(255) not null,
    idTipoVeiculo int not null,
    FOREIGN KEY (idTipoVeiculo) REFERENCES tipoVeiculo(idTipoVeiculo)
)engine=InnoDB;

create table imagem(
	idImagem int not null primary key auto_increment,
    imagem varchar(81) not null,
    idVeiculo int not null,
    foreign key(idVeiculo) references veiculo(idVeiculo)
)engine=InnoDB;

create table localizacao (
	idLocalizacao int not null primary key auto_increment,
    morada varchar(51) not null,
    codPostal varchar(9) not null
)engine=InnoDB;

create table extra (
	idExtra int not null primary key auto_increment,
    descricao varchar(255) not null,
    preco double(2,2) not null
)engine=InnoDB;

create table seguro (
	idSeguro int not null primary key auto_increment,
    marca varchar(51) not null,
    cobertura varchar(81) not null,
    preco double(2,2) not null
)engine=InnoDB;

create table fatura (
	idFatura int not null primary key auto_increment,
    dataFatura datetime,
    precoTotal double (4,2) not null
)engine=InnoDB;

create table profile (
	idProfile int not null primary key,
    nome varchar(21) not null,
    apelido varchar(21) not null,
    telemovel int not null,
    nif int not null,
    nrCartaConducao varchar(12) not null,
	idUser int not null,
    foreign key(idUser) references user(id)
)engine=InnoDB;

create table analise (
	idAnalise int not null primary key auto_increment,
    comentario varchar(255) not null,
    classificacao int not null,
    dataAnalise datetime,
    idUser int not null,
    foreign key(idUser) references user(id)
)engine=InnoDB;

create table detalhesAluger (
	idDetalhesAluguer int not null primary key auto_increment,
    dataInicio datetime,
    dataFim datetime,
    idVeiculo int not null,
    idUser int not null,
    idSeguro int not null,
    idLocalizacaoLevantamento int not null,
    idLocalizacaoDevolucao int not null,
    foreign key(idVeiculo) references veiculo(idVeiculo),
    foreign key(idUser) references user(id),
    foreign key(idSeguro) references seguro(idSeguro),
    foreign key(idLocalizacaoLevantamento) references localizacao(idLocalizacao),
    foreign key(idLocalizacaoDevolucao) references localizacao(idLocalizacao)
)engine=InnoDB;

create table extraDetalhesAluger(
	idExtra int not null,
    idDetalhesAluger int not null,
    foreign key(idExtra) references extra(idExtra),
    foreign key(idDetalhesAluger) references detalhesAluger(idDetalhesAluguer),
    PRIMARY KEY (idExtra, idDetalhesAluger)
)engine=InnoDB;