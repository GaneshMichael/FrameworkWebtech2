<?php
namespace app\App\Models;

use app\App\core\Database;

class Exams {
    protected $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getAllExams() {
        $query = "SELECT * FROM Exams";
        return $this->db->query($query);
    }


    public function createExam($name, $teacherId) {
        $query = "INSERT INTO Exams (ID, name, teacher_ID) VALUES (:ID, :name, :teacherId)";
        $values = [
            'name' => $name,
            'teacherId' => $teacherId
        ];
        return $this->db->execute($query, $values);
    }



    public function __get($property) {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

    public function __set($property, $value) {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        }
    }
}



