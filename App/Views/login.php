<?php

use app\App\core\form\Form;
use app\App\Models\UserModel;

$model = new UserModel();

$form = new Form();
echo $form->begin('/login', 'post');
?>

<div class="mb-3 row">
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

    <button type="submit" class="btn btn-primary">Login</button>

    <?php
    echo $form->end();
    ?>
