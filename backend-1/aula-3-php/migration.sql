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

insert into usuario (nome, email, senha)
values ('Everton V. G.','everton@uol.com.br','123456'),
				('Marla Sopeña','marla@gmail.com','123456'),
        ('Paulo Asconavieta','Paulooo@hotmail.com','123456');

insert into telefone(id_usuario, telefone) values(1,32223456), (1,32783499), (2,32229999), (3,32786969);

create table produto(
id serial primary key,
nome varchar(50) not null,
descricao varchar(100) not null
);