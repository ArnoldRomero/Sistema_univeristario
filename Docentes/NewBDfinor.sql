CREATE TABLE usuario (
  id int(11)ZEROFILL NOT NULL,
  tipo int(5) not null,
  usuario varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  password varchar(165) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2 ;



create table docente
(
reg_docente int (11) primary key,
nombres_d varchar (60) not null,
paterno_d varchar (50) not null,
materno_d varchar (50),
telefono varchar (9),
sexo char(1)
);


create table carrera
(
cod_carrera varchar (10) not null primary key,
nombre_c varchar (50) not null,
descripcion text (800)

);


create table estudiante
(
reg_estudiante int (11) primary key,
nombres varchar (60) not null,
paterno varchar (50) not null,
materno varchar (50),
sexo char (1),
email varchar (70),
carrera_e varchar (10),
carrera_paralela varchar(10), 

foreign key (carrera_e) references carrera(cod_carrera),
foreign key (carrera_paralela) references carrera(cod_carrera)


);

create table materia
(
sigla varchar (10) not null primary key,
nombre_m varchar (25) not null,
creditos int
);



create table matcar
(
cod_carrera_f varchar (10),
sigla_f varchar (10),
semestre int not null,


foreign key (cod_carrera_f) references carrera (cod_carrera),
foreign key (sigla_f) references materia (sigla),
primary key (cod_carrera_f, sigla_f)
);


create table grupo
(
nro_grupo int not null AUTO_INCREMENT primary key,
fecha_inicio date,
fecha_final date,
gestion varchar (8),

reg_docentef int (11),
cod_carreraf varchar (10),
siglaf varchar (10),

foreign key (reg_docentef) references docente (reg_docente),
foreign key (cod_carreraf,siglaf) references matcar (cod_carrera_f,sigla_f)

);

create table grupoalumno
(
reg_estudiantef int (11),
nro_grupof int,
nota int,

primary key(reg_estudiantef, nro_grupof),
foreign key (reg_estudiantef) references estudiante (reg_estudiante),
foreign key (nro_grupof) references grupo (nro_grupo)

);