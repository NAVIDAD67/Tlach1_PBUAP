<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Participante */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="participante-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'apellido')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'correo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telefono')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'estado')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fecha_alta')->textInput(['maxlength' => true]) ?>

    <?=Html::img($model->foto,['width'=>'60px']); ?>

    <?= $form->field($model, 'archivo')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
