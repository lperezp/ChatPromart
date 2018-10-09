create database chat;
use chat;
create table user(
	id_user int auto_increment,
    name_user varchar(15) not null,
    mail varchar(20) not null,
    primary key(id_user)
    );

create table message(
	id_message int auto_increment,
    id_user int,
    message varchar(200) not null,
    date varchar(25),
    primary key(id_message),
    FOREIGN KEY(id_user) REFERENCES user(id_user)
    );
    

insert into user(name_user,mail) values ("Yanira","luis");
select * from user;
select * from message;
select id_user, name_user, mail from user;

select m.id_message,u.name_user, m.message from message m inner join user u on m.id_user = u.id_user;

insert into message(id_user,message) values ("1","Este es un mensaje");

