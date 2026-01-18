<?php
/**
 * @var $model \App\models\User
 */
?>
<h1 class="my-5">Login</h1>
<?php
$form = \App\core\forms\Form::begin("", "post");
?>
    <?php echo $form->field($model, 'email') ?>
    <?php echo $form->field($model, 'password')->passwordField() ?>
    <?php echo $form->button() ?>
<?php echo \App\core\forms\Form::end() ?>