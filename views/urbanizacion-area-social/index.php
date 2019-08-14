<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\UrbanizacionAreaSocialSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Areas Sociales';
$this->params['breadcrumbs'][] = $this->title;
?>
<h1><?= Html::encode($this->title) ?></h1>
<div class="panel panel-default" style="padding:10px">
    <p>
        <?= Html::a('Nueva Area Social', ['create'], ['class' => 'btn btn-success','style'=>'color:#fff !important']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'urbanizacion_etapafk',
            'nombre:ntext',
            'created_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
