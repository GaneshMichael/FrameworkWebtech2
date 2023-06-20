<?php

namespace app\App\core;

class Model
{
    public array $errors = [];

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

    public static function tableName(): string
    {
        return 'users';
    }


}