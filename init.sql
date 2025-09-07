CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(255) NOT NULL
);
INSERT INTO users (username) VALUES ('admin'), ('test'), ('guest');

