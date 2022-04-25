<?php
    $this->title= 'Register';
    /** @var $model \app\models\User*/
?>
<h1>Create an Account</h1>
<?php
use app\core\form\Form;

$form= Form::begin("","post")?>
    <div class="row">
        <div class="col">
            <?php echo $form->TextField($model,'firstname') ?>
        </div>
        <div class="col">
            <?php echo $form->TextField($model,'lastname') ?>
        </div>
    </div>
    <?php echo $form->TextField($model,'email') ?>
    <?php echo $form->TextField($model,'password')->passwordField() ?>
    <?php echo $form->TextField($model,'confirm_password')->passwordField() ?>
    <button type="submit" class="btn btn-primary">Submit</button>

<?php Form::end() ?>
