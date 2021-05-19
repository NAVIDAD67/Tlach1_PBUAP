<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EncargadoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Encargados';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="encargado-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Encargado', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_encargado',
            'nombre',
            //'apellido',
            'rol',
            'fecha_alta',
            //'estado',
         

            [
                'format'=>'html',
                'value'=>function($data){return Html::img($data->foto,['width'=>'60', 'height'=>'60']); }

            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
