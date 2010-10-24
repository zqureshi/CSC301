create table xth_6487779_school.teacher(
	ID integer primary key,
	surName varchar(15),
	firstName varchar(15),
	email varchar(25),
	password char(15)
);

create table xth_6487779_school.booking(
	Date date,
	tID integer,
	rID integer,
	ID integer,
	course varchar(15),
	note varchar(100),
	foreign key(ID) references xth_6487779_school.teacher(ID),
	foreign key(rID) references xth_6487779_school.room(rID),
	foreign key(tID) references xth_6487779_school.time(tID),
	primary key (Date, tID, rID)
);

create table xth_6487779_school.room(
	rID integer primary key,
	name varchar(15)
);

create table xth_6487779_school.time(
	tID integer primary key,
	time datetime
);
