DROP SEQUENCE  IF EXISTS seq_agence;
DROP SEQUENCE  IF EXISTS seq_client;
DROP SEQUENCE  IF EXISTS seq_compte;

DROP TABLE  IF EXISTS compte;
DROP TABLE  IF EXISTS client;
DROP TABLE  IF EXISTS agence;



create table agence (
id_agence numeric not null,
code_agence varchar(3),
nom varchar(20),
adresse varchar(200),
CONSTRAINT id_agence_PK PRIMARY KEY(id_agence)
);

create table client (
id_cli numeric not null,
numero varchar(8),
nom varchar(30),prenom varchar(30),
date_de_naissance date,
email varchar (255),
id_agence numeric null,
CONSTRAINT client_PK PRIMARY KEY (id_cli),
CONSTRAINT agence_FK FOREIGN KEY (id_agence) REFERENCES agence (id_agence)
);



create table compte ( 
id_compte numeric not null,
numero numeric(11),
type_compte varchar(20),
Solde numeric,
decouvert boolean, 
id_agence numeric  null,
id_cli numeric null,
CONSTRAINT compte_PK PRIMARY KEY (id_compte),
CONSTRAINT agence_FK FOREIGN KEY (id_agence) REFERENCES agence (id_agence),
CONSTRAINT client_FK FOREIGN KEY (id_cli) REFERENCES client (id_cli)
);


CREATE SEQUENCE  IF NOT EXISTS  seq_agence  INCREMENT  BY 1
    START  with 1
    OWNED BY agence.id_agence;






CREATE SEQUENCE  IF NOT EXISTS  seq_client INCREMENT  BY 1
    
    START  with 1
    OWNED BY client.id_cli;




CREATE SEQUENCE  IF NOT EXISTS  seq_compte INCREMENT  BY 1
    START  with 1
    OWNED BY compte.id_compte;
   
   
insert into agence values (nextval('seq_agence'),'001','CA','7 rue des banques');
insert into agence values (nextval('seq_agence'),'002','CM','8 rue des banques');
insert into agence values (nextval('seq_agence'),'003','CZ','46 rue des peupliers');
insert into agence values (nextval('seq_agence'),'004','PO','30 boulevard Frontois');
insert into agence values (nextval('seq_agence'),'005','KP','49 bis rue du temple');

commit; 
   
insert into client values (nextval('seq_client'),'NE575677','Blaya','Mike',to_date('25/10/87','dd/MM/yy'),'blaya@gmail.com',1);
insert into client values (nextval('seq_client'),'XU894913','MonsieurA','Jean',to_date('18/06/84','dd/MM/yy'),'Jean@gmail.com',1);
insert into client values (nextval('seq_client'),'TW711312','Delporte','Clay', to_date('14/02/76','dd/MM/yy'),'delporte@gmail.com',5);
insert into client values (nextval('seq_client'),'LC307682','Dalton','David',to_date('07/12/02','dd/MM/yy'),'dd@gmail.com',3);
insert into client values (nextval('seq_client'),'EE559402','de Nazareth','Jesus',to_date('25/12/01','dd/MM/yy'),'bible@gmail.com',4);
insert into client values (nextval('seq_client'),'IV256213','Freg','Martin',to_date('02/09/54','dd/MM/yy'),'freg@gmail.com',4);
insert into client values (nextval('seq_client'),'IN153329','Zil','Fa',to_date('01/01/02','dd/MM/yy'),'fazil@gmail.com',2);

commit;




insert into compte values (nextval('seq_compte'),12075149338,'Livret A',500,TRUE, 1,1);
insert into compte values (nextval('seq_compte'),67516630624,'PEL',500,TRUE, 1, 1);
insert into compte values (nextval('seq_compte'),22686091328,'PEL',4,FALSE,1,2);    
insert into compte values (nextval('seq_compte'),43977479608,'PEL',4,FALSE, 2,3);
insert into compte values (nextval('seq_compte'),97563855355,'Livret A',800,FALSE, 2,3);
insert into compte values (nextval('seq_compte'),77161236451,'compte Courant',50,TRUE, 2,3);
insert into compte values (nextval('seq_compte'),97157725031,'PEL',8000,TRUE, 3,4);
insert into compte values (nextval('seq_compte'),85083945486,'Compte courant',23,FALSE, 4,5);
insert into compte values (nextval('seq_compte'),99110063070,'Livret A',500,TRUE, 4,5);
insert into compte values (nextval('seq_compte'),26619119662,'Compte courant',500,FALSE, 4,6);
insert into compte values (nextval('seq_compte'),22246373433,'Livret A',4679,FALSE, 5,7);

commit;
