CREATE TABLE IF NOT EXISTS users(
   id INT(10) AUTO_INCREMENT PRIMARY KEY,
   name VARCHAR(50) NOT NULL,
   surname VARCHAR(75) NOT NULL,
   age INT(3) NOT NULL,
   email VARCHAR(120) NOT NULL UNIQUE,
   phone VARCHAR (15)


);