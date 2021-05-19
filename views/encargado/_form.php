<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Encargado */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="encargado-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'apellido')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rol')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fecha_alta')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'estado')->textInput(['maxlength' => true]) ?>


    <?=Html::img($model->foto,['width'=>'60px']); ?>

    <?= $form->field($model, 'archivo')->fileInput() ?>

    

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
