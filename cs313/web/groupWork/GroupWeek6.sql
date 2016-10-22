--Drop the previous table
DROP TABLE topics;

--Create Table
CREATE TABLE topics(
	id SERIAL PRIMARY KEY,
	name TEXT NOT NULL
);

--Insert Faith
INSERT INTO table WHERE (name) VALUES ('Faith');

--Insert Sacrifice
INSERT INTO table WHERE (name) VALUES ('Sacrifice');

--Insert Charity
INSERT INTO table WHERE (name) VALUES ('Charity');



---SCRIPTURE TOPIC TABLE-----
DROP TABLE scripture_topic;

--Create table
CREATE TABLE scripture_topic(
	id SERIAL PRIMARY KEY,
	topics_id INT FOREIGN KEY REFERENCES topics(id),
	scripture_id INT FOREIGN KEY REFERENCES scriptures(id)

);
