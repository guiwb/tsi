create table usuario(
id serial primary key,
nome varchar(255),
email varchar(255),
senha varchar(32)
);

create table telefone(
id serial primary key,
id_usuario integer,
telefone integer,
foreign key (id_usuario) references usuario (id)
);

insert into usuario values(1,'Everton V. G.','everton@uol.com.br','123456');
insert into usuario values(2,'Marla Sopeña','marla@gmail.com','123456');
insert into usuario values(3,'Paulo Asconavieta','Paulooo@hotmail.com','123456');

insert into telefone values(1,1,32223456);
insert into telefone values(2,1,32783499);
insert into telefone values(3,2,32229999);
insert into telefone values(4,3,32786969);