<?php
/** @var $this \app\core\View*/
/** @var $model \app\models\ContactForm*/



use app\core\form\Form;
use app\core\form\TextAreaField;

$this->title= 'Contact';
?>
<h1>Contact</h1>

<?php
$form= Form::begin('','post');
echo $form->TextField($model,'subject');
echo $form->TextField($model,'email');
echo $form->TextAreaField($model,'body');
echo '<button type="submit" class="btn btn-primary">Submit</button>';
 Form::end();
?>
<!--<button type="reset" class="btn btn-default">Reset</button>-->