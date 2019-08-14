<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Invitados */

$this->title = 'Update Invitados: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Invitados', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="invitados-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
