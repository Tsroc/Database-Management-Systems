Use dentist;

select * from patient Lock In Share Mode;

Begin;
Delete from patient where id = 4;
Commit;

select * from patient Lock In Share Mode;
