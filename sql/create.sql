create table Movie
(
	id int not NULL,
	title varchar(100) not NULL,
	year int,
	rating varchar(10),
	company varchar(50),
	primary key(id),
	check(id >= 0)
)ENGINE = INNODB;

create table Actor
(
	id int not NULL,
	last varchar(20),
	first varchar(20),
	sex varchar(6),
	dob date not NULL,
	dod date,
	primary key(id),
	check(id >= 1)
)ENGINE = INNODB;

create table Director
(
	id int not NULL,
	last varchar(20),
	first varchar(20),
	dob date,
	dod date,
	primary key(id),
	check(id >= 1)
)ENGINE = INNODB;

create table MovieGenre
(
	mid int not NULL,
	genre varchar(20),
	foreign key(mid) references Movie(id)
)ENGINE = INNODB;

create table MovieDirector
(
	mid int not NULL,
	did int not NUll,
	foreign key(mid) references Movie(id),
	foreign key(did) references Director(id)
)ENGINE = INNODB;

create table MovieActor
(
	mid int not null,
	aid int not null,
	role varchar(50),
	foreign key(mid) references Movie(id),
	foreign key(aid) references Actor(id)
)ENGINE = INNODB;

create table Review
(
	name varchar(20),
	time timestamp,
	mid int not null,
	rating int,
	comment varchar(500),
	foreign key(mid) references Movie(id)
)ENGINE = INNODB;

create table MaxPersonID
(
	id int not null,
	check (id >= 1)
)ENGINE = INNODB;

create table MaxMovieID
(
	id int not NULL,
	check (id >= 1)
)ENGINE = INNODB;








