<?php

use app\models\User;
use yii\data\ActiveDataProvider;
use yii\data\ArrayDataProvider;
use yii\db\Query;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\UrbanizacionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pagos';
$this->params['breadcrumbs'][] = $this->title;
$query =[];
$dataProvider = new ArrayDataProvider([
    'allModels' => $query
]);
?>
<div class="panel panel-default">
    <div class="panel-header" style="padding:10px">
        <h2><?= Html::encode($this->title) ?></h2>
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
                ['header' => 'Nombre', 'attribute' => 'urbanizacion_nombre'],
                ['header' => 'Urbanizacion', 'attribute' => 'urbanizacion_nombre'],
                ['header' => 'Etapa', 'attribute' => 'urbanizacion_nombre'],
                ['header' => 'Valor Cancelado', 'attribute' => 'urbanizacion_nombre']
                //['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>

</div>