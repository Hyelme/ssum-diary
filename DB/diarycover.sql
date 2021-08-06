use hyelmedb; 
 
create table diarycover (
   wdate datetime,
   writer varchar(50),
   dname varchar(50),  
   country1 varchar(30),
   country2 varchar(30),
   tdate1 varchar(20) not null,
   tdate2 varchar(20) not null,
   coverfile varchar(50) binary,
   covercolor varchar(20),
   hit int(5),
   primary key(wdate) );

desc diarycover;