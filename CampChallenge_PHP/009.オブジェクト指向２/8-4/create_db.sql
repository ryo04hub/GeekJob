DROP DATABASE IF EXISTS station_info;
CREATE DATABASE station_info;

use station_db;

DROP TABLE IF EXISTS human_db;
CREATE TABLE human_db (
  id int(11) NOT NULL AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  age int(11) NOT NULL,
  country VARCHAR(255) NOT NULL,
  PRIMARY KEY(id)
) ENGINE=InnoDB DEFAULT CHARSET=cp932;


DROP TABLE IF EXISTS station_db;
CREATE TABLE station_db(
  id int(11) NOT NULL AUTO_INCREMENT,
  stationName VARCHAR(255) NOT  NULL,
  PRIMARY KEY(id)
) ENGINE=InnoDB DEFAULT CHARSET=cp932;

INSERT INTO human_db (name, age, country) VALUES ('Taro', 22, 'Japan'), ('Lee', 35, 'China'), ('John', 18, 'US');

INSERT INTO station_db (StationName) VALUES ('Shinjuku'), ('Shibuya'), ('Ikebukuro');
