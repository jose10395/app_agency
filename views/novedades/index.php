<?php

use app\models\Novedades;
use yii\helpers\Html;
use yii\grid\GridView;
use webvimark\modules\UserManagement\components\GhostHtml;

$this->title = 'Novedades';
$this->params['breadcrumbs'][] = $this->title;
$novedades = Novedades::find()->orderBy('id desc')->one();
$rutaPdf = ($novedades != null) ? $novedades->archivo : "/archivos/novedades/archivo.pdf";
?>
<div class="novedades-index">
    <h2><?= Html::encode($this->title) ?></h2>
    <p>
        <?= GhostHtml::a('Nuevo Archivo Novedades', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Yii::getAlias('@webroot') . '/archivos/novedades/archivo.pdf' ?>
    <iframe style="width:100%;height:450px" src="<?= Yii::$app->request->baseUrl.$rutaPdf; ?>"></iframe>

</div>