<?php

use yii\bootstrap\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Novedades */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Novedades', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

$rutaPdf = ($model != null) ? $model->archivo : "archivos/novedades/archivo.pdf";
?>
<div class="novedades-view">
    <?php Html::a('Volver',['index'],['class'=>'btn btn-sm btn-success'])?>
    <iframe style="width:100%;height:550px" src="<?= Yii::$app->request->baseUrl .'/'. $rutaPdf; ?>"></iframe>
</div>
