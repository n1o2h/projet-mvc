<?php
/**
 * @var $model \App\models\User
 */
?>
<h1 class="my-5">Create an account</h1>
<?php
$form = \App\core\forms\Form::begin("", "post");
?>
<div class="row">
    <div class="col">
       <?php echo $form->field($model, 'firstName') ?>
    </div>
    <div class="col">
         <?php echo $form->field($model, 'lastName') ?>
    </div>
</div>



    <?php echo $form->field($model, 'email') ?>
    <?php echo $form->field($model, 'password')->passwordField() ?>
    <?php echo $form->field($model, 'passwordConfirm')->passwordField() ?>
    <?php echo $form->button() ?>
<?php echo \App\core\forms\Form::end() ?>