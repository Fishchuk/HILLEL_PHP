CREATE TABLE IF NOT EXISTS posts(
   id INT(10) AUTO_INCREMENT PRIMARY KEY,
   user_id INT(11) NOT NULL,
   title VARCHAR(254) NOT NULL,
   content TEXT NOT NULL ,
   image TEXT NOT NULL,
   created_at TIMESTAMP  NULL DEFAULT CURRENT_TIMESTAMP ,
   FOREIGN KEY (user_id) REFERENCES users(id)

);