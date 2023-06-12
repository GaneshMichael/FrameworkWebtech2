<?php

namespace app\App\Models;

use app\App\core\Database;

class Teacher {
    protected $db;

    public function __construct() {
        $this->db = new Database();
        $this->db->connect();
    }

    public function getAllTeachers() {
        $query = "SELECT * FROM teacher";
        return $this->db->query($query);
    }

    public function createTeacher($firstname, $lastname, $age, $class) {
        $query = "INSERT INTO teacher (firstname, lastname, age, Class) VALUES (?, ?, ?, ?)";
        $values = [$firstname, $lastname, $age, $class];
        return $this->db->execute($query, $values);
    }

    public function getTeacherById($id) {
        $query = "SELECT * FROM teacher WHERE id = ?";
        $values = [$id];
        return $this->db->query($query, $values);
    }

    public function updateTeacher($id, $firstname, $lastname, $age, $class) {
        $query = "UPDATE teacher SET firstname = ?, lastname = ?, age = ?, Class = ? WHERE id = ?";
        $values = [$firstname, $lastname, $age, $class, $id];
        return $this->db->execute($query, $values);
    }

    public function deleteTeacher($id) {
        $query = "DELETE FROM teacher WHERE id = ?";
        $values = [$id];
        return $this->db->execute($query, $values);
    }

    // Andere methoden voor het ophalen, bijwerken en verwijderen van leraren

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
