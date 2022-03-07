CREATE DATABASE dentisti;

CREATE TABLE dentone(

email varchar(20) not null,
codiceFIsc char(16) not null primary key,
nome varchar(20) not null,
cognome varchar(2) not null
);

insert into dentone(email, codiceFISc, nome, cognome)
values("suny@gmail.com","daaaaaaaaaaaaaaa", "sumyx", "117");
