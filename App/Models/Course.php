<?php

namespace app\App\Models;

use app\App\core\Database;

class Course {
    protected $db;

    public function __construct() {
        $this->db = new Database();
        $this->db->connect();
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

    public function getCourseById($id) {
        $query = "SELECT * FROM course WHERE id = ?";
        $values = [$id];
        return $this->db->query($query, $values);
    }

    public function updateCourse($id, $name, $teacherId) {
        $query = "UPDATE course SET name = ?, teacher_id = ? WHERE id = ?";
        $values = [$name, $teacherId, $id];
        return $this->db->execute($query, $values);
    }

    public function deleteCourse($id) {
        $query = "DELETE FROM course WHERE id = ?";
        $values = [$id];
        return $this->db->execute($query, $values);
    }

    public function getCourseByTeacherId($teacherId) {
        $query = "SELECT * FROM course WHERE teacher_id = ?";
        $values = [$teacherId];
        return $this->db->query($query, $values);
    }

    public function getCourseByStudentId($studentId) {
        $query = "SELECT * FROM course WHERE id IN (SELECT course_id FROM student_course WHERE student_id = ?)";
        $values = [$studentId];
        return $this->db->query($query, $values);
    }

    public function getCourseByExamId($examId) {
        $query = "SELECT * FROM course WHERE id IN (SELECT course_id FROM exam_course WHERE exam_id = ?)";
        $values = [$examId];
        return $this->db->query($query, $values);
    }

    public function deleteCourseByTeacherId($teacherId) {
        $query = "DELETE FROM course WHERE teacher_id = ?";
        $values = [$teacherId];
        return $this->db->execute($query, $values);
    }

    public function deleteCourseByStudentId($studentId) {
        $query = "DELETE FROM course WHERE id IN (SELECT course_id FROM student_course WHERE student_id = ?)";
        $values = [$studentId];
        return $this->db->execute($query, $values);
    }
}
