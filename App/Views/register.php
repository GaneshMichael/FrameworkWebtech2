<?php

use app\App\core\form\Form;
use app\App\core\form\Field;
use app\App\Models\RegisterModel;

?>

<h1>Create an account</h1>

<?php $form = Form::begin('', "post") ?>
<div class="row">
    <div class="col">
        <?php echo $form->field(new RegisterModel(), 'username')->textInput() ?>
    </div>
    <div class="col">
        <?php echo $form->field(new RegisterModel(), 'password')->passwordField() ?>
    </div>
</div>
<?php echo $form->field(new RegisterModel(), 'email')->textInput(['type' => 'email']) ?>
<?php echo $form->field(new RegisterModel(), 'confirmPassword')->passwordField() ?>

<button type="submit" class="btn btn-primary">Create account</button>
<?php Form::end() ?>
