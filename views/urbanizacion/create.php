<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Urbanizacion */

$this->title = 'Registrar Nueva Urbanizacion';
$this->params['breadcrumbs'][] = ['label' => 'Urbanizacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="urbanizacion-create">
    <div class="panel panel-default">
        <div class="panel-header">
            <h3 style="padding:10px"><?= Html::encode($this->title) ?></h3>
        </div>
        <div class="panel-body">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>
</div>