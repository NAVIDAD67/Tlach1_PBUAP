<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EncargadoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="encargado-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_encargado') ?>

    <?= $form->field($model, 'nombre') ?>

    <?= $form->field($model, 'apellido') ?>

    <?= $form->field($model, 'rol') ?>

    <?= $form->field($model, 'fecha_alta') ?>

    <?php // echo $form->field($model, 'estado') ?>

    <?php // echo $form->field($model, 'foto') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
