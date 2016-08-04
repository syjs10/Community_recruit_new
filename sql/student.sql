use student;

create table student
(
	id int unsigned not null auto_increment primary key,
	name char (10) not null,
	gender char (4) not null,
	class char (50) not null,
	phonenum char (11) not null,
	qqnum char (15) not null,
	department char (6) not null,
	department1 char (6) not null,
	department2 char (6) not null,
	department3 char (6) not null,
	introduction text,	
	employ_department char (6) default null
);
create table review
(
	id int unsigned not null primary key,
	score int unsigned not null,
	review text
);
create table admin
(
	department char (6) not null primary key,
	passwd char (32) not null
);
