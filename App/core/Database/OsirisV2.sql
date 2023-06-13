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

DROP TABLE IF EXISTS Grades;
CREATE TABLE Grades (
                            ID INT PRIMARY KEY AUTO_INCREMENT,
                            grade VARCHAR(255) NOT NULL,
                            student_ID INT NOT NULL,
                            exam_ID INT NOT NULL,
                            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                            FOREIGN KEY (student_ID) REFERENCES Student(id),
                            FOREIGN KEY (exam_ID) REFERENCES Exams(id)
);;

DROP TABLE IF EXISTS users;

CREATE TABLE users (
                       id INT AUTO_INCREMENT PRIMARY KEY,
                       first_name VARCHAR(50) NOT NULL,
                       last_name VARCHAR(50) NOT NULL,
                       email VARCHAR(255) NOT NULL,
                       password VARCHAR(255) NOT NULL,
                       account_type VARCHAR(50) NOT NULL
);

