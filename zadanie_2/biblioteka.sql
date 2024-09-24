create database biblioteka;

create table Autorzy (
	id SERIAL primary key,
	imie varchar(30) not null,
	nazwisko varchar(30) not null
)

create table Ksiazki (
	id SERIAL primary key,
	tytul varchar(50) not null,
	rok_publikacji numeric(4) not null,
	isbn numeric(13) not null,
	id_autor int not null,
	constraint fk_Autorzy foreign key(id_autor) references Autorzy(id)
)

create table Recenzje (
	id serial primary key,
	ocena int check (ocena between 1 and 10),
	tresc text,
	id_ksiazka int not null,
	constraint fk_Ksiazki foreign key(id_ksiazka) references Ksiazki(id)
)


INSERT INTO Autorzy (imie, nazwisko) 
VALUES 
('Jane', 'Austen'),
('Mark', 'Twain'),
('Leo', 'Tolstoy'),
('F. Scott', 'Fitzgerald'),
('George', 'Orwell'),
('J.K.', 'Rowling'),
('Agatha', 'Christie'),
('Herman', 'Melville'),
('Toni', 'Morrison'),
('Gabriel', 'Garcia Marquez')

INSERT INTO Ksiazki (tytul, rok_publikacji, isbn, id_autor) 
VALUES 
('Pride and Prejudice', 1813, 9781503290563, 1),
('Sense and Sensibility', 1811, 9781503290564, 1),
('The Adventures of Tom Sawyer', 1876, 9781503215062, 2),
('The Prince and the Pauper', 1881, 9781503215024, 2),
('War and Peace', 1869, 9780199232765, 3),
('Anna Karenina', 1877, 9780199232766, 3),
('The Great Gatsby', 1925, 9780743273565, 4),
('1984', 1949, 9780451524935, 5),
('Harry Potter and the Philosophers Stone', 1997, 9780747532699, 6),
('Harry Potter and the Chamber of Secrets', 1998, 9780747538493, 6),
('Murder on the Orient Express', 1934, 9780062693662, 7),
('And Then There Were None', 1939, 9780062676504, 7),
('Moby Dick', 1851, 9781503280786, 8),
('Song of Solomon', 1977, 9780452280428, 9),
('One Hundred Years of Solitude', 1967, 9780060883287, 10)

INSERT INTO Recenzje (ocena, tresc, id_ksiazka) 
VALUES 
(9, 'A brilliant exploration of class and relationships.', 1),
(8, 'An insightful look into the world of societal expectations.', 2),
(7, 'A fun and adventurous tale for all ages.', 3),
(9, 'A fascinating story about identity and friendship.', 4),
(10, 'An epic masterpiece that spans generations.', 5),
(9, 'A tragic story of love and loss.', 6),
(8, 'A tragic story of love and loss in the Jazz Age.', 7),
(9, 'A chilling look into a dystopian future.', 8),
(10, 'A magical journey that captures the imagination.', 9),
(9, 'An exciting sequel filled with adventure.', 10),
(8, 'A gripping mystery that keeps you guessing.', 11),
(9, 'A tense and thrilling whodunit.', 12),
(7, 'A deep and philosophical narrative.', 13),
(9, 'A profound narrative on identity and heritage.', 14),
(10, 'A stunning tale of magic and reality interwoven.', 15)

create view vw_best_authors as
select avg(ocena), a.imie, a.nazwisko from recenzje
inner join ksiazki k on recenzje.id_ksiazka = k.id
inner join autorzy a on k.id_autor = a.id 
group by a.imie, a.nazwisko
order by avg(ocena) desc
limit 5
