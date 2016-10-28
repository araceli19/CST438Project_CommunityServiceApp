DROP Table IF EXISTS Pending_Volunteers;
DROP TABLE IF EXISTS Available_Services;
DROP TABLE IF EXISTS Pending_Post;
DROP TABLE IF EXISTS Volunteer;
DROP TABLE IF EXISTS Current_Volunteers;
DROP TABLE IF EXISTS Volunteer_Organization;
DROP TABLE IF EXISTS Website_Operator;


CREATE TABLE Website_Operator(
	ID INT PRIMARY KEY AUTO_INCREMENT,
	Name VARCHAR(20) NOT NULL,
	Phone_Num VARCHAR(13) NOT NULL,
	Email VARCHAR(50) NOT NULL,
	Password CHAR(30) NOT NULL
)ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE Volunteer_Organization(
	ID INT PRIMARY KEY AUTO_INCREMENT,
	Contact_name VARCHAR(30) NOT NULL,
	Org_Name VARCHAR(50) NOT NULL,
	Phone_Num VARCHAR(13) NOT NULL,
	Email VARCHAR(30) NOT NULL,
	Password CHAR(30) NOT NULL
)ENGINE=MyISAM DEFAULT CHARSET=utf8;


CREATE TABLE Volunteer(
ID INT(6) PRIMARY KEY AUTO_INCREMENT,
	Name VARCHAR(30) NOT NULL,
	DOB VARCHAR(10) NOT NULL,
	School VARCHAR(30),
	School_ID INT(6),
	Hours DOUBLE(3, 2) NOT NULL,
	Phone_Num VARCHAR (13) NOT NULL
)ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE Pending_Post(
	Provider_ID INT(6),
	Status VARCHAR(10),
	FOREIGN KEY (Provider_ID) REFERENCES Volunteer_Organization (ID)
)ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE Available_Services(
ID INT(6) PRIMARY KEY NOT NULL AUTO_INCREMENT,
Organization_ID INT(6),
Hours_Available DOUBLE(3, 2) NOT NULL,
Volunteers_Needed INT(3) NOT NULL,
Description VARCHAR(200) NOT NULL,
Name_Of_Service VARCHAR(50) NOT NULL,
Phone_Num VARCHAR(13) NOT NULL,
FOREIGN KEY (Organization_ID) REFERENCES Volunteer_Organization (ID)
)ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE Current_Volunteers(
	Volunteer_ID INT(6) NOT NULL,
	Available_Service_ID INT(6) NOT NULL,
	Hours DOUBLE(3,2),
	INDEX (Volunteer_ID),
	INDEX(Available_Service_ID),

	FOREIGN KEY(Volunteer_ID)
		REFERENCES Volunteer(ID) ON UPDATE CASCADE ON DELETE RESTRICT,
		FOREIGN KEY(Available_Service_ID)	REFERENCES Available_Services (ID)
)ENGINE=MyISAM DEFAULT CHARSET=utf8;


CREATE TABLE Pending_Volunteers(
	Volunteer_ID INT,
	Organization_ID INT,
	Available_ID INT,

	FOREIGN KEY (Volunteer_ID) REFERENCES Volunteer (ID) ON UPDATE CASCADE ON DELETE RESTRICT,
	FOREIGN KEY (Organization_ID) REFERENCES Volunteer_Organization (ID) ON UPDATE CASCADE ON DELETE RESTRICT,
FOREIGN KEY (Available_ID) REFERENCES Available_Services (ID) ON UPDATE CASCADE ON DELETE RESTRICT

)ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO Website_Operator VALUES (1, 'Tom B. Erichsen','(831)222-2222','Stavanger@gmail.com','4006Norway');
INSERT INTO Website_Operator VALUES(2, 'Liliana Jones','(831)123-2532', 'LilyJ@gmail.com','4005France');

INSERT INTO Volunteer_Organization VALUES(1, 'Andrea Humer', 'Otter Express', '(831)122-1234', 'ottterE@yahoo.com', '123London');
INSERT INTO Volunteer_Organization VALUES(2, 'Miriam London', 'Monterey Bay Aquarium', '(831)130-1744', 'MLondon@hotmail.com', '123Louisiana');

INSERT INTO Volunteer VALUES(1, 'Cecilia Perez', '12-04-1998', 'Seaside High School', 27, 0, '(563)593-5859');
INSERT INTO Volunteer VALUES(2, 'Ozi Benini', '03-14-2003', 'Palma Middle School', 78, 8, '(612)502-5256');


INSERT INTO Pending_Post VALUES(2, 'Pending');
 INSERT INTO Pending_Post VALUES(1, 'Approved');
