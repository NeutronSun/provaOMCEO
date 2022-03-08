CREATE DATABASE dentoni;

CREATE TABLE utenti(

codiceFisc char(16) not null primary key,
nome varchar(20) not null,
cognome varchar(20) not null,
tipo varchar(20) not null
);

CREATE TABLE categorie(

cod int(2) not null primary key,
descrizione varchar(255) not null
);

CREATE TABLE privilegi(

codFisc char(16) not null REFERENCES utenti(codiceFisc),
categoria int(2) not null REFERENCES categoria(cod),

PRIMARY KEY (codFisc, categoria)
);


insert into utenti(codiceFisc, nome, cognome, tipo)
values("daaaaaaaaaaaaaaa","sunyx", "117", "dentista");
insert into utenti(codiceFisc, nome, cognome, tipo)
values("caaaaaaaaaaaaaaa","dirix", "dere", "dottore");
insert into utenti(codiceFisc, nome, cognome, tipo)
values("baaaaaaaaaaaaaaa","shu", "4", "akalimain");

insert into categorie(cod, descrizione)
values("01","stacca i denti");
insert into categorie(cod, descrizione)
values("02","fa i trapianti");
insert into categorie(cod, descrizione)
values("03","weiugfwuhegf");

insert into privilegi(codFisc, categoria)
values("daaaaaaaaaaaaaaa","01");
insert into privilegi(codFisc, categoria)
values("daaaaaaaaaaaaaaa","02");

insert into privilegi(codFisc, categoria)
values("caaaaaaaaaaaaaaa","01");
insert into privilegi(codFisc, categoria)
values("baaaaaaaaaaaaaaa","02");