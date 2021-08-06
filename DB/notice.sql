use hyelmedb; 
 
create table notice (
   id int(4) not null,
   writer varchar(20) not null,
   topic varchar(50) not null,
   content text not null,	
   hit int(3) not null,
   wdate varchar(20) not null,
   space int(2),
   primary key(id) );

desc notice;