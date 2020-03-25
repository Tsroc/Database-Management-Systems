Use dentist;


describe patient;
select * from patient Lock In Share Mode;
BEGIN;
insert into Patient(name, address, phone_no) values
("Leo Varadkar", "Dublin", "123456789"), ("Emmanuel Macron", "Paris", "287649103"),
("Donald Trump", "Washington DC", "347986432"), ("Xi Jinping", "Beijing", "198764036");
COMMIT;
select * from patient Lock In Share Mode;


describe treatment;
select * from treatment Lock In Share Mode;
BEGIN;
select * from treatment where id > 0;
insert into Treatment(patient_id, details, xray, xray_path) values
(1, "Tooth removal", load_file("C:/xrays/xray1.jpeg"), '/xray1.jpeg'),
(2, "Tooth filling", load_file("C:/xrays/xray2.jpeg"), '/xray2.jpeg'),
(3, "Tooth whitening", load_file("C:/xrays/xray3.jpeg"), '/xray3.jpeg');
COMMIT;
select * from treatment Lock In Share Mode;


describe bill;
select * from bill Lock In Share Mode;
BEGIN;
insert into Bill(treatment_id, total_due, total_paid) values (3, 200, 20), (2, 500, 0), (1, 1000, 200);
COMMIT;
select * from bill Lock In Share Mode;


describe specialist;
select * from specialist Lock In Share Mode;
BEGIN;
insert into Specialist(name) values ("Cora Parsons");
COMMIT;
select * from specialist Lock In Share Mode;


describe appointment;
select * from appointment Lock In Share Mode;
BEGIN;
select * from appointment where id > 0;
insert into Appointment(patient_id, time, date, reminder_sent) values
(1, "10:00", "2020-03-17", 1), (2, "14:00", "2020-03-17", 0);
COMMIT;
BEGIN;
select * from appointment where id > 2;
insert into Appointment(patient_id, time, date, specialist_id, reminder_sent) values
(3, "12:00", "2020-03-18", 1, 0);
COMMIT;
select * from appointment Lock In Share Mode;
