<?php
namespace app\App\core\form;

use app\App\core\Model;

class Field
{
public Model $model;
public string $attribute;

public function __construct(Model $model, string $attribute)
{
$this->model = $model;
$this->attribute = $attribute;
}

public function __toString(): string
{
$value = $this->model->{$this->attribute};
$error = $this->model->getFirstError($this->attribute);

return sprintf('
<div class="form-group">
    <label>%s</label>
    <input type="text" name="%s" value="%s" class="form-control%s">
    <div class="invalid-feedback">
        %s
    </div>
</div>
', $this->attribute, $this->attribute, $value, $error ? ' is-invalid' : '', $error);
}
    public function textInput(): string
    {
        return sprintf(
            '<input type="text" name="%s" value="%s" class="%s">',
            $this->attribute,
            $this->model->{$this->attribute},
            $this->model->hasError($this->attribute) ? 'is-invalid' : ''
        );
    }
    public function passwordInput(): string
    {
        return sprintf(
            '<input type="password" name="%s" value="%s" class="%s">',
            $this->attribute,
            $this->model->{$this->attribute},
            $this->model->hasError($this->attribute) ? 'is-invalid' : ''
        );
    }

    public function emailInput(): string
    {
        return sprintf(
            '<input type="email" name="%s" value="%s" class="%s">',
            $this->attribute,
            $this->model->{$this->attribute},
            $this->model->hasError($this->attribute) ? 'is-invalid' : ''
        );
    }
}
