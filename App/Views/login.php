<h1> Login </h1>

<?php $form =  \app\App\core\form\Form::begin('', "post") ?>

<?php echo $form->field($model, 'email') ?>
<?php echo $form->field($model, 'Password')->passwordField() ?>

<button type="submit" class="btn btn-primary">Inloggen</button>
<?php  \app\App\core\form\Form::end() ?>
