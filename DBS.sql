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
INSERT INTO `author` (`id`, `name`, `email`, `password`) VALUES (NULL, 'test1', 'test1@gmail.com', '123456789');



CREATE TABLE Category(
    id int primary key not null AUTO_INCREMENT,
    name varchar(255) not null,
    admin_id_fk INT not null,
    FOREIGN KEY (admin_id_fk) REFERENCES Admin(id)
);
describe Category;
INSERT INTO `category` (`id`, `name`, `admin_id_fk`) VALUES (NULL, 'Science', '1');
INSERT INTO `category` (`id`, `name`, `admin_id_fk`) VALUES (NULL, 'Programming', '1');
INSERT INTO `category` (`id`, `name`, `admin_id_fk`) VALUES (NULL, 'Biology', '1');
INSERT INTO `category` (`id`, `name`, `admin_id_fk`) VALUES (NULL, 'Plants', '1');
INSERT INTO `category` (`id`, `name`, `admin_id_fk`) VALUES (NULL, 'Animals', '1');



CREATE TABLE Tag(
    id int primary key not null AUTO_INCREMENT,
    name varchar(255) not null,
    admin_id_fk INT not null,
    FOREIGN KEY (admin_id_fk) REFERENCES Admin(id),
    createAt DATE NOT NULL
);
describe Tag;
INSERT INTO `tag` (`id`, `name`, `admin_id_fk`, `createAt`) VALUES (NULL, 'Cat', '1', CURRENT_TIMESTAMP);


CREATE TABLE Wiki(
    id int primary key not null AUTO_INCREMENT,
    title varchar(255) not null,
    body varchar(20000) not null,
    category_id_fk int not null,
    FOREIGN KEY (category_id_fk) REFERENCES Category(id),
    author_id_fk INT not null,
    FOREIGN KEY (author_id_fk) REFERENCES Author(id),
    createAt DATE NOT NULL
);
describe Wiki;
INSERT INTO `wiki` (`id`, `title`, `body`, `category_id_fk`, `author_id_fk`, `createAt`) VALUES (NULL, 'Cats history', 'Cats bla bla bla.', '6', '1', CURRENT_TIMESTAMP);


CREATE TABLE Taged(
    id int primary key not null AUTO_INCREMENT,
    wiki_id_fk INT not null,
    FOREIGN KEY (wiki_id_fk) REFERENCES Wiki(id),
    tag_id_fk INT not null,
    FOREIGN KEY (tag_id_fk) REFERENCES Tag(id)
);
describe Taged;
INSERT INTO `taged` (`id`, `wiki_id_fk`, `tag_id_fk`) VALUES (NULL, '1', '1');