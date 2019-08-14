<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UrbanizacionAreaSocial */

$this->title = 'Nueva Area Social';
$this->params['breadcrumbs'][] = ['label' => 'Urbanizacion Area Socials', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<h2><?= Html::encode($this->title) ?></h2>
<div class="panel panel-default" style="padding:15px">
    <?= $this->render('_form', [
        'model' => $model,
        'etapas'=>$etapas
    ]) ?>

</div>
