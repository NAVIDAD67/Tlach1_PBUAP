<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EmpresaSerch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Empresas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="empresa-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Registrar Empresa', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_empresa',
            'nombre',
            'descripcion',
            //'giro',
            'correo',
            'telefono',
            //'fecha_alta',
            'estado',
            
            [
                'format'=>'html',
                'value'=>function($data){return Html::img($data->logo_empresa,['width'=>'60']); }

            ]
            ,

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
