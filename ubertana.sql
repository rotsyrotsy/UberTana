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
    modele VARCHAR(20),
    matricule VARCHAR(20),
    mdp VARCHAR(50),
    numTel VARCHAR(30),
    nationalite VARCHAR(20),
    dtn DATE,
    soldeInit DOUBLE PRECISION,
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

CREATE TABLE ClientRequest(
    IdCR VARCHAR(20) NOT NULL PRIMARY KEY,
    locLogDep NUMERIC(20,15),
    locLatDep NUMERIC(20,15),
    locLogArr NUMERIC(20,15),
    locLatArr NUMERIC(20,15),
    date_Time TIMESTAMP,
    emailPassager VARCHAR(20),
    foreign key (emailPassager) references Passager(email) ON DELETE CASCADE
);

CREATE SEQUENCE seqPaiement

CREATE TABLE DriverProposition(
    IdDrivProp VARCHAR(20) NOT NULL PRIMARY KEY,
    IdCR VARCHAR(20),
    IdDriver VARCHAR(20),
    propostion DOUBLE PRECISION,
    statue VARCHAR(20),
    foreign key (IdCR) references ClientRequest(IdCR) ON DELETE CASCADE,
    foreign key (IdDriver) references Client(email) ON DELETE CASCADE
);

CREATE TABLE Match(
    IdMatch VARCHAR(20) NOT NULL PRIMARY KEY,
    IdDriver VARCHAR(20),
    IdCR VARCHAR(20),
    foreign key (IdCR) references ClientRequest(IdCR) ON DELETE CASCADE,
    foreign key (IdDriver) references Client(email) ON DELETE CASCADE
);

-- simulation compte bancaire

CREATE TABLE BANKACCOUNT(
    cardNumber char(16) NOT NULL PRIMARY KEY,
    password bytea NOT NULL,
    sold DOUBLE PRECISION NOT NULL
);

-- config ariary->coin

CREATE TABLE CONFIG(
    ariary DOUBLE PRECISION NOT NULL,
    coin DOUBLE PRECISION NOT NULL
);

-- sequence de depot

CREATE SEQUENCE exchange_seq;

-- function create string id

CREATE OR REPLACE Function create_id (seq integer, head varchar, format varchar) returns varchar AS $$
        BEGIN
                RETURN concat(head,to_char(seq, format));
        END;
$$ LANGUAGE plpgsql;

-- generate depot Id function 

CREATE OR REPLACE Function depot_id () returns varchar AS $$
        declare 
            seq integer;
        BEGIN
            select into seq nextval('exchange_seq');
            return create_id(seq, 'DEP', '00000000');    
        END;
$$ LANGUAGE plpgsql;

-- function depot

CREATE OR REPLACE PROCEDURE depot (email VARCHAR, value DOUBLE PRECISION) AS $$
        declare 
            ratio DOUBLE PRECISION;
        BEGIN
            select into ratio ariary/coin from CONFIG limit 1;
            insert into depot values (depot_id(), email, ratio*value, current_timestamp);
            commit;  
        END;
$$ LANGUAGE plpgsql;



INSERT INTO Passager VALUES ('passenger1@gmail.com','passenger1',sha1('pass1')),
('passenger2@gmail.com','passenger2',sha1('pass2')),
('passenger3@gmail.com','passenger3',sha1('pass3'));
