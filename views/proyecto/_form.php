<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Proyecto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="proyecto-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fecha_alta')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fecha_inicio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fecha_final')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'estado')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
