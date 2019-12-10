use hyelme;

create table comment(
  comm_num int(5) not null auto_increment,
  bcomm_num int(5) not null,
  comm_writer varchar(30) not null,
  comment text not null,
  comm_date varchar(20) not null,
  primary key(comm_num));

desc comment;