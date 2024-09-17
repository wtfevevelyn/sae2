CREATE DATABASE formulario;
USE formulario;

create table registro(
nombre varchar (255) not null,
nombreUsuario varchar (255) not null,
correo varchar (255) not null,
celular varchar (16) not null,
dirección varchar(255) not null,
primary key (nombre)
);

create table conexion(
    id int primary key,
    nombre varchar (255) not null,
	foreign key (nombre) references registro(nombre)
);