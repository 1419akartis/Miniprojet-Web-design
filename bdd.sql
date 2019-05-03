CREATE DATABASE pharmacie;

USE pharmacie;

CREATE TABLE Medicament(
    id INTEGER primary key AUTO_INCREMENT,
    idtype INTEGER,
    reference INTEGER,
    nom VARCHAR(20), 
    idcat INTEGER,
    idsouscat INTEGER,
    unite VARCHAR(20),
    descmedicament VARCHAR(50),
    idmodeadmin INTEGER,
    femmeenceinte boolean,
    allaitement boolean,
    iddestine INTEGER,
    img integer,
    prix integer,
    colonneindex VARCHAR(50),
    FOREIGN KEY(idtype) REFERENCES TypeMedicament(id),
    FOREIGN KEY(idcat) REFERENCES Categorie(id),
    FOREIGN KEY(idsouscat) REFERENCES SousCategorie(id),
    FOREIGN KEY(idmodeadmin) REFERENCES ModeAdministration(id),
    FOREIGN KEY(iddestine) REFERENCES ModeAdministration(id)
);

CREATE TABLE Destine(
    id INTEGER primary Key,
    nom VARCHAR(20)
);

CREATE TABLE TypeMedicament(
    id INTEGER primary key AUTO_INCREMENT,
    nom VARCHAR(20)
);

CREATE TABLE ModeAdministration(
    id INTEGER primary key AUTO_INCREMENT,  
    nom VARCHAR(20)
);

CREATE TABLE Categorie(
    id INTEGER primary key AUTO_INCREMENT,
    nom VARCHAR(20)
);  
CREATE TABLE SousCategorie(
    id INTEGER primary key AUTO_INCREMENT,
    idcat INTEGER,
    nom VARCHAR(20),
    FOREIGN KEY(idcat) REFERENCES Categorie(id)
);  
CREATE TABLE Client(
    idclient INTEGER primary key AUTO_INCREMENT,
    nom VARCHAR(20),
	email VARCHAR(50),
	mdp VARCHAR(27)
);

CREATE TABLE Livreur(
	idlivreur INTEGER primary key AUTO_INCREMENT,
	nom VARCHAR(20),
	contact VARCHAR(14)
);
CREATE TABLE Facture(
	idfact INTEGER primary key AUTO_INCREMENT,
	datefact DATE,
	idclient INTEGER,
    total INTEGER,
    etat INTEGER,
    idmeth INTEGER,
    dejapaye INTEGER,
    reste INTEGER,
	FOREIGN KEY(idclient) REFERENCES Client(idclient),
	FOREIGN KEY(etat) REFERENCES EtatFacture(cible),
	FOREIGN KEY(idmeth) REFERENCES MethodePaye(idmeth)
);
CREATE TABLE DetailFacture(
	idDetfact INTEGER primary key AUTO_INCREMENT,
	idfact VARCHAR(50),
	idmec VARCHAR(5),
	quantite INTEGER,
	prix INTEGER,
	montant INTEGER,
    remise INTEGER,
	FOREIGN KEY(idfact) REFERENCES Facture(idfact),
	FOREIGN KEY(idmec) REFERENCES Medicament(id)
);
CREATE TABLE HistoriqueFactureClient(
    idhist INTEGER primary key AUTO_INCREMENT,
    datehist DATE,
    idclient INTEGER,
    total INTEGER , 
    dejapaye INTEGER,
    reste INTEGER,
    FOREIGN KEY(idclient) REFERENCES Client(idclient)
);
CREATE TABLE MethodePaye(
    idmeth INTEGER primary key AUTO_INCREMENT,
    valeur VARCHAR(10)
);
INSERT INTO MethodePaye VALUES(NULL,'Especes');
INSERT INTO MethodePaye VALUES(NULL,'MVola');
INSERT INTO MethodePaye VALUES(NULL,'Cheques');
CREATE TABLE EtatFacture(
    idetat INTEGER primary key AUTO_INCREMENT,
    cible INTEGER,
    valeur VARCHAR(10)
);
INSERT INTO EtatFacture VALUES(NULL,1,'Tout paye');
INSERT INTO EtatFacture VALUES(NULL,2,'Non Paye');
INSERT INTO EtatFacture VALUES(NULL,12,'Valider');
INSERT INTO EtatFacture VALUES(NULL,13,'Viser');
INSERT INTO EtatFacture VALUES(NULL,3,'Supprimer');
CREATE TABLE ConfigRemise(
    idconf INTEGER primary key AUTO_INCREMENT,
    datedeb DATE,
    datefin DATE,
    valeur DECIMAL(5,3),
    montant INTEGER
);  
INSERT INTO ConfigRemise VALUES(NULL,'2018-12-08','2018-12-30',0.1);
INSERT INTO ConfigRemise VALUES(NULL,'2019-01-01','2019-01-30',0.2);


INSERT INTO TypeMedicament VALUES(NULL,"Allopathie");
INSERT INTO TypeMedicament VALUES(NULL,"Phytotherapie");
INSERT INTO TypeMedicament VALUES(NULL,"Homeopathie");
INSERT INTO TypeMedicament VALUES(NULL,"Oligotherapie");


INSERT INTO ModeAdministration VALUES(NULL,"Voie Orale");
INSERT INTO ModeAdministration VALUES(NULL,"Voie Nasale");

INSERT INTO Destine VALUES(1,'Bebe');
INSERT INTO Destine VALUES(2,'Enfant');
INSERT INTO Destine VALUES(3,'Adulte');

INSERT INTO Categorie VALUES(NULL,'Tous');
INSERT INTO Categorie VALUES(NULL,'Par symptome');
INSERT INTO Categorie VALUES(NULL,'Par maladie');
INSERT INTO Categorie VALUES(NULL,'Homeopathie et Medecines douces');
-- INSERT INTO Categorie VALUES(NULL,'Par zone de corps');
-- INSERT INTO Categorie VALUES(NULL,'Par principe actif');

INSERT INTO SousCategorie VALUES(NULL,2,'Douleurs et fievres');
INSERT INTO SousCategorie VALUES(NULL,2,'Muscles et articulations');
INSERT INTO SousCategorie VALUES(NULL,3,'Conjonctivite');
INSERT INTO SousCategorie VALUES(NULL,3,'Asthme');
INSERT INTO SousCategorie VALUES(NULL,4,'Homeopathie');
INSERT INTO SousCategorie VALUES(NULL,4,'Medecines douces');
INSERT INTO SousCategorie VALUES(NULL,1,'Tous');


INSERT INTO Medicament VALUES(NULL,1,200,'Efferalgan',2,1,'l','desc1',1,true,true,1,1,10000,'Efferalgandesc110000');
INSERT INTO Medicament VALUES(NULL,1,201,'Actron Comprime',2,1,'l','desc2',2,true,true,0,2,9000,'Actron Comprimedesc29000');
INSERT INTO Medicament VALUES(NULL,1,201,'Cotrime',2,1,'l','desc13',2,true,true,0,2,5000,'Actron Comprimedesc29000');
INSERT INTO Medicament VALUES(NULL,1,201,'Doliprane',2,1,'l','desc14',2,true,true,0,2,6000,'Actron Comprimedesc29000');
INSERT INTO Medicament VALUES(NULL,1,201,'Doliprane',2,1,'l','desc14',2,true,true,0,2,6000,'Actron Comprimedesc29000');
INSERT INTO Medicament VALUES(NULL,1,201,'Doliprane',2,1,'l','desc14',2,true,true,0,2,6000,'Actron Comprimedesc29000');

INSERT INTO Medicament VALUES(NULL,3,203,'Fervex',2,2,'l','desc3',1,true,true,1,3,30000,'Fervexdesc330000');
INSERT INTO Medicament VALUES(NULL,1,202,'HumexLib',2,2,'l','desc4',2,true,true,1,4,50000,'HumexLibdesc450000');
INSERT INTO Medicament VALUES(NULL,1,202,'Amoxicilline',2,2,'l','desc15',2,true,true,1,4,50000,'HumexLibdesc450000');
INSERT INTO Medicament VALUES(NULL,1,202,'Penicilline',2,2,'l','desc16',2,true,true,1,4,60000,'HumexLibdesc450000');

INSERT INTO Medicament VALUES(NULL,1,204,'Dacudose',3,3,'l','desc5',2,true,true,0,5,80000,'Dacudosedesc580000');
INSERT INTO Medicament VALUES(NULL,4,204,'Opticron',3,3,'l','desc6',2,true,true,0,6,50000,'Opticrondesc650000');
INSERT INTO Medicament VALUES(NULL,4,204,'Malox',3,3,'l','desc17',2,true,true,0,6,4000,'Opticrondesc650000');
INSERT INTO Medicament VALUES(NULL,4,204,'renny',3,3,'l','desc18',2,true,true,0,6,6000,'Opticrondesc650000');

INSERT INTO Medicament VALUES(NULL,2,200,'Manganese',3,4,'l','desc7',1,true,true,1,7,30000,'Manganesedesc730000');
INSERT INTO Medicament VALUES(NULL,1,205,'Drill',3,4,'l','desc8',2,true,true,0,8,40000,'Drilldesc840000');
INSERT INTO Medicament VALUES(NULL,1,205,'Nifluril',3,4,'l','desc19',2,true,true,0,8,40000,'Drilldesc840000');
INSERT INTO Medicament VALUES(NULL,1,205,'m-antacid',3,4,'l','desc20',2,true,true,0,8,20000,'Drilldesc840000');
INSERT INTO Medicament VALUES(NULL,1,205,'m-antacid',3,4,'l','desc20',2,true,true,0,8,20000,'Drilldesc840000');

INSERT INTO Medicament VALUES(NULL,2,206,'Lehning',4,5,'l','desc9',2,true,true,0,9,80000,'Lehningdesc980000');
INSERT INTO Medicament VALUES(NULL,1,206,'Boiron Arnica',4,5,'l','desc10',1,true,true,1,10,70000,'Boiron Arnicadesc1070000');
INSERT INTO Medicament VALUES(NULL,1,206,'Gamalate B6',4,5,'l','desc21',1,true,true,1,10,40000,'Boiron Arnicadesc1070000');
INSERT INTO Medicament VALUES(NULL,1,206,'Codeine',4,5,'l','desc22',1,true,true,1,10,20000,'Boiron Arnicadesc1070000');
INSERT INTO Medicament VALUES(NULL,1,206,'Codeine',4,5,'l','desc22',1,true,true,1,10,20000,'Boiron Arnicadesc1070000');
INSERT INTO Medicament VALUES(NULL,1,206,'Codeine',4,5,'l','desc22',1,true,true,1,10,20000,'Boiron Arnicadesc1070000');

INSERT INTO Medicament VALUES(NULL,4,208,'Fleur de Bach',4,6,'l','desc11',1,true,true,0,11,30000,'Fleur de Bachdesc1130000');
INSERT INTO Medicament VALUES(NULL,3,207,'Elixir',4,6,'l','desc12',1,true,true,1,12,20000,'Elixirdesc1220000');
INSERT INTO Medicament VALUES(NULL,3,207,'Depacking 750g',4,6,'l','desc23',1,true,true,1,12,20000,'Elixirdesc1220000');
INSERT INTO Medicament VALUES(NULL,3,207,'Fleming',4,6,'l','desc24',1,true,true,1,12,10000,'Elixirdesc1220000');

SELECT *
                FROM Medicament 
                where nom like 'Ef%'
                and idcat = 1
                and idsouscat = 1
                and prix > 5000
                and prix < 30000


                SELECT medicament.nom FROM souscategorie join medicament on souscategorie.id=medicament.idsouscat where medicament.nom like '%a%' and souscategorie.idcat = '2' and souscategorie.id = '4' and medicament.prix > '0' and medicament.prix < 100000 



SELECT *
FROM Medicament 
JOIN Categorie
ON Medicament.idcat = Categorie.id 
JOIN SousCategorie
ON Categorie.id = SousCategorie.idcat
where Medicament.colonneindex like 'Ef%' or Categorie.colonneindex like '%a%' or SousCategorie.colonneindex like '%%'

INSERT INTO Client VALUES(NULL,'Sitraka','sitraka@gmail.com','sitrakamdp');
INSERT INTO Client VALUES(NULL,'Faniry','faniry@gmail.com','Fanirymdp');


drop table facture;
drop table detailfacture;
drop table historiquefactureclient;