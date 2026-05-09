CREATE DATABASE tournamentDB;

USE tournamentDB;

CREATE TABLE TOURNAMENTS (
    tournamentID INT PRIMARY KEY,
    tournamentName VARCHAR(100)
);

CREATE TABLE COMPETITORS (
    competitorID INT PRIMARY KEY,
    competitorFirstName VARCHAR(100),
    competitorLastName VARCHAR(100),
    tournamentID INT
);