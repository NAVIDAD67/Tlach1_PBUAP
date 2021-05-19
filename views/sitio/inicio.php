<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;


?>

Hola usuario
XD

<?php

if($mensaje){

    echo Html::tag('div',Html::encode($mensaje), ['class'=>'alert alert-danger']);
}

?>

<?php $formulario=ActiveForm::begin(); ?>
<?= $formulario->field($model,'valorA') ?>
<?= $formulario->field($model,'valorB') ?>

<div class="form-group">
<?= Html::submitButton('Enviar',['class'=>'btn btn.primary'])?>

</div>

<?php ActiveForm::end(); ?>