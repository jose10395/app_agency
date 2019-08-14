<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\UrbanizacionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Urbanizaciones';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel panel-default">
    <div class="panel-header" style="padding:10px">
        <h2><?= Html::encode($this->title) ?></h2>
        <?= Html::a('Nueva Urbanización', ['create'], ['class' => 'btn btn-success pull-right']) ?>
        <?php // echo $this->render('_search', ['model' => $searchModel]); 
        ?>
    </div>
    <div class="panel-body" style="padding:10px">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'headerRowOptions' => ['style' => 'background-color: #eee;'],
            'tableOptions' => ['class' => 'table table-condensed table-bordered'],
            //'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                //'id',
                ['header' => 'Nombre de la Urbanización', 'attribute' => 'urbanizacion_nombre']
                //'created_at',

                //['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>

</div>