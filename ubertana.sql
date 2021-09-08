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


CREATE SEQUENCE seqPaiement;

CREATE SEQUENCE seqDriverProposition START 1;

CREATE TABLE DriverProposition(
    IdDrivProp VARCHAR(20) NOT NULL PRIMARY KEY,
    IdDriver VARCHAR(20),
    IdClient varchar(20),
    proposition DOUBLE PRECISION,
    statue INTEGER,
    dateProposition date,
    foreign key (IdDriver) references Client(email) ON DELETE CASCADE,
    foreign key (IdClient) references Passager(email) ON DELETE CASCADE
);

CREATE SEQUENCE seqMatch START 1;

CREATE TABLE Match(
    idMatch VARCHAR(20) NOT NULL PRIMARY KEY,
    idDriver VARCHAR(20),
    idClient VARCHAR(20),
    matchDate date,
    foreign key (idClient) references Passager(email) ON DELETE CASCADE,
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
            select into ration ariary/coin from CONFIG limit 1;
            insert into depot values (depot_id(), email, ratio*value, current_timestamp);
            commit;  
        END;
$$ LANGUAGE plpgsql;

insert into Passager values ('p1@gmail.com' ,'Jean','mdp');
 insert into Passager values ('p2@gmail.com' ,'Jeanne','mdp');
 insert into Passager values ('p3@gmail.com' ,'Jin','mdp');
 insert into Passager values ('p4@gmail.com' ,'Marco','mdp');
 insert into Passager values ('p5@gmail.com' ,'Mami','mdp');
 insert into Passager values ('p6@gmail.com' ,'Koto','mdp');

 insert into Client values ('C1@gmail.com','Bob',null,null,null,null,null);
 insert into Client values ('C2@gmail.com','Rakoto',null,null,null,null,null);
