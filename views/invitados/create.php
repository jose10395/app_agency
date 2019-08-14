<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Invitados */

$this->title = 'Registrar Invitados';
$this->params['breadcrumbs'][] = ['label' => 'Invitados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<h2><?= Html::encode($this->title) ?></h2>
<div class="panel panel-default" style="padding:10px">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
