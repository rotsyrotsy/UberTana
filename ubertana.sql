CREATE DATABASE ubertana;
CREATE TABLE Admin(
    email VARCHAR(20) NOT NULL PRIMARY KEY,
    mdp VARCHAR(50)
);


CREATE TABLE Passager(
    email VARCHAR(20) NOT NULL PRIMARY KEY,
    nom VARCHAR(100),
    prenom VARCHAR(20),
    mdp VARCHAR(50),
    numTel VARCHAR(30),
    nationalite VARCHAR(20),
    dtn DATE,
    sexe varchar(2)
);

CREATE TABLE Client(
    email VARCHAR(20) NOT NULL PRIMARY KEY,
    nom VARCHAR(100),
    prenom VARCHAR(20),
    modele VARCHAR(20),
    matricule VARCHAR(20),
    mdp VARCHAR(50),
    numTel VARCHAR(30),
    nationalite VARCHAR(20),
    dtn DATE,
    sexe varchar(2)
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
insert into 

CREATE TABLE NoteChauffeur(
    emailClient VARCHAR(20),
    emailPassager VARCHAR(20),
    note INTEGER,
    foreign key (emailClient) references Client(email) ON DELETE CASCADE,
    foreign key (emailPassager) references Passager(email) ON DELETE CASCADE
);

create view noteParChauffeur as(
    select emailClient, avg(note) as moyenneNote from noteChauffeur group by emailClient
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
    password char(256) NOT NULL,
    sold DOUBLE PRECISION NOT NULL
);

-- config ariary->coin

CREATE TABLE CONFIG(
    ariary DOUBLE PRECISION NOT NULL,
    coin DOUBLE PRECISION NOT NULL
);

--view

CREATE OR REPLACE VIEW NPassagerNote as 
SELECT p.email as email,p.nom as nom,n.note as note FROM Passager p 
JOIN NotePassager n 
ON n.emailPassager = p.email;

CREATE OR REPLACE VIEW NDriverNote as 
SELECT c.email as email,c.nom as nom,n.note as note FROM Client c 
JOIN NoteChauffeur n 
ON n.emailClient = c.email;

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

CREATE OR REPLACE PROCEDURE depot (email VARCHAR, value DOUBLE PRECISION, card char) AS $$
        declare 
            ratio DOUBLE PRECISION;
        BEGIN
            select into ratio coin/ariary from CONFIG limit 1;
            insert into depot values (depot_id(), email, ratio*value, current_timestamp);
            update BANKACCOUNT set sold = sold - value where cardNumber = card;
        END;
$$ LANGUAGE plpgsql;


-- function turnover

CREATE OR REPLACE Function turnover(date1 date, date2 date) returns DOUBLE PRECISION AS $$
        declare 
            ariary DOUBLE PRECISION;
            sum_dep DOUBLE PRECISION;
        BEGIN
            select into ariary ariary from CONFIG;
            select into sum_dep sum(valeur) from depot where to_date(to_char(date_heure, 'YYYY/MM/DD')) between date1 and date2 limit 1;
            return arary * sum_dep;    
        END;
$$ LANGUAGE plpgsql;

-- current coin
CREATE OR REPLACE Function actual_coin (email VARCHAR) returns DOUBLE PRECISION AS $$
        declare 
            ent DOUBLE PRECISION;
            dep DOUBLE PRECISION;
        BEGIN
            select into ent sum(valeur) from depot where emailClient = email;
            select into dep sum(valeur) from Paiement where emailClient = email;
            if ent isnull then 
                ent = 0;
            end if;
            if dep isnull then
                dep = 0;
            end if;
            
            return ent - dep; 
        END;
$$ LANGUAGE plpgsql;

CREATE TABLE NotePassager(
    emailPassager VARCHAR(20),
    emailClient VARCHAR(20),
    note INTEGER,
    foreign key (emailPassager) references Passager(email) ON DELETE CASCADE,
    foreign key (emailClient) references Client(email) ON DELETE CASCADE
);

-- note moyenne du chauffeur 

select Client.nom as nomChauffeur, round(avg(noteChauffeur.note)) as noteMoyenne 
    from noteChauffeur join Client on Client.email = noteChauffeur.emailClient 
    group by Client.email

-- note moyenne du client

select passager.nom as nomPassager, round(avg(notePassager.note)) as noteMoyenne 
    from notePassager join passager on passager.email = notePassager.emailPassager 
    group by passager.email



-- Chiffre affaire par mois par année en coin 

-- select case extract(month from date_heure)
--     when 1 then 'Janvier'
--     when 2 then 'Fevrier'
--     when 3 then 'Mars'
--     when 4 then 'Avril'
--     when 5 then 'Mai'
--     when 6 then 'Juin'
--     when 7 then 'Juillet'
--     when 8 then 'Aout'
--     when 9 then 'Septembre'
--     when 10 then 'Octobre'
--     when 11 then 'Novembre'
--     else 'Decembre'
-- end as mois,sum(valeur) as chiffreAffaire from depot
-- where extract(year from date_heure) = 2021
-- group by extract(month from date_heure)


-- Chiffre affaire par mois par année en arriary 


CREATE OR REPLACE FUNCTION turnoverIn(year integer) returns table(mois text, valeur DOUBLE PRECISION)   AS $$
        declare 
            ariaryConfig DOUBLE PRECISION;
        BEGIN
            select into ariaryConfig ariary from CONFIG limit 1;
            return query 
                select case extract(month from date_heure)
                    when 1 then 'Janvier'
                    when 2 then 'Fevrier'
                    when 3 then 'Mars'
                    when 4 then 'Avril'
                    when 5 then 'Mai'
                    when 6 then 'Juin'
                    when 7 then 'Juillet'
                    when 8 then 'Aout'
                    when 9 then 'Septembre'
                    when 10 then 'Octobre'
                    when 11 then 'Novembre'
                    else 'Decembre'
                end as mois,sum(depot.valeur)*ariaryConfig as chiffreAffaire from depot
                where extract(year from date_heure) = year
                group by extract(month from date_heure);
        END;
$$ LANGUAGE plpgsql;


-- moyenne chiffreAffaire par annee


create or replace function moyenneCAAnnee(year integer) returns DOUBLE PRECISION as $$
	declare 
		ariaryConfig DOUBLE PRECISION;
		adding DOUBLE PRECISION;
		moyCA DOUBLE PRECISION;
	begin
		select into ariaryConfig ariary from config limit 1;
		select into adding sum(depot.valeur)*ariaryConfig as moyenne from depot
		where extract(year from date_heure) = year;
		select into moyCA avg(adding);
		return moyCA;
	end;
$$ language plpgsql;
