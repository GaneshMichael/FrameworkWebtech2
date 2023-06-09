<?php

namespace app\App\Models;

use app\App\core\Database;

class Course {
    protected $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getAllCourses() {
        $query = "SELECT * FROM course";
        return $this->db->query($query);
    }

    public function createCourse($name, $teacherId) {
        $query = "INSERT INTO course (name, teacher_id) VALUES (?, ?)";
        $values = [$name, $teacherId];
        return $this->db->execute($query, $values);
    }

    // Andere methoden voor het bijwerken, verwijderen, enz. van cursussen
}
