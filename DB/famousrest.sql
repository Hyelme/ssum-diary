use hyelmedb; 
 
create table famous_rest (
   id int(4) not null,
   writer varchar(20) not null,
   topic varchar(50) not null,
   content text not null,	
   hit int(3) not null,
   wdate varchar(20) not null,
   filename varchar(80),
   filesize varchar(20),
   space int(2),
   primary key(id) );

desc famous_rest;