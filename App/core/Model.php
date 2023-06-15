<?php

namespace app\App\core;

class Model
{
    protected Database $db;
    public array $attributes = [];
    public array $errors = [];

    public function __construct()
    {
        $db = new Database();
        $db->connect();
    }

    public function loadData($data): void
    {
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                $this->{$key} = $value;
            }
        }
    }

    public function validate(): bool
    {
        return empty($this->errors);
    }

    public function addError($attribute, $message): void
    {
        $this->errors[$attribute][] = $message;
    }

    public function hasError($attribute): bool
    {
        return isset($this->errors[$attribute]);
    }

    public function getFirstError($attribute): ?string
    {
        return $this->errors[$attribute][0] ?? null;
    }
    public static function findOne(array $conditions): ?array
    {
        $tableName = static::tableName();
        $query = "SELECT * FROM $tableName WHERE ";
        $params = [];

        foreach ($conditions as $column => $value) {
            $query .= "$column = ? AND ";
            $params[] = $value;
        }

        $query = rtrim($query, "AND ");
        $db = new Database();
        return $db->query($query, $params)[0] ?? null;
    }
    public static function tableName(): string
    {
        return '';
    }


}