<?php
namespace app\App\Models;

use app\App\core\Model;
use app\App\core\Database;

class UserModel extends Model
{
public string $email = '';
public string $password = '';


public function validateCredentials(): bool
{
$user = self::findOne(['email' => $this->email]);

if ($user && password_verify($this->password, $user['password'])) {
return true;
}

return false;
}
}
