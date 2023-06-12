<?php
namespace app\App\core\form;

use app\App\core\Model;

class Form
{
public static function begin($action, $method): string
{
return sprintf('<form action="%s" method="%s">', $action, $method);
    }

    public static function end(): string
    {
    return '</form>';
}

public static function field(Model $model, $attribute): Field
{
return new Field($model, $attribute);
}
}
