<?php
namespace app\App\Models;

use app\App\core\Model;
use app\App\core\Database;

class UserModel extends Model
{
public string $email = '';
public string $password = '';

public static function tableName(): string
{
return 'users';
}

public function validateCredentials(): bool
{
$user = self::findOne(['email' => $this->email]);

if ($user && password_verify($this->password, $user['password'])) {
return true;
}

return false;
}

public static function findOne($condition)
{
$db = new Database();
$db->connect();

$tableName = static::tableName();

$columns = implode(', ', array_keys($condition));
$placeholders = implode(', ', array_fill(0, count($condition), '?'));

$query = "SELECT * FROM $tableName WHERE $columns = $placeholders";
$values = array_values($condition);

$result = $db->query($query, $values);

if ($result) {
return $result[0];
}

return null;
}
}
