<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;

?>

<h1> Encargados de proyectos </h1>
<div class="row">

<?php foreach ($encargados as $encargado): ?>

   <div class="col-xs-3 col-sm3 col-md-3 col-lg-3">
        <a href="#" class="thumbnail">

            <?= Html::img($encargado->foto);?>
            <?= Html::encode("{$encargado->nombre}") ?>
            <br>
            <br>
            <?= Html::encode("{$encargado->rol}") ?> 
        </a>
    </div>        

    

<?php endforeach;?>

</div>

<?= LinkPager::widget(['pagination'=>$paginacion])?>
 