CREATE DATABASE ubertana;
CREATE TABLE Admin(
    email VARCHAR(20) NOT NULL PRIMARY KEY,
    mdp VARCHAR(50)
);


CREATE TABLE Passager(
    email VARCHAR(20) NOT NULL PRIMARY KEY,
    nom VARCHAR(20),
    mdp VARCHAR(50),
    latitude REAL,
    longitude REAL
);

CREATE TABLE Client(
    email VARCHAR(20) NOT NULL PRIMARY KEY,
    nom VARCHAR(20),
    mdp VARCHAR(50),
    numTel VARCHAR(30),
    nationalite VARCHAR(20),
    dtn DATE,
    soldeInit DOUBLE PRECISION,
    latitude REAL,
    longitude REAL,
    statut BOOLEAN -- 1 occupe 0 libre
);

CREATE TABLE Demande(
    emailP VARCHAR(20),
    emailC VARCHAR(20),
    foreign key (emailP) references Passager(email) ON DELETE CASCADE,
    foreign key (emailC) references Client(email) ON DELETE CASCADE
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

INSERT INTO Passager VALUES ('passenger1@gmail.com','passenger1',sha1('pass1')),
('passenger2@gmail.com','passenger2',sha1('pass2')),
('passenger3@gmail.com','passenger3',sha1('pass3'));
