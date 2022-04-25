<?php
$this->title= 'Log In';
/** @var $model \app\models\User*/
use app\core\form\Form;
?>

<h1>LOGIN</h1>
<?php

$form= Form::begin("","post");
 echo $form->TextField($model,'email');
 echo $form->TextField($model,'password')->passwordField(); ?>
<button type="submit" class="btn btn-primary">Submit</button>

<?php Form::end() ?>
