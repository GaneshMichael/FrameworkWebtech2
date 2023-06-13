<?php

namespace app\App\Models;

use app\App\core\Database;

class Grades {
    protected $db;
    public $id = 0;
    public $user_id = '';
    public $exam_id = '';
    public $grade = '';
    public $created_at = '';
    public $updated_at = '';
    public $created_by = '';
    public $updated_by = '';
    public $student_id = '';

    public function __construct() {
        $this->db = new Database();
        $this->db->connect();
    }

    public function getAllGrades() {
        $query = "SELECT * FROM Grades";
        return $this->db->query($query);
    }

    public function createGrade() {
        $query = "INSERT INTO Grades (user_id, exam_id, grade, created_at, updated_at, created_by, updated_by, student_id) 
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $values = [
            $this->user_id,
            $this->exam_id,
            $this->grade,
            $this->created_at,
            $this->updated_at,
            $this->created_by,
            $this->updated_by,
            $this->student_id
        ];
        return $this->db->execute($query, $values);
    }

    public function getGradeById($id) {
        $query = "SELECT * FROM Grades WHERE id = ?";
        $values = [$id];
        return $this->db->query($query, $values);
    }

    public function updateGrade() {
        $query = "UPDATE Grades SET user_id = ?, exam_id = ?, grade = ?, 
                  created_at = ?, updated_at = ?, created_by = ?, updated_by = ?, student_id = ? 
                  WHERE id = ?";
        $values = [
            $this->user_id,
            $this->exam_id,
            $this->grade,
            $this->created_at,
            $this->updated_at,
            $this->created_by,
            $this->updated_by,
            $this->student_id,
            $this->id
        ];
        return $this->db->execute($query, $values);
    }

    public function deleteGrade($id) {
        $query = "DELETE FROM Grades WHERE id = ?";
        $values = [$id];
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
