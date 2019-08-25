<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Reservas */

$this->title = 'Nueva Reserva';
$this->params['breadcrumbs'][] = ['label' => 'Reservas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reservas-create">
    <h2><?= Html::encode($this->title) ?></h2>
    <div class="panel panel-default" style="padding:10px">
        <?=
        $this->render('_form', [
            'model' => $model,
            'list_areas' => $list_areas,
            'urbanizacion' => $urbanizacion,
            'nro_reserva'=>$nro_reserva,
            'etapa'=>$etapa
        ])
        ?>
    </div>
</div>
