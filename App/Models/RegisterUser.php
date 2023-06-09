<?php

namespace app\App\Models;
use app\App\core\Model;
class RegisterUser extends Model
{
    public string $firstname = '';
    public string $lastname = '';
    public string $email = '';
    public string $Password = '';
    public string $confirmPassword = '';

    public function register()
    {
        echo "Creating new user";
    }

    public function rules(): array
    {
        return [
            'firstname' => [self::RULE_REQUIRED],
            'lastname'  => [self::RULE_REQUIRED],
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'Password' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 8],[self::RULE_MAX, 'max' => 16]],
            'confirmPassword' => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match' => 'Password']],
        ];
    }
}