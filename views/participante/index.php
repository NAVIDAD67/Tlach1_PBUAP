<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ParticipanteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Participantes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="participante-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Participante', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_participante',
            'nombre',
            'apellido',
            'correo',
            //'telefono',
            'estado',
            //'fecha_alta',

            [
                'format'=>'html',
                'value'=>function($data){return Html::img($data->foto,['width'=>'60', 'height'=>'60']); }

            ]
            ,

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
