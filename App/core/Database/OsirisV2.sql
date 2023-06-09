DROP TABLE IF EXISTS Student;

CREATE TABLE Student (
                         id INT AUTO_INCREMENT PRIMARY KEY,
                         firstname VARCHAR(50) NOT NULL,
                         lastname VARCHAR(50) NOT NULL,
                         age INT,
                         study VARCHAR(100) NOT NULL
);

DROP TABLE IF EXISTS Teacher;

CREATE TABLE Teacher (
                         id INT AUTO_INCREMENT PRIMARY KEY,
                         firstname VARCHAR(50) NOT NULL,
                         lastname VARCHAR(50) NOT NULL,
                         age INT,
                         Class VARCHAR(100) NOT NULL
);

DROP TABLE IF EXISTS Exams;
CREATE TABLE Exams (
                           ID INT PRIMARY KEY AUTO_INCREMENT,
                           naam VARCHAR(255) NOT NULL,
                           teacher_ID INT NOT NULL
);;

