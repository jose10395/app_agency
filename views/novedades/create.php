<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Novedades */

$this->title = 'Nueva Novedad';
$this->params['breadcrumbs'][] = ['label' => 'Novedades', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="novedades-create">

    <h2><?= Html::encode($this->title) ?></h2>
    <div class="panel panel-default" style="padding:10px">
        <?= $this->render('_form', [
            'model' => $model,
            'urbanizacion_list' => $urbanizacion_list
        ]) ?>
    </div>
</div>