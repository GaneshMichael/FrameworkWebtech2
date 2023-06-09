<?php
namespace app\App\Models;

use app\App\core\Database;

class Exams {
    protected $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getAllExams() {
        $query = "SELECT * FROM exams";
        return $this->db->query($query);
    }

    public function createExam($name, $teacherId) {
        $query = "INSERT INTO exams (ID, name, teacher_ID) VALUES (?, ?, ?)";
        $values = [$name, $teacherId];
        return $this->db->execute($query, $values);
    }

}
