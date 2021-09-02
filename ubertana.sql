CREATE DATABASE ubertana;
CREATE TABLE Admin(
    email VARCHAR(20) NOT NULL PRIMARY KEY,
    mdp VARCHAR(50)
);

--client
CREATE TABLE Passager(
    email VARCHAR(20) NOT NULL PRIMARY KEY,
    nom VARCHAR(20),
    mdp VARCHAR(50),
<<<<<<< Updated upstream
    latitude REAL,
    longitude REAL
=======
    longitude DOUBLE PRECISION,
    latitude DOUBLE PRECISION
>>>>>>> Stashed changes
);
insert into Passager values ('P1@gmail.com','Rakoto','mdp', 47.53237774687274,-18.987805581715296);
insert into Passager values ('P2@gmail.com','Rabe','mdp', 47.533783794481764,-18.993494646563423);
insert into Passager values ('P3@gmail.com','Jean','mdp', 47.53288254789253,-18.984245266008585);


SELECT  
(
   3959 *
   acos(cos(radians(37)) * 
   cos(radians(latitude)) * 
   cos(radians(longitude) - 
   radians(-122)) + 
   sin(radians(37)) * 
   sin(radians(latitude )))
) AS distance 
FROM Passager 
HAVING distance < 28 
ORDER BY distance LIMIT 0, 20;


--chauffeur
CREATE TABLE Client(
    email VARCHAR(20) NOT NULL PRIMARY KEY,
    nom VARCHAR(20),
    mdp VARCHAR(50),
    numTel VARCHAR(30),
    nationalite VARCHAR(20),
    dtn DATE,
    soldeInit DOUBLE PRECISION,
<<<<<<< Updated upstream
    latitude REAL,
    longitude REAL,
    statut BOOLEAN -- 1 occupe 0 libre
=======
    longitude DOUBLE PRECISION,
    latitude DOUBLE PRECISION
>>>>>>> Stashed changes
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
