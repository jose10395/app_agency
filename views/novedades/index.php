<?php

use app\models\Novedades;
use app\models\Urbanizacion;
use app\models\UrbanizacionEtapa;
use kartik\grid\GridView as KartikGridView;
use yii\grid\GridView;
use webvimark\modules\UserManagement\components\GhostHtml;
use yii\bootstrap\Html;

$this->title = 'Novedades';
$isMaster= \webvimark\modules\UserManagement\models\User::hasRole(['MASTER']);
?>
<div class="novedades-index">
    <h2><?= Html::encode($this->title) ?></h2>
    <p>
        <?= GhostHtml::a('Nuevo Archivo Novedades', ['create'], ['class' => 'btn btn-success', 'style' => 'color:white !important']) ?>
    </p>
    <div class="panel panel-default" style="padding:10px !important">
        <?=
            KartikGridView::widget([
                'dataProvider' => $dataProvider,
                'headerRowOptions'=>[
                    'style'=>[
                        //'background-color'=>'#ddd !important'
                    ]
                ],
                'columns' => [
                    [
                        'options' => [
                            'width' => '10%'
                        ],
                        'label'=>'Fecha',
                        'value'=>function($data){
                            return date('Y-m-d',strtotime($data->created_at));
                        }
                    ],
                    [
                        'visible' => ($isMaster) ? true : false,
                        'label' => 'Urbanización',
                        'value' => function ($data) {
                            $etapa = UrbanizacionEtapa::findOne($data->urbanizacion_etapafk);
                            $urbanizacion = Urbanizacion::findOne($etapa->urbanizacionfk);
                            return $urbanizacion->urbanizacion_nombre;
                        }
                    ],
                    [
                        'visible' => ($isMaster) ? true : false,
                        'label' => 'Etapa',
                        'value' => function ($data) {
                            $etapa = UrbanizacionEtapa::findOne($data->urbanizacion_etapafk);
                            return $etapa->etapa_nombre;
                        }
                    ],
                    [
                        'label' => 'Descripción Novedad',
                        'attribute' => 'descripcion',
                        'options' => [
                            'width' => '40%'
                        ]
                    ],
                    [
                        'options' => [
                            'width' => '8%'
                        ],
                        'contentOptions'=>[
                            'class'=>'text-center'
                        ],
                        'label' => '',
                        'format' => 'raw',
                        'value' => function ($data) {
                            $buttons = Html::a(
                                '<i class="fa fa-file-pdf-o" aria-hidden="true"></i>',
                                ['view', 'id' => $data->id],
                                [
                                    'target' => '_blank',
                                    'class' => 'btn btn-xs btn-info',
                                    'style'=>'color:white !important'
                                ]
                            );
                            return $buttons;
                        }
                    ]
                ]
            ])
        ?>
    </div>
</div>