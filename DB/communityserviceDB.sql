DROP TABLE Website_Operator;
DROP TABLE Volunteer_Organization;
DROP TABLE Volunteer;
DROP TABLE Pending_Post;
DROP TABLE Available_Services;
DROP TABLE Current_Volunteers;
DROP Table Pending_Volunteers;

CREATE TABLE Website_Operator(
	ID INT PRIMARY KEY AUTO_INCREMENT,
	Name VARCHAR(20) NOT NULL,
	Phone_Num VARCHAR(13) NOT NULL,
	Email VARCHAR(50) NOT NULL,
	Password CHAR(30) NOT NULL
);

CREATE TABLE Volunteer_Organization(
	ID INT PRIMARY KEY AUTO_INCREMENT,
	Contact_name VARCHAR(30) NOT NULL,
	Org_Name VARCHAR(50) NOT NULL,
	Phone_Num VARCHAR(13) NOT NULL,
	Email VARCHAR(30) NOT NULL,
	Password CHAR(30) NOT NULL
);


CREATE TABLE Volunteer(
ID INT PRIMARY KEY AUTO_INCREMENT,
	Name VARCHAR(30) NOT NULL,
	DOB VARCHAR(10) NOT NULL,
	School VARCHAR(30),
	School_ID INT(6),
	Hours DOUBLE NOT NULL,
	Phone_Num VARCHAR (13) NOT NULL
);

CREATE TABLE Pending_Post(
	Provider_ID INT(6),
	Status boolean,
	FOREIGN KEY (Provider_ID) REFERENCES Volunteer_Organization (ID)
);

CREATE TABLE Available_Services(
	ID INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
Organization_ID INT(6),
Hours_Available DOUBLE NOT NULL,
Volunteers_Needed INT(3) NOT NULL,
Description VARCHAR(200) NOT NULL,
Name_Of_Service VARCHAR(50) NOT NULL,
Phone_Num VARCHAR(13) NOT NULL,
FOREIGN KEY (Organization_ID) REFERENCES Volunteer_Organization (ID)
);

CREATE TABLE Current_Volunteers(
	Volunteer_ID INT  NOT NULL,
	Hours DOUBLE,
	Available_Service_ID INT NOT NULL,

	INDEX (Volunteer_ID),
	INDEX(Available_Service_ID),

	FOREIGN KEY(Volunteer_ID)
		REFERENCES Volunteer(ID) ON UPDATE CASCADE ON DELETE RESTRICT,
	FOREIGN KEY(Available_Service_ID)
		REFERENCES Available_Services (ID)
);


CREATE TABLE Pending_Volunteers(
	Volunteer_ID INT,
	Organization_ID INT,
	Available_ID INT,

	FOREIGN KEY (Volunteer_ID) REFERENCES Volunteer (ID) ON UPDATE CASCADE ON DELETE RESTRICT,

	FOREIGN KEY (Organization_ID) REFERENCES Volunteer_Organization (ID) ON UPDATE CASCADE ON DELETE RESTRICT,

FOREIGN KEY (Available_ID) REFERENCES Available_Services (ID) ON UPDATE CASCADE ON DELETE RESTRICT

);
