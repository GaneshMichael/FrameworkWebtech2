<?php

use app\App\core\form\Form;
use app\App\Models\RegisterModel;

$model = new RegisterModel();

$form = new Form();
echo $form->begin('/register', 'post');
?>

<div class="mb-3 row">
    <label for="username" class="col-sm-2 col-form-label">First name</label>
    <div class="col-sm-10">
        <?php echo $form->field($model, 'firstName')->textInput(); ?>
    </div>
    <label for="username" class="col-sm-2 col-form-label">Last name</label>
<div class="col-sm-10">
    <?php echo $form->field($model, 'lastName')->textInput(); ?>
</div>

<div class="mb-3 row">
    <label for="email" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
        <?php echo $form->field($model, 'email')->emailInput(); ?>
    </div>
</div>

<div class="mb-3 row">
    <label for="password" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-10">
        <?php echo $form->field($model, 'password')->passwordInput(); ?>
    </div>
</div>

<div class="mb-3 row">
    <label for="confirmPassword" class="col-sm-2 col-form-label">Confirm Password</label>
    <div class="col-sm-10">
        <?php echo $form->field($model, 'confirmPassword')->passwordInput(); ?>
    </div>
</div>

<button type="submit" class="btn btn-primary">Create account</button>

<?php
echo $form->end();
?>
