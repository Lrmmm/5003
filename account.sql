drop table account;
create table account
(
    username        varchar(10),
    passwd          varchar(10),
    primary key (username)
);

insert into account
values ('Admin', 'xhyzm');

insert into account
values ('Xhy','000220');

insert into account
values ('lrm','000220');