--Dragons Master Table
DROP TABLE dragons_master;
CREATE TABLE dragons_master(
	id	 SERIAL	 PRIMARY KEY,
	dragons_roster_id	 INT	 NOT NULL,
	dragons_alumni_id	 INT	 NOT NULL);

--Dragons Roster Table
DROP TABLE dragons_roster;
CREATE TABLE dragons_roster(
	id SERIAL	 PRIMARY KEY,
	player_id	 INT	 NOT NULL);

--Dragons Player Table
DROP TABLE player;
CREATE TABLE player(
	id               SERIAL	 PRIMARY KEY,
	name	         TEXT	  NOT NULL,
	pNumber	         INT	      NOT NULL,
	position	     TEXT	  NOT NULL,
	yrsPlayed	     INT	      NOT NULL,
	homeTown	     TEXT	  NOT NULL,
	homeState	     TEXT,
	homeCountry	     TEXT,
	major	         TEXT	  NOT NULL,
	contact_info_id	 INT	    );

--Dragons Alumni Table
DROP TABLE alumni;
CREATE TABLE alumni(
	id 				 SERIAL		 PRIMARY KEY,
	name			 TEXT		 NOT NULL,
	position		 TEXT		 NOT NULL,
	numYrsPlayed	 INT			 NOT NULL,
	actYearPlayed	 TEXT		 NOT NULL,
	contact_info_id	 INT			 );

--Dragons Contact Info Table
DROP TABLE contact_info;
CREATE TABLE contact_info(
	id SERIAL PRIMARY KEY,
	phoneNum INT,
	emailLink TEXT NOT NULL,
	linkedinLink TEXT,
	facebookLink TEXT);

------------INSERT INTO TABLES-------------
-----INSERT INTO PLAYERS-----
----INSERT HAYDEN----
INSERT INTO player(name, pNumber, position, yrsPlayed, homeTown, homeState, major)
VALUES ('Dane', 10, 'Outside Defender', 4, 'Boise', 'ID', 'Something Bad Ass');

----INSERT SCOTT----
INSERT INTO player(name, pNumber, position, yrsPlayed, homeTown, homeState, major)
VALUES ('Scott Staples', 14, 'Center Midfielder', 4, 'Bellevue', 'WA', 'Construction Management');

-----INSERT INTO ALUMNI-----
INSERT INTO alumni(name, position, numYrsPlayed, actYearPlayed)
VALUES ('Hayden Carlson', 'Outside Defender', 1, '2015-2016');


