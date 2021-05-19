<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ParticipanteSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="participante-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_participante') ?>

    <?= $form->field($model, 'nombre') ?>

    <?= $form->field($model, 'apellido') ?>

    <?= $form->field($model, 'correo') ?>

    <?= $form->field($model, 'telefono') ?>

    <?php // echo $form->field($model, 'estado') ?>

    <?php // echo $form->field($model, 'fecha_alta') ?>

    <?php // echo $form->field($model, 'foto') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
