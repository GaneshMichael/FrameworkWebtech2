<?php

namespace app\App\core;

class Model
{
    public array $errors = [];

    public function validate(): bool
    {
        $isValid = true;

        if (empty($this->firstName)) {
            $this->addError('firstName', 'First name is required.');
            $isValid = false;
        }

        if (empty($this->lastName)) {
            $this->addError('lastName', 'Last name is required.');
            $isValid = false;
        }

        if (empty($this->email)) {
            $this->addError('email', 'Email is required.');
            $isValid = false;
        } elseif (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $this->addError('email', 'Invalid email format.');
            $isValid = false;
        }

        if (empty($this->password)) {
            $this->addError('password', 'Password is required.');
            $isValid = false;
        }

        if (empty($this->confirmPassword)) {
            $this->addError('confirmPassword', 'Confirm password is required.');
            $isValid = false;
        } elseif ($this->password !== $this->confirmPassword) {
            $this->addError('confirmPassword', 'Passwords do not match.');
            $isValid = false;
        }

        return $isValid;
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