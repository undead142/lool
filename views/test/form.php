<?php


use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>
<h1>MyForm</h1>

<?php $form = ActiveForm::begin([
'options'=>['id'=>'myform']
]) ?>

<?= $form->field($model, 'name') ?>
<?= $form->field($model, 'email')->input('email') ?>
<?= $form->field($model, 'text')->textarea(['rows'=>10]) ?>

<?= Html::submitButton('NEXT') ?>


<?php ActiveForm::end() ?>