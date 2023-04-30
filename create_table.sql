create table data
(
	id int primary key auto_increment, 
	firstname varchar(255) default null, 
	lastname varchar(255) default null, 
	email varchar(255) default null
) default CHARSET=utf8;