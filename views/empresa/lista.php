<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;

?>

<h1> Empresas que colaboran con nosostros </h1>
<div class="row">

<?php foreach ($empresas as $empresa): ?>

   <div class="col-xs-3 col-sm3 col-md-3 col-lg-3">
        <a href="#" class="thumbnail">

            <?= Html::img($empresa->logo_empresa);?>
            <?= Html::encode("{$empresa->nombre}") ?>
            <br>
            <br>
            <?= Html::encode("{$empresa->descripcion}") ?> 
        </a>
    </div>        

    

<?php endforeach;?>

</div>

<?= LinkPager::widget(['pagination'=>$paginacion])?>
 