<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\UrbanizacionEtapaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Urbanización Etapas';
$this->params['breadcrumbs'][] = $this->title;
?>
<h2><?= Html::encode($this->title) ?></h2>
<div class="panel panel-default" style="padding:10px">
    <div class="panel-header" style="padding:10px">
        <?= Html::a('Nueva Etapa&nbsp;&nbsp;&nbsp;<i class="material-icons">playlist_add</i>', ['create'], ['class' => 'btn btn-success', 'style' => 'color:#fff !important']) ?>
        <?php // echo $this->render('_search', ['model' => $searchModel]); 
        ?>
    </div>
    <div class="panel-body">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'headerRowOptions' => ['style' => 'background-color: #eee;'],
            'tableOptions' => ['class' => 'table table-condensed table-bordered'],
            //'filterModel' => $searchModel,
            'columns' => [
                [
                    'class' => 'yii\grid\SerialColumn',
                    'options' => [
                        'width' => '5%'
                    ]
                ],

                //'id',
                [
                    'header' => 'Nombre de Urbanización',
                    'options' => [
                        'width' => '20%'
                    ],
                    'value' => function ($data) {
                        return $data->urbanizacionfk0->urbanizacion_nombre;
                    }
                ],
                [
                    'header' => 'Nombre Etapa',
                    'value' => function ($data) {
                        return $data->etapa_nombre;
                    }
                ],
                //'created_at',

                //['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>

    </div>
</div>