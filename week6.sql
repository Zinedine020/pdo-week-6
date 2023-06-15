create database winkel;

use winkel;

create table producten (
    id int primary key auto_increment,
    naam varchar(255) not null,
    prijs_per_stuk decimal(10, 2) not null,
    beschrijving varchar(255)
);

INSERT INTO producten (naam, prijs_per_stuk, beschrijving)
VALUES ('Appel', 5.88, '1kg appels');

INSERT INTO producten (naam, prijs_per_stuk, beschrijving)
VALUES ('Melk', 3.89, '1 liter melk');


select * from producten

