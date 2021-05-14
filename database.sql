create table Resposivas(
	ID int not null auto_increment,
	Usuario_ID int not null,
	Fecha datetime not null default current_timestamp,
	Status tinyint not null default 1,
	primary key(ID)
);

create table Resposiva_Equipo(
	ID int not null auto_increment,
	Resposiva_ID int not null,
	Equipo_ID int not null,
	Tipo_Equipo_ID int not null,
	Resposiva_Movimiento_ID int not null,
	primary key(ID)
);