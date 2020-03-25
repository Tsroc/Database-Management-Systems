# Eoin Wilkie - G00363134

## Database Management Systems Project 2020
The aim of the project is to assess your ability to design and construct a database that can be deployed on “the cloud” using WAMP.\

## SQL scripts
createDB: Creates the Dentist database and the associated tables.\
deleteDB: Begins a transaction and deletes a record from the patient table.\
describeDB: Describes all tables in the Dentist database.\
populateDB: Populates the Dentist databases tables with a series of transaction.\
selectDB: Begins a transaction and displays all tables in the Dentist database.\
updateDB: Updates a record in the patient table.\

## PHP scripts
appointments:Displays the appointment table.\
*select a.id, p.name, a.time, a.date, t.details, IF(s.id=0, '', s.name) as specialist, b.total_due,\
b.total_paid, (b.total_due-b.total_paid)as bill_remaining, IF(a.reminder_sent=0, 'NO', 'YES') as reminder\
from appointment a INNER JOIN patient p ON p.id = a.patient_id\
INNER JOIN treatment t ON t.patient_id = a.patient_id\
INNER JOIN bill b ON b.treatment_id = t.id\
LEFT JOIN specialist s ON s.id = a.specialist_id ORDER BY a.id ASC*\
\
bills: Displays the bill table.\
*Select b.id, p.name, b.total_due, b.total_paid from bill b INNER JOIN patient p ON b.patient_id = p.id*\
\
patient: Displays the patient table.\
*Select id, name, address, phone_no from patient*\
\
specialists: Displays the specialist table.\
*Select id, name from specialist*\
\
treatments: Displays the treatment table.\
*Select t.id, p.name, t.details, t.xray, t.xray_path from treatment t INNER JOIN patient p ON t.patient_id = p.id*\
\
image_blobs: Used by treatments.php to diplay blob datatypes.
