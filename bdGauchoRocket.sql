Create database gaucho_rocket;

create table lugar(
id_lugar int,
nombre_lugar varchar(20),
primary key (id_lugar)
);

create table tipo_viaje(
id_tipo_viaje int,
nombre_tipo_viaje varchar(20),
primary key(id_tipo_viaje)
);

create table turno_hospital(
id_hospital int,
nombre_hospital varchar(35),
turnos int,
primary key(id_hospital)
);

create table estado_reserva(
id_estado_reserva int,
estado varchar(15),
primary key(id_estado_reserva)
);

create table nave(
id_nave int,
tipo_nave varchar(20),
primary key(id_nave)
);

create table cabina(
id_cabina int,
tipo_cabina varchar(20),
cantidad int,
primary key(id_cabina)
);

create table servicio(
id_servicio int,
tipo_sevicio varchar(20),
primary key(id_servicio)
);

create table viaje(
id_viaje int,
salida_viaje datetime,
llegada_viaje datetime,
duracion time,
precio int,
id_tipo_viaje int,
id_lugar int,
primary key(id_viaje),
foreign key(id_tipo_viaje) references tipo_viaje(id_tipo_viaje),
foreign key(id_lugar) references lugar(id_lugar)
);

create table nave_tiene_cabina(
id_nave int,
id_cabina int,
primary key(id_nave,id_cabina),
foreign key(id_nave) references nave(id_nave),
foreign key(id_cabina) references cabina(id_cabina)
);

create table reserva(
id_reserva int,
vencimiento_reserva datetime,
id_estado_reserva int,
primary key (id_reserva),
foreign key (id_estado_reserva) references estado_reserva(id_estado_reserva)
);

create table viaje_hecho_por(
id_reserva int,
id_viaje int,
id_nave int,
primary key(id_reserva,id_viaje,id_nave),
foreign key (id_reserva) references reserva(id_reserva),
foreign key (id_viaje) references viaje(id_viaje),
foreign key (id_nave) references nave(id_nave)
); 

create table reserva_cabina(
id_reserva int,
id_cabina int,
primary key(id_reserva,id_cabina),
foreign key(id_reserva)references reserva(id_reserva),
foreign key(id_cabina)references cabina(id_cabina)
);

create table reserva_servicio(
id_reserva int,
id_servicio int,
primary key(id_reserva,id_servicio),
foreign key(id_reserva) references reserva(id_reserva),
foreign key(id_servicio) references servicio(id_servicio)
);

create table tipo_usuario(
id_tipo_usuario int,
descripcion varchar(20),
primary key(id_tipo_usuario)
);

create table usuario(
id_usuario int,
nombre varchar(20),
apellido varchar(25),
email varchar(40),
contraseña varchar(40),
id_tipo_usuario int,
primary key (id_usuario),
foreign key(id_tipo_usuario) references tipo_usuario(id_tipo_usuario) 
);

create table usuario_hace_reserva(
id_reserva int,
id_usuario int,
primary key(id_reserva,id_usuario),
foreign key(id_reserva) references reserva(id_reserva),
foreign key(id_usuario) references usuario(id_usuario)
);

create table estado_fisico(
id_estado_fisico int,
numero int,
primary key(id_estado_fisico)
);

create table viaje_puede_ser_hecho_por(
id_estado_fisico int,
id_viaje int,
primary key(id_estado_fisico,id_viaje),
foreign key (id_estado_fisico)references estado_fisico(id_estado_fisico),
foreign key (id_viaje) references viaje(id_viaje)
);

create table pasajero(
id_usuario int,
id_estado_fisico int,
id_hospital int,
foreign key(id_usuario) references usuario(id_usuario),
foreign key(id_estado_fisico) references estado_fisico(id_estado_fisico),
foreign key(id_hospital) references turno_hospital(id_hospital)
);
