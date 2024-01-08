DROP DATABASE DB11;
CREATE DATABASE DB11;
USE DB11;


CREATE TABLE Admin(
    id int primary key not null AUTO_INCREMENT,
    name varchar(50) not null,
    email varchar(255) not null,
    password varchar(255) not null
);
describe Admin;

INSERT INTO Admin(name, email, password) values("admin", "admin@gmail.com", "123456789");
SELECT * FROM Admin;


CREATE TABLE Author(
    id int primary key not null AUTO_INCREMENT,
    name varchar(50) not null,
    email varchar(255) not null,
    password varchar(255) not null
);
describe Author;


CREATE TABLE Category(
    id int primary key not null AUTO_INCREMENT,
    name varchar(255) not null,
    admin_id_fk INT not null,
    FOREIGN KEY (admin_id_fk) REFERENCES Admin(id)
);
describe Category;


CREATE TABLE Tag(
    id int primary key not null AUTO_INCREMENT,
    name varchar(255) not null,
    admin_id_fk INT not null,
    FOREIGN KEY (admin_id_fk) REFERENCES Admin(id)
);
describe Tag;


CREATE TABLE Wiki(
    id int primary key not null AUTO_INCREMENT,
    title varchar(255) not null,
    body varchar(20000) not null,
    categroy_id_fk int not null,
    FOREIGN KEY (categroy_id_fk) REFERENCES Category(id),
    author_id_fk INT not null,
    FOREIGN KEY (author_id_fk) REFERENCES Author(id)
);
describe Wiki;

CREATE TABLE Taged(
    id int primary key not null AUTO_INCREMENT,
    wiki_id_fk INT not null,
    FOREIGN KEY (wiki_id_fk) REFERENCES Wiki(id),
    tag_id_fk INT not null,
    FOREIGN KEY (tag_id_fk) REFERENCES Tag(id)
);

describe Taged;