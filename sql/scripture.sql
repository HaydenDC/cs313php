DROP TABLE scripture;

CREATE TABLE scripture(
	id	     SERIAL	 PRIMARY KEY,
	book	 TEXT	 NOT NULL,
	chapter	 INT	 NOT NULL,
	verse	 INT	 NOT NULL,
	content	 TEXT	 NOT NULL
	);

INSERT INTO scripture (book, chapter, verse, content)
	VALUES('John', 1, 5, 'And the light shineth in darkness, and the darkness comprehended not.');

INSERT INTO scripture (book, chapter, verse, content)
	VALUES('Doctrine and Covenants', 88, 49,'The light shineth in darkness, and the darkness comprehendeth it not; nevertheless, the day shall come when you shall comprehend even God, being quickened in him and by him.');	

INSERT INTO scripture (book, chapter, verse, content)
	VALUES('Doctrine and Covenants', 93, 28, 'He that akeepeth his commandments receiveth btruth and clight, until he is glorified in truth and dknoweth all things.');

INSERT INTO scripture (book, chapter, verse, content)
	VALUES('Mosiah', 16, 9, 'He that akeepeth his commandments receiveth btruth and clight, until he is glorified in truth and dknoweth all things.');
		
