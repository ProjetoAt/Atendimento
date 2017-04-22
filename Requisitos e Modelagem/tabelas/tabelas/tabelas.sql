create database if not exists db_At
default charset utf8
default collate utf8_general_ci;
use  db_At;

create table if not exists clientes(

id_cliente int not null auto_increment,

telefone char(13) not null,
cpf char(11)not null,
email varchar(100) not null,
ra char(8),
nome varchar(55) not null,
data_cadastro timestamp not null,
primary key (id_cliente))
default charset = utf8;

create table if not exists notas(
id_nota int not null auto_increment,
tempo_espera int not null,
atendente int not null,
problema_resolvido boolean not null,
primary key (id_nota))
default charset = utf8;

create table if not exists atendentes(
id_atendente int not null auto_increment,
nome varchar(55) not null,
usuario varchar(55) not null,
senha varchar(55) not null,
nivel tinyint not null,
data_cadastro timestamp not null,
primary key (id_atendente))
default charset = utf8;


create table if not exists questionarios(
id_questionarios int not null auto_increment,
id_atendente int not null,
id_cliente int not null,
id_nota int not null,
codigo char(4) not null,
preenchido boolean not null,
data_cadastro timestamp not null,
reclamacao longtext,
primary key (id_questionarios),
foreign key (id_cliente)
references clientes (id_cliente),
foreign key (id_atendente)
references atendentes (id_atendente),
foreign key (id_nota)
references notas (id_nota))
default charset = utf8;











