use students;

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
	introduction text
);
