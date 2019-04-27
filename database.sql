CREATE DATABASE if NOT EXISTS helpBlinds;

use helpBlinds;

CREATE TABLE IF NOT EXISTS locations (
    id INT(255) NOT NULL PRIMARY KEY AUTO_INCREMENT, 
    name varchar(255) NOT NULL,
    surname varchar(255) NOT NULL,
    username varchar(255) NOT NULL,
    password varchar(255) NOT NULL,
    ipaddress varchar(12) NOT NULL DEFAULT '192.168.1.1',
    phone varchar(13) NOT NULL DEFAULT '+213669403608',
    latitude float NOT NULL,
    longitude float NOT NULL,
    type enum('blind','agent','cousin') NOT NULL,
    status enum('on','off','work','call','wait') NOT NULL DEFAULT 'off',
    correspID int(255) NOT NULL
);

INSERT INTO locations (id, name, surname, username, password, ipaddress, phone, latitude, longitude, type, status, correspID) VALUES
(1, 'sadek', 'ayadi', 'sadek', '1', '192.168.1.1', '+213669403608', 35.532, 6.17242, 'blind', 'off', 0),
(2, 'amar', 'mekhalfi', 'amar', '1', '192.168.1.1', '+213669403608', 35.411, 6.1622, 'agent', 'off', 0),
(3, 'imad', 'ayadi', 'imad', '1', '192.168.1.1', '+213669403608', 35.5295, 6.1723, 'cousin', 'off', 0),
(4, 'nafaa', 'ayadi', 'nafaa', '1', '192.168.1.1', '+213669403608', 35.5295, 6.1723, 'cousin', 'off', 0),
(5, 'gaga', 'ayadi', 'gaga', '1', '192.168.1.1', '+213669403608', 35.5295, 6.1723, 'cousin', 'off', 0),
(6, 'alaid', 'ayadi', 'alaid', '1', '192.168.1.1', '+213669403608', 35.5295, 6.1723, 'cousin', 'off', 0),
(7, 'masoud', 'masoud', 'masoud', '1', '192.168.1.1', '+213669403608', 35.5606, 6.17359, 'blind', 'off', 0),
(8, 'kadour', '', 'kadour', '1', '192.168.1.1', '+213669403608', 35.5369, 6.1727, 'blind', 'off', 0);
