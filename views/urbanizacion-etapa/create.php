<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UrbanizacionEtapa */

$this->title = 'Crear Etapa';
$this->params['breadcrumbs'][] = ['label' => 'Urbanizacion Etapas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="urbanizacion-etapa-create">
    <div class="panel panel-default">
        <div class="panel-header">
            <h3 style="padding:10px"><?= Html::encode($this->title) ?></h3>
        </div>
        <div class="panel-body">
            <?= $this->render('_form', [
                'model' => $model,
                'urbanizaciones'=>$urbanizaciones
            ]) ?>
        </div>
    </div>
</div>
