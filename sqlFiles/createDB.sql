Drop Database IF EXISTS Dentist; 
Create Database Dentist; 
Use Dentist;


Drop Table if exists Patient; 

Create Table Patient (
	id INT AUTO_INCREMENT PRIMARY KEY, name VARCHAR(255) NOT NULL, address VARCHAR(255), phone_no VARCHAR(20) UNIQUE
) Engine=InnoDB;


Drop Table if exists Treatment; 

Create Table Treatment (
	id INT AUTO_INCREMENT PRIMARY KEY, patient_id INT, details VARCHAR(255), xray LONGBLOB DEFAULT NULL, xray_path varchar(20) DEFAULT NULL,
	
    FOREIGN KEY (patient_id) REFERENCES patient(id)
	
) Engine=InnoDB;


Drop Table if exists Bill; 

Create Table Bill (
	id INT AUTO_INCREMENT PRIMARY KEY, treatment_id INT, total_due  DECIMAL(7,2), total_paid  DECIMAL(7,2),
	
	
    FOREIGN KEY (treatment_id) REFERENCES treatment(id)

) Engine=InnoDB;


Drop Table if exists Specialist; 

Create Table Specialist (
	id INT AUTO_INCREMENT PRIMARY KEY, name VARCHAR(255) NOT NULL
) Engine=InnoDB;


Drop Table if exists Appointment; 

Create Table Appointment (
	id INT AUTO_INCREMENT PRIMARY KEY, patient_id INT, time TIME, date DATE,
	specialist_id INT, reminder_sent BOOLEAN,
	
    FOREIGN KEY (patient_id) REFERENCES patient(id),
	FOREIGN KEY (specialist_id) REFERENCES specialist(id)

) Engine=InnoDB;
