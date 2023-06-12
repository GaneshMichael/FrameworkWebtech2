<?php

namespace app\App\core;

class Model
{
    public array $attributes = [];
    public array $errors = [];

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
        // Implementeer hier je validatielogica
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
}