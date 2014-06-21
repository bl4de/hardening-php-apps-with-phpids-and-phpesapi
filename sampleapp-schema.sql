DROP TABLE IF EXISTS entry;

CREATE TABLE entry
(
  id    INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  name  VARCHAR(100),
  value VARCHAR(100)
);

INSERT INTO entry (name, value) VALUES ('Poland', 'PL'), ('Canada', 'CA'), ('United States', 'US');
