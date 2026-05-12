/* create database */
CREATE DATABASE IF NOT EXISTS tournamentDB;

/* use database */
USE tournamentDB;

/* tournaments table */
CREATE TABLE IF NOT EXISTS TOURNAMENTS (

    /* primary key */
    tournamentID INT AUTO_INCREMENT PRIMARY KEY,

    /* tournament name */
    tournamentName VARCHAR(100) NOT NULL
);

/* competitors table */
CREATE TABLE IF NOT EXISTS COMPETITORS (

    /* primary key */
    competitorID INT AUTO_INCREMENT PRIMARY KEY,

    /* competitor first name */
    competitorFirstName VARCHAR(100) NOT NULL,

    /* competitor last name */
    competitorLastName VARCHAR(100) NOT NULL,

    /* relationship to tournament */
    tournamentID INT,

    /* foreign key */
    FOREIGN KEY (tournamentID)
    REFERENCES TOURNAMENTS(tournamentID)
    ON DELETE CASCADE
);

/* sample tournaments */
INSERT INTO TOURNAMENTS (tournamentName)
VALUES
('Spring Tournament'),
('Summer Cup');

/* sample competitors */
INSERT INTO COMPETITORS
(
    competitorFirstName,
    competitorLastName,
    tournamentID
)
VALUES
('Mike', 'Sanders', 1),
('John', 'Smith', 1),
('Alex', 'Brown', 2);