 DROP TABLE IF EXISTS Pending_Volunteers;
 DROP TABLE IF EXISTS Available_Services;
 DROP TABLE IF EXISTS Pending_Post;
 DROP TABLE IF EXISTS Volunteer;
 DROP TABLE IF EXISTS Current_Volunteers;
 DROP TABLE IF EXISTS Volunteer_Organization;
 DROP TABLE IF EXISTS Website_Operator;
 DROP TABLE IF EXISTS google_users;

 CREATE TABLE IF NOT EXISTS `google_users` (
   `google_id` decimal(21,0) NOT NULL,
   `google_name` varchar(100) NOT NULL,
   `google_email` varchar(100) NOT NULL,
   `google_link` varchar(100) NOT NULL,
   `google_picture_link` varchar(200) NOT NULL,
   PRIMARY KEY (`google_id`)
 ) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
	Hours DOUBLE(10,2) NOT NULL,
	Phone_Num VARCHAR (13) NOT NULL
)ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE Pending_Post(
	Provider_ID INT(6),
	Status boolean,
	FOREIGN KEY (Provider_ID) REFERENCES Volunteer_Organization (ID)
)ENGINE=MyISAM DEFAULT CHARSET=utf8;


CREATE TABLE Available_Services(
ID INT(6) PRIMARY KEY NOT NULL AUTO_INCREMENT,
Organization_ID INT(6),
Category_ID smallint(6) NOT NULL,
Hours_Available DOUBLE(10,2) NOT NULL,
Volunteers_Needed INT(3) NOT NULL,
Description VARCHAR(200) NOT NULL,
Name_Of_Service VARCHAR(50) NOT NULL,
Phone_Num VARCHAR(13) NOT NULL,
FOREIGN KEY (Organization_ID) REFERENCES Volunteer_Organization (ID)
)ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE Current_Volunteers(
	Volunteer_ID INT(6) NOT NULL,
	Available_Service_ID VARCHAR(6) NOT NULL,
	Hours DOUBLE(10,2),
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

INSERT INTO Website_Operator (Name, Phone_Num, Email, Password) VALUES ('Tom B. Erichsen','(831)222-2222','Stavanger@gmail.com','4006Norway');
INSERT INTO Website_Operator (Name, Phone_Num, Email, Password) VALUES('Liliana Jones','(831)123-2532', 'LilyJ@gmail.com','4005France');
INSERT INTO Website_Operator (Name, Phone_Num, Email, Password) VALUES('Bob Smith', '(831)732-4021', 'BobS@gmail.com', '5678Cat');

INSERT INTO Volunteer_Organization (Contact_name, Org_Name, Phone_Num, Email, Password) VALUES('Andrea Humer', 'Otter Express', '(831)122-1234', 'ottterE@yahoo.com', '123London');
INSERT INTO Volunteer_Organization (Contact_name, Org_Name, Phone_Num, Email, Password) VALUES('Miriam London', 'Monterey Bay Aquarium', '(831)130-1744', 'MLondon@hotmail.com', '123Louisiana');
INSERT INTO Volunteer_Organization (Contact_name, Org_Name, Phone_Num, Email, Password) VALUES('Mayra Coloma', 'Boys and Girls Club', '(431)567-1358', 'gabc@yahoo.com', 'pass123');

INSERT INTO Volunteer (Name, DOB, School, School_ID, Hours, Phone_Num) VALUES('Cecilia Perez', '12-04-1998', 'Seaside High School', 27493, 0, '(563)593-5859');
INSERT INTO Volunteer (Name, DOB, School, School_ID, Hours, Phone_Num) VALUES('Ozi Benini', '03-14-2003', 'Palma Middle School', 78420, 8.5, '(612)502-5256');
INSERT INTO Volunteer (Name, DOB, Hours, Phone_Num) VALUES('Jess Noel', '07-28-1991', 10.2, '(562)384-1596');
INSERT INTO Volunteer (Name, DOB, Hours, Phone_Num) VALUES('Irais Chino', '07-05-1990', 27.2, '(231)952-8521');


INSERT INTO Pending_Post (Provider_ID, Status) VALUES(2, 1);
INSERT INTO Pending_Post (Provider_ID, Status) VALUES(1, 0);
INSERT INTO Pending_Post (Provider_ID, Status) VALUES(3, 1);

INSERT INTO  Available_Services (Organization_ID, Hours_Available, Volunteers_Needed, Description, Name_Of_Service, Phone_Num) VALUES(1, 10, 5, 'Students needed to tutor first graders', 'Tutoring at Grace Elementary', '(347)390-0851');
INSERT INTO  Available_Services (Organization_ID, Hours_Available, Volunteers_Needed, Description, Name_Of_Service, Phone_Num) VALUES(2, 5, 10, 'Community members needed to help with beach cleaning', 'Beach cleaning day', '(714)361-2381');

INSERT INTO Current_Volunteers (Volunteer_ID, Available_Service_ID, Hours) VALUES (2, 1, 2.5);
INSERT INTO Current_Volunteers (Volunteer_ID, Available_Service_ID, Hours) VALUES (3, 1, 2.0);
