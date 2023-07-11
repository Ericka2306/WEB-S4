CREATE DATABASE Regime;

CREATE user regime WITH PASSWORD 'regime';
GRANT ALL privileges On database "regime" to regime;
ALTER DATABASE regime OWNER TO regime;

psql -U regime regime

CREATE TABLE Genre(
    id serial PRIMARY KEY,
    genre varchar(10)
);
CREATE TABLE Utilisateur(
    id serial PRIMARY KEY,
    id_genre int,
    nom varchar(255),
    mail varchar(255),
    motdepasse varchar(255),
    caisse double precision,
    estAdmin int,
    FOREIGN KEY(id_genre) REFERENCES Genre(id)
);

CREATE TABLE Profil(
    id_utilisateur int,
    taille double precision,
    poids double precision,
    datemodif date,

    FOREIGN KEY(id_utilisateur) REFERENCES Utilisateur(id)
);

CREATE TABLE Regime(
    id serial PRIMARY KEY,
    prix double precision,
    nom varchar(20),
    duree int
);

CREATE TABLE Sport(
    id serial PRIMARY KEY,
    nom varchar(20),
    duree int
);


CREATE TABLE Plat(
    id serial PRIMARY KEY,
    nom varchar(20),
    sary varchar(255)
);


CREATE TABLE Exercice(
    id serial PRIMARY KEY,
    nom varchar(20),
    sary varchar(20)
);


CREATE TABLE Regime_plat(
    id_regime int,
    id_plat int,
    jour int,
    FOREIGN KEY(id_regime) REFERENCES Regime(id),
    FOREIGN KEY(id_plat) REFERENCES Plat(id)
);

CREATE TABLE Sport_exercice(
    id_sport int,
    id_exercice int,
    jour int,
    FOREIGN KEY(id_sport) REFERENCES Sport(id),
    FOREIGN KEY(id_exercice) REFERENCES Exercice(id)
);
CREATE TABLE Objectif(
    id serial PRIMARY KEY,
    objectif varchar(10)
);
CREATE TABLE Programme(
    id serial PRIMARY KEY,
    id_regime int,
    id_sport int,
    id_objectif int,
    montant double precision,
    intervalle_d int,
    intervalle_f int,

    FOREIGN KEY(id_regime) REFERENCES Regime(id),
    FOREIGN KEY(id_sport) REFERENCES Sport(id),
    FOREIGN KEy(id_objectif) REFERENCES Objectif(id)
);


CREATE TABLE User_Programme(
    id serial PRIMARY KEY,
    id_utilisateur int,
    id_programme int,
    debut date,
    fin date,

    FOREIGN KEY(id_utilisateur) REFERENCES Utilisateur(id),
    FOREIGN KEY(id_programme) REFERENCES Programme(id)
);


CREATE TABLE HistoriqueAchat(
    id serial PRIMARY KEY,
    id_user_programme int,
    montant double precision,
    dateAchat date,
    etat int,
    FOREIGN KEY(id_user_programme) REFERENCES User_Programme(id)
);


CREATE TABLE Code(
    id serial PRIMARY KEY,
    code int,
    valeur double precision,
    etat int
);


CREATE TABLE Depense(
    id serial PRIMARY KEY,
    designation varchar(255),
    prixUnitaire double precision,
    qte double precision,
    date_depense date
);

INSERT INTO Genre(genre) VALUES('Masculin'),('Feminin');
INSERT INTO Utilisateur (id_genre,nom,mail,motdepasse,caisse,estAdmin) VALUES 
(1,'USER 1','user1@gmail.com','user1',100000,1),
(2,'USER 2','user2@gmail.com','user2',100000,0),
(1,'USER 3','user3@gmail.com','user3',100000,0),
(2,'USER 4','user4@gmail.com','user4',100000,0),
(1,'USER 5','user5@gmail.com','user5',100000,0);
INSERT INTO Profil(id_utilisateur,taille,poids,datemodif) VALUES
(2,1.67,50,'2023-07-10'),
(3,1.67,50,'2023-07-10'),
(4,1.67,50,'2023-07-10'),
(5,1.67,50,'2023-07-10');

INSERT INTO REGIME (prix,nom,duree) VALUES 
(10000,'Regime 1',15),
(11000,'Regime 2',30),
(12000,'Regime 3',45),
(13000,'Regime 4',60),
(14000,'Regime 5',15),
(15000,'Regime 6',30),
(16000,'Regime 7',45),
(17000,'Regime 8',60),
(18000,'Regime 9',15),
(19000,'Regime 10',30);


INSERT INTO Sport(nom,duree)VALUES
('Sport 1',15),
('Sport 2',30),
('Sport 3',45),
('Sport 4',60),
('Sport 5',15),
('Sport 6',30),
('Sport 7',45),
('Sport 8',60),
('Sport 9',30),
('Sport 10',45);

INSERT INTO Plat(nom,sary) VALUES
('Plat 1','P1'),
('Plat 2','P2'),
('Plat 3','P3'),
('Plat 4','P4'),
('Plat 5','P5'),
('Plat 6','P6'),
('Plat 7','P7'),
('Plat 8','P8'),
('Plat 9','P9'),
('Plat 10','P10'),
('Plat 11','P11'),
('Plat 12','P12'),
('Plat 13','P13'),
('Plat 14','P14'),
('Plat 15','P15'),
('Plat 16','P16'),
('Plat 17','P17'),
('Plat 18','P18'),
('Plat 19','P19'),
('Plat 20','P20');

INSERT INTO Exercice(nom,sary) VALUES
('Exercice 1','E1'),
('Exercice 2','E2'),
('Exercice 3','E3'),
('Exercice 4','E4'),
('Exercice 5','E5'),
('Exercice 6','E6'),
('Exercice 7','E7'),
('Exercice 8','E8'),
('Exercice 9','E9'),
('Exercice 10','E10'),
('Exercice 11','E11'),
('Exercice 12','E12'),
('Exercice 13','E13'),
('Exercice 14','E14'),
('Exercice 15','E15'),
('Exercice 16','E16'),
('Exercice 17','E17'),
('Exercice 18','E18'),
('Exercice 19','E19'),
('Exercice 20','E20');


INSERT INTO Regime_plat(id_regime,id_plat,jour)VALUES
(1,1,1),(1,2,1),(1,3,1),(1,4,2),(1,5,2),(1,6,2),(1,7,3),(1,8,3),(1,9,3),(1,10,4),(1,11,4),(1,12,4),(1,13,5),(1,14,5),(1,15,5),(1,16,6),(1,17,6),(1,18,6),(1,19,7),(1,20,7),(1,1,7),
(2,1,1),(2,2,1),(2,3,1),(2,4,2),(2,5,2),(2,6,2),(2,7,3),(2,8,3),(2,9,3),(2,10,4),(2,11,4),(2,12,4),(2,13,5),(2,14,5),(2,15,5),(2,16,6),(2,17,6),(2,18,6),(2,19,7),(2,20,7),(2,1,7),
(3,1,1),(3,2,1),(3,3,1),(3,4,2),(3,5,2),(3,6,2),(3,7,3),(3,8,3),(3,9,3),(3,10,4),(3,11,4),(3,12,4),(3,13,5),(3,14,5),(3,15,5),(3,16,6),(3,17,6),(3,18,6),(3,19,7),(3,20,7),(3,1,7),
(4,1,1),(4,2,1),(4,3,1),(4,4,2),(4,5,2),(4,6,2),(4,7,3),(4,8,3),(4,9,3),(4,10,4),(4,11,4),(4,12,4),(4,13,5),(4,14,5),(4,15,5),(4,16,6),(4,17,6),(4,18,6),(4,19,7),(4,20,7),(4,1,7),
(5,1,1),(5,2,1),(5,3,1),(5,4,2),(5,5,2),(5,6,2),(5,7,3),(5,8,3),(5,9,3),(5,10,4),(5,11,4),(5,12,4),(5,13,5),(5,14,5),(5,15,5),(5,16,6),(5,17,6),(5,18,6),(5,19,7),(5,20,7),(5,1,7),
(6,1,1),(6,2,1),(6,3,1),(6,4,2),(6,5,2),(6,6,2),(6,7,3),(6,8,3),(6,9,3),(6,10,4),(6,11,4),(6,12,4),(6,13,5),(6,14,5),(6,15,5),(6,16,6),(6,17,6),(6,18,6),(6,19,7),(6,20,7),(6,1,7),
(7,1,1),(7,2,1),(7,3,1),(7,4,2),(7,5,2),(7,6,2),(7,7,3),(7,8,3),(7,9,3),(7,10,4),(7,11,4),(7,12,4),(7,13,5),(7,14,5),(7,15,5),(7,16,6),(7,17,6),(7,18,6),(7,19,7),(7,20,7),(7,1,7),
(8,1,1),(8,2,1),(8,3,1),(8,4,2),(8,5,2),(8,6,2),(8,7,3),(8,8,3),(8,9,3),(8,10,4),(8,11,4),(8,12,4),(8,13,5),(8,14,5),(8,15,5),(8,16,6),(8,17,6),(8,18,6),(8,19,7),(8,20,7),(8,1,7),
(9,1,1),(9,2,1),(9,3,1),(9,4,2),(9,5,2),(9,6,2),(9,7,3),(9,8,3),(9,9,3),(9,10,4),(9,11,4),(9,12,4),(9,13,5),(9,14,5),(9,15,5),(9,16,6),(9,17,6),(9,18,6),(9,19,7),(9,20,7),(9,1,7),
(10,1,1),(10,2,1),(10,3,1),(10,4,2),(10,5,2),(10,6,2),(10,7,3),(10,8,3),(10,9,3),(10,10,4),(10,11,4),(10,12,4),(10,13,5),(10,14,5),(10,15,5),(10,16,6),(10,17,6),(10,18,6),(10,19,7),(10,20,7),(10,1,7);


INSERT INTO Sport_exercice(id_sport,id_exercice,jour)VALUES
(1,1,1),(1,2,1),(1,3,1),(1,4,2),(1,5,2),(1,6,2),(1,7,3),(1,8,3),(1,9,3),(1,10,4),(1,11,4),(1,12,4),(1,13,5),(1,14,5),(1,15,5),(1,16,6),(1,17,6),(1,18,6),(1,19,7),(1,20,7),(1,1,7),
(2,1,1),(2,2,1),(2,3,1),(2,4,2),(2,5,2),(2,6,2),(2,7,3),(2,8,3),(2,9,3),(2,10,4),(2,11,4),(2,12,4),(2,13,5),(2,14,5),(2,15,5),(2,16,6),(2,17,6),(2,18,6),(2,19,7),(2,20,7),(2,1,7),
(3,1,1),(3,2,1),(3,3,1),(3,4,2),(3,5,2),(3,6,2),(3,7,3),(3,8,3),(3,9,3),(3,10,4),(3,11,4),(3,12,4),(3,13,5),(3,14,5),(3,15,5),(3,16,6),(3,17,6),(3,18,6),(3,19,7),(3,20,7),(3,1,7),
(4,1,1),(4,2,1),(4,3,1),(4,4,2),(4,5,2),(4,6,2),(4,7,3),(4,8,3),(4,9,3),(4,10,4),(4,11,4),(4,12,4),(4,13,5),(4,14,5),(4,15,5),(4,16,6),(4,17,6),(4,18,6),(4,19,7),(4,20,7),(4,1,7),
(5,1,1),(5,2,1),(5,3,1),(5,4,2),(5,5,2),(5,6,2),(5,7,3),(5,8,3),(5,9,3),(5,10,4),(5,11,4),(5,12,4),(5,13,5),(5,14,5),(5,15,5),(5,16,6),(5,17,6),(5,18,6),(5,19,7),(5,20,7),(5,1,7),
(6,1,1),(6,2,1),(6,3,1),(6,4,2),(6,5,2),(6,6,2),(6,7,3),(6,8,3),(6,9,3),(6,10,4),(6,11,4),(6,12,4),(6,13,5),(6,14,5),(6,15,5),(6,16,6),(6,17,6),(6,18,6),(6,19,7),(6,20,7),(6,1,7),
(7,1,1),(7,2,1),(7,3,1),(7,4,2),(7,5,2),(7,6,2),(7,7,3),(7,8,3),(7,9,3),(7,10,4),(7,11,4),(7,12,4),(7,13,5),(7,14,5),(7,15,5),(7,16,6),(7,17,6),(7,18,6),(7,19,7),(7,20,7),(7,1,7),
(8,1,1),(8,2,1),(8,3,1),(8,4,2),(8,5,2),(8,6,2),(8,7,3),(8,8,3),(8,9,3),(8,10,4),(8,11,4),(8,12,4),(8,13,5),(8,14,5),(8,15,5),(8,16,6),(8,17,6),(8,18,6),(8,19,7),(8,20,7),(8,1,7),
(9,1,1),(9,2,1),(9,3,1),(9,4,2),(9,5,2),(9,6,2),(9,7,3),(9,8,3),(9,9,3),(9,10,4),(9,11,4),(9,12,4),(9,13,5),(9,14,5),(9,15,5),(9,16,6),(9,17,6),(9,18,6),(9,19,7),(9,20,7),(9,1,7),
(10,1,1),(10,2,1),(10,3,1),(10,4,2),(10,5,2),(10,6,2),(10,7,3),(10,8,3),(10,9,3),(10,10,4),(10,11,4),(10,12,4),(10,13,5),(10,14,5),(10,15,5),(10,16,6),(10,17,6),(10,18,6),(10,19,7),(10,20,7),(10,1,7);


INSERT INTO Objectif(objectif) VALUES ('Diminuer'),('Augmenter');

INSERT INTO Programme (id_regime,id_sport,id_objectif,intervalle_d,intervalle_f)VALUES
(1,1,1,5,10),
(2,2,1,10,15),
(3,3,1,15,20),
(4,4,1,20,25),
(5,5,1,25,30),

(6,6,2,5,10),
(7,7,2,10,15),
(8,8,2,15,20),
(9,9,2,20,25),
(10,10,2,25,30);

INSERT INTO User_Programme(id_utilisateur,id_programme,debut) VALUES
(2,1,'2023-07-10'),
(3,4,'2023-07-10'),
(4,5,'2023-07-10'),
(5,10,'2023-07-10');

INSERT INTO HistoriqueAchat(id_user_programme,montant,dateAchat)VALUES
(1,100000,'2023-07-10'),
(2,100000,'2023-07-10'),
(3,100000,'2023-07-10'),
(4,100000,'2023-07-10');

INSERT INTO Code(code ,valeur ,etat) VALUES
(123456789 , 100000 , 0),
(123456790 , 110000 , 0),
(123456791 , 120000 , 0),
(123456792 , 130000 , 0),
(123456793 , 140000 , 0),
(123456794, 150000 , 0),
(123456795 , 170000 , 0),
(123456796 , 160000 , 0),
(123456797 , 180000 , 0),
(123456798 , 190000 , 0),
(123456799 , 200000 , 0),
(123456801 , 210000 , 0),
(123456802, 220000 , 0),
(123456803 , 230000 , 0),
(123456804 , 240000 , 0);

ALTER TABLE Utilisateur ADD Column estAdmin default 0 ;
alter table regime drop column intervalle_d;
alter table regime drop column intervalle_f;
alter table sport drop column intervalle_d;
alter table sport drop column intervalle_f;
alter table Programme add column intervalle_d int;
alter table Programme add column intervalle_f int;
