create database cafebistro_phpt2;
use cafebistro_phpt2;
create table usuario (id int auto_increment primary key,
nome varchar(40),
email varchar(255),
senha varchar(255));
insert into usuario values (1, 'admin', 
'admin@ifsp.edu.br', 'phpt2');
select * from usuario;
