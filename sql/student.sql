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
	employ_department char (6) default null,
	employ_department1 char (6) default null,
	employ_department2 char (6) default null,
	employ_department3 char (6) default null

);
create table review
(
	id int unsigned not null,
	department char (6) not null,
	score int unsigned not null,
	review text
);
create table admin
(
	department char (6) not null,
	passwd char (32) not null
);
insert into admin values
	('root', '313d97f5cd36a4c239f860de286e8e73'),
	('技术部','e10adc3949ba59abbe56e057f20f883e'),
	('影音部','e10adc3949ba59abbe56e057f20f883e'),
	('宣传部','e10adc3949ba59abbe56e057f20f883e'),
	('采编部','e10adc3949ba59abbe56e057f20f883e'),
	('外事部','e10adc3949ba59abbe56e057f20f883e'),
	('策划部','e10adc3949ba59abbe56e057f20f883e')
;
