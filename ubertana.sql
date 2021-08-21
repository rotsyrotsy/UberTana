CREATE DATABASE ubertana;
CREATE TABLE Admin(
    email VARCHAR(20) NOT NULL PRIMARY KEY,
    mdp VARCHAR(50)
);


CREATE TABLE Passager(
    email VARCHAR(20) NOT NULL PRIMARY KEY,
    nom VARCHAR(20),
    mdp VARCHAR(50)
);

CREATE TABLE Client(
    email VARCHAR(20) NOT NULL PRIMARY KEY,
    nom VARCHAR(20),
    mdp VARCHAR(50),
    numTel VARCHAR(30),
    nationalite VARCHAR(20),
    dtn DATE,
    soldeInit DOUBLE PRECISION
);

CREATE TABLE Paiement(
    idPaiement VARCHAR(20) NOT NULL PRIMARY KEY,
    emailClient VARCHAR(20),
    valeur  DOUBLE PRECISION,
    date_heure TIMESTAMP,
    foreign key (emailClient) references Client(email) ON DELETE CASCADE
);

CREATE TABLE Depot(
    idDepot VARCHAR(20) NOT NULL PRIMARY KEY,
    emailClient VARCHAR(20),
    valeur  DOUBLE PRECISION,
    date_heure TIMESTAMP,
    foreign key (emailClient) references Client(email) ON DELETE CASCADE
);

CREATE TABLE Note(
    emailClient VARCHAR(20),
    emailPassager VARCHAR(20),
    note INTEGER,
    foreign key (emailClient) references Client(email) ON DELETE CASCADE,
    foreign key (emailPassager) references Passager(email) ON DELETE CASCADE
);


