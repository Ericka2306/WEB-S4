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

CREATE TABLE regime(
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
    qte double precision
);

INSERT INTO Plat (nom, sary)
VALUES
    ('Plat 1', 'photo plat 1'),
    ('Plat 2', 'photo plat 2'),
    ('Plat 3', 'photo plat 3'),
    ('Plat 4', 'photo plat 4'),
    ('Plat 5', 'photo plat 5');