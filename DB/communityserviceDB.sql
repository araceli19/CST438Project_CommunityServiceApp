DROP Table Pending_Volunteers;
DROP TABLE Current_Volunteers;
DROP TABLE Available_Services;
DROP TABLE Pending_Post;
DROP TABLE Volunteer;
DROP TABLE Volunteer_Organization;
DROP TABLE Website_Operator;


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

INSERT INTO  Website_Operator(ID, Name,Phone_Num, Email, Password)
VALUES (1, 'Tom B. Erichsen','(831)222-2222','Stavanger@gmail.com','4006Norway');
INSERT INTO  Website_Operator(ID, Name,Phone_Num, Email, Password)
VALUES (2, 'Liliana Jones','(831)123-2532', 'LilyJ@gmail.com','4005France');

INSERT INTO Volunteer_Organization(ID, Contact_name, Org_Name, Phone_Num, Email, Password)
VALUES(1, 'Andrea Humer', 'Otter Express', '(831)122-1234', 'ottterE@yahoo.com', '123London');
INSERT INTO Volunteer_Organization(ID, Contact_name, Org_Name, Phone_Num, Email, Password)
VALUES(2, 'Miriam London', 'Monterey Bay Aquarium', '(831)130-1744', 'MLondon@hotmail.com', '123Louisiana');

INSERT INTO Volunteer(ID, Name, DOB, School, School_ID, Hours, Phone_Num)
VALUES(1, 'Cecilia Perez', '12-04-1998', 'Seaside High School', 27493, 0, '(563)593-5859');
INSERT INTO Volunteer(ID, Name, DOB, School, School_ID, Hours, Phone_Num)
VALUES(2, 'Ozi Benini', '03-14-2003', 'Palma Middle School', 78420, 8, '(612)502-5256');
INSERT INTO Volunteer(ID, Name, DOB, School, School_ID, Hours, Phone_Num)
VALUES(3, 'Jess Noel', '07-28-1991', 10, '(562)384-1596');

INSERT INTO Pending_Post(Provider_ID, Status)
VALUES(2, 'Pending');
INSERT INTO Pending_Post(Provider_ID, Status)
VALUES(1, 'Approved');

INSERT INTO Available_Services(Organization_ID, Hours_Available, Volunteers_Needed, Description, Name_Of_Service, Phone_Num)
VALUES(1, 10, 5, 'Students needed to tutor first graders', 'Tutoring at Grace Elementary', '(347)390-0851');
  INSERT INTO Available_Services(Organization_ID, Hours_Available, Volunteers_Needed, Description, Name_Of_Service, Phone_Num)
VALUES(2, 5, 10, 'Community members needed to help with beach cleaning', 'Beach cleaning day', '(714)361-2381');

INSERT INTO Current_Volunteers(Volunteer_ID, Hours)
VALUES (2, 8);
INSERT INTO Current_Volunteers(Volunteer_ID, Hours)
VALUES (3, 10);
