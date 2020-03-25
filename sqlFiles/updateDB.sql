Use dentist;

select * from patient Lock In Share Mode;

Begin;
Select * from patient where id = 1 for update;
update patient set name="Michael D. Higgins", address="Galway" where id = 1;
Commit;

select * from patient Lock In Share Mode;
